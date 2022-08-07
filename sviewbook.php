<!-- HEADER GOES HERE -->
<?php
	session_start();
	
	include_once './sheader.php';
	include 'includes/dbh.inc.php';

	$id = $_SESSION["st_id"];
	$query = mysqli_query($con, "SELECT * FROM applog WHERE st_id = '$id'");

	// If not logged in
	if (!$id == true) {
		header("location: ./slog.php");
		exit();
	}

    // Gets quest ID from url
	if(isset($_GET["app_id"])) {
		$app_id = mysqli_real_escape_string($con, $_GET['app_id']);
		$appointment = mysqli_query($con, "SELECT * FROM applog WHERE st_id = '$id' AND app_id = '$app_id'");
		$info = mysqli_fetch_assoc($appointment);
	}
	// COLLECTS ADDITIONAL RELATED INFO FROM DOCTOR AND DEPT TABLE
	$h = $info['dept_id'];
	$d = $info['dr_id'];

	$hospital = mysqli_query($con, "SELECT * FROM deptlog WHERE dept_id = '$h'");
	$hos = mysqli_fetch_assoc($hospital);

	$doctor = mysqli_query($con, "SELECT * FROM doctorlog WHERE dr_id = '$d'");
	$dr = mysqli_fetch_assoc($doctor);
?>

<!-- CONTENT GOES HERE -->
<main class="p-6">
			<section class="p-6">
				<h2 class="text-2xl font-semibold text-white">
					Appointment Details
				</h2>
				<p>
					You may delete the appointment and reschedule if needed.
				</p>
			</section>

			<section class="p-6 bg-slate-700">
				<p>
					<?php 
						echo '<b>Appointment ID</b>: ' . $info['app_id'] . '<br>
						<b>Status</b>: <span class="text-accent font-bold">' . $info['app_stat'] . '</span><br>
						<b>Category</b>: ' . $info['app_category'] . '<br>
						<b>Date</b>: ' . $info['app_date'] . '<br><br>
						<b>Note</b>: ' . $info['app_note'] . '<br><br>
						<b>Facility</b>: ' . $hos['dept_name'] . '<br>
						<b>Location</b>: ' . $hos['dept_loc'] . '<br>
						<b>Contact</b>: ' . $hos['dept_phone'] . '<br>
						<b>Doctor</b>: ' . $dr['dr_first'] . " " . $dr['dr_last'];
					 ?>
				</p>

				<br><br>
				<!-- DELETE BUTTON -->
				<form action="./includes/delbook.inc.php" method="post">
					<input type="hidden" name="delfx" value="<?php echo $app_id ?>">
					<button type="submit" name="delete" class="btn btn-outline btn-white hover:btn-accent hover:text-white">Delete</button>

					<!-- ERROR MESSAGES -->
                    <p class="text-red-600 text-center">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "cantdelete") {
                                    echo "(!) Unable to delete.";
                                }
                            }
                        ?>
                    </p>
				</form>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>