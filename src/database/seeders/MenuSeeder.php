<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'id' => '1',
            'menu' => 'カット',
            'charge' => '3000',
        ]);

        Menu::create([
            'id' => '2',
            'menu' => 'カラー',
            'charge' => '4000',
        ]);

        Menu::create([
            'id' => '3',
            'menu' => 'パーマ',
            'charge' => '5000',
        ]);

        Menu::create([
            'id' => '4',
            'menu' => 'トリートメント',
            'charge' => '1000',
        ]);

        Menu::create([
            'id' => '5',
            'menu' => 'ハイライト(1本)',
            'charge' => '500',
        ]);
    }
}
