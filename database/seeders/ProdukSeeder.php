<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 1; $i <= 10; $i++) {
        //     Produk::create([
        //         'nama_produk' => 'Produk ' . $i,
        //         'deskripsi' => 'Deskripsi produk ' . $i,
        //         'harga' => 10000 + $i * 1000,
        //         'stok' => 10 + $i,
        //         'gambar_produk' => 'GantunganBrio.png',
        //         'kategori_id' => 1, // Sesuaikan dengan ID kategori yang ada
        //         'variasi_id' => 1, // Sesuaikan dengan ID variasi yang ada
        //     ]);
        // }
        Produk::create([
            'nama_produk' => 'GANTUNGAN KUNCI MOBIL GESPER ANYAM KEYCHAIN LOGO MEREK MOBIL',
            'deskripsi' => '100% merek baru dan kualitas tinggi. Mudah untuk memegang kunci Mobil Anda dan barang-barang kecil. Bahan: Logam + Kulit. Ukuran: 8 cm panjang. Paket Termasuk: 1 x Gantungan Kunci',
            'harga' => 55000,
            'stok' => 100,
            'gambar_produk' => 'GesperAnyam.png',
            'kategori_id' => 1,
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'GANTUNGAN KUNCI MOTOR LOGO HONDA YAMAHA KAWASAKI SUZUKI',
            'deskripsi' => 'Gantungan kunci Motor logo HONDA dan YAMAHA tampil lebih exclusive untuk di gantung di pinggang anti HILANG. ukiran logo dengan Laser di jamin sangat rapih dan detail
                                    Untuk tampilan Anda lebih keren. Bahan Metal silver Bahan anti gores ',
            'harga' => 29900,
            'stok' => 100,
            'gambar_produk' => 'GantunganMotor.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'Gantungan kunci sarung remote cover silikon mobil honda mobilio brio hrv lama model anyam',
            'deskripsi' => 'Gantungan sarung remote  model anyam, kini tampil lebih exclusive untuk di gantung di pinggang dan anti hilang. Di desain dengan ukiran logo, menggunakan Laser cutting, membuat tampilannya menjadi lebih keren dan rapih. Bahan : kulit kualitas premium, metal, silikon terbuat dari bahan karet.',
            'harga' => 69000,
            'stok' => 100,
            'gambar_produk' => 'GantunganHrv.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'Gantungan kunci sarung keyless cover casing MOBIL DAIHATSU SIGRA XENIA AYLA TERIOS model anyam',
            'deskripsi' => 'Gantungan sarung remot berlogo ukiran DAIHATSU model anyam, kini tampil lebih exclusive untuk di gantung di pinggang dan anti hilang. Di desain dengan ukiran logo, menggunakan Laser cutting, membuat tampilannya menjadi lebih keren dan rapih. Bahan : kulit kualitas premium, metal, silikon terbuat dari bahan karet',
            'harga' => 69000,
            'stok' => 100,
            'gambar_produk' => 'GesperAnyam.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'GANTUNGAN KUNCI MOBIL LOGO HONDA BRIO',
            'deskripsi' => 'Gantungan Kunci Logo HONDA BRIO tampil lebih exclusive untuk di gantung di pinggang
                            Anti HILANG. ukiran logo dengan Laser di jamin sangat rapih dan detail. Bahan: Metal silver dan kulit berkualitas, Ada lampu LED, Bisa di jadikan pembuka tutup botol, Bahan anti gores.',
            'harga' => 89000,
            'stok' => 100,
            'gambar_produk' => 'GantunganBrio.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'gantungan kunci case cover sarung remote keyless motor honda all new scoopy 2023 up',
            'deskripsi' => 'Gantungan kunci sarung remote keyless untuk Motor Honda ALL NEW SCOOPY new 2023, Dengan 2 tombol remot kontrol. Bahan : Stainlees steel import, Warna hitam, plastik model karbon. 1SET dapat Sarung kulit, silikon, plastik dan Gantungan. PASTIKAN BENTUK REMOTE/KEYLESS MOTOR ANDA SAMA DENGAN GAMBAR DESKRIPSI. ',
            'harga' => 55000,
            'stok' => 100,
            'gambar_produk' => 'gantungan kunci case cover sarung remote keyless motor honda all new scoopy 2023 up.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'Gantungan kunci remote mobil Honda HRV eksklusif',
            'deskripsi' => 'Gantungan sarung remot berlogo ukir Honda HRV , tampil lebih exclusive untuk di gantung di pinggang Anti HILANG. ukiran logo dengan Laser cutting di jamin sangat rapih dan detail
                                    Untuk tampilan Anda lebih keren. Bahan : Metal silver, kulit berkualitas dengan lampu LED, Bisa di jadikan pembuka tutup botol dan Bahan anti gores.',
            'harga' => 79000,
            'stok' => 100,
            'gambar_produk' => 'GantunganHrv.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'gantungan kunci sarung cover casing remote keyless mobil honda freed model anyam',
            'deskripsi' => 'Gantungan kunci sarung remote keyless untuk Mobil honda freed. Bahan : Kulit berkualitas tinggi, Metal, Kulit. 1SET dapat Sarung silikon dan Gantungan. Melindungi Keyless remote anda dari terjatuh, goresan,debu,korosi dll. Silikon untuk remot kontrol dengan 4 tombol dan 3 tombol. PASTIKAN BENTUK REMOTE/KEYLESS MOBIL ANDA SAMA DENGAN GAMBAR DESKRIPSI.',
            'harga' => 69000,
            'stok' => 100,
            'gambar_produk' => 'GantunganFreed.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'Gantungan kunci sarung case casing cover remote keyless motor honda vario 160 logo premium AHM',
            'deskripsi' => 'Gantungan kunci sarung remote keyless untuk Motor Honda VARIO 160, Dengan 2 tombol remot kontrol. Bahan : Stainlees steel import, Warna hitam plastik model karbon. Pilihan warna case : HITAM SILVER & HITAM GOLD. Melindungi Keyless remote anda dari terjatuh, goresan,debu,korosi dll. PASTIKAN BENTUK REMOTE/KEYLESS MOTOR ANDA SAMA DENGAN GAMBAR DESKRIPSI.',
            'harga' => 55000,
            'stok' => 100,
            'gambar_produk' => 'GantunganVario.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);

        Produk::create([
            'nama_produk' => 'Gantungan kunci keyless cover casing MOBIL TOYOTA GRAND AVANZA AGYA CALYA model anyam',
            'deskripsi' => 'Gantungan sarung remot berlogo ukiran TOYOTA model anyam, kini tampil lebih exclusive untuk di gantung di pinggang dan anti hilang. Di desain dengan ukiran logo, menggunakan Laser cutting, membuat tampilannya menjadi lebih keren dan rapih. FIT FOR KEY: GRAND AVANZA, AGYA, CALYA. Bahan : kulit kualitas premium, metal, silikon terbuat dari bahan karet.',
            'harga' => 69000,
            'stok' => 100,
            'gambar_produk' => 'GantunganAvanza.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);
        Produk::create([
            'nama_produk' => 'GANTUNGAN KUNCI COVER SARUNG KULIT REMOTE KEYLESS MOBIL TERIOS TOYOTA RUSH ALL NEW VELOZ 2019 2 TOMBOL AGYA',
            'deskripsi' => 'Gantungan kunci sarung remote keyless untuk Mobil TOYOTA RUSH dan ALL NEW AVANZA GR SPORT, Dengan 2 tombol remot kontrol. Bahan : Kulit berkualitas tinggi, Stainlees steel import, Jahitan benang hitam dan merah rapih. Melindungi Keyless remote anda dari terjatuh, goresan,debu,korosi dll. PASTIKAN BENTUK REMOTE/KEYLESS MOBIL ANDA SAMA DENGAN GAMBAR DESKRIPSI.',
            'harga' => 85000,
            'stok' => 100,
            'gambar_produk' => 'GantunganRush.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);
        Produk::create([
            'nama_produk' => 'Sarung silikon remote motor Honda PCX 150 ADV 150 FORZA',
            'deskripsi' => 'Sarung silikon remote motor Honda PCX 150 ADV 150 FORZA. Melindungi Keyless remote anda dari terjatuh, goresan,debu,korosi dll.',
            'harga' => 20000,
            'stok' => 100,
            'gambar_produk' => 'SarungPcx.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);
        Produk::create([
            'nama_produk' => 'GANTUNGAN KUNCI SARUNG COVER REMOTE MOBIL TOYOTA TERIOS VALCO AVANZA VELOZ 2012 2015 MODEL ANYAM',
            'deskripsi' => 'Gantungan sarung remot berlogo ukiran toyota model anyam, kini tampil lebih exclusive untuk di gantung di pinggang dan anti hilang. FOR KEY: AVANZA VELOZ 2012 2015 DAN ETIOS VALCO. Di desain dengan ukiran logo, menggunakan Laser cutting, membuat tampilannya menjadi lebih keren dan rapih. Bahan : kulit kualitas premium, metal, silikon terbuat dari bahan karet.',
            'harga' => 69000,
            'stok' => 100,
            'gambar_produk' => 'GantunganVeloz.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);
        Produk::create([
            'nama_produk' => 'SILIKON COVER KUNCI REMOTE KEYLESS YAMAHA XMAX AEROX LEXI ALL NEW NMAX FAZZIO',
            'deskripsi' => 'silikon untuk Keyless motor Yamaha AEROX XMAX LEXI ALL NEW NMAX FAZZIO. melindungi keyless Anda dari debu cipratan air dan gesekan yang membuat baret baret. Dengan harga yang sesuai dan kualitas barang sangat bagus.',
            'harga' => 20000,
            'stok' => 100,
            'gambar_produk' => 'SilikonNmax.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);
        Produk::create([
            'nama_produk' => 'Gantungan kunci casing cover remote keyless motor honda all pcx 160 up',
            'deskripsi' => 'Gantungan kunci sarung remote keyless untuk Motor Honda PCX 160. Bahan : Kulit berkualitas, Stainlees steel import, Warna hitam plastik model karbon. 1SET dapat Cover/casing plastik dan Gantungan. Melindungi Keyless remote anda dari terjatuh, goresan,debu,korosi dll. PASTIKAN BENTUK REMOTE/KEYLESS MOTOR ANDA SAMA DENGAN GAMBAR DESKRIPSI',
            'harga' => 55000,
            'stok' => 100,
            'gambar_produk' => 'GantunganCover.png',
            'kategori_id' => 1, 
            'variasi_id' => 1, 
        ]);


        Produk::create([
            'nama_produk' => 'Cairan obat pembersih kerak kaca body mobil motor penghilang serbaguna',
            'deskripsi' => 'Pembersih jamur dan kerak kaca dan body mobil.
            Untuk pembelian obat jamur di sarankan untuk pembelian pecking bubble wrap untuk menghindari dari kerusakan saat pengiriman. Obat siap pakai untuk perawatan mobil anda.
            Dapat digunakan untuk: Menghilangkan jamur kaca, Menghilangkan jamur body, Membersihkan Kerak pada mobil, Membersihkan Velg mobil.
            BARANG RENTAN PECAH !!! (KERUSAKAN DALAM PENGIRIMAN BUKAN TANGGUNG JAWAB PENJUAL. BELI = SETUJU NO RETUREN)',
            'harga' => 20000,
            'stok' => 100,
            'gambar_produk' => 'Cairan obat pembersih kerak kaca body mobil motor penghilang serbaguna.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);
        Produk::create([
            'nama_produk' => 'cat oles spidol penghilang baret lecet mobil motor car scratch repair pen',
            'deskripsi' => 'Kini Anda tidak perlu lagi repot-repot pergi ke bengkel mobil dan mengeluarkan biaya mahal. Cukup pilih cat oles yang sama dengan warna mobil Anda, oleskan dalam hitungan menit mobil Anda kembali bagus seperti semula. Fitur : Memperbaiki Goresan, Cat Oles ini dapat memperbaiki cat mobil Anda yang rusak, baret, tergores atau tergaruk sesuatu. Cat oles ini mudah digunakan, cukup oleskan pada bagian yang baret, gunakan warna yang sesuai dengan warna cat mobil untuk menyamakan warna dan membuat lecet itu menjadi mulus. Aman Digunakan dan Anti Basah
            Cat oles ini bersifat permanen dan tidak beracun, tahan terhadap air hujan ketika kering seperti cat pada umumnya.',
            'harga' => 17500,
            'stok' => 100,
            'gambar_produk' => 'cat oles spidol penghilang baret lecet mobil motor car scratch repair pen.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);
        Produk::create([
            'nama_produk' => 'kompon atau compond kumpon penghilang baret cat body mobil motor',
            'deskripsi' => 'pembersih Fitur khusus: perawatan cat Lebar barang: 10cm Nama Model: MC-308. Diameter barang: 1.5cm, Tinggi barang: 3cm, Panjang barang: 12 cm, Jenis bahan: lilin Slop, Volume Item: 15g . Jenis Item : Set bahan poles & penggilingan Sertifikasi. Penggunaan: cat perawatan cat pembersih perawatan untuk mobil anda yang terkena baret agar body mobil kembali mulus. note : UNTUK BARET HALUS TIDAK BISA UNTUK WARNA DOFF. Untuk mobil: segel mengkilap untuk cat mobil lapisan pelindung lilin keras',
            'harga' => 19900,
            'stok' => 100,
            'gambar_produk' => 'kompon atau compond kumpon penghilang baret cat body mobil motor.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);
        Produk::create([
            'nama_produk' => 'GEL PEMBERSIH KOTORAN DEBU KEYBOARD SELA AC DASBOARD MOBIL LACI',
            'deskripsi' => 'Bahan : boric acid + benzoic acid, Ukuran produk : 12*18*1cm, Kategori : lem pembersih. Cara menggunakan produk : Tempelkan gel ini secara merata pada bagian bagian sulit yang kotor, kemudian kotoran kotoran pada permukaan akan hilang. Interior anda akan bersih kembali. Bisa digunakan juga pada peralatan rumah dan kantor.',
            'harga' => 7900,
            'stok' => 100,
            'gambar_produk' => 'GEL PEMBERSIH KOTORAN DEBU KEYBOARD SELA AC DASBOARD MOBIL LACI.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);
        Produk::create([
            'nama_produk' => 'DEGREASER PEMBERSIH MESIN MOBIL DAN MOTOR KUALITAS PREMIUM',
            'deskripsi' => 'Degreaser adalah cairan pembersih yang mengandung bahan kimia tertentu  sehingga dapat dengan mudah mengangkat kotoran yang menempel pada mesin, body unit hingga peralatan lainnya. Cara pemakaian : Tuang ke wadah plastik, Basahi bagian yang akan dibersihkan, oleskan Degreaser, Gosok dan sikat (kuas/sikat gigi bekas) hingga kotoran dan oli melunak, bilas dengan air mengalir. Bisa juga untuk cuci tangan montir yang berlumuran oli karena aman untuk kulit.dengan air bersih sambil disikat bila perlu.',
            'harga' => 29900,
            'stok' => 100,
            'gambar_produk' => 'DEGREASER PEMBERSIH MESIN MOBIL DAN MOTOR KUALITAS PREMIUM.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);
        Produk::create([
            'nama_produk' => 'SHAMPO SNOW WASH MOBIL DAN MOTOR PREMIUM',
            'deskripsi' => 'Kandungan dari shampo snow wash yang aman untuk semua jenis cat baik solid maupun metallic serta melindungi cat dari sinar matahari karna tidak mengandung bahan deterjen. Perpaduan shampoo dan wax murni ini sangat aman dan ramah lingkungan, wax ini berguna untuk mengkilapkan, melindungi cat mobil dari sinar uv dan kontaminasi. Ph shampo balanced sehingga aman dan tidak merusak cat dan tidak menimbulan spot. Bisa digunakan untuk :
            Semua jenis cat. Cara Pemakaian : Tuangkan 1 tutup botol shampo dengan 1 liter - 2 liter air bersih lalu aduk hingga merata dan shampo salju siap untuk digunakan ',
            'harga' => 16900,
            'stok' => 100,
            'gambar_produk' => 'SHAMPO SNOW WASH MOBIL DAN MOTOR PREMIUM.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);
        Produk::create([
            'nama_produk' => 'SEALANT GUARD CAIRAN PENGKILAP BODY MOBIL DAN MOTOR',
            'deskripsi' => 'FUNGSI: Sebagai semi coating yang bisa melindungi cat body dan kaca kendaraan dari debu berlebih, Bekerja seperti daun talas yang melindungi cat body dan kaca kendaraan dari air hujan dan banyak lagi. Bahan terbuat dari komposisi hydropobic yang AMAN untuk seluruh cat body dan kaca semua kendaraan. CARA PAKAI SEALANT GUARD: Pastikan cuci terlebih dahulu dan tunggu hingga kering dulu, Kocok dan semprotkan sealant guard pada cat body atau kaca dn diamkn (4-5 detik), Usapkan menggunakn lap bersih/microfiber dengan merata.',
            'harga' => 45000,
            'stok' => 100,
            'gambar_produk' => 'SEALANT GUARD CAIRAN PENGKILAP BODY MOBIL DAN MOTOR.png',
            'kategori_id' => 2, 
            'variasi_id' => 2, 
        ]);

        Produk::create([
            'nama_produk' => 'STIKER PELINDUNG ANTI GORES SPIDOMETER MOTOR HONDA PCX 150 PCX 160',
            'deskripsi' => 'Dengan memakai stiker pelindung ini: Terbebas dari sorotan sinar matahari langsung. Tidak mudah tergores. Daya rekat kuat dan tidak meninggalkan bekas lem ketika dilepas jadi aman suatu saat anda ingin mengganti lagi dengan yang baru.Sudah terpotong persisi mengikuti bentuk pola spidometer, jadi tidak perlu lagi dipotong manual menghindari resiko goresan cutter.',
            'harga' => 10000,
            'stok' => 100,
            'gambar_produk' => 'STIKER PELINDUNG ANTI GORES SPIDOMETER MOTOR HONDA PCX 150 PCX 160.png',
            'kategori_id' => 4, 
            'variasi_id' => 4, 
        ]);

        Produk::create([
            'nama_produk' => 'Tankpad stiker anti gores pelindung tutup bensin motor honda all new pcx 160',
            'deskripsi' => 'TANK PAD PELINDUNG GORESAN DI MOTOR ALL NEW PCX 160 ANDA. Setelah dipasang stiker tank pad ini bagian motor yang sudah di pasang jangan di cuci selama 3 hari.
            untuk menghindari air masuk ke perekat stiker yang belum kering.',
            'harga' => 45000,
            'stok' => 100,
            'gambar_produk' => 'Tankpad stiker anti gores pelindung tutup bensin motor honda all new pcx 160.png',
            'kategori_id' => 4, 
            'variasi_id' => 4, 
        ]);

        Produk::create([
            'nama_produk' => 'stiker anti gores pelindung spidometer motor honda Vario 150 Vario 160',
            'deskripsi' => 'Stiker pelindung spidometer motor honda VARIO 150 agar terhindar dari goresan yang membuat cacat kaca/mika nya. Dengan memakai stiker pelindung ini terbebas dari sorotan sinar matahari langsung.',
            'harga' => 5000,
            'stok' => 100,
            'gambar_produk' => 'stiker anti gores pelindung spidometer motor honda Vario 150 Vario 160.png',
            'kategori_id' => 4, 
            'variasi_id' => 4, 
        ]);

        Produk::create([
            'nama_produk' => 'stiker sticker pelindung anti gores spidometer motor honda vario 160',
            'deskripsi' => 'Stiker pelindung spidometer motor honda vario 160 agar terhindar dari goresan yang membuat cacat kaca/mika nya. Dengan memakai stiker pelindung ini, terbebas dari sorotan sinar matahari langsung. Tidak mudah tergores material bahan berkwalitas oracal 651 made in germany',
            'harga' => 5000,
            'stok' => 100,
            'gambar_produk' => 'stiker sticker pelindung anti gores spidometer motor honda vario 160.png',
            'kategori_id' => 4, 
            'variasi_id' => 4, 
        ]);

        Produk::create([
            'nama_produk' => 'OBENG MINI SET 31 IN 1 TOOLS',
            'deskripsi' => 'Set obeng kecil lengkap yang terdiri dari 30 kepala obeng + 1 pegangan. Ujung obeng bersifat magnetik. Setiap rumah wajib memiliki setidaknya 1 set obeng ini.',
            'harga' => 18000,
            'stok' => 100,
            'gambar_produk' => 'OBENG MINI SET 31 IN 1 TOOLS.png',
            'kategori_id' => 4, 
            'variasi_id' => 4, 
        ]);

        Produk::create([
            'nama_produk' => 'LAP KAIN DETAILING MICROFIBER 500gsm WAX MOBIL MOTOR',
            'deskripsi' => 'Lap Kain Detailing 500 gsm microfiber, Material : 500 gsm high quality microfiber. Fungsi : dengan bahan yang tebal dan halus , cocok sekali untuk detailing , dan mengelap permukaan yang rawan lecet , daya hisap yang sangat tinggi.',
            'harga' => 15000,
            'stok' => 100,
            'gambar_produk' => 'LAP KAIN DETAILING MICROFIBER 500gsm WAX MOBIL MOTOR.png',
            'kategori_id' => 3, 
            'variasi_id' => 3, 
        ]);

        Produk::create([
            'nama_produk' => 'KANEBO LAP REFIL TEBAL BERKUALITAS UKURAN 42X32 Tebal 2mm',
            'deskripsi' => 'BAHAN DIJAMIN MENYERAP AIR SUPER HIGH QUALITY WARNA : RANDOM TIDAK BISA PILIH WARNA, UKURAN : 32 X 40, TEBAL : 2 MM',
            'harga' => 9900,
            'stok' => 100,
            'gambar_produk' => 'KANEBO LAP REFIL TEBAL BERKUALITAS UKURAN 42X32 Tebal 2mm.png',
            'kategori_id' => 3, 
            'variasi_id' => 3, 
        ]);

        Produk::create([
            'nama_produk' => 'busa sponge cuci mobil motor bentuk 8 tebal',
            'deskripsi' => 'Portable 8 Bentuk Mobil Cuci Kaca Cleaner Wax Spons Busa Auto Cleaning Alat Pembersih Jendela Otomatis Aksesoris Mobil Portable betuk 8. cara untuk Penggunaan Profesional,  Portable dan Tahan Lama, Mudah Dibawa, Ringan.  Efektif Menghilangkan Kotoran Burung, Lak, Permen Karet, Sedikit Goresan Pada Mobil dan Jendela.',
            'harga' => 7000,
            'stok' => 100,
            'gambar_produk' => 'busa sponge cuci mobil motor bentuk 8 tebal.png',
            'kategori_id' => 3, 
            'variasi_id' => 3, 
        ]);

        Produk::create([
            'nama_produk' => 'Bantalan / Peredam Getaran Pintu Mobil Logo Honda',
            'deskripsi' => 'Bantalan Sillicone terbaru dari Price Priority,
            product ini memang kecil, namun memberikan hasil yang signifikan, yaitu membantu meredam getaran / bunti saat anda menutup pintu mobil, selain itu estetika membuat kendaraan berasa mewah.',
            'harga' => 12900,
            'stok' => 100,
            'gambar_produk' => 'Bantalan Peredam Getaran Pintu Mobil Logo Honda.png',
            'kategori_id' => 3, 
            'variasi_id' => 3, 
        ]);

        Produk::create([
            'nama_produk' => 'GANTUNGAN BARANG MOBIL CAR SEAT HANGER HOOK HOLDER BAG ORGANIZER 2 in 1',
            'deskripsi' => 'Sering Belanja di mini market / supermarket? hanger ini sangat berguna untuk merapikan plastik blanjaan supaya tidak berantakan',
            'harga' => 8500,
            'stok' => 100,
            'gambar_produk' => 'GANTUNGAN BARANG MOBIL CAR SEAT HANGER HOOK HOLDER BAG ORGANIZER 2 in 1.png',
            'kategori_id' => 3, 
            'variasi_id' => 3, 
        ]);
    }
}
