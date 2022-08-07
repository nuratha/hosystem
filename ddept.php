<!-- HEADER GOES HERE -->
<?php
	session_start();
    include_once './dheader.php';
    include 'includes/dbh.inc.php';

    $id = $_SESSION["dr_id"];
    $query = mysqli_query($con, "SELECT * FROM deptlog ORDER BY dept_name");

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
					Available Hospitals
				</h2>

			</section>

			<section class="p-6">
                <div>
                    <div class="self-center">
                        <a href="./ddeptadd.php"><button class="btn btn-outline btn-white hover:btn-accent hover:text-white">Add Hospital</button></a>
                    </div>
                </div>

                <br>

                <div class="overflow-x-auto">
					<table class="table w-full">
						<!-- head -->
						<thead>
						    <tr>
								<th class="bg-primary">ID</th>
								<th class="bg-primary">Hospital</th>
								<th class="bg-primary">Location</th>
								<th class="bg-primary">Contact</th>
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
										'<tr class="hover">
											<th class="bg-slate-800">' . $row['dept_id'] . '</th>
											<td class="bg-slate-800">' . $row['dept_name'] . '</td>
											<td class="bg-slate-800">' . $row['dept_loc'] . '</td>
											<td class="bg-slate-800">' . $row['dept_phone'] . '</td>
                                            <th class="bg-slate-800">
                                                <a href="./ddeptedit.php?dept_id='.$row['dept_id'].'"><button class="btn btn-outline btn-white hover:btn-accent hover:text-white">Edit/Delete</button></a>
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