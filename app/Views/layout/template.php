<!-- 
    ini adalah halaman template/layout. 
    layout kita butuhkan agar tidak mengulang" kode yang sama didalam view. 
    cukup buat 1 kode layout dan nanti akan digunakan di beberapa view.
 -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- judul -->
    <!-- kode ini berfungsi untuk merender section konten yang ada didalam view.
         jadi nanti dibagian ini akan berisi konten yang berbeda-beda. -->
    <?= $this->renderSection('title'); ?>
    <!-- akhir judul -->

</head>

<body>
    <!-- navbar  -->
    <!-- View Partial bisa kita include-kan atau gunakan di dalam Layout maupun View. -->
    <?= $this->include('layout/navbar'); ?>
    <!-- akhir navbar -->

    <!-- konten -->
    <!-- kode ini berfungsi untuk merender section konten yang ada didalam view.
         jadi nanti dibagian ini akan berisi konten yang berbeda-beda. -->
    <?= $this->renderSection('content'); ?>
    <!-- akhir konten -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>