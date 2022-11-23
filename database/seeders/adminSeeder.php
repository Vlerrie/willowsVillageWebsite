<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'roodt.brendan@gmail.com',
            'name' => 'Brendan',
            'surname' => 'Roodt',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => Hash::make('Password'),
            'admin' => true
        ]);
    }
}
