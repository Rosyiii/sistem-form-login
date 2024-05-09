<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
        [
            "name" => "Admin",
            "username" => "admin",
            "password" => Hash::make("admin"),
            "jabatan" => "Admin"
        ]);

        User::create(
        [
            "name" => "Author",
            "username" => "author",
            "password" => Hash::make("author"),
            "jabatan" => "Author"
        ]);
    }
}
