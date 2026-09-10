<?php
// file: auth_system/includes/signup.inc.php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $pwd = $_POST["pwd"] ?? "";

    require_once "../Dbh.php";
    require_once "../Signup.php";

    $signup = new Signup($username, $pwd);
    if ($signup->signupUser()) {
        header("Location: ../index.php?signup=success");
        exit();
    }
    header("Location: ../index.php?error=signuperror");
    exit(); // die();
} else {
    header("Location: ../index.php?error=invalidrequest");
    exit();
}

