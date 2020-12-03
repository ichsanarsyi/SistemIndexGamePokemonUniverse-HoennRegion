<?php
session_start();
include_once("config.php");
$id_index = $_GET['id_index'];
$result = mysqli_query($mysqli, "DELETE FROM pokemon WHERE id_index=$id_index");
header("Location:pokelist.php");
?>
