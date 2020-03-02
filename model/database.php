<?php
/*
 * MEMBER TABLE
CREATE TABLE Member
( member_id int NOT NULL AUTO_INCREMENT,
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
    interests varchar(255),
    PRIMARY KEY (member_id)
);
*INTEREST TABLE
CREATE TABLE Interests (
interest_id int NOT NULL AUTO_INCREMENT,
interest varchar(255),
type varchar(255),
PRIMARY KEY (interest_id)
);
*member_interest TABLE
CREATE TABLE member_interest
(member_id int NOT NULL,
interest_id int NOT NULL,
FOREIGN KEY (member_id) REFERENCES Member (member_id) ON UPDATE CASCADE,
FOREIGN KEY (interest_id) REFERENCES Interest (interest_id) ON UPDATE CASCADE
);
]
*Populating interest table
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
 */
require_once("/home/laxmikan/config-dating.php");

/**
 * Class Database
 * Contains all the sql queries
 */
class Database
{
    private $_dbh;

    function __construct()
    {
        try {
//creat a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//            echo "Connected";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * insert member that user input in app
     * @param $member
     */
    function insertMember($member)
    {
        //1. Define a query
        $sql = "INSERT INTO Member (member_id, fname, lname, age,
                gender, phone, email, state, 
                seeking, bio, premium)
                    VALUES(default, :fname, :lname , :age, :gender, :phone, :email, :state,
                :seeking, :bio, :premium)";

        //2 prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3/ bind the parameters
        $statement->bindParam(':fname', $member->getFName());
        $statement->bindParam(':lname', $member->getLName());
        $statement->bindParam(':age', $member->getAge());
        $statement->bindParam(':gender', $member->getGender());
        $statement->bindParam(':phone', $member->getPhone());
        $statement->bindParam(':email', $member->getEmail());
        $statement->bindParam(':state', $member->getState());
        $statement->bindParam(':seeking', $member->getSeeking());
        $statement->bindParam(':bio', $member->getBio());
        $statement->bindParam(':premium', $member->checkPremium());

        //4. execute the statement
        $statement->execute();
    }


    /**
     * Gets all the member that are stored in database table called member
     * @return array
     */
    function getMembers(){
        $sql = "SELECT * FROM  Member
                ORDER BY lname, fname";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * Get the member by its id
     * @param $member_id
     * @return array
     */
    function getMember($member_id)
    {
        $sql= "SELECT * FROM Member WHERE member_id=?";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute(['$member_id']);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the interest name by passing member id
     * @param $member_id
     * @return mixed
     */
    function getInterests($member_id)
    {
        $sql = "SELECT Interests.interest_id,Interests.interest FROM Interests 
            INNER JOIN member_interest ON Member.member_id = member_interest.member_id WHERE member_id=?";
        $statement = $this->_db-> prepare($sql);
        $statement->execute([$member_id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

//    function insertIntoMemberInterest($memberId)
//    {
//        $sql = "INSERT INTO member_interest VALUES(?, ?)";
//        $statement = $this->_db->prepare($sql);
//        $statement->execute([$id, $sessionId]);
//        return $id;
//
//    }


//HOW TO INSERT THE USER SELECTED INTEREST IN THE TABLE ??

}