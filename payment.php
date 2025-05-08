<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
//ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

// Create a new session with a session ID
session_start();

//Form validation script 
include( 'payment-form-validation.php' );
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
<link href="payment.css" rel="stylesheet">

<!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#573c79">
<meta name="msapplication-TileColor" content="#573c79">
<meta name="theme-color" content="#573c79">
<title>Payment - Teaven</title>
</head>
<body>

<!-- Navbar -->
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
        <li class="nav-item"><a href="findUs.php" class="nav-link">CONTACT</a></li>
        <li class="nav-item"><a href="shoppingCart.php" class="nav-link active">CART<i class="fas fa-shopping-cart"></i></a></li>
		  
        <!-- This checks if user is logged-in, if so shows log out button and allows access to account page but if not then shows log in button and restricts access to account page. -->
        <?php

        try {
          require_once( "functions.php" );
          //Check if the user logs in, if so then shows the log out button but if not then shows login button. Try and catch to catch any errrors.

          if ( isset( $_SESSION[ 'logged-in' ] ) ) {
            if ( check_login() ) {
              echo "<li class='nav-item'><a href='customerAccount.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li>
			  <li class='nav-item'><a href='logout.php' class='nav-link'>LOGOUT</a></li>";
            }
          } else {
            echo "<li class='nav-item'><a href='restricted.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li>
			<li class='nav-item'><a href='loginForm.php' class='nav-link'>LOGIN</a></li>";
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
<!-- End of Nav -->

<main>
<!-- To display 'Your cart' item(s), the PHP code below is needed. These code are the same as mango-milk-tea-with-black-pearls.php and okinawa-latte-with-black-pearls.php -->
<?php

$connect = getConnection();

if ( isset( $_COOKIE[ "shopping_cart" ] ) ) {
  $total = 0;
  $cookie_data = stripslashes( $_COOKIE[ 'shopping_cart' ] );
  $cart_data = json_decode( $cookie_data, true );
  foreach ( $cart_data as $keys => $values ) {

    $values[ "item_name" ];

    $values[ "item_price" ];
    $values[ "item_quantity" ];
    number_format( $values[ "item_quantity" ] * $values[ "item_price" ], 2 );
    $values[ "item_id" ];

    $total = $total + ( $values[ "item_quantity" ] * $values[ "item_price" ] );
  }

  number_format( $total, 2 );

} 
?>

<!-- This jumbotron-fluid occupies the entire horizontal space of its parent -->
<!-- A hero section with a responsive img and text on top -->
<div class="jumbotron jumbotron-fluid">
  <div class="container py-5">
    <div class="text-center py-5">
      <h1 class="animate-heading">CHECKOUT</h1>
    </div>
  </div>
</div>
<!-- Displaying 'Your cart' item(s). This is align on the right hand side of the website -->
<div class="container content">
<div class="row">
  <div class="col-md-4 order-md-2 mb-4">
    <h5 class="d-flex justify-content-between align-items-center mb-3">
		<span class="text-muted">Your cart</span>
		<span class="badge badge-secondary badge-pill">
			<!-- Display item_quantity -->
      		<?php  echo $values["item_quantity"];?>
      	</span>
	</h5>
    <ul class="list-group mb-3">
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
			<!-- Display item name -->
          <h6 class="my-0"><?php echo $values["item_name"]; ?></h6>
        </div>
		  <!-- Display item_price -->
        <span class="text-muted">£ <?php echo $values["item_price"]; ?></span> </li>
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
			<!-- Display total of the whole cart -->
      <li class="list-group-item d-flex justify-content-between">
		  <span>Total</span>
		  	<strong>£ <?php echo number_format($total, 2); ?></strong>
	  </li>
    </ul>
    
    <!-- Couldn't get it working with any of the patterns so i commented them out too (they're back in now) 
		 I keep getting errors to fill in required fields even after I take out all the requireds too, idk whats wrong with it--> 
    
  </div>
<!-- End of 'Your cart' section -->

<!-- BILLING ADDRESS FORM -->
  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Billing Address</h4>
    <form action="" method="post" autocomplete="on" role="form">
    <div class="row">
	<!-- First name -->
      <div class="col-md-6 mb-3">
        <label for="firstName">*First name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" pattern="[a-zA-Z]+" title="Only alphabets are allowed." size="20" minlength="1" maxlength="20" placeholder="Jane" required />
		
		 <!-- Display error messages -->  
          <?php echo $b_fnameEmptyErr; ?>  <!-- Error messages for empty input field -->
		  <?php echo $b_fnameErr; ?> <!-- Error messages for incorrect format -->
		  
      </div>
	<!-- Last name -->
      <div class="col-md-6 mb-3">
        <label for="lastName">*Last name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Doe" pattern="[a-zA-Z]+" title="Only alphabets are allowed." size="20" minlength="1" maxlength="50" required />
		<!-- Display error messages --> 
          <?php echo $b_lnameEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $b_lnameErr; ?> <!-- Error messages for incorrect format -->
		  
      </div>
    </div>
	<!-- Phone number -->
    <div class="mb-3">
      <label for="phoneNumber">Phone Number<span class="text-muted"> (Optional)</span></label>
      <div class="input-group">
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" pattern="[0-9]{10,11}" title="Only numbers are allowed, not less than 10-digit and no more than 11-digit." size="20" min="1" max="15" />
		<!-- Display error message --> 
          <?php echo $b_phoneErr; ?> <!-- Error messages for incorrect format -->
		  
      </div>
    </div>
	<!-- Email -->
    <div class="mb-3">
      <label for="email">*Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" pattern="[^@]{1,64}@[^@]{1,255}" title="Invalid email address" size="20" minlength="1" maxlength="50" required/>
		
	  <!-- Display error messages --> 
          <?php echo $b_emailEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $b_emailErr; ?> <!-- Error messages for incorrect format -->
		
    </div>
	<!-- Address 1 -->
    <div class="mb-3">
      <label for="address">*Address 1</label>
      <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" pattern="\d+\s[A-z]+\s[A-z]+" title="Invalid address" size="50" minlength="1" maxlength="50" required />
	   <!-- Display error messages --> 
          <?php echo $b_addressOneEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $b_addressOneErr; ?> <!-- Error messages for incorrect format -->
    </div>
	<!-- Address 2 -->
    <div class="mb-3">
      <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
      <input type="text" class="form-control" id="address2" name="address2" pattern="[A-z]+\s[A-z]+" title="Invalid address" size="50" minlength="1" maxlength="50" placeholder="Apartment or suite" />
		<!-- Display error message --> 
		 <?php echo $b_addressTwoErr; ?> <!-- Error messages for incorrect format -->
    </div>
    <div class="row">
		<!-- City -->
      <div class="col-md-5 mb-3">
        <label for="city">*City</label>
        <input type="text" class="form-control" id="city" name="city" pattern="[A-Za-zÀ-ÿ\.'*`´’,\- ]{1,34}$" title="Invalid city" size="50" maxlength="50" placeholder="Newcastle upon Tyne" minlength="1" maxlength="70" required />
		   <!-- Display error messages --> 
          <?php echo $b_cityEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $b_cityErr; ?> <!-- Error messages for incorrect format -->
      </div>
		<!-- Country -->
      <div class="col-md-4 mb-3">
        <label for="country">*Country</label>
        <input type="text" class="form-control" id="country" name="country" pattern="[A-Za-zÀ-ÿ\.'*`´’,\- ]{1,34}$" title="Invalid country" size="50" maxlength="50" placeholder="United Kingdom" minlength="1" maxlength="70" required />
		  <!-- Display error messages --> 
          <?php echo $b_countryEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $b_countryErr; ?> <!-- Error messages for incorrect format -->
      </div>
		<!-- Post Code -->
      <div class="col-md-3 mb-3">
        <label for="post-code">*Post Code</label>
        <input type="text" class="form-control" id="post-code" placeholder="WC14 2TY" name="post-code" pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}" title="Invalid post code" size="7" minlength="1" maxlength="8" required />
		  <!-- Display error messages --> 
          <?php echo $b_postcodeEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $b_postcodeErr ; ?> <!-- Error messages for incorrect format -->
      </div>
    </div>
    <hr class="mb-4"> <!-- hr is being used to separate section -->

	<!-- Payment section -->
    <h4 class="mb-3">Payment</h4>
    <div class="d-block my-3">
	<!-- Radio buttons for payment types -->
      <div class="custom-control custom-radio">
        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
        <label class="custom-control-label" for="credit">Credit card</label>
      </div>
      <div class="custom-control custom-radio">
        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
        <label class="custom-control-label" for="debit">Debit card</label>
		  <!-- Display error messages --> 
          <?php echo $paymentTypeEmptyErr; ?> <!-- Error messages for empty input field -->
		  
      </div>
    </div>
	<!-- End of first row of card details -->
	<!-- First row - card details -->
    <div class="row">
	<!-- Card Name -->
      <div class="col-md-6 mb-3">
        <label for="card-name">*Name on card</label>
        	<input type="text" class="form-control" id="card-name" placeholder="Jane Doe" name="card-name" pattern="[a-z ,.'-]+" title="Invalid card name" size="20" minlength="1" maxlength="20" required />
        <small class="text-muted">Full name as displayed on card</small>
		   <!-- Display error messages --> 
          <?php echo $cardNameEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $cardNameErr; ?> <!-- Error messages for incorrect format -->
		</div>
	<!-- Card Number -->
      <div class="col-md-6 mb-3">
        <label for="cardNumber">*Credit card number</label>
        	<input type="text" class="form-control" id="cardNumber" placeholder="1111 1111 1111 1111" name="cardNumber" pattern="(\d{4} *\d{4} *\d{4} *\d{4})" title="Invalid card number" size="16" minlength="1" maxlength="19" required />
		   <!-- Display error messages --> 
          <?php echo $cardNumberEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $cardNumberErr; ?> <!-- Error messages for incorrect format -->
      </div>
    </div
		
		
	<!-- Second row - card details -->
    <div class="row">
	<!-- Card expiration date -->
      <div class="col-md-3 mb-3">
        <label for="card-expiration">*Expiration</label>
        <input type="text" class="form-control" id="card-expiration" placeholder="MM/YY" name="card-expiration" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})" title="Invalid expiration date" min="05/21" max="01/30" required />
		   <!-- Display error messages --> 
          <?php echo $cardExpirationEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $cardExpirationErr; ?> <!-- Error messages for incorrect format -->
      </div>
	<!-- Card CVV -->
      <div class="col-md-3 mb-3">
        <label for="card-cvv">*CVV</label>
        <input type="text" class="form-control" id="card-cvv" placeholder="888" name="card-cvv" pattern="[0-9]{3,3}" title="Invalid  CVV number" size="3" minlength="1" maxlength="3" required />
		  <!-- Display error messages --> 
          <?php echo $cardCvvEmptyErr; ?> <!-- Error messages for empty input field -->
		  <?php echo $cardCvvErr; ?> <!-- Error messages for incorrect format -->
      </div>
    </div>
	<!-- End of second row of card details -->
    <hr class="mb-4">
	<!-- Pay button -->
		<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block submit-btn">Complete Purchase</button>
	
    <hr class="mb-4">
    </form>
  </div>

</main>
<!-- End of main -->
	
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

<!-- JQuery Script File --> 
<script src=
"https://code.jquery.com/jquery-1.12.4.min.js"></script> 

<!-- Font Awesome Kit - this is link to an account --> 
<script src="https://kit.fontawesome.com/799d082bbd.js" crossorigin="anonymous"></script> 

<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src="script.js" type="text/javascript"></script> 

<!-- JAVASCRIPT FOR DIFFERENT ADDRESS

The one in the normal script didn't work for me but this does

<script type="text/javascript">
  function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("diff-address");
    // Get the output text
    var text = document.getElementById("delivery-address");

    // If the checkbox is checked, display the output text
    if (checkBox.checked){
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }
</script>-->
</body>
</html>