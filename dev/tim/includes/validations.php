<?php
include('database.php');

function validateForm() {
    $firstNamePresent = $firstNameValid = $lastNamePresent = $lastNameValid = false;
    $addressOnePresent = $addressOneValid = $addressTwoPresent = $addressTwoValid = false;
    $cityPresent = $cityValid = $statePresent = $stateValid = $zipPresent = $zipValid = $countryPresent = $countryValid = false;
    $dobPresent = $dobValid = $phonePresent = $phoneValid = $emailPresent = $emailValid = $domainCheck = false;
    $phoneTypePresent = $phoneTypeValid = $usernamePresent = $usernameValid = $passwordPresent = $passwordValid = false;
    $travelRadiusPresent = $travelRadiusValid = $picturePresent = $pictureValid = $termsPresent = $termsValid = false;
    $prefContactMethodPresent = $prefContactMethodValid = $jobTitlePresent = $jobTitleValid = false;
    $descriptionPresent = $descriptionValid = $categoryPresent = $categoryValid = false;
    $pricePresent = $priceValid = $tagsPresent = $tagsValid = false;
    $formName = "";

    $formIsValid = false;
    $errors = array();

    if (!empty($_POST['formname']))
        $formName = $_POST['formname'];

    if (!empty($_POST['firstName']))
    {
        $firstNamePresent = true;
        $firstNameValid = validate_first_name($_POST['firstName']);
        if (!$firstNameValid)
        {
            $formIsValid = false;
            $errors["firstName"] = "First name is invalid.";
        }
    }
    else
        $errors["firstName"] = "First name is missing.";

    if (!empty($_POST['lastName']))
    {
        $lastNamePresent = true;
        $lastNameValid = validate_last_name($_POST['lastName']);
        if (!$lastNameValid)
        {
            $formIsValid = false;
            $errors["lastName"] = "Last name is invalid.";
        }
    }
    else
        $errors["lastName"] = "Last name is missing.";

    if (!empty($_POST['address1']))
    {
        $addressOnePresent = true;
        $addressOneValid = validate_address_one($_POST['address1']);
        if (!$addressOneValid)
        {
            $formIsValid = false;
            $errors["address1"] = "Address 1 is invalid.";
        }
    }
    else
        $errors["address1"] = "Address 1 is missing.";

    if (!empty($_POST['address2']))
    {
        $addressTwoPresent = true;
        $addressTwoValid = validate_address_two($_POST['address2']);
        if (!$addressTwoValid)
        {
            $formIsValid = false;
            $errors["address2"] = "Address 2 is invalid.";
        }
    }
    else
        $addressTwoValid = true;

    if (!empty($_POST['city']))
    {
        $cityPresent = true;
        $cityValid = validate_city($_POST['city']);
        if (!$cityValid)
        {
            $formIsValid = false;
            $errors["city"] = "City is invalid.";
        }
    }
    else
        $errors["city"] = "City is missing.";

    if (!empty($_POST['state']))
    {
        $statePresent = true;
        $stateValid = validate_state($_POST['state']);
        if (!$stateValid)
        {
            $formIsValid = false;
            $errors["state"] = "Last name is invalid.";
        }
    }
    else
        $errors["state"] = "State is missing.";

    if (!empty($_POST['zip']))
    {
        $zipPresent = true;
        $zipValid = validate_zip($_POST['zip']);
        if (!$zipValid)
        {
            $formIsValid = false;
            $errors["zip"] = "Zip code is invalid.";
        }
    }
    else
        $errors["zip"] = "Zip code is missing.";

    if (!empty($_POST['country']))
    {
        $countryPresent = true;
        $countryValid = validate_country($_POST['country']);
        if (!$countryValid)
        {
            $formIsValid = false;
            $errors["country"] = "Country is invalid.";
        }
    }
    else
        $errors["country"] = "Country is missing.";

    if (!empty($_POST['dob']))
    {
        $dobPresent = true;
        $dobValid = validate_dob($_POST['dob']);
        if (!$dobValid)
        {
            $errors["dob"] = "Must be older than 18.";
        }
    }
    else
        $errors["dob"] = "Date of birth is missing.";

    if (!empty($_POST['phone']))
    {
        $phonePresent = true;
        $phoneValid = validate_phone($_POST['phone']);
        if (!$phoneValid)
        {
            $formIsValid = false;
            $errors["phone"] = "Phone number is invalid.";
        }
    }
    else
        $errors["phone"] = "Phone is missing.";

    if (!empty($_POST['phoneType']))
    {
        $phoneTypePresent = true;
        $phoneTypeValid = validate_phone_type($_POST['phoneType']);
        if (!$phoneTypeValid)
        {
            $formIsValid = false;
            $errors["phoneType"] = "Phone type is invalid.";
        }
    }
    else
        $errors["phoneType"] = "Phone type is missing.";

    if (!empty($_POST['email']))
    {
        $emailPresent = true;
        if (!empty($_POST['domainCheck']))
        {
            $domainCheck = $_POST['domainCheck'];
        }
        $emailValid = validate_email($_POST['email'], $domainCheck);
        if (!$emailValid)
        {
            $formIsValid = false;
            $errors["email"] = "E-mail is invalid.";
        }
    }
    else
        $errors["email"] = "Email is missing.";

    if (!empty($_POST['nickname']))
    {
        $nicknamePresent = true;
        $nicknameValid = validate_nickname($_POST['nickname']);
        if (!$nicknameValid)
        {
            $formIsValid = false;
            $errors["nickname"] = "Nickname is invalid.";
        }
    }
    else
    {
        if (!empty($formName) && $formName == "serviceConsumer")
        {
            $errors["nickname"] = "Nickname is missing.";
        }
        else
            $nicknameValid = true;
    }

    if (!empty($_POST['username']))
    {
        $usernamePresent = true;
        $usernameValid = validate_username($_POST['username']);
        if (!$usernameValid)
        {
            $formIsValid = false;
            $errors["username"] = "Username is invalid.";
        }
    }
    else
        $errors["username"] = "Username is missing.";

    if (!empty($_POST['pwd']))
    {
        $passwordPresent = true;
        $passwordValid = validate_password($_POST['pwd']);
        if (!$passwordValid)
        {
            $formIsValid = false;
            $errors["password"] = "Password is invalid.";
        }
    }
    else
        $errors["password"] = "Password is missing.";

    if (!empty($_POST['picture']))
    {
        $picturePresent = true;
        $pictureValid = validate_picture($_POST['picture']);
        if (!$pictureValid)
        {
            $formIsValid = false;
            $errors["picture"] = "Picture is invalid.";
        }
    }
    else
        $pictureValid = true;

    if (empty($_POST['terms']))
    {
        $formIsValid = false;
        $errors["terms"] = "You must agree to the terms of service.";
    }

    if (!empty($_POST['travelRadius']))
    {
        $travelRadiusPresent = true;
        $travelRadiusValid = validate_travel_radius($_POST['travelRadius']);
        if (!$travelRadiusValid)
        {
            $formIsValid = false;
            $errors["travelRadius"] = "Travel radius is invalid.";
        }
    }
    else
    {
        if (!empty($formName) && $formName == "serviceProvider")
        {
            $errors["travelRadius"] = "Travel radius is missing.";
        }
        else
            $travelRadiusValid = true;
    }

    if (!empty($_POST['prefContactMethod']))
    {
        $prefContactMethodPresent = true;
        $prefContactMethodValid = validate_pref_contact_method($_POST['prefContactMethod']);
        if (!$prefContactMethodValid)
        {
            $formIsValid = false;
            $errors["prefContactMethod"] = "Preferred contact method is invalid.";
        }
    }
    else
        $errors["prefContactMethod"] = "Preferred contact method missing.";

    if (!empty($_POST['jobtitle']))
    {
        $jobTitlePresent = true;
        $jobTitleValid = validate_job_title($_POST['jobtitle']);
        if (!$jobTitleValid)
        {
            $formIsValid = false;
            $errors["jobTitle"] = "Job title is invalid.";
        }
    }
    else
    {
        if ($formName == "postService")
            $errors["jobTitle"] = "Job title is missing.";
    }

    if (!empty($_POST['description']))
    {
        $descriptionPresent = true;
        $descriptionValid = validate_description($_POST['description']);
        if (!$descriptionValid)
        {
            $formIsValid = false;
            $errors["description"] = "Description is invalid.";
        }
    }
    else
    {
        if ($formName == "postService")
            $errors["description"] = "Description is missing.";
    }

    if (!empty($_POST['category']))
    {
        $categoryPresent = true;
        $categoryValid = validate_category($_POST['category']);
        if (!$categoryValid)
        {
            $formIsValid = false;
            $errors["category"] = "Category is invalid.";
        }
    }
    else
    {
        if ($formName == "postService")
            $errors["category"] = "Category is missing.";
    }

    if (!empty($_POST['price']))
    {
        $pricePresent = true;
        $priceValid = validate_price($_POST['price']);
        if (!$priceValid)
        {
            $formIsValid = false;
            $errors["price"] = "Price is invalid.";
        }
    }
    else
    {
        if ($formName == "postService")
            $errors["price"] = "Price is missing.";
    }

    if (!empty($_POST['tags']))
    {
        $tagsPresent = true;
        $tagsValid = validate_tags($_POST['tags']);
        if (!$tagsValid)
        {
            $formIsValid = false;
            $errors["tags"] = "Tags are invalid.";
        }
    }
    else
        $tagsValid = true;

    if ($formName == "postService")
    {
        if ($jobTitleValid && $descriptionValid && $categoryValid && $priceValid && $tagsValid)
        {
            $formIsValid = true;
        }
        else
        {
            $ps_fields = array("jobTitle", "description", "category", "price", "tags");
            foreach ($errors as $k => $v)
            {
                if (!in_array($k, $ps_fields))
                    unset($errors[$k]);
            }
        }
    }
    else 
    {
        if ($firstNameValid && $lastNameValid && $addressOneValid && $addressTwoValid && $nicknameValid && $travelRadiusValid && $pictureValid && $cityValid && $stateValid && $zipValid && $countryValid && $dobValid && $phoneValid && $emailValid && $phoneTypeValid && $usernameValid && $passwordValid && $termsValid && $prefContactMethodValid)
        {
            $formIsValid = true;
        }
    }

    if (!$formIsValid)
        return $errors;
    else
        return $formIsValid;
}

function validate_first_name($fname)
{
    if (!empty($fname))
    {
        $fname_val = trim(str_replace(range(0,9), '', $fname));
        if (!empty($fname_val))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_last_name($lname)
{
    if (!empty($lname))
    {
        $lname_val = trim(str_replace(range(0,9), '', $lname));
        if (!empty($lname_val))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_address_one($add1)
{
    if (!empty($add1))
    {
        if (preg_match('/^[a-zA-Z0-9 \.\/]{1,200}$/', $add1))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_address_two($add2)
{
    if (!empty($add2))
    {
        if (preg_match('/^[a-zA-Z0-9 \.\#]{1,50}$/', $add2))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_city($city)
{
    if (!empty($city))
    {
        if (preg_match('/^[a-zA-Z \.-]{1,100}$/', $city))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_state($state)
{
    global $my_dbhandle;

    if (!empty($state))
    {
        $stmt = $my_dbhandle->prepare("SELECT name FROM states WHERE id = ?");
        $stmt->bind_param("i", $state);
        $stmt->execute();
        $stmt->bind_result($state_name);
        $stmt->fetch();
        $stmt->close();

        if (empty($state_name))
            return false;
        else
            return true;
    }
    else
        return false;
}

function validate_zip($zip)
{
    if (!empty($zip))
    {
        if (preg_match('/^[0-9-]{1,10}$/', $zip))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_country($country)
{
    global $my_dbhandle;
    
    if (!empty($country))
    {
        $stmt = $my_dbhandle->prepare("SELECT country_code FROM countries WHERE id = ?");
        $stmt->bind_param("i", $country);
        $stmt->execute();
        $stmt->bind_result($country_code);
        $stmt->fetch();
        $stmt->close();

        if (empty($country_code))
            return false;
        else
            return true;
    }
    else
        return false;
}

function validate_phone($phone)
{
    if (!empty($phone))
    {
        if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_phone_type($phoneType)
{
    if (!empty($phoneType))
    {
        if ($phoneType == "home" || $phoneType == "work" || $phoneType == "cell")
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_picture($pic)
{
    if (!empty($pic))
    {
        return true;
    }
    else
        return false;
}

function validate_nickname($nickname)
{
    if (!empty($nickname))
    {
        global $my_dbhandle;
        // prepare and bind
        $stmt = $my_dbhandle->prepare("SELECT nickname FROM users WHERE nickname = ?");
        $stmt->bind_param("s", $nickname);
        $stmt->execute();
        $stmt->bind_result($user);
        $stmt->fetch();
        $stmt->close();
        
        if (empty($user))
            return true;
        else
            return false;
    }
    else
        return false;
    
}

function validate_username($username)
{
    if (!empty($username))
    {
        global $my_dbhandle;
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
    else
        return false;
    
}

function validate_dob($birthday)
{
    if (!empty($birthday))
    {
        $today = strtotime(date('Y-m-d H:i:s'));
        $birthday = strtotime($birthday);
        $age = ($today - $birthday) / (60*60*24*365);

        if ($age > 18)
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_travel_radius($radius)
{
    if (!empty($radius) && is_numeric($radius))
        return true;
    else
        return false;
}

function validate_pref_contact_method($value)
{
    if (!empty($value))
    {
        if (strtolower($value) == "phone" || strtolower($value) == "email")
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_job_title($title)
{
    if (!empty($title))
    {
        $title_val = trim(str_replace(range(0,9), '', $title));
        if (!empty($title_val))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_description($description)
{
    if (!empty($description))
    {
        if (!empty($description) && strlen(trim($description)) > 5)
        {
            $containsBadWords = filter_bad_words($description, "string");
            if ($containsBadWords)
            {
                return false;
            }
            else
                return true;
        }
        else
            return false;
    }
    else
        return false;
}

function validate_category($category)
{
    if (!empty($category))
    {
        $catArr = array('Yard Work','Business','Repairs','Creative','Beauty','Mechanical','Automotive','Computers','Event','Household','Labor / Moving','Legal','Lessons','Marine','Pets');
        if (in_array($category, $catArr))
            return true;
        else
            return false;
    }
    else
        return false;
}

function validate_price($price)
{
    if (!empty($price))
    {
        if (preg_match('/^\d+(?:\.\d{2})?$/', $price) == '0')
            return false;
        else
            return true;
    }
    else
        return false;
}

function validate_tags($tags)
{
    if (!empty($tags))
    {
        $tagsAreValid = -1;
        $tagsArr = explode(',', $tags);
        foreach($tagsArr as $tag)
        {
            if (!empty($tag))
            {
                $containsBadWords = filter_bad_words($tag, "word");
                if ($containsBadWords)
                {
                    $tagsAreValid = false;
                    break;
                }
                else
                    $tagsAreValid = true;

                return $tagsAreValid;
            }
            else
                return false;
        }
        
    }
    else
        return false;
}

function filter_bad_words($str, $type)
{
    $words = array('bitch','bitches','blow job','blowjob','buttfucker','child pornography','clusterfuck','cocaine','crack cocaine','damn','drug','drugs','dumbass','dumb ass','dumbfuck','dumbshit','ecstasy','fuck','fucked','fucking','hell','heroin','human trafficking','jackass','marijuana','meth','methamphetamine','morphine','mother fucker','motherfucker','mother fucking','motherfucking','nigger','opium','penis','pornography','prostitute','sex','sexual','shit','vagina','whore');
    
    if ($type == "word")
    {
        if (in_array($str, $words))
            return true;
        else
            return false;
    }
    elseif ($type == "string")
    {
        foreach($words as $bad)
        {
            if (stripos($str, $bad) !== FALSE)
                return true;
        }

        return false;
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
function validate_email($email, $domainCheck = false)
{
    if (!empty($email))
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
    }

    return false;
}

/*  Function:   validate_password
    Author:     Paul Gerndt
    Purpose:    Used to validate passwords to ensure minimum length and content
                requirements are met.
    Created:    2015-02-16  
*/

function validate_password($candidate) 
{
    if (!empty($candidate))
    {
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
    else
        return false;
}
?>