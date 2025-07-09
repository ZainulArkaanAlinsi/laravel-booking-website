<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rs = array(
            array('id' => '1','name' => 'Vacant','code' => 'V','info' => 'Sebutan bagi kamar yang kosong.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '2','name' => 'Occupied','code' => 'O','info' => 'Suatu kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '3','name' => 'Occupied Clean','code' => 'OC','info' => 'Suatu kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel pada kamar yang bersih.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '4','name' => 'Occupied Dirty','code' => 'OD','info' => 'Suatu kamar yang sedang ditempati oleh sesorang secara sah dan teregister sebagai tamu hotel pada kamar yang kotor. Ini terjadi akibat perubahan status dari OC ke OD setelah melewati satu malam stay.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '5','name' => 'Vacant Clean Inspected','code' => 'VCI','info' => 'Kamar kosong yang sudah dibersihkan dan diperiksa oleh floor supervisor dan siap untuk menerima tamu (dijual).','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '6','name' => 'Vacant Clean','code' => 'VC','info' => 'Kamar yang kosong dengan keadaan bersih.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '7','name' => 'Vacant Dirty','code' => 'VD','info' => 'Kamar yang kosong dengan keadaan kotor. kamar kotor dapat terjadi karena tamu yang sudah check out atau program cleaning dari housekeeping.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '8','name' => 'Compliment','code' => 'Comp','info' => 'Kamar yang terigester oleh seorang tamu, namun kamar tersebut free of charge (gratis).','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '9','name' => 'House Use','code' => 'HU','info' => 'Kamar yang teregister tetapi digunakan oleh pihak managemen hotel.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '10','name' => 'Do not Disturb','code' => 'DND','info' => 'Kamar yang menaruh tanda tersebut berarti tamu tidak ingin di ganggu.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '11','name' => 'Sleep Out','code' => 'SO','info' => 'Seorang tamu yang masih teregister, namun kamar tidak dipergunakan karena tamu tesebut harus meninggalkan hotel beberapa hari atau tamu sedang tidur diluar area hotel.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '12','name' => 'Skipper','code' => 'Skip','info' => 'Tamu meninggalkan hotel sebelum melunasi semua kewajibannya .','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '13','name' => 'Out of Service','code' => 'OS','info' => 'Status kamar yang sedang dalam perbaikan.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '14','name' => 'Out of Order','code' => 'OOO','info' => 'Kamar yang memerlukan perbaikan yang serius, biasanya lama perbaikan lebih dari satu hari. Status ini dapat terjadi karena kerusakan di kamar atau progam cleaning dari housekeeping.Out of order mengurangi room availability.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '15','name' => 'Due Out / Expected Departure','code' => 'DO/ED','info' => 'Daftar kamar-kamar yang diharapkan untuk check-out hari ini sesuai dengan tanggal departure.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '16','name' => 'Expected Arrival','code' => 'EA','info' => 'Daftar nama-nama tamu yang diharapkan tiba hari ini.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '17','name' => 'Check Out','code' => 'CO','info' => 'Tamu yang sudah meninggalkan hotel hari ini setelah melunasi semua kewajibannya termasuk menyerahkan kunci yang dipakai ke front office.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '18','name' => 'Late Check Out','code' => 'LCO','info' => 'Permintaan tamu untuk meninggalkan hotel lebih lambat dari waktu check out yang ditentukan.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '19','name' => 'Occupeid no Luggage','code' => 'ONL','info' => 'Seorang tamu yang masih teregister pada suatu kamar tanpa suatu barang apapun di dalamnya.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '20','name' => 'Double Lock','code' => 'DL','info' => 'Permintaan tamu ke pihak hotel untuk melakukan double lock sehingga tidak seorangpun dapat masuk ke kamar tersebut.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02')
          );

          RoomStatus::create($rs[0]);
          RoomStatus::create($rs[1]);
          RoomStatus::create($rs[2]);
          RoomStatus::create($rs[3]);
          RoomStatus::create($rs[4]);
          RoomStatus::create($rs[5]);
          RoomStatus::create($rs[6]);
          RoomStatus::create($rs[7]);
          RoomStatus::create($rs[8]);
          RoomStatus::create($rs[9]);
          RoomStatus::create($rs[10]);
          RoomStatus::create($rs[11]);
          RoomStatus::create($rs[12]);
          RoomStatus::create($rs[13]);
          RoomStatus::create($rs[14]);
          RoomStatus::create($rs[15]);
          RoomStatus::create($rs[16]);
          RoomStatus::create($rs[17]);
          RoomStatus::create($rs[18]);
          RoomStatus::create($rs[19]);
    }
}
