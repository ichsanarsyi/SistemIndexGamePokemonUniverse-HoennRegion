<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];
?>

<html>
<head>
    <title>Tambah Data Pokemon</title>
</head>

<body style="background-color:aliceblue;">
    <a href="pokelist.php">Ke Pokemon List</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Tambahkan Pokemon</h2>

    <form action="pkmadd.php" method="post" name="form1">
        <table width="25%" border="0">
        <tr> 
                <td>ID INDEX</td>
                <td><input type="text" name="id_index" ></td>
            </tr>
            <tr> 
                <td>NAMA POKEMON</td>
                <td><input type="text" name="nama_pokemon" ></td>
            </tr>
            <tr> 
                <td>TIPE</td>
                <td><input type="text" name="tipe" ></td>
            </tr>            
            <tr> 
                <td>ID TRAINER</td>
                <td><input type="text" name="id_trainer" ></td>
            </tr> 
            <tr> 
                <td>ID GYM</td>
                <td><input type="text" name="id_gym" ></td>
            </tr> 
            <tr> 
                <td>ID VILLAIN</td>
                <td><input type="text" name="id_villain" ></td>
            </tr> 
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $id_index = $_POST['id_index'];
        $nama_pokemon = $_POST['nama_pokemon'];
        $tipe = $_POST['tipe'];
        $id_trainer = $_POST['id_trainer'];
        $id_gym = $_POST['id_gym'];
        $id_villain = $_POST['id_villain'];

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO pokemon(id_index,nama_pokemon,
        tipe,id_trainer,id_gym,id_villain)
        VALUES('$id_index','$nama_pokemon','$tipe','$id_trainer','$id_gym',
        '$id_villain')");

        echo "Pokemon berhasil ditambahkan. <a href='pokelist.php'>Lihat Pokemon List</a>";
    }
    ?>
</body>
</html>
