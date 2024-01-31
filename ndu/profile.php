

<html>
    <head>
    <?php include 'database.php';?>
    <?php
session_start();
if(!isset($_SESSION['FName'])){
    header("Location:index.php");
}
 
?>

<?php

error_reporting(0);
 $email = $_SESSION["email"];
#connecting to database
 
$sql = "SELECT * FROM client where email='$email'";
$result = mysqli_query( $conn, $sql ) or die( "db lost" );
$view = mysqli_fetch_assoc($result);
 
?>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">  

    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <title>Profile</title>  
 
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">


    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.min.js"></script>

<style> 
/* Define the custom classes for dark background and white text */
.swal-dark-bg {
   
    background-color: #222 !important; /* Change to your desired dark background color */
}

.swal-text-white {
    color: #fff !important; /* Change to your desired white text color */
}


.scard{
    box-shadow: inset 0 0 1px 1px hsla(0, 0%, 100%, 0.1);
}
.card{
    box-shadow: inset 0 0 0.5px 1px hsla(0, 0%, 100%, 0.1);
    
}
 .card:hover{
 
box-shadow:  0 0 15px 5px #2d2d5d;
 }
</style>
    </head>
    <body id="page-top">
         <!-- Page Wrapper -->
    <div id="wrapper">

<!-- Sidebar -->
 <!-- Sidebar -->
 <ul class="navbar-nav   sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #111111;">

<!-- Sidebar - LOgo -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
    <div class="sidebar-brand-icon " >
        
    </div>
    <div class="sidebar-brand-text mx-3">Assignment<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
</li>

<!-- Divider -->
 
 
 
 
 
 <!-- Heading -->

<!-- Divider -->



<!-- Nav Item - Tables -->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content" style="background-color: #171717;">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light   topbar mb-4 static-top shadow" style="background-color: #222;">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto" style="background-color: #222;">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-light-600 small">Hello <?php echo $_SESSION["FName"], " ", $_SESSION["LName"] ?> </span>
                        <img class="img-profile rounded-circle"
                            src="<?php  echo $_SESSION["content1"]?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"  >
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
    

        <div class="container-fluid text-light" >

<!-- Page Heading -->
 
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xm-3 col-md-3 mb-2" ></div>
    <div class="col-sm-4 col-md-5 mb-2" >
        <div class="card hover-shadow   py-4" style="border-radius:20px; background-color:#2d2d34;     "> 
            <div class="card-body">
                <div class="row no-gutters  " >
                    <div class="col mr-2">
                    <div class="text-xl font-weight-bold   text-uppercase mb-1" style="font-size:13pt; color:white">
                       
   <b>My Profile  </b>
                   </div>
                    <img class="img-profile rounded-circle  "
                                    src="<?php  echo $view["content1"]?>" style="width:50%;height:30vh; margin-left:25%" />
                       
                        <div class="h5 mb-0 font-weight-bold  ">

                      
                        <form action="profileupdate.php" method="POST" enctype="multipart/form-data">
 
             
                <div class="align-items-center flex-row-reverse">
                    <div class="col-lg-12">
                        
                    <p style="font-size:12pt; margin:10px" >Update Your profile pic 
                    <input type="file" required name ="profile" > </p>

                        <div class="about-text go-to">
                       <hr>
                            <h3 class="dark-color">Hello'  
                             <b> <?php echo $view["name"], " ", $view["lname"] ?></b><sup><?php if($view['aproved'] == '1') {echo "<i class='fa-solid fa-circle-check text-primary' style='font-size:medium'></i>";} ?></sup></h3>
                            <h6 class="theme-color lead" style="font-size:12pt"> <?php if($view['aproved'] == '1') {echo "Verified User";} else{ echo "Status: Under Verification";} ?></h6>
                            <br/><hr>
                            <div class="row about-list">
    <div class="col-md-6" style="font-size:12pt">
        <div class="media  ">
            <p>First Name:</p>
            <p class="ml-2"><?php echo " ", $view["name"]; ?></p>
        </div>
        <hr>
        <div class="media">
            <label class="mr-2">Last Name:</label>
            <p><?php echo $view["lname"]; ?></p>
        </div>
        <hr>
        <div class="media">
            <label class="mr-2">Mobile:</label>
            <p><?php echo $view["phone"]; ?></p>
        </div>
        <hr>
        <div class="media">
            <label class="mr-2">Bank Name:</label>
            <p><?php echo $view["bankname"]; ?></p>
        </div>
        <hr>
    </div>
    <div class="col-md-6" style="font-size:12pt">
        <div class="media">
            <label class="mr-2">E-mail:</label>
            <p><?php echo $view["email"]; ?></p>
        </div>
        <hr>
        <div class="media">
            <label class="mr-2">Password:</label>
            <sup><a href="resetpassword.php" class="btn btn-primary">Reset</a></sup>
        </div>
        <hr>
        <div class="media">
            <label class="mr-2">Employee Id:</label>
            <p><?php echo substr($view["account"], -4); ?></p>
        </div>
        <hr>
        <div class="media">
            <label class="mr-2">Refer Code:</label>
            <p><?php echo $view["ifsc"]; ?></p>
        </div>
        <br>
        
        <hr>
    </div>
</div>

                        </div>
                        <br>
                        <button type="submit" data-to="500" data-speed="500" name="submit" class="btn text-light bg-primary count h6 "  >Save Profile</button>
                                </form>


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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
    var logoutTimer;

    function startLogoutTimer() {
        logoutTimer = setTimeout(logoutUser, 350000);  
    }

    function resetLogoutTimer() {
        clearTimeout(logoutTimer);
        startLogoutTimer();
    }

    function logoutUser() {
        // Redirect or perform logout action here
        window.location.href = "logout.php";
        // You can redirect to a logout page or perform other logout actions
    }

    // Start the logout timer when the page loads
    startLogoutTimer();

    // Reset the logout timer when there is any user activity (e.g., mouse move, key press)
    window.addEventListener('mousemove', resetLogoutTimer);
    window.addEventListener('keypress', resetLogoutTimer);

</script>
 <!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

<script>
    // Check if update was successful and show SweetAlert
    if (<?php echo isset($_SESSION["update_success"]) && $_SESSION["update_success"] ? "true" : "false"; ?>) {
        showSweetAlert();
        <?php unset($_SESSION["update_success"]); ?> // Clear the session variable
    }

    // Show SweetAlert function
    function showSweetAlert() {
        Swal.fire({
            title: "Success!",
            text: "Profile updated successfully!",
            icon: "success",
            showConfirmButton: false,
            timer: 3200, // Automatically close after 1.5 seconds
            customClass: {
                popup: 'swal-dark-bg', // Apply the custom class for dark background
                content: 'swal-text-white' // Apply the custom class for white text
            }
        });
    }
</script>



     
        </body>
        
        </html>