// var cont = document.getElementById("container_");

async function x(){
    try{
    var result  = await fetch("http://localhost/cafeteria/gad/orders.php");
    // console.log(result);
    var users =  await result.json();
    users.forEach(async el => {
        let deliver;
        if(el['action'] == 1){
            deliver = 'deliver';
        }
        else{
            deliver = 'under Processing';
        }
        var table  = $(`
            <table cellspacing="0" cellpadding="1">
                <tr>
                    <th style="width:22%">Order Date</th>
                    <th style="width:22%">Name</th>
                    <th style="width:12%">Room</th>
                    <th style="width:12%">Ext.</th>
                    <th style="width:12%">Action</th>
                </tr>
                <tr>
                    <td>${el['date']}</td>
                    <td>${el['name']}</td>
                    <td>${el['roomNo']}</td>
                    <td>${el['ext']}</td>
                    <td>${deliver}</td>
                </tr>
             </table>
             <div class="orders order${el['idOrder']}">
                <div class="row row-cols-md-6 ordered${el['idOrder']}"></div>
            </div>
        `)
        $(".container").append(table);

        var result1  = await fetch("http://localhost/cafeteria/gad/returnProduct.php");
        var prodect =  await result1.json();
        console.log(prodect);
        prodect.forEach(el1 => {
                let div_ = $(`
                    <div class="col" style="min-width:120px;">
                        <div class="card" style="border:0px">
                        <img src="1.jpeg" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align:center">Card title</h5>
                                <h5 class="card-title" style="text-align:center">${el1['numOfProduct']}</h5>
    
                            </div>
                        </div>
                    </div>
                `);
                $(`.ordered${el['idOrder']}`).append(div_);
        })
        let price = $('<div style="text-align: right; font-size: 20px;">Total: EGP 50</div>');
        $(`.order${el['idOrder']}`).append(price);

    });
    console.log(users);
    }
    catch(e){
        console.log(e);
    }
}
x();