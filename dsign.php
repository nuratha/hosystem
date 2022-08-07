<!-- HEADER GOES HERE -->
<?php
	include_once './uheader.php';
    include 'includes/dbh.inc.php';

    $query = mysqli_query($con, "SELECT * FROM deptlog");
    $query2 = mysqli_query($con, "SELECT * FROM deptlog");
?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<section class="p-6">
                <div>
                    <h2 class="text-2xl font-semibold text-white">
                        Doctor's registration
                    </h2>
                    <p>
                        Please fill in all fields to register.
                    </p>
                    <br>
                </div>
            </section>

            <section class="p-6">
				<div><form action="./includes/dsignup.inc.php" method="POST">
					<!-- First name input -->
                    <div>
                        <label class="label">
                            <span class="label-text">First name</span>
                        </label>
                        <input type="text" name="dr_first" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: Alex">
                    </div>

					<!-- Last name input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Last name</span>
                        </label>
                        <input type="text" name="dr_last" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: Smith">
                    </div>

                    <!-- Sex input -->
					<div>
						<label class="label">
							<span class="label-text">Sex</span>
						</label>
						<select name="dr_sex" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                            <option selected disabled hidden></option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>

                    <!-- Bday input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Date of birth</span>
                        </label>
                        <input type="date" name="dr_dob" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                    </div>

                    <!-- Email input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: name@email.com">
                    </div>

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

                    <!-- Specialty input -->
					<div>
						<label class="label">
							<span class="label-text">Select Specialty</span>
						</label>
						<select name="dr_spec" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
							<option>Generic health relevance</option>
							<option>Ear, Nose and Throat</option>
							<option>Inflammatory and immune system</option>
							<option>Skin</option>
							<option>Mental health</option>
						</select>
					</div>

                    <!-- Pswd input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="pswd" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="*******">
                    </div>

					<!-- Confirm pswd input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Confirm password</span>
                        </label>
                        <input type="password" name="pswdConfirm" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="*******">
                    </div>

					<br>

                    <!-- LOGIN BUTTON -->
                    <div>
                        <button type="submit" name="submit" class="p-3 text-white bg-primary hover:bg-accent active:hover:bg-secondary w-full max-w-xs">
                            Sign up
                        </button>
                    </div>

                    <!-- ERROR MESSAGES -->
                    <p class="text-red-600 text-center">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "(!) All fields must be filled up.";
                                }
                                
                                else if ($_GET["error"] == "bademail") {
                                    echo "(!) Email is not registered.";
                                }
                                
                                else if ($_GET["error"] == "badlogin") {
                                    echo "(!) Email or password does not match.";
                                }

                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "(!)Something went wrong.<br>Please try again.";
                                }
                            }
                        ?>
                    </p>
                   
                    <br>
                </form>
		    </section>
	    </main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>