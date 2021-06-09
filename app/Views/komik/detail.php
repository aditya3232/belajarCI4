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
                            <!-- fitur delete dengan http method spoofing (aturan penulisan http method spoofing ini sudah standar) -->
                            <form action="/komik/<?= $komik['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Delete</button>
                            </form>
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