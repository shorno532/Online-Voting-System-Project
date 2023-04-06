<?php
    session_start();
	include("includes/loginheader.php");
	if(!$_SESSION['user_email']){
		header("location:login.php");
	}
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h4 class="text text-center text-info alert bg-primary">How to Cast Your Vote<b><i>?</i></b></h4>
			<ul>
			<li>
			Firstly select <b>"ID Generate"</b> from navigation bar
		    </li>
		    <li>
		    Then send request to <b>"Admin"</b> from Generate Your ID
		    </li>
		    <li>
		    Click on the <b>"Election"</b> from navigation bar
		    </li>
		    <li>
		    Select available election
		    </li>
		    <li>
		    The secrecy of your ballot is maintained under the high security standards adhered to by polyas online voting software
		    </li>
		    <li>
		    Your vote remain anonymous as our system's architecture strictly separets your personal data from the electronic ballot
		    </li>
		    </ul>
		</div>
		<br>
		<div class="col-sm-6">
			<img src="images/vote.png" class="img img-responsive img-thumbnail">
		</div>
	</div>
</div>
<?php
	include("includes/footer.php");
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>