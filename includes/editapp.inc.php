<?php

if (isset($_POST["update"])) {
    $dr_id = $_POST["dr_id"];
    $app_stat = $_POST["app_stat"];

    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';
    
    $app_id = mysqli_real_escape_string($con, $_POST['app_id']);

    // CHECKS EMPTY INPUT
    if (emptyInputApp($dr_id, $app_stat) !== false) {
        header("location: ../dappupdate.php?app_id=".$app_id."&error=emptyinput");
        exit();
    }

    editApp($con, $app_id, $dr_id, $app_stat); // UPDATES APPOINTMENT STATUS

}
else {
    header("location: ../drecord.php");
    exit();
}