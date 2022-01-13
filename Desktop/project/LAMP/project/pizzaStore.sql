Drop database project;

create database project;

use project;

CREATE TABLE `tblCustomers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `email_fk` (`email`)
);

CREATE TABLE `tblOrders` (
  `Orders_ID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Orders_ID`),
  FOREIGN KEY (`email`) REFERENCES `tblCustomers` (`email`)
  );

CREATE TABLE `tblPizza` (
  `Pizza_ID` int NOT NULL AUTO_INCREMENT,
  `dough` varchar(20) DEFAULT NULL,
  `cheese` varchar(20) DEFAULT NULL,
  `sauce` varchar(20) DEFAULT NULL,
  `toppings` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Pizza_ID`)
);

CREATE TABLE `tblPizzaOrders` (
  `PizzaOrders_ID` int NOT NULL AUTO_INCREMENT,
  `Orders_ID` int NOT NULL,
  `Pizza_ID` int NOT NULL,
  PRIMARY KEY (`PizzaOrders_ID`),
  FOREIGN KEY (`Orders_ID`) REFERENCES `tblOrders` (`Orders_ID`),
  FOREIGN KEY (`Pizza_ID`) REFERENCES `tblPizza` (`Pizza_ID`)
);



