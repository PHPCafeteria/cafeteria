
const date = new Date();

const date_ = date.toJSON().slice(0,10);
const time_ = date.toJSON().slice(12,19);
$('.date_').text(date_+' ' +time_);

var order = {
    // Attributes
    note: "",
    userName: "",
    totalPrice:0,
    room:0,
    // Associative array (object with key-value pairs)
    products: []
};

try {
    fetch("http://localhost/cafeteria/asmaa/orderAdmin/Product.php")
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => Promise.reject(data.error));
            }
            return response.json();
        })
        .then(data => {
            data.forEach(el => {
                let div_ = `
                    <div class="col">
                        <input type="hidden" value=${el['idProduct']} id="input${el['idProduct']}">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/tea.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center name" id="name${el['idProduct']}">${el['name']}</h5>
                                <p class="card-text text-center price" id="price${el['idProduct']}">${el['price']}</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" id="add${el['idProduct']}" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" id="remove${el['idProduct']}" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $(".addProduct").append(div_);
            });
        })
        .catch(e => {
            console.error('An error occurred:', e);
            alert('Failed to load products. Please try again later.');
        });
} catch (e) {
    console.log(e);
}
var sum=0;


$(document).on("click", ".addBtn, .removeBtn", function() {

    let idx = $(this).attr('id').replace(/add|remove/, '');
    // console.log(idx);
    let name = $(`#name${idx}`).text();
    let id = $(`#input${idx}`).val();
    console.log(id);

    let price = $(`#price${idx}`).text();
    if ($(this).hasClass('addBtn')) {
        let num1 = $(`.tt`).find(`#${idx}`);
        let num2 = $(`.tt`).find(`#${idx}1`);
        //  console.log(num1[0]);
         sum+=(+price);
        if (num1.length > 0) {
            let numP = +num1.text() + 1;
            num1.text(numP);
            let numPri = numP * price;
            num2.text(numPri);
            $(".totalPrice").text(`Total: $ ${sum}`);
            let x = order.products.filter(products => products.name === id);
            x[0].num++;
            console.log(x[0]);
        } else {
            let obj={"name":id,"num":1};
            order.products.push(obj);
            $(".totalPrice").text(`Total: $ ${sum}`);
            let div_ = `
            <div class="row tt">
            <hr>
                    <div class="col-xl-5">
                        <p class="product">${name}</p>
                    </div>
                    <div class="col-xl-5">
                        <p id=${idx}>1</p>
                    </div>
                    <div class="col-xl-2">
                        <p class="float-end price" id=${idx}1>${price}</p>
                    </div>
                </div>`;
            $(".requests").append(div_);
        }
    } else if ($(this).hasClass('removeBtn')) {
        let num2 = $(`.tt`).find(`#${idx}`);
        let num4 = $(`.tt`).find(`#${idx}1`);
        if (num2.length > 0) {
            let x = order.products.filter(products => products.name === name);
            x[0].num--;
            console.log(x[0]);
            if(x[0].num == 0){
                console.log(11111);
                order.products = order.products.filter(products => products.name !== name);
                console.log(order);
            }
            let y = +num2.text() - 1;
            let numPri = y * price;
            sum-=(+price);
            $(".totalPrice").text(`Total: $ ${sum}`);
            if (y > 0) {
                num2.text(y);
                num4.text(numPri);
            } else {
                num2.closest('.tt').remove(); // Remove the item when quantity reaches 0
            }
        } else {
            console.log('Item not found to remove');
        }
    }
    console.log(order);
});


// Latest order 


    $('.confirm').on("click", function() {
        try {
            // Define the order object with all necessary data
            order.note = $('.note').val();
            order.userName = $('.userName').text();
            order.totalPrice = sum; // Assume sum is calculated somewhere in your JS code
            order.userId = 3; // Assuming you have an element with the user ID
            order.room = $('#roomNum').val();
            
            // Populate the products array with the selected products
            // order.products = [];
            // $('.tt').each(function() {
            //     let id = $(this).find('.product').data('productId'); // Make sure each product has data-product-id
            //     let num = $(this).find('.quantity').text(); // Adjust selector based on your HTML structure
            //     order.products.push({ id: id, num: num });
            // });
            
            console.log(order); // Log the order object for debugging
            
            fetch("http://localhost/cafeteria/asmaa/orderAdmin/insertOrder.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(order)
            })
            .then(response => response.text())  // Change to .text() to capture raw response
            .then(data => {
                console.log('Raw response:', data); // Log raw response for debugging
                try {
                    const jsonData = JSON.parse(data); // Attempt to parse JSON response
                    if (jsonData.success) {
                        alert('Order placed successfully!');
                        // Optionally, clear the cart or redirect the user
                    } else {
                        alert('Failed to place order: ' + jsonData.message);
                    }
                } catch (e) {
                    console.error('Failed to parse JSON:', e);
                    alert('Server returned an unexpected response.');
                }
            })
            .catch(e => {
                console.error('An error occurred:', e);
                alert('Failed to place order. Please try again later.');
            });
        } catch (e) {
            console.log(e);
        }
    });
    