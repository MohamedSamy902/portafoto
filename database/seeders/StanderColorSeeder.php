<?php

namespace Database\Seeders;

use App\Models\StandardColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StanderColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        StandardColor::create([
            'name' => [
                'en' => 'black',
                'ar' => 'الأسود',
            ],
        ]);

        StandardColor::create([
            'name' => [
                'en' => 'white',
                'ar' => 'الأبيض',
            ],
        ]);

        StandardColor::create([
            'name' => [
                'en' => 'gold',
                'ar' => 'الدهبى',
            ],
        ]);

        StandardColor::create([
            'name' => [
                'en' => 'light wooden',
                'ar' => 'الخشبى الفاتح',
            ],
        ]);

        StandardColor::create([
            'name' => [
                'en' => 'dark wooden',
                'ar' => 'الخشبى الغامق',
            ],
        ]);
    }
}
