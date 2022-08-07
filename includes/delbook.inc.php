<?php 
    // DELETE FX
	if (isset($_POST["delete"])) {
        require_once 'dbh.inc.php';

        $delfx = mysqli_real_escape_string($con, $_POST['delfx']);

		$del = mysqli_query($con, "DELETE FROM applog WHERE app_id = '$delfx'");
	
		if($del) {
			header("location: ../srecord.php");
			exit();
		}
		else {
			header("location: ../sviewbook.php?app_id=".$delfx."&error=cantdelete");
			exit();
		}
    }