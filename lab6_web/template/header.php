<?php 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path_gambar = $path ."/lab6_web";
    $path_database = $path ."/lab6_web/class/database.php";
    include_once($path_database);
    $db = new Database();
    $sql = 'SELECT * FROM data_barang';
    $result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Modular</title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>PEMROGRAMAN WEB-2</h1>
            </header>
            <nav>
                <a href="index.php">Home</a>
                <a href="tambah.php">Tambah Data Barang</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </nav>