<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nama=$_POST['nama'];
    $harga=$_POST['harga'];
    $jenis=$_POST['jenis'];
    $stock=$_POST['stock'];
    $id_penjual=$_POST['id_penjual'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE menu SET nama='$nama',harga='$harga',jenis='$jenis',stock='$stock',id_penjual='$id_penjual' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: menu.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $harga = $user_data['harga'];
    $jenis = $user_data['jenis'];
    $stock = $user_data['stock'];
    $id_penjual = $user_data ['id_penjual'];

}
?>
<html>
<head>	
    <title>Edit User Data</title>
</head>
 
<body>
    <a href="menu.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr> 
                <td>jenis</td>
                <td>
                <select name = "jenis">
                    <option value="makanan">makanan</option>
                    <option value="minuman">minuman</option>
                    <?php echo $jenis;?>>
                </select>
                </td>     
            </tr>
            <tr>
                <td>stock</td>
                <td><input type="text" name="stock" value=<?php echo $stock?>></td>
            </tr>
            <tr>
                <td>Nama penjual</td>
                <td>
                    <select>
                    <?php
                                include_once("../config.php");
                                $id_penjual =mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_penjual DESC");
                                while($data = mysqli_fetch_array($id_penjual)){
                                $selected = $id_penjual==$data['id_penjual'] ? "selected" : "";
                                echo '<option value="' .$data['id_penjual'].'" '.$selected.'>' .$data['nama'].'</option>';  
                                }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>