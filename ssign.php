<!-- HEADER GOES HERE -->
<?php
	include_once './uheader.php';
?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<section class="p-6">
        <!-- TITLE -->
                <div>
                    <h2 class="text-2xl font-semibold text-white">
                        Sign up now!
                    </h2>
                    <p>
                        Please fill in all fields to register.
                    </p>
                    <br>
                </div>
                <form action="./includes/ssignup.inc.php" method="POST">
                <div class="grid grid-cols-2 gap-4 items-start">
        <!-- COLUMN 1 -->
                <div>
                    <div>
                        <label class="text-lg">
                            Personal information
                        </label>
                    </div>

                <br>
					<!-- First name input -->
                    <div>
                        <label class="label">
                            <span class="label-text">First name</span>
                        </label>
                        <input type="text" name="st_first" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: Alex">
                    </div>

					<!-- Last name input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Last name</span>
                        </label>
                        <input type="text" name="st_last" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: Smith">
                    </div>

                    <!-- Bday input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Date of birth</span>
                        </label>
                        <input type="date" name="st_dob" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                    </div>

                    <!-- Phone input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Phone number</span>
                        </label>
                        <input type="tel" name="st_phone" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: 011-44298014">
                    </div>


                    <!-- Email input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: name@email.com">
                    </div>

                    <!-- University input -->
                    <div>
                        <label class="label">
                            <span class="label-text">University</span>
                        </label>
                        <select name="st_uni" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                            <option>N/A</option>
							<option>University Malaya</option>
							<option>University of Malaya-Wales</option>
                            <option>Universiti Teknologi MARA</option>
                            <option>Management & Science University</option>
						</select>
                    </div>

                    <!-- Programme input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Programme</span>
                        </label>
                        <select name="st_prog" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
							<option>N/A</option>
							<option>Computer Science</option>
                            <option>Civil Engineering</option>
                            <option>Dentistry</option>
                            <option>Legal Studies</option>
                            <option>Social Sciences</option>
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
                </div>
                
        <!-- COLUMN 2 -->

                <div>
                    <div>
                        <label class="text-lg">
                            Medical information
                        </label>
                    </div>

                <br>

                    <!-- Height input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Height (cm)</span>
                        </label>
                        <input type="number" min="1" name="st_height" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: 173">
                    </div>

                    <!-- Weight input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Weight (kg)</span>
                        </label>
                        <input type="number" min="1" name="st_weight" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="E.g.: 84">
                    </div>

                    <!-- Sex input -->
					<div>
						<label class="label">
							<span class="label-text">Sex</span>
						</label>
						<select name="st_sex" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                            <option selected disabled hidden></option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>

                    <!-- Blood input -->
                    <div>
						<label class="label">
							<span class="label-text">Blood type</span>
						</label>
						<select name="st_blood" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
                            <option selected disabled hidden></option>
							<option>A</option>
							<option>B</option>
                            <option>AB</option>
                            <option>O</option>
						</select>
					</div>

                    <!-- Allergies input -->
                    <div>
						<label class="label">
							<span class="label-text">Pre-existing conditions</span>
						</label>
						<select name="st_pre" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs">
							<option>N/A</option>
							<option>Diabetes</option>
                            <option>Asthma</option>
                            <option>Sleep apnea</option>
                            <option>Cancer</option>
						</select>
					</div>
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
                </div></form>
		    </section>
	    </main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>