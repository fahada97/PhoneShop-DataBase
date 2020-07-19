create table tbluser
(userid int primary key auto_increment,
firstname varchar(10),
lastname varchar(10),
email varchar(50),
phone varchar(15),
password varchar(20),
type varchar(5)
);

create table tblphone
(phoneid int primary key auto_increment,
phone_vendor varchar (10),
phone_name varchar (20),
screen_size varchar(20),
memory varchar(10),
phone_price double
);

create table tblorder
(orderid int primary key auto_increment,
userid int,
phoneid int,
foreign key(userid) references tbluser(userid),
foreign key(phoneid) references tblphone(phoneid)
);

create table tblcancel
(
cancelorderid int primary key
);


INSERT INTO tbluser (userid, firstname, lastname, email, phone, password, type) VALUES (1, 'Fahad', 'Ahmed', 'admin', '201-454-5454', 'admin', 'admin');

INSERT into tblphone VALUES (1000, 'Apple', 'iPhone 8', '4.7', '64GB', 449);
INSERT into tblphone VALUES (1001, 'Apple', 'iPhone 8 Plus', '5.5', '64GB', 549);
INSERT into tblphone VALUES (1002, 'Apple', 'iPhone XR', '6.1', '64GB', 599);
INSERT into tblphone VALUES (1003, 'Apple', 'iPhone XR', '6.1', '128GB', 649);
INSERT into tblphone VALUES (1004, 'Apple', 'iPhone 11', '5.8', '64GB', 699);
INSERT into tblphone VALUES (1005, 'Apple', 'iPhone 11', '5.8', '128GB', 749);
INSERT into tblphone VALUES (1006, 'Apple', 'iPhone 11', '5.8', '256GB', 849);

INSERT into tblphone VALUES (1007, 'Google', 'Google Pixel 4', '5.7', '64GB', 799);
INSERT into tblphone VALUES (1008, 'Google', 'Google Pixel 4 XL', '6.3', '64GB', 899);
INSERT into tblphone VALUES (1009, 'Google', 'Google Pixel 3a', '5.6', '64GB', 449);
INSERT into tblphone VALUES (1010, 'Google', 'Google Pixel 3a XL', '6.0', '64GB', 529);