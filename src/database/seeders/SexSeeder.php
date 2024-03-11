<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sex;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sex::create([
            'id' => '1',
            'sex' => '男',
        ]);

        Sex::create([
            'id' => '2',
            'sex' => '女',
        ]);

        Sex::create([
            'id' => '3',
            'sex' => 'その他',
        ]);
    }
}
