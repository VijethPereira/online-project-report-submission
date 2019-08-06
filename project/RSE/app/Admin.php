<?php
/**
 * Created by PhpStorm.
 * User: your name
 * Date: todays date
 * Time: todays time
 */

class Admin extends Main
{
	

	protected $id;

 public function __construct()
 {
  $this->id = $_SESSION['admin'];
  parent::__construct();
}


public function loginAdmin($name,$password)
{
 try{
   $stmnt=$this->conn->prepare("select id from tbl_admin where name=:name AND password=:password");
   $stmnt->bindParam("name", $name,PDO::PARAM_STR) ;
   $stmnt->bindParam("password", $password,PDO::PARAM_STR) ;
   $stmnt->execute();
   $count=$stmnt->rowCount();
   $res=$stmnt->fetch(PDO::FETCH_ASSOC);
   $id = $res['id'];
   if($count){
     $_SESSION['admin']= $id;
     return true;
   }else{
     return false;
   }

 }catch(PDOException $e) {
   echo $e->getMessage();
   return false;
 }

}



public function add_student($name,$phone,$email,$address,$year,$dob,$gender,$dept,$image,$regno){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_student(name,reg_no,phonenumber,email,address,gender,dob,dept,syear,photo) VALUES(:name,:reg_no,:phonenumber,:email,:address,:gender,:dob,:dept,:syear,:photo)");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":reg_no", $regno);
    $stmt->bindparam(":phonenumber", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":address", $address);
    $stmt->bindparam(":gender", $gender);
    $stmt->bindparam(":dob", $dob);
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":syear", $year);
    $stmt->bindparam(":photo", $image);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}


public function add_group($dept,$batch,$bno,$password,$student){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_batch_group(batch_number,batch_password,batch_year) VALUES(:batch_number,:batch_password,:batch_year)");
    $stmt->bindparam(":batch_number", $bno);
    $stmt->bindparam(":batch_password", $password);
    $stmt->bindparam(":batch_year", $batch);
    $stmt->execute();

    $last_id = $this->conn->lastInsertId();

    $length = count($student);
    for ($i = 0; $i < $length; $i++) {
      $stmt = $this->conn->prepare("INSERT INTO tbl_group(batch_group_id,batchyear,dept,student_id) VALUES(:batch_group_id,:batchyear,:dept,:student_id)");
      $stmt->bindParam(":batch_group_id", $last_id);
      $stmt->bindParam(":batchyear", $batch);
      $stmt->bindParam(":dept", $dept);
      $stmt->bindParam(":student_id", $student[$i]);
      $stmt->execute();

    }



    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}



public function add_phase($batch,$phase,$desc,$dcontent,$duedate,$marks,$attachment,$note){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_phase_year(phase_year) VALUES(:phase_year)");
    $stmt->bindparam(":phase_year", $batch);
    $stmt->execute();

    $last_id = $this->conn->lastInsertId();

    $length = count($phase);
    for ($i = 0; $i < $length; $i++) {
      $stmt = $this->conn->prepare("INSERT INTO tbl_phase(batch_year,phase_type,description,deliverable_content,due_date,attachment,marks,note) VALUES(:batch_year,:phase_type,:description,:deliverable_content,:due_date,:attachment,:marks,:note)");
      $stmt->bindParam(":batch_year", $last_id);
      $stmt->bindParam(":phase_type", $phase[$i]);
      $stmt->bindParam(":description", $desc[$i]);
      $stmt->bindParam(":deliverable_content", $dcontent[$i]);
      $stmt->bindParam(":due_date", $duedate[$i]);
      $stmt->bindParam(":attachment", $attachment[$i]);
      $stmt->bindParam(":marks", $marks[$i]);
      $stmt->bindParam(":note", $note[$i]);
      $stmt->execute();

    }



    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}




public function add_extraphase($id,$phase,$desc,$dcontent,$duedate,$marks,$attachment,$note){
  try {
    


      $stmt = $this->conn->prepare("INSERT INTO tbl_phase(batch_year,phase_type,description,deliverable_content,due_date,attachment,marks,note) VALUES(:batch_year,:phase_type,:description,:deliverable_content,:due_date,:attachment,:marks,:note)");
      $stmt->bindParam(":batch_year", $id);
      $stmt->bindParam(":phase_type", $phase);
      $stmt->bindParam(":description", $desc);
      $stmt->bindParam(":deliverable_content", $dcontent);
      $stmt->bindParam(":due_date", $duedate);
      $stmt->bindParam(":attachment", $attachment);
      $stmt->bindParam(":marks", $marks);
      $stmt->bindParam(":note", $note);
      $stmt->execute();




    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}



public function add_extra_sgroup($dept,$batch,$id,$student){
  try {
    $stmt = $this->conn->prepare("INSERT INTO  tbl_group(batch_group_id,batchyear,dept,student_id) VALUES(:batch_group_id,:batchyear,:dept,:student_id)");
    $stmt->bindparam(":batch_group_id", $id);
    $stmt->bindparam(":batchyear", $batch);
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":student_id", $student);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}




public function get_student(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_student WHERE status = 0");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}



public function get_batch_count($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_group WHERE batch_group_id='$id'");
   $stmt->execute();
   $count = $stmt->rowCount();
   return $count; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}




public function get_phase($y){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase_year WHERE phase_year='$y'");
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


public function get_faculty(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_faculty WHERE status = 0");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}

public function get_batch(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function getBatchCount($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where batch_year='$year'");
   $stmt->execute();
   $count = $stmt->rowCount();
   return $count; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}



public function getTitleCount($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_title where batch='$year'");
   $stmt->execute();
   $count = $stmt->rowCount();
   return $count; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}







public function getBatchYear($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where batch_year='$year'");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}



public function get_phase_year(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase_year");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}

public function get_batch_group(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where status = 0");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_batch_groupyear($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where status = 0 and batch_year='$year'");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_batch_groupCount($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where status = 0 and batch_year='$year'");
   $stmt->execute();
   $count = $stmt->rowCount();
   return $count; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}




public function get_batch_group_assigned(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_title(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_title");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_titleYear($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_title where batch='$year'");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}





public function get_title_forassign(){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_title where status = 0");
   $stmt->execute();
   return $stmt; 
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


public function getTitlebyid($id){
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


public function getPhasebyID($id){
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



public function getFacultyByid($id){
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

public function getBatchGroup($id){
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

public function getBatchTitle($id){
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

public function getBatchFaculty($id){
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


public function get_batch_by_id($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where id='$id'");
   $stmt->execute();
   return $stmt;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}

public function getBatchExists($bno){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_batch_group where batch_number='$bno'");
   $stmt->execute();
   $count  = $stmt->rowCount();
   return $count;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}



public function getPhaseCount($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase_year where phase_year='$year'");
   $stmt->execute();
   $count  = $stmt->rowCount();
   return $count;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function getPhaseValues($year){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase_year where phase_year='$year'");
   $stmt->execute();
   $res = $stmt->fetch(PDO::FETCH_ASSOC);
   return $res;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}




public function getBatchStudentcount($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_group where batch_group_id='$id'");
   $stmt->execute();
   $count  = $stmt->rowCount();
   return $count;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function get_phaseValues($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_phase where batch_year='$id'");
   $stmt->execute();
   return $stmt;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function getExtraStudentsAdd($id){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_group where batch_group_id='$id' limit 1");
   $stmt->execute();
   $res = $stmt->fetch(PDO::FETCH_ASSOC);

   return $res;
   
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}





public function getBatchStudent($batch,$dept){
  try {
   $stmt = $this->conn->prepare("SELECT * FROM tbl_student WHERE id not in(select student_id from tbl_group) and dept='$dept' and syear='$batch'");
   $stmt->execute();
   return $stmt; 
 } catch (PDOException $e) {
  echo $e->getMessage();
  return false;
}
}


public function add_faculty($name,$phone,$email,$address,$doj,$dob,$gender,$dept,$currentsalary,$image,$password,$qual){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_faculty(name,phone,email,address,gender,dept,dob,qualification,doj,currentsalary,password,photo) VALUES(:name,:phone,:email,:address,:gender,:dept,:dob,:qualification,:doj,:currentsalary,:password,:photo)");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":phone", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":address", $address);
    $stmt->bindparam(":gender", $gender);
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":dob", $dob);

    $stmt->bindparam(":qualification", $qual);
    $stmt->bindparam(":doj", $doj);
    $stmt->bindparam(":currentsalary", $currentsalary);
    $stmt->bindparam(":password", $password);
    $stmt->bindparam(":photo", $image);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}


public function add_titles($batch,$title,$desc){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_title(name,description,batch) VALUES(:name,:description,:batch)");
    $stmt->bindparam(":name", $title);
    $stmt->bindparam(":description", $desc);
    $stmt->bindparam(":batch", $batch);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

public function assign_students($id,$title,$faculty,$sdate,$edate,$phase){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_project_batch(batch_group,faculty_id,title_id,sdate,edate,phase) VALUES(:batch_group,:faculty_id,:title_id,:sdate,:edate,:phase)");
    $stmt->bindparam(":batch_group", $id);
    $stmt->bindparam(":faculty_id", $faculty);
    $stmt->bindparam(":title_id", $title);
    $stmt->bindparam(":sdate", $sdate);
    $stmt->bindparam(":edate", $edate);
    $stmt->bindparam(":phase", $phase);
    $stmt->execute();
    $status = 1;
    $stmt = $this->conn->prepare("UPDATE tbl_title SET status=:status where id=:id");
    $stmt->bindparam(":status", $status);
    $stmt->bindparam(":id", $title);
    $stmt->execute();

    $status = 1;
    $stmt = $this->conn->prepare("UPDATE tbl_batch_group SET status=:status where id=:id");
    $stmt->bindparam(":status", $status);
    $stmt->bindparam(":id", $id);
    $stmt->execute();


    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}


public function edit_titles($id,$title,$desc){
  try {
    
    $stmt = $this->conn->prepare("UPDATE tbl_title SET name=:name,description=:description where id=:id");
    $stmt->bindparam(":name", $title);
    $stmt->bindparam(":description", $desc);
    $stmt->bindparam(":id", $id);
    $stmt->execute();

    

    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}





public function delete_student($id){
  $stmt=$this->conn->prepare("delete from tbl_student WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
}

public function delete_faculty($id){
  $stmt=$this->conn->prepare("delete from tbl_faculty WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();
  return true;
}


public function delete_student_group($id,$batch_id){

  $stmt=$this->conn->prepare("delete from tbl_group WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();


  $stmt = $this->conn->prepare("SELECT * FROM tbl_group where batch_group_id='$batch_id'");
  $stmt->execute();
  $count = $stmt->rowCount();

  if ($count == 0) {
    $stmt=$this->conn->prepare("delete from tbl_batch_group WHERE id=:id");
    $stmt->bindparam(":id",$batch_id);
    $stmt->execute();


    $stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where batch_group='$batch_id'");
    $stmt->execute();
    $countb = $stmt->rowCount();

    if ($countb) {
      $stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where batch_group='$batch_id'");
      $stmt->execute();
      $res = $stmt->fetch(PDO::FETCH_ASSOC);
      $title = $res['title_id'];

      $status = 0;
      $stmt = $this->conn->prepare("UPDATE tbl_title SET status=:status where id=:id");
      $stmt->bindparam(":status", $status);
      $stmt->bindparam(":id", $title);
      $stmt->execute();

    }

    $stmt=$this->conn->prepare("delete from tbl_project_batch WHERE batch_group=:batch_group");
    $stmt->bindparam(":batch_group",$batch_id);
    $stmt->execute();


    
  }



  return true;
}



public function delete_group($id){

  $stmt=$this->conn->prepare("delete from tbl_batch_group WHERE id=:id");
  $stmt->bindparam(":id",$id);
  $stmt->execute();

  $stmt=$this->conn->prepare("delete from tbl_group WHERE batch_group_id=:batch_group_id");
  $stmt->bindparam(":batch_group_id",$id);
  $stmt->execute();






  $stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where batch_group='$id'");
  $stmt->execute();
  $countb = $stmt->rowCount();

  if ($countb) {
    $stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where batch_group='$id'");
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    $title = $res['title_id'];

    $status = 0;
    $stmt = $this->conn->prepare("UPDATE tbl_title SET status=:status where id=:id");
    $stmt->bindparam(":status", $status);
    $stmt->bindparam(":id", $title);
    $stmt->execute();

  }

  $stmt=$this->conn->prepare("delete from tbl_project_batch WHERE batch_group=:batch_group");
    $stmt->bindparam(":batch_group",$id);
    $stmt->execute();





  return true;
}


public function update_student($name,$phone,$email,$address,$year,$dob,$gender,$dept,$image,$regno,$id){
  try {
    $stmt = $this->conn->prepare("UPDATE tbl_student SET name=:name,reg_no=:reg_no,phonenumber=:phonenumber,email=:email,address=:address,gender=:gender,dob=:dob,dept=:dept,syear=:syear,photo=:photo where id=:id");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":reg_no", $regno);
    $stmt->bindparam(":phonenumber", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":address", $address);
    $stmt->bindparam(":gender", $gender);
    $stmt->bindparam(":dob", $dob);
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":syear", $year);
    $stmt->bindparam(":photo", $image);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}



public function update_phase($id,$phase,$desc,$dcontent,$duedate,$marks,$pdf,$note){
  try {
    $stmt = $this->conn->prepare("UPDATE tbl_phase SET phase_type=:phase_type,description=:description,deliverable_content=:deliverable_content,due_date=:due_date,attachment=:attachment,marks=:marks,note=:note where id=:id");
    $stmt->bindparam(":phase_type", $phase);
    $stmt->bindparam(":description", $desc);
    $stmt->bindparam(":deliverable_content", $dcontent);
    $stmt->bindparam(":due_date", $duedate);
    $stmt->bindparam(":attachment", $pdf);
    $stmt->bindparam(":marks", $marks);
    $stmt->bindparam(":note", $note);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}





public function update_faculty($name,$phone,$email,$address,$doj,$dob,$gender,$dept,$currentsalary,$image,$qual,$id){
  try {


    $stmt = $this->conn->prepare("UPDATE tbl_faculty SET name=:name,phone=:phone,email=:email,address=:address,gender=:gender,dept=:dept,dob=:dob,qualification=:qualification,doj=:doj,currentsalary=:currentsalary,photo=:photo where id=:id");
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":phone", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":address", $address);
    $stmt->bindparam(":gender", $gender);
    $stmt->bindparam(":dept", $dept);
    $stmt->bindparam(":dob", $dob);

    $stmt->bindparam(":qualification", $qual);
    $stmt->bindparam(":doj", $doj);
    $stmt->bindparam(":currentsalary", $currentsalary);
    $stmt->bindparam(":photo", $image);
    $stmt->bindparam(":id", $id);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}


public function Import_student($regno,$name,$phone,$email,$address,$year,$dob,$gender,$dept){
  try {
    $stmt = $this->conn->prepare("INSERT INTO tbl_student(name,reg_no,phonenumber,email,address,gender,dob,dept,syear) VALUES(:name,:reg_no,:phonenumber,:email,:address,:gender,:dob,:dept,:year)");
    $stmt->bindparam(":reg_no", $regno);
    $stmt->bindparam(":name", $name);
    $stmt->bindparam(":phonenumber", $phone);
    $stmt->bindparam(":email", $email);
    $stmt->bindparam(":address", $address);
    $stmt->bindparam(":year", $year);
    $stmt->bindparam(":dob", $dob);
    $stmt->bindparam(":gender", $gender);
    $stmt->bindparam(":dept", $dept);
    //$stmt->bindparam(":photo", $image);
    $stmt->execute();
    return true;
  } catch (PDOException $e) {
    echo $e->getMessage();
    return false;
  }
}

}