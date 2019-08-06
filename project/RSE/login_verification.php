<?php define('DIR', '');
require_once DIR . 'config.php';

$admin = new Admin();

if (isset($_POST['login'])) 
{
  $name = $_POST['name'];  
  $password = $_POST['password']; 

   if(strlen(trim($name))>=1 && strlen(trim($password))>=1){
      $res=$admin->loginAdmin($name,$password);
      if($res){
      	 $_SESSION['success_message'] = "Logged Successfully!!!";
         $admin->redirect('admin/index');
      }else{
		      $_SESSION['error_message'] = "Invalid Login !!!";
         $admin->redirect('index');
      }
   }
}

?>