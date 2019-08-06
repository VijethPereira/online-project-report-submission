<?php
/**
 * Created by PhpStorm.
 * User: your name
 * Date: todays date
 * Time: todays time
 */
define('DIR', '../');
require_once DIR . 'config.php';

$control = new Controller();  
$control->notLogged('admin', '../index');
$admin = new Admin();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home</title>
	<?php $control->getAdminCSS(DIR); ?>
</head>
<body>
	
	 
     <!--  <div class="loader-wrapper">
        <div class="loader spinner-3">
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
        </div>
    </div> -->
    
    <div class="wrapper">
        <!-- Main Container -->
        <div id="main-wrapper" class="menu-fixed page-hdr-fixed">
            <!-- Menu Wrapper -->
            <?php $control->getAdminsidebar(DIR); ?>
            <?php $control->getAdmintopbar(DIR); ?>
            <!-- Page header -->
           
            <!-- Main Page Wrapper -->
            <div class="page-wrapper">
                <!-- Page Title -->

                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Faculty</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>View Faculty</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                 <?php $control->sessionMessage(); ?>
                            
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <h5 class="panel-title">All Faculty</h5>

                                </div>
                                <div class="panel-body">
                                    <table id="data-table-5" class="table table-striped table-bordered basic-datatable" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Date of Birth</th>
                                                <th>Department</th>
                                                <th>Date of Joining</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $stmt = $admin->get_faculty();
                                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>

                                                <tr>
                                                    <td><img style="width: 50px" src="../assets/faculty/<?php echo $row['photo'] ?>"></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td><?php echo $row['dob']; ?></td>
                                                <td><?php echo $row['dept']; ?></td>
                                                <td><?php echo $row['doj']; ?></td>
                                                <td><a href="edit_faculty.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" title="">Edit</a>
                                                    <a href="controller/delete_faculty.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" title="">Delete</a>
                                                </td>
                                                </tr>

                                            <?php } ?>
                                            
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Page Footer -->
            <div class="page-ftr">
                <div>© 2019. RSE</div>
            </div>
        </div>
        <!-- Sidebar Section -->
        <!-- End Sidebar Section -->
    </div>      
    
    <?php $control->getAdminJS(DIR); ?>


</body>
</html>
