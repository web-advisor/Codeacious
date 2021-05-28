<?php
include_once("functions.php");
$error = "";

if ($_GET["process"] == "signup") {
    print_r($_POST);
    if (!$_POST["username"]) {
        $error .= "<br>A Username is required. ";
    }
    if (!$_POST["email"]) {
        $error .= "<br>An Email is required. ";
    } else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        $error .= "<br>Entered Email Address is Invalid.";
    }
    if (!$_POST["password"]) {
        $error .= "<br>A Password is required. ";
    }
    if ($error != "") {
        echo "Your Form has the following Problem(s) : " . $error;
        exit();
    }

    // Checking if the Signing Up input email is already taken
    $sql = "SELECT * FROM `users` WHERE `email` = '" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $error = "This Email id is already taken !";
    } else {
        // Siging up if no errors found
        $query = "INSERT INTO `users` "."(`name`,`email`,`password`,`code`)"." VALUES "."('" . mysqli_real_escape_string($link, $_POST['username']) . "','" . mysqli_real_escape_string($link, $_POST['email']) . "','" . mysqli_real_escape_string($link, $_POST['password']) . "','" . mysqli_real_escape_string($link, substr(md5(rand(1,999)),0,6))."')";
        $resultQuery=mysqli_query($link, $query);
        if ($resultQuery) {
            $_SESSION['id'] = mysqli_insert_id($link);
            // Password Hashing
            $query = "UPDATE `users` SET `password` = '" . md5(md5($_SESSION['id']) . $_POST['password']) . "' WHERE `id`=" . $_SESSION['id'] . " LIMIT 1";
            mysqli_query($link, $query);
            echo 1;
        } else {
            // print_r(mysqli_error($link));
            $error = "Couldn't Create User - Please try again later ";
        }
    }
    if ($error != "") {
        echo $error;
        exit();
    }
}
