<?php

namespace Database\Seeders;

use App\Models\StandardSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StanderSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StandardSize::create([
            'name' => [
                'en' => '20x30cm',
                'ar' => '20x30cm',
            ],
        ]);

        StandardSize::create([
            'name' => [
                'en' => '30x40cm',
                'ar' => '30x40cm',
            ],
        ]);

        StandardSize::create([
            'name' => [
                'en' => '35x50cm',
                'ar' => '35x50cm',
            ],
        ]);

        StandardSize::create([
            'name' => [
                'en' => '40x60cm',
                'ar' => '40x60cm',
            ],
        ]);

        StandardSize::create([
            'name' => [
                'en' => '50x70cm',
                'ar' => '50x70cm',
            ],
        ]);

        StandardSize::create([
            'name' => [
                'en' => '60x90cm',
                'ar' => '60x90cm',
            ],
        ]);
    }
}
