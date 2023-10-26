<td>
                    <select name="id_penjual">
                        <option >---</option>
                            <?php
                         $query =mysqli_query($koneksi, "select * from  penjual") or die (mysqli_error($koneksi));
                        while($user_data = mysqli_fetch_array($query)){
                        echo "<option value = $user_data[id_penjual]> $user_data[nama] </option>";
                        }
                        ?>
                    </select>
                </td>




                $id_penjual = $_POST['nama']or die(mysqli_error($koneksi));  
                '$id_penjual'
                nama


                <tr>
                <td>Nama penjual</td>
                <td>
                    <select name="id_penjual">
                        <option >---</option>
                            <?php
                         $query =mysqli_query($koneksi, "select * from  penjual") or die (mysqli_error($koneksi));
                        while($user_data = mysqli_fetch_array($query)){
                        echo "<option value = $user_data[id_penjual]> $user_data [nama] </option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>