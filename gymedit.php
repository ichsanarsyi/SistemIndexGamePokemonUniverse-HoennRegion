<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");

if(isset($_POST['update']))
{   
    $id_gym = $_POST['id_gym'];
    $gym_leader=$_POST['gym_leader'];
    $spesialis=$_POST['spesialis'];

    $result = mysqli_query($mysqli, "UPDATE gym
    SET id_gym='$id_gym',gym_leader='$gym_leader',spesialis='$spesialis'
    WHERE id_gym=$id_gym");

    header("Location: gymlist.php");
}
?>
<?php
$id_gym = $_GET['id_gym'];

$result = mysqli_query($mysqli, "SELECT * FROM gym WHERE id_gym=$id_gym");

while($gym_list = mysqli_fetch_array($result))
{
    $id_gym= $gym_list['id_gym'];
    $gym_leader=$gym_list['gym_leader'];
    $spesialis=$gym_list['spesialis'];
    
}
?>
<html>
<head>  
    <title>Editor Data GYM</title>
</head>

<body style="background-color:aliceblue;">
    <a href="gymlist.php">Ke Tabel User</a>
    <br/><br/>


    <form name="update_gym" method="post" action="gymedit.php">
        <table border="0">
            <tr> 
                <td>ID GYM</td>
                <td><input type="text" name="id_gym" value=<?php echo $id_gym;?>></td>
            </tr>
            <tr> 
                <td>GYM LEADER</td>
                <td><input type="text" name="gym_leader" value=<?php echo $gym_leader;?>></td>
            </tr>
            <tr> 
                <td>SPESIALIS</td>
                <td><input type="text" name="spesialis" value=<?php echo $spesialis;?>></td>
            </tr>            
       
            <tr>                 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
