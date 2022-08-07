<!-- THIS IS FOR STUDENTS
    This file is to reduce code redundancy and simplify coding process 

Closing tags are continued within footer.php -->
<!DOCTYPE html>
<html data-theme="business">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="A hospital appointment booking system!">
		<meta name = "viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Hosystem</title>
	</head>

	<body>
<!-- HEADER GOES HERE -->
    <header>
		<div class="p-6 navbar bg-primary text-white">
                    <div class="flex-1">
                        <a class="btn btn-ghost normal-case text-2xl" href="./sindex.php">Hosystem</a>
                    </div>
                    <div class="flex-none">
                        <ul class="menu menu-horizontal p-0">
                            <li tabindex="0">
                                <a>
                                Menu
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                                </a>
                                <ul class="menu bg-base-100 w-56">
                                    <li><a class="hover:bg-accent" href="./sbook.php">Book appointment</a></li>
                                    <li><a class="hover:bg-accent" href="./srecord.php">Appointment History</a></li>
                                    <li><a class="hover:bg-accent" href="./sprofile.php">Account Info</a></li>
                                </ul>
                            </li>
                            <li><a href="./includes/logout.inc.php">Logout</a></li>
                        </ul>
                    </div>
                    </div>
        </header>