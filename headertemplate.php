<?php

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Own CSS -->
     <link rel="stylesheet" href="css/section.css">
     <link rel="stylesheet" href="css/themecoloroverride.css">
     <link rel="stylesheet" href="css/gallery.css">
</head>
<body>

<div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-white">
                <span>Follow Us:</span>
                <a class="btn btn-link text-light" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-link text-light" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-link text-light" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <span class="fs-5 fw-bold me-2" style="color: #393B3A;"><i class="fa fa-phone-alt me-2"></i>Call Mateo Maldo Jr.:</span>
                <span class="fs-5 fw-bold" style="color:#393B3A">+012 345 6789</span>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-light sticky-top py-0 pe-5" style="background: #393B3A !important">
    <div>
    <a href="index.php" class="navbar-brand ps-5 me-0 d-flex align-items-center" >
        
        <img src="img/logo/logo_transparent.png" alt="" srcset="" style="height: 60px; width: auto; " class="me-2"> <h1 class="m-0" style="color: #393B3A !important; font-size: 1.5rem; font-weight: bold;">HMCF Prime Corporations</h1>
    </a>
    </div>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?php if($currentPage == 'index.php'){echo 'active';} ?>">Home</a>
            <a href="equipmentcatalog.php" class="nav-item nav-link <?php if($currentPage == 'equipmentcatalog.php'){echo 'active';} ?>">Equipment Catalog</a>
            <a href="requestform.php" class="nav-item nav-link <?php if($currentPage == 'requestform.php'){echo 'active';} ?>">Equipment Request</a>
            <a href="gallery.php" class="nav-item nav-link <?php if($currentPage == 'gallery.php'){echo 'active';} ?>">Project Gallery</a>
            <a href="contactpage.php" class="nav-item nav-link <?php if($currentPage == 'contactpage.php'){echo 'active';} ?>">Contact Us</a>
        </div>
        <a href="requestform.php" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a>
    </div>
</nav>
