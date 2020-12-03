<?php
login();
function login(){
	require 'config.php';
	session_start();
	$username = ($_POST['username']);
	$userpassword = md5($_POST['userpassword']);
	$query = "SELECT * FROM user WHERE username='$username' AND userpassword ='$userpassword'";
	$result = $mysqli->query($query);
	$cek = mysqli_num_rows($result);
	if ($cek < 1) {
    echo "<script>window.alert('username atau password salah'); window.location='index.php';</script>";
 	} else {
    $tes = mysqli_fetch_array($result);
    $level = $tes['level'];
    if ($level == '1') {
      $_SESSION['username'] = $username;
      echo "<script>window.alert('Selamat Datang Admin'); window.location='dasbor.php?username=$username'</script>";
	}
	else if($level == '2'){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('Selamat Datang Admin'); window.location='dasbor.php?username=$username'</script>";
	}
	else if($level == '3'){
		$_SESSION['username'] = $username;
    	echo "<script>window.alert('Selamat Datang Admin'); window.location='dasbor.php?username=$username'</script>";
	}
  }
}