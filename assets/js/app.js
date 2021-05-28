document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'interactive') {
        //  document.hide();
         document.getElementById('load').style.visibility="visible";
    } else if (state == 'complete') {
        setTimeout(function(){
           document.getElementById('load').style.visibility="hidden";
        },1000);
    }
}

$("#sign-up-button").click(function () {
    $(".masthead").slideUp(1500, function () {
        $("#sign-up").slideDown();
        $("#sign-up").addClass("w3-container w3-center w3-animate-zoom");
        $("#log-in").slideUp();
    });
});

$("#log-in-button").click(function () {
    $(".masthead").slideUp(1500, function () {
        $("#log-in").slideDown();
        $("#log-in").addClass("w3-container w3-center w3-animate-zoom");
        $("#sign-up").slideUp();
    });
});

$("#log-in-instead").click(function () {
    $("#sign-up").slideUp();
    $("#log-in").slideDown();
    // $("#log-in").addClass("w3-container w3-center w3-animate-zoom");
});

$("#sign-up-instead").click(function () {
    $("#log-in").slideUp();
    $("#sign-up").slideDown();
    // $("#log-in").addClass("w3-container w3-center w3-animate-zoom");
});

