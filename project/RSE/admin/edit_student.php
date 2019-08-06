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
$id = $_GET['id'];
$res = $admin->getStudentByid($id);
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
	
	 
    <?php $control->sessionMessage(); ?>
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
                 <?php $control->sessionMessage(); ?>

                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Student</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Edit Student</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel" style="">
                                <div class="panel-head">
                                    <h5 class="panel-title">Edit Student</h5>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="controller/student_controller.php"  enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
                                        <input type="hidden" name="old_image" value="<?php echo $res['photo'] ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Name</label>
                                                    <input type="text"  name="name" value="<?php echo $res['name'] ?>" id="name" placeholder="Enter Name" class="form-control" onkeypress="return /[a-z ]/i.test(event.key)" required=""  autocomplete="off">
                                                    <span class="form-text" style="display: none" id="errname">Enter Name</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date">Phone Number</label>
                                                    <input type="text" value="<?php echo $res['phonenumber'] ?>" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="starting digit must be 7/8/9" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required="" id="phone"  name="phone" placeholder="Enter Phone" class="form-control" autocomplete="off">
                                                    <span class="form-text" style="display: none" id="errphone"> Enter Valid Phone Number</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date of birth">Register Number</label>
                                                    <input type="number" value="<?php echo $res['reg_no'] ?>" placeholder="Enter Registration Number" name="regno" class="form-control"  required=""  autocomplete="off">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="date of birth">DOB</label>
                                                    <input type="date" placeholder="Enter DOB" value="<?php echo $res['dob'] ?>" name="dob" class="form-control" id="dob" required=""  autocomplete="off">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4"><span class="form-text" style="display: none" id="errdob">Enter DOB</span>
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" name="gender" required="">
                                                        <option value="">Select Gender</option>
                                                        <option <?php if($res['gender'] == "male"){echo 'selected';} ?> value="male">Male</option>
                                                        <option <?php if($res['gender'] == "female"){echo 'selected';} ?> value="female">Female</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Department</label>
                                                    <select class="form-control" name="dept" required="">
                                                        <option value="">Select Department</option>
                                                        <option <?php if($res['dept'] == "CS"){echo 'selected';} ?> value="CS">CS</option>
                                                        <option <?php if($res['dept'] == "EE"){echo 'selected';} ?> value="EE">EE</option>
                                                        <option <?php if($res['dept'] == "ME"){echo 'selected';} ?> value="ME">ME</option>
                                                        <option <?php if($res['dept'] == "CV"){echo 'selected';} ?> value="CV">CV</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Current Year</label>
                                                    <select class="form-control" name="year" required="">
                                                        <option value="">Select year</option>
                                                        <option <?php if($res['syear'] == "2019"){echo 'selected';} ?> value="2019">2019</option>
                                                        <option <?php if($res['syear'] == "2020"){echo 'selected';} ?> value="2020">2020</option>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Email</label>
                                                   <input type="email" class="form-control" value="<?php echo $res['email'] ?>" required="" placeholder="enter email" id="email" name="email">
                                                    <span class="form-text" style="display: none" id="erremail">Enter Valid Email</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Image</label>
                                                    <input type="file" name="new_image" class="form-control" >
                                                    
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="gender">Address</label>
                                                    <textarea class="form-control" name="address"><?php echo $res['address']; ?></textarea>
                                                    
                                                </div>
                                            </div>
                                           
                                        </div>


                                        <div class="panel-footer text-right">
                                    <input type="submit" class="btn btn-primary m-1" name="update"  value="Add" />
                                </div>


                                    </form>
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

    <script type="text/javascript">
        $('#phone').blur(function() { 
            var phone = $('#phone').val();
            var length = phone.toString().length;


            
            if (length > 10 || length < 10 ) {
                $('#errphone').css('display','block')
                document.getElementById('phone').value = "";
                document.getElementById('phone').focus();
                // $('#phone').focus();

            }else{
                 $('#errphone').css('display','none')   
            }
          })

        $('#name').blur(function() { 
            var name = $('#name').val();
           
            
            if (name == "" ) {
                $('#errname').css('display','block')
                document.getElementById('name').value = "";
                document.getElementById('name').focus();
                // $('#phone').focus();

            }else{
                 $('#errname').css('display','none')   
            }
          })




            $('#email').blur(function() {  
 
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var emailblockReg =
             /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)(?!rediff.com)(?!outlook.com)(?!mail.com)(?!zoho.com)(?!protonmail.com)(?!runbox.com)(?!ymail.com)([\w-]+\.)+[\w-]{2,4})?$/;

            var emailaddressVal = $("#email").val();

            if(emailaddressVal == '') {
                $('#erremail').css('display','block');
            }

            else if(!emailReg.test(emailaddressVal)) {
              $('#erremail').css('display','block');
              document.getElementById('email').value = "";
              document.getElementById('email').focus();
            }

            else if(emailblockReg.test(emailaddressVal)) {
              $('#erremail').css('display','block');
              document.getElementById('email').value = "";
              document.getElementById('email').focus();
            } else {
                $('#erremail').css('display','none');
            }


            });

    </script>


</body>
</html>