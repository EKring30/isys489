<?php
include('database.php');

function validateForm() {
    $firstNamePresent = $firstNameValid = $lastNamePresent = $lastNameValid = false;
    $addressOnePresent = $addressOneValid = $addressTwoPresent = $addressTwoValid = false;
    $cityPresent = $cityValid = $statePresent = $stateValid = $zipPresent = $zipValid = $countryPresent = $countryValid = false;
    $dobPresent = $dobValid = $phonePresent = $phoneValid = $emailPresent = $emailValid = $domainCheck = false;
    $phoneTypePresent = $phoneTypeValid = $usernamePresent = $usernameValid = $passwordPresent = $passwordValid = false;
    $travelRadiusPresent = $travelRadiusValid = $picturePresent = $pictureValid = $termsPresent = $termsValid = false;
    $prefContactMethodPresent = $prefContactMethodValid = false;
    $errors = [];

    if (array_key_esists($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
    }

    if (array_key_esists($_POST['lastName']))
    {
        $lastNamePresent = true;
        $lastNameValid = validate_last_name($_POST['lastName']);
    }

    if (array_key_esists($_POST['address1']))
    {
        $addressOnePresent = true;
        $addressOneValid = validate_address_one($_POST['address1']);
    }

    if (array_key_esists($_POST['address2']))
    {
        $addressTwoPresent = true;
        $addressTwoValid = validate_address_two($_POST['address2']);
    }

    if (array_key_esists($_POST['city']))
    {
        $cityPresent = true;
        $cityValid = validate_city($_POST['city']);
    }

    if (array_key_esists($_POST['state']))
    {
        $statePresent = true;
        $stateValid = validate_state($_POST['state']);
    }

    if (array_key_esists($_POST['zip']))
    {
        $zipPresent = true;
        $zipValid = validate_zip($_POST['zip']);
    }

    if (array_key_esists($_POST['country']))
    {
        $countryPresent = true;
        $countryValid = validate_country($_POST['country']);
    }

    if (array_key_esists($_POST['dob']))
    {
        $dobPresent = true;
        $dobValid = validate_dob($_POST['dob']);
        if (!$dobValid)
        {
            $errors["dob"] = "Must be older than 18.";
        }
    }

    if (array_key_esists($_POST['phone']))
    {
        $phonePresent = true;
        $phoneValid = validate_phone($_POST['phone']);
    }

    if (array_key_esists($_POST['phoneType']))
    {
        $phoneTypePresent = true;
        $phoneTypeValid = validate_phone_type($_POST['phoneType']);
    }

    if (array_key_esists($_POST['email']))
    {
        $emailPresent = true;
        if (!empty($_POST['domainCheck']))
        {
            $domainCheck = $_POST['domainCheck'];
        }
        $emailValid = validate_email($_POST['email'], $domainCheck);
    }

    if (array_key_esists($_POST['username']))
    {
        $usernamePresent = true;
        $usernameValid = validate_username($_POST['username']);
    }

    if (array_key_esists($_POST['password']))
    {
        $passwordPresent = true;
        $passwordValid = validate_password($_POST['password']);
    }

    if (array_key_esists($_POST['picture']))
    {
        $picturePresent = true;
        $pictureValid = validate_first_name($_POST['picture']);
    }

    if (array_key_esists($_POST['terms']))
    {
        $termsPresent = true;
        $termsValid = true;
    }
    elseif (empty($_POST['terms']))
    {
        $termsValid = false;
        $errors["terms"] = "You must agree to the terms of service.";
    }

    if (array_key_esists($_POST['travelRadius']))
    {
        $travelRadiusPresent = true;
        $travelRadiusValid = validate_travel_radius($_POST['travelRadius']);
    }

    if (array_key_esists($_POST['prefContactMethod']))
    {
        $prefContactMethodPresent = true;
        $prefContactMethodValid = validate_pref_contact_method($_POST['prefContactMethod']);
    }
}

function validate_username($username)
{
    // prepare and bind
    $stmt = $my_dbhandle->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user);
    $stmt->fetch();
    $stmt->close();
    
    if (empty($user))
        return true;
    else
        return false;
    
}

function validate_dob($birthday)
{
    $today = strtotime(date('Y-m-d H:i:s'));
    $birthday = strtotime($birthday);
    $age = ($today - $birthday) / (60*60*24*365);

    if ($age > 18)
        return true;
    else
        return false;
}

function validate_travel_radius($radius)
{
    if (is_numeric($radius))
        return true;
    else
        return false;
}

function validate_pref_contact_method($value)
{
    if (strtolower($value) == "phone" || strtolower($value) == "email")
        return true;
    else
        return false;
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
function validate_email($email, $domainCheck = false)
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

/*  Function:   validate_password
    Author:     Paul Gerndt
    Purpose:    Used to validate passwords to ensure minimum length and content
                requirements are met.
    Created:    2015-02-16  
*/

function validate_password($candidate) {

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

// $form->registerRule('checkmail', 'callback', 'checkEmail');
// $form->addRule('email', 'Email is incorrect', 'checkmail', true);
?>