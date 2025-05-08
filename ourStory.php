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
<link href="ourStory.css" rel="stylesheet">

<!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
<link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#573c79">
<meta name="msapplication-TileColor" content="#573c79">
<meta name="theme-color" content="#573c79">
<title>Our Story  - Teaven</title>
</head>
<body>

<!-- NAVBAR-->
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
        <li class="nav-item"><a href="ourStory.php" class="nav-link active">OUR STORY</a></li>
        <li class="nav-item"><a href="findUs.php" class="nav-link">CONTACT</a></li>
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
<main> 
  <!-- End of Nav --> 
  <!-- This jumbotron-fluid occupies the entire horizontal space of its parent --> 
  <!-- jumbotron with video background and text on top -->
  <div class="jumbotron jumbotron-fluid">
    <video autoplay muted loop>
      <source src="media/ourStory-header-video.mp4" type="video/mp4">
    </video>
    <div class="container py-5">
      <div class="text-center py-5">
        <h1 class="animate-heading">OUR TEAVEN <span class="one-word-colour">STORY</span></h1>
        <p class="strap-line-heading">Brewing Happiness</p>
      </div>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.jumbotron --> 
  
  <!-- INTRO SECTION --> 
  <!-- 1 column -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="box text-center">
            <h3 class="intro-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis ipsum pellentesque, laoreet felis id, semper elit. Aliquam auctor aliquam ornare. Cras eu posuere ante. Maecenas sapien neque, laoreet at feugiat varius, faucibus iaculis nulla.</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- HOW WE STARTED SECTION --> 
  <!-- 2 columns -->
  <section>
    <div class="container"> <img src="img/how-we-started-img.png" class="img-fluid" alt="black and white image of a building"/> </div>
    <div class="container how-we-started-text">
      <div class="col-xs-12 text-center">
        <h2>HOW WE STARTED</h2>
        <p>Vestibulum nec urna porttitor, porttitor lorem quis, placerat purus. Praesent feugiat, turpis eget pharetra suscipit, magna metus pharetra purus, ac maximus magna ipsum eget nisl. Ut consequat vulputate dui nec pellentesque. Sed nec elit lorem. Integer vestibulum, dui sed interdum iaculis, justo risus accumsan quam, vitae euismod nisi nisi non mi. Nam ultricies in eros ut scelerisque. Integer massa quam, interdum vehicula tincidunt non, vestibulum a arcu. Nunc finibus euismod enim. </p>
      </div>
    </div>
  </section>
  
  <!-- TWO IMAGES OF HOW WE STARTED --> 
  <!-- 2 columns -->
  <section>
    <div class="container">
      <div class="row gap1">
        <div class="col-md-6 gap2"> <img src="img/how-we-started-img-two.png" class="img-fluid" alt="tea brewing" /> </div>
        <div class="col-md-6"> <img src="img/how-we-started-img-three.png" class="img-fluid" alt="making tea" /> </div>
      </div>
    </div>
  </section>
  
  <!-- WHERE OUR TEAS COME FROM SECTION -->
  
  <section>
    <div class="jumbotron jumbotron-fluid">
      <video autoplay muted loop>
        <source src="media/where-our-tea-comes-from.mp4" type="video/mp4">
      </video>
      <div class="container py-5">
        <div class="text-center py-5">
          <h1>WHERE OUR TEAS COME FROM</h1>
          <p class="our-tea-come-from-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis ipsum pellentesque, laoreet felis id, semper elit. Aliquam auctor aliquam ornare. Cras eu posuere ante. Maecenas sapien neque, laoreet at feugiat varius, faucibus iaculis nulla. Ut consequat vulputate dui nec pellentesque. Sed nec elit lorem. Integer vestibulum, dui sed interdum iaculis, justo risus accumsan quam, vitae euismod nisi nisi non mi. Nam ultricies in eros ut scelerisque. Integer massa quam, interdum vehicula tincidunt non, vestibulum a arcu. Nunc finibus euismod enim. Mauris gravida eu libero id pretium. Phasellus non tristique quam, at efficitur quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed elementum scelerisque quam, in mollis felis rhoncus nec. Donec eu lectus velit. Vestibulum at nibh quis massa porta pellentesque. Vestibulum aliquam ipsum nunc, a convallis ante pellentesque et. Donec iaculis lectus id aliquam maximus.</p>
        </div>
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.jumbotron --> 
    
  </section>
  
  <!-- TWO IMAGES OF OUR TEAS --> 
  <!-- 2 columns -->
  <section>
    <div class="container">
      <div class="row gap1">
        <div class="col-md-6 gap2"> <img src="img/teaProcessImgTwo.png" class="img-fluid" alt="field of tea" /> </div>
        <div class="col-md-6 gap2"> <img src="img/teaProcessImgOne.png" class="img-fluid" alt="tea being processed" /> </div>
      </div>
    </div>
  </section>
  
  <!-- TWO IMAGES OF OUR TEAS --> 
  <!-- 2 columns -->
  <section>
    <div class="container">
      <div class="row gap1">
        <div class="col-md-6 gap2"> <img src="img/teaProcessImgFour.png" class="img-fluid" alt="jars of teas" /> </div>
        <div class="col-md-6 gap2"> <img src="img/teaProcessImgFive.png" class="img-fluid" alt="making tea" /> </div>
      </div>
    </div>
  </section>
  
  <!-- TWO YOUTUBE VIDEOS OF HOW WE MADE BUBBLE TEAS --> 
  <!-- 2 columns -->
  <section>
    <div class="container video">
      <div class="row">
        <div class="col-md-6 gap2">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/RB3szVVhmDc"></iframe>
          </div>
        </div>
        <div class="col-md-6 gap2">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/jwjFQoyJrAg"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of all sections --> 
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
            <li><a href="index.php">Shop</a></li>
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