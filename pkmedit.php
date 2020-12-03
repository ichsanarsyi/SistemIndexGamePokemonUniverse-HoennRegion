<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");

if(isset($_POST['update']))
{   
    $id_index = $_POST['id_index'];
    $nama_pokemon=$_POST['nama_pokemon'];
    $tipe=$_POST['tipe'];
    $id_trainer=$_POST['id_trainer'];
    $id_gym=$_POST['id_gym'];
    $id_villain=$_POST['id_villain'];    

    $result = mysqli_query($mysqli, "UPDATE pokemon
    SET id_index='$id_index',nama_pokemon='$nama_pokemon',tipe='$tipe',
    id_trainer='$id_trainer',id_gym='$id_gym',id_villain='$id_villain' 
    WHERE id_index=$id_index");

    header("Location: pokelist.php");
}
?>
<?php
$id_index = $_GET['id_index'];

$result = mysqli_query($mysqli, "SELECT * FROM pokemon WHERE id_index=$id_index");

while($poke_list = mysqli_fetch_array($result))
{
    $id_index= $poke_list['id_index'];
    $nama_pokemon=$poke_list['nama_pokemon'];
    $tipe=$poke_list['tipe'];
    $id_trainer=$poke_list['id_trainer'];
    $id_gym=$poke_list['id_gym'];
    $id_villain=$poke_list['id_villain'];
}
?>
<html>
<head>  
    <title>Editor Data Pokemon</title>
</head>

<body style="background-color:aliceblue;">
    <a href="pokelist.php">Ke Pokemon List</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Editor List Pokemon</h2>

    <form name="update_pkm" method="post" action="pkmedit.php">
        <table border="0">
            <tr> 
                <td>ID INDEX</td>
                <td><input type="text" name="id_index" value=<?php echo $id_index;?>></td>
            </tr>
            <tr> 
                <td>NAMA POKEMON</td>
                <td><input type="text" name="nama_pokemon" value=<?php echo $nama_pokemon;?>></td>
            </tr>
            <tr> 
                <td>TIPE</td>
                <td><input type="text" name="tipe" value=<?php echo $tipe;?>></td>
            </tr>            
            <tr> 
                <td>ID TRAINER</td>
                <td><input type="text" name="id_trainer" value=<?php echo $id_trainer;?>></td>
            </tr> 
            <tr> 
                <td>ID GYM</td>
                <td><input type="text" name="id_gym" value=<?php echo $id_gym;?>></td>
            </tr> 
            <tr> 
                <td>ID VILLAIN</td>
                <td><input type="text" name="id_villain" value=<?php echo $id_villain;?>></td>
            </tr>           
            <tr>                 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
