<?php

if (isset($_POST["submit"])) {
    $dept_name = $_POST["dept_name"];
    $dept_loc = $_POST["dept_loc"];
    $dept_phone = $_POST["dept_phone"];

    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';

    // CHECKS EMPTY INPUT
    if (emptyInputDept($dept_name, $dept_loc, $dept_phone) !== false) {
        header("location: ../ddeptadd.php?error=emptyinput");
        exit();
    }

    inputDept($con, $dept_name, $dept_loc, $dept_phone); // ADDS DEPARTMENT

}
else {
    header("location: ../ddept.php");
    exit();
}