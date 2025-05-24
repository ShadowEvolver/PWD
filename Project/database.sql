CREATE DATABASE BookStore;
USE BookStore;

CREATE TABLE Book(
    BookID varchar(50),
    BookTitle varchar(200),
    Price double(12,2),
    Author varchar(128),
    Type varchar(128),
    Image varchar(128),
    PRIMARY KEY (BookID)
);

CREATE TABLE Users(
    UserID int not null AUTO_INCREMENT,
    UserName varchar(128),
    Password varchar(16),
    PRIMARY KEY (UserID)
);

CREATE TABLE Customer (
    CustomerID int not null AUTO_INCREMENT,
    CustomerName varchar(128),
    CustomerPhone varchar(12),
    CustomerEmail varchar(200),
    CustomerAddress varchar(200),
    CustomerGender varchar(10),
    UserID int,
    PRIMARY KEY (CustomerID),
    CONSTRAINT FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE `Order`(
    OrderID int not null AUTO_INCREMENT,
    CustomerID int,
    BookID varchar(50),
    DatePurchase datetime,
    Quantity int,
    TotalPrice double(12,2),
    Status varchar(1),
    PRIMARY KEY (OrderID),
    CONSTRAINT FOREIGN KEY (BookID) REFERENCES Book(BookID) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE Cart(
    CartID int not null AUTO_INCREMENT,
    CustomerID int,
    BookID varchar(50),
    Price double(12,2),
    Quantity int,
    TotalPrice double(12,2),
    PRIMARY KEY (CartID),
    CONSTRAINT FOREIGN KEY (BookID) REFERENCES Book(BookID) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE SET NULL ON UPDATE CASCADE
);

INSERT INTO `book`(`BookID`, `BookTitle`, `Price`, `Author`, `Type`, `Image`) VALUES ('B-001','The Big Picture: On the Origins of Life, Meaning, and the Universe Itself','123-456-789-1',136,'Sean Carroll','Science','image/science.jpg');
INSERT INTO `book`(`BookID`, `BookTitle`, `Price`, `Author`, `Type`, `Image`) VALUES ('B-002','Homeschooling: You are Doing It Right Just by Doing It','123-456-789-2',599,'Ginny Yurich MEd','Education','image/education.jpg');
INSERT INTO `book`(`BookID`, `BookTitle`, `Price`, `Author`, `Type`, `Image`) VALUES ('B-003','Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones','123-456-789-3',329,'James Clear ','Developement','image/developement.jpg');
INSERT INTO `book`(`BookID`, `BookTitle`, `Price`, `Author`, `Type`, `Image`) VALUES ('B-004','Easy Vegetarian Slow Cooker Cookbook','123-456-789-4',75.9,'Rockridge Press','Food','image/food.jpg');