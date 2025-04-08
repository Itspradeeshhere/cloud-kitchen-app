document.getElementById("menu-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form from refreshing

    let date = document.getElementById("menu-date").value;
    let mealType = document.getElementById("meal-type").value;
    let itemName = document.getElementById("item-name").value;
    let quantity = parseInt(document.getElementById("quantity").value);
    let sufficientFor = document.getElementById("sufficient-for").value;
    let price = parseFloat(document.getElementById("price").value);
    let editId = document.getElementById("edit-id").value;

    if (!date || !mealType || !itemName || isNaN(quantity) || quantity <= 0 || !sufficientFor || isNaN(price) || price <= 0) {
        alert("Please fill in all fields correctly!");
        return;
    }

    let formData = new FormData();
    formData.append("date", date);
    formData.append("mealType", mealType);
    formData.append("itemName", itemName);
    formData.append("quantity", quantity);
    formData.append("sufficientFor", sufficientFor);
    formData.append("price", price);

    // If edit ID exists, update the record
    if (editId) {
        formData.append("id", editId);
        fetch("edit_menu.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data);
                fetchMenu();
                document.getElementById("menu-form").reset();
                document.getElementById("edit-id").value = "";
            })
            .catch(error => console.error("Error:", error));
    } else {
        // Add new menu
        fetch("add_menu.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data);
                fetchMenu();
                document.getElementById("menu-form").reset();
            })
            .catch(error => console.error("Error:", error));
    }
});

function fetchMenu() {
    fetch("fetch_menu.php")
        .then(response => response.json())
        .then(data => {
            let todayMenu = document.getElementById("today-menu");
            let upcomingMenu = document.getElementById("upcoming-menu");

            todayMenu.innerHTML = "";
            upcomingMenu.innerHTML = "";

            let today = new Date().toISOString().split('T')[0];

            data.forEach(menu => {
                let row = `<tr>
                    <td>${menu.date}</td>
                    <td>${menu.mealType}</td>
                    <td>${menu.itemName}</td>
                    <td>${menu.quantity}</td>
                    <td>${menu.sufficientFor}</td>
                    <td>${menu.price}</td>
                    
                       
                    
                </tr>`;

                if (menu.date === today) {
                    todayMenu.innerHTML += row;
                } else {
                    upcomingMenu.innerHTML += row;
                }
            });
        })
        .catch(error => console.error("Error fetching menu:", error));
}

function populateForm(menu) {
    document.getElementById("menu-date").value = menu.date;
    document.getElementById("meal-type").value = menu.mealType;
    document.getElementById("item-name").value = menu.itemName;
    document.getElementById("quantity").value = menu.quantity;
    document.getElementById("sufficient-for").value = menu.sufficientFor;
    document.getElementById("price").value = menu.price;
    document.getElementById("edit-id").value = menu.id;
}

function deleteMenu(id) {
    if (confirm("Are you sure you want to delete this menu item?")) {
        fetch("delete_menu.php?id=" + id)
            .then(response => response.text())
            .then(data => {
                alert(data);
                fetchMenu();
            })
            .catch(error => console.error("Error deleting:", error));
    }
}

// Initial fetch
fetchMenu();




  
