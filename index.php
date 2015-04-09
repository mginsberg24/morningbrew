<?php
session_start();
require_once 'MCAPI.class.php';
require_once 'config.inc.php'; //contains apikey
if (isset($_POST['submit']) ) {
	      if ( $_POST["SCHOOL"] == '0' ) {
            $_SESSION['error'] = 'All fields are required';
           
            header("Location: index.php");
            return;
        }
$api = new MCAPI($apikey);
$subscriberemailID = $_POST["EMAIL"];
$subscriberschoolID = $_POST["SCHOOL"];
// $mergeVars = array('FNAME'=>$_POST['fname']);
$merge_vars = array('SCHOOL'=> $_POST["SCHOOL"]);
$retval = $api->listSubscribe( $listId, $subscriberemailID, $merge_vars);


if ($api->errorCode){
	$_SESSION['error'] = "$subscriberemailID is already subscribed.";
	header('Location: index.php');
	exit();
} else {
$_SESSION['success'] = "You successfully subscribed!";
header('Location: index.php');
	exit();
}
}
$fName = basename(__FILE__);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		 <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
	<meta name="google-site-verification" content="t5TVR35UCIZQuShSCA1NdLTQD4tYF-KzRjP9AkzUUQI" />
		<meta charset="UTF-8">
		<title>Morning Brew</title>
		<link rel="stylesheet" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="footer.css">
		<link rel="stylesheet" type="text/css" media="all" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<!-- <link rel="stylesheet" href="css/bootstrap-select.min.css"> -->
  <link rel="stylesheet" type="text/css" media="all" href="css/selectize.css">
   <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/selectize.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>

	</head>
	<body>
		<div class="content">
			
			<img class ="title" src="img/title.png" alt="morningbrew title">
			<!-- Begin MailChimp Signup Form -->
			<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
			<div class="row">
				<div class="whiteboard">
					<h3 class = "discription col-md-12">"Morning Brew is a daily e-newsletter that serves as a one-stop shop to keep young business minds up to date on the business world"</h3>
				</div>
				
				<!-- Begin MailChimp Signup Form -->
				<!-- <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css"> -->
				<div id="signup">
				


					
					<?php
					
					if ( isset($_SESSION['error']) ) {
					echo('<p class = \'error\'">'.htmlentities($_SESSION['error'])."</p>\n");
					unset($_SESSION['error']);
					}
					elseif ( isset($_SESSION['success']) ) {
					echo('<p class = \'success\'">'.htmlentities($_SESSION['success'])."</p>\n");
					unset($_SESSION['success']);
					}
					?>
					<form action="index.php" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form">
						<div id="mc_embed_signup_scroll">
							
							<!-- <div class="indicates-required"><span class="asterisk">* </span> indicates required</div> -->
							<p>
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder=" *Email" required>
							</p>
							<p>
							   <select name="SCHOOL"  class="selectpicker" title = "- Please select a University -" id="school" data-live-search="true"  data-dropup-auto="false" required>
									<option value = "0" data-hidden = true></option>
									<option value="Emory University">Emory University</option>
									<option value="Indiana University">Indiana University</option>
									<option value="New York University">New York University</option>
									<option value="Northwestern University">Northwestern University </option>
									<option value="University of Michigan" >University of Michigan</option>
									<option value="University of Notre Dame" >University of Notre Dame</option>
									<option value="University of Pennsylvania" >University of Pennsylvania</option>
									<option value="University of Texas" >University of Texas</option>
									<option value="University of Southern California">University of Southern California</option>
									<option value="Vanderbilt University">Vanderbilt University</option>
									<option value="Other">Other</option>
								</select>
								 <!--  <select class="selectpicker">
    										<option>Mustard</option>
    										<option>Ketchup</option>
    										<option>Relish</option>
  									</select> -->
								<!-- <input type="text" name = "SCHOOL"> -->
							</p>
							<div class="clear"><input type="submit" value="Subscribe" name="submit" id="mc-embedded-subscribe" class="subscribe button"></div>
							</div>

						<div class="clearbig"><input type="submit" value="Subscribe Now" name="submit" id="mc-embedded-subscribe" class="subscribebig button"></div>
					</div>
				</form>
			</div>
			<!--End mc_embed_signup-->
			
			
			<div class="discriptiondiv">
				<h3 class = "discription col-md-12">"Morning Brew is a daily e-newsletter that serves as a one-stop shop to keep young business minds up to date on the business world"</h3>
			</div>
			<?php
			require('footer.php');
			?>
		</div>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
      <script src="http://silviomoreto.github.io/bootstrap-select/javascripts/bootstrap-select.js"></script>
      <script type="text/javascript">
          $(document).ready(function(e) {
              $('.selectpicker').selectpicker();
          });
      </script>

	</body>
</html>