
<?php include 'database.php';?>
<?php
error_reporting(E_ALL);

$email = $_POST['email'];
$pass = $_POST['password'];

 
$sql2 = "SELECT * FROM client";
$result = mysqli_query($conn, $sql2) or die("Database query failed");

$loggedIn = false; // Flag to track successful login

while ($table = mysqli_fetch_assoc($result)) {
    if ($email == $table['email'] && $pass == $table['password']) {
        header("Location: client.php");
        exit; // Important: Stop script execution after redirection
    } elseif ($email === "admin" && $pass === "password") {
        header("Location: index.php");
        exit; // Important: Stop script execution after redirection
    }
}

// If no redirection happened, show an error message or redirect to an error page
echo "Invalid login credentials"; // You can customize this message

mysqli_close($conn); // Close the database connection
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Assignment</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center" >

            <div class="col-xl-5 col-lg-12 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12 bg-gradient-dark" >
                                <div class="p-5">   
                                    <div class="text-center">
                                        <img src="https://static.wixstatic.com/media/f5bc3d_8e885578a3fb44bfac3d8b599325d4a1~mv2.png/v1/fill/w_114,h_114,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled%20design%20(12).png"/>
                                        <h1 class="h4 text-dark-800 mb-4">Assignment</h1>
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
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        
                                        
                                        
                                    </form>
                                    <hr class="bg-secondary">
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
