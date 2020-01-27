<?php
session_start();
//THIS IS OUR CONTROLLER
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
//session_start();
//require the autoloaded file
require_once('vendor/autoload.php');
//create an instance of the base class
$f3 = Base::instance();
//Define a default route
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render('views/home.html');
});
//default route for personalInfo page
$f3->route('GET /personalInfo', function () {
    $view = new Template();
    echo $view->render('views/personalInfo.html');
});
//default route for profile page
$f3->route('POST /profile', function () {
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];
    $view = new Template();
    echo $view->render('views/profile.html');
});
$f3->route('POST /interests', function () {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['inputText'] = $_POST['inputText'];
    $view = new Template();
    echo $view->render('views/interests.html');
});
$f3->route('POST /summary', function () {
    //get the OutDoor interests
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


//if(!empty($interest)) {
//        foreach ($interest as $item) {
//            $_SESSION['interests'] .= $item . " ";
//        }
//    }
    $view = new Template();
    echo $view->render('views/summary.html');
});
//run fat free
$f3->run();