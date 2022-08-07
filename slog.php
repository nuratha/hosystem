<!-- HEADER GOES HERE -->
<?php
	include_once './uheader.php';
?>


<!-- CONTENT GOES HERE -->
		<main class="p-6">
			<section class="p-6 grid grid-cols-2 gap-4 place-items-center">
			    <div class="p-6 grid grid-cols-1 h-full bg-slate-700">
                    <!-- column 1 -->
                    <div class="self-center">
                        <!-- SCREEN TITLE-->
                        <h3 class="text-3xl font-bold">
                            Student's Login
                        </h3>

                        <br>

                        <!-- ABOUT -->
                        <p class="text-justify">
                            Book appointments to hospitals, clinics and other medical centres and keep track of previous appointments through our website.
                        </p>
                        
                        <br>
                        
                        <!-- NAVIGATION -->
                        <label class="underline text-white hover:text-accent active:text-secondary"><a href="./ssign.php">
                            Don't have an account? Register here!
                        </a></label>
                    </div>
                </div>

                <!-- column 2 -->
                <!-- Login fx here-->
                <div><form action="includes/slogin.inc.php" method="post">
                    <!-- Email input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="text" name="email" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="name@email.com">
                    </div>
                    
                    <!-- Pswd input -->
                    <div>
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="pswd" class="input input-bordered input-secondary bg-slate-700 w-full max-w-xs" placeholder="*******">
                    </div>
                    	
					<br>

                    <!-- LOGIN BUTTON -->
                    <div>
                        <button type="submit" name="submit" class="p-3 text-white bg-primary hover:bg-accent active:hover:bg-secondary w-full max-w-xs">
                            Log In
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
                </form>
		    </section>
	    </main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>