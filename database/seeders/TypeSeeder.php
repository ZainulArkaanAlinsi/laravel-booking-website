<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array('id' => '1','name' => 'Standard Room','info' => 'Seperti namanya, jenis kamar standard room adalah tipe kamar hotel yang paling dasar di hotel. Biasanya, kamar tipe ini dibanderol dengan harga yang relatif murah. Fasilitas yang ditawarkan pun standar seperti kasur ukuran king size atau dua queen size. Namun, penawaran yang diberikan tergantung pada masing-masing hotel. Standard room hotel bintang 1 dan bintang 5 tentu berbeda.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '2','name' => 'Superior Room','info' => 'Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room. Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangan dari kamar.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '3','name' => 'Deluxe Room','info' => 'Di atas tipe kamar hotel superior room adalah deluxe room. Kamar ini tentu memiliki kamar yang lebih besar. Tersedia pilihan kasur yang bisa kamu pilih, double bed atau twin bed. Biasanya, dari segi interior kamar ini terkesan lebih mewah.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '4','name' => 'Junior Suite Room','info' => 'Tipe kamar hotel junior suite room ditandai dengan adanya ruang tamu. Namun, ruang tamu tersebut masih berada satu ruangan dengan tempat tidur. Ruang tamu tersebut biasanya dibatasi atau disekat dengan lemari besar agar tempat tidur tidak terlihat. ','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '5','name' => 'Suite Room','info' => 'Suite room berada di atas tipe kamar hotel junior suite room. Ruang tamu di kamar hotel ini terpisah dari kamar tidur. Dari segi fasilitas, tentu berbeda dari junior suite room. Selain ruang tamu, biasanya tipe kamar hotel ini dilengkapi dengan dapur.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '6','name' => 'Presidential Suite','info' => 'Presidential suite adalah tipe kamar hotel yang terbaik dan paling mahal. Bahkan, tidak semua hotel memiliki presidential suite. Fasilitas yang ditawarkan pun tentu yang terbaik, mulai dari interior, pemandangan kamar, dan masih banyak lainnya.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '7','name' => 'Single Room','info' => 'Single room adalah tipe kamar hotel yang paling umum. Tipe kamar hotel ini terdiri dari satu single bed, sofa, dan kamar mandi. Ukuran kamarnya juga tidak terlalu besar. Biasanya tipe kamar hotel ini dipilih oleh para backpacker atau solo traveler karena fasilitasnya memang untuk satu orang dan harga yang murah.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '8','name' => 'Twin Room','info' => 'Dari namanya saja, sudah bisa ditebak bahwa tipe kamar hotel ini memiliki dua tempat tidur ukuran single yang terpisah. Tipe kamar hotel ini cocok digunakan untuk suami istri atau menginap bersama teman dengan jumlah orang 2-3 orang.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '9','name' => 'Double Room','info' => 'Ingin menginap dengan lebih nyaman dan fasilitas yang lebih baik? Kamu bisa memesan tipe kamar hotel double room. Tipe kamar hotel ini biasanya memiliki ukuran kasur yang besar seperti king size. Double room ini cocok banget buat pasangan suami istri yang ingin berbulan madu.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '10','name' => 'Family Room/Triple Room','info' => 'Pergi traveling bersama keluarga besar atau teman-teman? Kamu bisa pilih tipe kamar hotel family room. Dari segi ukuran kamar, tentu jauh lebih luas daripada tipe kamar hotel lainnya. Tipe kamar hotel family room ini biasanya tersedia satu tempat dengan ukuran king size dan satu tempat tidur dengan ukuran yang lebih kecil.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '11','name' => 'Connecting Room','info' => 'Tipe kamar hotel dengan Connecting Room ini cocok untuk kamu yang pergi bersama keluarga besar atau rombongan tetapi ingin memiliki kamar tidur masing-masing.  Kamar kamu dan anggota keluarga lainnya akan bersebelahan dan terdapat pintu yang menghubungkan kamar kalian. Sehingga, kalau kamu atau anggota keluarga lainnya ingin ke kamar satu sama lain, bisa melalui connecting door dan tidak perlu repot melalui pintu depan, Toppers.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '12','name' => 'Murphy Room','info' => 'Murphy room ini adalah tipe kamar hotel yang menyediakan sofa bed di kamar. Sofa bed ini digunakan sebagai tempat tidur pada malam hari dan ruang tamu di siang hari. Besar kamar Murphy Room ini sekitar 20 – 40 m. Wah, seru, ya konsepnya!','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '13','name' => 'Accessible Room/Disabled Room','info' => 'Tipe kamar Accessible Room/Disable Room ini tersedia untuk para tamu yang memiliki keterbatasan. Adanya tipe kamar ini juga diwajibkan oleh hukum, loh, untuk menghindari diskriminasi. Hal ini juga dibuat agar memudahkan tamu-temu tersebut saat menginap di hotel.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '14','name' => 'Smoking/Non Smoking Room','info' => 'Biasanya tamu tidak diizinkan untuk merokok di dalam kamar. Tetapi, banyak hotel yang sudah menyediakan tipe kamar hotel Smoking/Non Smoking Room. Hal ini juga berguna agar tidak mengganggu tamu selanjutnya dengan aroma rokok yang terdapat pada kamar. Jadi, kalau kamu seorang perokok, sekarang bisa memesan kamar dengan tipe smooking room.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '15','name' => 'Cabana Room','info' => 'Kamu ingin langsung berenang saat buka pintu kamar? Atau punya private pool? Pilih tipe kamar hote Cabana Room! Tipe kamar hotel ini memang didesain dengan kolam renang private untuk pemesan kamar tersebut. Luas kamar Cabana Room ini sekitar 30 – 40 m.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02')
          );

          Type::create($types[0]);
          Type::create($types[1]);
          Type::create($types[2]);
          Type::create($types[3]);
          Type::create($types[4]);
          Type::create($types[5]);
          Type::create($types[6]);
          Type::create($types[7]);
          Type::create($types[8]);
          Type::create($types[9]);
          Type::create($types[10]);
          Type::create($types[11]);
          Type::create($types[12]);
          Type::create($types[13]);
          Type::create($types[14]);
    }
}
