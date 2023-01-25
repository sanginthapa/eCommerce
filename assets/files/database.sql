create database ultima;
use ultima;

--sliders table
create table sliders (
    id bigint primary key,
    slider_name varchar(255),
    img_path varchar(255),
    img1 varchar(255),
    img2 varchar(255),
    img3 varchar(255),
    img4 varchar(255),
    img5 varchar(255),
    img6 varchar(255),
    remarks varchar(255) 
);
INSERT INTO `sliders`(`id`, `slider_name`, `img_path`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `remarks`) VALUES ('1','slider one','assets/images/banners/','2.png','airbuds.jpg1','atom.jpg','banner0.jpg','banner2.jpg','banner3.jpg','banner7.jpg');

--user table
create table users(
    id bigint primary key,
    username varchar(255),
    email varchar(255),
    phone varchar(255),
    pass varchar(255),
    user_image_path varchar(255),
    user_img varchar(255),
    remarks varchar(255)
);
    INSERT INTO `users`(`id`, `username`, `email`, `phone`, `pass`,`user_image_path`,`user_img`,`remarks`) VALUES ('1','sangin','sangin@gmail.com','9847538520','sangin@12','img/User/','index.png','active');

-- productCategory
CREATE table category (
    id bigint primary key,
    category_name varchar(255) not null,
    category_type varchar(255) not null,
    category_id varchar(255) unique not null,
    remarks varchar(255)
);
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('1','earbuds','wireless','101','');
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('2','charger','wired','102','');
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('3','powerbank','wired','103','');
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('4','Neckband','Wireless','104','');
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('5','Speaker','Wireless','105','');
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('6','EarPhone','Wired','106','');
INSERT INTO `category`(`id`,`category_name`, `category_type`, `category_id`,`remarks`) VALUES ('7','DateCable','Wired','107','');


--table product
create TABLE products(
    id bigint primary key,
    product_name varchar(255) not null,
    category_id varchar(255) not null,
    actual_Price decimal(15,3) not null,
    sell_Price decimal(15,3) not null,
    img_path varchar(255) not null,
    primary_image varchar(255) not null,
    secondary_image varchar(255) not  null,
    url_link varchar(255) not  null,
    remarks varchar(255),
    foreign key (category_id) references category(category_id)
    );

--product data inserts
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (1,'Ultima Earbuds Atom 192','101','3599','2699','assets/images/products/','eardopesblue.png','openeardopesblue.png','atom192.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (2,'Ultima Earbuds Pro','101','2999','2599','assets/images/products/','earbudspro1.png','earbudspro2.png','earbudsPro.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (3,'Ultima Earbuds','101','2899','2399','assets/images/products/','earbud1.png','earbud2.png','earbud.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (4,'Ultima Beatz 355 Bluetooth Wireless Neckband','104','2699','2099','assets/images/products/','beatz355black2.png','beatz355black.png','beatzNeckband.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (5,'Wareless Neckband with Microphone','104','1899','1424','assets/images/products/','neckband yellow.png','neckband yellow 2.png','WirelessNeckBand.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (6,'Ultima 20W USB C Fast Charger','102','1099','949','assets/images/products/','20wchargerblack.png','20wchargerwhite.png','20Wcharger.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (7,'18 W Dual Port Charger','102','1099','999','assets/images/products/','18wcharger1.png','18wcharger.png','18Wcharger.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (8,'27 W Charge Adapter','102','1299','1099','assets/images/products/','27wchargerwhite.png','27wchargerwhite2.png','27Wcharger.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (9,'Ultima SW1 10W Bluetooth 5.0 Portable Stereo Speaker with Tws','105','2499','1999','assets/images/products/','sw1red.png','sw1yellow.png','SW1Speaker.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (10,'Ultima SW2 20W Bluetooth 5.0 Portable Stereo Speaker with Tws','105','3499','2849','assets/images/products/','speaker.png','speaker1.png','SW2Speaker.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (11,'Ultima Atom Pro 20000 MAh Powerbank PD and QC 3.0','103','3899','2999','assets/images/products/','20kpowerbankblack.png','20kpowerbankblue.png','20Kpowerbank.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (12,'Ultima Atom 10000 Mah Powerbank','103','3499','1999','assets/images/products/','10kpowerbank.png','10kpowerbankwhite.png','10Kpowerbank.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (13,'Ultima Micro Data Cable','107','500','350','assets/images/products/','datacablewhite.png','datacableblack.png','datacable.php','');
INSERT INTO `products`(`id`, `product_name`, `category_id`, `actual_Price`, `sell_Price`, `img_path`, `primary_image`, `secondary_image`, `url_link`, `remarks`) 
VALUES (14,'Ultima Rockerz Series ULT-030 Stereo Dynamic Earphone','106','649','349','assets/images/products/','earephonewhite.png','earphoneblack.png','earphone.php','');

-- color table
create table colors(
    id bigint primary key,
    color_name varchar(255) unique,
    color_code varchar(255) unique,
    remarks varchar(255)
);
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('1','Red','#ff0000','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('2','Black','#000000','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('3','Cyan','#00FFFF','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('4','Blue','#0000FF','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('5','Yellow','#FFFF00','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('6','Silver','#C0C0C0','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('7','White','#ffffff','');
INSERT INTO `colors`(`id`, `color_name`, `color_code`, `remarks`) VALUES ('8','Green','#008000','');


-- product varient table
create table productVariant(
    id bigint primary key,
    product_id bigint not null,
    color_id bigint not null,
    stock_in bigint default 0,
    stock_out bigint default 0,
    defective bigint,
    returned bigint,
    available bigint default (stock_in-stock_out-defective+returned),
    total bigint default (available+defective+returned),
    remarks varchar(255),
    foreign key (color_id) references colors(id),
    foreign key (product_id) references products(id)
);

--HERE PRODUCT_ID IS A PRODUCT VARIENT ID PLEASE NOTE THAT AND SEND INPUT, THANK YOU.
INSERT INTO `productVariant`(`id`, `product_id`, `color_id`, `stock_in`, `stock_out`, `defective`, `returned`, `remarks`) VALUES ('1','3','2','5000','2000','20','10','');
INSERT INTO `productVariant`(`id`, `product_id`, `color_id`, `stock_in`, `stock_out`, `defective`, `returned`, `remarks`) VALUES ('2','1','6','5000','2000','25','8','');
INSERT INTO `productVariant`(`id`, `product_id`, `color_id`, `stock_in`, `stock_out`, `defective`, `returned`, `remarks`) VALUES ('3','2','3','5000','2000','15','10','');
--NOTE : donot insert data in available and total fields because those values are automatically calculated.

--product variety feature images (in process)
CREATE table productVariant_image(
    id bigint primary KEY not null,
    product_id bigint not null,
    img_path varchar(255) not null,
    img varchar(255) not null,
    remarks varchar(255),
    foreign key(product_id) references products(id)
);
INSERT INTO `productvariant_image`(`id`, `product_id`, `img_path`, `img`, `remarks`) VALUES (1,1,'assets/images/products/','eardopesblue.png','');
INSERT INTO `productvariant_image`(`id`, `product_id`, `img_path`, `img`, `remarks`) VALUES (2,1,'assets/images/products/','eardopesblack.png','');
INSERT INTO `productvariant_image`(`id`, `product_id`, `img_path`, `img`, `remarks`) VALUES (3,1,'assets/images/products/','eardopesgray.png','');
----------------------------------product cart to sales to payment--------------------

-- cart table 
create table cart(
    id bigint primary key AUTO_INCREMENT,
    tmp_id varchar(255) not null,
    user_id bigint,
    remarks varchar(255),
    foreign key (user_id) references users(id)
    );

-- order table
CREATE TABLE orders(
    id bigint primary key AUTO_INCREMENT,
    quantity int(6) not null,
    product_variant_id bigint not null,
    cart_id bigint not null,
    remarks varchar(255),
    foreign key (product_variant_id) REFERENCES productVariant(id),
    foreign key (cart_id) REFERENCES cart(id)
    );


-- delivery address details table
create table deliveryDetails(
    id bigint primary key,
    phone_number varchar(255) not null,
    delivery_address varchar(255) not null,
);

-- checkout table 
create table checkOut(
    id bigint primary key,
    cart_id bigint not null,
    delivery_address varchar(255) not null,
    remarks varchar(255),
    foreign key(cart_id) references cart(id)
);


-- payment table
create table paymentDetails(
    id bigint primary key,
    payment_method varchar(255) not null,
    payable_amount decimal(15,3) not null,
    discount_amount decimal(15,3) default 0,
    total_receivable decimal(15,3) default(payable_amount-discount_amount),
    remarks varchar(255)
);

--sales table
create table sales(
    id bigint primary key,
    check_out_id bigint not null,
    payment_id bigint not null,
    payment_status BOOLEAN not null,
    remarks varchar(255),
    foreign key (check_out_id) references checkOut(id),
    foreign key(payment_id) references paymentDetails(id)
);

-- feedback / review table
CREATE TABLE reviews( 
    id bigint primary key AUTO_INCREMENT,
    product_id bigint not null,
    user_id bigint not null,
    user_name varchar(255) not null,
    review_point int(1) not null,
    review_message text not null,
    attachment varchar(255),
    submit_date int(11) not null,
    remarks varchar(255),
    FOREIGN KEY (user_id) references users(id),
    FOREIGN KEY (product_id) references products(id)
    );
    INSERT INTO `reviews`(`id`, `product_id`, `user_id`, `user_name`, `review_point`, `review_message`, `attachment`, `submit_date`, `remarks`) VALUES ('1','1','1','Sangin','5','Atom is best','a.png','8/15/2022 1:29','');
