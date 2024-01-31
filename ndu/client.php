<?php include 'database.php';?>
<?php
session_start();
require_once "authentication.php"; // Include your authentication functions
requireLogin(); // Ensure the user is logged in
if (!isClient()) {
    header("Location: index.php");
}
// Check if it's the first-time login
 
?>
<?php include 'database.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     
<style> 
.scard{
    box-shadow: inset 0 0 1px 1px hsla(0, 0%, 100%, 0.1);
}
.card{
    box-shadow: inset 0 0 0.5px 1px hsla(0, 0%, 100%, 0.1);
    transition: transform 0.3s; /* Add transition for smooth animation */
}
.card-body:hover h4 {
            color: white;
        }
        .card-body h4{
            color: gray;
            font-weight: 600;
        }
 .card:hover{
    transform: scale(1.05);
box-shadow:  0 0 15px 5px #2d2d5d;
 }
</style>
    <title>Assignment</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.min.js"></script>
 
</head>
<?php

$email = $_SESSION["email"];
$sql2 = "SELECT name, userstatus, lname, content1 FROM client WHERE email = '$email'"; // Enclose $email in single quotes
$result = mysqli_query($conn, $sql2) or die("db lost");
error_reporting(0);

while ($table = mysqli_fetch_assoc($result)) {
    $_SESSION["FName"] = $table["name"];
    $_SESSION["LName"] = $table["lname"];
    $_SESSION["content1"] = $table["content1"];
    
    
    $_SESSION["userstatus"] = $table["userstatus"];
}
 
if($_SESSION['userstatus']==0){
    //show welcome model msg here
 

?>
 



<body id="page-top">

  <!-- Welcome modal STARTS -->  
<script> 
$(document).ready(function(){
    $("#myModal").modal('show');
});
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="backdrop-filter: blur(7.5px);" data-backdrop="static">
  <div class="modal-dialog">

    <!-- Modal content -->
    <div class="modal-content bg-gradient-dark text-light">
      <div class="brand-icon text-center" style="padding: 20px;">
        <img src="https://image.lexica.art/full_webp/de4d82f0-cca8-4373-a82c-05d01f997f26" style="width: 150px; padding-left: 1px; font-weight: 800; border-radius: 100px" />
                  <br> </br>
        <h3>Assignment</h3>
      </div>
      <div class="modal-header">
        <h2 class="modal-title" style="padding-left: 50px;">Welcome, <?php echo $_SESSION["FName"], " ", $_SESSION["LName"]; ?>!</h2>
      </div>
      <div class="modal-body">
        <p>Hi <span class="text-primary"><?php echo $_SESSION["FName"], " ", $_SESSION["LName"]; ?></span> Please reset your password  </p>

        
  
          
          
           <a href="#termsCollapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="termsCollapse"> <p><strong class="text-primary"> View Terms and Conditions
</strong></p></a>


        <!-- Collapsible Content -->
        <div class="collapse" id="termsCollapse">
        
        <p><strong>Login ID and Password:</strong></p>
<p>1. Users are solely responsible for maintaining the confidentiality of their login ID and password.</p>
<p>2. Do not, under any circumstances, share your login credentials with anyone. Your login information is for your use only.</p>
<p>3. In the event of unauthorized access to your account, it is your responsibility to immediately change your password and notify the platform administrator.</p>

<p><strong>Adding Personal Information:</strong></p>
<p>4. Users must provide accurate and up-to-date personal information during the registration process.</p>
<p>5. Falsifying personal information is strictly prohibited. Accurate information is vital for the services we provide.</p>
<p>6. We reserve the right to verify the accuracy of the information provided by users to ensure the integrity of our platform.</p>

<p><strong>Data Security:</strong></p>
<p>7. We employ industry-standard security measures to protect your data and ensure its confidentiality.</p>
<p>8. Users must not attempt to breach our security measures or exploit vulnerabilities within the system.</p>
<p>9. If you identify any security concerns or vulnerabilities, it is your duty to report them promptly to the platform administrator.</p>

<p><strong>Adding Bank Account Information:</strong></p>
<p>10. Users may be required to provide valid bank account information for specific services on our platform.</p>
<p>11. Ensure that the bank account information you provide is accurate, complete, and belongs to you. This is crucial for the proper functioning of our services.</p>
<p>12. Please note that we do not store or share sensitive banking information. Your security is a priority.</p>

<p><strong>Phone Numbers and Email Addresses:</strong></p>
<p>13. Users are strongly encouraged to provide valid contact information, including phone numbers and email addresses during registration.</p>
<p>14. We may use the provided contact information to reach out to you for important updates, notifications, or other pertinent matters related to your account and our services.</p>
<p>15. Rest assured that we do not share your contact information with third parties without your explicit consent. Your privacy is of utmost importance to us.</p>

<p><strong>User Conduct:</strong></p>
<p>16. Users are expected to engage in respectful and lawful conduct while using our platform. Harassment, hate speech, or any form of abusive behavior towards our staff will not be tolerated.</p>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
<label class="form-check-label" for="termsCheckbox">
    I Agree
          </label>
        </div>
        </div>

        <!-- Reset Password Button -->
        <a href="resetpassword" class="btn btn-primary mt-2" id="resetPasswordBtn" style="display: none;">Reset Password</a>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>

<script>
  var termsCheckbox = document.getElementById('termsCheckbox');
  var resetPasswordBtn = document.getElementById('resetPasswordBtn');
  var termsCollapse = document.getElementById('termsCollapse');

  termsCheckbox.addEventListener('change', function () {
    if (this.checked) {
      termsCollapse.classList.add('show');
      resetPasswordBtn.style.display = 'block';
    } else {
      termsCollapse.classList.remove('show');
      resetPasswordBtn.style.display = 'none';
    }
  });
</script>



    <?php
    }
    ?>

  <!-- Welcome modal Ends -->  
    <!-- Page Wrapper -->
    <div id="wrapper">

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
           
            <!-- Nav Item - Pages Collapse Menu -->
         
 

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
            <div id="content" style="background-color:#171717;" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color:#222; color:aliceblue">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   
                     

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

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
                                <span class="mr-2 d-none d-lg-inline text-light-800  small "><?php echo $_SESSION['FName']," ", $_SESSION['LName'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php  echo $_SESSION["content1"]?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="contact.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Support
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
  

                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2   text-light" >Your Details</h1>
                    
                            <div class="container-fluid">
                            <?php
session_start(); // Start the session if not already started

// Include your database connection file here
// $conn = mysqli_connect("hostname", "username", "password", "database");

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    
    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM returns WHERE investstatus=1 ORDER BY tdate DESC LIMIT 1";
    $sql3 = "SELECT * FROM client where  email='$email'";

    $stmt = mysqli_prepare($conn, $sql);
     
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    // Handle potential database errors
    if (!$result) {
        die("Database error: " . mysqli_error($conn));
    }
    
    // Fetch the first row (most recent) if it exists
    if ($row = mysqli_fetch_assoc($result)) {
        $filename = $row["filepath"];
        $content = $row["content2"];
        
        // Display the data here as needed
      
        // Calculate total invested amount
        $totalInvested = 0; // Initialize total amount variable

        // Fetch invested column from each row and add to total
        $sqlTotalInvested = "SELECT SUM(invested) AS total_invested FROM returns WHERE email = ?";
        $stmtTotalInvested = mysqli_prepare($conn, $sqlTotalInvested);
        mysqli_stmt_bind_param($stmtTotalInvested, "s", $email);
        mysqli_stmt_execute($stmtTotalInvested);
        $resultTotalInvested = mysqli_stmt_get_result($stmtTotalInvested);

        if ($rowTotalInvested = mysqli_fetch_assoc($resultTotalInvested)) {
            $totalInvested = $rowTotalInvested['total_invested'];
        }
        
         $fr=mysqli_query($conn,$sql3);
        $returnr=mysqli_fetch_assoc($fr) ;
        ?>
    <div class="row">
        <!-- Invested Card -->
        <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card hover-shadow  h-100 py-2" style="border-radius: 15px;color:aliceblue;background-color:#2d2d34; border: #2d2d5d; font-size:13pt;" >
                <div class="card-body d-flex flex-column justify-content-between" >
                    <div>
                        <h4 class=" "><b> Returns</b></h4>
                        <p>Employe ID <?php echo substr($row['account'] ?? '1234', -4) ?></p>
                    </div>
                    
                    <div class="mt-3 ">
                        <p>Date of birth: <?php echo $returnr['tdate']  ?></p>
                        <p >Offer letter Recived <span   style="color:white"><u><b>(<?php echo $returnr['tmode'] ?? 'Mossde' ?>)</b></u></span></p>
                        <p> Full Name <?php echo $returnr['name']; echo " ", $returnr['lname']  ?></p>
                    </div>
                     
                    <div class="mt-3">
                        <a class="btn   text-primary" href="" style="color:#4E69FC">Read More</a>
                    </div>
                </div>
            </div>
           
        </div>
        
       

<!-- #cards section end-->

<?php 
 } else {
    echo "No returns were there to view ";
}

mysqli_stmt_close($stmt);
} else {
echo "Session email not set.";
}

?>
                    <!-- DataTales Example -->
                 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer " style="background-color:#1f1f1f; color:aliceblue">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Abishek Nookathoti</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login">Logout</a>
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
        window.location.href = "login";
        // You can redirect to a logout page or perform other logout actions
    }

    // Start the logout timer when the page loads
    startLogoutTimer();

    // Reset the logout timer when there is any user activity (e.g., mouse move, key press)
    window.addEventListener('mousemove', resetLogoutTimer);
    window.addEventListener('keypress', resetLogoutTimer);
</script>

</body>

</html>
