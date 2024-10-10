<?php
// Database connection settings
$host = 'localhost'; // Database host (e.g., localhost)
$dbname = 'db_comfy@home'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = isset($_GET['fullname']) ? trim($_GET['fullname']) : '';
$email = isset($_GET['email']) ? trim($_GET['email']) : '';
$message = isset($_GET['message']) ? trim($_GET['message']) : '';

if(empty($fullname) || empty($email) || empty($message)) {
    echo "<script>alert('Please fill in all fields!'); window.history.back();</script>";
    exit;
}

if (!validateEmail($email)) {
    echo "<script>alert('Invalid email format!'); window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO contacts (fullname, email, message) VALUES ('$fullname', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    // JavaScript alert for success and redirect
    echo "<script>
        alert('Message has been sent successfully!');
        window.location.href = 'index.php';
    </script>";
} else {
    echo "<script>alert('Error saving message. Please try again.'); window.history.back();</script>";
}

$conn->close();

// Custom email validation function as defined earlier
// Custom email validation function
function validateEmail($email) {
    // Check if email contains exactly one '@' symbol
    if (strpos($email, '@') === false || substr_count($email, '@') != 1) {
        return false;
    }

    // Split email into local part and domain part
    list($localPart, $domain) = explode('@', $email);

    // Local part should not be empty and should be within 1 to 64 characters
    if (strlen($localPart) < 1 || strlen($localPart) > 64) {
        return false;
    }

    // Domain should not be empty and should be within 1 to 255 characters
    if (strlen($domain) < 1 || strlen($domain) > 255) {
        return false;
    }

    // Local part should only contain valid characters (alphanumeric and some special characters)
    if (!preg_match('/^[A-Za-z0-9.!#$%&\'*+\/=?^_`{|}~-]+$/', $localPart)) {
        return false;
    }

    // Domain part should contain valid characters (alphanumeric, hyphens, and dots)
    if (!preg_match('/^[A-Za-z0-9.-]+$/', $domain)) {
        return false;
    }

    // Domain part should contain at least one dot (.) and cannot start or end with a dot
    if (strpos($domain, '.') === false || $domain[0] === '.' || $domain[strlen($domain) - 1] === '.') {
        return false;
    }

    // Ensure each part of the domain (split by dot) is valid and less than 64 characters
    $domainParts = explode('.', $domain);
    foreach ($domainParts as $part) {
        if (strlen($part) < 1 || strlen($part) > 63) {
            return false;
        }
    }

    return true;
}

