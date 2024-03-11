var itemList;

function setItemList(data) {
    itemList = data;
}
function getItemList() {
    return itemList;
}

function loadInventory(itemsList) {
    var data = getData();
    const inventory = data.Player_Inventory;
    const divItems = document.getElementById("myItems");
    inventory.forEach(item => {
        itemsList.forEach(itemList => {
            if (item.itemId === itemList.idItem) {
                createItemCard(divItems, itemList, item);
            }
        });
    });
}
function createItemCard(div, item, itemJs) {
    const itemDiv = document.createElement("div");
    itemDiv.classList.add("card", "my-3", "mx-3", "p-3", "bg-white", "rounded-lg", "shadow-md", "flex", "flex-col", "items-center", "justify-center");
    itemDiv.id = item.idItem;

    const cardDiv = document.createElement("div");
    cardDiv.classList.add("flex", "flex-col", "items-center", "justify-center", "w-full", "max-w-sm", "mx-auto", "m-3");

    const img = document.createElement("img");
    img.src = "img/img.png" //TODO: Change this to the actual image
    img.classList.add("w-32", "h-32", "object-cover", "object-center", "rounded-full");
    cardDiv.appendChild(img);

    const h2 = document.createElement("h2");
    h2.classList.add("text-lg", "text-gray-900", "font-medium", "title-font", "my-4");
    h2.textContent = item.name;
    cardDiv.appendChild(h2);

    const h3 = document.createElement("h3");
    h3.classList.add("text-gray-500", "text-sm", "mb-4");
    h3.textContent = itemJs.quantity;
    cardDiv.appendChild(h3);

    itemDiv.appendChild(cardDiv);

    div.appendChild(itemDiv);
}

function removeitemCard(id) {
    const div = document.getElementById(id);
    div.remove();
}


function buyItem(id, qty, price, currency) {
    removeAlert();
    const data = getData();
    const inventory = data.Player_Inventory;
    var money = data.Player_Info.money;
    var gems = data.Player_Info.gems;
    const div = document.getElementById("myItems")
    if (currency === "money") {
        if (money >= price) {
            money -= price;
            if (inventory.some(item => item.itemId === id)) {
                const index = inventory.findIndex(item => item.itemId === id);
                var quantity = parseInt(inventory[index].quantity);
                inventory[index].quantity = parseInt(qty) + quantity;
            }
            else {
                inventory.push({ itemId: id, quantity: qty });
            }

            if (div.contains(document.getElementById(id))) {
                removeitemCard(id);
                createItemCard(div, itemList.find(item => item.idItem === id), inventory.find(item => item.itemId === id));
            }
            else {
                createItemCard(div, itemList.find(item => item.idItem === id), inventory.find(item => item.itemId === id));
            }

            data.Player_Info.money = money;
            save(data);
            updateInfoPlayer();
            addAlert("success", "🎉 Achat réussi 🎉", "Félicitations, vous avez acheté <span><strong>" + itemList.find(item => item.idItem === id).name + "</strong></span>", "", "OK", function () { return removeAlert(); });

        } else {
            addAlert("alert", "❌ Pas assez d'argent ❌", "Vous n'avez pas assez d'argent pour acheter cet item", "", "OK", function () { return removeAlert(); });
        }
    } else {
        if (gems >= price) {
            gems -= price;
            if (inventory.some(item => item.itemId === id)) {
                const index = inventory.findIndex(item => item.itemId === id);
                inventory[index].quantity += qty;
            }
            else {
                inventory.push({ itemId: id, quantity: qty });
            }

            if (div.contains(document.getElementById(id))) {
                removeitemCard(id);
                createItemCard(div, itemList.find(item => item.idItem === id), inventory.find(item => item.itemId === id));
            }
            else {
                createItemCard(div, itemList.find(item => item.idItem === id), inventory.find(item => item.itemId === id));
            }

            data.Player_Info.gems = gems;
            save(data);
            updateInfoPlayer();
            addAlert("success", "🎉 Achat réussi 🎉", "Félicitations, vous avez acheté <span><strong>" + itemList.find(item => item.idItem === id).name + "</strong></span>", "", "OK", function () { return removeAlert(); });
        } else {
            addAlert("alert", "❌ Pas assez de gemmes ❌", "Vous n'avez pas assez de gemmes pour acheter cet item", "", "OK", function () { return removeAlert(); });
        }
    }
}
function buyAlert(id, qty, price, currency) {
    var itemList = getItemList();
    var item = itemList.find(item => item.idItem === id);
    addAlert(
        "success",
        "Confirmation d'achat",
        "Voulez-vous vraiment acheter cet item?",
        "<span><strong>" + qty + "x " + item.name + "</strong></span> pour <span><strong>" + formatNumber(item.price * qty) + "</strong></span> <i class='fa-solid fa-coins fa-lg'></i>",
        "Acheter",
        function () { return buyItem(id, qty, price * qty, currency); },
        "Annuler",
        function () { return removeAlert(); },
    );
}
function updatePrice(itemId, price) {
    var quantity = document.getElementById('quantity_' + itemId).value;
    var totalPrice = quantity * price;
    document.getElementById('price_' + itemId).innerHTML = formatNumber(totalPrice) + " <i class='fa-solid fa-coins fa-lg'></i>";

}