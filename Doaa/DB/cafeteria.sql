
use cafeteria;

create table user(
    id int primary key,
    name varchar(50),
    email varchar(40) unique,
    password varchar(12),
    roomNo int,
    picture varchar(100)
    );

alter table user modify id int auto_increment;

create table room(
    roomNo int primary key,
    ext int,
   name varchar(30)
   );


alter table user add constraint fk_user_room
       foreign key (roomNo) references room(roomNo)
       on delete cascade 
       on update cascade;
      

create table orders( 
       idOrder int auto_increment primary key, 
       date timestamp default current_timestamp,
       notes varchar(200),
       status enum('Done', 'Processing', 'Out for delivery'),
       totalPrice int default 0,
       action int default 1
       );


create table userOrder(
       idUser int,
       idOrder int,
       primary key(idUser, idOrder),
       constraint fk_userOrder_user foreign key(idUser) references user(id)
       on delete cascade 
       on update cascade,
       constraint fk_userOrder_orders foreign key (idOrder) references orders(idOrder)
       on delete cascade 
       on update cascade
      );


create table catogary(
     idCatogry int auto_increment primary key,
     name varchar(30)
     );

mysql> alter table catogary modify name varchar(30) unique;

 create table product(
     idProduct int auto_increment primary key,
     name varchar(50),
     price float,
     available int default 1,
     picture varchar(100),
     idCatogry int,
     constraint fk_product_catogary foreign key (idCatogry) references catogary(idCatogry)
     on delete cascade
     on update cascade
     );


create table orderProduct(
     idOrder int,
     idProduct int,
     numOfProduct float default 0,
     primary key (idOrder, idProduct),
     constraint fk_orderProduct_order foreign key (idOrder) references orders(idOrder)
     on delete cascade 
     on update cascade,
     constraint fk_orderProduct_product foreign key (idProduct) references product(idProduct)
     on delete cascade
     on update cascade
     );

