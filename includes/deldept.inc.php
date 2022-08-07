<?php 
    // DELETE FX
	if (isset($_POST["delete"])) {
        require_once 'dbh.inc.php';

        $delfx = mysqli_real_escape_string($con, $_POST['delfx']);

		$del = mysqli_query($con, "DELETE FROM deptlog WHERE dept_id = '$delfx'");
	
		if($del) {
			header("location: ../ddept.php");
			exit();
		}
		else {
			header("location: ../ddeptedit.php?dept_id=".$delfx."&error=cantdelete");
			exit();
		}
    }