<?php

function validForm()
{
    global $f3;
    $isValid = true;//flag
//FIRST  NAME
    if (!validFirstName($f3->get('firstName'))) {
        $isValid = false;
        $f3->set("errors['firstName']", "Please enter first name ");
    }

    //LAST NAME
    if (!validLastName($f3->get('lastName'))) {
        $isValid = false;
        $f3->set("errors['lastName']", "Please enter last name ");
    }


//AGE
    if (!validAge($f3->get('age'))) { //get the value of the passed key age is key
        $isValid = false;
        $f3->set("errors['age']", "Please enter valid age between 18 to 118 ");
    }
    //PHONE
    if (!validPhone($f3->get('phone'))) {
        $isValid = false;
        $f3->set("errors['phone']", "Please enter valid 10 digit phone number ");
    }
    return $isValid;
}

//validate first name
function validFirstName($firstName)//$food is the place where user input food is stored
{
    return !empty($firstName) && ctype_alpha($firstName);
}

//validate last name
function validLastName($last)//$food is the place where user input food is stored
{
    return !empty($last) && ctype_alpha($last);
}

////validate age
function validAge($age)
{
    $result = false;
    if (!empty($age) && !ctype_alpha($age) && ($age >= 18 && $age <= 118)) {
        $result = true;
    }
    return $result;
}

//validate Phone
function validPhone($phone)
{
    $phoneResult = false;
    if (strlen($phone) == 10 && !empty($phone) && ctype_digit($phone)) {
        $phoneResult = true;
    }
    return $phoneResult;
}

//validate email
function validEmail($email)
{
    $emailResult = false;
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        $emailResult = true;
    }
    return $emailResult;
}

function validIndoor($indoor)
{
    global $f3;
    $validCheck = false;

    if (empty($indoor)) {
        $validCheck = true;
        return $validCheck;
    }
    foreach ($indoor as $item1) {
//        echo $item1 . " ";
        if (in_array($item1, $f3->get('indoor'))) {
            $validCheck = true;
        }
        else{
            $validCheck=false;
            return $validCheck;
        }
    }
    return $validCheck;

}


//validate outdoor
function validOutdoor($outdoor)
{
    global $f3;
    $validCheck = false;

    if (empty($outdoor)) {
        $validCheck = true;
        return $validCheck;
    }
    foreach ($outdoor as $item2) {
//        echo $item1 . " ";
        if (in_array($item2, $f3->get('outdoor'))) {
            $validCheck = true;
        }
        else{
            $validCheck=false;
            return $validCheck;
        }
    }
    return $validCheck;

}

function interests()
{
    global $f3;
    $validInterest = true;
    if (!validIndoor($f3->get('indoorInterests'))) {
        $validInterest = false;
        $f3->set("errors['indoor']", "NOTE: Please select all valid values 
         for indoor interests!");

    }

    if(!validOutdoor($f3->get('outdoorInterests')))
    {
        $validInterest = false;
        $f3->set("errors['outdoor']", "NOTE: Please select all 
        valid values for outdoor interests!");

    }
    return $validInterest;

}


//profile page validation
function profileInfoValidation()
{
    global $f3;
    $valid = true;//flag
    if (!validEmail($f3->get('email'))) {
        $valid = false;
        $f3->set("errors['email']", "Please enter valid email address ");
    }
    return $valid;
}


