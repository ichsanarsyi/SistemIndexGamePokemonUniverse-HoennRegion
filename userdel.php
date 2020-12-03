<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");
$id_user = $_GET['id_user'];
$result = mysqli_query($mysqli, "DELETE FROM user WHERE id_user=$id_user");
header("Location:userlist.php");
?>
