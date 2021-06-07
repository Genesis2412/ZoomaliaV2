CREATE DATABASE Zoomalia;

CREATE TABLE Dog(

	DogId	VARCHAR(225)		NOT NULL
			CHECK (DogId LIKE('D%')),
	Name 	VARCHAR(25)		NOT NULL,
	Breed	VARCHAR(50)		NOT NULL,
	Image	VARCHAR(50)		NOT NULL,
	Status	VARCHAR(10)		NOT NULL,

	PRIMARY KEY(DogId)
);

INSERT INTO Dog(DogId,Name,Breed,Image,Status)
VALUES
	('D001','Jacky','German Shepherd','./img/d1.jpg','No'),
	('D002','Mike','None','./img/d2.jpg','No'),
	('D003','Rocky','Golden Retriever','./img/d3.jpg','No'),
	('D004','Joss','None','./img/d4.jpg','No'),
	('D005','Kurt','K-9','./img/d5.jpg','No'),
	('D006','Meadow','Pug','./img/d6.jpg','No');

CREATE TABLE Cat(

	CatId	VARCHAR(225)		NOT NULL
			CHECK (CatId LIKE ('C%')),
	Name 	VARCHAR(25)		NOT NULL,
	Breed	VARCHAR(50)		NOT NULL,
	Image	VARCHAR(50)		NOT NULL,
	Status	VARCHAR(10)		NOT NULL,

	PRIMARY KEY(CatId)
);

INSERT INTO Cat(CatId,Name,Breed,Image,Status)
VALUES
	('C001','Misty','Persian','./img/c1.jpg','No'),
	('C002','Sammy','Bengal','./img/c2.jpg','No'),
	('C003','Patch','Ragdoll','./img/c3.jpg','No'),
	('C004','Simba','Maine Coon','./img/c4.jpg','No'),
	('C005','Kitty','None','./img/c5.jpg','No'),
	('C006','Oreo','None','./img/c6.jpg','No');




CREATE TABLE Adoption(

	AdopterId		INT(225)		AUTO_INCREMENT,
	FirstName		VARCHAR(25)		NOT NULL,
	LastName		VARCHAR(20)		NOT NULL,
	Address			VARCHAR(50)		NOT NULL,
	Email			VARCHAR(225)	NOT NULL,
	PhoneNumber		INT(8)			NOT NULL,
	TelephoneNumber	INT(7)			NOT NULL,
	PetId			VARCHAR(225)	NOT NULL,

	PRIMARY KEY(AdopterId)
);


CREATE TABLE Users(

	UserId		INT(225)		AUTO_INCREMENT,
	FirstName	VARCHAR(25)		NOT NULL,
	LastName	VARCHAR(20)		NOT NULL,
	Email		VARCHAR(225)	NOT null,
	Password	CHAR(32)		NOT NULL,

	PRIMARY KEY(userId)
);

CREATE TABLE messageInfo(
	MessengerId		INT(225)		AUTO_INCREMENT,
	FirstName 		VARCHAR(25) 	NOT NULL,
	LastName 		VARCHAR(20) 	NOT NULL,
	PhoneNo 		INT(8) 			NOT NULL,
	Email 			VARCHAR(225)	NOT NULL,
	Message 		VARCHAR(1000) 	NOT NULL,

	PRIMARY KEY(MessengerId)
);

CREATE TABLE donation(
	DonorId			INT(225)		AUTO_INCREMENT,
	FirstName 		VARCHAR(25) 	NOT NULL,
	LastName 		VARCHAR(40) 	NOT NULL,
	Email 			VARCHAR(45) 	NOT NULL,
	Phone 			INT 			NOT NULL,
	City 			VARCHAR(30) 	NOT NULL,
	Zip 			INT 			NOT NULL,
	Address 		VARCHAR(50) 	NOT NULL,
	AccountNo 		BIGINT 			NOT NULL,
	ExpiryMonth 	VARCHAR(15) 	NOT NULL,
	ExpiryYear 		INT 			NOT NULL,
	Amount 			INT 			NOT NULL,
	DateDone		TIMESTAMP,
	PRIMARY KEY(DonorId)
);