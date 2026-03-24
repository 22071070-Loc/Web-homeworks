<?php
$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$message = $_POST["message"] ?? "";

if ($name == "" || $email == "" || $message == "") {
    echo "Please fill all fields";
} else {
    echo "Thank you, " . $name;
}
