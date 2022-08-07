<!-- Redirects to login -->
<?php
	session_start();

	include 'includes/dbh.inc.php';

	$id = $_SESSION["st_id"];

	// If not logged in
	if (!$id == true) {
		header("location: ./slog.php");
		exit();
	}
    else {
        header("location: ./includes/logout.inc.php");
        exit();
    }
?>