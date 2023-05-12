<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('productos');
        $table->truncate();
        $productos = [
            [
                'name'=>'producto 1',
                'desc'=>'producto 1',
                'price'=>'12.50'
            ],
            [
                'name'=>'producto 2',
                'desc'=>'producto 2',
                'price'=>'13.50'
            ],
            [
                'name'=>'producto 3',
                'desc'=>'producto 3',
                'price'=>'3.50'
            ],
            [
                'name'=>'producto 4',
                'desc'=>'producto 4',
                'price'=>'3.50'
            ],
        ];
        $table->insert($productos);
    }
}
