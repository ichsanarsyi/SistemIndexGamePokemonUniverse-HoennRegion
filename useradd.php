<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];
?>

<html>
<head>
    <title>Tambah Data User</title>
</head>

<body style="background-color:aliceblue;">
    <a href="userlist.php">Ke User List</a>
    <br/><br/>

    <h2 style="color:darkcyan;">Tambahkan User</h2>

    <form action="useradd.php" method="post" name="form_user">
        <table width="25%" border="0">
            <tr> 
                <td>ID USER</td>
                <td><input type="text" name="id_user" ></td>
            </tr>
            <tr> 
                <td>USERNAME</td>
                <td><input type="text" name="username" ></td>
            </tr>
            <tr> 
                <td>PASSWORD</td>
                <td><input type="text" name="userpassword" ></td>
            </tr>     
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    if(isset($_POST['Submit'])) {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $userpassword = md5($_POST['userpassword']);

        include_once("config.php");

        $result = mysqli_query($mysqli, "INSERT INTO user(id_user,
        username,userpassword)
        VALUES('$id_user','$username','$userpassword')");

        echo "User berhasil ditambahkan. <a href='userlist.php'>Lihat User List</a>";
    }
    ?>
</body>
</html>
