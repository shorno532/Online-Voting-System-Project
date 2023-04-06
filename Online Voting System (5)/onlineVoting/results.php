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
		<h3 class="text text-info text-center">Result Portion</h3>
		<p class="text text-danger text-center">In this section those election results display which are closed</p>
			<form method="post" action="">
			<div class="form-group">
			<select class="form-control" name="elections_name">
			<option selected="selected" value="">Select Election</option>
			<?php
			$current_ts=time();
			require("includes/db.php");
			$select="select * from elections_tbl";
				$run=$conn->query($select);
				if($run-> num_rows>0){
					while($row=$run->fetch_array()){
						$elections_name=$row['elections_name'];
						$elections_start_date=$row['elections_start_date'];
						$elections_end_date=$row['elections_end_date'];
						?>
						
						<?php
						$elections_end_date_ts=strtotime($elections_end_date);
						if($elections_end_date_ts<$current_ts){
							
						?>
						
						<option value="<?php echo $elections_name; ?>"><?php echo $elections_name; ?></option>
						<?php
						}
					}
				}
			
			?>
			</select>
			</div>
			<div class="form-group">
			<input type="submit" name="search_results" class="btn btn-success" value="Search Result">
			</div>
			</form>
			<table class="table table-responsive table-hover table-bordered text-center">
			<tr>
			<td>#</td>
			<td>Candidates Name</td>
			<td>Obtain Votes</td>
			<td>Winning Status</td<
			</tr>
			<?php
			if(isset($_POST['search_results'])){
				$elections_name=$_POST['elections_name'];
				$select="select * from results_tbl where elections_name='$elections_name'";
				$run=$conn->query($select);
				if($run-> num_rows>0){
					$total_elections_votes=0;
					while($row=$run->fetch_array()){
						$total_elections_votes=$total_elections_votes+1;
					}
				}
				$select1="select * from candidates_tbl where elections_name='$elections_name'";
				$run1=$conn->query($select1);
				if($run1-> num_rows>0){
					$total=0;
					while($row2=$run1->fetch_array()){
						$total=$total+1;
						$candidates_name=$row2['candidates_name'];
						$total_votes=$row2['total_votes'];
						$percentage=(($total_votes/$total_elections_votes)*100);
						
						?>
						<tr>
						<td><?php echo $total; ?></td>
						<td><?php echo $candidates_name; ?></td>
						<td><?php echo $total_votes; ?></td>
						<td><?php echo $percentage; ?>%</td>
						</tr>
						
						
						<?php
					}
					?>
					
					<tr>
					<td colspan="2">Total Votes</td>
					<td><?php echo $total_elections_votes; ?></td>
					<td></td>
					</tr>
					
					<?php
				}
				else{
					?>
					
					<tr>
					<td colspan="4">Record Not Found</td>
					</tr>
					
					<?php
				}
			}
			
			?>
			</table>
			</div>
			
		</div>
	</div>