<?php
/**
 * Validating required fields
 * Name
 * Age
 * Phone
 * @return bool
 */


class Validate
{
    /**
     * @var array
     */
    private $_errors;

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->_errors = array();
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }


    function validForm()
    {
        global $f3;
        $isValid = true;//flag
        //FIRST  NAME
        if (!$this->validFirstName($f3->get('firstName'))) {
            $isValid = false;
            $f3->set("errors['firstName']", "Please enter first name ");
        }
        //LAST NAME
        if (!$this->validLastName($f3->get('lastName'))) {
            $isValid = false;
            $f3->set("errors['lastName']", "Please enter last name ");
        }
        //AGE
        if (!$this->validAge($f3->get('age'))) { //get the value of the passed key age is key
            $isValid = false;
            $f3->set("errors['age']", "Please enter valid age between 18 to 118 ");
        }
        //PHONE
        if (!$this->validPhone($f3->get('phone'))) {
            $isValid = false;
            $f3->set("errors['phone']", "Please enter valid 10 digit phone number ");
        }
        //GENDER
        if (!$this->validGender($f3->get('gender'))) {
            $isValid = false;
            $f3->set("errors['gender']", "Please select valid gender ");
        }
        return $isValid;
    }

    /**
     * Validating First Name
     * @param $firstName
     * @return bool
     */
    function validFirstName($firstName)//$food is the place where user input food is stored
    {
        $firstName = trim($firstName);
        return !empty($firstName) && ctype_alpha($firstName);
    }

    /**
     * Validating Last Name
     * @param $last
     * @return bool
     */
    function validLastName($last)//$food is the place where user input food is stored
    {
        $last = trim($last);
        return !empty($last) && ctype_alpha($last);
    }

    /**
     * Validating Age
     * @param $age
     * @return bool
     */
    function validAge($age)
    {
        $result = false;
        $age = trim($age);
        if (!empty($age) && !ctype_alpha($age) && ($age >= 18 && $age <= 118)) {
            $result = true;
        }
        return $result;
    }

    /**
     * Validating Phone Number
     * @param $phone
     * @return bool
     */
    function validPhone($phone)
    {
        $phoneResult = false;
        $phone = trim($phone);
        if (strlen($phone) == 10 && !empty($phone) && ctype_digit($phone)) {
            $phoneResult = true;
        }
        return $phoneResult;
    }


    function validGender($gender)
    {
        $genderCheck = false;
        global $f3;

        if (empty($gender) || in_array($gender, $f3->get('genders'))) {
            $genderCheck = true;
        }
        return $genderCheck;
    }

    /**
     * Validating email
     * @param $email
     * @return bool
     */
    function validEmail($email)
    {
        $emailResult = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
            $emailResult = true;
        }
        return $emailResult;
    }

    /**
     * checking for valid state
     * @param $state
     * @return bool
     */
    function validState($state)
    {
        $checkState = false;
        global $f3;
        if (in_array($state, $f3->get('states'))) {
            $checkState = true;
        }

        return $checkState;
    }

    /**
     * Validating indoor interest
     * @param $indoor
     * @return bool
     */
    function validIndoor($indoor)
    {
        global $f3;
        $validCheck = false;
        if (empty($indoor)) {
            $validCheck = true;
            return $validCheck;
        }
        foreach ($indoor as $item1) {
            if (in_array($item1, $f3->get('indoor'))) {
                $validCheck = true;
            } else {
                $validCheck = false;
            }
        }
        return $validCheck;
    }

    /**
     *  * Validating outdoor interest
     * @param $outdoor
     * @return bool
     */
    function validOutdoor($outdoor)
    {
        global $f3;
        $validCheck = false;
        if (empty($outdoor)) {
            $validCheck = true;
            return $validCheck;
        }
        foreach ($outdoor as $item2) {
            if (in_array($item2, $f3->get('outdoor'))) {
                $validCheck = true;
            } else {
                $validCheck = false;
                return $validCheck;
            }
        }
        return $validCheck;
    }

    /**
     * validating interests
     * @return bool
     */
    function interest()
    {
        global $f3;
        $validInterest = true;
        if (!$this->validIndoor($f3->get('indoorInterests'))) {
            $validInterest = false;
            $f3->set("errors['indoor']", "NOTE: Please select all valid values 
            for indoor interests!");
        }
        if (!$this->validOutdoor($f3->get('outdoorInterests'))) {
            $validInterest = false;
            $f3->set("errors['outdoor']", "NOTE: Please select all 
            valid values for outdoor interests!");
        }
        return $validInterest;
    }

    /**
     * Profile form information validation (Email)
     * @return bool
     */
    function profileInfoValidation()
    {
        global $f3;
        $valid = true;//flag
        if (!$this->validEmail($f3->get('email'))) {
            $valid = false;
            $f3->set("errors['email']", "Please enter valid email address ");
        }

        if (!$this->validState($f3->get('state'))) {
            $valid = false;
            $f3->set("errors['state']", "Please select valid state  ");
        }

        if (!$this->validGender($f3->get('seeking'))) {
            $valid = false;
            $f3->set("errors['gender']", "Please select valid gender ");
        }
        return $valid;
    }
}