<html>
<head>
    <title>add penjual</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>no telephon</td>
               <td><input type="text" name="no_telephon"></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
            
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $no_telephon = $_POST['no_telephon'];
        $alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("../config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjual(name,no_telephon,alamat) VALUES('$name','$no_telephon','$alamat')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View penjual</a>";
    }
    ?>
</body>
</html>