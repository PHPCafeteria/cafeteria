// Get users and checks from DB
async function getUsersChecks() {
    try {
        let data = await fetch(`/cafeteria/Doaa/PHP/get_users_checks.php`);
        let usersAndChecks = await data.json();
        userPickerBuilder(usersAndChecks);
    }
    catch (e) {
        console.log('Error in fetching data: ', e);
    }
}

// Build user picker options
function userPickerBuilder(usersAndChecks) {
    const userPicker = document.getElementById('user-picker');
    usersAndChecks.forEach(element => {
        let option = document.createElement("option");
        option.value = element.id;
        option.textContent = element.name;
        userPicker.appendChild(option);
    });

    userPicker.addEventListener("change", function () {
        const selectedId = userPicker.value;
        userSelectedHandler(selectedId, usersAndChecks);
    });

    usersTableBuilder(usersAndChecks);
}

// Handle users display based on selected user
let usersTable = document.getElementById("users-table");
let userCard = document.getElementById("user-card");

function userSelectedHandler(selectedId, usersAndChecks) {
    let selectedUser = usersAndChecks.find(userAndCheck => userAndCheck.id === selectedId);
    usersTable.innerHTML = "";
    userCard.innerHTML = "";
    if (selectedUser) {
        userCardDisplay(selectedUser);
    } else {
        usersTableBuilder(usersAndChecks);
    }
}

// If admin, display all users checks
function usersTableBuilder(usersAndChecks) {

    // Create headers
    let tableHeaderRow = document.createElement("tr");
    let userNameHeader = document.createElement("th");
    userNameHeader.textContent = 'Name';
    let totalAmountHeader = document.createElement("th");
    totalAmountHeader.textContent = 'Total amount';

    // Append headers to their row
    tableHeaderRow.appendChild(userNameHeader);
    tableHeaderRow.appendChild(totalAmountHeader);

    // Append header row to table structure
    usersTable.appendChild(tableHeaderRow);

    // Display users by name and check
    usersAndChecks.forEach(userAndCheck => {
        let tableRow = document.createElement("tr");

        //1st td
        let userControl = document.createElement("td");

        let button = document.createElement("button");
        button.textContent = "+";
        userControl.appendChild(button);
        button.addEventListener("click", () => getOrders(button, userAndCheck.id));

        let userName = document.createElement("span");
        userName.textContent = userAndCheck.name;
        userControl.appendChild(userName);

        //2nd td
        let totalAmount = document.createElement("td");
        totalAmount.textContent = userAndCheck.check;

        // Append table data children to their parent row
        tableRow.appendChild(userControl);
        tableRow.appendChild(totalAmount);

        // Append table row to table
        usersTable.appendChild(tableRow);
    });
}

// If user, display its info only
function userCardDisplay(selectedUser) {

    // Display user name 
    let name = document.createElement("div");
    name.textContent = selectedUser.name;
    userCard.appendChild(name);

    // Display user email 
    let email = document.createElement("div");
    email.textContent = selectedUser.email;
    userCard.appendChild(email);

    // Display user room number 
    let roomNumber = document.createElement("div");
    roomNumber.textContent = selectedUser.roomNo;
    userCard.appendChild(roomNumber);

    // Display user picture 
    let pic = document.createElement("div");
    pic.textContent = selectedUser.picture;
    userCard.appendChild(pic);

    // Display user picture 
    let check = document.createElement("div");
    check.textContent = selectedUser.check;
    userCard.appendChild(check);
}

const ordersTable = document.getElementById("orders-table");
// Get orders from DB
async function getOrders(button, userId) {
    const startDate = document.getElementById('from-date').value;
    const endDate = document.getElementById('to-date').value;

    if (!startDate || !endDate) {
        alert('Start date and end date are required.');
        return;
    }

    convertedStartDate = dateConverter(startDate);
    convertedEndDate = dateConverter(endDate);

    // Confirm that user is not already shown
    if (button.textContent === "+") {
        button.textContent = "-"; // Change button content
        ordersTable.innerHTML = ""; // Empty previous shown user

        try {
            let data = await fetch(`/cafeteria/Doaa/PHP/user_orders.php?
                userId=${userId}&startDate=${convertedStartDate}&endDate=${convertedEndDate}`);
            let userOrders = await data.json();
            displayOrders(userOrders);
        }
        catch (e) {
            console.log('Error in fetching data: ', e);
        }
    }

    // If the user is already shown
    else if (button.textContent === "-") {
        //In case of clicking button, toggle its state and hide user orders
        button.addEventListener("click", () => {
            button.textContent = "+";
            ordersTable.innerHTML = "";
        });
    }
}

// Convert picked dates to suitable format
function dateConverter(date) {
    let convertedDate = date.split('T');
    return convertedDate[0] + ' ' + convertedDate[1];
}

// Build orders table based on picked user
function displayOrders(userOrders) {
    ordersTable.textContent = '';
    // Create headers
    let tableHeaderRow = document.createElement("tr");
    let orderDateHeader = document.createElement("th");
    orderDateHeader.textContent = 'Order Date';
    let amountHeader = document.createElement("th");
    amountHeader.textContent = 'Amount';

    // Append headers to their row
    tableHeaderRow.appendChild(orderDateHeader);
    tableHeaderRow.appendChild(amountHeader);

    // Append header row to table structure
    ordersTable.appendChild(tableHeaderRow);

    // Display orders by date and amount
    userOrders.forEach(userOrder => {
        let tableRow = document.createElement("tr");

        //1st td
        let orderDateControl = document.createElement("td");

        let button = document.createElement("button");
        button.textContent = "+";
        orderDateControl.appendChild(button);
        button.addEventListener("click", () => controlOrderDisplay(button, userOrder.idOrder));

        let orderDate = document.createElement("span");
        orderDate.textContent = userOrder.date;
        orderDateControl.appendChild(orderDate);

        //2rd td
        let amount = document.createElement("td");
        amount.textContent = userOrder.totalPrice;

        // Append table data children to their parent row
        tableRow.appendChild(orderDateControl);
        tableRow.appendChild(amount);

        // Append table row to table
        ordersTable.appendChild(tableRow);
    });
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
            displayOrderDetails(orderItems);
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
function displayOrderDetails(orderItems) {

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

getUsersChecks(); // Initialize logic 