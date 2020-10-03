<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

    //multiple table insert
  public function addQuestions($data){
    $ques_no   = mysqli_real_escape_string($this->db->link,$data['ques_no']);
    $ques_name = mysqli_real_escape_string($this->db->link,$data['ques_name']);
    $ans = array();
    $ans[1] = $data['ans1'];
    $ans[2] = $data['ans2'];
    $ans[3] = $data['ans3'];
    $ans[4] = $data['ans4'];
    $right_ans = $data['right_ans'];

    //table 1 insert tbl_question
    $query = "INSERT INTO tbl_question(ques_no, ques_name) VALUES('$ques_no','$ques_name')";
    $inserted_row = $this->db->insert($query);

    if($inserted_row){
      foreach ($ans as $key => $ansName){
        if($ansName != ''){
            //table 2 insert tbl_answer
         if($right_ans == $key){
           $rquery = "INSERT INTO tbl_answer(ques_no, right_ans, answer) VALUES('$ques_no','1','$ansName')";
         }else{
          $rquery = "INSERT INTO tbl_answer(ques_no, right_ans, answer) VALUES('$ques_no','0','$ansName')";
         }
         $insertrow = $this->db->insert($rquery);

             if ($insertrow){
               continue;
             }else{
              die('Error....');
             }
        }//end if loop
      }//end foreach loop

     $msg = "<span class='success'>Question Added Successfully...</span>";
     return $msg;
    }
  }


  public function getQueByOrder(){
    $query = "SELECT * FROM  tbl_question ORDER BY ques_no ASC";
    $result = $this->db->select($query);
    return $result;
  }


public function delQuestion($quesNo){
//delete from multiple table data
$tables = array("tbl_question","tbl_answer");
        foreach ($tables as $table) {
            //same column name ques_no tbl_question,tbl_answer and foreign key
          $delquery = "DELETE FROM $table WHERE ques_no ='$quesNo'";
          $deldata = $this->db->delete($delquery);
        }

        if ($deldata) {
          $msg = "<span class='success'>Data Deleted Successfully...</span>";
          return $msg;
        }else{
          $msg = "<span class='error'>Data Not Deleted !</span>";
          return $msg;
        }

  }


  public function getTotalRows(){
    $query     = "SELECT * FROM tbl_question";
    $getResult = $this->db->select($query);
    $total     = $getResult->num_rows;
    return $total;
  }


  public function getQuestion(){

    $query = "SELECT * FROM tbl_question";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }


public function getQuesByNumber($number){
$query = "SELECT * FROM tbl_question WHERE ques_no ='$number'";
$getData = $this->db->select($query);
$result = $getData->fetch_assoc();
return $result;

}


public function getAnswer($number){
    $query = "SELECT * FROM tbl_answer WHERE ques_no ='$number'";
    $getData = $this->db->select($query);
    return $getData;
  }
}


 ?>