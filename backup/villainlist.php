<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM villain ORDER BY id_villain ASC");
?>

<html>
<head>    
    <title>LIST VILLAIN</title>
</head>

<body style="background-color:aliceblue;">

    <h3 style="color:cadetblue;">Tabel List Villain</h3>
    <a href="villainadd.php">Add New Data</a><br/>
    <table width='80%' border=1>

    <tr>
         <th>ID VILLAIN</th><th>NAMA GRUP</th> <th>VILLAIN LEADER</th> <th>OBSESI</th> <th>AKSI</th>
    </tr>
    <?php  
    while($villain_list = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$villain_list['id_villain']."</td>";
        echo "<td>".$villain_list['nama_grup']."</td>";
        echo "<td>".$villain_list['villain_leader']."</td>";
        echo "<td>".$villain_list['obsesi']."</td>";
        echo "<td><a href='villainedit.php?id_villain=$villain_list[id_villain]'>Edit</a> | <a href='villaindel.php?id_villain=$villain_list[id_villain]'>Delete</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>
