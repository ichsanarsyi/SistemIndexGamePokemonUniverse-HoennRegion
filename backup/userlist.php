<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id_user ASC");
?>

<html>
<head>    
    <title>LIST USER</title>
</head>

<body style="background-color:aliceblue;">

    <h3 style="color:cadetblue;">Tabel List User</h3>
    <a href="useradd.php">Add New Data</a><br/>
    <table width='80%' border=1>

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
