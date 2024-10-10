<?php
// Connect to MySQL database
$host = 'localhost'; // Database host (e.g., localhost)
$dbname = 'db_comfy@home'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

function if_exists($key) {
    if (isset($_POST[$key])) {
        return true; // Key exists
    }
    return false; // Key does not exist
}

$conn = new mysqli($host, $username, $password, $dbname);

if (if_exists('sign_up')) {

    // Create connection
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['number']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
    
        // Minimal validation
        if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "All fields are required!";
        } elseif ($password !== $confirm_password) {
            echo "Passwords do not match!";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            // Prepare SQL query to insert data
            $stmt = $conn->prepare("INSERT INTO users (name, surname, email, phone, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $surname, $email, $phone, $hashed_password);
    
            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }
    
            $stmt->close();
        }
    }
    $conn->close();

    exit();

} else {

    
///////////////////////////////////////////
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Minimal validation
    if (empty($email) || empty($password)) {
        echo "Email and password are required!";
    } else {
        // Prepare SQL query to fetch user
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Bind result variables
            $stmt->bind_result($id, $name, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                echo "Login successful! Welcome, " . $name;
                // You could initiate a session here
                session_start();
                $_SESSION['user_id'] = $id;
                $_SESSION['name'] = $name;
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "No user found with this email!";
        }

        $stmt->close();
    }
}

$conn->close();

}



?>
