let userId = 1; // Shall need order id from DB

// Get orders data
const container = document.getElementById("display-section");
const buttons = document.querySelectorAll("#table-container button");

buttons.forEach(button => {
    button.addEventListener("click", () => controlOrderDisplay(button));
});

async function controlOrderDisplay(button) {

    // Confirm that order is not already shown
    if (button.textContent === "+") {
        button.textContent = "-"; // Change button content
        container.innerHTML = ""; // Empty previous shown order

        try {
            // Shall be replaced with order details coming from DB
            var orderDetails = await fetch(`https://jsonplaceholder.typicode.com/posts?userId=${userId}`);
            const orders = await orderDetails.json();
            displayOrder(orders);
        } catch (e) {
            console.log("Error in getting orders", e);
        }
    }
    
    // If the order is already shown
    else if (button.textContent === "-") {
        //In case of clicking button, toggle its state and hide order details
        button.addEventListener("click", () => {
            button.textContent = "+";
            container.innerHTML = ""; // Hide shown order
        });
    }
}

// Display order items
function displayOrder(orders) {
    orders.forEach(order => {
        var divItem = document.createElement("div");
        divItem.className = "order-item";
        divItem.textContent = order.title; // Shall be changed with order data
        container.appendChild(divItem);
    });
}


