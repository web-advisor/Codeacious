<?php
$_SESSION['progress'] = 0;
?>


<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides faded" id="fullname-div">
        <div class="input-label">Hi <strong><?php echo $_SESSION['id']; ?></strong>,
            <br>
            Let's complete your profile, starting with your Full Name.
        </div>
        <input autocomplete="off" type="text" class="w3-input w3-animate-input profile-input" id="fullname" style="width:15vw" name="fullname">
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button">Save</button>
        <div class="numbertext">1 / 4</div>
    </div>

    <div class="mySlides faded" id="phone-div">
        <div class="input-label">Hi <strong><?php echo "Full Name/Username"; ?></strong>,
            <br>
            <?php
            if ($_SESSION['progress'] > 0) {
                echo "Let's Connect ! Contact Details here .";
            } else {
                echo "Let's start with Contact details";
            }
            ?>
        </div>
        <input autocomplete="off" type="number" class="w3-input w3-animate-input profile-input" id="phone" style="width:15vw" name="phone" data-toggle="tooltip" data-placement="left" title="Mobile Number here">
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button">Save</button>
        <div class="numbertext">2 / 4</div>
    </div>

    <div class="mySlides faded" id="email-div">
        <div class="input-label">Hi <strong><?php echo "emailId"; ?></strong>,
            <br>
            Time to get Verified ..
        </div>
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button" data-toggle="tooltip" data-placement="left" title="A Verification Code will be sent to your registered Email ID">Verify</button>
        <input autocomplete="off" type="text" class="w3-input w3-animate-input profile-input" id="otp" style="width:15vw" name="otp">
        <div class="numbertext">3 / 4</div>
    </div>

    <div class="mySlides faded" id="address-div">
        <div class="input-label">Hi <strong><?php echo "emailId"; ?></strong>,
            <br>
            A Sweet place called Home. Enter your Address
        </div>
        <form class="form-inline profile-input">
            <input type="text" class="form-control mb-2 mr-sm-2" id="address" placeholder="Address Line 1">
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="city" placeholder="City">
            </div>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="state" placeholder="State">
            </div>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="country" placeholder="Country">
            </div>
            <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="zip" placeholder="ZIP">
            </div>
        </form>
        <button class="w3-btn w3-white w3-border w3-border-red w3-text-red w3-round-large submit-button">Save</button>
        <div class="numbertext">4 / 4</div>
    </div>

    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<?php
if (isset($_SESSION['progress']) && $_SESSION['progress'] > 0) { ?>
    <div class="progress">
        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:<?php echo $_SESSION['progress']; ?>%" aria-valuenow="<?php echo $_SESSION['progress']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $_SESSION['progress']; ?>%</div>
    </div>
<?php
}
?>