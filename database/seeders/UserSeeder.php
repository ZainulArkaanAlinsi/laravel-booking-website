<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminCustomer = Customer::create(['name' => 'Admin']);
        $customerCustomer = Customer::create(['name' => 'Customer']);

        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'c_id' => $adminCustomer->id,
                'telp' => 851312512,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'is_admin' => 1
            ]
        );
        User::create([
            'username' =>  'Customer',
            'c_id' => $customerCustomer->id,
            'telp' => 851312512,
            'email' => 'admsin@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => 0
        ]);
    }
}
