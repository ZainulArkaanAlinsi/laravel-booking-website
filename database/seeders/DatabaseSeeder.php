<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\Transaction;
use Carbon\Carbon;
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
        $this->call([
            RoomStatusSeeder::class,
            TypeSeeder::class,
            RoomSeeder::class,
            CustomerSeeder::class,
            UserSeeder::class,
            TransactionSeeder::class,
            ImageRoomSeeder::class,
        ]);

    }
}
