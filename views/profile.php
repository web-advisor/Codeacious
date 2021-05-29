<!--  Profile Page with Fetched  Values -->

<?php
include_once("control/details.php");
?>

<div class="container-fluid details">
    <div class="row">
        <div class="container col-md-4" id="left-div">
            <div class="row" id="username-div">
                <?php if (isset($fname) && $fname != "") echo $fname; ?>
                <?php if (isset($lname) && $lname != "") echo $lname; ?> 
            </div>
            <div class="row" id="name-div">
                <div class="col-md-6" style="font-size:50%;color:tomato">
                    Known As
                </div>
                <div class="col-md-6">
                    <?php if (isset($name) && $name != "") echo $name; ?>
                </div>
            </div>
        </div>


        <div class="col-md-8 container" id="right-div">
            <h1>Contact Info</h1>
            <div class="row" id="email-text">
                <?php if (isset($email) && $email != "") echo $email; ?>
            </div>
            <div class="row" id="phone-text">
                <?php if (isset($phone) && $phone != "") echo $phone; ?>
            </div>
            <div class="row" id="address-text">
                <div class="col-md-3">
                    <?php if (isset($address) && $address != "") echo $address; ?>
                </div>
                <div class="col-md-3">
                    <?php if (isset($city) && $city != "") echo $city; ?>
                </div>
                <div class="col-md-2">
                    <?php if (isset($state) && $state != "") echo $state; ?>
                </div>
                <div class="col-md-2">
                    <?php if (isset($country) && $country != "") echo $country; ?>
                </div>
                <div class="col-md-2">
                    <?php if (isset($pin) && $pin != "") echo $pin; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="index.php?page=edit-profile"><img src="assets/images/settings.gif" class="settings"></a>