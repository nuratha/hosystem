<!-- HEADER GOES HERE -->
<?php
	session_start();
	include_once './sheader.php';
	include 'includes/dbh.inc.php';

	$id = $_SESSION["st_id"];
	$query = mysqli_query($con, "SELECT * FROM deptlog");
	$query2 = mysqli_query($con, "SELECT * FROM deptlog"); //Workaround to call the query twice
	
	// If not logged in
	if (!$id == true) {
		header("location: ./slog.php");
		exit();
	}
?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<section class="p-6">
				<h2 class="text-2xl font-semibold text-white">
					Book Appointment
				</h2>
			</section>

			<section class="p-6">
				<div><form action="includes/book.inc.php" method="post">
						<!-- Department input -->
						<div>
							<label class="label">
								<span class="label-text">Select Hospital</span>
							</label>
							<select name="dept_id" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
								<?php
								while ($row2 = mysqli_fetch_array($query2)) {
									echo
										'<option value="' . $row2['dept_id'] . '">' . $row2['dept_name'] . '</option>';
								}
								?>
							</select>
						</div>

						<!-- Category input -->
						<div>
							<label class="label">
								<span class="label-text">Select health category</span>
							</label>
							<select name="app_category" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
								<option>Generic health relevance</option>
								<option>Ear, Nose and Throat</option>
								<option>Inflammatory and immune system</option>
								<option>Skin</option>
								<option>Mental health</option>
							</select>
						</div>

						<!-- Date input -->
						<div>
                        <label class="label">
                            <span class="label-text">Select Appointment date</span>
                        </label>
                        <input type="date" name="app_date" min="2022-03-01" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                    </div>

					<!-- Notes input -->
					<div>
                        <label class="label">
                            <span class="label-text">Other notes</span>
                        </label>
                        <textarea rows="5" name="app_note" class="textarea textarea-bordered textarea-secondary bg-slate-700 w-full max-w-xs" placeholder="Please provide your medical comments here. E.g.: Constant headache for 14 days straight."></textarea>
                    </div>

						<br>

                    <!-- LOGIN BUTTON -->
                    <div>
                        <button type="submit" name="submit" class="p-3 text-white bg-primary hover:bg-accent active:hover:bg-secondary w-full max-w-xs">
                            Book appointment
                        </button>
                    </div>

                    <!-- ERROR MESSAGES -->
                    <p class="text-red-600 text-center">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "(!) All fields must be filled up.";
                                }

                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "(!)Something went wrong.<br>Please try again.";
                                }
                            }
                        ?>
                    </p>
				</form></div>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>