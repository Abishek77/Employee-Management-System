
<?php include 'database.php';?>
<?php
session_start();

// ... (your existing code for database connection and POST request handling)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($email === "a" && $password === "b") {
        $_SESSION["email"] = $email;
        $_SESSION["role"] = "admin";
        $_SESSION['Name'] = "Admin"; // You can set the admin name here
        header("Location: admin.php"); // Redirect to admin page
        exit;
    }
    // Prepare and execute a SQL query to fetch user data
    $stmt = $conn->prepare("SELECT name, email, password, role FROM client WHERE email = ?");
    
    // Bind parameters using call_user_func_array
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($user["password"] === md5($password)) {
            $_SESSION["email"] = $email;
            $_SESSION["role"] = $user["role"];
            $_SESSION['Name'] = $user['name'];
            if ($user["role"] === "admin") {
                header("Location: admin.php"); // Redirect to admin page
            } elseif ($user["role"] === "client") {
                header("Location: home"); // Redirect to client page
            }
            exit;
        }
    }

    $error_message = "Invalid login credentials";

    // Close the statement
    $stmt->close();
}
?>

 


 


<?php /*
error_reporting(E_ALL);

$email = $_POST['email'];
$pass = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "ndu") or die("Connection lost");

$sql2 = "SELECT * FROM client";
$result = mysqli_query($conn, $sql2) or die("Database query failed");

$loggedIn = false; // Flag to track successful login

while ($table = mysqli_fetch_assoc($result)) {
    if ($email == $table['email'] && $pass == $table['password']) {
        header("Location: client.php");
        exit; // Important: Stop script execution after redirection
    } elseif ($email === "admin" && $pass === "password") {
        header("Location: admin.php");
        exit; // Important: Stop script execution after redirection
    }
}

// If no redirection happened, show an error message or redirect to an error page
echo "Invalid login credentials"; // You can customize this message

mysqli_close($conn); // Close the database connection*/
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Favicon link tag -->
<link rel="icon" type="image/png" href="">
    <title>Assignment</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
    <style>
    @keyframes zoomIn {
        0% {
            transform: scale(5);
            opacity: 0;
            filter: blur(10px);
        }
        100% {
            transform: scale(1);
            opacity: 1;
            filter: none;
        }
    }

    .loading-image {
        animation: zoomIn 0.5s linear;
        animation-fill-mode: forwards;
    }

    .content {
        display: none;
    }

    .blur-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(10px);
        z-index: -1;
    }
</style>




     
</head>
<div id="codeContainer">
<body   style="background-color:black; ">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" >

            <div class="col-xl-5 col-lg-12 col-md-5">

                <div class="card o-hidden   shadow-lg my-5" style="border:none">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12  " style="background-color: black; ">
                                <div class="p-5">   
                                <div class="blur-background"></div>
                                    <div class="text-center">
                                    <h1 class="loading-image">Abishek Nookathoti</h1>
                                        <h1 class="h2    mb-4">Demo Project</h1>
                                    </div>
                                    <form class="user"  method="POST">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user "
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." style="background-color: rgb(36, 51, 51);">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" style="background-color: rgb(36, 51, 51);">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>

                                                    <label> <?php if (isset($error_message)) { echo "<p class='text-danger'>$error_message</p>"; } ?></label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" >
                                            Login
                                        </button>
                                        
                                        
                                        
                                    </form>
                                    <hr class="bg-secondary">
                                    <div class="text-center">
                                    <a class="small btn btn-secondary mx-5" href="./registeration.php">Register</a>
                                        
                                    <a class="small" href="mailto:support@example.com?subject=Forgot%20Password%20Reset%20Request&body=Hello%20Support%2C%0D%0A%0D%0AI'm%20requesting%20a%20password%20reset%20for%20my%20account.%20Please%20assist%20me%20in%20resetting%20my%20password.%0D%0A%0D%0AThank%20you%2C%0D%0A ">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
         
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
