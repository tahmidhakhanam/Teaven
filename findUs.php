<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
//ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

// Create a new session with a session ID
session_start();

//Form validation script 
require_once( 'contact-us-validation.php' );

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
<link href="findUs.css" rel="stylesheet">

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
<title>Contact - Teaven</title>
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
        
        <!-- This checks if user is logged-in, if so shows log out button but if not then shows log in button. -->
        <?php
        try {
          require_once( "functions.php" );
          //Check if the user logs in, if so then shows the log out button and allows access to account page but if not then shows login button and restricts access to account page. Try and catch to catch any errrors.

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
<main>

<!-- SECTION ONE - GET IN TOUCH -->
<section>
<div class="container">
<div class="text-center py-5">
  <h1 class="animate-heading">GET IN <span class="one-word-colour">TOUCH</span></h1>
  <p>Have any questions? We’re happy to hear from you!</p>
</div>
</section>
<!-- SECTION TWO - CONTACT US FORM -->
<section>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <form id="contact-form" name="myForm" class="form" action="contact-us-validation.php" method="post" role="form" >
        <div class="form-group">
          <label for="fname"></label>
          <input type="text" name="fname" class="form-control" placeholder="First Name" pattern="[a-zA-Z]+" title="Only alphabets are allowed." size="20" minlenght="1" maxlength="20" accesskey="l" class="form-control" required />
          <!-- Display error messages -->  
          <?php echo $fnameEmptyErr; ?>  <!-- Error message for empty input field -->
		  <?php echo $fnameErr; ?> <!-- Error message for incorrect format -->
		 </div>
        <div class="form-group">
          <label for="lname"></label>
          <input type="text" name="lname" class="form-control" placeholder="Last Name" pattern="[a-zA-Z]+" title="Only alphabets are allowed." size="20" minlenght="1" maxlength="20" accesskey="l" required />
          <!-- Display error messages --> 
          <?php echo $lnameEmptyErr; ?> <!-- Error message for empty input field -->
		  <?php echo $lnameErr; ?> <!-- Error message for incorrect format -->
		</div>
        <div class="form-group">
          <label for="email"></label>
          <input type="email" name="email" class="form-control" placeholder="Email" pattern="[^@]{1,64}@[^@]{1,255}" title="Invalid email address" minlenght="1" maxlength="30" size="30" accesskey="e" required />
          <!-- Display error messages --> 
          <?php echo $emailEmptyErr; ?> <!-- Error message for empty input field -->
		  <?php echo $emailErr; ?> <!-- Error message for incorrect format -->
		 </div> 
        <div class="form-group">
          <label for="phoneNo"></label>
          <input type="tel" name="phoneNo" class="form-control" placeholder="Phone Number" pattern="[0-9]{10,11}" title="Only numbers are allowed, not less than 10-digit and no more than 11-digit." min="1" max="15" size="25" accesskey="p" required/>
		  <!-- Display error message --> 
          <?php echo $phoneErr; ?> <!-- Error message for incorrect format -->
		</div>
        <div class="form-group">
          <label for="message"></label>
          <textarea class="form-control" name="message" id="message" rows="6" cols="60" placeholder="Your message..." minlenght="1" maxlength="1500" tabindex="5" required></textarea>
          <!-- Display error message --> 
          <?php echo $messageEmptyErr; ?> <!-- Error message for empty input field -->
		</div>
        <div class="text-center">
          <button type="submit" name="submit" class="submit-btn">Submit</button>
        </div>
      </form>
      <!-- End form --> 
      <!-- Live chat button is positioned centre of the page. When a user click on the button, a live chat page will open on a new tab --> 
      <!-- This live chat is being hosted on Heroku -->
      <div class="text-center">
        <button type="button" class="btn btn-primary">
        <a href="https://quiet-sea-89301.herokuapp.com/" target="_blank">Live Chat <i class="far fa-comments"></i></a>
        </button>
      </div>
    </div>
    <!-- End col --> 
  </div>
  <!-- End row --> 
</section>
<!-- END OF SECTION TWO - CONTACT US FORM --> 
<!-- SECTION THREE - FIND OUR STORES -->
<section>
  <div class="jumbotron jumbotron-fluid">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <img src="img/teavenLogoThree.png" alt="logo" class="find-logo" />
      <h2>Find Our Stores</h2>
      <p class="our-stores-text">Cras mattis placerat nibh a ultrices. Duis venenatis sollicitudin nisi finibus bibendum. Ut dui arcu, placerat in mattis condimentum, mattis vel libero. Praesent sit amet consequat turpis. Integer eget luctus nibh. Fusce bibendum orci non ipsum accumsan rutrum. Proin fringilla ex odio, vitae elementum justo malesuada ac. Phasellus consectetur lectus ex, sit amet blandit nulla varius quis. Curabitur tristique ex eget orci suscipit semper. Ut aliquam in ex non accumsan. Phasellus rhoncus aliquet ultrices. </p>
    </div>
  </div>
</section>
</section>
<section>
<!-- This is a responsive map - users can find our stores on this interactive map. The locations of our stores are being represented by our logo icon -->
<div class="map-responsive">
  <iframe src="https://www.google.com/maps/d/embed?mid=1iI7NUhEm-DU7GPkqZ56UruUwuQqwMNgW" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen aria-hidden="false" tabindex="0"></iframe>
  </section>
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
<!--<script>
      function initMap() {
        const uluru = { lat: -25.344, lng: 131.036 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: uluru,
        });
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly" async></script>--> 
<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src="script.js" type="text/javascript"></script>
</body>
</html>