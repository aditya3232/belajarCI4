<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Detail | Belajar CI4</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <!-- card -->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <!-- akan mengambil gambar sesuai dengan $slug-nya -->
                        <img src="/img/<?= $komik['sampul']; ?>" alt="..." class="sampul">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- akan mengambil judul sesuai dengan slug-nya -->
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                            <!-- akan mengambil penulis sesuai dengan slug-nya -->
                            <p class="card-text"><b>Penulis :</b><?= $komik['penulis']; ?></p>
                            <!-- akan mengambil penerbit sesuai dengan slug-nya -->
                            <p class="card-text"><small class="text-muted"><b>Penerbit :</b><?= $komik['penerbit']; ?></small></p>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            <br></br>
                            <a href="/komik">Kembali ke daftar komik</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir card -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>