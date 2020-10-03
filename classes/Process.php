<?php 
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Session.php');
	//Session::init();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Process{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function processData($data){
		$selectedAns    = $this->fm->validation($data['answer']);
		$number         = $this->fm->validation($data['number']);//hidden number
		$selectedAns    = mysqli_real_escape_string($this->db->link,$selectedAns);
		$number         = mysqli_real_escape_string($this->db->link,$number);
		$next           = $number+1;

		if (!isset($_SESSION['score'])) {//create or declare global variable
			$_SESSION['score'] = '0';
		}

		$total = $this->getTotal();
		$right = $this->rightAns($number);
		//echo 'send answer and id no from test.php form tbl_answer '.$selectedAns;
		//echo '<br>';
		//echo 'send hidden number from test.php form '.$number;
		//echo '<br>';
		//echo 'Total num_rows from tbl_question table '.$total;
		//echo '<br>';
		//echo 'Right answer from tbl_answer table id no. '.$right;
		//exit();
		if ($right == $selectedAns) {
			$_SESSION['score']++;
		}
		if ($number == $total) {//hidden number
			header("Location:final.php");
			exit();
		}else{
			header("Location:test.php?question-id_no=".$next);
		}

	}

	private function getTotal(){
	$query = "SELECT * FROM tbl_question";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;

	}
	private function rightAns($number){
	$query = "SELECT * FROM tbl_answer WHERE ques_no = '$number' AND right_ans = '1'";
    $getdata = $this->db->select($query)->fetch_assoc();
    $result = $getdata['id'];
    return $result;
	}

}


 ?>