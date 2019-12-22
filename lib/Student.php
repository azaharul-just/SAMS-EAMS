<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/Database.php');

?>

<?php

class Student{
  private $db;
  function __construct(argument)
  {

  }


	public function __construct()
	{
		$this->db = new Database();
	}
  public function insertData($name,$roll){
		$name = mysqli_real_escape_string($this->db->link,$name);
		$roll = mysqli_real_escape_string($this->db->link,$roll);

		if (empty($name) || empty($roll)) {
			$msg = "<div class='alert alert-danger'>Error! Field must be fill up.</div>";
			return $msg;
		}

		$stu_query = "INSERT INTO tbl_student(name,roll)VALUES('$name','$roll')";
		$result = $this->db->insert($stu_query);

		$att_query = "INSERT INTO tbl_attendance(roll)VALUES('$roll')";
		$result = $this->db->insert($att_query);

		if ($result) {
			$msg = "<div class='alert alert-success'>Success! The student addes successfulyy.</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'>Error! The student did not add!</div>";
			return $msg;
		}

	}
}


?>
