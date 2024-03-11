
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

function download() {
    const data = localStorage.getItem("data");
    const blob = new Blob([data], { type: "application/json" });
    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.href = url;
    link.download = "updatedData.json";
    link.click();
}

function save(updatedData) {
    // Update the data in local storage
    const data = localStorage.getItem("data");
    if (updatedData !== data) {
        const updatedJson = JSON.stringify(updatedData);
        localStorage.setItem("data", updatedJson);
    }
}

function addToFavorites() {
    const favHearth = document.getElementById("favHearth");
    if (favHearth.classList.contains("fa-regular")) {
        favHearth.classList.remove("fa-regular");
        favHearth.classList.add("fa-solid", "text-red-500");
    } else {
        favHearth.classList.remove("fa-solid", "text-red-500");
        favHearth.classList.add("fa-regular");
    }

}

function updateInfoPlayer() {
    const data = getData();
    const playerInfo = data.Player_Info;
    const divMoney = document.getElementById("hp_money");
    divMoney.innerText = "";
    divMoney.innerText = formatNumber(playerInfo.money);
}