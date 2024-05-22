<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SetupCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // [ 'name' => 'Semua Kategori', 'icon' => 'ph-house', 'icon_type' => 'icon'],
            [ 'name' => 'Produk', 'icon' => 'ph-shopping-bag-open', 'icon_type' => 'icon'],
            [ 'name' => 'Destinasi', 'icon' => 'ph-map-pin-line', 'icon_type' => 'icon'],
        ];

        foreach ($categories as $key => $value) {
            Category::create([
                'name' => $value['name'],
                'icon_source' => $value['icon'],
                'icon_type' => $value['icon_type'],
                'created_at' => Carbon::now(),
                'created_by' => 'seeder',
            ]);
        }
    }
}
