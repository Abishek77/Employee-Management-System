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
    <link rel="icon" type="image/png" href="https://static.wixstatic.com/media/f5bc3d_8e885578a3fb44bfac3d8b599325d4a1~mv2.png/v1/fill/w_116,h_116,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled%20design%20(12).png">

    <title>Client</title>

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
<style> 
/* Add this CSS to your stylesheet */
table tbody tr {
    border-radius: 20px;
    transition: background-color 0.3s, box-shadow 0.3s; /* Add smooth transition */
}

table tbody tr:hover {
    background-color: #121212; /* Darker background on hover */
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2); 
     
}
 
tbody tr{
    border-bottom: none;
}

 
.scard{
    box-shadow: inset 0 0 1px 1px hsla(0, 0%, 100%, 0.1);
}
/* Add this CSS to your stylesheet */
.dataTables_wrapper .dataTables_filter input[type="search"] {
    background-color: #2d2d34;
    color: white; /* Set text color to white for visibility */
    padding: 5px 10px; /* Adjust padding as needed */
    
    border: 1px solid #171717; /* Remove border */
     
}

 

.dataTables_wrapper .dataTables_length select, 
.dataTables_wrapper .dataTables_paginate .paginate_button {
    background-color: #2d2d34;
    color: white; /* Set text color to white for visibility */
    border: none;
}
.card{
    box-shadow: inset 0 0 0.5px 1px hsla(0, 0%, 100%, 0.1);
    width: 65%;
    border-radius: 15px;
    border: none;
    margin-left:15%;
    transition: transform 0.4s; /* Add transition for smooth animation */
}
.card-body:hover h4 {
            color: white;
        }
        .card-body h4{
            color: gray;
            font-weight: 600;
        }
 .card:hover{
    transform: scale(1.2);
box-shadow:  0 0 15px 5px #2d2d5d;
 }
</style>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content -->
    <div class="modal-content bg-light">
      <div class="brand-icon text-center" style="padding: 20px;">
        <img src="https://static.wixstatic.com/media/f5bc3d_8e885578a3fb44bfac3d8b599325d4a1~mv2.png/v1/fill/w_114,h_114,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled%20design%20(12).png" style="width: 120px; padding-left: 1px; font-weight: 800;" />
        <h3>Assignment</h3>
      </div>
      <div class="modal-header">
        <h2 class="modal-title" style="padding-left: 50px;">Welcome, <?php echo $_SESSION["FName"], " ", $_SESSION["LName"]; ?>!</h2>
      </div>
      <div class="modal-body">
        <p>Hi <span class="text-primary"><?php echo $_SESSION["FName"], " ", $_SESSION["LName"]; ?></span> Please reset your password <a href="resetpassword.php">Reset Password</a></p>

        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="termsCheckbox">
          <label class="form-check-label" for="termsCheckbox">
            I agree to the <a href="#termsCollapse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="termsCollapse">Terms and Conditions</a>
          </label>
        </div>

        <!-- Collapsible Content -->
        <div class="collapse" id="termsCollapse">
          <p>This is the Terms and Conditions content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <!-- Reset Password Button -->
        <a href="resetpassword.php" class="btn btn-primary mt-2" id="resetPasswordBtn" style="display: none;">Reset Password</a>
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
        <ul class="navbar-nav   sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #111;">

            <!-- Sidebar - LOgo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon " >
                    <img src="https://static.wixstatic.com/media/f5bc3d_8e885578a3fb44bfac3d8b599325d4a1~mv2.png/v1/fill/w_114,h_114,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Untitled%20design%20(12).png" style="width:75px; padding-left:1px; font-wight:800"/>
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
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Returns</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Clients list:</h6>
                        <a class="collapse-item" href="home">View</a>
                         
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Invested</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Invested Amount</h6>
                        <a class="collapse-item" href="topup">View</a>
                         
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
            <div id="content" style="background-color:#171717">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color:#222">

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
                                <span class="mr-2 d-none d-lg-inline text-light-600 small"><?php echo $_SESSION['FName']," ", $_SESSION['LName'] ?></span>
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
                    <h1 class="h3 mb-2 text-light">Returns Details</h1>
                    <p class="mb-4 text-danger"> <a target="_blank"
                            href="">Check the Topup's</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card hover-shadow mb-4  " style="background-color:#2d2d34">
                        <div class="card-header py-3" style="background-color:#111">
                            <h6 class="m-0 font-weight-bold text-primary">Returns</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <div class="table-search" style="margin:10px">
    <input type="number" id="searchInput" placeholder="Enter the date"  style="border-radius:20px; background:none; border:0.5px solid white; color:white">
</div>

<table class="table text-light" id="dataTable" width="100%" cellspacing="1">
    <thead>
        <tr>
            <th>Transaction Date</th>
            <th>Attachments</th>
            <th>Returns</th>
        </tr>
    </thead>
                                    
                                    <tbody>
                                    <?php include 'database.php';?>
                                    <?php 
    $email = $_SESSION["email"];
    $sq3 = "SELECT * FROM returns WHERE email = '$email' AND investstatus='0' ORDER BY DATE_FORMAT(tdate, '%Y-%m')  Desc";
    $result = mysqli_query($conn, $sq3) or die("db lost");
    error_reporting(0);

    while ($row = mysqli_fetch_assoc($result)) {
        // Skip the row if 'returns' is null
        

        $filename = $row["filepath"];
        $content = $row["content2"];
?>

<tr> 
     
    <td><?php echo $row['tdate']?></td> 
    <td><?php if (!empty($content)): ?>
        <a href="<?php echo $content; ?>" download>Attachment</a>
    <?php else: ?>
        No Attachment
    <?php endif; ?></td>
    
    <td><?php echo $row['returns']?>/rs</td>
</tr>

<?php 
    }
?>
                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer  " style="background-color:#222">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; NDU CAPITAL 2023</span>
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
    
  <script>
    const progressBar = document.getElementById("progress-bar");
    const percentageInput = document.getElementById("percentage");

    percentageInput.addEventListener("change", () => {
      const percentage = parseInt(percentageInput.value);
      if (!isNaN(percentage) && percentage >= 0 && percentage <= 100) {
        progressBar.style.width = `${percentage}%`;
        progressBar.setAttribute("aria-valuenow", percentage);
      }
    });
  </script>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#searchInput").on("keyup", function () {
            var searchText = $(this).val().toLowerCase();

            $("#dataTable tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
            });
        });
    });
    
</script>

</body>

</html>
