<?php include('inc/header.php'); ?>

<div class="card"  style="min-height: 500px">
    <div class="card-header">
      <a href="add.php" class="btn btn-success">Add Student</a>
      <a href="date_view.php" class="btn btn-info float-right">View All</a>
    </div>
    <div class="card-body">
      <div>
        <h3 style="float: right;color: gray">Date:<?ph ehco date();?></h3>
      </div>
      <div>
        <h2 style=" color: gray"><u> Attendance Form : </u></h2>
      </div>

    <div class='alert alert-danger' style="display: none;">Error! Student Attandence Missing!</div>

      <form action="" method="post">

        <table class="table table-striped text-center">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>ID</th>
            <th>Action</th>
          </tr>
              <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>
                  <input type="radio" name="attend" value="present">P
                  <input type="radio" name="attend" value="absent">A
                </td>
              </tr>
          <tr>
            <td colspan="4">
              <input type="submit" name="submit" class="btn btn-success" value="Add Attendance">
            </td>
          </tr>

        </table>

      </form>

    </div>

  </div>
<?php include('inc/footer.php'); ?>
