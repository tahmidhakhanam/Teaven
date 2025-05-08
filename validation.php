<?php

// Error messages
$fnameEmptyErr = "";
$lnameEmptyErr = "";
$emailEmptyErr = "";
$messageEmptyErr = "";

$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$phoneErr = "";

//Check if referer exists
if ( isset( $_SERVER[ 'HTTP_REFERER' ] ) ) {
  //If it does then store referer in variable
  $referer = $_SERVER[ 'HTTP_REFERER' ];
} else {
  //If not then store findUs.php in variable
  $referer = 'findUs.php';
}

//Set variable to false
$error = false;

if ( isset( $_POST[ "submit" ] ) ) {
  // Set form variables
  $fname = checkInput( $_POST[ "fname" ] );
  $lname = checkInput( $_POST[ "lname" ] );
  $email = checkInput( $_POST[ "email" ] );
  $phone = checkInput( $_POST[ "phoneNo" ] );
  $message = checkInput( $_POST[ "message" ] );

  // Name validation
  if ( empty( $fname ) ) {
    $fnameEmptyErr = '<div class="error">
                Name can not be left blank.
            </div>';
    $error = true;

  } // Allow letters and white space 
  else if ( !preg_match( "/^[a-zA-Z]+$/", $fname ) ) {
    $fnameErr = '<span class="error">
                Only letters and white space allowed.
            </span>';
    $error = true;
  }
  // Name validation
  if ( empty( $lname ) ) {
    $lnameEmptyErr = '<span class="error">
                Name can not be left blank.
            </span>';
    $error = true;

  } // Allow letters and white space 
  else if ( !preg_match( "/^[a-zA-Z]+/", $lname ) ) {
    $lnameErr = '<span class="error">
                Only letters and white space allowed.
            </span>';
    $error = true;
  }

  // Email validation
  if ( empty( $email ) ) {
    $emailEmptyErr = '<span class="error">
                Email can not be left blank.
            </span>';
    $error = true;

  }
  // E-mail format validation
  else if ( !preg_match( "/^[^@]{1,64}@[^@]{1,255}$/", $email ) ) {
    $emailErr = '<span class="error">
                    Email format is not valid.
            </span>';
    $error = true;
  }


  // E-mail format validation
  if ( !preg_match( "/^[0-9]{10,11}$/", $phone ) ) {
    $phoneErr = '<span class="error">
                    Phone format is not valid.
            </span>';
    $error = true;
  }

  // Text-area validation
  if ( empty( $message ) ) {
    $messageEmptyErr = '<span class="error">
                This field is required.
            </span>';
    $error = true;
  }

  //If there are not errors..
  if ( $error == false ) {
    header( "Location: form-submitted.php" );
  }
}


function checkInput( $input ) {
  $input = trim( $input );
  $input = stripslashes( $input );
  $input = htmlspecialchars( $input );
  return $input;
}
?>