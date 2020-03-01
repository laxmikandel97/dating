<?php
require_once("/home/laxmikan/config-dating.php");
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
    function getMembers(){
        $sql = "SELECT * FROM  Member
                ORDER BY last, first";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getMember($member_id)
    {
        $sql= "SELECT * FROM Member WHERE member_id=?";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute(['$member_id']);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getInterests($member_id)
    {
    $sql = "SELECT * FROM memebr_interest WHERE member_id= ?";


    }



}