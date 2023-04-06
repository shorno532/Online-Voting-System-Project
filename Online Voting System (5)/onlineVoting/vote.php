<?php
    session_start();
	include("includes/loginheader.php");
	if(!$_SESSION['user_id_generated']){
		header("location:elections.php");
	}
?>
<br>
<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<form method="post" action="">
				<label>Election Name:</label>
				<select class="form-control" name="elections_name">
					<option value="" selected="selected">Select Election</option>
					<?php
				require("includes/db.php");
				$select="select * from elections_tbl";
				$run=$conn->query($select);
				if($run-> num_rows>0){
					while($row=$run->fetch_array()){

					
				?>
				<option value="<?php echo $row['elections_name']; ?>"><?php echo $row['elections_name']; ?></option>

				<?php
				}
				}

				?>
				</select>
				<br>
				<input type="submit" name="search_candidate" class="btn btn-success" value="Search Candidate">
			</form>
		</div>
	</div>
	<?php
	date_default_timezone_set("Asia/Dhaka");
	if(isset($_POST['search_candidate'])){
		$elections_name=$_POST['elections_name'];
		$select="select * from elections_tbl where elections_name='$elections_name'";
		$run=$conn->query($select);
		if($run-> num_rows>0){
			while($row=$run->fetch_array()){
				$elections_start_date=$row['elections_start_date'];
				$elections_end_date=$row['elections_end_date'];
			}
		}
		$current_ts=time();
		$elections_start_date_ts=strtotime($elections_start_date);
		$elections_end_date_ts=strtotime($elections_end_date);
		if($elections_start_date_ts>$current_ts){
			echo "Election did not start please wait some time";
		}
		else if($current_ts>$elections_end_date_ts){
			echo "Election has been closed";
		}
		else{
			
			?>
			<a href="votecaste.php?elections_name=<?php echo str_replace(' ','-',$elections_name);?>">Click Here</a>
			
			<?php
		}
	}
	
	?>