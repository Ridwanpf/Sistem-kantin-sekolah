<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id_penjual = $_POST['id'];
    
    $nama=$_POST['nama'];
    $no_tlp=$_POST['no_tlp'];
    $alamat=$_POST['alamat'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjual SET nama='$nama',no_tlp='$no_tlp',alamat='$alamat' WHERE id_penjual=$id_penjual");
    
    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_penjual = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id_penjual=$id_penjual");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $no_tlp = $user_data['no_tlp'];
    $alamat = $user_data['alamat'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>no_tlp</td>
                <td><input type="text" name="no_tlp" value=<?php echo $no_tlp;?>></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>