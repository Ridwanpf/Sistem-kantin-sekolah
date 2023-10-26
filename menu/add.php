<html>
<head>
    <title>Add menu</title>
</head>
 
<body>
    <a href="menu.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr> 
                <td>jenis</td>
                <td>
                <select name = "jenis">
                    <option value="makanan">makanan</option>
                    <option value="minuman" selected>minuman</option>
                </select>
                </td>
            </tr>   
            <tr>
                <td>stock</td>
                <td><input type="text" name="stock"></td>
            </tr>
            <tr>
                <td>Nama penjual</td>
                <td>
                    <select name="id_penjual">
                            <?php
                                include_once("../config.php");
                                $id_penjual =mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_penjual DESC");
                                while($data = mysqli_fetch_array($id_penjual)){
                                echo '<option value="' .$data['id_penjual'].'">' .$data['nama'].'</option>';  
                                }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="add" value="submit"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jenis= $_POST['jenis'];
        $stock= $_POST['stock'];
        $id_penjual = $_POST['id_penjual'];       
        // include database connection file
        include_once("../config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO menu(nama,harga,jenis,stock,id_penjual) VALUES('$nama','$harga','$jenis','$stock','$id_penjual')");
        
        // Show message when user added
        echo "User added successfully. <a href='menu.php'>View menu</a>";
    }
    ?>
</body>
</html>