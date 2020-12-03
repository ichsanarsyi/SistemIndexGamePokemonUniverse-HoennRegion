<?php
include_once("config.php");

$result = mysqli_query($mysqli,
"SELECT a.id_trainer, a.id_index, a.nama_pokemon, a.tipe,
b.gym_leader, b.spesialis
FROM pokemon a LEFT JOIN gym b
ON a.id_gym = b.id_gym
ORDER BY gym_leader");
?>

<html>
<head>    
    <title>LIST POKEMON-GYM</title>
</head>

<body style="background-color:aliceblue;">

    <h3 style="color:cadetblue;">Tabel List Pokemon vs. GYM</h3>
    <table width='80%' border=1>

    <tr>
         <th>ID TRAINER</th><th>ID INDEX</th> <th>NAMA POKEMON</th> <th>TIPE</th> <th>GYM LEADER</th><th>SPESIALIS</th>
    </tr>
    <?php  
    while($rjoin_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$rjoin_list['id_trainer']."</td>";
        echo "<td>".$rjoin_list['id_index']."</td>";
        echo "<td>".$rjoin_list['nama_pokemon']."</td>";
        echo "<td>".$rjoin_list['tipe']."</td>";
        echo "<td>".$rjoin_list['gym_leader']."</td>";
        echo "<td>".$rjoin_list['spesialis']."</td>";
    }
    ?>
    </table>
</body>
</html>
