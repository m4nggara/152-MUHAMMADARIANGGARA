<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SetupRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'kontributor'
        ];

        foreach($roles as $item) {
            DB::table('roles')->insert([
                'name' => $item,
                'created_at' => Carbon::now(),
                'created_by' => 'seeder'
            ]);
        }
    }
}
