
CREATE TABLE Member
(
    member_id int NOT NULL AUTO_INCREMENT,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    age int NOT NULL,
    gender varchar(225),
    phone char(10) NOT NULL,
    email varchar(255) NOT NULL,
    state varchar(255),
    seeking varchar(255),
    bio varchar(255),
    premium tinyint,
    project_image varchar(255),


    PRIMARY KEY (member_id)
);

CREATE TABLE Interests (
interest_id int NOT NULL AUTO_INCREMENT,
interest varchar(255),
type varchar(255),
PRIMARY KEY (interest_id)
);

CREATE TABLE member_interest
(
member_id int NOT NULL,
interest_id int NOT NULL,
FOREIGN KEY (member_id) REFERENCES Member (member_id) ON UPDATE CASCADE,
FOREIGN KEY (interest_id) REFERENCES Interest (interest_id) ON UPDATE CASCADE
);

INSERT INTO Interests VALUES(
DEFAULT, "TV", "indoor"),
(DEFAULT,"Puzzles","indoor"),
(DEFAULT,"Movies","indoor"),
(DEFAULT,"Reading","indoor"),
(DEFAULT,"Cooking","indoor"),
(DEFAULT,"Playing cards","indoor"),
(DEFAULT,"Board games","indoor"),
(DEFAULT,"video games","indoor"),
(DEFAULT, "Hiking", "outdoor"),
(DEFAULT,"Walking","outdoor"),
(DEFAULT,"Biking","outdoor"),
(DEFAULT,"Climbing","outdoor"),
(DEFAULT,"Swimming","outdoor"),
(DEFAULT,"Collecting stones","outdoor"),
(DEFAULT,"Boardgames","outdoor"),
(DEFAULT,"video games","outdoor");


