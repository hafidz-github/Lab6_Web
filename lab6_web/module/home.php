<?php require('../../template/header.php'); ?>

<div class="content">
    <div class="table_utama">
        <table>
            <caption>Daftar Barang</caption>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Katagori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result) : ?>
                <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><img src="<?= "../../".$row['gambar']; ?>" alt="<?= $row['nama']; ?>" style="size: 150px;"></td>
                        <td><b><?= $row['nama']; ?></b></td>
                        <td><?= $row['kategori']; ?></td>
                        <td><?= $row['harga_jual']; ?></td>
                        <td><?= $row['harga_beli']; ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                            <a href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile;
            else : ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<?php require('../../template/footer.php'); ?>