<!-- Header file and Student class added -->
<?php
 include('inc/header.php'); 
 include('lib/Student.php');
?>

<!-- Particular student attendace check -->
<script type="text/javascript">
	$(document).ready(function(){
		$("form").submit(function(){
			var roll = true;
			$(':radio').each(function(){
				name = $(this).attr('name');
				if(roll && !$(':radio[name="' + name + '"]:checked').length) {
					alert(name + " Roll mising!");
					//$('.alert').show();
					roll = false;
				}
			});
			return roll;
		});
	});

</script>


<!-- Particular date wise attendace show and update attendace --> 

<?php 
	error_reporting(0);
	$stu = new Student;
	$dt = $_GET['dt'];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$attend = $_POST['attend'];

		$updateAttendance = $stu->updateAttendance($dt,$attend);

	}
 
?>
			<div class="card"  style="min-height: 500px">
				<div class="card-header">
					<a href="add.php" class="btn btn-success">Add Student</a>
					<a href="date_view.php" class="btn btn-info float-right">Back</a>
				</div>
				<div class="card-body">

		<!-- Message show -->
				<?php 
					if (isset($updateAttendance)) {
						echo $updateAttendance;
					}

				?>
					<div>
						<h2 class="text-center">Attandance Date : <?php echo $dt;?></h2>
					</div>


<!-- Update attendace form of the students by date wise -->
					<form action="" method="post">  
						<table class="table table-striped text-center">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>ID</th>
								<th>Attendance</th>
							</tr>

						 <?php 
							$get_student_info = $stu->getAttandaceDataByData($dt);
							if ($get_student_info) {
								$i=0;
								while ($data = $get_student_info->fetch_array()) { 
									$i++;
						?>

									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $data['name'];?></td>
										<td><?php echo $data['roll'];?></td>
										<td>
											<input type="radio" name="attend[<?php echo $data['roll'];?>]" value="present" <?php if ( $data['attend'] == 'present') {echo "checked";} ?> >P
											<input type="radio" name="attend[<?php echo $data['roll'];?>]" value="absent" <?php if ( $data['attend'] == 'absent') {echo "checked";} ?> >A
										</td>

									</tr>


						<?php } }  ?>   


							<tr>
								<td colspan="4">
									<input type="submit" name="submit" class="btn btn-success" value="Update">
								</td>
							</tr>
							 
						</table>
					</form>
	 
					
				</div>
				 
			</div>

<!-- Footer file added -->
<?php include('inc/footer.php'); ?>