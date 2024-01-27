
/**
 * Initializes the tooltip functionality for the body element.
 */
$(document).ready(function () {
    $("body").tooltip({ selector: '[data-bs-toggle=tooltip]' });
});

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

/**
 * Handles the navigation functionality for the player menu.
 * @param {HTMLElement} clickedElement - The clicked menu item element.
 */
function menuNavigation(clickedElement) {
    var playerMenuItems = document.querySelectorAll("#playerMenu a");
    playerMenuItems.forEach(function (item) {
        if (item !== clickedElement) {
            item.classList.remove("bg-stone-600");
            item.classList.remove("text-white");

            var divId = item.getAttribute("id");
            var divId = item.getAttribute("id").replace("menu", "");
            var divElement = document.getElementById("div" + divId);
            if (divElement) {
                divElement.style.display = "none";
            }
        } else {
            item.classList.add("bg-stone-600");
            item.classList.add("text-white");

            var divId = item.getAttribute("id").replace("menu", "");
            var divElement = document.getElementById("div" + divId);
            if (divElement) {
                divElement.style.display = "block";
            }
        }
    });
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
    else
    {
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
    else
    {
        document.getElementById(`cardMonster${cardNumber}Details`).classList.add('hidden');
        document.getElementById(`cardMonster${cardNumber}`).classList.remove('hidden');
    }
}
function showMonsterInfo(i) {
    const infoDiv = document.getElementById(`divMonstreInfo`);
    const monsterDiv = document.getElementById(`divMonstre`);

    if (infoDiv) {
        infoDiv.style.display = "block";
        monsterDiv.style.display = "none";
    } else {
        console.error(`No element with id monsterInfo${i} found`);
    }
}
function hideMonsterInfo(i) {
    const infoDiv = document.getElementById(`divMonstreInfo`);
    const monsterDiv = document.getElementById(`divMonstre`);

    if (infoDiv) {
        infoDiv.style.display = "none";
        monsterDiv.style.display = "block";
    } else {
        console.error(`No element with id monsterInfo${i} found`);
    }
}