// Get data from DB
async function getDataFromDB() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    //////// depends on DB ////////
    try {
        let rawData = await fetch(`search.php?startDate=${startDate}&endDate=${endDate}`);
        let data = await rawData.json();
        displayResults(data);
    }
    catch (e) {
        console.error('Error fetching data:', e);
    };
}

// Build table based on data
function displayResults(data) {
    const table = document.getElementById("table");
    data.forEach(d => {
        let tableRow = document.createElement("tr");
        //1st td
        let orderDate = document.createElement("td");
        let span = document.createElement("span");
        span.textContent = d['date'];                   /////////////////////
        let button = document.createElement("button");
        button.textContent = "+";
        tableData.appendChild(span);
        tableData.appendChild(button);
        //2nd td
        let status = document.createElement("td");
        status.textContent = d['status'];               /////////////////////
        //3rd td
        let amount = document.createElement("td");
        amount.textContent = d['amount'];               /////////////////////        
        //4th td if there is any
        let action = document.createElement("td")
        amount.textContent = d['action'] ? d['action'] : '';        /////////////////////
        table.appendChild(tableRow);
    });
}

// Get orders data
const container = document.getElementById("display-section");
const buttons = document.querySelectorAll("#table-container button");

buttons.forEach(button => {
    button.addEventListener("click", () => controlOrderDisplay(button));
});

// Control order details display
async function controlOrderDisplay(button) {

    // Confirm that order is not already shown
    if (button.textContent === "+") {
        button.textContent = "-"; // Change button content
        container.innerHTML = ""; // Empty previous shown order

        try {
            //////// depends on DB ////////
            let orderDetails = await fetch(`orders.php?orderId=${orderId}`);
            const orderItems = await orderDetails.json();
            displayOrder(orderItems);
        } catch (e) {
            console.log("Error in getting orders", e);
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