<?php

if (isset($_POST["submit"])) {
    $st_first = $_POST["st_first"];
    $st_last = $_POST["st_last"];
    $st_dob = $_POST["st_dob"];
    $st_phone = $_POST["st_phone"];
    $email = $_POST["email"];
    $st_uni = $_POST["st_uni"];
    $st_prog = $_POST["st_prog"];
    $pswd = $_POST["pswd"];
    $pswdConfirm = $_POST["pswdConfirm"];

    $st_height = $_POST["st_height"];
    $st_weight = $_POST["st_weight"];
    $st_sex = $_POST["st_sex"];
    $st_blood = $_POST["st_blood"];
    $st_pre = $_POST["st_pre"];


    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';

    // CHECKS EMPTY INPUT
    if (emptyInputSignup($st_first, $st_last, $st_dob, $st_phone, $email, $st_uni, $st_prog, $pswd, $pswdConfirm, $st_height, $st_weight, $st_sex, $st_blood, $st_pre) !== false) {
        header("location: ../ssign.php?error=emptyinput");
        exit();
    }

    // CHECKS BAD EMAIL
    if (invalidEmail($email) !== false) {
        header("location: ../ssign.php?error=invalidemail");
        exit();
    }

    // CHECKS MISMATCHED PASSWORD
    if (matchPswd($pswd, $pswdConfirm) !== false) {
        header("location: ../ssign.php?error=pswdnotmatch");
        exit();
    }

    // CHECKS EXISTING EMAIL
    if (existAcc($con, $email) !== false) {
        header("location: ../ssign.php?error=emailtaken");
        exit();
    }

    createUser($con, $st_first, $st_last, $st_dob, $st_phone, $email, $st_uni, $st_prog, $pswd, $st_height, $st_weight, $st_sex, $st_blood, $st_pre); // CREATES ACCOUNT

}
else {
    header("location: ../ssign.php");
    exit();
}