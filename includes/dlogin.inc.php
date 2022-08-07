<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pswd = $_POST["pswd"];

    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';

    // CHECKS EMPTY INPUT
    if (emptyInputLogin($email, $pswd) !== false) {
        header("location: ../dlog.php?error=emptyinput");
        exit();
    }

    loginDoc($con, $email, $pswd); // LOGIN ACCOUNT

}
else {
    header("location: ../dlog.php");
    exit();
}