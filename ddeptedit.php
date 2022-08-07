<!-- HEADER GOES HERE -->
<?php
	session_start();
    include_once './dheader.php';
    include 'includes/dbh.inc.php';

    $id = $_SESSION["dr_id"];
    
    if(isset($_GET["dept_id"])) {
		$dept_id = mysqli_real_escape_string($con, $_GET['dept_id']);
		$department = mysqli_query($con, "SELECT * FROM deptlog WHERE dept_id = '$dept_id'");
		$dept = mysqli_fetch_array($department);
		mysqli_free_result($department);
	}

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
					Edit Hospital
				</h2>
                <p>
                    Please update details for the partnered hospital.
                </p>
			</section>

			<section class="p-6">
                <div><form action="includes/editdept.inc.php" method="post">
					<!-- Hospital name input -->
					<div>
						<label class="label">
							<span class="label-text">Hospital name</span>
						</label>
						<input type="text" name="dept_name" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" value="<?php echo $dept['dept_name']; ?>">
					</div>

					<!-- Adress input -->
					<div>
                        <label class="label">
                            <span class="label-text">Hospital address</span>
                        </label>
                        <textarea rows="5" name="dept_loc" class="textarea textarea-bordered textarea-secondary bg-slate-700 w-full max-w-xs"><?php echo $dept['dept_loc']; ?></textarea>
                    </div>

                    <!-- Phone input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Phone number</span>
                        </label>
                        <input type="tel" name="dept_phone" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" value="<?php echo $dept['dept_phone']; ?>">
                    </div>

					<br>

                    <!-- ADD BUTTON -->
                    <div>
                        <input type="hidden" name="dept_id" value="<?php echo $dept_id ?>">
                        <button type="submit" name="submit" class="p-3 text-white bg-primary hover:bg-accent active:hover:bg-secondary w-full max-w-xs">
                            Update Hospital
                        </button>
                    </div>
				</form></div>

                <br>

                <!-- DELETE BUTTON -->
				<div><form action="./includes/deldept.inc.php" method="post">
					<input type="hidden" name="delfx" value="<?php echo $dept_id ?>">
					    <button type="submit" name="delete" class="p-3 text-white bg-primary hover:bg-accent active:hover:bg-secondary w-full max-w-xs">
                            Remove Hospital
                        </button>

					<!-- ERROR MESSAGES -->
                    <p class="p-6 text-red-600">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "(!) All fields must be filled up.";
                                }
                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "(!) Something went wrong.<br>Please try again.";
                                }
                                else if ($_GET["error"] == "cantdelete") {
                                    echo "(!) Unable to delete.";
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