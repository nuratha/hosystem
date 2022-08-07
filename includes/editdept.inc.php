<?php

if (isset($_POST["submit"])) {
    $dept_name = $_POST["dept_name"];
    $dept_loc = $_POST["dept_loc"];
    $dept_phone = $_POST["dept_phone"];

    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';
    
    $dept_id = mysqli_real_escape_string($con, $_POST['dept_id']);

    // CHECKS EMPTY INPUT
    if (emptyInputDept($dept_name, $dept_loc, $dept_phone) !== false) {
        header("location: ../ddeptedit.php?dept_id=".$dept_id."&error=emptyinput");
        exit();
    }

    editDept($con, $dept_id, $dept_name, $dept_loc, $dept_phone); // EDIT DEPARTMENT

}
else {
    header("location: ../ddept.php");
    exit();
}