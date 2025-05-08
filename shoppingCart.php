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
<link href="shoppingCart.css" rel="stylesheet">

<!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#573c79">
<meta name="msapplication-TileColor" content="#573c79">
<meta name="theme-color" content="#573c79">
<title>Shopping Cart - Teaven</title>
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
<!-- End of Nav --> 
<!-- This jumbotron-fluid occupies the entire horizontal space of its parent --> 
<!-- A hero section with a responsive img and text on top -->
<div class="jumbotron jumbotron-fluid">
  <div class="container py-5">
    <div class="text-center py-5">
      <h1 class="animate-heading">SHOPPING <span class="one-word-colour">CART</span></h1>
    </div>
  </div>
</div>
<main>
<!-- Displaying customer's order in a responsive table -->
<h2>Your order:</h2>
<div class="table-responsive">
<?php

$connect = getConnection();

// Message variable is created to store messages
$message = '';

// If an item has been added to the cart successfully, a 'item added into cart' message will pop up to alert the user
if ( isset( $_GET[ "success" ] ) ) {
  $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item added into cart
 </div>
 ';
  echo $message;
}

// If an item has been removed from the cart successfully, a 'item removed from cart' message will pop up to alert the user
if ( isset( $_GET[ "remove" ] ) ) {
  $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Item removed from Cart
 </div>
 ';
  echo $message;
}

// If the user clicks 'clearall' button then all the item(s) in the cart will be removed and a 'Your shopping cart has been clear' message will pop up to alert the user
if ( isset( $_GET[ "clearall" ] ) ) {
  $message = '
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  Your shopping cart has been clear...
 </div>
 ';
  echo $message;

}
?>
<div class="container">
  <div class="text-right"> 
    <!-- To clear all item in the shopping cart, a button is created. This code will make dynamic clear all item in the shopping cart which has been added, so when a user have clicked on this button, everything will be cleared  -->
    <button class="btn clear-btn btn-sm text-right">
    <a href="mango-milk-tea-with-black-pearls.php?action=clear">Clear All</a>
    </button>
  </div>
  <!-- A table with 5 columns has been created to display the fetched data from the form -->
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th class="item-name">Product</th>
        <th class="price">Price</th>
        <th class="quantity">Quantity</th>
        <th class="subtotal">Subtotal</th>
        <th class="action"></th>
      </tr>
    </thead>
    <?php
    // This if (isset) function is true then it will execute the if block of the code but if it's false then it will execute else block code which is 'No item in cart' message, line 188 - 192
    if ( isset( $_COOKIE[ "shopping_cart" ] ) ) {
      $total = 0;
      // Stripslashes will remove backslashes
      $cookie_data = stripslashes( $_COOKIE[ 'shopping_cart' ] );
      // This function will convert JSON string to PHP variable 
      $cart_data = json_decode( $cookie_data, true );
      // This function will get each cart_data as a key then passes to $values
      foreach ( $cart_data as $keys => $values ) {
        ?>
    <!-- Using foreach loop to display item_name, item_price, item_quantity, and total into a table -->
    <tbody>
      <tr>
        <td data-th="Product"><div class="row">
            <div class="col-sm-10">
              <p><?php echo $values["item_name"]; ?></p>
            </div>
          </div></td>
        <td data-th="Price">£ <?php echo $values["item_price"]; ?></td>
        <td data-th="Quantity"><?php echo $values["item_quantity"]; ?></td>
        <!-- Display the subtotal of particular item, number_format function is used with values item_quantity variable into values item_price variable -->
        <td data-th="Subtotal">£ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
        <!-- To remove a particular item from the cart, a button is created using anchor tag. This code will make dynamic remove item link for each item which has been added into cart so when a user have clicked on this button, the item will be removed -->
        <td class="actions text-right" data-th=""><button class="btn btn-danger btn-sm">
          <a href="mango-milk-tea-with-black-pearls.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-trash-o"></i></a>
          </button></td>
      </tr>
    </tbody>
    <tfoot>
      <!-- This code will make the total of the whole shopping cart -->
      <?php
      $total = $total + ( $values[ "item_quantity" ] * $values[ "item_price" ] );
      }
      ?>
      <tr> 
        <!-- A button with a link back to the shop page -->
        <td><a href="shop.php" class="btn back-btn"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <!-- This code will display the total of the cart -->
        <td class="hidden-xs text-center"><strong>Total £ <?php echo number_format($total, 2); ?></strong></td>
        <!-- A button with a link to continue to checkout page -->
        <td><a href="continue.php" class="btn btn-success btn-block submit-btn">Checkout <i class="fa fa-angle-right"></i></a></td>
      </tr>
      <?php
      } else {
        echo '
    <tr>
     <td colspan="5" align="center">No Item in Cart</td>
    </tr>
   ';
      }
      ?>
    </tfoot>
  </table>
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
			 <!-- This javascript snippet will automatically update the copyright year, depending on the user's time settings -->
          <p class="pt-4"><small class="text-white-50">&copy;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<!-- Font Awesome Kit - this is link to an account --> 
<script src="https://kit.fontawesome.com/799d082bbd.js" crossorigin="anonymous"></script> 

<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src="script.js" type="text/javascript"></script>
</body>
</html>
