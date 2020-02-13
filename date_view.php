<!-- Header file and Student Class added -->
<?php
 include('inc/header.php'); 
 include('lib/Student.php');
?>

 
			<div class="card"  style="min-height: 500px">
				<div class="card-header">
					<a href="add.php" class="btn btn-success">Add Student</a>
					<a href="index.php" class="btn btn-info float-right">Take Attendance</a>
				</div>
				<div class="card-body">
					<div>
						<h3 style="float: right;">Date: <?php $cur_date=date('Y-m-d'); echo $cur_date;?></h3>
					</div> 
					<form action="" method="post">


			<!-- All Attendance show by Date wise -->
						<table class="table table-striped text-center">
							<tr>
								<th>#</th>
								<th>Attendance Date</th>
								<th>Action</th>
							</tr>

						<?php 

							$stu = new Student; 
							$get_date = $stu->getdate();
							if ($get_date) {
								$i=0;
								while ($data = $get_date->fetch_array()) { 
									$i++;
						?>

									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $data['att_time'];?></td>
										 
										<td>
											<a class="btn btn-info" href="student_view_info.php?dt=<?php echo $data['att_time'];?>">View</a>
										</td>
									</tr>


						<?php } }  ?>
						 

							
							 
							<tr>
								<td colspan="4">
									<input type="submit" name="submit" class="btn btn-success" value="Submit">
								</td>
							</tr>
							 
						</table>
						
					</form>
					
				</div>
				 
			</div>

<!-- Footer file added -->
<?php include('inc/footer.php'); ?>