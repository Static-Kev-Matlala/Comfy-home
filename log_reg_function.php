<?php
include("connection.php");

if(isset($_POST['sign_up'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password){
        echo "<div class='acc-message' style='color: white;'>
            <p>Passwords don't match</p>
        </div><br>";
        echo "<a style='color: white;' href='javascript:self.history.back()'><button>Go Back</button></a>";
    } else {
        $masked_password = password_hash($password, PASSWORD_DEFAULT);

        // Verify if email already exists
        $verify_query = mysqli_query($conn, "SELECT user_email FROM users WHERE user_email = '$email'");

        if($verify_query === false) {
            echo "Error: " . mysqli_error($conn); // Display MySQL error if any
        } else {
            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message' style='color: white;'>
                    <p>This email is already used, Please use another one.</p>
                </div><br>";
                echo "<a style='color: white;' href='javascript:self.history.back()'><button>Go Back</button></a>";
            } else {
                if ($email === "Admin@Comfy.com" || $email === "admin@comfy.com"){
                    $type = 'Admin';
                }
                else
                {
                    $type = "User";
                }
                // Insert new user
                $fullname = $name . " " . $surname;
                $insert_query = mysqli_query($conn, "INSERT INTO `users`(`user_fullname`, `user_email`, `user_address`, `user_number`, `user_password`, `user_type`) VALUES ('$fullname','$email','$address','$number','$masked_password', '$type')");

                if($insert_query === false) {
                    echo "Error: " . mysqli_error($conn); // Display MySQL error if any
                } else {
                    echo "<div class='message' style='color: white;'>
                        <p>Registration Successful</p>
                    </div><br>";
                    header("refresh:2;sign_in.php");
                }
            }
        }
    }
}
?>

<!-- sign_in -->

<?php
require 'connection.php';
session_start();

$message = []; // Initialize the message array

if (isset($_POST['sign_in'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['user_password'])) {

            if ($row['user_type'] === "Admin"){
                $_SESSION['name'] = $row['user_fullname'];

                $message['success'] = 'You have successfully logged in.';
                header("refresh:2; admin.php");
                exit();
            }
            else
            {
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['name'] = $row['user_fullname'];

                $message['success'] = 'You have successfully logged in.';
                header("refresh:2; welcome.php");
                exit();
            }
            
        } else {
            $message['error'] = 'Invalid email or password';
        }
    } else {
        $message['error'] = 'Invalid email or password';
    }
}

if (isset($_GET['message'])) {
    $message['message'] = 'You have successfully logged out';
}

?>