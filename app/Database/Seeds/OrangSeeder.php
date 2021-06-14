<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; 

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
        public function run()
        {
                // masukkan (key => data) ke dalam array lagi jika ada data baru yg akan dimasukkan (jadi array didalam array $data)
                // $data = [
                //     [
                //         'nama'          => 'Andi',
                //         'alamat'        => 'JL. ABC No. 40',
                //         'created_at'    => Time::now(),
                //         'updated_at'    => Time::now()
                //     ],
                //     [
                //         'nama'          => 'Lumine',
                //         'alamat'        => 'JL. ABC No. 44',
                //         'created_at'    => Time::now(),
                //         'updated_at'    => Time::now()
                //     ],
                //     [
                //         'nama'          => 'Diona',
                //         'alamat'        => 'JL. ABC No. 50',
                //         'created_at'    => Time::now(),
                //         'updated_at'    => Time::now()
                //     ]
                

                // ];
                $faker = \Faker\Factory::create('id_ID'); //parameter negara indonesia, agar datanya orang indo
                for($i=0; $i<100; $i++) { // ulang 100x

                    $data = [
                        'nama'          => $faker->name,
                        'alamat'        => $faker->Address,
                        'created_at'    => Time::createFromTimestamp($faker->unixTime()),//memformat datetime dari faker ke string agar gk eror
                        'updated_at'    => Time::now()
                    ];
                    
                    // Simple Queries
                    // $this->db->query("INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)", $data); // VALUES haru sama dgn key $data
                    
                    // Using Query Builder
                    $this->db->table('orang')->insert($data); // digunakan jika hanya memasukkan satu data (jika looping pakai ini, jgn batch)
                    // $this->db->table('orang')->insertBacth($data); // gunakan insertBatch untuk banyak data
                }

        }
}