<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Industro - Industrial HTML Template</title>
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


    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


<?php require 'headertemplate.php'; ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Request Equipment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Equipment Request</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl py-5">
       
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Contact Us</p>
                    <h1 class="display-5 mb-4">If You Have Any Queries, Please Feel Free To Contact Us</h1>
                    <p class="mb-4">Fill out the form below and we will get back to you as soon as possible.</p>
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6>Call Us</h6>
                                    <span>+012 345 67890</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6>Mail Us</h6>
                                    <span>info@example.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <form action="https://formspree.io/f/mykbyopa" method="POST" enctype="text/plain" id="requestForm">
                        <div class="row g-3">
                            <div class="mb-3">
  <label for="exampleSelect" class="form-label">Equipment Needed</label>
  <select class="form-select" id="exampleSelect" required>
    <option selected>Select an option</option>
    <option value="1">Bulldozer
</option>
    <option value="2">Dump Truck</option>
    <option value="3">Road Roller / Pison</option>
  </select>
</div>


<div class="col-12">
                                <div class="form-floating">
                                    <input type="address" class="form-control" id="email" placeholder="Your Email" required>
                                    <label for="email">Project Location</label>
                                </div>
                            </div>

                        <!-- <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Number of Days Needed</label>
                                </div>
                            </div> -->

<div class="col-md-6">
    <label class="form-label">Start Date</label>
    <input type="date" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">End Date</label>
    <input type="date" class="form-control" required>
  </div>


                        <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Your Email" required>
                                    <label for="email">Full Name</label>
                                </div>
                            </div>


                          <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="email" placeholder="Your Email" required>
                                    <label for="email">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="subject" placeholder="Subject" required>
                                    <label for="subject">Email Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px" required></textarea>
                                    <label for="message"> Additional Notes</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Submit Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<script>
const form = document.getElementById('requestForm');
const result = document.getElementById('response-msg');
const btn = document.getElementById('submit-btn');

form.addEventListener('submit', function(e) {
    e.preventDefault(); // Stop page from refreshing
    
    btn.disabled = true;
    btn.innerText = "Sending...";
    
    const formData = new FormData(form);
    const object = Object.fromEntries(formData);
    const json = JSON.stringify(object);

    fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: json
        })
        .then(async (response) => {
            let json = await response.json();
            if (response.status == 200) {
                // SUCCESS
                result.innerHTML = "Success! Your request has been sent.";
                result.className = "success";
                form.reset(); // Clear the form
                form.style.display = "none"; // Optionally hide form
            } else {
                // ERROR from server
                result.innerHTML = "Error: " + json.message;
                result.className = "error";
            }
        })
        .catch(error => {
            // NETWORK ERROR
            result.innerHTML = "Something went wrong. Check your connection.";
            result.className = "error";
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerText = "Submit Request";
            result.style.display = "block";
        });
});
</script>

<?php require 'footertemplate.php'; ?>
</body>

</html>