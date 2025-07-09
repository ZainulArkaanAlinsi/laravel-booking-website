<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'cakra', 'address' => 'grand', 'jk' => 'L',
            'job' => 'nganggur', 'birthdate' => Carbon::yesterday()->isoFormat('Y-M-D')
        ]);
        Customer::create([
            'name' => 'customer', 'address' => 'grand', 'jk' => 'L',
            'job' => 'nganggur', 'birthdate' => Carbon::yesterday()->isoFormat('Y-M-D')
        ]);
    }
}
