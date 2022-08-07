<?php
session_start();
$id = $_SESSION["st_id"];

if (isset($_POST["submit"])) {
    $dept_id = $_POST["dept_id"];
    $app_category = $_POST["app_category"];
    $app_date = $_POST["app_date"];
    $app_note = $_POST["app_note"];


    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';

    // CHECKS EMPTY INPUT
    if (emptyInputBook($dept_id, $app_category, $app_date, $app_note) !== false) {
        header("location: ../sbook.php?error=emptyinput");
        exit();
    }

    inputBook($con, $id, $dept_id, $app_category, $app_date, $app_note); // ADDS BOOKING

}
else {
    header("location: ../sbook.php");
    exit();
}