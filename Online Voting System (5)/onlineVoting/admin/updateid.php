<!DOCTYPE html>
<html>
<head>
	
<title>Update ID Request</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="mystyle.css" />
<link rel="stylesheet" href="css/fonts.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-6">
			<?php
				$postfix="";
				$prefix="";
				$id_generated="";
				$conn=new mysqli("localhost","root","","votingsystem_db");
				$id=$_GET['id'];
				$select="select * from id_request_tbl where id='$id'";
				$run=$conn->query($select);
				if($run-> num_rows>0){
					while($row=$run->fetch_array()){
						$user_email=$row['user_email'];
						$user_division=$row['user_division'];
					}
					switch ($user_division){
						case 'Dhaka':
						$prefix="Dha";
						$rand=rand(9999999,1234567);
						$postfix="xyz";
						$id_generated=$prefix.$rand.$postfix;
						break;

						case 'Rajshahi':
						$prefix="Raj";
						$rand=rand(9999999,1234567);
						$postfix="xyz";
						$id_generated=$prefix.$rand.$postfix;
						break;

						case 'Chittagong':
						$prefix="Chi";
						$rand=rand(9999999,1234567);
						$postfix="xyz";
						$id_generated=$prefix.$rand.$postfix;
						break;

						case 'Syhelete':
						$prefix="Syh";
						$rand=rand(9999999,1234567);
						$postfix="xyz";
						$id_generated=$prefix.$rand.$postfix;
						break;
						default:

						break;
					}

					?>
					<form method="post">
					 <div class="form-group">
		             <label for="exampleInputEmail1">User Email</label>
		             <input type="email" class="form-control" name="user_email" id="exampleInputEmail1" placeholder="Enter Email" required readonly value="<?php echo $user_email; ?>">
		             </div>
		             <div class="form-group">
		             <label for="exampleInputEmail1">User Division</label>
		             <input type="text" class="form-control" name="user_division" id="exampleInputEmail1" placeholder="Enter Division" required readonly value="<?php echo $user_division; ?>">
		             </div>
		             <div class="form-group">
		             <label for="exampleInputEmail1">ID Generate by System</label>
		             <input type="text" class="form-control" name="user_id_generated" id="exampleInputEmail1" placeholder="ID Generate" required readonly value="<?php echo strtoupper($id_generated); ?>">
		             </div>
		             <div class="form-group">
		             	<input type="submit" name="update" value="Update User ID" class="form-control btn btn-success">
		             </div>
					</form>


					<?php
					}
					else{
						echo "Record Not Found";
					}
			?>
		</div>
		<div class="col-sm-6">
			
		</div>
	</div>
</body>
</html>
<?php

if(isset($_POST['update'])){
	$user_email=$_POST['user_email'];
	$user_id_generated=$_POST['user_id_generated'];
	$update="update users_db set user_id_generated='$user_id_generated' where user_email='$user_email'";
	$run=$conn->query($update);
	if($run){

		$delete="delete from id_request_tbl where user_email='$user_email'";
		$del=$conn->query($delete);
		if($del){
			echo "<script>alert('Update Successfully and Deleted')</script>";
			echo "<script>window.location.href='idrequest.php'</script>";
		}
	}
	else{
		echo "<script>alert('Something went wrong! Error!')</script>";
	}
}

?>