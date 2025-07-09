<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Payments;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Transaction::create([
        //     'c_id' => 1,
        //     'room_id' => 2,
        //     'check_in' => Carbon::now(),
        //     'check_out' => Carbon::tomorrow(),
        //     'status' => 'Reservation'
        // ]);

        PaymentMethod::create([
            'nama' => 'OFFLINE',
            'no_rek' => null,
        ]);

        PaymentMethod::create([
            'nama' => 'BCA',
            'no_rek' => '5221-8420-7788-2024',
        ]);
        PaymentMethod::create([
            'nama' => 'BRI',
            'no_rek' => '7632-01-007520-53-0',
        ]);
        PaymentMethod::create([
            'nama' => 'BNI',
            'no_rek' => '099-5653-265',
        ]);
        PaymentMethod::create([
            'nama' => 'BTN',
            'no_rek' => '00461-01-50-0029320-0',
        ]);
        PaymentMethod::create([
            'nama' => 'Mandiri',
            'no_rek' => '113-00-1522616-4',
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 1, 5),
            'check_out' => Carbon::createFromDate(2022, 1, 7),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INV021CJ23KA',
            'transaction_id' => 1,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 1, 5),
        ]);


        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 2, 1),
            'check_out' => Carbon::createFromDate(2022, 2, 2),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INVB0912AS2',
            'transaction_id' => 2,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 2, 1),
        ]);


        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 2, 3),
            'check_out' => Carbon::createFromDate(2022, 2, 4),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INV01FAJ412',
            'transaction_id' => 3,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 2, 3),
        ]);



        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 3, 4),
            'check_out' => Carbon::createFromDate(2022, 3, 5),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 2,
            'invoice' => 'INV4KU5UK4',
            'transaction_id' => 4,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 3, 4),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 3, 6),
            'check_out' => Carbon::createFromDate(2022, 3, 7),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 5,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 3, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 4, 2),
            'check_out' => Carbon::createFromDate(2022, 4, 3),
            'status' => 'Reservation'
        ]);
        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 6,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 4, 2),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 4, 4),
            'check_out' => Carbon::createFromDate(2022, 4, 5),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 7,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 4, 4),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 4, 6),
            'check_out' => Carbon::createFromDate(2022, 4, 7),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 4, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 5, 6),
            'check_out' => Carbon::createFromDate(2022, 5, 7),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 5, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 6, 6),
            'check_out' => Carbon::createFromDate(2022, 6, 7),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 6, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 7, 6),
            'check_out' => Carbon::createFromDate(2022, 7, 7),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 7, 6),
        ]);


        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 8, 8),
            'check_out' => Carbon::createFromDate(2022, 8, 9),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 8, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 9, 6),
            'check_out' => Carbon::createFromDate(2022, 9, 8),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 9, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 10, 6),
            'check_out' => Carbon::createFromDate(2022, 10, 8),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 10, 6),
        ]);

        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 11, 6),
            'check_out' => Carbon::createFromDate(2022, 11, 8),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 11, 6),
        ]);
        Transaction::create([
            'c_id' => 1,
            'room_id' => 2,
            'check_in' => Carbon::createFromDate(2022, 12, 6),
            'check_out' => Carbon::createFromDate(2022, 12, 8),
            'status' => 'Reservation'
        ]);

        Payments::create([
            'c_id' => 1,
            'payment_method_id' => 1,
            'invoice' => 'ngasal',
            'transaction_id' => 8,
            'price' => 2000000,
            'status' => 'Down Payment',
            'created_at' => Carbon::createFromDate(2022, 12, 6),
        ]);
    }
}
