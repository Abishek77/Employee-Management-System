
<?php include 'database.php';?>
<?php
session_start();

if(isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ndu";

    // Create connection
   

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    error_reporting(0);
    $pass = $_POST["pass"];
    $us = 1;
    $em = $_SESSION["email"];
     $encode= md5($pass);
    $sql = "UPDATE client SET password='$encode', userstatus='$us' WHERE email='$em'";

    if ($conn->query($sql) === TRUE) {
        // Password update successful, perform any necessary actions here
        
        // Redirect after processing
        header("Location: logout.php");
        exit(); // Important to exit after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
 
<!-- Your HTML code remains unchanged -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

 

<body class=" d-flex align-items-center min-vh-100" style="background-color:#111">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-dark hover-shadow-lg bg-gradient-dark">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h1 class="h3 text-light mb-4">Reset Password</h1>
                                    </div>
                        <form class="user" method="POST">
                           <p class="text-light">Hi! <b>"<?php echo $_SESSION["FName"], " ", $_SESSION["LName"];?>"</b> make sure your password has minum characters in it, and check the password strength here:<p id="passwordStrengthIndicator"></p> </p>
                            <div class="mb-3">
                                <input type="password" required name="pass" class="form-control form-control-user"
                                    id="password" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" required name="pass" class="form-control form-control-user"
                                    id="confirmPassword" placeholder="Confirm Password">
                            </div>
                            <p class="text-light-100">When creating a password, consider the following rules:</p>
                            <ul>
        <li>Use 8+ characters</li>
        <li>Mix upper & lower case</li>
        <li>Add numbers & symbols</li>
        <li>Avoid personal info</li>
        <li>Use randomness</li>
    </ul>       
                            <div class="mb-3">
                                <p id="passwordMatchIndicator" class="mb-0"></p>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name ="submit" type="submit" id="resetButton" disabled>Reset Password</button>
                                <a href="home" class="btn btn-primary">Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get references to the password and confirm password fields
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirmPassword');
        
        // Get reference to the password match indicator element
        const passwordMatchIndicator = document.getElementById('passwordMatchIndicator');
        
        // Get reference to the password strength indicator element
        const passwordStrengthIndicator = document.getElementById('passwordStrengthIndicator');

        // Get reference to the reset button
        const resetButton = document.getElementById('resetButton');
        
        // Function to update the match and strength indicators
        function updateIndicators() {
            // Update password match indicator
            if (passwordField.value === confirmPasswordField.value) {
                passwordMatchIndicator.textContent = 'Passwords match';
                passwordMatchIndicator.style.color = 'white';
            } else {
                passwordMatchIndicator.textContent = 'Passwords do not match';
                passwordMatchIndicator.style.color = 'red';
            }

            // Password strength validation
            const password = passwordField.value;
            const strongRegex = new RegExp("^(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})");

            if (strongRegex.test(password)) {
                passwordStrengthIndicator.textContent = 'Strong password';
                passwordStrengthIndicator.style.color = 'white';
                if (password.length >= 8) {
                    resetButton.disabled = false; // Enable the reset button
                } else {
                    resetButton.disabled = true; // Disable the reset button
                }
            } else {
                passwordStrengthIndicator.textContent = 'Weak password';
                passwordStrengthIndicator.style.color = 'red';
                resetButton.disabled = true; // Disable the reset button
            }
        }

        // Add event listeners to the password and confirm password fields
        passwordField.addEventListener('input', updateIndicators);
        confirmPasswordField.addEventListener('input', updateIndicators);
    </script>
</body>

</html>
