
<?php
	//-- LOGIN SESSION --
	session_start();
	
	//-- HEADER GOES HERE --
	include_once './header.php';
	include 'includes/dbh.inc.php';
	$id = $_SESSION["st_id"];
	
	// If not logged in
	if (!$id == true) {
		header("location: ./slog.php");
		exit();
	}

?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<!-- SITE UPDATES -->
			<section class="p-6">
				<div class="alert alert-info shadow-lg">
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
						<label>Updates: Nothing new to report!</label>
					</div>
				</div>
			</section>

			<section class="p-6">
				<h2 class="text-2xl font-semibold text-white">
					Student's Homepage
				</h2>
				<p>
					Select a page to navigate.
				</p>
			</section>

			<!-- SPLASH PAGE -->
			<section class="p-6">
				<ul class="menu bg-base-100 w-56">
					<li><a class="bg-primary hover:bg-accent" href="./sbook.php">Book appointment</a></li>
					<br>
                    <li><a class="bg-primary hover:bg-accent" href="./srecord.php">Appointment History</a></li>
					<br>
                    <li><a class="bg-primary hover:bg-accent" href="./sprofile.php">Account Info</a></li>
				</ul>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>