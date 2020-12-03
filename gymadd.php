<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];
?>

<html>
<head>
    <title>Tambah Data GYM</title>
</head>

<body style="background-color:aliceblue;">
    <a href="gymlist.php">Ke GYM List</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Tambahkan GYM</h2>

    <form action="gymadd.php" method="post" name="form_gym">
        <table width="25%" border="0">
            <tr> 
                <td>ID GYM</td>
                <td><input type="text" name="id_gym" ></td>
            </tr>
            <tr> 
                <td>GYM LEADER</td>
                <td><input type="text" name="gym_leader" ></td>
            </tr>
            <tr> 
                <td>SPESIALIS</td>
                <td><input type="text" name="spesialis" ></td>
            </tr>            
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $id_gym = $_POST['id_gym'];
        $gym_leader = $_POST['gym_leader'];
        $spesialis = $_POST['spesialis'];

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO gym(id_gym,gym_leader,
        spesialis)
        VALUES('$id_gym','$gym_leader','$spesialis')");

        echo "GYM berhasil ditambahkan. <a href='gymlist.php'>Lihat GYM List</a>";
    }
    ?>
</body>
</html>
