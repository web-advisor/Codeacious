<!-- File to Fetch Details of the User From Database to manage Preloaded Values and Profile Display  -->

<?php

$sql = "SELECT * FROM `users`,`details` 
    WHERE users.id=" . $_SESSION['id'] . " AND details.userid=" . $_SESSION['id'] . " LIMIT 1";
$result = mysqli_query($link, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
    $count=0;
    
    $name ??= $row['name'];
    if ($name == "name") {
        $name = "";
    }else{
        $count++;
    }

    $fname ??= $row['fname'];
    if ($fname == "fname") {
        $fname = "";
    }else{
        $count++;
    }

    $lname ??= $row['lname'];
    if ($lname == "lname") {
        $lname = "";
    }else{
        $count++;
    }

    $phone ??= $row['phone'];
    if ($phone == "phone") {
        $phone = "";
    }else{
        $count++;
    }

    $address ??= $row['address'];
    if ($address == "address") {
        $address = "";
    }else{
        $count++;
    }

    $email ??= $row['email'];
    if ($email == "email") {
        $email = "";
    }else{
        $count++;
    }

    $city ??= $row['city'];
    if ($city == "city") {
        $city = "";
    }else{
        $count++;
    }

    $state ??= $row['state'];
    if ($state == "state") {
        $state = "";
    }else{
        $count++;
    }

    $country ??= $row['country'];
    if ($country == "country") {
        $country = "";
    }else{
        $count++;
    }

    $pin ??= $row['pin'];
    if ($pin == "pin") {
        $pin = "";
    }else{
        $count++;
    }

    $progress=$count*10;

}else{
    $name="";
    $fname="";
    $lname="";
    $email="";
    $phone="";
    $address="";
    $city="";
    $state="";
    $country="";
    $pin="";
}
