var rarity;
var type;

function setRarities(value) {
    this.rarity = value;
}
function getRarities() {
    return this.rarity;
}
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

function hideAllCard() {
    const tab = ["mp_monsterTeam", "mp_myMonster"];
    tab.forEach(idDiv => {
        const divs = document.querySelectorAll(`#${idDiv} div[id^="cardMonster"]:not([id*="Details"])`);
        divs.forEach(div => {
            div.classList.remove('hidden');
        });
        const detailDivs = document.querySelectorAll(`#${idDiv} div[id$="Details"]`);
        detailDivs.forEach(div => {
            div.classList.add('hidden');
        });
    });
}
/**
 * Hides the monster information.
 */


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
    resetFilters();
    Array.from(divElements).forEach(divElement => {
        if (divElement.id === divId) {
            divElement.style.display = "block";
        } else {
            divElement.style.display = "none";
        }
    });
}

function displayInfoDiv(divSelected) {

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
}
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

        const iElement = item.querySelector("i");
        iElement.classList.remove("fa-beat");

    } else {
        item.classList.add("bg-stone-600");
        item.classList.add("text-white");
        item.classList.add("selected");

        const iElement = item.querySelector("i");
        iElement.classList.add("fa-beat");
    }
}

function addAlert(status, titre, text, other, yes, fYes, no, fNo) {

    var div = document.getElementById("confirmDialog");

    var divTitre = document.getElementById("title");
    var divText = document.getElementById("confirmText");
    var divOther = document.getElementById("otherText");
    var divYes = document.getElementById("confirmYes");
    var divNo = document.getElementById("confirmNo");

    switch (status) {
        case "alert":
            divTitre.classList.add("text-red-500");
            divTitre.classList.remove("text-blue-500");
            divTitre.classList.remove("text-green-500");
            divTitre.classList.remove("text-yellow-500");
            break;
        case "info":
            divTitre.classList.add("text-blue-500");
            divTitre.classList.remove("text-red-500");
            divTitre.classList.remove("text-green-500");
            divTitre.classList.remove("text-yellow-500");
            break;
        case "success":
            divTitre.classList.add("text-green-500");
            divTitre.classList.remove("text-red-500");
            divTitre.classList.remove("text-blue-500");
            divTitre.classList.remove("text-yellow-500");
            break;
        case "warning":
            divTitre.classList.add("text-yellow-500");
            divTitre.classList.remove("text-red-500");
            divTitre.classList.remove("text-blue-500");
            divTitre.classList.remove("text-green-500");
            break;
        default:
            break;
    }
    divTitre.innerHTML = titre;

    if (text == undefined) {
        divText.classList.add("hidden");
    }
    else {
        divText.classList.remove("hidden");
        divText.innerHTML = text;
    }
    if (other == undefined) {
        divOther.classList.add("hidden");
    }
    else {
        divOther.classList.remove("hidden");
        divOther.innerHTML = other;
    }
    if (yes == undefined) {
        divYes.classList.add("hidden");
    }
    else {
        divYes.classList.remove("hidden");
        divYes.innerHTML = yes;
        divYes.onclick = fYes;
    }
    if (no == undefined) {
        divNo.classList.add("hidden");
    }
    else {
        divNo.classList.remove("hidden");
        divNo.innerHTML = no;
        divNo.onclick = fNo;
    }
    div.classList.remove("hidden");
}
function removeAlert() {
    var div = document.getElementById("confirmDialog");
    div.classList.add("hidden");
}

function formatNumber(number) {
    number = parseInt(number);
    if (number >= 1000000000000000) {
        return (number / 1000000000000000).toFixed(2) + "Qa";
    } else if (number >= 1000000000000) {
        return (number / 1000000000000).toFixed(2) + "T";
    } else if (number >= 1000000000) {
        return (number / 1000000000).toFixed(2) + "B";
    } else if (number >= 1000000) {
        return (number / 1000000).toFixed(2) + "M";
    } else if (number >= 1000) {
        return (number / 1000).toFixed(2) + "k";
    } else {
        return number.toString();
    }
}
function showMonsterByTypeBtn(typeMenu) {
    if (typeMenu === 2) {
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
function showMonsterByRarityBtn(typeMenu) {
    if (typeMenu === 2) {
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