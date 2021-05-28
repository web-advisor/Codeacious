<?php
include_once("functions.php");
$error = "";

// Log In action ----------------------------
if($_GET["process"]=="login"){

    // Form Validation ----  
    if(!$_POST["user"]){
        $error.="<br>An Email Or Username is required. ";
    }
    if(!$_POST["password"]){
        $error.="<br>A Password is required. ";
    }
    if($error!=""){
        echo $error;
        exit();
    }

        // Signing in the user after checking ------ 
        $queryLogIn="SELECT * FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['user'])."' OR `name`='".mysqli_real_escape_string($link,$_POST['user'])."' LIMIT 1";
        $resultLogIn=mysqli_query($link,$queryLogIn);
        if($resultLogIn && mysqli_num_rows($resultLogIn) > 0){
            $row=mysqli_fetch_assoc($resultLogIn);
            if($row['password']==md5(md5($row['id']).$_POST['password'])){
                $id=$row['id'];
                $_SESSION['id']=$id;
                echo 1;
            }else{
                $error="Could not find that Username-Password Combination ! Please try Again !";
            }
        }else{
            $error="Could not find the Username or Email in the database.";
        }
    
    if($error!=""){
        echo $error;
        exit();
    }
}


// Sign Up Action ---------------------------
if ($_GET["process"] == "signup") {

    //  Form Validation ------------
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

    // Checking if the Signing Up input email is already taken ------
    $sql = "SELECT * FROM `users` WHERE `email` = '" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $error = "This Email id is already taken !";
    } else {
        // Siging up if no user found with entered email ----------
        $query = "INSERT INTO `users` "."(`name`,`email`,`password`,`code`)"." VALUES "."('" . mysqli_real_escape_string($link, $_POST['username']) . "','" . mysqli_real_escape_string($link, $_POST['email']) . "','" . mysqli_real_escape_string($link, $_POST['password']) . "','" . mysqli_real_escape_string($link, substr(md5(rand(1,999)),0,6))."')";
        $resultQuery=mysqli_query($link, $query);
        if ($resultQuery) {
            $id = mysqli_insert_id($link);
            $_SESSION['id'] = $id;
            // Password Hashing --------------------- 
            $query = "UPDATE `users` SET `password` = '" . md5(md5($_SESSION['id']) . $_POST['password']) . "' WHERE `id`=" . $id . " LIMIT 1";
            mysqli_query($link, $query);
            echo 1;
        } else {
            $error = "Couldn't Create User - Please try again later ";
        }
    }
    if ($error != "") {
        echo $error;
        exit();
    }
}

// Name Check in the database if it is already taken ---------------
if($_GET["process"]=="namecheck"){
    $query="SELECT `name` FROM `users` WHERE `name` = '".mysqli_real_escape_string($link,$_POST['username'])."' LIMIT 1";
    $result=mysqli_query($link,$query);
    if($result && mysqli_num_rows($result)>0){
        echo 0;
    }else{               
        echo 1;
    }
}