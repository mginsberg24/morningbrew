<?php
session_start();
if (isset($_POST['submit']) && strlen($_POST['EMAIL']) > 2 ) {
require_once 'MCAPI.class.php';
require_once 'config.inc.php'; //contains apikey
$api = new MCAPI($apikey);
$subscriberemailID = $_POST["EMAIL"];
$retval = $api->listSubscribe( $listId, $subscriberemailID);
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
	<meta name="google-site-verification" content="t5TVR35UCIZQuShSCA1NdLTQD4tYF-KzRjP9AkzUUQI" />
		<meta charset="UTF-8">
		<title>Morning Brew</title>
		<link rel="stylesheet" href="style.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="footer.css">
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
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder=" *Email" required>
							
							
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
	</body>
</html>