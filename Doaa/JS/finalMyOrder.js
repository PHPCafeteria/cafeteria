// Get data from DB

let userId = 2;
async function getDataFromDB() {
    const startDate = document.getElementById('from-date').value;
    const endDate = document.getElementById('to-date').value;

    if (!startDate || !endDate) {
        console.error('Start date and end date are required.');
        return;
    }

    convertedStartDate = dateConverter(startDate);
    convertedEndDate = dateConverter(endDate);

    //////// depends on DB ////////
    try {

        let url = `/cafeteria/Doaa/PHP/my_orders.php?userId=${userId}&startDate=${convertedStartDate}&endDate=${convertedEndDate}`
        let data = await fetch(url);

        let userOrders = await data.json();
        console.log(userOrders);
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
        orderDate.textContent = userOrder.date;                   /////////////////////
        orderDateControl.appendChild(orderDate);

        let button = document.createElement("button");
        button.textContent = "+";
        orderDateControl.appendChild(button);
        button.addEventListener("click", () => controlOrderDisplay(button, userOrder.idOrder));

        //2nd td
        let status = document.createElement("td");
        status.textContent = userOrder.status;               /////////////////////

        //3rd td
        let amount = document.createElement("td");
        amount.textContent = userOrder.totalPrice;               /////////////////////        

        //4th td if there is any
        let action = document.createElement("td");
        action.textContent = !userOrder.action ? 'cancelled' : '';

        // Append table data children to their parent row
        tableRow.appendChild(orderDateControl);
        tableRow.appendChild(status);
        tableRow.appendChild(amount);
        tableRow.appendChild(action);

        // Append table row to table
        table.appendChild(tableRow);
    });
}

// Get orders data
// const buttons = document.querySelectorAll("#table button");

// buttons.forEach(button => {
//     button.addEventListener("click", () => controlOrderDisplay(button));
// });

// Control order details display
async function controlOrderDisplay(button, orderId) {
    const container = document.getElementById("display-section");

    // Confirm that order is not already shown
    if (button.textContent === "+") {
        button.textContent = "-"; // Change button content
        container.innerHTML = ""; // Empty previous shown order

        try {
            //////// depends on DB ////////
            let orderDetails = await fetch(`/cafeteria/Doaa/PHP/order_details.php?orderId=${orderId}`);
            const orderItems = await orderDetails.json();
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
    orderItem.forEach(order => {
        let divItem = document.createElement("div");
        divItem.className = "order-item";
        divItem.textContent = order.title;               /////////////////////
        container.appendChild(divItem);
    });
}