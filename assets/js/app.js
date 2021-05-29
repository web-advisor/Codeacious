// ---- jS File for Dynamic Page

document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'interactive') {
        //  document.hide();
        document.getElementById('load').style.visibility = "visible";
    } else if (state == 'complete') {
        setTimeout(function () {
            document.getElementById('load').style.visibility = "hidden";
        }, 1000);
    }
}

// -------------------- Logging In Form 
var field = document.querySelector('[id="name"]');

field.addEventListener('keypress', function (event) {
    var key = event.keyCode;
    if (key === 32) {
        event.preventDefault();
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
})

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
});

$("#sign-up-instead").click(function () {
    $("#log-in").slideUp();
    $("#sign-up").slideDown();
});


//  ------------ SlideShow ------------
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}

// Get Code Hides and Verify and Input Displays
$("#email-div .get-code-button").click(function () {
    
});