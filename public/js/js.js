$(document).ready(function () {
    $("body").tooltip({ selector: '[data-bs-toggle=tooltip]' });
});
function openMenuGear() {
    var display = document.getElementById("menuGear").style.display
    if (display == "none") {
        document.getElementById("menuGear").style.display = "block"
        document.getElementById("hiddingDiv").style.display = "block"
        console.log("f");
    }
    else {
        hideMenuGear()
    }
}
function hideMenuGear() {
    document.getElementById("menuGear").style.display = "none"
    document.getElementById("hiddingDiv").style.display = "none"
}


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

function menuNavigation(params) {
    switch (params) {
        case 1:
            document.getElementById("divMap").style.display = "block"
            document.getElementById("divMonstre").style.display = "none"
            document.getElementById("divBestiaire").style.display = "none"
            document.getElementById("divInventaire").style.display = "none"
            break;
        case 2:
            document.getElementById("divMap").style.display = "none"
            document.getElementById("divMonstre").style.display = "block"
            document.getElementById("divBestiaire").style.display = "none"
            document.getElementById("divInventaire").style.display = "none"
            break;
        case 3:
            document.getElementById("divMap").style.display = "none"
            document.getElementById("divMonstre").style.display = "none"
            document.getElementById("divBestiaire").style.display = "block"
            document.getElementById("divInventaire").style.display = "none"
            break;
        case 4:
            document.getElementById("divMap").style.display = "none"
            document.getElementById("divMonstre").style.display = "none"
            document.getElementById("divBestiaire").style.display = "none"
            document.getElementById("divInventaire").style.display = "block"
            break;



        default:
            break;
    }
}

