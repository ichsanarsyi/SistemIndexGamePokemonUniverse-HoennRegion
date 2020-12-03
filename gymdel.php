<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");
$id_gym = $_GET['id_gym'];
$result = mysqli_query($mysqli, "DELETE FROM gym WHERE id_gym=$id_gym");
header("Location:gymlist.php");
?>
