
/**
 * Updates the image source of the imgMap element based on the provided parameter.
 * @param {number} parm - The parameter indicating the map type.
 */
function btnMap(parm) {
    var url = "img/map/"
    switch (parm) {
        case 1:
            document.getElementById("imgMap").src = url + "Astars_mapVille.jpg"
            break;

        case 2:
            document.getElementById("imgMap").src = url + "Astars_mapEau.jpg"
            break;

        case 3:
            document.getElementById("imgMap").src = url + "Astars_mapIle.jpg"
            break;

        case 4:
            document.getElementById("imgMap").src = url + "Astars_mapComplete.jpg"
            break;

        default:
            break;
    }
}


// Monstre

/**
 * Shows the details card for the specified monster card.
 * @param {number} cardNumber - The number of the monster card.
 * @param {boolean} equipe - Indicates if the monster card is in the player's team.
*/
function showCard(cardNumber, equipe) {
    if (equipe) {
        document.getElementById(`cardMonsterEquip${cardNumber}Details`).classList.remove('hidden');
        document.getElementById(`cardMonsterEquip${cardNumber}`).classList.add('hidden');
    }
    else {
        document.getElementById(`cardMonster${cardNumber}Details`).classList.remove('hidden');
        document.getElementById(`cardMonster${cardNumber}`).classList.add('hidden');
    }
}

/**
 * Hides the details card for the specified monster card.
 * @param {number} cardNumber - The number of the monster card.
 */
function hideCard(cardNumber, equipe) {
    if (equipe) {
        document.getElementById(`cardMonsterEquip${cardNumber}Details`).classList.add('hidden');
        document.getElementById(`cardMonsterEquip${cardNumber}`).classList.remove('hidden');
    }
    else {
        document.getElementById(`cardMonster${cardNumber}Details`).classList.add('hidden');
        document.getElementById(`cardMonster${cardNumber}`).classList.remove('hidden');
    }
}

/**
 * Hides the specified div.
 * @param {HTMLElement} divElement - The div element to hide.
 */
function getAllDivPrincipal() {
    const divElements = document.querySelectorAll("#divPrincipal div[name='divPrincipal']");
    return divElements;
}

/**
 * Returns all the menu items.
 */
function getAllMenuItems() {
    var playerMenuItems = document.querySelectorAll("#playerMenu a[name='menuTab']");
    return playerMenuItems;
}

/**
 * Shows the specified div and hides the other divs.
 * @param {string} divId - The id of the div to show.
 */
function showDivPrincipal(divId) {
    const divElements = getAllDivPrincipal();
    Array.from(divElements).forEach(divElement => {
        if (divElement.id === divId) {
            divElement.style.display = "block";
        }
        else {
            divElement.style.display = "none";
        }
    });
}

/**
 * Handles the navigation functionality for the player menu.
 * @param {HTMLElement} clickedElement - The clicked menu item element.
 */
function menuNavigation(clickedElement) {
    const playerMenuItems = getAllMenuItems();
    Array.from(playerMenuItems).forEach(item => {
        selectMenu(clickedElement, item);
    });
    var divId = clickedElement.getAttribute("id").replace("menu", "div");
    showDivPrincipal(divId);
}

/**
 * Selects the specified menu item and deselects the other menu items.
 * @param {HTMLElement} clickedElement - The clicked menu item element.
 * @param {HTMLElement} item - The menu item element.
 */
function selectMenu(clickedElement, item) {
    if (item !== clickedElement) {
        item.classList.remove("bg-stone-600");
        item.classList.remove("text-white");
        item.classList.remove("selected");

    } else {
        item.classList.add("bg-stone-600");
        item.classList.add("text-white");
        item.classList.add("selected");
    }
}

/**
 * Shows the monster information.
 * @param {HTMLElement} divSelected - The selected div.
 * 
 */
function showMonsterInfo(divSelected, monster) {
    const divBestiaire = document.getElementById("divBestiaire");
    const divMonstre = document.getElementById("divMonstre");
    const divMonstreInfo = document.getElementById("divMonstreInfo");

    if (divBestiaire.contains(divSelected)) {
        divBestiaire.style.display = "none";
        divMonstreInfo.style.display = "block";
    }
    else {
        divMonstre.style.display = "none";
        divMonstreInfo.style.display = "block";
    }
    var id = monster.idMonster;
    if (id < 10) {
        id = "00" + id;
    }
    else if (id < 100) {
        id = "0" + id;
    }
    // RARITY
    var rarity = monster.base_rarity;

    const fullStars = '<i class="fa-solid fa-star fa-sm"></i>';
    const emptyStars = '<i class="fa-regular fa-star fa-sm"></i>';

    const divRarity = document.getElementById("rarity");
    divRarity.innerHTML = "";
    var newdoc = document.createElement("a");
    const color = monster.rarity.color;
    var colorClasses = color.trim().split(' ');
    newdoc.classList.add("flex", "items-center",colorClasses);
    for (let i = 0; i < rarity; i++) {
        newdoc.innerHTML += fullStars;
    }
    for (let i = rarity; i < 5; i++) {
        newdoc.innerHTML += emptyStars;
    }
    divRarity.appendChild(newdoc);

    // TYPE
    const divType = document.getElementById("type");
    divType.innerHTML = "";
    var newdoc = document.createElement("a");
    newdoc.classList.add("flex", "items-center", "mt-2");
    monster.monster_types.forEach(type => {
        newdoc.innerHTML += '<span style=color:'+type.type.color+'>'+type.type.nameType+'</span>';
        divType.appendChild(newdoc);
    } );
    // NAME AND DESCRIPTION
    document.getElementById("numero").innerHTML = "Astars #" + id;
    document.getElementById("image").src = monster.image;
    document.getElementById("name").innerHTML = monster.name;
    document.getElementById("description").innerHTML = monster.description;

    // STATS
    document.getElementById("statAtkBase").innerHTML = monster.base_attack;
    document.getElementById("statDefBase").innerHTML = monster.base_defense;
    document.getElementById("statHpBase").innerHTML = monster.base_hp;
    document.getElementById("statSpdBase").innerHTML = monster.base_speed;
    console.log(monster);
}

/**
 * Hides the monster information.
 */
function hideMonsterInfo() {
    const playerMenuItems = getAllMenuItems();
    const divMonstreInfo = document.getElementById("divMonstreInfo");

    Array.from(playerMenuItems).forEach(item => {
        if (item.classList.contains("selected")) {

            const id = item.getAttribute("id").replace("menu", "div");
            document.getElementById(id).style.display = "block";
            divMonstreInfo.style.display = "none";

        }
    });
}


let selectedColors = [];
let selectedNumbers = [];

function filter(button, type,divId) {
    let value;
    if (button) {
        value = button.value;
        const selected = type === 'type' ? selectedColors : selectedNumbers; //TODO: change the variable name

        const index = selected.indexOf(value);
        if (index > -1) {
            selected.splice(index, 1);
            button.classList.remove('selected');
        } else {
            if (type === 'rarity') { //TODO: change the variable name
                document.querySelectorAll('button#rarityBtn').forEach(button => button.classList.remove('selected')); //TODO: change the id in selector
                selected.length = 0;
            } else if (selected.length >= 2) {
                return;
            }
            selected.push(value);
            button.classList.add('selected');
        }
    }

    const inputValue = document.getElementById('nameInput').value.toLowerCase(); //TODO: change the id
    const divs = document.querySelectorAll(`#${divId} div[id^="cardMonster"]`); //TODO: change the id in selector

    divs.forEach(div => {
        const nameValue = div.querySelector('h3#monsterName').textContent.toLowerCase(); //TODO: change the id in selector
        const hasSelectedColor = selectedColors.every(color => div.classList.contains("type--"+color)); //TODO: change the class name
        const hasSelectedNumber = selectedNumbers.every(number => div.classList.contains("rarity--"+number)); //TODO: change the class name
        const hasMatchingName = nameValue.includes(inputValue);

        div.classList.toggle('hidden', !(hasSelectedColor && hasSelectedNumber && hasMatchingName));
    });
}

function resetFilters() {
    selectedColors = [];
    selectedNumbers = [];

    document.querySelectorAll('button').forEach(button => button.classList.remove('selected'));
    document.querySelectorAll('#divCardMonster div[id^="cardMonster"]').forEach(div => div.classList.remove('hidden')); //TODO: change the id in selector
    document.getElementById('nameInput').value = ''; //TODO: change the id
}

function showMonsterByTypeBtn(test) {
    if (test === 2) {
        if (document.getElementById("typeMenu2").style.display === "block") {
            document.getElementById("typeMenu2").style.display = "none";
        }
        else {
            document.getElementById("typeMenu2").style.display = "block";
            document.getElementById("rarityMenu2").style.display = "none";
        }
    }
    else {
        if (document.getElementById("typeMenu").style.display === "block") {
            document.getElementById("typeMenu").style.display = "none";
        }
        else {
            document.getElementById("typeMenu").style.display = "block";
            document.getElementById("rarityMenu").style.display = "none";
        }
    }
}
function showMonsterByRarityBtn(test) {
    if (test === 2) {
        if (document.getElementById("rarityMenu2").style.display === "block") {
            document.getElementById("rarityMenu2").style.display = "none";
        }
        else {
            document.getElementById("rarityMenu2").style.display = "block";
            document.getElementById("typeMenu2").style.display = "none";
        }
    }
    else {
        if (document.getElementById("rarityMenu").style.display === "block") {
            document.getElementById("rarityMenu").style.display = "none";
        }
        else {
            document.getElementById("rarityMenu").style.display = "block";
            document.getElementById("typeMenu").style.display = "none";
        }
    }
}