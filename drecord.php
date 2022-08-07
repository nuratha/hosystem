<!-- HEADER GOES HERE -->
<?php
	session_start();
	
	include_once './dheader.php';
	include 'includes/dbh.inc.php';

	$id = $_SESSION["dr_id"];

    $doctor = mysqli_query($con, "SELECT * FROM doctorlog WHERE dr_id = '$id'"); //FETCH DOCTOR DATA
	$dr = mysqli_fetch_assoc($doctor);

    $h = $dr['dept_id'];
	$hospital = mysqli_query($con, "SELECT * FROM deptlog WHERE dept_id = '$h'"); //FETCH DEPT DATA
	$hos = mysqli_fetch_assoc($hospital);

    $query = mysqli_query($con, "SELECT * FROM applog WHERE dept_id = '$h' ORDER BY app_date"); //FETCH RELATED APPOINTMENT DATA

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
                    Appointment Log
				</h2>
                <h6>
                    This section is a record of all appointments booked to your department.
				</h6>
			</section>

            <!-- RECORDS -->
			<section class="p-6">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                    <tr>
                        <th class="bg-primary">ID</th>
                        <th class="bg-primary">Date</th>
                        <th class="bg-primary">Category</th>
                        <th class="bg-primary">Status</th>
                        <th class="bg-primary">Location</th>
                        <th class="bg-primary">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- ROWS 
                         DATABASE RESULTS SHOWS UP HERE!
                    -->
                    <?php
					while ($row = mysqli_fetch_array($query)) {
                        echo 
                            '<tr class="hover hover:text-white">
                            <th class="bg-slate-800">' . $row['app_id'] . '</th>
                            <td class="bg-slate-800">' . $row['app_date'] . '</td>
                            <td class="bg-slate-800">' . $row['app_category'] . '</td>
                            <td class="bg-slate-800">' . $row['app_stat'] . '</td>
                            <td class="bg-slate-800">' . $hos['dept_name'].  '</td>
                            <th class="bg-slate-800">
                                <a href="./dappupdate.php?app_id='.$row['app_id'].'"><button class="btn btn-outline btn-white hover:btn-accent hover:text-white">Update</button></a>
                            </th>
                           </tr>';
						}
					?>
                    </tbody>
                </table>
            </div>
			</section>
		</main>

<!-- FOOTER GOES HERE -->
<?php
	include_once './footer.php';
?>