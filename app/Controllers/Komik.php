<?php

namespace App\Controllers;

class Komik extends BaseController
// $this->komikModel, itu dari baseController, 
// yang merupakan inisialisasi dari kelas KomikModel.
{
    
    public function index()
    {
        $data = [
            // getKomik() gk perlu parameter karena kita ingin mengambil return findAll()
            'komik' => $this->komikModel->getKomik()
        ];

        // data disini hanya akan dikirim ke controller komik method index
        return view('komik/index', $data);
    } 

    public function detail ($slug)
    // data slug dari link akan diterima oleh parameter ($slug) pada method detail
    {
        $data = [
            // getKomik() diberi parameter karena kita ingin mengambil return where(['slug' => $slug])->first()
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // data disini hanya akan dikirim ke controller komik method detail
        return view('komik/detail', $data);
    }
}