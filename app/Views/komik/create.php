<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<title>Tambah Data | Belajar CI4</title>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>
            <!-- form tambah data, tambahkan enctype supaya form bisa bekerja dengan inputan file -->
            <form action="/Komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <!-- diinputan judul terdapat kondisi yg akan mengeluarkan is-invalid(form warna merah) jika ada error di name 'judul' -->
                        <!-- selain itu juga ada function old() yg akan menyimpan data inputan sebelumnya kedalam form input -->
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                        <!-- menampilkan pesan error validasi form inputan -->
                        <div class="invalid-feedback"><?= $validation->getError('judul'); ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">sampul</label>
                    <!-- preview gambar yg akan diupload -->
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <!-- file input bootstrap5 -->
                        <div class="input-group mb-3">
                            <!-- onchange, ketika file berubah, jalankan script previewImg yg ada di template.php -->
                            <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback"><?= $validation->getError('sampul'); ?></div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
            <!-- akhir form tambah data -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>