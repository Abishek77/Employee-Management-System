
<?php
session_start();
require_once "authentication.php"; // Include your authentication functions
requireLogin(); // Ensure the user is logged in
if (!isAdmin()) {
    header("Location: index.php");
}?>
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
    <?php include 'database.php';?>
     <!-- php database connection estabisment #####################-->
    	<?php  
	#connecting to database
 
	$sql1 = "SELECT * FROM client";
	$result1 = mysqli_query( $conn, $sql1 ) or die( "db lost" );
	
	
	?>   


<style>
 .form-control{
    color:white;
 }
 .search{
    border: none;
    background-color: #5a5c69;
 }
 
 </style>
</head>	

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - LOgo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href=" ">
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

 
 

            
            
    
            <hr class="sidebar-divider d-none d-md-block">
 
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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
                                        <input type="text" class="form-control bg-light border-0 small search"
                                            value="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2" >
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
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
                    <h1 class="h3 mb-2 text-gray-800">User List</h1>
                    <p class="mb-4 text-danger">The changes made here will reflect the clients database <a  
                            href="admin.php">Back</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 bg-dark">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="display:none">id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>                                        
                                            <th>Date of birth</th>
                                            
                                            <th>Offer Letter</th>
                            
                                            <th>Employee Id</th>
                                            <th>Bank Name</th>
                                            <th>Account</th>
                                            <th>Refer Code</th>
                                            
                                            
                                            <th>Profile image</th>
                                           
                                             
                                            <th>Update</th>
                                            <th>Delete</th>
                                            <th>User Status</th>
                                             
                                        </tr>
                                    </thead>
                                                                         <tbody>                             
                                        <tr>
                                        <form action ="tablesupdate.php" method="POST" enctype="multipart/form-data">
                                            <td style="display:none">
                                            <input id="id" type="text" class="form-control search"  ></td>

                                            <td><input id="name" required type="text" class="form-control search"  ></td>
                                            <td><input id ="lname" required type="text" class="form-control search" ></td>
                                            <td><input id="email" required type="text" class="form-control search"  ><p class="text-dark"></p></td>
                                            <td><input id="phone" required type="text" class="form-control search" ></td>
                                            <td><input type="text" required id="tdate" class="form-control search"  ><p class="text-dark"></p></td>
                                            
                                            <td><input type="text" required id="tmode" class="form-control search"  ></td>
                                            <td><input type="text" required id="tid" class="form-control search"  ></td>  
                                            <td><input type="text"   id="bank" class="form-control search"  ></td>  
                                            <td><input type="text"  id="account" class="form-control search" ></td>  
                                            <td><input type="text"  id="ifsc" class="form-control search"  ></td>  
                                            <td><input type="file"  id="file2"  ></td>  
                                               
                                            <td> <button id="update" type="button" onclick="updateRecords()" class="btn-secondary btn"> update </button> </td>
                                            <td>
                                            <button type="button" onclick="deletes()" class="btn-secondary btn">Delete</button>
                                            </td>
                                            <td> <button type="button" onclick="access()" class="btn-secondary btn">Approve</button></td>

                                                                                         </form>	
                                        </tr>
                                        
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

    <script>
  function updateRecords(){
      var name = $('#name').val();
      var lname = $("#lname").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var tdate = $("#tdate").val();
      var tmode = $("#tmode").val();
      var tid = $("#tid").val();
      var bank = $("#bank").val();
      var account = $("#account").val();
      var ifsc = $("#ifsc").val();
      var id = 74;
        
       
      $.ajax({
            url:'tablesupdate.php',
            type:'POST',
            
            data:{ name: name,lname:lname,email:email,phone:phone,tdate:tdate,tmode:tmode,tid:tid,bank:bank,account:account,
            ifsc: ifsc, id:id

            },
            success:function(data, status){
                 alert('done')
            }
      });

  }

  function deletes(){
   var id=76;
    $.ajax({
        url:'delete.php',
        type:'POST',
        data:{id:id},
        success:function(data, status) 
        {
            alert("deleted")
        }
    });
    
  }
       function access() {
    var id = 74;
    $.ajax({
        url: 'approve.php',
        type: 'POST',
        data: { id: id },
        success: function (data, status) {
            console.log("Approved");
        }
    });
}

        
  
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

</body>

</html>
