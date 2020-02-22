<?php

class DatingController
{
    private $_f3; //router


    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    //home page got moved here
    //this is a method for default route
    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

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
            $this->_f3->set('gender', $gender); //gender is the variable name for fat free and $gender is the value user gave us
            $this->_f3->set('phone', $phone);

            //check to see if the check box is checked if checked instantiate premiumMember class
            $checkBox = isset($_POST['checkbox']);
            $_SESSION['checkbox'] =$checkBox;

//           echo  isset($_POST['checkbox']);//returns 1 is true
            if(isset($_POST['checkbox'])) {
//                echo "hi checked";
                $member  = new PremiumMember($firstName, $lastName,$age,$gender,$phone);
            }
            else {
                $member = new Member($firstName, $lastName, $age, $gender, $phone);
            }


//            $_SESSION['member']= $member;//storing member object in session array

            if (validForm()) {
                //storing the data in member object if they are valid
                $_SESSION['member']= $member;
                //Redirect to profile
                $this->_f3->reroute('/profile');

            }
        }
        $view = new Template();
        echo $view->render('views/personalInfo.html');
    }

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
            if (profileInfoValidation()) {
                $_SESSION['member']->setEmail($email);
                $_SESSION['member']->setState($state);
                $_SESSION['member']->setSeeking($seeking);
                $_SESSION['member']->setBio($inputText);

                if($_SESSION['checkbox'] ==1 ) {
                    //Redirect to profile
                    $this->_f3->reroute('/interests');
                }
                else{
                    $this->_f3->reroute('/summary');
                }
            }
        }

        $view = new Template();
        echo $view->render('views/profile.html');

    }

    function interests()
    {
        $selectedIndoors = array();
        $selectedOutdoors = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get data from indoor
            //            var_dump($_POST);
            if (!empty($_POST['indoor'])) {
                //            $selectedIndoors = $_POST['indoor'];
                foreach ($_POST['indoor'] as $value) {
                    array_push($selectedIndoors, $value);
                }
                //                var_dump($selectedIndoors);

            }
            //Get the data form outdoor
            if (!empty($_POST['outdoor'])) {
                foreach ($_POST['outdoor'] as $value) {
                    array_push($selectedOutdoors, $value);
                }
                //            var_dump($selectedOutdoors);

            }
            //Add data to hive
            $this->_f3->set('indoorInterests', $selectedIndoors);
            $this->_f3->set('outdoorInterests', $selectedOutdoors);
            //If data is valid
            if (interests()) {
                //Write data to Session
                $_SESSION['indoor'] = $selectedIndoors;
                $_SESSION['outdoor'] = $selectedOutdoors;
                //Redirect to Summary
                $this->_f3->reroute('/summary');
            }
        } //end of request if
        $view = new Template();
        echo $view->render('views/interests.html');
//        echo "<pre>";
//        var_dump($_SESSION['firstName']);
    }
    function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');
//
    }

}