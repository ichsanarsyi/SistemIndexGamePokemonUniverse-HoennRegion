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
    $result = mysqli_query($mysqli,"SELECT * FROM villain
    WHERE id_villain LIKE '%".$cari."%'
    OR nama_grup LIKE '%".$cari."%'
    OR villain_leader LIKE '%".$cari."%'
    OR obsesi LIKE '%".$cari."%'
    ORDER BY id_villain ASC");				
}else{
    $result = mysqli_query($mysqli,"SELECT * FROM villain
    ORDER BY id_villain ASC");		
}
?>

<html>
<head>    
    <title>LIST VILLAIN</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>

    <h3 style="color:cadetblue;">Tabel Villain List</h3>
    <form action="villainlist.php" method="get">
	    <label>Cari :</label>
	    <input type="text" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>
    <a href="villainadd.php">Add New Data</a><br/>
    <table width='80%' border=1>

<table border="1">
    <tr>
        <th>ID VILLAIN</th><th>NAMA GRUP</th> <th>VILLAIN LEADER</th> <th>OBSESI</th> <th>AKSI</th>
    </tr>
	<?php 

while($villain_list = mysqli_fetch_array($result)) {         
    echo "<tr>";
    echo "<td>".$villain_list['id_villain']."</td>";
    echo "<td>".$villain_list['nama_grup']."</td>";
    echo "<td>".$villain_list['villain_leader']."</td>";
    echo "<td>".$villain_list['obsesi']."</td>";
    echo "<td><a href='villainedit.php?id_villain=$villain_list[id_villain]'>Edit</a> | <a href='villaindel.php?id_villain=$villain_list[id_villain]'>Delete</a></td></tr>";
} ?>
</table>
</body>
</html>