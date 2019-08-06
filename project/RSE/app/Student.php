
<?php
/**
 * Created by PhpStorm.
 * User: your name
 * Date: todays date
 * Time: todays time
 */

class Student extends Main
{
	

	protected $id;

 public function __construct()
 {
  $this->id = $_SESSION['student'];
  parent::__construct();
}


public function loginStudent($name,$password)
{
 try{

   $stmnt=$this->conn->prepare("select id from tbl_batch_group where batch_number=:batch_number AND batch_password=:batch_password");
   $stmnt->bindParam("batch_number", $name,PDO::PARAM_STR) ;
   $stmnt->bindParam("batch_password", $password,PDO::PARAM_STR) ;
   $stmnt->execute();
   $count=$stmnt->rowCount();
   $res=$stmnt->fetch(PDO::FETCH_ASSOC);
   $id = $res['id'];
   if($count){
     $_SESSION['student']= $id;
     return true;
   }else{
     return false;
   }

 }catch(PDOException $e) {
   echo $e->getMessage();
   return false;
 }

}


public function get_project_batch(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where batch_group='$this->id'");
   $stmt->execute();
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow;
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}



public function get_pfac($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_faculty where id='$id'");
   $stmt->execute();
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow;
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}






public function get_pbatch($bid){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where id='$bid'");
   $stmt->execute();
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow;
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}




public function getTitle($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_title where id=:id");
   $stmt->execute(array(':id'=>$id));
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow;
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}

public function get_batch_student($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_group where batch_group_id='$id'");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_project_upload_phase($phaseid,$batchid){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_upload where phase_id='$phaseid' and batch_id='$batchid'");
   $stmt->execute();
   $count = $stmt->rowCount();
   return $count; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_project_upload_phase_id($phaseid,$batchid){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_upload where phase_id='$phaseid' and batch_id='$batchid'");
   $stmt->execute();
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function getPhasebyid($id){
    try {
      $stmt = $this->conn->prepare("SELECT * FROM tbl_phase where id=:id");
      $stmt->execute(array(':id'=>$id));
      $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
      return $editRow;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }


  public function get_batch_completed($id){
    try {
      $stmt = $this->conn->prepare("SELECT * FROM tbl_upload where batch_id='$id' and project_status='completed'");
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

    public function get_pgroup($bid){
    try {
      $stmt = $this->conn->prepare("SELECT ts.name as tname FROM tbl_group tg 
        inner join tbl_student ts on ts.id=tg.student_id
        where tg.batch_group_id='$bid'");
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }



public function getStudentbyid($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_student where id=:id");
   $stmt->execute(array(':id'=>$id));
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow;
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}

public function getTeacher($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_faculty where id=:id");
   $stmt->execute(array(':id'=>$id));
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   return $editRow;
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_phase($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase_year WHERE id='$id'");
   $stmt->execute();
   $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
   $id = $editRow['id'];
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase WHERE batch_year='$id'");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}

public function upload_docs($phase,$faculty,$image,$date){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_upload(phase_id,batch_id,faculty_id,uploaded_file,uploaded_date) VALUES(:phase_id,:batch_id,:faculty_id,:uploaded_file,:uploaded_date)");
    $stmt->bindparam(":phase_id", $phase);
    $stmt->bindparam(":batch_id", $this->id);
    $stmt->bindparam(":faculty_id", $faculty);
    $stmt->bindparam(":uploaded_file", $image);
    $stmt->bindparam(":uploaded_date", $date);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}



public function update_docs($id,$image,$date){
 try {

  $status = 2;
  $stmt = $this->conn->prepare("UPDATE tbl_upload SET uploaded_file=:uploaded_file,uploaded_date=:uploaded_date,status=:status where id=:id");

  $stmt->bindparam(":uploaded_file", $image);
  $stmt->bindparam(":uploaded_date", $date);
  $stmt->bindparam(":status", $status);
  $stmt->bindparam(":id", $id);
  $stmt->execute();
  return true;
} catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}



  public function getBatchGroupbyid($id){
    try {
      $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where id=:id");
      $stmt->execute(array(':id'=>$id));
      $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
      return $editRow;
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function change_password($pswd,$bid){
  try {
    
    $stmt = $this->conn->prepare("UPDATE tbl_batch_group SET batch_password=:pwd where id=:bid");
    $stmt->bindparam(":pwd", $pswd);
    $stmt->bindParam(":bid", $bid);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}


}