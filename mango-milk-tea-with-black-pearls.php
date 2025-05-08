<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
//ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

// Create a new session with a session ID
session_start();

// To establish a connect to the database, PHP code from another file needs to be embedded 
require_once( "functions.php" );
// Make database connection 
$connect = getConnection();

//$message = '';

// To check if a particular item has been added into cart, an if statement and under condition there's an isset function with the add_to_cart variable. If the cart variable .
if ( isset( $_POST[ "add_to_cart" ] ) ) {
  // If the item has already been added to the cart then this following block code will execute
  if ( isset( $_COOKIE[ "shopping_cart" ] ) ) {
    // Stripslashes function will remove any backslashes
    $cookie_data = stripslashes( $_COOKIE[ 'shopping_cart' ] );
    // This will convert JSON string to PHP variable and store it under cart_data variable 
    $cart_data = json_decode( $cookie_data, true );
    // Else if the if statement is false then the cart_data is equal to blank array
  } else {
    $cart_data = array();
  }
  // To get a list of item IDs that has been added into shopping cart, this function has been created. This will return value of item_id key from cart_data variable and store it under item_id_list variable
  $item_id_list = array_column( $cart_data, 'item_id' );

  // If a user has added the same item into the shopping cart then ONLY the quantity will need to be increased, not the whole item added again
  if ( in_array( $_POST[ "hidden_id" ], $item_id_list ) ) {
    // This foreach loop function is checking whether or not the same item has been added 
    foreach ( $cart_data as $keys => $values ) {
      // If the same item has been added then the quantity value will increase, so This code will not add new an item into the shopping cart, only the item quantity will be changed when the same item add has been added
      if ( $cart_data[ $keys ][ "item_id" ] == $_POST[ "hidden_id" ] ) {
        $cart_data[ $keys ][ "item_quantity" ] = $cart_data[ $keys ][ "item_quantity" ] + $_POST[ "quantity" ];
      }
    }
    // Else if a new item has been added to the shopping cart then this block of code will be executed 
  } else {
    // Storing all form data (below) into item_array variable
    $item_array = array(
      'item_id' => $_POST[ "hidden_id" ], // item_id value is set to get from post hidden_id
      'item_name' => $_POST[ "hidden_name" ], // item_name value is set to get from post hidden_name
      'item_price' => $_POST[ "hidden_price" ], // item_price value is set to get from hidden_price
      'item_quantity' => $_POST[ "quantity" ] // item_quantity value is set to get from quantity
    );
    // The item_array data is then stored into this $cart_data[]
    $cart_data[] = $item_array;
  }

  // $item_data variable is created to convert PHP array to JSON string
  // setcookie function takes three arguments - first argument is shopping_cart which is the name of this cookie, second argument is item_data which is data from $item_array which then stored under this shopping_cart variable and the third argument is the time function, 86400 * 30 = 1 day - meaning this cookie data will be expired after one day.
  // Once a user has added an item into the cart, the page will redirect to shoppingCart.php?success=1
  $item_data = json_encode( $cart_data );
  setcookie( 'shopping_cart', $item_data, time() + ( 86400 * 30 ) );
  header( "location:shoppingCart.php?success=1" );
}

if ( isset( $_GET[ "action" ] ) ) {

  // Create Delete function - delete item from the shopping cart
  if ( $_GET[ "action" ] == "delete" ) {
    // Remove backslpashes
    $cookie_data = stripslashes( $_COOKIE[ 'shopping_cart' ] );
    // Convert JSON string to PHP variable
    $cart_data = json_decode( $cookie_data, true );
    foreach ( $cart_data as $keys => $values ) {
      if ( $cart_data[ $keys ][ 'item_id' ] == $_GET[ "id" ] ) {
        // Unset function will destroy $keys
        unset( $cart_data[ $keys ] );
        // To update array data in cookie variable, cart_data array needs to be converted to JSON string
        $item_data = json_encode( $cart_data );
        // setcookie function takes three arguments - first argument is shopping_cart which is the name of this cookie, second argument is item_data which is data from $item_array which then stored under this shopping_cart variable and the third argument is the time function, 86400 * 30 = 1 day. This function will update the shopping cart cookie data
        // Once an item has been removed, the page will redirect to shoppingCart.php?remove=1
        setcookie( "shopping_cart", $item_data, time() + ( 86400 * 30 ) );
        header( "location:shoppingCart.php?remove=1" );
      }
    }
  }
  // This is 'Clear all' function
  if ( $_GET[ "action" ] == "clear" ) {
    // Time() - 3600 will expire shopping cart cookie variable with blank data so the shopping cart data will be destroyed
    // Then this page will be redirected to shoppingCart.php?clearall=1 URL after a user has clicked clear all button
    setcookie( "shopping_cart", "", time() - 3600 );
    header( "location:shoppingCart.php?clearall=1" );
  }

}


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
<link href="product.css" rel="stylesheet">

<!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#573c79">
<meta name="msapplication-TileColor" content="#573c79">
<meta name="theme-color" content="#573c79">
<title>Mango Milk Tea with Black Pearls - Teaven</title>
</head>
<body>

<!-- NAVBAR-->
<nav class="navbar navbar-expand-lg py-3 navbar-dark shadow-sm">
  <div class="container"> <a href="home.php" class="navbar-brand"> 
    <!-- Logo Image --> 
    <img src="img/teavenLogoThree-purple.png" class="logo" alt="" class="d-inline-block align-middle mr-2"> </a>
    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="home.php" class="nav-link">HOME</a></li>
        <li class="nav-item"><a href="shop.php" class="nav-link active">SHOP</a></li>
        <li class="nav-item"><a href="ourStory.php" class="nav-link">OUR STORY</a></li>
        <li class="nav-item"><a href="findUs.php" class="nav-link">CONTACT</a></li>
        <li class="nav-item"><a href="shoppingCart.php" class="nav-link">CART<i class="fas fa-shopping-cart"></i></a></li>
		  
        <!-- This checks if user is logged-in, if so shows log out button and allows access to account page  but if not then shows log in button and restricts access to accoun page. -->
        
        <?php

        try {
          require_once( "functions.php" );
          //Check if the user logs in, if so then shows the log out button but if not then shows login button. Try and catch to catch any errrors.

          if ( isset( $_SESSION[ 'logged-in' ] ) ) {
            if ( check_login() ) {
              echo "
			  <li class='nav-item'><acustomerAccounttricted.php' class='nav-link'>ACCOUNT<i class='fas fa-user-circle'></i></a></li><li class='nav-item'><a href='logout.php' class='nav-link'>LOGOUT</a></li>";
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
<main>
<div class="container py-5">
<div class="row">
<div class="col">
  <div class="box"> <img src="img/bubbleTeaOne.png"> </div>
</div>
<?php

$dbConn = getConnection();


// Create the Publisher query - SELECT 
$query = "SELECT * FROM teaven_teas WHERE bubble_id = 'b1'";
// Execute the query
$statement = $connect->prepare( $query );
$statement->execute();
$result = $statement->fetchObject();
?>
<div class="col box textContainer">
  <div>
  <!-- Display the results in the form format -->
  <form name="myform" method="post" role="form">
    <div class="form-group"> 
      <!-- Display the bubble name from the database -->
      <h2><?php echo "{$result->bubble_name}" ?></h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipscing elit. Donec fringilla lacus sit amet justo venenatis maximus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
    </div>
    <div class="form-group"> 
      <!-- Display the bubble price from the database -->
      <h4> <?php echo "£{$result->bubble_price}" ?></h4>
      <!-- A user can input their desire quantity by typing straight into the inuput box -->
      <label for="quantity">Quantity:</label>
      <span>
      <input type="number" name="quantity" id="quantity" value="1" class="form-control" autocomplete="off"  min="1" max="10"/>
      </span> </div>
    <input type="hidden" name="hidden_name" value="<?php echo "{$result->bubble_name}" ?>" />
    <input type="hidden" name="hidden_price" value="<?php echo "{$result->bubble_price}"?>" />
    <input type="hidden" name="hidden_id" value="<?php echo "{$result->bubble_id}" ?>" />
    <button type="submit" name="add_to_cart" class="btn btn-success submit-btn">Add to Cart</button>
    </div>
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
<!-- Font Awesome Kit - this is link to an account --> 
<script src="https://kit.fontawesome.com/799d082bbd.js" crossorigin="anonymous"></script> 
<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src="script.js" type="text/javascript"></script>
</body>
</html>
