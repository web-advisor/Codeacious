<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Amar Sinha -> https://github.com/web-advisor">
    <meta name="keywords" content="codeacious, the coding ninjas, startup builder, web development project">
    <meta name="description" content="We take pride in the fact that we have been serving startups to enterprises for over 9 years now. We work closely with our clients to understand their business problems and apply the best practices to implement, support, and manage their technology. ">

    <!-- Logo -->
    <link rel="icon" href="assets/images/logo/logo.svg">

    <!-- Title -->
    <title>Ipsum Web</title>

    <!-- stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" version="1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style-for-tablet.css" version="1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style-for-mobile.css" version="1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/home.css" version="1.0">

    <!-- Font Awesome icons -->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />

</head>

<body id="page-top">
    <div id="load">
        <img src="assets/images/logo/logo.svg" class="w3-spin" alt="Loading....">
        <p>Loading... </p>
    </div>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container px-5">
            <a class="navbar-brand" href="index.php"><img src="assets/images/logo-light.svg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['id'])) { ?>
                        <button type="button" id="log-out-button" class="btn btn-md btn-pill btn-default" style="cursor:pointer;"><a href="?process=logout" style="text-decoration:none; font-weight:bolder; color:#fff;">Logout</a></button>
                    <?php } else {   ?>
                        <li class="nav-item" id="sign-up-button"><a class="nav-link" href="#">Sign Up</a></li>
                        <li class="nav-item" id="log-in-button"><a class="nav-link" href="#">Log In</a></li>
                    <?php  }  ?>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Sign Up Form Div -->
    <div id="sign-up">
        <form method="post">
            <div class="error alert alert-danger" role="alert">
                <?php
                if (isset($error) && $error != "") {
                    echo $error;
                }
                ?>
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input class="w3-input w3-animate-input" type="text" style="width:20vw" id="name">
            </div>
            <div class="form-group">
                <label for="sign-up-email">Email address</label>
                <input type="email" class="w3-input w3-animate-input" style="width:20vw" id="sign-up-email" name="sign-up-email">
            </div>
            <div class="form-group">
                <label for="sign-up-password">Password</label>
                <input type="password" class="w3-input w3-animate-input" style="width:20vw" id="sign-up-password" name="sign-up-password">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="keep-logged-in" value="1">
                    <label class="form-check-label" for="keep-logged-in">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="button" id="sign-up-submit" class="btn btn-primary">Sign Up</button>
            <a href="#" id="log-in-instead">Log In Instead</a>
        </form>
    </div>

    <!-- Sign Up Form Div -->
    <div id="log-in" class="w3-container w3-center w3-animate-zoom">
        <form>
            <div class="error alert alert-danger" role="alert">
                <?php
                    if (isset($error) && $error != "") {
                        echo $error;
                    }
                ?>
            </div>
            <div class="form-group">
                <label for="log-in-user">Username or Email Address</label>
                <input type="text" class="w3-input w3-animate-input" id="log-in-user" style="width:20vw" name="log-in-user">
            </div>
            <div class="form-group">
                <label for="log-in-password">Password</label>
                <input type="password" class="w3-input w3-animate-input" id="log-in-password" style="width:20vw" name="log-in-password">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="keep-logged-in" value="1">
                    <label class="form-check-label" for="keep-logged-in">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="button" id="log-in-submit" class="btn btn-primary">Log In</button>
            <a href="#" id="sign-up-instead">Sign Up Instead</a>
        </form>
    </div>