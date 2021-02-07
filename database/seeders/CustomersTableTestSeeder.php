<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableTestSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => 'MJ',
            'last_name' => 'Convento',
            'username' => 'mjmconvento',
            'email' => 'mjmconvento@gmail.com',
            'password' => 'password',
            'gender' => 'Male',
            'phone' => '222-5428',
            'country' => 'Philippines',
            'city' => 'Makati'
        ]);
    }
}
