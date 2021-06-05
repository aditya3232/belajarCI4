<?php

namespace App\Controllers;

class Komik extends BaseController
{
    
    public function index()
    {
        // fitur model mencari semua data yg ada didalam tabel komik
        // sebelum menggunakan fitur ini, inisialisasi dulu model (KomikModel.php) didalam BaseController
        $komik = $this->komikModel->findAll();
        $data = [
            // 'komik' diambil dari $komik
            // nanti 'komik' akan dikirim ke $data
            'komik' => $komik,
        ];

        return view('komik/index', $data);
    } 
}