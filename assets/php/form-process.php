<?php
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// PHONE
if (isset($_POST["phone_number"])) {
    $phone_number = $_POST["phone_number"];
}

// SUBJECT
if (isset($_POST["subject"])) {
    $subject = $_POST["subject"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

$EmailTo = "yourname@domain.com";
$bodySubject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: " . $name . "\n";
$Body .= "Email: " . $email . "\n";
$Body .= "Phone Number: " . $phone_number . "\n";
$Body .= "Subject: " . $subject . "\n";
$Body .= "Message: " . $message . "\n";

// define headers
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";

// send email
$success = mail($EmailTo, $bodySubject, $Body, $headers);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
