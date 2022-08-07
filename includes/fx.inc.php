<?php

// CHECKS EMPTY INPUT (SIGN UP STUDENT)
function emptyInputSignup($st_first, $st_last, $st_dob, $st_phone, $email, $st_uni, $st_prog, $pswd, $pswdConfirm, $st_height, $st_weight, $st_sex, $st_blood, $st_pre) {
    $result;

    if(empty($st_first) || empty($st_last) || empty($st_dob) || empty($st_phone) || empty($email)  || empty($st_uni) || empty($st_prog)|| empty($pswd) || empty($pswdConfirm) || empty($st_height) || empty($st_weight) || empty($st_sex) || empty($st_blood) || empty($st_pre)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// CHECKS EMPTY INPUT (SIGN UP DOC)
function emptyInputdSignup($dr_first, $dr_last, $dr_sex, $dr_dob, $email, $dr_spec, $dept_id, $pswd, $pswdConfirm) {
    $result;

    if(empty($dr_first) || empty($dr_last) || empty($dr_sex) || empty($dr_dob) || empty($email) || empty($dr_spec) || empty($dept_id) || empty($pswd) || empty($pswdConfirm)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// CHECKS EMPTY INPUT (LOGIN)
function emptyInputLogin($email, $pswd) {
    $result;

    if(empty($email) || empty($pswd)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}


// CHECKS EMPTY INPUT (BOOK)
function emptyInputBook($dept_id, $app_category, $app_date, $app_note) {
    $result;

    if(empty($dept_id) || empty($app_category) || empty($app_date) || empty($app_note)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// CHECKS EMPTY INPUT (DEPT)
function emptyInputDept($dept_name, $dept_loc, $dept_phone) {
    $result;

    if(empty($dept_name) || empty($dept_loc) || empty($dept_phone)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// CHECKS EMPTY INPUT (APP EDIT)
function emptyInputApp($dr_id, $app_stat) {
    $result;

    if(empty($dr_id) || empty($app_stat)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// CHECKS BAD EMAIL
function invalidEmail($email) {
        $result;
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
    
        return $result;
}

// CHECKS MISMATCHED PASSWORD
function matchPswd($pswd, $pswdConfirm) {
    $result;

    if ($pswd !== $pswdConfirm) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// CHECKS EXISTING EMAIL (STUDENT)
function existAcc($con, $email) {
    $sql = "SELECT * FROM studentlog WHERE st_email = ?;";
    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../ssign.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// CHECKS EXISTING EMAIL (DOC)
function existDoc($con, $email) {
    $sql = "SELECT * FROM doctorlog WHERE dr_email = ?;";
    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dsign.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// CREATES ACCOUNT (STUDENT)
function createUser($con, $st_first, $st_last, $st_dob, $st_phone, $email, $st_uni, $st_prog, $pswd, $st_height, $st_weight, $st_sex, $st_blood, $st_pre) {
    $sql = "INSERT INTO studentlog (st_first, st_last, st_dob, st_phone, st_email, st_uni, st_prog, st_pswd, st_height, st_weight, st_sex, st_blood, st_pre) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../ssign.php?error=stmtfailed");
        exit();
    }

    $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT); // ENCRYPTS PASSWORD

    mysqli_stmt_bind_param($stmt, "sssssssssssss", $st_first, $st_last, $st_dob, $st_phone, $email, $st_uni, $st_prog, $hashedPswd, $st_height, $st_weight, $st_sex, $st_blood, $st_pre);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../slog.php");
}

// CREATES ACCOUNT (DOC)
function createDoc($con, $email, $pswd, $dr_first, $dr_last, $dr_sex, $dr_dob, $dr_spec, $dept_id) {
    $sql = "INSERT INTO doctorlog (dr_email, dr_pswd, dr_first, dr_last, dr_sex, dr_dob, dr_spec, dept_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dsign.php?error=stmtfailed");
        exit();
    }

    $hashedPswd = password_hash($pswd, PASSWORD_DEFAULT); // ENCRYPTS PASSWORD

    mysqli_stmt_bind_param($stmt, "ssssssss", $email, $hashedPswd, $dr_first, $dr_last, $dr_sex, $dr_dob, $dr_spec, $dept_id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../dlog.php");
}

// LOGIN ACCOUNT (STUDENT)
function loginUser($con, $email, $pswd) {
    $accExist = existAcc($con, $email);

    // CHECKS NONEXISTENT EMAIL
    if ($accExist === false) {
        header("location: ../slog.php?error=bademail");
        exit();
    }

    $pswdHashed = $accExist["st_pswd"];
    $checkPswd = password_verify($pswd, $pswdHashed);

    // CHECKS INCORRECT PASSWORD
    if ($checkPswd === false) {
        header("location: ../slog.php?error=badlogin");
        exit();
    }
    else if ($checkPswd === true) {
        session_start();
        $_SESSION["st_id"] = $accExist["st_id"];

        header("location: ../sindex.php");
        exit();
    }
}

// LOGIN ACCOUNT (DOC)
function loginDoc($con, $email, $pswd) {
    $accExist = existDoc($con, $email);

    // CHECKS NONEXISTENT EMAIL
    if ($accExist === false) {
        header("location: ../dlog.php?error=bademail");
        exit();
    }

    $pswdHashed = $accExist["dr_pswd"];
    $checkPswd = password_verify($pswd, $pswdHashed);

    // CHECKS INCORRECT PASSWORD
    if ($checkPswd === false) {
        header("location: ../dlog.php?error=badlogin");
        exit();
    }
    else if ($checkPswd === true) {
        session_start();
        $_SESSION["dr_id"] = $accExist["dr_id"];

        header("location: ../dindex.php");
        exit();
    }
}

// ADD NEW BOOKING
function inputBook($con, $id, $dept_id, $app_category, $app_date, $app_note) {
    $sql = "INSERT INTO applog (st_id, dept_id, app_category, app_date, app_note) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sbook.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $id, $dept_id, $app_category, $app_date, $app_note);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../srecord.php");
}

// ADD NEW DEPT
function inputDept($con, $dept_name, $dept_loc, $dept_phone) {
    $sql = "INSERT INTO deptlog (dept_name, dept_loc, dept_phone) VALUES (?, ?, ?);";

    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../ddeptadd.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $dept_name, $dept_loc, $dept_phone);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../ddept.php");
}

// EDIT DEPT
function editDept($con, $dept_id, $dept_name, $dept_loc, $dept_phone) {
    $sql = "UPDATE deptlog SET dept_name ='". $dept_name . "', dept_loc ='" . $dept_loc . "', dept_phone='" . $dept_phone . "' WHERE dept_id='" . $dept_id . "'";
    
    if (!mysqli_query($con, $sql)) {
        header("location: ../ddeptadd.php?error=stmtfailed");
        exit();
    }
    else {
        header("location: ../ddept.php");
    }
}

// EDIT APPOINTMENT
function editApp($con, $app_id, $dr_id, $app_stat) {
    $sql = "UPDATE applog SET dr_id ='". $dr_id . "', app_stat ='" . $app_stat . "' WHERE app_id='" . $app_id . "'";
    
    if (!mysqli_query($con, $sql)) {
        header("location: ../dappupdate.php?error=stmtfailed");
        exit();
    }
    else {
        header("location: ../drecord.php");
    }
}