//  Taking Request. Rendering response from Model. Resulting Changes in the View.

// Signing Up Request
$("#sign-up-submit").click(function () {
    $.ajax({
        type: "POST",
        url: "control/actions.php?process=signup",
        data: "username=" + $("#name").val() + "&email=" + $("#sign-up-email").val() + "&password=" + $("#sign-up-password").val() + "&keepLoggedIn=" + $("#keep-logged-in").val() ,
        success: function (result) {
            // alert(result);
            if (result == 1) {
                window.location.assign("?index.php");
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
        url:"control/actions.php?process=login",
        data: "user=" + $("#log-in-user").val() + "&password=" + $("#log-in-password").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {
                window.location.assign("?index.php");
            } else {
                $("#log-in .error").html(result).show();
            }
        }
    })
});

$("#name").keyup(function(){
    $.ajax({
        type: "POST",
        url:"control/actions.php?process=namecheck",
        data: "username=" + $("#name").val(),
        success: function (result) {
            // alert(result);
            if (result == 1) {          
                if($("#name").val()==="" || $("#name").val().length<=4){
                    $("#sign-up .success").hide();
                }else{  
                    $("#sign-up .success").html("<strong>'"+$("#name").val()+"'</strong> is available. ").show();
                }
                $("#sign-up .warning").hide();
            } else {
          
                if($("#name").val()==="" || $("#name").val().length<=4){
                    $("#sign-up .warning").hide();
                }else{    
                    $("#sign-up .warning").html("<strong>'"+$("#name").val()+"'</strong> is already taken. ").show();
                }
                $("#sign-up .success").hide();
            }
        }
    })
});