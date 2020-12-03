
<?php 
include_once("config.php") ;

$username = $_POST['username'];
$userpassword = md5($_POST['userpassword']);

$login = mysqli_query($mysqli,"SELECT * FROM user WHERE username='$username' AND userpassword='$userpassword'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:dasbor.php");
}else{
	header("location:index.php");	
}

?>
