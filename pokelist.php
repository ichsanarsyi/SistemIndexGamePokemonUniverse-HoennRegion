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
    $result = mysqli_query($mysqli,"SELECT * FROM pokemon
    WHERE id_index LIKE '%".$cari."%'
    OR nama_pokemon LIKE '%".$cari."%'
    OR tipe LIKE '%".$cari."%'
    OR id_trainer LIKE '%".$cari."%'
    OR id_gym LIKE '%".$cari."%'
    OR id_villain LIKE '%".$cari."%'
    ORDER BY id_index ASC");				
}else{
    $result = mysqli_query($mysqli,"SELECT * FROM pokemon
    ORDER BY id_index ASC");		
}
?>

<html>
<head>    
    <title>LIST POKEMON</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>

    <h3 style="color:cadetblue;">Tabel Pokemon List</h3>
    <form action="pokelist.php" method="get">
	    <label>Cari :</label>
	    <input type="text" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>
    <a href="pkmadd.php">Add New Data</a><br/>
    <table width='80%' border=1>

<table border="1">
    <tr>
        <th>ID INDEX</th> <th>NAMA POKEMON</th> <th>TIPE</th> <th>ID TRAINER</th> <th>ID GYM</th><th>ID VILLAIN</th><th>AKSI</th>
    </tr>
	<?php 

	while($poke_list = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>".$poke_list['id_index']."</td>";
        echo "<td>".$poke_list['nama_pokemon']."</td>";
        echo "<td>".$poke_list['tipe']."</td>";
        echo "<td>".$poke_list['id_trainer']."</td>";
        echo "<td>".$poke_list['id_gym']."</td>";
        echo "<td>".$poke_list['id_villain']."</td>";        
        echo "<td><a href='pkmedit.php?id_index=$poke_list[id_index]'>Edit</a> | <a href='pkmdel.php?id_index=$poke_list[id_index]'>Delete</a></td></tr>";        
    } ?>
</table>
</body>
</html>