<!-- Header file and Student Class added -->
<?php
 include('inc/header.php'); 
 include('lib/Student.php');
?>


<!-- Particular Student's Attendance missing check -->
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

 

<!-- Student Class object create and it's operation calling -->
<?php 
	error_reporting(0);
	$stu = new Student;
	$cur_date = date('Y-m-d');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$attend = $_POST['attend'];

		$insertAttendance = $stu->insertAttendance($cur_date,$attend);

	}
?>
			
	<!--  Contents -->		
			<div class="card"  style="min-height: 500px">
				<div class="card-header">
					<a href="add.php" class="btn btn-success">Add Student</a> 
					<a href="date_view.php" class="btn btn-info float-right">View All</a>
				</div>
				<div class="card-body">
					<div>
						<h3 style="float: right;color: gray">Date: <?php echo $cur_date;?></h3>
					</div>
					<div>
						<h2 style=" color: gray"><u> Attendance Form : </u></h2>
					</div>

			<!--  Message Show -->	
				<?php 
					if (isset($insertAttendance)) {
						echo $insertAttendance;
					}

				?>

				<div class='alert alert-danger' style="display: none;">Error! Student Attandence Missing!</div>


		<!-- Student info show, and also take attendace -->
					<form action="" method="post">

						<table class="table table-striped text-center">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>ID</th>
								<th>Action</th>
							</tr>

						<?php 
							$get_student = $stu->getStudents();
							if ($get_student) {
								$i=0;
								while ($data = $get_student->fetch_array()) { 
									$i++;
						?>

									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $data['name'];?></td>
										<td><?php echo $data['roll'];?></td>
										<td>
											<input type="radio" name="attend[<?php echo $data['roll'];?>]" value="present">P
											<input type="radio" name="attend[<?php echo $data['roll'];?>]" value="absent">A
										</td>
									</tr>


						<?php } }  ?>
						 

							
							 
							<tr>
								<td colspan="4">
									<input type="submit" name="submit" class="btn btn-success" value="Add Attendance">
								</td>
							</tr>
							 
						</table>
						
					</form>
					
				</div>
				 
			</div>


<!-- Footer file added-->
<?php include('inc/footer.php'); ?>