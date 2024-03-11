<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostalCode;

class PostalCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostalCode::create([
            'postal_code' => '0640941',
            'prefecture' => '北海道',
            'city' => '札幌市中央区',
            'address' => '旭ケ丘',
        ]);

        PostalCode::create([
            'postal_code' => '0600041',
            'prefecture' => '北海道',
            'city' => '札幌市中央区',
            'address' => '大通東',
        ]);
    }
}
