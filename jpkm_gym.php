<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");
?>

<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
}

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $result = mysqli_query($mysqli,"SELECT a.id_trainer, a.id_index,
    a.nama_pokemon, a.tipe, b.gym_leader, b.spesialis
    FROM pokemon a LEFT JOIN gym b
    ON a.id_gym = b.id_gym
    WHERE id_trainer LIKE '%".$cari."%'
    OR id_index LIKE '%".$cari."%'
    OR nama_pokemon LIKE '%".$cari."%'
    OR tipe LIKE '%".$cari."%'
    OR gym_leader LIKE '%".$cari."%'
    OR spesialis LIKE '%".$cari."%'
    ORDER BY gym_leader");				
}else{
    $result = mysqli_query($mysqli,"SELECT a.id_trainer, a.id_index,
    a.nama_pokemon, a.tipe, b.gym_leader, b.spesialis
    FROM pokemon a LEFT JOIN gym b
    ON a.id_gym = b.id_gym
    ORDER BY gym_leader");		
}
?>

<html>
<head>    
    <title>LIST POKEMON-GYM</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>

    <h3 style="color:cadetblue;">Tabel Pokemon vs. GYM</h3>
    <form action="jpkm_gym.php" method="get">
	    <label>Cari :</label>
	    <input type="text" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>

    <table width='80%' border=1>

<table border="1">
<tr>
         <th>ID TRAINER</th><th>ID INDEX</th> <th>NAMA POKEMON</th> <th>TIPE</th> <th>GYM LEADER</th><th>SPESIALIS</th>
    </tr>
    <?php  
    while($rjoin_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$rjoin_list['id_trainer']."</td>";
        echo "<td>".$rjoin_list['id_index']."</td>";
        echo "<td>".$rjoin_list['nama_pokemon']."</td>";
        echo "<td>".$rjoin_list['tipe']."</td>";
        echo "<td>".$rjoin_list['gym_leader']."</td>";
        echo "<td>".$rjoin_list['spesialis']."</td>";
    } ?>
</table>
</body>
</html>