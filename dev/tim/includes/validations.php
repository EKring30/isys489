<?php

function validateForm() {
    $firstNamePresent = $firstNameValid = $lastNamePresent = $lastNameValid = false;
    $addressOnePresent = $addressOneValid = $addressTwoPresent = $addressTwoValid = false;
    $cityPresent = $cityValid = $statePresent = $stateValid = $zipPresent = $zipValid = $countryPresent = $countryValid = false;
    $dobPresent = $dobValid = $phonePresent = $phoneValid = $emailPresent = $emailValid = false;
    $usernamePresent = $usernameValid = $passwordPresent = $passwordValid = false;
    $picturePresent = $pictureValid = $termsPresent = $termsValid = false;

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['lastName']))
    {
        $lastNamePresent = true;
        $lastNameValid = validate_first_name($_POST['lastName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }
}

/*  Function:      checkEmail
    Author:        Emily Kring
    Purpose:    Used to validate email addresses to ensure format and domain
                requirements are met.
*/

/**
 * Validate an email address
 *
 * @param string    $email         Email address to validate
 * @param boolean   $domainCheck   Check if the domain exists
 */
function checkEmail($email, $domainCheck = false)
{
    if (preg_match('/^[a-zA-Z0-9\._-]+\@(\[?)[a-zA-Z0-9\-\.]+'.
                   '\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $email)) {
        if ($domainCheck && function_exists('checkdnsrr')) {
            list (, $domain)  = explode('@', $email);
            if (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A')) {
                return true;
            }
            return false;
        }
        return true;
    }
    return false;
}

/*  Function:   valid_pass
    Author:     Paul Gerndt
    Purpose:    Used to validate passwords to ensure minimum length and content
                requirements are met.
    Created:    2015-02-16  
*/

function valid_pass($candidate) {

    // Declare and Initialize Local Variables
    $CritCount = 0; //Tabulator for keeping track of number of criteria matched

    /*
        Regular Expression Example $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
        $ = beginning of string
        \S* = any set of characters
        (?=\S{8,}) = of at least length 8
        (?=\S*[a-z]) = containing at least one lowercase letter
        (?=\S*[A-Z]) = and at least one uppercase letter
        (?=\S*[\d]) = and at least one number
        (?=\S*[\W]) = and at least a special character (non-word characters)
        $ = end of the string

     */
    // Test for each requirement 
    if (preg_match('$\S*(?=\S{8,})$', $candidate)) $CritCount = $CritCount + 10; // Value of 10 for minimum length
    if (preg_match('$\S*[a-z]$', $candidate)) $CritCount = $CritCount + 1;  //Contains lower case a-z
    if (preg_match('$\S*[A-Z]$', $candidate)) $CritCount = $CritCount + 1;  //Contains UPPER case A-Z
    if (preg_match('$\S*[\d]$', $candidate)) $CritCount = $CritCount + 1;   //Contains at least one numeric digit
    if (preg_match('$\S*[\W]$', $candidate)) $CritCount = $CritCount + 1;   //Contains at least one special Character (!@#$%^&*()-_, etc.)
    
    if ($CritCount > 12) //Meets minimum length, plus 3 additional criteria
    {
        return TRUE;
    }
    else 
    {
        return FALSE;
    }   
}

$form->registerRule('checkmail', 'callback', 'checkEmail');
$form->addRule('email', 'Email is incorrect', 'checkmail', true);
?>