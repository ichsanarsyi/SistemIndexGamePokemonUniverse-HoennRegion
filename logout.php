<?php
session_start(); 
if (empty($_SESSION['username'])) {
    echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
  }
  $username = $_SESSION['username'];
session_start();
session_destroy();
header("location:index.php");
?>