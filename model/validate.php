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
    if (!validAge($f3->get('age'))) {
        $isValid = false;
        $f3->set("errors['age']", "Please enter valid age between 18 to 118 ");
    }
    //PHONE
    if (!validPhone($f3->get('phone'))) {
        $isValid = false;
        $f3->set("errors['phone']", "Please enter valid age between 18 to 118 ");
    }


//    if (!validQty($f3->get('qty'))) {
//
//        $isValid = false;
//        $f3->set("errors['qty']", "Please enter 1 or more");
//    }
//
//    if (!validMeal($f3->get('meal'))) {
//
//        $isValid = false;
//        $f3->set("errors['meal']", "Please select a meal");
//    }
//
//    if (!validCondiments($f3->get('cond'))) {
//
//        $isValid = false;
//        $f3->set("errors['cond']", "Invalid selection");
//    }

    return $isValid;
}

//
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
    if(ctype_alnum($phone)){
        $phoneResult=true;
    }
    if(!empty($phone)){
        $phoneResult=true;

    }
//    $phoneNumber = strlen((string)$phone);
//    if($phoneNumber==10)
//    {
//        $phoneResult=true;
//    }
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


