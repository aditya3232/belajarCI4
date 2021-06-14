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
        // mengambil data validation, dari validasi form input yg ada didalam method save, agar masuk ke view create
        // jgn lupa ketika menggunakan validation(), tambahkan session() di BaseController
        $data = [
            'validation' => \Config\Services::validation()
        ];

        // menampilkan halaman insert data/create data/tambah data (sama saja)
        return view('komik/create', $data);
    }

    public function save()
    {
        // validasi form input
        // dengan validasi form, ketika salah memasukkan input, maka tombol tambah data gk akan jalan
        // arti dari konidisi ini adalah jika parameter tidak valid, 
        // maka kembalikan ke controller /Komik/create, beserta semua inputan sebelumnya, & fungsi validasi
        if(!$this->validate([
            // 'name inputan' => 'rules1|rules2', 
            // informasi rules dapat dilihat di documentation tentang validation
            // is_unique[nama tabel.field tabel] (is_unique => judul komik tidak boleh sama)
            // 'judul' => 'required|is_unique[komik.judul]'  => INI CARA NORMAL, PESANNYA BAHASA INGGRIS SESUAI CI4

            // memberikan rules dan pesan error bahasa indonesia
            // 'judul', 'sampul', ini diambil dari name inputannya
            'judul' => [
                'rules'     => 'required|is_unique[komik.judul]',
                'errors'    => [
                    // {field}, buat ngambil name formnya yaitu judul
                    'required'  => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
                ],
                'sampul' => [
                    // ini artinya [name input=sampul] ukuran maksimal-nya 1mb, tipe file nya harus gambar, extensi nya bisa jpg/jpeg/png.
                    // ext_in (extensi file nya apa) is_image (khusus untuk gambar)
                    // mime_in & is_image biasanya harus digabung agar lebih aman
                    'rules'     => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 
                    'errors'    => [
                        'max_size'  => 'Ukuran gambar terlalu besar',
                        'is_image'  => 'Yang anda pilih bukan gambar',
                        'mime_in'   => 'Yang anda pilih bukan gambar'
                    ]
                    
                ]

                
        ])){
            // //fungsi validation() dimasukkan ke variabel $validation
            // $validation = \Config\Services::validation(); 
            // // withInput() disini digunakan untuk menampung hasil inputan & di simpan di function old()
            // return redirect()->to('/Komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Komik/create')->withInput();
        }

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // memberikan gambar default ketika user tidak mengupload gambar
        // cek apakah tidak ada gambar yang diupload
        if($fileSampul->getError() == 4){//error 4 artinya tidak ada file yg diupload
            $namaSampul = 'default.png';
        } else{
            // generate nama file baru random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file sampul ke folder img. move itu langsung memilih folder public
            $fileSampul->move('img', $namaSampul);
            // ambil nama file sampul
            $namaSampul = $fileSampul->getName();
        }
        
        // mengolah judul yang diubah menjadi slug, sehingga judul jadi ramah url
        // parameternya adalah (ambil judulnya, separatornya apa, lowecase true/false)
        $slug = url_title($this->request->getVar('judul'), '-', true);
        // save data 
        $this->komikModel->save([
            // mengambil field yang akan disimpan
            // getVar(), bisa method post atau get
            'judul'     => $this->request->getVar('judul'),
            'slug'     =>  $slug, //field 'slug', akan diisi dengan variabel $slug = (url_title())
            'penulis'   => $this->request->getVar('penulis'),
            'penerbit'  => $this->request->getVar('penerbit'),
            'sampul'    => $namaSampul
        ]);
        
        // flashData
        // parameternya ('key (terserah isinya)', 'value')
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        
        // kalau sudah save kembalikan ke halaman /komik
        return redirect()->to('/komik');
    }
    
    public function delete($id)
    {
        // cari gambar berdasarkan id (yg akan dihapus)
        $komik = $this->komikModel->find($id);
        // cek jika file gambarnya default (jgn dihapus)
        if($komik['sampul'] != 'default.png'){
            // hapus gambar yg berada di folder public/img
            unlink('img/' . $komik['sampul']);
        }
        
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/komik');
    }
    
    public function edit($slug)
    {
        $data = [
            'validation'    => \Config\Services::validation(),
            // mengambil data berdasarkan slug
            'komik'         => $this->komikModel->getKomik($slug)
        ];
        
        return view('komik/edit', $data);
    }
    
    public function update($id)
    {
        // cek judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        // jika judul komik lama = judul komik baru (yg ada di form) maka judul harus diisi, jikatidak judul harus diisi & harus unik
        if($komikLama['judul'] == $this->request->getVar('judul')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        
        if(!$this->validate([
            'judul'     => [
                'rules'     => $rule_judul,
                'errors'    => [
                    'required'  => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                    ]
                ],  
                'sampul' => [
                    // ini artinya [name input=sampul] ukuran maksimal-nya 1mb, tipe file nya harus gambar, extensi nya bisa jpg/jpeg/png.
                    // ext_in (extensi file nya apa) is_image (khusus untuk gambar)
                    // mime_in & is_image biasanya harus digabung agar lebih aman
                    'rules'     => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]', 
                    'errors'    => [
                        'max_size'  => 'Ukuran gambar terlalu besar',
                        'is_image'  => 'Yang anda pilih bukan gambar',
                        'mime_in'   => 'Yang anda pilih bukan gambar'
                        ]
                        
                        ]
                        ])){
                            return redirect()->to('/Komik/edit/' . $this->request->getVar('slug'))->withInput();
                        }

                        // ambil gambar baru (yg baru diupload di form edit)
                        $fileSampul = $this->request->getFile('sampul');
                        // cek gambar, apakah tetap gambar lama
                        if($fileSampul->getError() == 4){ //error 4 artinya tidak ada file yg diupload (diedit)
                            // nama sampul ambil yg lama
                            $namaSampul = $this->request->getVar('sampulLama');
                        } else {
                            // generate nama file baru random
                            $namaSampul = $fileSampul->getRandomName();
                            // pindahkan gambar
                            $fileSampul->move('img', $namaSampul);
                            // hapus file yang lama (karena akan hapus nama sampulLama biar tidak error nama sampul yg diupload harus nama random biar tidak eror)
                            unlink('img/' . $this->request->getVar('sampulLama'));
                        }
                        
                        $slug = url_title($this->request->getVar('judul'), '-', true);
                        $this->komikModel->save([
                            
                            'id'        => $id,
                            'judul'     => $this->request->getVar('judul'),
                            'slug'      => $slug, 
                            'penulis'   => $this->request->getVar('penulis'),
                            'penerbit'  => $this->request->getVar('penerbit'),
                            'sampul'    => $namaSampul
                        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        
        return redirect()->to('/komik');
    }
}