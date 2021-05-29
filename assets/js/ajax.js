//  Taking Request. Rendering response from Model. Resulting Changes in the View.

// Signing Up Request
$("#sign-up-submit").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=signup",
        data: "username=" + $("#name").val() + "&email=" + $("#sign-up-email").val() + "&password=" + $("#sign-up-password").val() + "&keepLoggedIn=" + $("#keep-logged-in").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                window.location.assign("index.php?page=edit-profile");
            } else {
                $("#sign-up .error").html(result).show();
            }
        }
    })
});

// Logging IN process
$("#log-in-submit").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=login",
        data: "user=" + $("#log-in-user").val() + "&password=" + $("#log-in-password").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                window.location.assign("index.php?page=edit-profile");
            } else {
                $("#log-in .error").html(result).show();
            }
        }
    })
});

$("#name").keyup(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=namecheck",
        data: "username=" + $("#name").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                if ($("#name").val() === "" || $("#name").val().length <= 4) {
                    $("#sign-up .success").hide();
                } else {
                    $("#sign-up .success").html("<strong>'" + $("#name").val() + "'</strong> is available. ").show();
                }
                $("#sign-up .warning").hide();
            } else {
                if ($("#name").val() === "" || $("#name").val().length <= 4) {
                    $("#sign-up .warning").hide();
                } else {
                    $("#sign-up .warning").html("<strong>'" + $("#name").val() + "'</strong> is already taken. ").show();
                }
                $("#sign-up .success").hide();
            }
        }
    })
});

// ------------ Saving fullname div info
$("#fullname-div .submit-button").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=fullname",
        data: "fullname=" + $("#fullname").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                showSlides(1);
                window.location.assign("index.php?page=edit-profile");
            } else {
                $("#finishing-div .error").html(result).show();
            }
        }
    })
});

// ------------ Saving phone div info
$("#phone-div .submit-button").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=phone",
        data: "phone=" + $("#phone").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                showSlides(2);
                window.location.assign("index.php?page=edit-profile");
            } else {
                $("#phone-div .error").html(result).show();
            }
        }
    })
});


// ------------ Getting Email Code for Verification
$("#email-div .get-code-button").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=getcode",
        success: function (result) {
            if (result == 1) {
                $("#email-div .profile-input").slideDown();
                $("#email-div .submit-button").slideDown();
                $("#email-div .get-code-button").slideUp();
            } else {
                $("#email-div .get-code-button").slideUp();
                $("#email-div .error").html(result).show();
            }
        }
    })
});

// ------------ Verification of Code ------------
$("#email-div .submit-button").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=verifycode",
        data: "code=" + $("#code").val(),
        success: function (result) {
            if (result == 1) {
                $("#email-div .profile-input").slideUp();
                $("#email-div .submit-button").slideUp();
                $("#email-div .success").html("Your Email ID is Verified").show();
                window.location.assign("index.php?page=edit-profile");
            } else {
                $("#email-div .error").html(result).show();
            }
        }
    })
});


// ------------ Saving Addresss div info
$("#address-div .submit-button").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=address",
        data: "address=" + $("#address").val()+"&city=" + $("#city").val()+"&state=" + $("#state").val()+"&country=" + $("#country").val()+"&pin=" + $("#zip").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                showSlides(4);
                window.location.assign("index.php?page=edit-profile");
            } else {
                $("#address-div .error").html(result).show();
            }
        }
    })
});