<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert(['id'    => 1, 'name'  => 'Website1', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('websites')->insert(['id'    => 2, 'name'  => 'Website2', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('subscribers')->insert(['id' => 1, 'website_id' => 1, 'name'  => 'Subscriber1', 'created_at' => now(), 'email' => 'abc@gmail.com']);
    }
}
