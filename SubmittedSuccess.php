<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>

<body>
    <?php require 'headertemplate.php'; ?>

    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-check-circle-fill display-1 text-success"></i>
                    <h1 class="display-4">Success!</h1>
                    <h1 class="mb-4">Action Completed</h1>
                    <p class="mb-4">
                        Your request has been successfully processed. 
                        You will be contacted by our Admin shortly.
                    </p>
                    <a class="btn btn-success py-3 px-5" href="../">Continue</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    <?php require 'footertemplate.php'; ?>
</body>

</html>