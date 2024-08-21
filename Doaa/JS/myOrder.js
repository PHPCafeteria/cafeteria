// Get data from DB
let userId = 3;
async function getDataFromDB() {
    const startDate = document.getElementById('from-date').value;
    const endDate = document.getElementById('to-date').value;

    if (!startDate || !endDate) {
        console.error('Start date and end date are required.');
        return;
    }

    convertedStartDate = dateConverter(startDate);
    convertedEndDate = dateConverter(endDate);

    try {
        let data = await fetch(`/cafeteria/Doaa/PHP/user_orders.php?userId=${userId}&startDate=${convertedStartDate}&endDate=${convertedEndDate}`);
        let userOrders = await data.json();
        displayResults(userOrders);
    }
    catch (e) {
        console.log('Error in fetching data: ', e);
    }
}

// Convert picked dates to suitable format
function dateConverter(date) {
    let convertedDate = date.split('T');
    return convertedDate[0] + ' ' + convertedDate[1];
}

// Build table based on data
function displayResults(userOrders) {
    let table = document.getElementById("table");

    userOrders.forEach(userOrder => {
        let tableRow = document.createElement("tr");
        // console.log(typeof userOrders);
        //1st td
        let orderDateControl = document.createElement("td");
        let orderDate = document.createElement("span");
        orderDate.textContent = userOrder.date;
        orderDateControl.appendChild(orderDate);

        let button = document.createElement("button");
        button.textContent = "+";
        orderDateControl.appendChild(button);
        button.addEventListener("click", () => controlOrderDisplay(button, userOrder.idOrder));

        //2nd td
        let status = document.createElement("td");
        status.textContent = userOrder.status;

        //3rd td
        let amount = document.createElement("td");
        amount.textContent = userOrder.totalPrice;

        //4th td if there is any
        let action = document.createElement("td");
        if (userOrder.status === 'Processing') {
            let cancelButton = document.createElement("button");
            cancelButton.textContent = "Cancel";
            action.appendChild(cancelButton);
            cancelButton.addEventListener("click", () => cancelOrder(userOrder.idOrder));
        }

        // Append table data children to their parent row
        tableRow.appendChild(orderDateControl);
        tableRow.appendChild(status);
        tableRow.appendChild(amount);
        tableRow.appendChild(action);

        // Append table row to table
        table.appendChild(tableRow);
    });
}

// Handle cancel button clicking
async function cancelOrder(orderId) {
    try {
        let response = await fetch(`/cafeteria/Doaa/PHP/cancel_order.php?userId=${userId}&orderId=${orderId}`);
        let result = await response.json();
        alert(result);
    } catch (e) {
        console.log("Error in getting response: ", e);
    }
}

// Control order details display
const container = document.getElementById("display-section");
async function controlOrderDisplay(button, orderId) {

    // Confirm that order is not already shown
    if (button.textContent === "+") {
        button.textContent = "-"; // Change button content
        container.innerHTML = ""; // Empty previous shown order

        try {
            let orderDetails = await fetch(`/cafeteria/Doaa/PHP/order_details.php?orderId=${orderId}`);
            let orderItems = await orderDetails.json();
            displayOrder(orderItems);
        } catch (e) {
            console.log("Error in getting orders: ", e);
        }
    }

    // If the order is already shown
    else if (button.textContent === "-") {
        //In case of clicking button, toggle its state and hide order details
        button.addEventListener("click", () => {
            button.textContent = "+";
            container.innerHTML = "";
        });
    }
}

// Display order items
function displayOrder(orderItems) {
    orderItems.forEach(orderItem => {
        // Display item name 
        let name = document.createElement("div");
        name.textContent = orderItem.name;
        container.appendChild(name);

        // Display item price (price/item only)
        let price = document.createElement("div");
        price.textContent = orderItem.price;
        container.appendChild(price);

        // Display item image 
        let picture = document.createElement("div");
        picture.textContent = orderItem.picture;
        container.appendChild(picture);

        // Display number of each ordered item 
        let numOfProduct = document.createElement("div");
        numOfProduct.textContent = orderItem.numOfProduct;
        container.appendChild(numOfProduct);
    });
}