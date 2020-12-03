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
    $result = mysqli_query($mysqli,"SELECT * FROM trainer
    WHERE id_trainer LIKE '%".$cari."%'
    OR nama_trainer LIKE '%".$cari."%'
    OR id_user LIKE '%".$cari."%'
    ORDER BY id_trainer ASC");				
}else{
    $result = mysqli_query($mysqli,"SELECT * FROM trainer
    ORDER BY id_trainer ASC");		
}
?>

<html>
<head>    
    <title>LIST TRAINER</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>

    <h3 style="color:cadetblue;">Tabel Trainer List</h3>
    <form action="trainerlist.php" method="get">
	    <label>Cari :</label>
	    <input type="text" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>
    <a href="traineradd.php">Add New Data</a><br/>
    <table width='80%' border=1>

<table border="1">
    <tr>
        <th>ID TRAINER</th> <th>NAMA TRAINER</th> <th>ID USER</th> <th>AKSI</th>
    </tr>
    <?php  
    while($trainer_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$trainer_list['id_trainer']."</td>";
        echo "<td>".$trainer_list['nama_trainer']."</td>";
        echo "<td>".$trainer_list['id_user']."</td>";
        echo "<td><a href='traineredit.php?id_trainer=$trainer_list[id_trainer]'>Edit</a> | <a href='trainerdel.php?id_trainer=$trainer_list[id_trainer]'>Delete</a></td></tr>";
    } ?>
</table>
</body>
</html>