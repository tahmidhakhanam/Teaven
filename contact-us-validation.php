<?php
// Session variables are stored in a folder specified below

//Care's sessionData path
//ini_set( "session.save_path", "/home/unn_w19015711/sessionData" );

//Tahmidha's sessionData path
ini_set( "session.save_path", "/home/unn_w17017369/public_html/sessionData" );

// Create a new session with a session ID
//session_start();

// Error messages for empty input fields
$fnameEmptyErr = "";
$lnameEmptyErr = "";
$emailEmptyErr = "";
$messageEmptyErr = "";

// Error messages for incorrect format
$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$phoneErr = "";



//Set variable to false
$error = false;

if ( isset( $_POST[ "submit" ] ) ) {
  // Set form variables
  $fname = checkInput( $_POST[ "fname" ] );
  $lname = checkInput( $_POST[ "lname" ] );
  $email = checkInput( $_POST[ "email" ] );
  $phone = checkInput( $_POST[ "phoneNo" ] );
  $message = checkInput( $_POST[ "message" ] );

  // First Name validation
  if ( empty( $fname ) ) {
    $fnameEmptyErr = '<span class="error">
                Name can not be left blank.
            </span>';
    $error = true;

  } // Allow letters and white space 
  else if ( !preg_match( "/^[a-zA-Z]+$/", $fname ) ) {
    $fnameErr = '<span class="error">
                Only letters and white space allowed.
            </span>';
    $error = true;
  }
  // Last Name validation
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


  // Phone format validation
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

  //If there are no errors direct the user to form submitted page
  if ( $error == false ) {
    echo "
	  <!doctype html>
      <html lang='en'>
      <head>
	  
        <!--Required meta tags-->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

        <!-- Bootstrap CSS -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

        <!-- Custom styles for this website -->
        <link href='../site/findUs.css' rel='stylesheet'>

        <!-- Font Awesome Kit --> 
        <script src='https://kit.fontawesome.com/799d082bbd.js' crossorigin='anonymous'></script> 

        <!-- Favicon for iOS Safari, Android Chrome, Windows 8 and 10, Mac OS El Capitan Safari, Classic, desktop browsers and Manifest -->
        <link rel='apple-touch-icon' sizes='120x120' href='apple-touch-icon.png'>
        <link rel='icon' type='image/png' sizes='32x32' href='favicon-32x32.png'>
        <link rel='icon' type='image/png' sizes='16x16' href='favicon-16x16.png'>
        <link rel='manifest' href='/site.webmanifest'>
        <link rel='mask-icon' href='/safari-pinned-tab.svg' color='#573c79'>
        <meta name='msapplication-TileColor' content='#573c79'>
        <meta name='theme-color' content='#573c79'>
        <title>Contact - Teaven</title>
      </head>
      <body>
      <!-- Navbar-->
      <nav class='navbar navbar-expand-lg py-3 navbar-dark shadow-sm'>
      <div class='container'> <a href='home.php' class='navbar-brand'> 
      <!-- Logo Image - aligning left hand side of the screen --> 
      <img src='img/teavenLogoThree-purple.png' class='logo' alt='logo' class='d-inline-block align-middle mr-2'> </a> 
      <!-- Nav toggle button (hamburger menu) - this toggle appears when a user is in mobile/ tablet view -->
      <button type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation' class='navbar-toggler'><span class='navbar-toggler-icon'></span></button>
      <!-- Nav content - Home, Shop, Our Story, Contact, Cart, Account, Login/Logout -->
      <div id='navbarSupportedContent' class='collapse navbar-collapse'>
        <ul class='navbar-nav ml-auto'>
          <li class='nav-item'><a href='home.php' class='nav-link'>HOME</a></li>
          <li class='nav-item'><a href='shop.php' class='nav-link'>SHOP</a></li>
          <li class='nav-item'><a href='ourStory.php' class='nav-link'>OUR STORY</a></li>
          <li class='nav-item'><a href='findUs.php' class='nav-link active'>CONTACT</a></li>
          <li class='nav-item'><a href='shoppingCart.php' class='nav-link'>CART<i class='fas fa-shopping-cart'></i></a></li>
	";
	
	//This checks if user is logged-in, if so shows log out button but if not then shows log in button.   
    try {
    require_once( "functions.php" );
          
    //Check if the user logs in, if so then shows the log out button but if not then shows login button. Try and catch to catch any errrors
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
		
	echo "
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
      <div class='container'>
        <div class='text-center py-5'>
          <h1 class='animate-heading'>GET IN <span class='one-word-colour'>TOUCH</span></h1>
          <p>Have any questions? We’re happy to hear from you!</p>
        </div>
    </section>
	";
        
	try {
	  //Connect to database
	  $dbConn = getConnection();
	
		//Insert database record
		$insertSQL = "INSERT INTO `teaven_contacts`(`fname`, `lname`, `email`, `phone`, `message`) VALUES ( :fname, :lname, :email, :phone, :message )";
	 
		//Execute query
		$stmt = $dbConn->prepare($insertSQL);
		$stmt->execute(array(':fname' => $fname, ':lname' => $lname, ':email' => $email, ':phone' => $phone, ':message' => $message));
		  
		//Store results and confirmation in variable
	    $confirmation = "
	    <div class='submitted'>
          <h2>Thank you for contacting us! We will be in touch soon.</h2>
		  <p>You submitted:</p>
		</div>
	    	<table>
		    <tr>
			  <td class='name'>First Name</td>
			  <td class='value'>".filter_var($fname, FILTER_SANITIZE_STRING)."</td>
		    </tr>
		    <tr>
			  <td class='name'>Last Name</td>
			  <td class='value'>".filter_var($lname, FILTER_SANITIZE_STRING)."</td>
		    </tr>
		    <tr>
		      <td class='name'>Email</td>
			  <td class='value'>".filter_var($email, FILTER_SANITIZE_STRING)."</td>
		    </tr>
		    <tr>
			  <td class='name'>Phone</td>
			  <td class='value'>".filter_var($phone, FILTER_SANITIZE_STRING)."</td>
		    </tr>
		    <tr>
			  <td class='name'>Message</td>
			  <td class='value'>".filter_var($message, FILTER_SANITIZE_STRING)."</td>
		    </tr>		
		  </table>";
	   //display results
	   echo "$confirmation";
	  }	
	catch (Exception $e) {
	  //Output error message
	  echo "<p>Sorry there was a problem. Please <a href='findUs.php'>try again.</a></p>\n";
	  //Log errors
	  log_error($e);
	}
	
	
	echo "
    <!-- SECTION THREE - FIND OUR STORES -->
    <section>
      <div class='jumbotron jumbotron-fluid'>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center'> <img src='img/teavenLogoThree.png' alt='logo' class='find-logo' />
          <h2>Find Our Stores</h2>
            <p class='our-stores-text'>Cras mattis placerat nibh a ultrices. Duis venenatis sollicitudin nisi finibus bibendum. Ut dui arcu, placerat in mattis condimentum, mattis vel libero. Praesent sit amet consequat turpis. Integer eget luctus nibh. Fusce bibendum orci non ipsum accumsan rutrum. Proin fringilla ex odio, vitae elementum justo malesuada ac. Phasellus consectetur lectus ex, sit amet blandit nulla varius quis. Curabitur tristique ex eget orci suscipit semper. Ut aliquam in ex non accumsan. Phasellus rhoncus aliquet ultrices. </p>
        </div>
      </div>
    </section>
  </section>
  <section>
  <!-- This is a responsive map - users can find our stores on this interactive map. The locations of our stores are being represented by our logo icon -->
  <div class='map-responsive'>
    <iframe src='https://www.google.com/maps/d/embed?mid=1iI7NUhEm-DU7GPkqZ56UruUwuQqwMNgW' width='100%' height='550' frameborder='0' style='border:0' allowfullscreen aria-hidden='false' tabindex='0'></iframe>
    </section>
  </div>
</main>
<!-- End of main --> 

<!-- FOOTER --> 
<!-- Footer contains 2 rows and 3 columns of content. All columns are wrapped together using 'container' class and 'row' class --> 
<!-- First column contains the logo and social media icons. Those icons are from Font Awesome -->
<footer>
  <div class='footer'>
    <div class='container'> 
      <!-- First row -->
      <div class='row'>
        <div class='col-lg-5 col-xs-12'> <img  src='img/teavenLogo.png' class='footer-logo'/>
          <div class='footer-socialmedia text-center'> <a href='#><i class='fab fa-facebook-f'></i></a> <a href='#'><i class='fab fa-twitter'></i></a> <a href='#'><i class='fab fa-instagram'></i></a> <a href='#'><i class='fab fa-youtube'></i></a> </div>
        </div>
        <!-- Second column contains a list of our three main content - Shop, Our Story and Contact -->
        <div class='col-lg-3 col-xs-12 links text-center'>
          <h3>USEFUL LINKS</h3>
          <ul class='m-0 p-0 ' >
            <li><a href='shop.php'>Shop</a></li>
            <li><a href='ourStory.php'>Our Story</a></li>
            <li><a href='findUs.php'>Contact</a></li>
          </ul>
        </div>
        <!-- Third column contains our contact info. The phone number and email are clickable so a user can contact us just by clicking the links -->
        <div class='col-lg-4 col-xs-12 location text-center'>
          <h3>CONTACT INFO</h3>
          <p>22, Lorem ipsum dolor</p>
          <p><a href='tel:5417543010' class='phone-link'><i class='fa fa-phone mr-3'></i>(541) 754-3010</a></p>
          <p><a href='mailto:hello@teaven.com' class='email-link'><i class='fa fa-envelope-o mr-3'></i>hello@teaven.com</a></p>
        </div>
      </div>
      <!-- Second row --> 
      <!-- This copyright text takes the full width of the column -->
      <div class='row mt-3'>
        <div class='col copyright text-center'>
          <p class='pt-4'><small class='text-white-50'>&copy; 
            <!-- This javascript snippet will automatically update the copyright year, depending on the user's time settings --> 
            <script type='text/javascript'>
				  document.write(new Date().getFullYear());
			  </script>Teaven. All Rights Reserved.</small></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script> 
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script> 
<!-- Font Awesome Kit - this is link to an account --> 
<script src='https://kit.fontawesome.com/799d082bbd.js' crossorigin='anonymous'></script> 
<!-- CUSTOM JAVASCRIPT FOR THIS WEBSITE --> 
<script src='script.js' type='text/javascript'></script>
</body>
</html>
 ";
	
	
	
	
	
	
	
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

