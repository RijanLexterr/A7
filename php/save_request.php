<?php
require_once 'email.php';
$host = "localhost";
$user = "root";        // change if needed
$pass = "";            // change if needed
$db = "Service";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data safely
    $equipment = $_POST['equipment_needed'];
    $location = $_POST['project_location'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $name = $_POST['full_name'];
    $contact = $_POST['contact_number'];
    $email = $_POST['email_address'];
    $notes = $_POST['additional_notes'];

    // Prepare SQL (prevents SQL injection)
    $stmt = $conn->prepare("INSERT INTO Request 
        (equipment_needed, project_location, start_date, end_date, full_name, contact_number, email_address, additional_notes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "ssssssss",
        $equipment,
        $location,
        $start,
        $end,
        $name,
        $contact,
        $email,
        $notes
    );

    // Execute
    if ($stmt->execute()) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
// sendEmail($to, $subject, $body, $toName)
$body =  "
<html>
<head>
    <title>New Equipment Request</title>
</head>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>

    <div style='max-width: 600px; margin: auto; background: #ffffff; border-radius: 8px; overflow: hidden;'>
        
        <!-- Header -->
        <div style='background-color: #0d6efd; color: #ffffff; padding: 20px; text-align: center;'>
            <h2 style='margin: 0;'>New Equipment Request</h2>
        </div>

        <!-- Content -->
        <div style='padding: 20px;'>

            <p style='font-size: 16px;'>You have received a new service request. Here are the details:</p>

            <table style='width: 100%; border-collapse: collapse;'>

                <tr>
                    <td style='padding: 10px; font-weight: bold;'>Equipment Needed:</td>
                    <td style='padding: 10px;'>$equipment</td>
                </tr>

                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; font-weight: bold;'>Project Location:</td>
                    <td style='padding: 10px;'>$location</td>
                </tr>

                <tr>
                    <td style='padding: 10px; font-weight: bold;'>Start Date:</td>
                    <td style='padding: 10px;'>$start</td>
                </tr>

                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; font-weight: bold;'>End Date:</td>
                    <td style='padding: 10px;'>$end</td>
                </tr>

                <tr>
                    <td style='padding: 10px; font-weight: bold;'>Full Name:</td>
                    <td style='padding: 10px;'>$name</td>
                </tr>

                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; font-weight: bold;'>Contact Number:</td>
                    <td style='padding: 10px;'>$contact</td>
                </tr>

                <tr>
                    <td style='padding: 10px; font-weight: bold;'>Email Address:</td>
                    <td style='padding: 10px;'>$email</td>
                </tr>

                <tr style='background-color: #f9f9f9;'>
                    <td style='padding: 10px; font-weight: bold;'>Additional Notes:</td>
                    <td style='padding: 10px;'>$notes</td>
                </tr>

            </table>

        </div>

        <!-- Footer -->
        <div style='background-color: #f1f1f1; text-align: center; padding: 15px; font-size: 12px; color: #666;'>
            This email was generated automatically from your website form.
        </div>

    </div>

</body>
</html>
";
sendEmail("hmcf.prime@gmail.com", "New Request", $body,"Admin");
// header("Location: ../index.php"); // or your homepage file hmcf.prime@gmail.com
// exit();
?>