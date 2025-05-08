<?php

// Error messages for empty input fields for billing address
$b_fnameEmptyErr = "";
$b_lnameEmptyErr = "";
$b_emailEmptyErr = "";
$b_addressOneEmptyErr = "";
$b_cityEmptyErr = "";
$b_countryEmptyErr = "";
$b_postcodeEmptyErr = "";

// Error messages for empty input fields for card details
$paymentTypeEmptyErr = "";
$cardNameEmptyErr = "";
$cardNumberEmptyErr = "";
$cardExpirationEmptyErr = "";
$cardCvvEmptyErr = "";

// Error messages for incorrect format for billing address
$b_fnameErr = "";
$b_lnameErr = "";
$b_emailErr = "";
$b_phoneErr = "";
$b_addressOneErr = "";
$b_addressTwoErr = "";
$b_cityErr = "";
$b_countryErr = "";
$b_postcodeErr = "";


// Error messages for incorrect format for card details
$cardNameErr = "";
$cardNumberErr = "";
$cardExpirationErr = "";
$cardCvvErr = "";


if ( isset( $_POST[ "submit" ] ) ) {
  // Set form variables - billing address
  $b_fname = checkInput( $_POST[ "firstName" ] );
  $b_lname = checkInput( $_POST[ "lastName" ] );
  $b_phone = checkInput( $_POST[ "phoneNumber" ] );
  $b_email = checkInput( $_POST[ "email" ] );
  $b_addressOne = checkInput( $_POST[ "address" ] );
  $b_addressTwo = checkInput( $_POST[ "address2" ] );
  $b_city = checkInput( $_POST[ "city" ] );
  $b_country = checkInput( $_POST[ "country" ] );
  $b_postcode = checkInput( $_POST[ "post-code" ] );

 
//$cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
	
  // Set form variables - card details
  $paymentType = checkInput( $_POST[ "paymentMethod" ] );
  $cardName = checkInput( $_POST[ "card-name" ] );
  $cardNumber = checkInput( $_POST[ "cardNumber" ] );
  $cardExpiration = checkInput( $_POST[ "card-expiration" ] );
  $cardCvv = checkInput( $_POST[ "card-cvv" ] );
	
		
		

//Set variable to false
$error = false;
	
  // START OF BILLING ADDRESS 

  // First Name validation
  if ( empty( $b_fname ) ) {
    $b_fnameEmptyErr = '<span class="error">
                First Name can not be left blank.
            </span>';
    $error = true;

  } // Allow letters and white space 
  else if ( !preg_match( "/^[a-zA-Z]+$/", $b_fname ) ) {
    $b_fnameErr = '<span class="error">
                Only letters and white space allowed.
            </span>';
    $error = true;
  }
  // Last Name validation
  if ( empty( $b_lname ) ) {
    $b_lnameEmptyErr = '<span class="error">
                Last Name can not be left blank.
            </span>';
    $error = true;

  } // Allow letters and white space 
  else if ( !preg_match( "/^[a-zA-Z]+/", $b_lname ) ) {
    $b_lnameErr = '<span class="error">
                Only letters and white space allowed.
            </span>';
    $error = true;
  }

  // Phone format validation
  if ( !preg_match( "/^[0-9]{10,11}$/", $b_phone ) ) {
    $b_phoneErr = '<span class="error">
                    Phone format is not valid.
            </span>';
    $error = true;
  }

  // Email validation
  if ( empty( $b_email ) ) {
    $b_emailEmptyErr = '<span class="error">
                Email can not be left blank.
            </span>';
    $error = true;

  }
  // E-mail format validation
  else if ( !preg_match( "/^[^@]{1,64}@[^@]{1,255}$/", $b_email ) ) {
    $b_emailErr = '<span class="error">
                    Email format is not valid.
            </span>';
    $error = true;
  }
  // Address 1 validation
  if ( empty( $b_addressOne ) ) {
    $b_addressOneEmptyErr = '<span class="error">
                Address 1 can not be left blank.
            </span>';
    $error = true;

  }
  // address 1 format validation
  else if ( !preg_match( "/^\d+\s[A-z]+\s[A-z]+$/", $b_addressOne ) ) {
    $b_addressOneErr = '<span class="error">
                    Address 1 format is not valid.
            </span>';
    $error = true;
  }

  // address 2 format validation
  if ( !preg_match( "/^[A-z]+\s[A-z]+$/", $b_addressTwo ) ) {
    $b_addressTwoErr = '<span class="error">
                    Address 2 format is not valid.
            </span>';
    $error = true;
  }

  // City validation
  if ( empty( $b_city ) ) {
    $b_cityEmptyErr = '<span class="error">
                City can not be left blank.
            </span>';
    $error = true;

  }
  // City format validation
  else if ( !preg_match( "/^[A-Za-zÀ-ÿ\.'*`´’,\- ]{1,34}$/", $b_city ) ) {
    $b_cityErr = '<span class="error">
                    City format is not valid.
            </span>';
    $error = true;
  }

  // Country validation
  if ( empty( $b_country ) ) {
    $b_countryEmptyErr = '<span class="error">
                Country can not be left blank.
            </span>';
    $error = true;

  }
  // Country format validation
  else if ( !preg_match( "/^[A-Za-zÀ-ÿ\.'*`´’,\- ]{1,34}$/", $b_country ) ) {
    $b_countryErr = '<span class="error">
                    Country format is not valid.
            </span>';
    $error = true;
  }

  // Post Code validation
  if ( empty( $b_postcode ) ) {
    $b_postcodeEmptyErr = '<span class="error">
                Post Code can not be left blank.
            </span>';
    $error = true;

  }
  // Post Code format validation
  else if ( !preg_match( "/^[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}$/", $b_postcode ) ) {
    $b_postcodeErr = '<span class="error">
                    Post Code format is not valid.
            </span>';
    $error = true;
  }


  // END OF BILLING ADDRESS 

  

  // START OF CARD DETAILS

  // Payment method - radio button validation
  if ( empty( $paymentType ) ) {
    $paymentTypeEmptyErr = '<div class="error">
                Specify your payment type.
            </div>';
  }
  // Card name validation
  if ( empty( $cardName ) ) {
    $cardNameEmptyErr = '<span class="error">
                Card Name can not be left blank.
            </span>';
    $error = true;

  } // Allow letters and white space 
  else if ( !preg_match( "/^[a-z ,.'-]+$/", $cardName ) ) {
    $cardNameErr = '<span class="error">
                Only letters and white space allowed.
            </span>';
    $error = true;
  }

  // Card number validation
  if ( empty( $cardNumber ) ) {
    $cardNumberEmptyErr = '<span class="error">
                Card Number can not be left blank.
            </span>';
    $error = true;

  } // Card Number format validation
  else if ( !preg_match( "/^(\d{4} *\d{4} *\d{4} *\d{4})$/", $cardNumber ) ) {
    $cardNumberErr = '<span class="error">
                Card Number format is not valid.
            </span>';
    $error = true;
  }
  // Card expiration date validation
  if ( empty( $cardExpiration ) ) {
    $cardExpirationEmptyErr = '<span class="error">
                Card Expiration date can not be left blank.
            </span>';
    $error = true;

  } // Card Expiration date format validation 
  else if ( !preg_match( "/^(0[1-9]|1[0-2])\/?([0-9]{2})$/", $cardExpiration ) ) {
    $cardExpirationErr = '<span class="error">
                Card Expiration date format is not valid.
            </span>';
    $error = true;
  }
  // Card CVV validation
  if ( empty( $cardCvv ) ) {
    $cardCvvEmptyErr = '<span class="error">
                Card CVV can not be left blank.
            </span>';
    $error = true;

  } // Card CVV validation
  else if ( !preg_match( "/^[0-9]{3,3}$/", $cardCvv ) ) {
    $cardCvvErr = '<span class="error">
                Card CVV format is not valid.
            </span>';
    $error = true;
  }

  // END OF CARD DETAILS  

  //If there are no errors direct the user to success page
  if ( $error == false ) {
    header( "Location: success.php" );
  }

}
// To protect against XSS attacks, function checkInput() has been created. It takes input data as a parameter and processes the input data by using trim, stripslashes, and htmlspecialchars() then returns $input
function checkInput( $input ) {
  $input = trim( $input );
  $input = stripslashes( $input );
  $input = htmlspecialchars( $input );
  return $input;
}

?>