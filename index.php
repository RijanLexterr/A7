<!DOCTYPE html>
<html lang="en">

<?php require 'headertemplate.php'; ?>

<style>

    body, h1, p {
            margin: 0;
            padding: 0;
        }
        
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 3.5rem;
        height: 3.5rem;
        background-color: #F8D838 !important;
        border: 15px solid #F8D838 !important;
        border-radius: 3.5rem;
    }

    .hero {
            position: relative;
            width: 100%;
            height: 100vh; /* Takes full viewport height */
            background-image: url('./img/frommessenger_img/Bulldozer/656916578_955245553667921_3689539520457191939_n.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center; /* Vertically center the content */
            color: white; /* Default text color */
            font-family: Arial, sans-serif; /* A clear sans-serif font */
        }

        /* Dark overlay for text readability */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* 40% opaque black */
            z-index: 1;
        }

        /* --- Content Container (for the left-side text and buttons) --- */
        .hero-content {
            position: relative;
            z-index: 2; /* Place above the dark overlay */
            width: 90%;
            max-width: 1200px; /* Limits content width on large screens */
            margin: 0 auto; /* Horizontally centers the container */
            padding-left: 20px;
        }

        /* --- Heading (H1) Styling --- */
        .hero-title {
            font-size: 3rem; /* Large and impactful */
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        /* --- Description (P) Styling --- */
        .hero-description {
            font-size: 1.2rem;
            max-width: 600px; /* Limits text width */
            margin-bottom: 40px;
            line-height: 1.6;
        }

        /* --- Button Container --- */
        .hero-buttons {
            display: flex;
            gap: 20px; /* Spacing between the buttons */
        }

        /* --- General Button Styles --- */
        .btn {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        /* --- Specific Primary Button Styles (e.g., 'Explore our services') --- */
        .btn-primary {
            background-color: #007DAA; /* Maersk's specific light blue */
            color: white;
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            background-color: #005f81; /* Darker blue on hover */
        }

        /* --- Specific Secondary Button Styles (e.g., 'Contact us') --- */
        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white; /* White outline */
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white hover effect */
        }
</style>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div> -->
    <!-- Spinner End -->


<section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Reliable Hauling &
                                        Trucking Services You Can Trust</h1>
            <p class="hero-description">We provide heavy equipment rental and hauling solutions for construction,
                                        roadwork, and land development projects. Fast, efficient, and dependable
                                        service—anytime you need it.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary">Explore our services</a>
                <a href="#" class="btn btn-secondary">Contact us</a>
            </div>
        </div>
    </section>

    <!-- Carousel Start -->
    <!-- <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100"
                        src="img/frommessenger_img/Bulldozer/653741885_1371001138407124_1284725484798201044_n.jpg"
                        alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-10 text-start container d-flex flex-column align-items-center text-center">
                                    <p
                                        class="fs-5 fw-medium text-primary text-uppercase animated slideInRight d-flex justify-content-center align-items-center">
                                        We provide heavy equipment rental and hauling solutions for construction,
                                        roadwork, and land development projects. Fast, efficient, and dependable
                                        service—anytime you need it.
                                    </p>
                                    <h1 class="text-white mb-4 animated slideInRight">Reliable Hauling &
                                        Trucking Services You Can Trust</h1>
                                    <div class="d-flex gap-3 mt-3">
                                        <a href="" class="btn btn-primary py-3 px-5 animated slideInRight ">Request
                                            Quotation</a>
                                        <a href="" class="btn btn-primary py-3 px-5 animated slideInRight ">Inquire
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100"
                        src="img/frommessenger_img/Bulldozer/648772778_1879751409363373_5307232410905388609_n.jpg"
                        alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div
                                    class="col-lg-10 text-start container d-flex flex-column align-items-center text-center">
                                    <p
                                        class="fs-5 fw-medium text-primary text-uppercase animated slideInRight d-flex justify-content-center align-items-center">
                                        We provide heavy equipment rental and hauling solutions for construction,
                                        roadwork, and land development projects. Fast, efficient, and dependable
                                        service—anytime you need it.
                                    </p>
                                    <h1 class="text-white mb-4 animated slideInRight">Reliable Hauling &
                                        Trucking Services You Can Trust</h1>
                                    <div class="d-flex gap-3 mt-3">
                                        <a href="" class="btn btn-primary py-3 px-5 animated slideInRight ">Request
                                            Quotation</a>
                                        <a href="" class="btn btn-primary py-3 px-5 animated slideInRight ">Inquire
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div> -->
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class=" align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid"
                                src="img/frommessenger_img/Bulldozer/350254176_1987765081565505_7595268439387192288_n.jpg"
                                class="img-fluid w-100 shadow-lg" alt="Construction Site"
                                style="object-fit: cover; min-height: 500px;">
                        </div>



                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">About Us</p>
                    <h1 class="display-5 mb-4">Why Choose Us</h1>
                    <p class="mb-4">We are a trusted provider of hauling and trucking services, offering high-quality
                        equipment and skilled operators for your project needs. Whether small-scale or large-scale
                        operations, we ensure timely and efficient service delivery.</p>
                    <div class="d-flex align-items-center mb-4">
                        <!-- <div class="flex-shrink-0 bg-primary p-4">
                            <h1 class="display-2">25</h1>
                            <h5 class="text-white">Years of</h5>
                            <h5 class="text-white">Experience</h5>
                        </div> -->
                        <div class="ms-4">
                            <p><i class="fa fa-check text-primary me-2"></i>Well-maintained equipment</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Experienced operators</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Fast response time</p>
                            <p><i class="fa fa-check text-primary me-2"></i>Competitive pricing</p>
                            <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Reliable and on-time service
                            </p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle "
                                    style="background-color: #FFEB3B;">
                                    <i class="fa fa-envelope-open text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Email us</p>
                                    <h5 class="text-primary mb-0">info@example.com</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle"
                                    style="background-color: #FFEB3B;">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Call us</p>
                                    <h5 class="text-primary mb-0">+012 345 6789</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 p-5">
        <div class="row g-5">
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border p-5">
                    <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">25</h1>
                    <span class="fs-5 fw-semi-bold text-white">Years Experience</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border p-5">
                    <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">135</h1>
                    <span class="fs-5 fw-semi-bold text-white">Team Members</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border p-5">
                    <i class="fa fa-users fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">957</h1>
                    <span class="fs-5 fw-semi-bold text-white">Happy Clients</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border p-5">
                    <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">1839</h1>
                    <span class="fs-5 fw-semi-bold text-white">Projects Done</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative me-lg-4">
                        <img class="img-fluid w-100"
                            src="img/frommessenger_img/Bulldozer/449851731_845923547033782_8911731370414774582_n.jpg"
                            alt="">
                        <span
                            class="position-absolute top-50 start-100 translate-middle bg-white rounded-circle d-none d-lg-block"
                            style="width: 120px; height: 120px;"></span>
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="video/video_home.mp4"
                            data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>





                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">REASONS TO CHOOSE US</p>
                    <h1 class="display-5 mb-4">Several Reasons Why Clients Choose Our Hauling & Trucking Services</h1>
                    <p class="mb-4">We are committed to providing reliable, safe, and efficient transportation solutions
                        that meet all your hauling needs. Our experienced team works diligently to ensure your cargo is
                        delivered securely and on time, every time.</p>
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Experienced Drivers</h4>
                                    <span>Our team of CDL-certified drivers has years of experience navigating diverse
                                        routes and handling all types of cargo.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Reliable Fleet & Equipment</h4>
                                    <span>Our modern, well-maintained trucks and trailers are equipped to handle
                                        everything from standard freight to complex, heavy-duty hauling.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-check text-white"></i>
                                </div>
                                <div class="ms-4">
                                    <h4>Comprehensive Logistics Solutions</h4>
                                    <span>From specialized load planning to route optimization, we offer end-to-end
                                        logistics to streamline your transportation process.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Video Preview</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <video id="localVideo" controls>
                            <source src="video/video_home.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
                <h1 class="display-5 mb-4">We Provide Best Industrial Services</h1>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <img class="img-fluid"
                            src="img/frommessenger_img/Bulldozer/651974962_34441639065481261_5966963977134858662_n.jpg"
                            alt="">
                        <div class="service-img">
                            <img class="img-fluid"
                                src="img/frommessenger_img/Bulldozer/651974962_34441639065481261_5966963977134858662_n.jpg"
                                alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Equipment Rental</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Rent high-quality machinery for all types of construction
                                    projects.</p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <img class="img-fluid"
                            src="img/frommessenger_img/Bulldozer/653582378_955672716839309_2968567181411362169_n.jpg"
                            alt="">
                        <div class="service-img">
                            <img class="img-fluid"
                                src="img/frommessenger_img/Bulldozer/653582378_955672716839309_2968567181411362169_n.jpg"
                                alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Material Hauling</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Safe and timely transport of construction materials to your
                                    site.</p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <img class="img-fluid"
                            src="img/frommessenger_img/Bulldozer/653662395_1747002060043910_1233042585507975312_n.jpg"
                            alt="">
                        <div class="service-img">
                            <img class="img-fluid"
                                src="img/frommessenger_img/Bulldozer/653662395_1747002060043910_1233042585507975312_n.jpg"
                                alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Site Preparation</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">Prepare your land efficiently for construction, grading, and
                                    leveling.</p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="">Read More</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="cta-container position-relative overflow-hidden py-5 px-3">
        <a href="#" class="stretched-link text-decoration-none"></a>

        <div class="container text-center py-4">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">

                    <p class="orange-label fw-bold mb-3" style="color:#FFEB3B !important;">GET A QUOTE TODAY</p>

                    <h2 class="display-5 fw-bold text-white mb-3">
                        Need equipment for your next project?
                    </h2>

                    <a href="requestform.php"></a>
                    <p class="h4 text-light opacity-90 fw-light" style="color:#FFEB3B !important;">
                        👉 Request a quotation today and let us help you get started!
                    </p></a>

                </div>
            </div>
        </div>
    </section>

    <!-- Service End -->





    <!-- Team Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Our Team</p>
                <h1 class="display-5 mb-5">Dedicated Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid" src="img/team-1.jpg" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px;">
                                <h5>Rob Miller</h5>
                                <span class="text-primary">CEO & Founder</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <img class="img-fluid" src="img/team-2.jpg" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px;">
                                <h5>Adam Crew</h5>
                                <span class="text-primary">Project Manager</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <img class="img-fluid" src="img/team-3.jpg" alt="">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                                <i class="fa fa-2x fa-share text-white"></i>
                            </div>
                            <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px;">
                                <h5>Peter Farel</h5>
                                <span class="text-primary">Engineer</span>
                                <div class="team-social">
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Team End -->


    <!-- Testimonial Start -->
    <!-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Testimonial</p>
                <h1 class="display-5 mb-5">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-1.jpg">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-2.jpg">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto mb-5" src="img/testimonial-3.jpg">
                        <div class="btn-square bg-primary rounded-circle">
                            <i class="fa fa-quote-left text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center rounded p-4">
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                        <h5 class="mb-1">Client Name</h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->
    <script>
        // Wait for the document to load
        document.addEventListener('DOMContentLoaded', function () {
            var myModalEl = document.getElementById('videoModal');
            var videoPlayer = document.getElementById('localVideo');

            // This triggers specifically when the Bootstrap modal is hidden
            myModalEl.addEventListener('hidden.bs.modal', function () {
                // Pause the video
                videoPlayer.pause();
                // Reset the time to the beginning (optional)
                videoPlayer.currentTime = 0;
            });

            // Optional: Auto-play when the modal opens
            myModalEl.addEventListener('shown.bs.modal', function () {
                videoPlayer.play();
            });
        });
    </script>

    <?php require 'footertemplate.php'; ?>

</body>

</html>