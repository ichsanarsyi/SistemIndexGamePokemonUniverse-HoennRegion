<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];
?>

<html>
<head>
    <title>Tambah Data Trainer</title>
</head>

<body style="background-color:aliceblue;">
    <a href="trainerlist.php">Ke Trainer List</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Tambahkan Trainer</h2>

    <form action="traineradd.php" method="post" name="form_trainer">
        <table width="25%" border="0">
            <tr> 
                <td>ID TRAINER</td>
                <td><input type="text" name="id_trainer" ></td>
            </tr>
            <tr> 
                <td>NAMA TRAINER</td>
                <td><input type="text" name="nama_trainer" ></td>
            </tr>
            <tr> 
                <td>ID USER</td>
                <td><input type="text" name="id_user" ></td>
            </tr>     
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $id_trainer = $_POST['id_trainer'];
        $nama_trainer = $_POST['nama_trainer'];
        $id_user = $_POST['id_user'];

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO trainer(id_trainer,
        nama_trainer,id_user)
        VALUES('$id_trainer','$nama_trainer','$id_user')");

        echo "User berhasil ditambahkan. <a href='trainerlist.php'>Lihat Trainer List</a>";
    }
    ?>
</body>
</html>
