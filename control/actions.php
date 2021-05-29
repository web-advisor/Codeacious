<?php
include_once("functions.php");
$error = "";
$company="Ipsum Website";
$company_mail="course.sharing101@gmail.com";

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
                $_SESSION['name']=$row['name'];
                $_SESSION['email']=$row['email'];
                $_SESSION['progress']=0;
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
            $_SESSION['name']=$_POST['username'];
            $_SESSION['email']=$_POST['email'];
            $_SESSION['progress']=0;
            
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
        echo(1);
    }
}


// Saving Full Name to the Database
if($_GET["process"]=="fullname"){
    $name=explode(" ",$_POST['fullname']);
    if(count($name)>1){
        $fname=$name[0];
        $lname=$name[count($name)-1];
    }else{
        $fname=$_POST['fullname'];
        $lname="";
    }

    $query="SELECT * FROM `details` WHERE `userid`='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
    $result=mysqli_query($link,$query);
    if($result && mysqli_num_rows($result)>0){
        // INSERTION of INfo into Details has already been done ! Update Operation Needed
        $sql="UPDATE `details` SET `fname`='".mysqli_real_escape_string($link,$fname)."',`lname`='".mysqli_real_escape_string($link,$lname)."' WHERE `userid`='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
        $resultsql=mysqli_query($link,$sql);
        if($resultsql){
            $_SESSION['fname']=$fname;
            $_SESSION['lname']=$lname;
            $_SESSION['progress']+=25;
            echo 1;
        }else{
            // print_r(mysqli_error($link));
            $error="Something Gone Wrong ! It's not you, it's US..<br>Please try again later";
        }
    }else{
        // New Insertion to be done in Details Relation
        $insert="INSERT INTO `details` "."(`userid`,`fname`,`lname`,`phone`,`address`,`city`,`state`,`country`,`pin`)"." VALUES "."('".mysqli_real_escape_string($link,$_SESSION['id'])."','".mysqli_real_escape_string($link,$fname)."','".mysqli_real_escape_string($link,$lname)."','phone','address','city','state','country','pin')";
        $resultInsert=mysqli_query($link,$insert);
        if($resultInsert){
            $_SESSION['fname']=$fname;
            $_SESSION['lname']=$lname;
            $_SESSION['progress']=25;
            echo 1;
        }else{
            // echo(mysqli_error($link));
            $error="Something Gone Wrong ! It's not you, it's US..<br>Please try again later";
        }
    }
    if ($error != "") {
        echo $error;
        exit();
    }
}



// Saving Phone to the Database
if($_GET["process"]=="phone"){
    $query="SELECT * FROM `details` WHERE `userid`='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
    $result=mysqli_query($link,$query);
    if($result && mysqli_num_rows($result)>0){
        // INSERTION of INfo into Details has already been done ! Update Operation Needed
        $sql="UPDATE `details` SET `phone`='".mysqli_real_escape_string($link,$_POST['phone'])."' WHERE `userid`='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
        $resultsql=mysqli_query($link,$sql);
        if($resultsql){
            $_SESSION['phone']=$_POST['phone'];
            $_SESSION['progress']+=25;
            echo 1;
        }else{
            // print_r(mysqli_error($link));
            $error="Something Gone Wrong ! It's not you, it's US..<br>Please try again later";
        }
    }else{
        // New Insertion to be done in Details Relation
        $insert="INSERT INTO `details` "."(`userid`,`fname`,`lname`,`phone`,`address`,`city`,`state`,`country`,`pin`)"." VALUES "."('".mysqli_real_escape_string($link,$_SESSION['id'])."','fname','lname','".mysqli_real_escape_string($link,$_POST['phone'])."','address','city','state','country','pin')";
        $resultInsert=mysqli_query($link,$insert);
        if($resultInsert){
            $_SESSION['phone']=$_POST['phone'];
            $_SESSION['progress']=25;
            echo 1;
        }else{
            // echo(mysqli_error($link));
            $error="Something Gone Wrong ! It's not you, it's US..<br>Please try again later";
        }
    }
    if ($error != "") {
        echo $error;
        exit();
    }
}

// GEtting Code : 
$code="";
if($_GET['process']=="getcode"){
    if(isset($_SESSION['id'])) $id=$_SESSION['id'];
    
    $sql="SELECT * FROM `users` WHERE `id`='".mysqli_real_escape_string($link,$id)."' LIMIT 1";
    $result=mysqli_query($link,$sql);
    if($result && mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_assoc($result);

        $code=substr(md5($row['code']),2,8);
        $_SESSION['code']=$code;

        $to = $row['email'];
        $subject = "Code for Verification of your Email @".$company;

        $message = 'Dear '.$row['name'].',<br>';
        $message .= "We welcome you to be part of family<br>Your Code for Verification of your membership is <strong>".$code."</strong>.<br>";
        $message .= "Regards,<br>".$company;

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From:'.$company_mail. "\r\n";
        $headers .= 'Cc:'.$company_mail . "\r\n";

        if(!mail($to, $subject, $message, $headers)){
            echo 1;
        }else{
            $error="Mail Couldn't be sent ! Make sure your Email ID is correct";
        }
    }else{
        $error="Server Error Please try Later!!";
    }    
    if ($error != "") {
        echo $error;
        exit();
    }
}

//  VErifying Code
if($_GET["process"]=="verifycode"){
    if($_POST["code"]==$_SESSION['code']){
        $_SESSION["verified"]=true;
        $_SESSION["progress"]+=25;
        echo 1;
    }else{
        $error="Code Doesn't Match ! Come Back after some time .";
    }
    if ($error != "") {
        echo $error;
        exit();
    }
}


// Saving Full Address to the Database
if($_GET["process"]=="address"){
    if (!$_POST["address"]) {
        $error .= "<br>An Address Line is required. ";
    }
    if (!$_POST["city"]) {
        $error .= "<br>City is required. ";
    } 
    if (!$_POST["state"]) {
        $error .= "<br>State is required. ";
    }
    if (!$_POST["country"]) {
        $error .= "<br>Country is required. ";
    }
    if (!$_POST["pin"]) {
        $error .= "<br>PIN is required. ";
    }
    if ($error != "") {
        echo "Your Form has the following Problem(s) : " . $error;
        exit();
    }
    $query="SELECT * FROM `details` WHERE `userid`='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
    $result=mysqli_query($link,$query);
    if($result && mysqli_num_rows($result)>0){
        // INSERTION of INfo into Details has already been done ! Update Operation Needed
        $sql="UPDATE `details` SET `address`='".mysqli_real_escape_string($link,$_POST["address"])."',`city`='".mysqli_real_escape_string($link,$_POST['city'])."',`state`='".mysqli_real_escape_string($link,$_POST["state"])."',`country`='".mysqli_real_escape_string($link,$_POST['country'])."',`pin`='".mysqli_real_escape_string($link,$_POST['pin'])."' WHERE `userid`='".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
        $resultsql=mysqli_query($link,$sql);
        if($resultsql){
            $_SESSION['address']=$_POST['address'];
            $_SESSION['city']=$_POST['city'];
            $_SESSION['state']=$_POST['state'];
            $_SESSION['country']=$_POST['country'];
            $_SESSION['pin']=$_POST['pin'];
            $_SESSION['progress']+=25;
            echo 1;
        }else{
            $error="Something Gone Wrong ! It's not you, it's US..<br>Please try again later";
        }
    }else{
        // New Insertion to be done in Details Relation
        $insert="INSERT INTO `details` "."(`userid`,`fname`,`lname`,`phone`,`address`,`city`,`state`,`country`,`pin`)"." VALUES "."('".mysqli_real_escape_string($link,$_SESSION['id'])."','fname','lname','phone','".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['city'])."','".mysqli_real_escape_string($link,$_POST['state'])."','".mysqli_real_escape_string($link,$_POST['country'])."','".mysqli_real_escape_string($link,$_POST['pin'])."')";
        $resultInsert=mysqli_query($link,$insert);
        if($resultInsert){
            $_SESSION['address']=$_POST['address'];
            $_SESSION['city']=$_POST['city'];
            $_SESSION['state']=$_POST['state'];
            $_SESSION['country']=$_POST['country'];
            $_SESSION['pin']=$_POST['pin'];
            $_SESSION['progress']=25;
            echo 1;
        }else{
            // echo(mysqli_error($link));
            $error="Something Gone Wrong ! It's not you, it's US..<br>Please try again later";
        }
    }
    if ($error != "") {
        echo $error;
        exit();
    }
}

