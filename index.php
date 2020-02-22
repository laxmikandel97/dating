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
//default route for profile page
$f3->route('GET|POST /profile', function ($f3) {
    $GLOBALS['controller']->profileInfo();

});

//default route for Interests page
$f3->route('GET|POST /interests', function ($f3) {
    $GLOBALS['controller']->interests();

});

//default route for summary page
$f3->route('GET|POST /summary', function ($f3) {
    $GLOBALS['controller']->summary();
    session_destroy();
    $_SESSION = array();
});

//run fat free
$f3->run();

