
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
