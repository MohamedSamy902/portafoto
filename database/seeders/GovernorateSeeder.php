<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Governorate::truncate();
        $json = File::get(base_path('database/data/Governorate.json'));
        $countries = json_decode($json);

        foreach ($countries as $key => $value) {

            Governorate::create([
                'name' => [
                    'en' => $value->governorate_name_en,
                    'ar' => $value->governorate_name_ar,
                ],
                'slug' => Str::slug($value->governorate_name_en),
                'price' => 150,
            ]);
        }
    }
}
