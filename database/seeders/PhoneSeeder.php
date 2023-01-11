<?php

namespace Database\Seeders;

use App\Models\Phones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phones::create([
            'name'=>'IPhone 13 Pro',
            'price'=>'41000'
        ]);

        Phones::create([
            'name'=>'Galaxy S22',
            'price'=>'36000'
        ]);

        Phones::create([
            'name'=>'Galaxy A32',
            'price'=>'19000'
        ]);

        Phones::create([
            'name'=>'Honor 9X',
            'price'=>'9000'
        ]);
    }
}
