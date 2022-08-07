<!-- HEADER GOES HERE -->
<?php
	session_start();
	
	include_once './dheader.php';
	include 'includes/dbh.inc.php';

	$id = $_SESSION["dr_id"];
	$query = mysqli_query($con, "SELECT * FROM doctorlog WHERE dr_id = '$id'");
	$row = mysqli_fetch_array($query);

	$h = $row['dept_id'];

	$hospital = mysqli_query($con, "SELECT * FROM deptlog WHERE dept_id = '$h'");
	$hos = mysqli_fetch_assoc($hospital);

	// If not logged in
	if (!$id == true) {
		header("location: ./dlog.php");
		exit();
	}
?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<!-- TITLE -->
			<section class="p-6">
				<h2 class="text-2xl font-semibold text-white">
					Account Info
				</h2>
				<p>
					Your personal details are displayed here.
				</p>
			</section>

			<!-- PROFILE PICTURE -->
			<section class="grid grid-cols-1 gap-4 justify-items-center">
				<div class="p-6">
					<img class="mask mask-circle" src="https://api.lorem.space/image/shoes?w=160&h=160" />
				</div>
				<div class="p-6">
					<h3 class="text-xl font-semibold text-white">
						<?php echo $row['dr_first']." ".$row['dr_last']; ?>
					</h3>
				</div>
			</section>

			<section class="p-6 bg-slate-800">
				<div class="grid grid-cols-2 gap-4 place-items-center">
					<!-- Column 1 -->
					<div class="self-start">
						<h5 class="text-lg font-semibold">
							Personal information
						</h5>
						<br>
						<p>
							Date of birth: <?php echo $row['dr_dob']; ?>
						</p>
						<p>
							Sex: <?php echo $row['dr_sex']; ?>
						</p>
						<p>
							Email: <?php echo $row['dr_email']; ?>
						</p>
					</div>

					<!-- Column 3 -->
					<div class="self-start">
						<h5 class="text-lg font-semibold">
							Professional information
						</h5>
						<br>
						<p>
							Department: <?php echo $hos['dept_name']; ?>
						</p>
						<p>
							Specialty: <?php echo $row['dr_spec']; ?>
						</p>
					</div>
				</div>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>