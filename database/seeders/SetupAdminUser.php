<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Carbon;

class SetupAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // setup user admin
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@tenjokampung.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now(),
            'created_by' => 'seeder'
        ]);

        UserRole::create([
            'role_id' => 1,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'created_by' => 'seeder'
        ]);
    }
}
