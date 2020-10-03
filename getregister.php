<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/User.php');
$usr = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['namee'];
	$username = $_POST['usernamee'];
	$password = $_POST['passwordd'];
	$email = $_POST['emaill'];

	$userregi = $usr->userRegistration($name, $username, $password, $email);
}

//there have no need if condition because we are passing values using ajax

/*$name = $_POST['namee'];
$username = $_POST['usernamee'];
$password = $_POST['passwordd'];
$email = $_POST['emaill'];

$userregi = $usr->userRegistration($name, $username, $password, $email);*/

?>