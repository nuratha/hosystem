<!-- HEADER GOES HERE -->
<?php
	session_start();
	
	include_once './sheader.php';
	include 'includes/dbh.inc.php';

	$id = $_SESSION["st_id"];
	$query = mysqli_query($con, "SELECT * FROM studentlog WHERE st_id = '$id'");
	$row = mysqli_fetch_array($query);

	// If not logged in
	if (!$id == true) {
		header("location: ./slog.php");
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
						<?php echo $row['st_first']." ".$row['st_last']; ?>
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
							Date of birth: <?php echo $row['st_dob']; ?>
						</p>
						<p>
							Phone number: <?php echo $row['st_phone']; ?>
						</p>
						<p>
							Email: <?php echo $row['st_email']; ?>
						</p>
						<p>
							Institute: <?php echo $row['st_uni']; ?>
						</p>
						<p>
							Programme: <?php echo $row['st_prog']; ?>
						</p>
					</div>

					<!-- Column 3 -->
					<div class="self-start">
						<h5 class="text-lg font-semibold">
							Medical information
						</h5>
						<br>
						<p>
							Sex: <?php echo $row['st_sex']; ?>
						</p>
						<p>
							Height: <?php echo $row['st_height']."cm"; ?>
						</p>
						<p>
							Weight: <?php echo $row['st_weight']."kg"; ?>
						</p>
						<p>
							Blood type: <?php echo $row['st_blood']; ?>
						</p>
						<p>
							Pre-existing conditions: <?php echo $row['st_pre']; ?>
						</p>
					</div>
				</div>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>