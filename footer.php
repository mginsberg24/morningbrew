<footer>
	<div class="row">
		<div class="text col-xs-4">
			<a  <?php if ($fName == "index.php") {
				echo "href=\"archive.php\"";
				echo "class = \"articles\"";
				
			}  
			elseif ($fName == "archive.php") {
				echo "href=\"index.php\"";
				echo "class = \"home\"";
			}?>></a>
		</div>
		<div class="col-xs-1">
			<a href="https://twitter.com/MorningBrew" target="_blank"><img class = "logo" src="img/twitter.png" alt=""></a>
		</div>
		<div class="col-xs-1">
			<a href="https://www.facebook.com/MorningBrewDaily" target="_blank"><img class = "logo" src="img/facebook.png" alt=""></a>
		</div>
		<div class="col-xs-1">
			<a href="mailto:?subject=I wanted you to see MorningBrew&amp;body=Check out this site http://www.morningbrewdaily.com."><img class = "logo" src="img/email.png" alt=""></a>
		</div>
		<div class="contact col-xs-5">
			<p>Contact us @ <br>
			brewteam@morningbrewdaily.com</p>
		</div>
	</div>
</footer> 