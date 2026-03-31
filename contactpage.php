<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact Page | Premium Edition</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-gold: #FFD333; /* The bright yellow from your image */
            --dark-navy: #001C44;    /* The deep navy from your image */
            --light-bg: #F4F7F9;
            --transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        body { font-family: 'Open Sans', sans-serif; background-color: #fff; }
        h1, h2, h3, h4, .rubik { font-family: 'Rubik', sans-serif; }

        /* Page Header Enhancement */
        .page-header {
            background: linear-gradient(rgba(0, 28, 68, 0.8), rgba(0, 28, 68, 0.8)), url('img/carousel-1.jpg') center center no-repeat;
            background-size: cover;
        }

        /* Contact Cards */
        .contact-section { background-color: var(--light-bg); }
        
        .contact-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
            border: none;
            overflow: hidden;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.12);
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            color: var(--primary-gold);
            border: 1px solid #eee;
        }

        .info-pill {
            background-color: var(--dark-navy);
            color: #fff;
            padding: 12px 15px;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            min-height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-custom {
            background-color: var(--primary-gold);
            color: #111;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
            border: none;
            padding: 12px 25px;
            transition: var(--transition);
        }

        .btn-custom:hover {
            background-color: var(--dark-navy);
            color: #fff;
        }

        /* Map & Form Styling */
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .form-floating > .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.25rem rgba(255, 211, 51, 0.25);
        }

        .section-title::after {
            position: absolute;
            content: "";
            width: 45px;
            height: 3px;
            bottom: -5px;
            left: 0;
            background: var(--primary-gold);
        }

        .contact-section {
    background-color: #393B3A;
}
    </style>
</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    <?php require 'headertemplate.php'; ?>
   
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Get In Touch</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5 contact-section">
        <div class="container">
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-card text-center h-100 p-5">
                        <div class="icon-box mb-4"><i class="fa fa-phone-alt fa-2x"></i></div>
                        <h4 class="mb-3">Phone Number</h4>
                        <div class="info-pill mb-4"><span>+012 345 67890</span></div>
                        <a class="btn btn-custom px-4" href="tel:+0123456789">Call Now <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-card text-center h-100 p-5">
                        <div class="icon-box mb-4"><i class="fa fa-envelope-open fa-2x"></i></div>
                        <h4 class="mb-3">Email Address</h4>
                        <div class="info-pill mb-4"><span>hmcf.prime@gmail.com</span></div>
                        <a class="btn btn-custom px-4" href="mailto:hmcf.prime@gmail.com">Email Now <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="contact-card text-center h-100 p-5">
                        <div class="icon-box mb-4"><i class="fa fa-map-marker-alt fa-2x"></i></div>
                        <h4 class="mb-3">Office Address</h4>
                        <div class="info-pill mb-4"><span>215 Arevalo Street, Muntinlupa City</span></div>
                        <a class="btn btn-custom px-4" href="https://maps.google.com" target="_blank">Direction <i class="fa fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative">
                        <p class="fw-medium text-uppercase text-primary mb-2">Find Us</p>
                        <h1 class="display-5 mb-4">Our Location</h1>
                    </div>
                    <div class="map-container mb-4 mb-lg-0">
                        <iframe class="w-100" style="height: 400px; border:0;" 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3864.83!2d121.04!3d14.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTTCsDI0JzAwLjAiTiAxMjHCsDAyJzI0LjAiRQ!5e0!3m2!1sen!2sph!4v123456789" 
                        allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-light p-5 rounded-3">
                        <h2 class="mb-4">Send Us a Message</h2>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-custom w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footertemplate.php'; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script>new WOW().init();</script>
</body>
</html>