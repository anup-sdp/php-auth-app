<?php
// file: includes/login.inc.php
// login form submission handler

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $pwd = $_POST["pwd"] ?? "";

    require_once "../Dbh.php";
    require_once "../Login.php";

    $login = new Login($username, $pwd);
    $login->loginUser();    
} else {
    header("Location: ../login-page.php?error=invalidrequest");
    exit();
}

/*
  .inc.php files:
  file that contains reusable backend code intended to be included in other files 
  (via include, require, require_once, or include_once) 
  rather than being directly viewed by a user in the browser.
*/