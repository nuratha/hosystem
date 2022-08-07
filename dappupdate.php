<!-- HEADER GOES HERE -->
<?php
	session_start();
	
	include_once './dheader.php';
	include 'includes/dbh.inc.php';

	$id = $_SESSION["dr_id"];
	$query = mysqli_query($con, "SELECT * FROM applog WHERE dr_id = '$id'");

	// If not logged in
	if (!$id == true) {
		header("location: ./dlog.php");
		exit();
	}

    // Gets quest ID from url
	if(isset($_GET["app_id"])) {
		$app_id = mysqli_real_escape_string($con, $_GET['app_id']);
		$appointment = mysqli_query($con, "SELECT * FROM applog WHERE app_id = '$app_id'");
		$info = mysqli_fetch_assoc($appointment);

		// COLLECTS ADDITIONAL RELATED INFO FROM DOCTOR AND DEPT TABLE
		$h = $info['dept_id'];
		$d = $info['dr_id'];
		$s = $info['st_id'];
		$t = $info['app_category'];

		$hospital = mysqli_query($con, "SELECT * FROM deptlog WHERE dept_id = '$h'");
		$hos = mysqli_fetch_assoc($hospital);

		$doctor = mysqli_query($con, "SELECT * FROM doctorlog WHERE dr_id = '$d'");
		$dr = mysqli_fetch_assoc($doctor);

		$specialty = mysqli_query($con, "SELECT * FROM doctorlog WHERE dr_spec = '$t'"); //DISPLAYS DOCTORS WITHIN THAT FIELD

		$student = mysqli_query($con, "SELECT * FROM studentlog WHERE st_id = '$s'");
		$st = mysqli_fetch_assoc($student);
	}
?>

<!-- CONTENT GOES HERE -->
<main class="p-6">
			<section class="p-6">
				<h2 class="text-2xl font-semibold text-white">
					Appointment Details
				</h2>
				<p>
					Please assign a doctor and confirm the patient's appointment.
				</p>
			</section>

			<section class="p-6 bg-slate-700">
				<p>
					<?php 
						echo '<b>Appointment ID</b>: ' . $info['app_id'] . '<br>
						<b>Date</b>: ' . $info['app_date'] . '<br><br>
						<b>Facility</b>: ' . $hos['dept_name'] . '<br>
						<b>Location</b>: ' . $hos['dept_loc'] . '<br>
						<b>Category</b>: ' . $info['app_category'] . '<br><br>';
					 ?>
				</p>

				<!-- UPDATE BUTTON -->
				<form action="./includes/editapp.inc.php" method="post">
					<input type="hidden" name="app_id" value="<?php echo $app_id ?>">
					
					<!-- Doctor input -->
					<div>
						<label class="label">
							<span class="label-text">Update assigned doctor</span>
						</label>
						<select name="dr_id" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
							<option hidden value="<?php echo $dr['dr_id'] ?>"><?php echo $dr['dr_first'] . ' ' . $dr['dr_last'] ?></option>
							<?php
								while ($row = mysqli_fetch_array($specialty)) {
									echo
										'<option value="' . $row['dr_id'] . '">' . $row['dr_first'] . ' ' . $row['dr_last'] . '</option>';
								}
							?>
						</select>
					</div>

					<!-- Status input -->
					<div>
						<label class="label">
							<span class="label-text">Update appointment status</span>
						</label>
						<select name="app_stat" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
							<option hidden><?php echo $info['app_stat'] ?></option>
							<option>PENDING</option>
							<option>CANCELLED</option>
							<option>CONFIRM</option>
							<option>COMPLETED</option>
						</select>
					</div>
					<br>
					<button type="submit" name="update" class="btn btn-outline btn-white hover:btn-accent hover:text-white">Update</button>

					<!-- ERROR MESSAGES -->
                    <p class="text-red-600 text-center">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "cantupdate") {
                                    echo "(!) Unable to update.";
                                }
                            }
                        ?>
                    </p>
				</form>

				<br>
				<h3 class="font-bold">PATIENT INFORMATION</h3>
				<br>

				<p>
					<?php 
						echo '<b>Name</b>: ' . $st['st_first'] . ' ' . $st['st_last'] . '<br>
						<b>Sex</b>: ' . $st['st_sex'] . '<br>
						<b>Date of birth</b>: ' . $st['st_dob'] . '<br>
						<b>Height</b>: ' .$st['st_height'] . 'cm<br>
						<b>Weight</b>: ' . $st['st_weight'] . 'kg<br>
						<b>Pre-existing conditions</b>: ' . $st['st_pre'] . '<br><br>
						<b>Patient Note</b>: ' . $info['app_note'];
					 ?>
				</p>

				<br><br>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>