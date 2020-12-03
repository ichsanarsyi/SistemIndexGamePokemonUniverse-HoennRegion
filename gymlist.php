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
    $result = mysqli_query($mysqli,"SELECT * FROM gym
    WHERE id_gym LIKE '%".$cari."%'
    OR gym_leader LIKE '%".$cari."%'
    OR spesialis LIKE '%".$cari."%'
    ORDER BY id_gym ASC");				
}else{
    $result = mysqli_query($mysqli,"SELECT * FROM gym
    ORDER BY id_gym ASC");		
}
?>

<html>
<head>    
    <title>LIST GYM</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>
    <h3 style="color:cadetblue;">Tabel GYM List</h3>
    <form action="gymlist.php" method="get">
	    <label>Cari :</label>
	    <input type="text" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>
    <a href="gymadd.php">Add New Data</a><br/>
    <table width='80%' border=1>

<table border="1">
    <tr>
        <th>ID GYM</th> <th>GYM LEADER</th> <th>SPESIALIS</th><th>AKSI</th>
    </tr>
    <?php  
    while($gym_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$gym_list['id_gym']."</td>";
        echo "<td>".$gym_list['gym_leader']."</td>";
        echo "<td>".$gym_list['spesialis']."</td>";
        echo "<td><a href='gymedit.php?id_gym=$gym_list[id_gym]'>Edit</a> | <a href='gymdel.php?id_gym=$gym_list[id_gym]'>Delete</a></td></tr>";        
    }
    ?>
</table>
</body>
</html>