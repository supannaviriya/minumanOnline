<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class minumSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => '1',
                'namaMinum' => 'Boba Brown Sugar',
                'stok' => '15',
                'harga' => '15000',
                'image' => 'image/0A0MFU3FE2v6hXS5QYy4fxEjUUpSq7tzczX323J9.jpg'
            ],

            [
                'id' => '2',
                'namaMinum' => 'Boba Chocolate',
                'stok' => '15',
                'harga' => '15000',
                'image' => 'image/Uq92dvBvtT0SVc2IEUkb7LL1PfG8E3dLmXf43NfP.jpg'
            ],

            [
                'id' => '3',
                'namaMinum' => 'Boba Matcha',
                'stok' => '15',
                'harga' => '25000',
                'image' => 'image/R0Ci3zZevURuf8NrVUggNm2SQxMkDdFZqkOIhzHk.jpg'
            ],

            [
                'id' => '4',
                'namaMinum' => 'Boba Taro',
                'stok' => '15',
                'harga' => '15000',
                'image' => 'image/edrJ847WCtnMjKZQb1bZI1iuJBBq6TmDkzCWG1FE.jpg'
            ],

            [
                'id' => '5',
                'namaMinum' => 'Boba Milktea',
                'stok' => '15',
                'harga' => '15000',
                'image' => 'image/VfYeiSEi6Fb90qBZqbOKE2ug0Q9CnglQ4JRGofzy.jpg'
            ],

            [
                'id' => '6',
                'namaMinum' => 'Boba Strawberry',
                'stok' => '15',
                'harga' => '15000',
                'image' => 'image/8m00UAMIl48A8l1EnTKMFIhGh08tmgeZi3BsqsGB.jpg
                '
            ]

        ]);
    }
}
