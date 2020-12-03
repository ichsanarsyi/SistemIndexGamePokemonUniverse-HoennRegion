<?php
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>window.alert('Akses tidak diizinkan. Silakan login terlebih dulu.'); window.location='index.php';</script>";
}
$username = $_SESSION['username'];

include_once("config.php");

if(isset($_POST['update']))
{   
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $userpassword = md5($_POST['userpassword']);

    $result = mysqli_query($mysqli, "UPDATE user
    SET id_user='$id_user',username='$username',userpassword='$userpassword'
    WHERE id_user=$id_user");

    header("Location: userlist.php");
}
?>
<?php
$id_user = $_GET['id_user'];

$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user=$id_user");

while($user_list = mysqli_fetch_array($result))
{
    $id_user= $user_list['id_user'];
    $username = $user_list['username'];
    $userpassword = $user_list['userpassword'];
    
}
?>
<html>
<head>  
    <title>Editor Data User</title>
</head>

<body style="background-color:aliceblue;">
    <a href="userlist.php">Ke Tabel User</a>
    <br/><br/>


    <form name="update_user" method="post" action="useredit.php">
        <table border="0">
            <tr> 
                <td>ID USER</td>
                <td><input type="text" name="id_user" value=<?php echo $id_user;?>></td>
            </tr>
            <tr> 
                <td>USERNAME</td>
                <td><input type="text" name="username" value=<?php echo $username;?>></td>
            </tr>
            <tr> 
                <td>PASSWORD</td>
                <td><input type="text" name="userpassword" value=<?php echo $userpassword;?>></td>
            </tr>            
       
            <tr>                 
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
