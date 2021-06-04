<!-- Setiap View yang ingin menggunakan layout harus meng-extend Layoutnya. -->
<?= $this->extend('layout/template'); ?>

<!-- Lalu setelah itu, barulah kita buat view section untuk menampilkan konten. -->
<?= $this->section('title'); ?>
<title>Home | Belajar CI4</title>
<?= $this->endSection(); ?>

<!-- Lalu setelah itu, barulah kita buat view section untuk menampilkan konten. -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello World!</h1>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>