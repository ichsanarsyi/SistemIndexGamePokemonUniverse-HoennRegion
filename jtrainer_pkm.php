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
    $result = mysqli_query($mysqli,"SELECT a.id_user, a.nama_trainer,
    b.nama_pokemon, b.tipe, b.id_villain
    FROM trainer a RIGHT JOIN pokemon b
    ON a.id_trainer = b.id_trainer
    WHERE id_user LIKE '%".$cari."%'
    OR nama_trainer LIKE '%".$cari."%'
    OR nama_pokemon LIKE '%".$cari."%'
    OR tipe LIKE '%".$cari."%'
    OR id_villain LIKE '%".$cari."%'
    ORDER BY id_user");				
}else{
    $result = mysqli_query($mysqli,"SELECT a.id_user, a.nama_trainer,
    b.nama_pokemon, b.tipe, b.id_villain
    FROM trainer a RIGHT JOIN pokemon b
    ON a.id_trainer = b.id_trainer
    ORDER BY id_user");		
}
?>

<html>
<head>    
    <title>LIST TRAINER-POKEMON</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>

    <h3 style="color:cadetblue;">Tabel Trainer-Pokemon List</h3>
    <form action="jtrainer_pkm.php" method="get">
	    <label>Cari :</label>
	    <input type="text" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>
    <table width='80%' border=1>

<table border="1">
    <tr>
        <th>ID USER</th><th>NAMA TRAINER</th> <th>NAMA POKEMON</th> <th>TIPE</th> <th>ID VILLAIN</th>
    </tr>
    <?php  
    while($rjoin_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$rjoin_list['id_user']."</td>";
        echo "<td>".$rjoin_list['nama_trainer']."</td>";
        echo "<td>".$rjoin_list['nama_pokemon']."</td>";
        echo "<td>".$rjoin_list['tipe']."</td>";
        echo "<td>".$rjoin_list['id_villain']."</td>";
    } ?>
</table>
</body>
</html>