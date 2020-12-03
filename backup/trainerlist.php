<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM trainer ORDER BY id_trainer ASC");
?>

<html>
<head>    
    <title>LIST TRAINER</title>
</head>

<body style="background-color:aliceblue;">

    <h3 style="color:cadetblue;">Tabel List Trainer</h3>
    <a href="traineradd.php">Add New Data</a><br/>
    <table width='80%' border=1>

    <tr>
        <th>ID TRAINER</th> <th>NAMA TRAINER</th> <th>ID USER</th> <th>AKSI</th>
    </tr>
    <?php  
    while($trainer_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$trainer_list['id_trainer']."</td>";
        echo "<td>".$trainer_list['nama_trainer']."</td>";
        echo "<td>".$trainer_list['id_user']."</td>";
        echo "<td><a href='traineredit.php?id_trainer=$trainer_list[id_trainer]'>Edit</a> | <a href='trainerdel.php?id_trainer=$trainer_list[id_trainer]'>Delete</a></td></tr>";
    }
    ?>
    </table>

</body>
</html>
