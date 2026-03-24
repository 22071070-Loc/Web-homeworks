<?php
session_start();

if (!isset($_SESSION["fails"])) {
    $_SESSION["fails"] = 0;
}

$user = $_POST["user"] ?? "";
$pass = $_POST["pass"] ?? "";
$msg = "";

if ($user != "" && $pass != "") {
    if ($user == "admin" && $pass == "1234") {
        $_SESSION["fails"] = 0;
        $msg = "Login successful";
    } else {
        $_SESSION["fails"]++;
        $msg = "Failed attempts: " . $_SESSION["fails"];
    }
}
?>

<form method="post">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <button type="submit">Login</button>
</form>

<div><?php echo $msg; ?></div>
