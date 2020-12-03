<?php
include_once("config.php");

$result = mysqli_query($mysqli,
"SELECT a.id_user, a.nama_trainer, b.nama_pokemon, b.tipe, b.id_villain
FROM trainer a RIGHT JOIN pokemon b
ON a.id_trainer = b.id_trainer
ORDER BY id_user");
?>

<html>
<head>    
    <title>LIST TRAINER-POKEMON</title>
</head>

<body style="background-color:aliceblue;">

    <h3 style="color:cadetblue;">Tabel List Trainer-Pokemon</h3>
    <table width='80%' border=1>

    <tr>
         <th>ID USER</th><th>NAMA TRAINER</th> <th>NAMA POKEMON</th> <th>TIPE</th> <th>ID VILLAIN</th>
    </tr>
    <?php  
    while($rjoin_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$rjoin_list['id_user']."</td>";
        echo "<td>".$rjoin_list['nama_trainer']."</td>";
        echo "<td>".$rjoin_list['nama_pokemon']."</td>";
        echo "<td>".$rjoin_list['tipe']."</td>";
        echo "<td>".$rjoin_list['id_villain']."</td>";
    }
    ?>
    </table>
</body>
</html>
