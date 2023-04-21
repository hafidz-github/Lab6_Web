<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path_gambar = $path ."/lab6_web";
    $path_database = $path ."/lab6_web/class/database.php";
    include_once($path_database);
    $db = new Database();
    $table = "data_barang";
    $id = $_GET['id']; 
    $sql = " WHERE id_barang = '{$id}'"; 
    $result = $db->delete($table, $sql);
    header("location: index.php"); 
?>