<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];
?>
<html>
<head>
    <title>Tambah Data Villain</title>
</head>

<body style="background-color:aliceblue;">
    <a href="pokelist.php">Ke Villain List</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Tambahkan Villain</h2>

    <form action="villainadd.php" method="post" name="form_villain">
        <table width="25%" border="0">
            <tr> 
                <td>ID VILLAIN</td>
                <td><input type="text" name="id_villain"></td>
            </tr>   
            <tr> 
                <td>NAMA GRUP</td>
                <td><input type="text" name="nama_grup"></td>
            </tr>
            <tr> 
                <td>VILLAIN LEADER</td>
                <td><input type="text" name="villain_leader" ></td>
            </tr>
            <tr> 
                <td>OBSESI</td>
                <td><input type="text" name="obsesi" ></td>
            </tr>            
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $id_villain = $_POST['id_villain'];
        $nama_grup = $_POST['nama_grup'];
        $villain_leader = $_POST['villain_leader'];
        $obsesi = $_POST['obsesi'];

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO villain(id_villain,nama_grup,villain_leader,
        obsesi)
        VALUES('$id_villain','$nama_grup','$villain_leader','$obsesi')");

        echo "Villain berhasil ditambahkan. <a href='villainlist.php'>Lihat Villain List</a>";
    }
    ?>
</body>
</html>
