<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Komik | Belajar CI4</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- tabel -->
            <h1 class="mt-2">Daftar Komik</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- inisialisasi $i = 1; (digunakan untuk looping nomor baris)-->
                    <?php $i = 1; ?>
                    <?php foreach($komik as $k): ?>
                    <tr>
                        <!-- looping $i (nomor baris) -->
                        <th scope="row"><?= $i++; ?></th>
                        <!-- cara memanggil gambar adalah dengan memanggil field tempat nama gambar yang berada -->
                        <!-- dengan begitu src dari image akan diarahkan ke folder img/ dengan nama file gambar berdasarkan database  -->
                        <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                        <td><?= $k['judul']; ?></td>
                        <td>
                            <a href="" class="btn btn-success">Detail</a>
                        </td>
                    </tr>
                    <?php endForeach; ?>
                </tbody>
            </table>
            <!-- akhir tabel -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>