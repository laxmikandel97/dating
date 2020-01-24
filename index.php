<!--Laxmi Kandel-->
<!--January 16 2020-->
<!--Setting default route for dating site-->
<?php
//THIS IS OUR CONTROLLER

//Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//require the autoloaded file
require_once ('vendor/autoload.php');
//create an instance of the base class
$f3= Base::instance();

//Define a default route
$f3->route('GET /', function (){
    $view = new Template();
    echo $view-> render('views/home.html');
});
//default route for personalInfo page
$f3->route('GET /personalInfo', function (){
    $view = new Template();
    echo $view-> render('views/personalInfo.html');
});

//default route for profile page
$f3->route('GET /profile', function (){
    $view = new Template();
    echo $view-> render('views/profile.html');
});


//run fat free
$f3->run();

