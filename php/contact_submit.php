<?php

require_once 'email.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $body = "
    <html>
    <head>
        <title>New Contact Message</title>
    </head>
    <body style='font-family: Arial, sans-serif; background:#f4f4f4; padding:20px;'>

        <div style='max-width:600px; margin:auto; background:#fff; border-radius:8px; overflow:hidden;'>

            <div style='background:#0d6efd; color:#fff; padding:20px; text-align:center;'>
                <h2 style='margin:0;'>New Contact Wants to reach out</h2>
            </div>

            <div style='padding:20px;'>

                <table style='width:100%; border-collapse:collapse;'>

                    <tr>
                        <td style='padding:10px; font-weight:bold;'>Name:</td>
                        <td style='padding:10px;'>$name</td>
                    </tr>

                    <tr style='background:#f9f9f9;'>
                        <td style='padding:10px; font-weight:bold;'>Email:</td>
                        <td style='padding:10px;'>$email</td>
                    </tr>

                    <tr>
                        <td style='padding:10px; font-weight:bold;'>Subject:</td>
                        <td style='padding:10px;'>$subject</td>
                    </tr>

                    <tr style='background:#f9f9f9;'>
                        <td style='padding:10px; font-weight:bold;'>Message:</td>
                        <td style='padding:10px;'>$message</td>
                    </tr>

                </table>

            </div>

            <div style='background:#f1f1f1; text-align:center; padding:15px; font-size:12px; color:#666;'>
                This email was generated automatically from your website contact form.
            </div>

        </div>

    </body>
    </html>
    ";

    if (sendEmail("hmcf.prime@gmail.com", $subject, $body, "Admin")) {

        header("Location: ../index.php"); // or your homepage file hmcf.prime@gmail.com
        exit();

    } else {

        header("Location: ../index.php"); // or your homepage file hmcf.prime@gmail.com
        exit();

    }
}
?>