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

        // konidisi agar Komik/save ketika dienter tidak error karena method urlnya adalah post
        // karena sebenarnya komik/save, /save-nya dianggap sebagai slug di post get
        // fitur ini tidak perlu diberikan tidak apa, karena method save langsung redirect ke view komik, 
        // Jadi link komik/save g sempet keliatan
        if(empty($data['komik']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik' . $slug . 'tidak ditemukan.');
        }

        // data disini hanya akan dikirim ke controller komik method detail
        return view('komik/detail', $data);
    }

    public function create()
    {
        // menampilkan halaman insert data/create data/tambah data (sama saja)
        return view('komik/create');
    }

    public function save()
    {
        // mengolah judul yang diubah menjadi slug, sehingga judul jadi ramah url
        // parameternya adalah (ambil judulnya, separatornya apa, lowecase true/false)
        $slug = url_title($this->request->getVar('judul'), '-', true);
        // save data 
        $this->komikModel->save([
            // mengambil field yang akan disimpan
            // getVar(), bisa method post atau get
            'judul'     => $this->request->getVar('judul'),
            'slug'     => $slug, //field 'slug', akan diisi dengan variabel $slug = (url_title())
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $this->request->getVar('sampul')
        ]);

        // flashData
        // parameternya ('key (terserah isinya)', 'value')
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        // kalau sudah save kembalikan ke halaman /komik
        return redirect()->to('/komik');
    }
}