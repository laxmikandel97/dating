<?php
//THIS IS OUR CONTROLLER
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
//require the autoload file
require_once('vendor/autoload.php');
require_once('model/validate.php');
session_start();
//create an instance of the base class
$f3 = Base::instance();
$controller = new DatingController($f3);
//Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);
//Define arrays
$f3->set('genders', array(
    'male',
    'female'
));
$f3->set('states', array(
    'washington',
    'oregon',
    'idaho',
    'wyoming'
));
$f3->set('indoor', array(
    'tv',
    'puzzles',
    'movies',
    'reading',
    'cooking',
    'playing cards',
    'board games',
    'video games'
));
$f3->set('outdoor', array(
    'hiking',
    'walking',
    'biking',
    'climbing',
    'swimming',
    'collecting stones'
));
//Define a default route
$f3->route('GET /', function () {
   $GLOBALS['controller']->home();
});
//default route for personalInfo page
$f3->route('GET|POST /personalInfo', function ($f3) {
    $GLOBALS['controller']->personalInfo();
});
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        //Get data from personalInfo from by using their name
//        $firstName = $_POST['firstName'];
//        $lastName = $_POST['lastName'];
//        $age = $_POST['age'];
//        $phone = $_POST['phone'];
//        $gender = $_POST['gender'];
//        //Add data to hive personalInfo
//        $f3->set('firstName', $firstName);
//        $f3->set('lastName', $lastName);
//        $f3->set('age', $age);
//        $f3->set('gender', $gender); //gender is the variable name for fat free and $gender is the value user gave us
//        $f3->set('phone', $phone);
//        //If data is valid store them in session variable
//        if (validForm()) {
//            //Write data to Session
//            $_SESSION['firstName'] = $firstName; //firstName is a session variable, storing user valid input in session variable
//            $_SESSION['lastName'] = $lastName;
//            $_SESSION['age'] = $age;
//            $_SESSION['phone'] = $phone;
//            $_SESSION['gender'] = $gender;
//            //Redirect to profile
//            $f3->reroute('/profile');
//        }
//    }
//    $view = new Template();
//    echo $view->render('views/personalInfo.html');
//});

//default route for profile page
$f3->route('GET|POST /profile', function ($f3) {
    $GLOBALS['controller']->profileInfo();

});
//    //get the values form the form if the server request is POST
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        //Get data from profile form
//        $email = $_POST['email'];
//        $state = $_POST['state'];
//        $seeking = $_POST['seekingGender'];
//        $inputText = $_POST['inputText'];
//        //Add data to hive profile
//        $f3->set('email', $email);
//        $f3->set('state', $state);
//        $f3->set('seeking', $seeking);
//        $f3->set('inputText', $inputText);
//
//        //If data is valid store them in session variable
//        if (profileInfoValidation()) {
//            //Write data to Session
//            $_SESSION['email'] = $email;
//            $_SESSION['state'] = $state;
//            $_SESSION['seeking'] = $seeking;
//            $_SESSION['inputText'] = $inputText;
//            //Redirect to profile
//            $f3->reroute('/interests');
//        }
//    }
//    $view = new Template();
//    echo $view->render('views/profile.html');
//});
//default route for Interests page
$f3->route('GET|POST /interests', function ($f3) {
    $GLOBALS['controller']->interests();

});
//    $selectedIndoors = array();
//    $selectedOutdoors = array();
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        //Get data from indoor
//        //            var_dump($_POST);
//        if (!empty($_POST['indoor'])) {
//            //            $selectedIndoors = $_POST['indoor'];
//            foreach ($_POST['indoor'] as $value) {
//                array_push($selectedIndoors, $value);
//            }
//            //                var_dump($selectedIndoors);
//
//        }
//        //Get the data form outdoor
//        if (!empty($_POST['outdoor'])) {
//            foreach ($_POST['outdoor'] as $value) {
//                array_push($selectedOutdoors, $value);
//            }
//            //            var_dump($selectedOutdoors);
//
//        }
//        //Add data to hive
//        $f3->set('indoorInterests', $selectedIndoors);
//        $f3->set('outdoorInterests', $selectedOutdoors);
//        //If data is valid
//        if (interests()) {
//            //Write data to Session
//            $_SESSION['indoor'] = $selectedIndoors;
//            $_SESSION['outdoor'] = $selectedOutdoors;
//            //Redirect to Summary
//            $f3->reroute('/summary');
//        }
//    } //end of request if
//    $view = new Template();
//    echo $view->render('views/interests.html');
//});
//default route for summary page
$f3->route('GET|POST /summary', function ($f3) {
    $GLOBALS['controller']->summary();
    session_destroy();
    $_SESSION = array();
});

//run fat free
$f3->run();

