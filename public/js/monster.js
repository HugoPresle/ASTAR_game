function addMonsterToTeam(monster) {
    var json = getData();
    const team = json.Player_Monster.Team;
    if (team.length >= 3) {
        alert("Your team is full");
        return;
    }
    if (team.includes(monster.id)) {
        alert("This monster is already in your team");
        return;
    }
    else {
        team.push(monster.id);

        localStorage.setItem('data', JSON.stringify(json));
        location.reload();
    }
}

function removeMonsterFromTeam(monster) {
    var json = getData();
    const team = json.Player_Monster.Team;
    console.log(team);
    team.splice(team.indexOf(monster.id), 1);

    localStorage.setItem('data', JSON.stringify(json));
    location.reload();
}
function updateTeam() {
    const addButton = document.getElementById("divMonstre").querySelectorAll("#addButton");
    addButton.forEach(button => {
        if (button.style.display === "block") {
            button.style.display = "none";
        } else {
            addButton.style.display = "block";
        }

    });
}