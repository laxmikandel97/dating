<?php

function validForm()
{
    global $f3;
    $isValid = true;//flag
//FIRST AND LAST NAME
    if (!validFirstName($f3->get('firstName')) || (!validLastName($f3->get('lastName')))) {

        $isValid = false;
        $f3->set("errors['firstName']", "Please enter first name ");
        $f3->set("errors['lastName']", "Please enter  last name");
    }
//AGE
    if (!validAge($f3->get('age'))){ //get the value of the passed key age is key
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
    $phoneResult=false;
    if(strlen($phone)==10&&!empty($phone)&&ctype_digit($phone)){
        $phoneResult=true;
    }
    return $phoneResult;
}

////validate email
//validEmail()
//
//
//
////validate outdoor
//validOutdoor()
//
//
//
////validate indoor
//validIndoor()


