<?php
session_start();
//THIS IS OUR CONTROLLER
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
//session_start();
//require the autoload file
require_once('vendor/autoload.php');
require_once ('model/validate.php');
//create an instance of the base class
$f3 = Base::instance();

//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define arrays
$f3->set('gender', array('male', 'female'));
$f3->set('states', array('washington', 'oregon', 'idaho', 'wyoming'));
$f3->set('indoor', array('tv', 'puzzles', 'movies','reading',
    'cooking','playing cards','board games','video games'));
$f3->set('outdoor', array('hiking', 'walking', 'biking','climbing',
    'swimming','collecting stones'));



//Define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});
//default route for personalInfo page
$f3->route('GET|POST /personalInfo', function ($f3) {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Get data from personalInfo from by using their name
        $firstName = $_POST['firstName'];
         $lastName= $_POST['lastName'];
        $age = $_POST['age'];
        $phone=$_POST['phone'];

        $gender=$_POST['gender'];
        //Get data from profile form
//        $email=$_POST['email'];
//        $state=$_POST['state'];
//        $seeking=$_POST['seekingGender'];
        //Get data form Indoor





        //get the data form outdoor




        //Add data to hive personalInfo
        $f3->set('firstName', $firstName);//$food and other used here are user input data stored variable
        $f3->set('lastName', $lastName);
        $f3->set('age', $age);
        $f3->set('gender', $gender);
        $f3->set('phone',$phone);


        //Add data to hive profile
//        $f3->set('email',$email);
//        $f3->set('state',$state);
//        $f3->set('seeking',$seeking);



        //If data is valid
        if (validForm()) {

            //Write data to Session
            $_SESSION['firstName'] = $firstName;//food is the name and $food is the place where is store the user input
//            $_SESSION['qty'] = $qty;
//            $_SESSION['meal'] = $meal;
//            $_SESSION['condiments'] = $selectedCondiments;
//            $_SESSION['beverage'] = $drink;

            //Redirect to profile
            $f3->reroute('/profile');
        }
    }
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});
//default route for profile page
$f3->route('GET|POST /profile', function () {
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];
    $view = new Template();
    echo $view->render('views/profile.html');
});
//default route for Interests page
$f3->route('POST /interests', function () {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['inputText'] = $_POST['inputText'];
    $view = new Template();
    echo $view->render('views/interests.html');
});
//default route for summary page
$f3->route('POST /summary', function () {
    //get the Outdoor interests
    $interest = $_POST['interests'];
    $_SESSION['values'] = array();
    if (!empty($interest)) {
        foreach ($interest as $item) {
            array_push($_SESSION['values'],$item);
        }
    }
    foreach ($_SESSION['values'] as $items)
    {
        $_SESSION['outdoor'] .=$items ." ";
    }
//get the Indoor interests
    $interests = $_POST['interestsIn'];
    $_SESSION['valuesIn'] = array();
    if (!empty($interests)) {
        foreach ($interests as $itemIn) {
            array_push($_SESSION['valuesIn'],$itemIn);
        }
    }
    foreach ($_SESSION['valuesIn'] as $itemsIn)
    {
        $_SESSION['indoor'] .=$itemsIn ." ";
    }
    $view = new Template();
    echo $view->render('views/summary.html');
});
//run fat free
$f3->run();