<?php
//error_reporting(0);
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::init();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

spl_autoload_register(function($class){
    include_once "classes/".$class.".php";

});
$db = new Database();
$fm = new Format();
$usr = new User();
$exm = new Exam();
$pro = new Process();
?>

<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<!doctype html>
<html>
<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="./css/main.css">
	<script src="./js/jquery-3.5.1.min.js"></script>
	<script src="./js/main.js"></script>
</head>
<body style="background: #3399ff;">

<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Session::destroy();
    header("Location:index.php");
    exit();
}
?>

<div class="phpcoding">
    <section class="headeroption"></section>
    <section class="maincontent">
        <style>
            .active{background: #3399ff;}
            a{color: #fff;}

        </style>
        <div class="menu">
            <?php
            //active menu
            $path = $_SERVER['SCRIPT_FILENAME'];
            $current_page = basename($path, '.php');
            ?>
            <ul>
                <?php
                $login = Session::get("loginUser");
                if ($login == true) {?>

                    <li class="<?php if($current_page == 'exam'){echo 'active';}?>"><a href="exam.php">Exam</a></li>
                    <li class="<?php if($current_page == 'profile'){echo 'active';}?>"><a href="profile.php">Profile</a></li>
                    <li><a style="background: red;" href="?action=logout" title="Hi <?= ucwords(Session::get('userName')); ?> ! Are You Sure to LogOut?">Logout</a></li>
                <?php } else { ?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="index.php">Login</a></li>
                <?php } ?>

            </ul>
            <?php
            $login = Session::get("loginUser");
            if ($login == true) {?>
                <span style="float: right;color: #888;">
                    Welcome <strong style="color: green;"><?php echo ucwords(Session::get('naMe')) ; ?></strong>
                </span>
            <?php } ?>
        </div>
	