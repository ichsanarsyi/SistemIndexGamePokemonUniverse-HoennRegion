<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM gym ORDER BY id_gym ASC");
?>

<html>
<head>    
    <title>LIST GYM</title>
</head>

<body style="background-color:aliceblue;">

    <h3 style="color:cadetblue;">Tabel List GYM</h3>
    <a href="gymadd.php">Add New Data</a><br/>
    <table width='80%' border=1>

    <tr>
        <th>ID GYM</th> <th>GYM LEADER</th> <th>SPESIALIS</th><th>AKSI</th>
    </tr>
    <?php  
    while($gym_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$gym_list['id_gym']."</td>";
        echo "<td>".$gym_list['gym_leader']."</td>";
        echo "<td>".$gym_list['spesialis']."</td>";
        echo "<td><a href='gymedit.php?id_gym=$gym_list[id_gym]'>Edit</a> | <a href='gymdel.php?id_gym=$gym_list[id_gym]'>Delete</a></td></tr>";        
    }
    ?>
    </table>

</body>
</html>
