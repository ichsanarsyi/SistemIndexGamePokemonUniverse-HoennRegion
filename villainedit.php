<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");

if(isset($_POST['update']))
{   
    $id_villain = $_POST['id_villain'];
    $nama_grup = $_POST['nama_grup'];
    $villain_leader=$_POST['villain_leader'];
    $obsesi=$_POST['obsesi'];

    $result = mysqli_query($mysqli, "UPDATE villain
    SET id_villain='$id_villain',nama_grup='$nama_grup',
    villain_leader='$villain_leader',obsesi='$obsesi'
    WHERE id_villain=$id_villain");

    header("Location: villainlist.php");
}
?>
<?php
$id_villain = $_GET['id_villain'];

$result = mysqli_query($mysqli, "SELECT * FROM villain WHERE id_villain=$id_villain");

while($villain_list = mysqli_fetch_array($result))
{
    $id_villain= $villain_list['id_villain'];
    $nama_grup= $villain_list['nama_grup'];
    $villain_leader=$villain_list['villain_leader'];
    $obsesi=$villain_list['obsesi'];
    
}
?>
<html>
<head>  
    <title>Editor Data Villain</title>
</head>

<body style="background-color:aliceblue;">
    <a href="villainlist.php">Ke Tabel Villain</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Edit Villain List</h2>

    <form name="update_villain" method="post" action="villainedit.php">
        <table border="0">
            <tr> 
                <td>ID VILLAIN</td>
                <td><input type="text" name="id_villain" value=<?php echo $id_villain;?>></td>
            </tr>
            <tr> 
                <td>NAMA GRUP</td>
                <td><input type="text" name="nama_grup" value=<?php echo $nama_grup;?>></td>
            </tr>
            <tr> 
                <td>VILLAIN LEADER</td>
                <td><input type="text" name="villain_leader" value=<?php echo $villain_leader;?>></td>
            </tr>
            <tr> 
                <td>OBSESI</td>
                <td><input type="text" name="obsesi" value=<?php echo $obsesi;?>></td>
            </tr>            
       
            <tr>                 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
