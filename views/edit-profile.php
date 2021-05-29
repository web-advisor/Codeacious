<!--  File Resposible for Profile Completion === -->

<?php 
    include_once("control/details.php");    
?>
<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides faded" id="fullname-div">
        <div class="input-label">Hi <strong><?php if (isset($name) && $name!="") echo $name; ?></strong>,
            <br>
            Let's complete your profile, starting with your Full Name.
        </div>
        <input autocomplete="off" type="text" class="w3-input w3-animate-input profile-input" id="fullname" name="fullname" value="<?php if (isset($fname) && $fname!="") {
                echo $fname . " " . $lname;
            } ?>">
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button">Save</button>
        <div class="alert alert-danger error" role="alert">
            <?php
            if (isset($error) && $error != "") {
                echo $error;
            }
            ?>
        </div>
        <div class="numbertext">1 / 4</div>
    </div>

    <div class="mySlides faded" id="phone-div">

        <div class="input-label">Hi <strong><?php if (isset($name) && $name!="") echo $name; ?></strong>,
            <br>
            <?php
            if (isset($progress) && $progress > 0) {
                echo "Let's Connect ! Contact Details here .";
            } else {
                echo "Let's start with Contact details";
            }
            ?>
        </div>
        <input autocomplete="off" type="number" class="w3-input w3-animate-input profile-input" id="phone" name="phone" data-toggle="tooltip" data-placement="left" title="Mobile Number here" value="<?php if (isset($phone) && $phone!="") {
                echo $phone;
            } ?>">
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button">Save</button>
        <div class="numbertext">2 / 4</div>
    </div>

    <div class="mySlides faded" id="email-div">
        <div class="input-label">Hi <strong><?php if (isset($email) && $email!="") echo $email; ?></strong>,</div>
        <?php if(isset($_SESSION['verified']) && $_SESSION["verified"]) echo '<div class="alert alert-succes success" style="display:block;" role="alert">Your Email ID is Verified.</div>'; else echo '<div class="input-label"><br> Time to get Verified ..  
        </div>'; ?>

    <?php    if(isset($_SESSION['verified']) && $_SESSION["verified"]) {} else { ?>
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large get-code-button" data-toggle="tooltip" data-placement="left" title="A Verification Code will be sent to your registered Email ID. Do check your SPAM Folder.">Get Code</button>
        <input autocomplete="off" type="text" class="w3-input w3-animate-input profile-input" id="code" name="code"  value="<?php if (isset($_SESSION["code"])) {
                echo $_SESSION["code"];
            } ?>">
        <button class="w3-btn w3-white w3-border w3-border-green w3-text-green w3-round-large submit-button">Verify</button>
        <div class="alert alert-danger error" role="alert">
            <?php
            if (isset($error) && $error != "") {
                echo $error;
            }
            ?>
        </div>
        <div class="alert alert-succes success" role="alert"></div>
        <?php } ?>
        <div class="numbertext">3 / 4</div>
    </div>


    <div class="mySlides faded" id="address-div">
        <div class="input-label">
            A Sweet place called Home. Enter your Address
        </div>
        <form class="form-inline profile-input">
            <input type="text" class="form-control mb-2 mr-sm-2" id="address" placeholder="Address Line" value="<?php if (isset($address)&& $address!="") {
                echo $address;
            } ?>">
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="city" placeholder="City" value="<?php if (isset($city)&& $city!="") {
                echo $city;
            } ?>">
            </div>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="state" placeholder="State" value="<?php if (isset($state)&& $state!="") {
                echo $state;
            } ?>">
            </div>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="country" placeholder="Country" value="<?php if (isset($country)&& $country!="") {
                echo $country;
            } ?>">
            </div>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="zip" placeholder="ZIP" value="<?php if (isset($pin)&& $pin!="") {
                echo $pin;  
            } ?>">
            </div>
        </form>
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button">Save</button>
        <div class="alert alert-danger error" role="alert">
            <?php
            if (isset($error) && $error != "") {
                echo $error;
            }
            ?>
        </div>
        <div class="numbertext">4 / 4</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<?php
if (isset($progress) && $progress > 0) { ?>
    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success" id="progress" role="progressbar" style="width:<?php echo $progress; ?>%" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress; ?>%</div>
    </div>
<?php
}
?>