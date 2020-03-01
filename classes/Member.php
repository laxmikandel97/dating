<?php
/**
 * Class Member
 * @package dating
 * @subpackage classes
 * @author  Laxmi Kandel
 */
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
 private $premium;


    /**
     * Member constructor.
     * @param $fName
     * @param $lName
     * @param $age
     * @param $gender
     * @param $phone
     */
    function __construct($fName, $lName,$age,$gender,$phone)
    {
        $this->_fName = $fName;
        $this->_lName = $lName;
        $this-> _age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /**
     * get first name
     * @return mixed
     */
    function getFName()
    {
        return $this->_fName;
    }

    /**
     * set first name
     * @param $fName
     */
    function setFName($fName)
    {
        $this->_fName = $fName;
    }

    /**
     * get last name
     * @return mixed
     */
 function getLName()
    {
        return $this->_lName;
    }

    /**
     * set last name
     * @param $lName
     */
    function setLName($lName)
    {
        $this->_lName = $lName;
    }

    /**
     * get age
     * @return mixed
     */
 function getAge()
    {
        return $this->_age;
    }

    /**
     * set age
     * @param $age
     */
    function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * get gender
     * @return mixed
     */
    function getGender()
    {
        return $this->_gender;
    }

    /**
     * set gender
     * @param $gender
     */
    function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * get phone
     * @return mixed
     */
    function getPhone()
    {
        return $this->_phone;
    }

    /**
     * set phone
     * @param $phone
     */
    function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * get email
     * @return mixed
     */
    function getEmail()
    {
        return $this->_email;
    }

    /**
     * set email
     * @param $email
     */
    function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * get state
     * @return mixed
     */
    function getState()
    {
        return $this->_state;
    }

    /**
     * set state
     * @param $state
     */
    function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * get seeking
     * @return mixed
     */
    function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * set seeking
     * @param $seeking
     */
    function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * get bio
     * @return mixed
     */
    function getBio()
    {
        return $this->_bio;
    }

    /**
     * set bio
     * @param $bio
     */
    function setBio($bio)
    {
        $this->_bio = $bio;
    }
    function checkPremium()
    {
        return $this->_premium;
    }
}