<?php
 include('inc/header.php');

?>


			<div class="card"  style="min-height: 500px">

				<div class="card-header">
					<a href="" class="btn btn-success">Add Student</a>
					<a href="index.php" class="btn btn-info float-right">Back</a>
				</div>
				<div class="card-body">



					<form action="" method="post">
 						<div class="form-group">
 							<label for="name"><b>Student Name</b></label>
 							<input type="text" name="name" id="name" class="form-control" placeholder="Enter student name" >
 						</div>

 						<div class="form-group">
 							<label for="roll"><b>Student Roll</b></label>
 							<input type="text" name="roll" id="roll" class="form-control" placeholder="Enter student roll" >
 						</div>

						<div class="form-group">
 							<input type="submit" name="submit" class="btn btn-primary" value="Add Student">
 						</div>

					</form>

				</div>

			</div>

<?php include('inc/footer.php'); ?>