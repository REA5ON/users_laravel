<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $users = \App\Models\User::factory(60)->create();

         foreach ($users as $user) {
             UserProfile::create([
                 'email' => $user->email,
                 'name' => $user->name,
                 'status' => 'danger'
             ]);
         }
    }
}
