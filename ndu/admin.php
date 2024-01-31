<?php include 'database.php';?>
<?php
session_start();
require_once "authentication.php"; // Include your authentication functions

requireLogin(); // Ensure the user is logged in

if (!isAdmin()) {
    header("Location: index.php");
}

?>
 
<!-- Rest of the client dashboard page HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMIN</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <!-- Include SweetAlert2 CSS and JS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/js/bootstrap.min.js"></script>
<style>
        /* Custom styling for the icon and input field */
        .input-group-text.date-icon {
            background-color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .input-group-text.date-icon:hover {
            background-color: #f0f0f0;
        }

        .datepicker-dropdown {
            transform: translate(0, 10px) !important;
        }

        /* Add spacing between calendar columns */
        .datepicker table tr td {
            padding: 0.5rem;
        }
    </style>

</head>

<?php

  
 $email = $_SESSION["email"];
 $sql2 = "SELECT name, userstatus, lname FROM client WHERE email = '$email'"; // Enclose $email in single quotes
 $result = mysqli_query($conn, $sql2) or die("db lost");
 error_reporting(0);
 
 while ($table = mysqli_fetch_assoc($result)) {
     $_SESSION["FName"] = $table["name"];
     $_SESSION["LName"] = $table["lname"];
 
     $_SESSION["userstatus"] = $table["userstatus"];
 }
  
 
if($_SESSION['userstatus']==0){
    //show welcome model msg here
 

?>
 
<body id="page-top">
<?php
if (isset($_SESSION["insert_success"]) && $_SESSION["insert_success"]) {
    unset($_SESSION["insert_success"]);
    echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Profile inserted successfully!',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });
    </script>";
}
?>
 <!-- Welcome modal STARTS -->  
 <script> 
$(document).ready(function(){
    $("#myModal").modal('show');
});
</script>
          <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content bg-light">
    <div class="brand-icon text-center" style="padding: 20px;  ">
           
                         <h3>Assignment</h3>
                </div>
      <div class="modal-header  ">
      
        <h2 class="modal-title" style="padding-left:50px">"Welcome, <?php echo $_SESSION["FName"], " ", $_SESSION["LName"]  ?>!"</h2>
      </div>
      <div class="modal-body">
        <p>Hi <span class="text-primary"><?php echo $_SESSION["FName"], " ", $_SESSION["LName"]  ?> </span>Please reset your password <a href="resetpassword.php">Reset Password</a> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <?php
    }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar"  >

            <!-- Sidebar - Logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon " >
                    
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Users
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Users</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Clients list:</h6>
                        <a class="collapse-item" href="tables.php">All users</a>
                       
                         
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
               
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Topup Updates:</h6>
                        <a class="collapse-item" href="topup.php">Top Up's</a>
                         
                    </div>
                </div>
            </li>

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
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["FName"], " ", $_SESSION["LName"] ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
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
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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
                    <h1 class="h3 mb-4 text-gray-800">Add User's</h1>

                </div>
                <!-- Client details form -->
                <!-- Begin Page Content -->
 
    <!-- Client Details Form php######################## stsrts from here-->
     
         
    <!-- Centering Container -->
    <div class="d-flex justify-content-center ">

        <!-- Client Details Card -->
        <div class="card shadow bg-gradient-dark" style="width: 50%; background-color: #f8f9fc; border-radius: 13px;">
            <div class="card-header">
                Users Information
            </div>
            <div class="card-body">
                <form action="clientinput.php" method="POST" enctype="multipart/form-data">
                    <div class="row">	
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name ="fname" required class="form-control" id="firstName" placeholder="Enter first name" style="border-radius: 18px">
                            </div>
                            
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name ="lname" class="form-control" id="lastName" placeholder="Enter last name" style="border-radius: 18px;">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name ="email" required class="form-control" id="email" placeholder="Enter email" style="border-radius: 18px">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name ="password" required class="form-control" id="password" placeholder="Enter password" style="border-top-left-radius: 18px; border-bottom-left-radius: 18px;">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"  >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Suggested password: <span id="suggestedPassword"></span>
                                </small>
                                <button type="button" class="btn text-light bg-gradient-secondary mt-2" id="suggestPassword">Suggest Password</button>
                            </div>
                            <div class="form-group">
                                <label for="firstName">Refer Code</label>
                                <input type="text" name ="ifsc" required class="form-control" id="firstName" placeholder="Refer Code" style="border-radius: 18px">
                            </div>

                            
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="tel" name ="phone" class="form-control" id="phoneNumber" placeholder="Enter phone number" style="border-radius: 18px">
                            </div>
                            <div id="datepicker-section">
    <div class="form-group">
        <label for="firstName">Date of Birth</label>
        <div class="input-group">
            <input type="text" name="tdate" required class="form-control datepicker" id="tdate" placeholder="Transaction Date" style="border-top-left-radius: 18px; border-bottom-left-radius: 18px;">
            <div class="input-group-append">
                <span class="input-group-text date-icon">
                    <i class="fas fa-calendar"></i>
                </span>
            </div>
        </div>
    </div>
</div>
   
    <div class="form-group">
        <label for="tmode">Recived Offer letter</label>
        <select name="tmode" required class="form-control" id="tmode" style="border-radius: 18px">
            <option value="" disabled selected>Recived Offer letter</option>
            <option value="Yes">Yes</option>
            <option value="NO">No</option>
        </select>
    </div>
 
                              <div class="form-group">
                                <label for="firstName">Employe ID</label>
                                <input type="text" name ="tid"  class="form-control" id="firstName" placeholder="Employe ID" style="border-radius: 18px">
                            </div>
                            <div class="form-group">
                                <label for="firstName">Bank Name</label>
                                <input type="text" name ="bankname" required class="form-control" id="firstName" placeholder="Bank Name" style="border-radius: 18px">
                            </div>
                            <div class="form-group">
            <label for="firstName">Account No</label>
            <input type="text" name="account" id="account" onchange="myFunction()" required class="form-control" placeholder="Account No" style="border-radius: 18px"  >
        </div>
        <div class="form-group">
            <label for="firstName">Confirm Account No</label>
            <input type="text" name="accounts" id="cnfaccount" onchange="myFunction()" required class="form-control" placeholder="Confirm Account No" style="border-radius: 18px"  >
        </div><p id="msg">Not matched</p>

                            <div class="form-group">
    <label for="transactionAttachments">Profile image</label>
    <input type="file" id="file" name="file1" class="form-control-file" id="transactionAttachments" style="border-radius: 18px" accept=".jpeg, .jpg, .png">
    <small id="fileError" class="form-text text-danger" style="display: none;">Please select a JPEG or PNG file.</small>
</div>
                        </div>
                    </div>
                    <button type="submit" id="submit" diabled name="submit" class="btn text-light bg-gradient-primary" style="margin-left: 85%;" >Create</button>
                </form>
            </div>
        </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script>
        document.getElementById("suggestPassword").addEventListener("click", function() {
            // Generate a random password suggestion (simplified, not secure)
            var passwordField = document.getElementById("password");
            var suggestedPassword = generateRandomPassword(10); // Change the length as needed
            passwordField.value = suggestedPassword;
        });
    
        // Simple random password generator
        function generateRandomPassword(length) {
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            return password;
        }
    </script>
    
    <script>
        var togglePassword = document.getElementById("togglePassword");
        var passwordField = document.getElementById("password");
        var suggestedPassword = document.getElementById("suggestedPassword");
        var suggestPasswordButton = document.getElementById("suggestPassword");
    
        togglePassword.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    
        suggestPasswordButton.addEventListener("click", function() {
            var generatedPassword = generateRandomPassword(12); // Change the length as needed
            suggestedPassword.textContent = generatedPassword;
            passwordField.value = generatedPassword;
        });
    
        function generateRandomPassword(length) {
            var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+";
            var password = "";
            for (var i = 0; i < length; i++) {
                var randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            return password;
        }
    </script>

<script>
function validateFile() {
    const fileInput = document.getElementById("file");
    const fileError = document.getElementById("fileError");
    
    const allowedExtensions = ["jpeg", "jpg", "png"];
    const selectedFile = fileInput.files[0];
    
    if (selectedFile) {
        const fileExtension = selectedFile.name.split('.').pop().toLowerCase();
        if (allowedExtensions.indexOf(fileExtension) === -1) {
            fileError.style.display = "block";
            fileInput.value = ""; // Clear the input field
        } else {
            fileError.style.display = "none";
        }
    }
}
</script>
<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        // Set current date as the default value
        var currentDate = new Date();
        $('.datepicker').datepicker('setDate', currentDate);

        // Open datepicker when clicking the icon
        $('.date-icon').on('click', function() {
            $(this).closest('.input-group').find('.datepicker').datepicker('show');
        });

        // Set selected date to the input field
        $('.datepicker').on('changeDate', function() {
            $(this).val(
                new Date($(this).datepicker('getDate')).toISOString().split('T')[0]
            );
        });
    });
</script>
<!-- Include jQuery and Bootstrap JS -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tmodeSelect = document.getElementById('tmode');
        var tmodeInput = document.getElementById('tmodeInput');

        tmodeSelect.addEventListener('change', function() {
            var selectedValue = tmodeSelect.value;
            tmodeInput.value = selectedValue;
        });
    });
</script>
<script>
   document.getElementById("submit").disabled = true;
    function myFunction() {
        var accountField = document.getElementsByName('account')[0].value;
        var confirmAccountField = document.getElementsByName('accounts')[0].value;
        if (accountField === confirmAccountField){
        document.getElementById("msg").innerHTML = "Account Number matched";
        document.getElementById("msg").style.color = "white";
        document.getElementById("submit").disabled = false;
        // You can also display the confirmAccountField if needed.
        } 
        else{
            document.getElementById("msg").innerHTML = "Account not matched";
            document.getElementById("msg").style.color = "red";
            document.getElementById("submit").disabled = true;
        }
    }
</script>
</body>

</html>
