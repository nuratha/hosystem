<?php

if (isset($_POST["submit"])) {
    $dr_first = $_POST["dr_first"];
    $dr_last = $_POST["dr_last"];
    $dr_sex = $_POST["dr_sex"];
    $dr_dob = $_POST["dr_dob"];
    $email = $_POST["email"];
    $dept_id = $_POST["dept_id"];
    $dr_spec = $_POST["dr_spec"];
    $pswd = $_POST["pswd"];
    $pswdConfirm = $_POST["pswdConfirm"];

    require_once 'dbh.inc.php';
    require_once 'fx.inc.php';

    // CHECKS EMPTY INPUT
    if (emptyInputdSignup($dr_first, $dr_last, $dr_sex, $dr_dob, $email, $dr_spec, $dept_id, $pswd, $pswdConfirm) !== false) {
        header("location: ../dsign.php?error=emptyinput");
        exit();
    }

    // CHECKS BAD EMAIL
    if (invalidEmail($email) !== false) {
        header("location: ../dsign.php?error=invalidemail");
        exit();
    }

    // CHECKS MISMATCHED PASSWORD
    if (matchPswd($pswd, $pswdConfirm) !== false) {
        header("location: ../dsign.php?error=pswdnotmatch");
        exit();
    }

    // CHECKS EXISTING EMAIL
    if (existAcc($con, $email) !== false) {
        header("location: ../dsign.php?error=emailtaken");
        exit();
    }

    createDoc($con, $email, $pswd, $dr_first, $dr_last, $dr_sex, $dr_dob, $dr_spec, $dept_id); // CREATES ACCOUNT

}
else {
    header("location: ../dsign.php");
    exit();
}