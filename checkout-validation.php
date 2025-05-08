<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
//ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

// Create a new session with a session ID
session_start();

?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Custom styles for this website -->
<link href="checkout.css" rel="stylesheet">

<!-- Font Awesome Kit --> 
<script src="https://kit.fontawesome.com/799d082bbd.js" crossorigin="anonymous"></script> 

<!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#573c79">
<meta name="msapplication-TileColor" content="#573c79">
<meta name="theme-color" content="#573c79">
<title>Checkout - Teaven</title>
</head>
<body>
  <!-- Navbar-->
  <nav class="navbar navbar-expand-lg py-3 navbar-dark shadow-sm">
    <div class="container"> <a href="home.php" class="navbar-brand"> 
      <!-- Logo Image - aligning left hand side of the screen --> 
      <img src="img/teavenLogoThree-purple.png" class="logo" alt="" class="d-inline-block align-middle mr-2"> </a>
	  <!-- Nav toggle button (hamburger menu) - this toggle appears when a user is in mobile/ tablet view -->
      <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
		<!-- Nav content - Home, Shop, Our Story, Contact, Cart, Account, Login/Logout -->
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="home.php" class="nav-link">HOME</a></li>
          <li class="nav-item"><a href="shop.php" class="nav-link">SHOP</a></li>
          <li class="nav-item"><a href="ourStory.php" class="nav-link">OUR STORY</a></li>
          <li class="nav-item"><a href="findUs.php" class="nav-link active">CONTACT</a></li>
          <li class="nav-item"><a href="shoppingCart.php" class="nav-link">CART<i class="fas fa-shopping-cart"></i></a></li>
          
          <!-- This checks if user is logged-in, if so shows log out button and allows access to account page but if not then shows log in button and restricts access to account page. -->
          <?php
          try {
            require_once( "functions.php" );
            //Check if the user logs in, if so then shows the log out button but if not then shows login button. Try and catch to catch any errrors.

            if ( isset( $_SESSION[ 'logged-in' ] ) ) {
              if ( check_login() ) {
                echo "<li class='nav-item'><a href='customerAccount.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li>
				<li class='nav-item'><a href='logout.php' class='nav-link'>LOGOUT</a></li>"; // Logout button
              }
            } else {
              echo "<li class='nav-item'><a href='restricted.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li>
			  <li class='nav-item'><a href='loginForm.php' class='nav-link'>LOGIN</a></li>"; // Login button
            }
          } catch ( Exception $e ) {
            //Output error message
            echo "<p>problem occured</p>\n";
            //Log error
            log_error( $e );
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
	</br></br></br></br></br>

	
<?php
  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
  
/******** This is the part that didn't work for me ************/

  if(isset($_POST["fname"])) {
    if(preg_match("/^[a-zA-Z]+$/", trim($_POST["fname"]))) {
	  echo ("First name valid.<br/>");
    } else {
	  echo ("First name is invalid.<br/>");
    }
  }
	
  if(isset($_POST["lname"])) {
    if(preg_match("/^[a-zA-Z]+$/", trim($_POST["lname"]))) {
	  echo("Last name is valid. <br />");
    } else {
	  echo ("Last name is invalid.<br/>");
    }
  }
	
  if(isset($_POST["studentid"])) {
    if(preg_match("/^[A-Z][0-9]{8}+$/", trim($_POST["studentid"]))) {
      echo("Student ID is valid. <br />");
    } else {
	  echo ("Student ID is invalid.<br/>");
    }
  }
	
  if(isset($_POST["contactnumber"])) {
    if(preg_match("/^[0-9]{10,11}$/", trim($_POST["contactnumber"]))) {
	  echo("Contact Number is valid. <br />");
    } else {
	  echo ("Contact Number is invalid.<br/>");
    }
  }
	
  if(isset($_POST["email"])) {
    if(preg_match("/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", trim($_POST["email"]))) {
	  echo("E-mail is valid. <br />");
    } else {
	  echo ("E-mail is invalid.<br/>");
    }
  }

/***************************************************************/


  //Billing address variables
  $b_fname = filter_has_var(INPUT_POST, 'firstName') ? $_POST['firstName'] : null;
  $b_lname = filter_has_var(INPUT_POST, 'lastName') ? $_POST['lastName'] : null;
  $b_phone = filter_has_var(INPUT_POST, 'phoneNumber') ? $_POST['phoneNumber'] : null;
  $b_email = filter_has_var(INPUT_POST, 'email') ? $_POST['email'] : null;
  $b_address = filter_has_var(INPUT_POST, 'address') ? $_POST['address'] : null;
  $b_address2 = filter_has_var(INPUT_POST, 'address2') ? $_POST['address2'] : null;
  $b_city = filter_has_var(INPUT_POST, 'city') ? $_POST['city'] : null;
  $b_country = filter_has_var(INPUT_POST, 'country') ? $_POST['country'] : null;
  $b_postCode = filter_has_var(INPUT_POST, 'post-code') ? $_POST['post-code'] : null;

  //Shipping address variables
  $shipping = filter_has_var(INPUT_POST, 'diff-address') ? $_POST['diff-address'] : null;
  $d_fname = filter_has_var(INPUT_POST, 'delivery-firstName') ? $_POST['delivery-firstName'] : null;
  $d_lname = filter_has_var(INPUT_POST, 'delivery-lastName') ? $_POST['delivery-lastName'] : null;
  $d_phone = filter_has_var(INPUT_POST, 'delivery-phoneNumber') ? $_POST['delivery-phoneNumber'] : null;
  $d_email = filter_has_var(INPUT_POST, 'delivery-email') ? $_POST['delivery-email'] : null;
  $d_address = filter_has_var(INPUT_POST, 'delivery-address') ? $_POST['delivery-address'] : null;
  $d_address2 = filter_has_var(INPUT_POST, 'delivery-address2') ? $_POST['delivery-address2'] : null;
  $d_city = filter_has_var(INPUT_POST, 'delivery-city') ? $_POST['delivery-city'] : null;
  $d_country = filter_has_var(INPUT_POST, 'delivery-country') ? $_POST['delivery-country'] : null;
  $d_postCode = filter_has_var(INPUT_POST, 'delivery-post-code') ? $_POST['delivery-post-code'] : null;

  //Payment variables
  $payment = filter_has_var(INPUT_POST, 'paymentMethod') ? $_POST['paymentMethod'] : null;
  $cardName = filter_has_var(INPUT_POST, 'card-name') ? $_POST['card-name'] : null;
  $cardNumber = filter_has_var(INPUT_POST, 'card-number') ? $_POST['card-number'] : null;
  $exp = filter_has_var(INPUT_POST, 'card-expiration') ? $_POST['card-expiration'] : null;
  $cvv = filter_has_var(INPUT_POST, 'card-cvv') ? $_POST['card-cvv'] : null;

  //Set error to false
  $error = false;

  //Remove whitespace from beginning and end of string
  $b_fname = trim($b_fname);
  $b_lname = trim($b_lname);
  $b_phone = trim($b_phone);
  $b_email = trim($b_email);
  $b_address = trim($b_address);
  $b_address2 = trim($b_address2);
  $b_city = trim($b_city);
  $b_country = trim($b_country);
  $b_postCode = trim($b_postCode);
  $d_fname = trim($d_fname);
  $d_lname = trim($d_lname);
  $d_phone = trim($d_phone);
  $d_email = trim($d_email);
  $d_address = trim($d_address); 
  $d_address2 = trim($d_address2);
  $d_city = trim($d_city);
  $d_country = trim($d_country);
  $d_postCode = trim($d_postCode);
  $cardName = trim($cardName);
  $cardNumber = trim($cardNumber);
  $exp = trim($exp);
  $cvv = trim($cvv);

  //Check for empty fields
  if (empty($b_fname) || empty($b_lname) || empty($b_email) || empty($b_address) || empty($b_city) || empty($b_postCode) || empty($d_fname) || empty($d_lname) || empty($d_email) || empty($d_address) || empty($d_city) || empty($d_postCode) || empty($payment) || empty($cardName) || empty($cardNumber) || empty($exp) || empty($cvv)) {
    alert("Please fill in all the required fields.");
    $error = true;
  }

  //Check if names are too long
  if ((strlen($b_fname) > 20) || (strlen($b_lname) > 20) || (strlen($d_fname) > 20) || (strlen($d_lname) > 20) || (strlen($cardName) > 20)) {
	alert("Please provide names within 20 characters.");
	$error = true;
  }

  //Check phone numbers are integers
  if ((!filter_var($b_phone, FILTER_VALIDATE_INT)) || (!filter_var($d_phone, FILTER_VALIDATE_INT))) {
	alert("Please provide a valid phone number.");
	$error = true;
  }  

  //Check emails are valid
  if ((!filter_var($b_email, FILTER_VALIDATE_EMAIL)) || (!filter_var($d_email, FILTER_VALIDATE_EMAIL))) {
	alert("Please provide a valid email.");
	$error = true;
  }

  //Check if post code is too long
  if ((strlen($b_postCode) > 8) || (strlen($d_postCode) > 8)) {
	alert("Please provide a valid post code.");
	$error = true;
  }

  //Check card number is integer
  if (!filter_var($cardNumber, FILTER_VALIDATE_INT)) {
	alert("Please provide a valid card number.");
	$error = true;
  }  

  //Check if cvv is too long
  if (strlen($cvv) > 3) {
	alert("Please provide a valid cvv.");
	$error = true;
  }

  //If there are no errors redirect to confirmation page
  if ($error == false) {
	header("Location: success.php");
  }
  
  //If there are errors redirect back to checkout page
  if ($error == true) {
	echo "<script type='text/javascript'>window.location.href='checkout.php'</script>";
  }

?>
<!-- FOOTER -->
<!-- Footer contains 2 rows and 3 columns of content. All columns are wrapped together using 'container' class and 'row' class -->
<!-- First column contains the logo and social media icons. Those icons are from Font Awesome -->
<footer>
  <div class="footer">
    <div class="container">
	<!-- First row -->
      <div class="row">
        <div class="col-lg-5 col-xs-12"> <img  src="img/teavenLogo.png" class="footer-logo"/>
          <div class="footer-socialmedia text-center"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> <a href="#"><i class="fab fa-youtube"></i></a> </div>
        </div>
		<!-- Second column contains a list of our three main content - Shop, Our Story and Contact -->
        <div class="col-lg-3 col-xs-12 links text-center">
          <h3>USEFUL LINKS</h3>
          <ul class="m-0 p-0 " >
            <li><a href="shop.php">Shop</a></li>
            <li><a href="ourStory.php">Our Story</a></li>
            <li><a href="findUs.php">Contact</a></li>
          </ul>
        </div>
		<!-- Third column contains our contact info. The phone number and email are clickable so a user can contact us just by clicking the links -->
        <div class="col-lg-4 col-xs-12 location text-center">
          <h3>CONTACT INFO</h3>
          <p>22, Lorem ipsum dolor</p>
          <p><a href="tel:5417543010" class="phone-link"><i class="fa fa-phone mr-3"></i>(541) 754-3010</a></p>
          <p><a href="mailto:hello@teaven.com" class="email-link"><i class="fa fa-envelope-o mr-3"></i>hello@teaven.com</a></p>
        </div>
      </div>
	<!-- Second row -->
		<!-- This copyright text takes the full width of the column -->
      <div class="row mt-3">
        <div class="col copyright text-center">
          <p class="pt-4"><small class="text-white-50">&copy;
			  <!-- This javascript snippet will automatically update the copyright year, depending on the user's time settings -->
			  <script type="text/javascript">
				  document.write(new Date().getFullYear());
			  </script>Teaven. All Rights Reserved.</small></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- Font Awesome Kit - this is link to an account --> 
<script src="https://kit.fontawesome.com/799d082bbd.js" crossorigin="anonymous"></script>
<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src="script.js" type="text/javascript"></script>
</body>
</html>