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
    $result = mysqli_query($mysqli,"SELECT * FROM user
    WHERE id_user LIKE '%".$cari."%'
    OR username LIKE '%".$cari."%'
    OR userpassword LIKE '%".$cari."%'
    ORDER BY id_user ASC");				
}else{
    $result = mysqli_query($mysqli,"SELECT * FROM user
    ORDER BY id_user ASC");		
}
?>

<html>
<head>    
    <title>LIST USER</title>
</head>

<body style="background-color:aliceblue;">
<a href="dasbor.php">Back to Dashboard</a><br/>

    <h3 style="color:cadetblue;">Tabel User List</h3>
    <form action="userlist.php" method="get">
	    <label>Cari :</label>
	    <input type="te xt" name="cari">
        <input type="submit" value="Cari">
        <input type="submit" value="Reset">
    </form>
    <a href="useradd.php">Add New Data</a><br/>
    <table width='80%' border=1>

<table border="1">
    <tr>
        <th>ID USER</th> <th>USERNAME</th> <th>PASSWORD</th> <th>AKSI</th>
    </tr>
	<?php 

    while($user_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_list['id_user']."</td>";
        echo "<td>".$user_list['username']."</td>";
        echo "<td>".$user_list['userpassword']."</td>";
        echo "<td><a href='useredit.php?id_user=$user_list[id_user]'>Edit</a> | <a href='userdel.php?id_user=$user_list[id_user]'>Delete</a></td></tr>";
    }
    ?>
</table>
</body>
</html>