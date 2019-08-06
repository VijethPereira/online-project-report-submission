<?php define('DIR', '');
require_once DIR . 'config.php';

$faculty = new Faculty();

if (isset($_POST['faculty'])) 
{
  $name = $_POST['name'];  
  $password = $_POST['password']; 

   if(strlen(trim($name))>=1 && strlen(trim($password))>=1){
      $res=$faculty->loginFaculty($name,$password);
      if($res){
      	 $_SESSION['success_message'] = "Logged Successfully!!!";
         $faculty->redirect('faculty/index');
      }else{
		      $_SESSION['error_message'] = "Invalid Faculty Login !!!";
         $faculty->redirect('index');
      }
   }
}

?>