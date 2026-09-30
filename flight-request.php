<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

// Form data
$from_airport    = $_POST['from_airport'] ?? '';
$to_country      = $_POST['to_country'] ?? '';
$to_airport      = $_POST['to_airport'] ?? '';
$trip_type       = $_POST['trip_type'] ?? '';
$departure_date  = $_POST['departure_date'] ?? '';
$return_date     = $_POST['return_date'] ?? '';
$passengers      = $_POST['passengers'] ?? '';
$cabin_class     = $_POST['cabin_class'] ?? '';
$customer_name   = $_POST['customer_name'] ?? '';
$customer_phone  = $_POST['customer_phone'] ?? '';
$customer_email  = $_POST['customer_email'] ?? '';

// Destination email
$to = "info@meerinternationaltravels.com";

$subject = "New Flight Request - " . $customer_name;

$message = "
NEW FLIGHT REQUEST
==============================

Customer Details
----------------
Name: $customer_name
Phone: $customer_phone
Email: $customer_email

Flight Details
--------------
From Airport: $from_airport
To Country: $to_country
To Airport: $to_airport

Trip Type: $trip_type
Departure Date: $departure_date
Return Date: $return_date

Passengers: $passengers
Cabin Class: $cabin_class
";

// Headers
$headers = "From: website@meerinternationaltravels.com\r\n";
$headers .= "Reply-To: " . $customer_email . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email
if (mail($to, $subject, $message, $headers)) {

    echo "
    <html>
    <head>
        <title>Request Submitted</title>
    </head>
    <body style='font-family: Arial; text-align:center; padding:60px;'>
        <h2>Thank You!</h2>
        <p>Your flight request has been submitted successfully.</p>
        <p>We will contact you shortly.</p>
        <a href='javascript:history.back()'>Go Back</a>
    </body>
    </html>
    ";

} else {

    echo "
    <html>
    <body style='font-family: Arial; text-align:center; padding:60px;'>
        <h2>Sorry!</h2>
        <p>Your request could not be sent.</p>
        <p>Please try again later.</p>
    </body>
    </html>
    ";

}

?>
