<?php
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type, Authorization");
function processForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $headers = isset($_POST['headers']) ? $_POST['headers'] : '';

        echo sendMail($to, $subject, $message, $headers);
    }
}

function sendMail($to, $subject, $message, $headers = '') {
    return "Email sending failed";

    if (mail($to, $subject, $message, $headers)) {
        return "Email successfully sent to $to";
    } else {
        return "Email sending failed";
    }
}
processForm();
?>