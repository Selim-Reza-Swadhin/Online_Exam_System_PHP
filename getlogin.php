<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr = new User();

//there have no need if condition because we are passing values using ajax
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['emaill'];
	//$password = md5($_POST['passwordd']);//hack or error system
	$password = $_POST['passwordd'];
	$userlogin = $usr->userLogin($email, $password);

}
?>