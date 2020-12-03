<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");

if(isset($_POST['update']))
{   
    $id_trainer = $_POST['id_trainer'];
    $nama_trainer = $_POST['nama_trainer'];
    $id_user = $_POST['id_user'];

    $result = mysqli_query($mysqli, "UPDATE trainer
    SET id_trainer='$id_trainer',nama_trainer='$nama_trainer',id_user='$id_user'
    WHERE id_trainer=$id_trainer");

    header("Location: trainerlist.php");
}
?>
<?php
$id_trainer = $_GET['id_trainer'];

$result = mysqli_query($mysqli, "SELECT * FROM trainer WHERE id_trainer=$id_trainer");

while($user_list = mysqli_fetch_array($result))
{
    $id_trainer= $user_list['id_trainer'];
    $nama_trainer = $user_list['nama_trainer'];
    $id_user = $user_list['id_user'];
    
}
?>
<html>
<head>  
    <title>Editor Data User</title>
</head>

<body style="background-color:aliceblue;">
    <a href="trainerlist.php">Ke Tabel Trainer</a>
    <br/><br/>


    <form name="update_trainer" method="post" action="traineredit.php">
        <table border="0">
            <tr> 
                <td>ID TRAINER</td>
                <td><input type="text" name="id_trainer" value=<?php echo $id_trainer;?>></td>
            </tr>
            <tr> 
                <td>NAMA TRAINER</td>
                <td><input type="text" name="nama_trainer" value=<?php echo $nama_trainer;?>></td>
            </tr>
            <tr> 
                <td>ID USER</td>
                <td><input type="text" name="id_user" value=<?php echo $id_user;?>></td>
            </tr>            
       
            <tr>                 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
