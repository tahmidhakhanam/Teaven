<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
//ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

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
        
        <!-- This checks if user is logged-in, if so shows log out button but if not then shows log in button. -->
        <?php

        try {
          require_once( "functions.php" );
          //Check if the user logs in, if so then shows the log out button and allows access to account page but if not then shows login button and restricts access to account page. Try and catch to catch any errrors.

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
  <h5 class="d-flex justify-content-between align-items-center mb-3"> <span class="text-muted">Your cart</span> <span class="badge badge-secondary badge-pill"> 
    <!-- Display item_quantity -->
    <?php  echo $values["item_quantity"];?>
    </span> </h5>
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
    <li class="list-group-item d-flex justify-content-between"> <span>Total</span> <strong>£ <?php echo number_format($total, 2); ?></strong> </li>
  </ul>
  
  <!-- Couldn't get it working with any of the patterns so i commented them out too (they're back in now) 
		 I keep getting errors to fill in required fields even after I take out all the requireds too, idk whats wrong with it--> 
  
</div>
<!-- End of 'Your cart' section --> 

<!-- Buttons -->
<div class="col-md-8 order-md-1">
  <div class="row"> 
    <div class="col-md-6 mb-3 text-center"> 
      <!-- Pay by card button --> 
      <a href="payment.php">
      <button class="btn btn-primary btn-lg btn-block payment-btn">Pay by Card</button>
      </a> 
      <!-- A user can also pay via paypal by click on this button below --> 
      <!-- HTML Form Basics for PayPal Payments Standard --> 
      <!-- PayPal Payments Standard FORM are always hidden from the payer's view -->
      <h5 class="text-center pt-5">Or pay by PayPal</h5>
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <!-- _xclick = The button that the person clicked was a Buy Now button -->
        <input type="hidden" name="charset" value="utf-8">
        <input type="hidden" name="business" value="sb-g0bao3508800@business.example.com">
        <!-- item_name, item_number, quantity and amount is dynamically link to the value from the shopping cart - using PHP code fetch and display data -->
        <input type="hidden" name="item_name" value="<?php echo $values["item_name"]; ?>">
        <input type="hidden" name="amount" value="<?php echo $values["item_price"]; ?>">
        <input type="hidden" name="quantity" value="<?php  echo $values["item_quantity"];?>">
        <input type="hidden" name="currency_code" value="GBP">
        <input type="hidden" name="return" value="http://unn-w17017369.newnumyspace.co.uk/site/success.php">
        <!-- Paypal button - display an appropriate button image -->
        <input type="image" name="submit" class="paypal-btn"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
      </form>
    </div>
  </div>
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