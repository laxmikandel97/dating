<?php
/**
 * Class DatingController
 * @package dating
 * @subpackage contoller
 * @author  Laxmi Kandel
 *
 */

class DatingController
{
    private $_f3; //router

    private  $_val;

    function __construct($f3)
    {
        //Instantiate validate class
        $this->_val=new Validate();
        $this->_f3 = $f3;
    }

    /**
     * method to ender to home page
     */
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }
    /**
     * personal info page
     */
    function personalInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get data from personalInfo from by using their name
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];

            //Add data to hive personalInfo
            $this->_f3->set('firstName', $firstName);
            $this->_f3->set('lastName', $lastName);
            $this->_f3->set('age', $age);
            $this->_f3->set('gender', $gender);
            $this->_f3->set('phone', $phone);
//          $this->_f3->set('checkBox', checkbox);


            //check to see if the check box is checked if checked instantiate premiumMember class
            $checkBox = isset($_POST['checkbox']);
            $_SESSION['checkbox'] = $checkBox;
           $this->_f3->set('checkBox', $checkBox);



            if (isset($_POST['checkbox'])) {
                $member = new PremiumMember($firstName, $lastName, $age, $gender, $phone,$checkBox);
            } else {
                $member = new Member($firstName, $lastName, $age, $gender, $phone,$checkBox);
            }

            if ($this->_val->validForm()) {
                //storing the data in member object if they are valid
                $_SESSION['member'] = $member;
                //Redirect to profile
                $this->_f3->reroute('/profile');

            }
            var_dump($_SESSION['member']);

        }
        $view = new Template();
        echo $view->render('views/personalInfo.html');
    }

    /**
     * profile page
     */
    function profileInfo()
    {
        //get the values form the form if the server request is POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get data from profile form
            $email = $_POST['email'];
            $state = $_POST['state'];
            $seeking = $_POST['seekingGender'];
            $inputText = $_POST['inputText'];
            //Add data to hive profile
            $this->_f3->set('email', $email);
            $this->_f3->set('state', $state);
            $this->_f3->set('seeking', $seeking);
            $this->_f3->set('inputText', $inputText);

            //If data is valid store them in session variable
            if ($this->_val->profileInfoValidation()) {
                $_SESSION['member']->setEmail($email);
                $_SESSION['member']->setState($state);
                $_SESSION['member']->setSeeking($seeking);
                $_SESSION['member']->setBio($inputText);

                if ($_SESSION['checkbox'] == 1) {
                    //Redirect to profile
                    $this->_f3->reroute('/interests');
                } else {
                    $this->_f3->reroute('/summary');
                }
            }
        }
        $view = new Template();
        echo $view->render('views/profile.html');

    }

    /**
     * Interest page
     */
    function interests()
    {
        $selectedIndoors = array();
        $selectedOutdoors = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get data from indoor
            if (!empty($_POST['indoor'])) {
                foreach ($_POST['indoor'] as $value) {
                    array_push($selectedIndoors, $value);
                }
            }
            //Get the data form outdoor
            if (!empty($_POST['outdoor'])) {
                foreach ($_POST['outdoor'] as $value) {
                    array_push($selectedOutdoors, $value);
                }
            }
            //Add data to hive
            $this->_f3->set('indoorInterests', $selectedIndoors);
            $this->_f3->set('outdoorInterests', $selectedOutdoors);

            //If data is valid
            if ($this->_val->interest()) {
                //Write data to Session
                $_SESSION['indoor'] = $selectedIndoors;
                $_SESSION['outdoor'] = $selectedOutdoors;
                $_SESSION['member']->setIndoor($_SESSION['indoor']);
                $_SESSION['member']->setOutdoor($_SESSION['outdoor']);
                //Redirect to Summary
                $this->_f3->reroute('/summary');
            }
        } //end of request if
        $view = new Template();
        echo $view->render('views/interests.html');
    }

    /**
     * Summary page
     */
    function summary()
    {

        $GLOBALS['db']->insertMember($_SESSION['member']);
        echo"<pre>";
        var_dump($_SESSION['member']);

            //        var_dump($GLOBALS['db']);

        $view = new Template();
        echo $view->render('views/summary.html');

    }
    function admin()
    {
        global $db;
        $this->_f3->set("allMembers", $db->getMembers());
        $view = new Template();
        echo $view->render('views/admin.php');
        session_destroy();

    }
}