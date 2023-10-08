<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // City::truncate();
        $json = File::get(base_path('database/data/City.json'));


        $countries = json_decode($json);

        foreach ($countries as $key => $value) {

            City::create([
                'name' => [
                    'en' => $value->city_name_en,
                    'ar' => $value->city_name_ar,
                ],
                'slug' => Str::slug($value->city_name_en),
                'governorate_id' => $value->governorate_id,
            ]);
        }

    }
}
