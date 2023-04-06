<?php
include("includes/header.php");
?>
<?php
require("includes/db.php");
$emailError="";
$accountSuccess="";
if(isset($_POST['reg'])){
	$user_name=$_POST['fullname'];
	$user_email=$_POST['email'];
	$user_gender=$_POST['gender'];
	$user_division=$_POST['division'];
	$user_password=$_POST['password'];
	$select="select * from users_db where user_email='$user_email'";
	$exe=$conn->query($select);
	if($exe-> num_rows>0){
		$emailError="<p class='text text-center text-danger'>Email already registered</p>";
	}
	else{
		$insert="insert into users_db (user_name,user_email,user_gender,user_division,user_password) values ('$user_name','$user_email','$user_gender','$user_division','$user_password')";
		$run=$conn->query($insert);
		if($run){
			$accountSuccess="<p class='text text-center text-success'>Account Create Successfully</p>";
		}
		else{
			echo "Error";
		}
	}
}
?>
<br>
<hr>
    <div class="container">
	   <div class="row">
	      <div class="col-sm-8 col-sm-offset-2 bg-info" style="box-shadow:2px 2px 2px 2px gray;">
			   <h3 class="text text-center bg-primary alert" style="color:white;">User Registration</h3>
			   <h5 class="text text-center text-danger">
			    <?php
			   if($emailError!=""){
			   	echo $emailError;
			   }
			   if($accountSuccess!=""){
			   	echo $accountSuccess;
			   }
			   ?>
			   <h5>
			   <form method="post">
			      <div class="form-group">
				     <label for="exampleInputEmail1">Full Name</label>
					 <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Enter Full Name" required>
				  </div>
				  <div class="form-group">
				     <label for="exampleInputEmail1">Email Address</label>
					 <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Email"required>
				  </div>
				  <div class="form-group">
				  	<label for="Gender">Gender</label>
				  	<select name="gender" class="form-control">
				  		<option value="">Select</option>
				  		<option value="Male">Male</option>
				  		<option value="Female">Female</option>
				  	</select>
				  </div>
				   <div class="form-group">
				  	<label for="division">Division</label>
				  	<select name="division" class="form-control">
				  		<option value="">Select</option>
				  		<option value="Dhaka">Dhaka</option>
				  		<option value="Syhelete">Syhelete</option>
				  		<option value="Chittagong">Chittagong</option>
				  		<option value="Rajshahi">Rajshahi</option>
				  	</select>
				  </div>
				  <div class="form-group">
				  	<label for="password">Password</label>
				  	<input type="password" name="password" class="form-control" placeholder="Enter Password">
				  </div>
				  <div class="form-group">
				  	<button type="submit" class="btn btn-success btn-block" name="reg">Submit</button>
				  </div>				  
				</form>
		  </div>
		 
		</div>
		
	</div>

</html>