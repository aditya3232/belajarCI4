<!-- Setiap View yang ingin menggunakan layout harus meng-extend Layoutnya. -->
<?= $this->extend('layout/template'); ?>

<!-- Lalu setelah itu, barulah kita buat view section untuk menampilkan konten. -->
<?= $this->section('title'); ?>
<title>About | Belajar CI4</title>
<?= $this->endSection(); ?>

<!-- Lalu setelah itu, barulah kita buat view section untuk menampilkan konten. -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>About Me</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio libero dignissimos, culpa reprehenderit obcaecati voluptas, ad error consequatur enim ducimus provident voluptatibus? Vitae dolorem quasi delectus voluptatum odio
                tenetur voluptatem!</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>