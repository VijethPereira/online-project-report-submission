<?php define('DIR', '');
require_once DIR . 'config.php';

$student = new Student();

if (isset($_POST['student'])) 
{
  $name = $_POST['name'];  
  $password = $_POST['password']; 

   if(strlen(trim($name))>=1 && strlen(trim($password))>=1){
      $res=$student->loginStudent($name,$password);
      if($res){
      	 $_SESSION['success_message'] = "Logged Successfully!!!";
         $student->redirect('student/index');
      }else{
		      $_SESSION['error_message'] = "Invalid Batch Login !!!";
         $student->redirect('index');
      }
   }
}

?>