<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory(200)->create();

        // Manual Item Seeder
        $items = [
            [
                'slug' => Str::uuid()->toString(),
                'name' => "Jalakotek Asli Majalengka",
                'img_path_banner' => "iresources/ids_2_1716485966.jpg",
                'desc' => "<h2>Jalakotek: Sensasi Gurih Pedas Khas Majalengka yang Menggugah Selera</h2><p><strong>Jalakotek</strong>, camilan khas Majalengka ini siap menggoda lidah Anda dengan perpaduan rasa gurih, pedas, dan tekstur renyah yang tak terlupakan. Dibuat dari adonan tepung terigu dan tapioka, jalakotek menghadirkan sensasi unik yang berbeda dari jajanan gorengan pada umumnya.</p><p><strong>Isi yang Melimpah:</strong></p><p>Di balik kulitnya yang renyah, jalakotek menyembunyikan isian yang tak kalah menggoda. Perpaduan tahu goreng, wortel, tauge, dan daging cincang disiram dengan bumbu kacang pedas yang gurih dan kaya rasa. Setiap gigitan menghadirkan sensasi gurih, pedas, dan tekstur yang berbeda, membuat Anda ingin terus mencicipinya.</p><p><strong>Camilan Serbaguna:</strong></p><p>Jalakotek tidak hanya cocok dinikmati sebagai camilan, tetapi juga bisa menjadi teman setia saat bersantai bersama keluarga dan teman. Rasanya yang lezat dan mengenyangkan menjadikannya pilihan tepat untuk menemani berbagai aktivitas Anda.</p><p><strong>Cita Rasa Khas Majalengka:</strong></p><p>Mencicipi jalakotek berarti merasakan cita rasa khas Majalengka yang autentik. Setiap gigitan membawa Anda pada petualangan rasa yang tak terlupakan, membangkitkan kenangan kuliner khas Jawa Barat yang kaya dan penuh cita rasa.</p><p><strong>Lebih dari Sekedar Camilan:</strong></p><p>Jalakotek bukan sekadar camilan biasa, tetapi juga representasi budaya kuliner Majalengka yang patut dilestarikan. Mencicipinya berarti menghargai kekayaan kuliner Indonesia yang penuh keragaman dan cita rasa istimewa.</p><p><strong>Ayo, Rasakan Sensasi Jalakotek!</strong></p><p>Jika Anda mencari camilan unik, gurih, pedas, dan penuh cita rasa, jalakotek dari Majalengka adalah pilihan yang tepat. Rasakan sensasi kelezatannya dan temukan petualangan rasa baru yang tak terlupakan!</p><p><strong>Tips:</strong></p><ul><li>Untuk sensasi pedas yang lebih mantap, tambahkan cabai rawit atau sambal sesuai selera.</li><li>Jalakotek dapat dinikmati dengan saus sambal atau saus tomat untuk menambah kelezatan.</li><li>Jika Anda ingin mencoba variasi rasa, tambahkan potongan kol atau daun bawang ke dalam isian jalakotek.</li><li>Jalakotek paling nikmat disantap selagi hangat.</li></ul><p><strong>Jalakotek: Perpaduan Sempurna Gurih, Pedas, dan Renyah yang Menggoda Selera!</strong></p>",
                'owner' => "Teteh Paniis",
                'phone' => "08123456789",
                'email' => "paniis@cs.com",
                'address' => "Blok Paniis, Kec. Maja, Kota Majalengka, Jawa Barat, Indonesia",
                'google_maps' => "https://maps.app.goo.gl/rqa6f9VHX3VheyhR6",
                'category_id' => 1,
                'created_at' => now(),
                'created_by' => 'seeder'
            ],
            [
                'slug' => Str::uuid()->toString(),
                'name' => "Kecap Segitiga Gurih",
                'img_path_banner' => "iresources/ids_3_1716646375.jpg",
                'desc' => "<h2>Kecap Majalengka: Warisan Kuliner Kaya Rasa dari Tanah Para Menjangan</h2><p>Terletak di kaki Gunung Ciremai yang menjulang tinggi, Majalengka tak hanya terkenal dengan pesona alamnya yang memukau, tetapi juga kekayaan kulinernya yang menggoda selera. Salah satu ikon kuliner yang wajib dicoba adalah <strong>Kecap Majalengka</strong>, warisan budaya leluhur yang telah melegenda sejak tahun 1940.</p><p>Kecap ini bukan sembarang kecap. Dibuat dengan sepenuh hati menggunakan <strong>kebuni kedelai lokal pilihan</strong> dan <strong>gula aren asli</strong>, Kecap Majalengka menghadirkan <strong>rasa manis gurih yang khas</strong>, jauh berbeda dari kecap pada umumnya. Proses fermentasi alami yang memakan waktu <strong>berbulan-bulan</strong> menghasilkan <strong>aroma khas</strong> yang menggoda dan <strong>warna cokelat keemasan</strong> yang memikat.</p><p>Lebih dari sekadar bumbu penyedap, Kecap Majalengka adalah <strong>jiwa masakan</strong> yang mampu membangkitkan cita rasa setiap hidangan. Digunakan untuk menumis, membakar, atau sebagai cocolan, kecap ini <strong>meleleh sempurna</strong> di atas makanan, meresap dengan sempurna, dan meninggalkan sensasi rasa yang tak terlupakan.</p><p>Menariknya, Kecap Majalengka <strong>dibuat secara tradisional</strong> tanpa bahan pengawet buatan. Hal ini membuat kecap ini <strong>lebih aman dan sehat</strong> untuk dikonsumsi, serta <strong>tahan lama</strong> hingga <strong>dua tahun</strong>. Tak heran, kecap ini telah menjadi <strong>favorit</strong> para pecinta kuliner, baik di Majalengka maupun di berbagai penjuru Indonesia.</p><p>Bagi para pelancong, <strong>Kecap Majalengka</strong> adalah <strong>oleh-oleh wajib</strong> yang tak boleh dilewatkan. Dibungkus dalam botol kaca yang <strong>klasik dan elegan</strong>, kecap ini tak hanya memanjakan lidah, tetapi juga menjadi <strong>pengingat indah</strong> akan kekayaan budaya Majalengka.</p><p><strong>Mencicipi Kecap Majalengka</strong> bukan hanya tentang menikmati kelezatan rasa, tetapi juga tentang <strong>melestarikan tradisi</strong> dan <strong>menghargai warisan budaya bangsa</strong>. Setiap tetes kecap ini adalah <strong>kisah tentang keuletan, kesabaran, dan kecintaan</strong> masyarakat Majalengka terhadap kulinernya.</p><p><strong>Ayo, rasakan sensasi rasa yang tiada duanya dengan Kecap Majalengka!</strong> Biarkan lidah Anda berpetualang dan temukan kekayaan rasa yang tak terlupakan.</p>",
                'owner' => "PT. Segitiga Majalengka",
                'phone' => "08987654321",
                'email' => "segitiga-mjl@gmail.com",
                'address' => "Kota Majalengka, Jawa Barat, Indonesia",
                'google_maps' => "https://maps.app.goo.gl/1W41jhdXdCymUrDo7",
                'category_id' => 1,
                'created_at' => now(),
                'created_by' => 'seeder'
            ],
            [
                'slug' => Str::uuid()->toString(),
                'name' => "Mesjid Agung Al-Jabar",
                'img_path_banner' => "iresources/ids_204_1716741384.jpg",
                'desc' => "<h2>Menjelajahi Kemegahan Masjid Agung Al Jabbar: Destinasi Wisata Religi yang Memukau di Jawa Barat</h2><p><strong>Terletak di jantung Kota Bandung,</strong> Masjid Agung Al Jabbar berdiri megah sebagai ikon religiusitas dan arsitektur modern yang memukau. Diresmikan pada tahun 2022, masjid ini menjadi destinasi wisata religi yang wajib dikunjungi bagi para pelancong yang mencari pengalaman spiritual dan estetika yang tak terlupakan.</p><p><strong>Kemegahan Arsitektur yang Menakjubkan:</strong></p><p>Masjid Agung Al Jabbar dirancang oleh Gubernur Jawa Barat saat itu, Ridwan Kamil, dengan mengusung konsep geometri dan filosofi Islam yang mendalam. Bangunan masjid ini berbentuk kubus raksasa dengan empat gerbang yang melambangkan empat pilar agama Islam. Kubah masjid berwarna emas berkilauan menjadi simbol kejayaan dan keagungan agama Islam.</p><p><strong>Pesona Alam Sekitar yang Menawan:</strong></p><p>Masjid Agung Al Jabbar dikelilingi oleh taman dan danau buatan yang luas, menghadirkan suasana asri dan sejuk. Pengunjung dapat menikmati pemandangan alam yang indah sambil merenungkan kebesaran Allah SWT. Taman dan danau ini juga menjadi tempat favorit untuk bersantai dan berfoto.</p><p><strong>Kegiatan Religi dan Edukasi yang Beragam:</strong></p><p>Selain sebagai tempat ibadah, Masjid Agung Al Jabbar juga menawarkan berbagai kegiatan religius dan edukasi. Pengunjung dapat mengikuti pengajian, shalat berjamaah, dan berbagai kegiatan keagamaan lainnya. Museum Al Jabbar yang terletak di dalam kompleks masjid memamerkan koleksi artefak dan sejarah Islam yang menarik untuk dipelajari.</p><p><strong>Destinasi Wisata Keluarga yang Ideal:</strong></p><p>Masjid Agung Al Jabbar menjadi destinasi wisata religi yang ideal bagi keluarga. Anak-anak dapat bermain dan belajar di taman, sedangkan orang tua dapat beribadah dan mengikuti kegiatan keagamaan. Fasilitas yang lengkap seperti toilet, tempat makan, dan area parkir yang luas membuat kunjungan ke masjid ini semakin nyaman dan menyenangkan.</p><p><strong>Tips Berkunjung:</strong></p><ul><li>Waktu terbaik untuk mengunjungi Masjid Agung Al Jabbar adalah di pagi atau sore hari untuk menghindari cuaca panas.</li><li>Gunakan pakaian yang sopan dan rapi saat memasuki area masjid.</li><li>Bawalah alas kaki yang nyaman karena Anda akan banyak berjalan kaki.</li><li>Jagalah kebersihan dan kesopanan selama berada di area masjid.</li><li>Patuhi peraturan yang berlaku di area masjid.</li></ul><p><strong>Masjid Agung Al Jabbar bukan sekadar tempat ibadah, tetapi juga sebuah karya seni arsitektur yang luar biasa dan destinasi wisata religi yang penuh makna. Kunjungi Masjid Agung Al Jabbar dan rasakan pengalaman spiritual dan estetika yang tak terlupakan.</strong></p>",
                'owner' => "PEMDA JABAR",
                'phone' => "08192837465",
                'email' => "aljabar-cs@jabar.go.id",
                'address' => "Kota Bandung, Jawa Barat, Indonesia",
                'google_maps' => "https://maps.app.goo.gl/f8x5pVfX4LjsXggu6",
                'category_id' => 2,
                'created_at' => now(),
                'created_by' => 'seeder'
            ],
            [
                'slug' => Str::uuid()->toString(),
                'name' => "Pantai Pangandaran",
                'img_path_banner' => "iresources/ids_205_1716741842.jpg",
                'desc' => "<h2>Menjelajahi Keindahan Pantai Pangandaran: Surga Tersembunyi di Selatan Jawa Barat</h2><p><strong>Terletak di selatan Jawa Barat,</strong> Pantai Pangandaran bagaikan surga tersembunyi yang menawarkan pesona alam yang memukau dan berbagai aktivitas wisata yang menyenangkan. Pasir putihnya yang halus, air lautnya yang jernih, dan ombaknya yang tenang menjadikan pantai ini sebagai salah satu destinasi wisata favorit di Indonesia.</p><p><strong>Daya Tarik Utama:</strong></p><ul><li><strong>Pantai Barat dan Pantai Timur:</strong> Dua pantai utama di Pangandaran dengan karakteristik berbeda. Pantai Barat menawarkan ombak yang tenang dan cocok untuk berenang, bermain air, dan bersantai. Pantai Timur memiliki ombak yang lebih besar dan cocok untuk berselancar.</li><li><strong>Cagar Alam Pangandaran:</strong> Kawasan hutan lindung dengan berbagai flora dan fauna yang dilindungi. Pengunjung dapat melakukan trekking, mengamati burung, dan menikmati pemandangan alam yang indah.</li><li><strong>Gua Pangandaran:</strong> Gua alami dengan stalaktit dan stalakmit yang terbentuk selama berabad-abad. Pengunjung dapat menjelajahi gua dan merasakan suasana yang mistis.</li><li><strong>Pasar Tradisional:</strong> Beragam kuliner khas Sunda dan souvenir menarik dapat ditemukan di pasar tradisional Pangandaran.</li><li><strong>Taman Laut:</strong> Keindahan bawah laut Pangandaran yang luar biasa dapat dinikmati dengan snorkeling atau diving. Pengunjung dapat melihat berbagai jenis ikan, terumbu karang, dan biota laut lainnya.</li></ul><p><strong>Aktivitas Wisata Menarik:</strong></p><ul><li><strong>Berenang dan Bermain Air:</strong> Bersantai di tepi pantai, berenang di air laut yang jernih, dan bermain air bersama keluarga.</li><li><strong>Berselancar:</strong> Bagi pecinta adrenalin, Pantai Timur Pangandaran menawarkan ombak yang cocok untuk berselancar.</li><li><strong>Trekking dan Bersepeda:</strong> Jelajahi Cagar Alam Pangandaran dengan trekking atau bersepeda, nikmati udara segar dan pemandangan alam yang indah.</li><li><strong>Menjelajahi Gua:</strong> Rasakan sensasi menjelajahi Gua Pangandaran dan temukan stalaktit dan stalakmit yang menakjubkan.</li><li><strong>Belanja Souvenir:</strong> Temukan berbagai souvenir khas Pangandaran di pasar tradisional, seperti batik, kerajinan tangan, dan makanan khas Sunda.</li><li><strong>Menikmati Kuliner:</strong> Cicipi berbagai kuliner khas Sunda yang lezat di restoran dan warung makan di sekitar pantai.</li><li><strong>Menyaksikan Matahari Terbenam:</strong> Pemandangan matahari terbenam di Pantai Pangandaran sangatlah indah dan romantis.</li></ul><p><strong>Tips Berkunjung:</strong></p><ul><li>Waktu terbaik untuk mengunjungi Pangandaran adalah pada musim kemarau, yaitu antara bulan April dan Oktober.</li><li>Gunakan pakaian yang nyaman dan alas kaki yang sesuai untuk pantai.</li><li>Bawalah tabir surya, topi, dan kacamata hitam untuk melindungi diri dari sinar matahari.</li><li>Siapkan uang tunai untuk berbelanja di pasar tradisional dan warung makan.</li><li>Jagalah kebersihan pantai dan buanglah sampah pada tempatnya.</li><li>Patuhi peraturan yang berlaku di area pantai dan cagar alam.</li></ul><p><strong>Pantai Pangandaran siap menyambut Anda dengan pesona alamnya yang memukau dan berbagai aktivitas wisata yang menyenangkan. Jadikan liburan Anda tak terlupakan dengan mengunjungi Pantai Pangandaran, surga tersembunyi di selatan Jawa Barat.</strong></p>",
                'owner' => "PEMDA PANGANDARAN",
                'phone' => "08129384756",
                'email' => "pangandaranjabar.go.id",
                'address' => "Kota Pangandaran, Jawa Barat, Indonesia",
                'google_maps' => "https://maps.app.goo.gl/LKzpr3M9632PECrE9",
                'category_id' => 2,
                'created_at' => now(),
                'created_by' => 'seeder'
            ],
        ];

        foreach ($items as $key => $value) {
            Item::create($value);
        }
    }
}
