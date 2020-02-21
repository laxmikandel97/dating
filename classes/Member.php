<?php
class Member
{
 private  $_fName;
 private  $_lName;
 private  $_age;
 private  $_gender;
 private  $_phone;
 private  $_email;
 private  $_state;
 private  $_seeking;
 private  $_bio;


    function __construct($fName, $lName,$age,$gender,$phone)
    {
        $this->_fName = $fName;
        $this->_lName = $lName;
        $this-> _age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
//        $this->_email = $email;
//        $this->_state = $state;
//        $this->_seeking = $seeking;
//        $this->_bio = $bio;
    }


    function getFName()
    {
        return $this->_fName;
    }

    function setFName($fName)
    {
        $this->_fName = $fName;
    }
 function getLName()
    {
        return $this->_lName;
    }

    function setLName($lName)
    {
        $this->_lName = $lName;
    }
 function getAge()
    {
        return $this->_age;
    }

    function setAge($age)
    {
        $this->_age = $age;
    }
function getGender()
    {
        return $this->_gender;
    }

    function setGender($gender)
    {
        $this->_gender = $gender;
    }
function getPhone()
    {
        return $this->_phone;
    }

    function setPhone($phone)
    {
        $this->_phone = $phone;
    }
    function getEmail()
    {
        return $this->_email;
    }

    function setEmail($email)
    {
        $this->_email = $email;
    }
    function getState()
    {
        return $this->_state;
    }

    function setState($state)
    {
        $this->_state = $state;
    }
    function getSeeking()
    {
        return $this->_seeking;
    }

    function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }
    function getBio()
    {
        return $this->_bio;
    }

    function setBio($bio)
    {
        $this->_bio = $bio;
    }
}