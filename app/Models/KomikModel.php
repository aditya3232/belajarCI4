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

    // default parameter ($slug) adalah kosong
    public function getKomik($slug = false)
    // method ini memiliki kondisi jika slug kosong cari semua data, kalau ada slug cari satu data saja
    // nanti method ini akan dipanggil di controller
    {
        if ($slug == false){
            // findAll() -> untuk mengambil semua data dari database
            // $this disini adalah kelas KomikModel itu sendiri
            return $this->findAll();
        } // gk perlu pakai else, karena kalau return langsung keluar dari functionnya
        // where() -> untuk menentukan data mana yang akan diambil
        // ['slug' => $slug] -> data yg diambil yaitu field 'slug' yg sama dengan $slug
        // first() -> untuk mengambil satu data saja (satu row saja)
        return $this->where(['slug' => $slug])->first();        
    }

}