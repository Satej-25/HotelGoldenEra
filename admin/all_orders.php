<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

</head>

<body class="fix-header fix-sidebar">
   
    
  
<div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

                <!-- Logo Section -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        <span><img src="images/gelogo2.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>

                <!-- Navbar Content -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- Empty for spacing -->
                    </ul>

                    <!-- Admin Image on Right -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Admin Image Here -->
                                <img src="images/admin.jpeg" alt="admin" class="profile-pic" style="height:100px; width:auto; border-radius:50%;" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>

       

    </div>
      
        <div class="left-sidebar">
       
            <div class="scroll-sidebar">
             
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_admin.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Admin</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Golden Era</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_restaurant.php">All Branches</a></li>
								<li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_restaurant.php">Add Branch</a></li>
                            </ul>
                        </li>
                      <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_menu.php">All Menues</a></li>
								<li><a href="add_menu.php">Add Menu</a></li>
                              
                                
                            </ul>
                        </li>
						 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                         
                    </ul>
                </nav>
        
            </div>
     
        </div>
    
        <div class="page-wrapper">
      
            
      
            <div class="container-fluid">
           
                <div class="row">
                    <div class="col-12">
                        
                       
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">All Orders</h4>
                            </div>
                             
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>Table Number</th>		
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
												<th>Status</th>												
												 <th>Reg-Date</th>
												  <th>Action</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody id="orders-table-body">
    
                                        </tbody>

                                    </table>
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
   
    </div>
    
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
function fetchOrders() {
    $.ajax({
        url: 'fetch_orders.php',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            let tbody = '';
            if (data.length === 0) {
                tbody = '<tr><td colspan="8"><center>No Orders</center></td></tr>';
            } else {
                data.forEach(function(order) {
                    let statusBtn = '';
                    switch(order.status) {
                        case '':
                        case 'NULL':
                            statusBtn = '<button class="btn btn-info"><span class="fa fa-bars"></span> Dispatch</button>';
                            break;
                        case 'in process':
                            statusBtn = '<button class="btn btn-warning"><span class="fa fa-cog fa-spin"></span> On The Way!</button>';
                            break;
                        case 'closed':
                            statusBtn = '<button class="btn btn-primary"><span class="fa fa-check-circle"></span> Delivered</button>';
                            break;
                        case 'rejected':
                            statusBtn = '<button class="btn btn-danger"><i class="fa fa-close"></i> Cancelled</button>';
                            break;
                    }

                    tbody += `<tr>
                        <td>${order.table_no}</td>
                        <td>${order.title}</td>
                        <td>${order.quantity}</td>
                        <td>$${order.price}</td>
                        <td>${statusBtn}</td>
                        <td>${order.date}</td>
                        <td>
                            <a href="delete_orders.php?order_del=${order.o_id}" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o"></i></a>
                            <a href="view_order.php?user_upd=${order.o_id}" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>`;
                });
            }
            $('#orders-table-body').html(tbody);
        }
    });
}

// Call fetchOrders every 5 seconds
setInterval(fetchOrders, 500);

// Call once on page load
$(document).ready(fetchOrders);
</script>

</body>

</html>