<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");
$id_trainer = $_GET['id_trainer'];
$result = mysqli_query($mysqli, "DELETE FROM trainer WHERE id_trainer=$id_trainer");
header("Location:trainerlist.php");
?>
