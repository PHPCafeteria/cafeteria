
async function getProducts() {
    try {
        let response = await fetch(`/cafeteria/Doaa/PHP/asmaa/get_products.php`);
        let result = await response.json();
        console.log(result);
    } catch (e) {
        console.log("Error in getting response: ", e);
    }
}


async function getUsers() {
    try {
        let response = await fetch(`/cafeteria/Doaa/PHP/asmaa/get_users.php`);
        let result = await response.json();
        console.log(result);
    } catch (e) {
        console.log("Error in getting response: ", e);
    }
}

item = 'te';
async function getSearchResults(item) {
    try {
        let response = await fetch(`/cafeteria/Doaa/PHP/asmaa/search_products.php?item=${item}`);
        let result = await response.json();
        console.log(result);
    } catch (e) {
        console.log("Error in getting response: ", e);
    }
}


const userId = 2;
const price = 5;
const date = getFormattedDateTime();
const notes = 'no notes';
const totalPrice = 10;

function getFormattedDateTime() {
    const now = new Date();
    
    // Get components of the date
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so add 1
    const day = String(now.getDate()).padStart(2, '0');
    
    // Get components of the time
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    
    // Format the date and time
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

async function addOrder(userId, date, notes, totalPrice) {
    try {
        let response = await fetch(`/cafeteria/Doaa/PHP/asmaa/add_order.php`, {
            method: "POST",
            body: JSON.stringify({
                userId: `${userId}`,
                date: `${date}`,
                notes: `${notes}`,
                totalPrice: `${totalPrice}`
            })
        });
        let orders = await response.json();
        console.log(result);
        // addUserOrder(result.idOrder);
        // addOrderProduct(result.idOrder);
    } catch (e) {
        console.log("Error in getting response: ", e);
    }
}

addOrder(userId, price, date, notes, totalPrice);

// async function addUserOrder(userId, orderId) {
//     try {
//         let response = await fetch(`/cafeteria/Doaa/PHP/asmaa/search_products.php?userId=${userId}&orderId=${orderId}`);
//         let userOrder = await response.json();
//         console.log(result);
//     } catch (e) {
//         console.log("Error in getting response: ", e);
//     }
// }

// async function addOrderProduct(orderId, productId, numOfProduct) {
//     try {
//         let response = await fetch(`/cafeteria/Doaa/PHP/asmaa/add_orderProduct.php`, {
//             method: "POST",
//             body: JSON.stringify({
//                 userId: `${userId}`,
//                 productId: `${productId}`,
//                 numOfProduct: `${numOfProduct}`
//             })
//         });
//         let orderProducts = await response.json();
//         console.log(orderProducts);
//     } catch (e) {
//         console.log("Error in getting response: ", e);
//     }
// }


// getUsers();x
// getSearchResults(item);

