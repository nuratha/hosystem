<!-- HEADER GOES HERE -->
<?php
	session_start();
    include_once './dheader.php';
    include 'includes/dbh.inc.php';

    $id = $_SESSION["dr_id"];
    $query = mysqli_query($con, "SELECT * FROM deptlog");

    // If not logged in
	if (!$id == true) {
		header("location: ./dlog.php");
		exit();
	}
?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<section class="p-6">
				<h2 class="text-2xl font-semibold text-white">
					Add New Hospital
				</h2>
                <p>
                    Please add details for the partnered hospital.
                </p>
			</section>

			<section class="p-6">
                <div><form action="includes/dept.inc.php" method="post">
					<!-- Hospital name input -->
					<div>
						<label class="label">
							<span class="label-text">Hospital name</span>
						</label>
						<input type="text" name="dept_name" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="Provide hospital name">
					</div>

					<!-- Address input -->
					<div>
                        <label class="label">
                            <span class="label-text">Hospital address</span>
                        </label>
                        <textarea rows="5" name="dept_loc" class="textarea textarea-bordered textarea-secondary bg-slate-700 w-full max-w-xs" placeholder="Provide the hospital's address."></textarea>
                    </div>

                    <!-- Phone input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Phone number</span>
                        </label>
                        <input type="tel" name="dept_phone" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: 03-44298014">
                    </div>

					<br>

                    <!-- ADD BUTTON -->
                    <div>
                        <button type="submit" name="submit" class="p-3 text-white bg-primary hover:bg-accent active:hover:bg-secondary w-full max-w-xs">
                            Add Hospital
                        </button>
                    </div>

                    <!-- ERROR MESSAGES -->
                    <p class="p-6 text-red-600">
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