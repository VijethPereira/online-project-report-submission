<?php
/**
 * Created by PhpStorm.
 * User: your name
 * Date: todays date
 * Time: todays time
 */

class Faculty extends Main
{
	protected $id;

	public function __construct()
	{
		$this->id = $_SESSION['faculty'];
		parent::__construct();
	}


	public function loginFaculty($name,$password)
	{
		try{
			$stmnt=$this->conn->prepare("select id from tbl_faculty where name=:name AND password=:password");
			$stmnt->bindParam("name", $name,PDO::PARAM_STR) ;
			$stmnt->bindParam("password", $password,PDO::PARAM_STR) ;
			$stmnt->execute();
			$count=$stmnt->rowCount();
			$res=$stmnt->fetch(PDO::FETCH_ASSOC);
			$id = $res['id'];
			if($count){
				$_SESSION['faculty']= $id;
				return true;
			}else{
				return false;
			}

		}catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}

	}

	public function get_batch(){
		try {
			$stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where faculty_id='$this->id'");
			$stmt->execute();
			return $stmt; 
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

	public function getProBatch($id){
		try {
			$stmt = $this->conn->prepare("SELECT * FROM tbl_project_batch where batch_group=:batch_group");
			$stmt->execute(array(':batch_group'=>$id));
			$editRow = $stmt->fetch(PDO::FETCH_ASSOC);
			return $editRow;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function getProtitle($id){
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



	public function getPhaseuploadbyid($id){
		try {
			$stmt = $this->conn->prepare("SELECT * FROM tbl_upload where phase_id='$id' and faculty_id='$this->id'");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function getPhaseuploadbyideval($id,$baid){
		try {
			$stmt = $this->conn->prepare("SELECT * FROM tbl_upload where phase_id='$id' and faculty_id='$this->id' and id='$baid'");
			$stmt->execute();
			return $stmt;
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




	public function update_marks_nocorrection($bid,$mark){
			try {
				$status = "nocorrection";
				$pstatus = "completed";
				$lstatus = 0;
				$date = Date('Y-m-d');
				$stmt = $this->conn->prepare("UPDATE tbl_upload SET project_status=:project_status,correction_date=:correction_date,correction_status=:correction_status,correction_marks=:correction_marks,status=:status where id=:id");
				$stmt->bindparam(":project_status", $pstatus);
				$stmt->bindparam(":correction_date", $date);
				$stmt->bindparam(":correction_status", $status);
				$stmt->bindparam(":correction_marks", $mark);
				$stmt->bindparam(":status", $lstatus);
                $stmt->bindparam(":id", $bid);
                $stmt->execute();
                return true;
			} catch (PDOException $e) {
				echo $e->getMessage();
				return false;
			}
		}


	public function update_marks_correction($bid,$mark,$note,$docs){
			try {
				$status = "correction";
				$pstatus = "resubmit";
				$lstatus = 1;
				$date = Date('Y-m-d');
				$stmt = $this->conn->prepare("UPDATE tbl_upload SET project_status=:project_status,note=:note,correction_file=:correction_file,correction_date=:correction_date,correction_status=:correction_status,correction_marks=:correction_marks,status=:status where id=:id");
				$stmt->bindparam(":project_status", $pstatus);
				$stmt->bindparam(":note", $note);
				$stmt->bindparam(":correction_file", $docs);
				$stmt->bindparam(":correction_date", $date);
				$stmt->bindparam(":correction_status", $status);
				$stmt->bindparam(":correction_marks", $mark);
				$stmt->bindparam(":status", $lstatus);
                $stmt->bindparam(":id", $bid);
                $stmt->execute();
                return true;
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


}