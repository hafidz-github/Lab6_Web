<?php 
    error_reporting(E_ALL); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path_gambar = $path ."/lab6_web";
    $path_database = $path ."/lab6_web/class/database.php";
    include_once($path_database);
    $db = new Database;
    if (isset($_POST['submit'])) { 
        $id = (int) $_POST['id']; 
        $table = "data_barang";
        $gambar = null;
        $file_gambar = $_FILES['file_gambar']; 
        $sql = "id_barang = '{$id}'"; 
        if ($file_gambar['error'] == 0) {
            $filename = str_replace(' ', '_', $file_gambar['name']); 
            $destination = $path_gambar .'/gambar/' . $filename; 
            if (move_uploaded_file($file_gambar['tmp_name'], $destination)) { 
                $gambar = 'gambar/' . $filename;
            } 
        }         
        $data = [
            'nama' => $_POST['nama'],
            'kategori' => $_POST['kategori'],
            'harga_jual' => $_POST['harga_jual'],
            'harga_beli' => $_POST['harga_beli'],
            'stok' => (int) $_POST['stok'],
            'gambar' => $gambar
        ];
        $result = $db->update($table, $data, $sql);
        header('location: index.php'); 
        
//        var_dump($sql); 
    } 
    $id = $_GET['id']; 
    $sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'"; 
    $result = $db->query($sql);
//    $result = mysqli_query($conn, $sql); 
    if (!$result) 
        die('Error: Data tidak tersedia'); 
    $data = mysqli_fetch_array($result); 
    function is_select($var, $val) { 
        if ($var == $val) 
            return 'selected="selected"'; 
        return false; 
    } 
?> 
<?php require('../../template/header.php'); ?>
<h1>Ubah Barang</h1> 
<div class="content"> 
    <form method="post" action="ubah.php" enctype="multipart/form-data"> 
    <div class="input">
            <div class="col-25">
                <label for="nama">Nama Barang</label>
            </div>
            <div class="col-75">
                <input type="text" name="nama" value="<?php echo $data['nama'];?>" />
            </div>
        </div> 
        <div class="input"> 
            <div class="col-25">
                <label for="kategori">Kategori</label> 
            </div>
            <div class="col-75">
                <select id="kategori" name="kategori"> 
                    <option <?php echo is_select ('Komputer', $data['kategori']);?> value="Komputer">Komputer</option> 
                    <option <?php echo is_select ('Komputer', $data['kategori']);?> value="Elektronik">Elektronik</option> 
                    <option <?php echo is_select ('Komputer', $data['kategori']);?> value="Hand Phone">Hand Phone</option> 
                </select> 
            </div>
        </div> 
        <div class="input"> 
            <div class="col-25">
                <label for="harga_jual">Harga Jual</label> 
            </div>
            <div class="col-75">
                <input type="text" name="harga_jual" value="<?php echo $data['harga_jual'];?>" /> 
            </div>
        </div> 
        <div class="input"> 
            <div class="col-25">
                <label for="harga_beli">Harga Beli</label> 
            </div>
            <div class="col-75">
                <input type="text" name="harga_beli" value="<?php echo $data['harga_beli'];?>" />
            </div>
        </div>
        <div class="input">
            <div class="col-25">
                <label for="stok">Stok</label> 
            </div>
            <div class="col-75">
                <input type="text" name="stok" value="<?php echo $data['stok'];?>" /> 
            </div> 
        </div> 
        <div class="input"> 
            <div class="col-25">
                <label for="file_gambar">File Gambar</label> 
            </div>
            <div class="col-75">
                <input type="file" id="file_gambar" name="file_gambar" />
            </div> 
        </div> 
        <div class="submit"> 
            <input type="hidden" name="id" value="<?php echo $data['id_barang'];?>" /> 
            <input type="submit" name="submit" value="Simpan" /> 
        </div> 
    </form> 
</div> 

<?php require('../../template/footer.php'); ?>      