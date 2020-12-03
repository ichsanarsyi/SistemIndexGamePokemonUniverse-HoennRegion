<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");
$id_villain = $_GET['id_villain'];
$result = mysqli_query($mysqli, "DELETE FROM villain WHERE id_villain=$id_villain");
header("Location:villainlist.php");
?>
