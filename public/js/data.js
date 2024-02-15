
function openFilePicker() {
    // Simuler un clic sur l'input de type 'file' lorsque le bouton est cliqué
    document.getElementById('fileInput').click();
}

function onLoad() {
    const json = getData();
    if (json) {
        document.getElementById("playerName").innerText = json.Player_Info.name;
        document.getElementById("playerID").innerText = json.Player_Info.id;
        document.getElementById("playerTimePlayed").innerText = json.Player_Stat.time_played;
        document.getElementById("playerMonstersCaught").innerText = json.Player_Stat.Monster.total_monster_catch.total;
    }

}

function newSave() {
    if (confirm("Are you sure you want to clear and create a new save?")) {
        try {
            localStorage.removeItem("data");
            console.log("Save removed");

            fetch('../js/template.json')
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    json = JSON.parse(data);

                    // Create unique ID
                    const currentDate = new Date();
                    const randomNum = Math.floor(Math.random() * 99) + 1;
                    const uniqueId = (currentDate.getTime() * randomNum).toString(32);

                    json.Player_Info.id = uniqueId;
                    json.Player_Info.register_date = currentDate.toISOString();
                    json.Player_Info.last_login_date = currentDate.toISOString();

                    localStorage.setItem('data', JSON.stringify(json));
                });

            // Redirect to "/"
            window.location.href = "/";

        } catch (error) {
            console.error("An error occurred while creating a new save:", error);
        }
    }

}

function loadSave() {
    try {
        const fileInput = document.getElementById("fileInput");
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function (event) {
            const json = event.target.result;
            const parsedJson = JSON.parse(json);
            parsedJson.Player_Info.last_login_date = new Date().toISOString(); // Update last_login_date
            localStorage.setItem("data", JSON.stringify(parsedJson));

            window.location.reload();
        };

        reader.readAsText(file);

        // Redirect to "/"
        window.location.href = "/";
    }
    catch (error) {
        console.error("An error occurred while loading the save:", error);
    }
}

function loadLastSave() {
    try {
        const json = getData();

        json.Player_Info.last_login_date = new Date().toISOString(); // Update last_login_date
        localStorage.setItem("data", JSON.stringify(json));
        window.location.href = "/";
    }
    catch (error) {
        console.error("An error occurred while loading the last save:", error);
    }
}

function loadHomePage() {
    const json = getData();
    const playerInfo = json.Player_Info;
    const energy = playerInfo.energy.energy;

    document.getElementById("hp_playerName").innerText = playerInfo.name;
    document.getElementById("hp_lvl").innerText = playerInfo.level;
    document.getElementById("hp_money").innerText = formatNumber(playerInfo.money);
    document.getElementById("hp_gem").innerText = formatNumber(playerInfo.gems);
    document.getElementById("hp_nrj").innerText = formatNumber(energy);
}

function loadMonstersPage(monsters) {
    const json = getData();
    const monstersJson = json.Player_Monster.Captured;
    const teamJson = json.Player_Monster.Team;
    const myMonsterDiv = document.getElementById("mp_myMonster");
    const myTeamDiv = document.getElementById("mp_monsterTeam");

    monstersJson.forEach(monsterJson => {
        monsters.forEach(monster => {
            if (monster.idMonster == monsterJson.monsterId) {
                let classes = `flex flex-col items-center justify-center w-full max-w-sm mx-auto rarity--${monster.base_rarity}`;
                monster.monster_types.forEach(monsterType => {
                    classes += ` type--${monsterType.type.idMonster_Type}`;
                });

                const cardMonster = document.createElement("div");
                cardMonster.id = `cardMonster${monsterJson.id}`;
                cardMonster.className = classes;

                const monsterImage = document.createElement("div");
                monsterImage.className = "w-full h-64 bg-center bg-cover rounded-lg shadow-md";
                monsterImage.style.backgroundImage = `url(${monster.image})`;

                const monsterInfo = document.createElement("div");
                monsterInfo.className = "w-56 -mt-10 overflow-hidden rounded-lg shadow-lg md:w-64 bg-gray-100";

                const monsterName = document.createElement("h3");
                monsterName.id = "monsterName";
                monsterName.className = "py-2 font-bold tracking-wide text-center uppercase text-gray-800";
                monsterName.textContent = monsterJson.surname + " - Lvl: " + monsterJson.level;

                const monsterDetails = document.createElement("div");
                monsterDetails.className = "flex items-center justify-evenly px-3 py-2 bg-gray-200";

                const monsterId = document.createElement("span");
                monsterId.className = "font-bold text-gray-800";
                monsterId.textContent = `#${monster.idMonster}`;

                const monsterButton = document.createElement("button");
                monsterButton.className = "px-2 py-1 text-xs font-semibold text-black uppercase transition-colors duration-300 transform bg-gray-300 rounded hover:bg-gray-400 focus:bg-gray-400 focus:outline-none";
                monsterButton.textContent = "Informations";
                monsterButton.id = "monsterButton";
                monsterButton.onclick = function () {
                    showCard(monsterJson.id, false);
                };

                monsterDetails.appendChild(monsterId);
                monsterDetails.appendChild(monsterButton);

                monsterInfo.appendChild(monsterName);
                monsterInfo.appendChild(monsterDetails);

                cardMonster.appendChild(monsterImage);
                cardMonster.appendChild(monsterInfo);

                // fdfsfs
                const cardMonsterDetails = document.createElement("div");
                cardMonsterDetails.id = "cardMonster" + monsterJson.id + "Details";
                cardMonsterDetails.className = "flex flex-col items-center justify-center w-full max-w-sm mx-auto hidden";

                const divMonsterImage = document.createElement("div");
                divMonsterImage.className = "w-full h-64 bg-center bg-cover rounded-lg shadow-md";
                divMonsterImage.style.backgroundImage = `url(${monster.image})`;

                const divMonsterInfo = document.createElement("div");
                divMonsterInfo.className = "px-6 py-4 mx-3 flex flex-col items-center justify-center bg-white bg-opacity-85 rounded mx-auto my-2";

                const divMonsterName = document.createElement("h1");
                divMonsterName.className = "text-xl font-semibold text-gray-800";
                divMonsterName.textContent = monster.name + " - Lvl: " + monsterJson.level;

                const crosshairs = document.createElement("div");
                crosshairs.className = "flex items-center mt-4 text-gray-800";
                crosshairs.innerHTML = `<i class="fa-solid fa-crosshairs fa-lg pr-2"></i><h1 class="px-2 text-sm">-> ${monsterJson.atk}</h1>`;

                const shield = document.createElement("div");
                shield.className = "flex items-center mt-4 text-gray-800";
                shield.innerHTML = `<i class="fa-solid fa-shield-halved fa-lg pr-2"></i><h1 class="px-2 text-sm">-> ${monsterJson.def}</h1>`;

                const heart = document.createElement("div");
                heart.className = "flex items-center mt-4 text-gray-800";
                heart.innerHTML = `<i class="fa-solid fa-heart fa-lg pr-2"></i><h1 class="px-2 text-sm">-> ${monsterJson.hp}</h1>`;

                const wind = document.createElement("div");
                wind.className = "flex items-center mt-4 text-gray-800";
                wind.innerHTML = `<i class="fa-solid fa-wind fa-lg pr-2"></i><h1 class="px-2 text-sm">->${monsterJson.speed}</h1>`;

                divMonsterInfo.appendChild(divMonsterName);
                divMonsterInfo.appendChild(crosshairs);
                divMonsterInfo.appendChild(shield);
                divMonsterInfo.appendChild(heart);
                divMonsterInfo.appendChild(wind);

                const monsterInfoContainer = document.createElement("div");
                monsterInfoContainer.className = "w-56 -mt-10 overflow-hidden rounded-lg shadow-lg md:w-64 bg-gray-100";

                const monsterInfoHeader = document.createElement("h3");
                monsterInfoHeader.className = "py-2 font-bold tracking-wide text-center uppercase text-gray-800";
                monsterInfoHeader.textContent = monsterJson.surname + " Info ";

                const infoLink = document.createElement("button");
                infoLink.id = "infoLink";
                infoLink.onclick = function () {
                    showMonsterInfo(this, monster);
                };
                infoLink.title = "Plus d'information";
                infoLink.innerHTML = `<i class="fa-solid fa-square-plus fa-xs"></i>`;

                monsterInfoHeader.appendChild(infoLink);

                const monsterIdContainer = document.createElement("div");
                monsterIdContainer.className = "flex items-center justify-evenly px-3 py-2 bg-gray-200";

                const divMonsterId = document.createElement("span");
                divMonsterId.className = "font-bold text-gray-800";
                divMonsterId.textContent = "#" + monster.idMonster;

                const addButton = document.createElement("button");
                addButton.className = "px-2 py-1 text-xs font-semibold text-black uppercase transition-colors duration-300 transform bg-gray-300 rounded hover:bg-gray-400 focus:bg-gray-400 focus:outline-none";
                addButton.innerHTML = `Ajouter à l'équipe <i class="fa-solid fa-circle-plus text-green-500"></i>`;
                addButton.id = "addButton";
                addButton.onclick = function () {
                    addMonsterToTeam(monsterJson);
                }

                const closeButton = document.createElement("button");
                closeButton.id = "closeButton";
                closeButton.onclick = function () {
                    hideCard(monsterJson.id, false);
                };
                closeButton.className = "px-2 py-1 text-xs font-semibold text-gray-800 uppercase transition-colors duration-300 transform bg-gray-200 rounded hover:bg-gray-300 focus:bg-gray-300 focus:outline-none";
                closeButton.innerHTML = '<i class="fa-solid fa-square-xmark fa-xl text-red-500"></i>';

                monsterIdContainer.appendChild(addButton);
                monsterIdContainer.appendChild(closeButton);

                monsterInfoContainer.appendChild(monsterInfoHeader);
                monsterInfoContainer.appendChild(monsterIdContainer);
                divMonsterImage.appendChild(divMonsterInfo);
                cardMonsterDetails.appendChild(divMonsterImage);
                cardMonsterDetails.appendChild(monsterInfoContainer);

                myMonsterDiv.appendChild(cardMonster);
                myMonsterDiv.appendChild(cardMonsterDetails);


                if (teamJson.includes(monsterJson.id)) {
                    var clone = cardMonster.cloneNode(true);
                    clone.id = "cardMonsterEquip" + monsterJson.id;

                    // Sélectionnez le bouton dans le clone
                    var clonebutton = clone.querySelector("#monsterButton");
                    clonebutton.onclick = function () {
                        showCard(monsterJson.id, true);
                    };
                    myTeamDiv.appendChild(clone);
                }

                var cloneDetails = cardMonsterDetails.cloneNode(true);
                cloneDetails.id = "cardMonsterEquip" + monsterJson.id + "Details";

                var cloneRemove = cloneDetails.querySelector("#addButton");
                cloneRemove.innerHTML = `Retirer de l'équipe <i class="fa-solid fa-circle-minus text-red-700"></i>`;
                cloneRemove.onclick = function () {
                    removeMonsterFromTeam(monsterJson);
                }
                var clonecloseButton = cloneDetails.querySelector("#closeButton");
                clonecloseButton.onclick = function () {
                    hideCard(monsterJson.id, true);
                }
                // Sélectionnez le bouton dans le clone
                var test = cloneDetails.querySelector("#infoLink");
                test.onclick = function () {
                    showMonsterInfo(cloneDetails, monster); // Passer 'clone' au lieu de 'this'
                };
                myTeamDiv.appendChild(cloneDetails);
            }

        });

    });


}

function updateStats() {
    const json = getData();

}

function getData() {
    const data = localStorage.getItem("data");
    if (data) {
        return JSON.parse(data);
    }
    return null;
}

function formatNumber(number) {
    if (number >= 1000000000000000) {
        return (number / 1000000000000000).toFixed(2) + "Q";
    } else if (number >= 1000000000000) {
        return (number / 1000000000000).toFixed(2) + "T";
    } else if (number >= 1000000000) {
        return (number / 1000000000).toFixed(2) + "B";
    } else if (number >= 1000000) {
        return (number / 1000000).toFixed(2) + "M";
    } else if (number >= 1000) {
        return (number / 1000).toFixed(2) + "K";
    } else {
        return number.toString();
    }
}

function download() {
    const data = localStorage.getItem("data");
    const blob = new Blob([data], { type: "application/json" });
    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.href = url;
    link.download = "updatedData.json";
    link.click();
}

function save() {
    const name = document.getElementById("name").value;

    // Update the data in local storage
    const data = localStorage.getItem("data");
    const newData = JSON.parse(data);
    newData.name = name;
    const updatedJson = JSON.stringify(newData);
    localStorage.setItem("data", updatedJson); // Update local storage with new data
}


