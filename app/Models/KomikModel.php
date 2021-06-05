<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    // konfigurasi model 
    // (dengan mengkonfigurasi model kita sudah bisa menghubungkan model dengan tabel, sehingga kita bisa menggunakan fitur" model)
    // tidak semua harus dikonfigurasi, beberapa konfigurasi sudah ada nilai defaultnya 
    // $tabel = nama tabel
    protected $table = 'komik';
    // $useTimestamps = jika butuh fitur created_at & updated_at otomatis, nilainya jadikan true
    protected $useTimestamps = true;

}