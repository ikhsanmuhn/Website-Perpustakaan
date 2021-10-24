-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2020 pada 11.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bag`
--

CREATE TABLE `bag` (
  `id` int(11) NOT NULL,
  `idBuku` varchar(150) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `qty` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `idBuku` varchar(6) NOT NULL,
  `idKategori` varchar(5) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `idPenerbit` varchar(5) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`idBuku`, `idKategori`, `judul`, `idPenerbit`, `penulis`, `qty`, `image`, `sinopsis`) VALUES
('B001', 'K001', 'Mengolah Database dengan SQL Server', 'PB001', 'Yuswanto & Sobari', 3, 'database1.jpg', 'Buku SQL Server 2000 ini sangat kuat dalam pembahasan metode nya. Diulas secara sistematik dengan gaya bahasa yang mudah ddicerna.'),
('B002', 'K001', 'Otodidak MySQL', 'PB001', 'Jubilee Enterprise', 11, 'database2.jpg', 'MySQL merupakan sistem manajemen database paling populer di dunia dan dapat membantu programmer mengembangkan berbagai jenis aplikasi, baik desktop maupun online. Buku ini mengajak para pembaca menelusuri MySQL baik server maupun client untuk pengembangan database.\r\n\r\nPembahasan di dalam buku ini meliputi:\r\n\r\n• Langkah menginstal, menjalankan, dan mematikan MySQL Server.\r\n\r\n• Bekerja dengan menggunakan MySQL Server dan Client\r\n\r\n• Membuat user, database, dan tabel.\r\n\r\n• Mempelajari perintah-perintah untuk menampilkan serta mencari data.\r\n\r\n• Mengenal perintah untuk menambah dan memperbarui data di dalam tabel.\r\n\r\n• Bekerja dengan XAMPP dan phpmyadmin untuk manajemen MySQL dengan interface yang user friendly.\r\n\r\n• Menambah dan menampilkan data dari MySQL menggunakan PHP.\r\n\r\n• Dan lain sebagainya.\r\n\r\nDengan mempelajari buku ini, diharapkan pembaca bisa mengembangkan MySQL untuk pembuatan aplikasi-aplikasi lain yang lebih berbobot.\r\nOtodidak MySQL untuk Pemula quantity'),
('B003', 'K002', 'Bikin Website Itu Mudah', 'PB002', 'Jonathan Sarwono', 11, 'pemograman1.jpg', 'Buku ini adalah bacaan wajib bagi Anda yang baru belajar membuat website, baik itu yang masih duduk di bangku sekolah, mahasiswa, atau profesional yang baru mendalami pemograman website. Di dalamnya, Anda akan mempelajari hal-hal paling dasar dalam membangun website dengan metode yang disesuaikan untuk Anda yang ingin tahu caranya membuat website yang benar-benar dari nol.\r\n\r\nDalam praktiknya, Anda perlu merancang, membangun, dan mempromosikan website yang Anda buat.  Ketiga hal tersebut dibahas pada buku dan merupakan hal yang sangat penting, baik itu dalam membuat website pribadi maupun bisnis.\r\n\r\nApakah sulit? Rasanya tidak. Ikuti langkah demi langkah pada buku ini dan buktikan sendiri bahwa Bikin Website Itu Mudah!\r\nBikin Website Itu Mudah quantity'),
('B004', 'K003', 'Network Tweaking dan Hacking', 'PB001', 'Efvy Zam', 3, 'networking1.jpg', 'Network: Tweaking & Hacking ini akan menguraikan bagaimana kita dapat menjelajahi jaringan komputer yang ada di sekitar kita, baik itu jaringan kabel maupun jaringan wireless. Buku ini lebih mengarah kepada eksploitasi jaringan yang ada sehingga kita bisa melakukan aksi tweaking, bahkan juga berbagai aksi hacking. Buku ini, dapat digunakan oleh beberapa versi Windows sekaligus, yaitu Windows 7, Windows 8, dan Windows 10.\r\n\r\nBeberapa materi yang diuraikan dalam buku ini adalah menjelajah jaringan, mendapatkan password wifi, memutuskan koneksi internet komputer lain, menembus blokir dengan duplikasi MAC address, membuka jaringan wireless yang tersembunyi, mendeteksi spoofing, mengontrol bandwidth dan tunnel adapter, memantau jaringan, mencari sinyal kuat, jaringan wireless, default jaringan yang berbahaya, network forensics, menyadap password dalam jaringan, man in the middle attack, manipulasi jaringan via registry, mempercepat browsing pada jaringan, konfigurasi DNS cache, inbound & outbound rules, menutup port, dan mengetahui masalah TCP/IP.\r\n\r\nApa yang diuraikan dalam buku ini terutama untuk materi hacking, penulis berharap pembaca dapat bijaksana dalam mempelajari atau menerapkannya.\r\nNetwork: Tweaking dan Hacking quantity'),
('B005', 'K004', 'Mahir Desain Grafis dengan Corel', 'PB001', 'Jubilee Enterprise', 4, 'desgraf1.jpg', 'Mahir Desain Grafis dengan CorelDraw membantu Anda mengenal fitur kunci yang ada di dalam software ini, untuk membuat desain grafis yang menarik. Buku ini menitikberatkan pada pembahasan penggunaan tool serta bagaimana memodifikasi objek standar seperti persegi empat, lingkaran, dan garis menjadi sebuah desain yang utuh.\r\n\r\nPembahasan di dalam buku ini dibuat mendetail dan tutorial pembuatan desain dibuat secara berselang-seling. Dengan demikian, buku ini memadukan referensi dan tutorial sekaligus. Dalam waktu singkat, Anda akan mengenal fungsi tool kunci untuk membuat desain dan sekaligus mempraktikkan bagaimana caranya menggambar menggunakan keterampilan gerak mouse.\r\n\r\nSetiap orang yang memiliki CorelDraw minimal versi X6 dapat mengikuti buku ini dengan baik. Tunggu apa lagi! Baca dan jadilah desainer grafis yang mahir mengoperasikan CorelDraw.'),
('B006', 'K005', '3D Modeling kreatif dengan Autocad', 'PB001', 'Suparno Sastra M.', 2, 'mulmed1.jpg', '“3D Modeling Kreatif dengan AutoCAD” merupakan buku panduan pemodelan 3D Modeling, finishing dan teknik rendering desain yang dibahas secara profesional. Metode pembahasan dan contoh aplikasi kasusnya mencakup semua bidang desain teknik maupun manufakturing yang banyak digunakan dalam inovasi pengembangan teknologi, khususnya teknologi desain dengan bantuan perangkat komputer (Computer Aided Design). Pembahasan buku dilengkapi dengan finishing dan teknik rendering menggunakan AutoCAD maupun post photo rendering desain dengan Photoshop. Buku ini sangat fleksibel dan sesuai untuk semua kalangan, karena bisa merefleksikan semua aspirasi akan kebutuhan buku referensi 3D Modeling, finishing dan teknik rendering desain bagi para drafter maupun desainer dalam segala bidang pekerjaan. Setelah menggunakan buku ini pembaca akan memiliki pengetahuan dan keterampilan khusus secara profesional dalam waktu yang singkat menggunakan program AutoCAD untuk membuat 3D Modeling, finishing, teknik rendering dan post photo rendering untuk presentasi desain dalam berbagai bidang.\r\n3D Modeling Kreatif Dengan Autocad quantity'),
('B007', 'K001', 'Otodidak Penggunaan Database dengan Visual Basic', 'PB003', 'Jubilee Enterprise', 1, 'database3.jpg', 'Salah satu cara cepat membuat aplikasi berbasis database adalah dengan menggunakan bahasa pemrograman Visual Basic (VB.Net).\r\n\r\nDi dalam buku ini, Anda akan mempelajari berbagai hal sebagai berikut:\r\n\r\n– Mengenal database dan konsep database relasional\r\n\r\n– Membuat database dengan MS Access\r\n\r\n– Melakukan koneksi database antara Visual Studio dan MS Access\r\n\r\n– Melakukan koneksi database antara Visual Studio dan MySQL\r\n\r\n– Melakukan koneksi database antara Visual Studio dan MS SQL\r\n\r\n– Membuat form dan menghubungkan dengan database\r\n\r\n– Membuat aplikasi database lengkap sebagai latihan\r\n\r\nKeterampilan: Pemula, Menengah\r\n\r\nKelompok: Pemrograman\r\n\r\nJenis buku: Referensi, Tutorial\r\nOtodidak Pemrograman Database dengan Visual Basic quantity'),
('B008', 'K001', 'Pemograman Database dengan Phyton', 'PB003', 'Jubilee Enterprise', 5, 'database4.jpg', 'Python adalah bahasa pemrograman yang paling populer di dunia saat ini, sedangkan MySQL adalah platform database paling banyak digunakan di seluruh dunia. Apa jadinya jika keduanya digabung untuk membuat aplikasi database? Buku ini mengajarkan kepada para pembaca bagaimana membuat aplikasi menggunakan Python yang didukung oleh database MySQL. Anda akan belajar dari nol tentang bagaimana menyiapkan berbagai perangkat lunak hingga membuat database baru. Selanjutnya, pembahasan akan dimulai dari pembuatan tabel, memasukkan, meng-update, dan menghapus data, hingga menampilkan isi tabel ke dalam jendela browser. Jika Anda tertarik mengembangkan aplikasi dengan menggunakan Python dan MySQL, maka Anda wajib membaca buku ini. Apabila Anda adalah developer website yang ingin membuat situs interaktif, maka buku ini merupakan investasi pengetahuan jangka panjang.\r\nPemrograman Database dengan Python dan MySQL quantity'),
('B009', 'K002', '7 in 1 Pemograman Web', 'PB001', 'Rohi Abdulloh', 7, 'pemograman2.jpg', 'Teknologi pemrograman web berkembang begitu cepat. Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejarnya. Buku ini membahas 7 materi utama dalam mempelajari pemrograman web. Ketujuh bahasan ini akan sangat membantu pemula yang ingin menjadi web programmer dalam waktu yang singkat.\r\n\r\nPembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web satu per satu disertai dengan contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi.\r\n\r\nUntuk menunjang latihan pembaca, penulis juga menyertakan puluhan bonus skrip aplikatif.\r\n\r\nPembahasan dalam buku mencakup:\r\n\r\n– Dasar-dasar web programming\r\n\r\n– HTML\r\n\r\n– CSS\r\n\r\n– MySQL\r\n\r\n– PHP\r\n\r\n– Javascript\r\n\r\n– jQuery\r\n\r\n– Bootstrap\r\n\r\nKeterampilan: Pemula, Menengah\r\n\r\nKelompok: Pemrograman\r\n\r\nJenis buku: Referensi, Tutorial\r\n7 in 1 Pemrograman Web untuk Pemula quantity\r\n'),
('B010', 'K002', 'Pemograman Java', 'PB003', 'Bay Haqi, M.Kom & Heri Satria Setiawan, S.E., M.T.', 8, 'pemograman3.jpg', 'Buku ini sangat baik bagi pembaca yang ingin belajar membangun sistem dengan Java Netbeans serta menjadi panduan bagi mahasiswa IT yang ingin membuat skripsi. Dalam buku ini diajarkan cara instalasi software secara lengkap, termasuk library-library yang dibutuhkan agar aplikasi berjalan dengan baik, teori java yang lengkap serta cara analisis dengan metode Object Oriented Design (OOD), dan cara membuat UML dengan softaware ArgoUML juga tak lupa penulis berikan. Pembaca dapat mengikuti sesi demi sesi dan mempraktikkan langsung di depan komputer untuk belajar pemograman Java Netbeans ini. Pembaca akan dapat membangun aplikasi absensi dosen, mulai dari absen masuk, absen pulang, sampai perhitungan keterlambatan datang dan laporan-laporan yang dibutuhkan dalam sistem informasi absen dosen ini. Di dalam buku ini juga diajarkan bagaimana menjadikan smartphone sebagai alat untuk men-scan kehadiran dosen, termasuk software-software yang dibutuhkannya.\r\nAplikasi Absensi Dosen dengan Java dan Smartphone sebagai Barcode Reader quantity'),
('B011', 'K002', 'Pemograman Android', 'PB002', 'Nadia Firly', 9, 'pemograman4.jpg', 'Faktanya, Android telah digunakan oleh ratusan juta perangkat seluler di lebih dari 190 negara di seluruh dunia. Setiap harinya, terdapat 1 juta perangkat Android yang aktif dan lebih dari 1,5 miliar unduhan per bulan pada Google Play dan ke depannya, diperkirakan angka tersebut akan terus bertambah lho! Tidak heran, saat ini Android telah ternobatkan sebagai penguasa pasar smartphone dengan jumlah pengguna lebih dari 84%. Jika menengok kondisi pasar dalam negeri, tercatat lebih dari 103.000.000 perangkat yang aktif hanya dalam kurun waktu 5 tahun belakangan. Pasar yang begitu besar dan menjanjikan bukan? Anda yakin tidak ingin ikut berpartisipasi? Sudah tidak zaman lagi kebanyakan teori. Buku Android Application Development for Rookies with Database akan memandu Anda dalam melakukan berbagai implementasi program pada Android Studio. Dengan silabus yang tepat dan bahasa yang mudah dipahami, kini siapa pun bisa menjadi developer Android. Ayo bangun dan jadilah pemain! Sudah saatnya Anda membuat sebuah aplikasi hingga dapat mengunggahnya ke Google Play. Terlebih, proyek yang ada pada buku ini telah menggunakan 2 jenis database, yaitu SQLite dan Firebase sekaligus. Sungguh investasi diri yang besar bukan? Jadi, tidak usah ragu untuk memiliki buku ini dan segeralah menuju kasir. Akhir kata, lets create your own Android Application with database!\r\nAndroid Application Development for Rookies with Database quantity\r\n'),
('B012', 'K002', 'Pemograman Java NetBeans', 'PB002', 'Bay Haqi, M. Kom', 9, 'pemograman5.jpg', 'Buku ini merupakan buku yang akan memandu pembaca yang ingin membuat aplikasi sistem antrean dengan java NetBeans, mulai dari analisis, desain database, rancangan input output, sampai dengan testing.\r\n\r\nSetiap sesinya disusun oleh penulis secara beruntun mulai dari persiapan membuat sistem sampai dengan testing sistem. Buku ini juga disusun secara rapi, singkat, padat, dan jelas sehingga mudah dipelajari dengan cara mempraktikannya langsung di komputer. Buku ini dapat digunakan oleh para praktisi, karyawan, dan mahasiswa.\r\n'),
('B013', 'K002', 'Pemograman C++', 'PB001', 'Abdul Kadir', 8, 'pemograman6.jpg', 'Buku ini sangat cocok digunakan untuk pelajar, mahasiswa, atau siapa saja yang bermaksud untuk mempelajari pemrograman komputer menggunakan Bahasa C++. Buku ini lebih menekankan pada cara untuk menyelesaikan masalah. Oleh karena itu, banyak contoh permasalahan yang diberikan dan cara untuk menyelesaikannya. Contoh-contoh yang cukup banyak dan bahasa yang mudah dipahami membuat buku ini sangat mudah digunakan dan dapat menjadi penuntun untuk memelajari Bahasa C++ secara mandiri.\r\nLogika Pemrograman Menggunakan C++ quantity'),
('B014', 'K002', 'Pemograman Android Studio', 'PB002', 'Muhammad Nurhidayat', 10, 'pemograman7.jpg', 'Buku ini membahas seluk-beluk pemrograman Android. Materinya diambil dari berbagai referensi, tetapi sebagian besar diambil dari pengalaman penulis sebagai software engineer.\r\n\r\nJurus Rahasia Menguasai Pemrograman Android menjelaskan secara rinci segala persiapan untuk belajar Android, aplikasi yang dibutuhkan, dan cara membuat project Android hingga mengirimkannya ke Google Play. Tentu saja dibahas pula cara memperoleh akun developer di PlayStore dan memberikan signature pada aplikasi sehingga aplikasi Anda “layak jual”. Sebagai tambahan, dibahas pula hubungan antara Android dengan database, baik offline maupun online.\r\n\r\nKeterampilan: Pemula, Menengah\r\n\r\nKelompok: Pemrograman\r\nJurus Rahasia Menguasai Pemrograman Android quantity'),
('B015', 'K002', 'Pemograman React JS', 'PB001', 'Jubilee Enterprise', 7, 'pemograman8.jpg', 'ReactJS merupakan library Javascript yang digunakan untuk mempercepat proses updating tampilan aplikasi website. Library ini digunakan untuk pengembangan aplikasi-aplikasi website terkenal, seperti Facebook, Instagram, dan Whatsapp versi web. Apabila Anda sudah menguasai Javascript, maka tiba waktunya untuk mempelajari ReactJS agar pengetahuan Anda semakin bertambah.\r\nBuku ini membantu web programmer untuk menginstal dan menggunakan ReactJS. Pembahasan di dalam buku ini meliputi:\r\n• Cara instalasi ReactJS dan menggunakannya untuk membuat aplikasi web sederhana.\r\n• Pengenalan Flux dan Redux.\r\n• Testing ReactJS menggunakan Jasmine, Enzyme, dan tool-tool lainnya.\r\n• Penggunaan Live-Update dan Middleware Redux.\r\n• Pemanfaatan Routing Client dalam React.\r\n• Promise dan Pengolahan Data.\r\n• Komponen dan Elemen dalam ReactJS.\r\n• Mengenal State dan Lifecycle.\r\n• Dan lain-lain'),
('B016', 'K003', 'Pengolahan Jaringan', 'PB003', 'Ahmad Rosid Komarudin', 8, 'networking2.jpg', 'JAringan adalah suatu pengolahan jaring menggunakan database yang disederhanakan dengan sistem pengapian udara gasir tuang ke dalam kasir tajir'),
('B017', 'K004', 'Tips Tips Adobe Ilustrator', 'PB002', 'Jubilee Enterprise', 2, 'desgraf2.jpg', 'Adobe Illustrator merupakan software paling keren untuk pembuatan aneka desain grafis berbasis vector. Di dalam buku ini, Anda akan menemukan tip dan trik seputar cara-cara, rahasia, atau kiat-kiat menggunakan software ini. Pembahasan meliputi:\r\n\r\nMengatur tingkat kehitaman gambar sampai sehitam-hitamnya.\r\nMembuat simulasi warna pada desain untuk para buta warna.\r\nMembuat objek apa pun menjadi tumpul.\r\nMengedit teks utuh satu huruf demi satu huruf.\r\nMembuat sebuah objek memiliki warna isian beragam dan kita tinggal memilih salah satunya tanpa perlu pewarnaan ulang.\r\nAlur kerja membuat desain dari awal hingga akhir.\r\n\r\nBuku ini ditujukan bagi para desainer yang ingin memanfaatkan Adobe Illustrator untuk mengoptimalkan hasil desain sehari-hari. Setelah menguasai materi yang dibahas, diharapkan pengetahuan tentang desain grafis menggunakan Adobe Illustrator semakin berkembang drastis.\r\nTip Dan Trik Adobe Illustrator quantity'),
('B018', 'K004', '25 Proyek desain Photoshop', 'PB001', 'Mohammad Jeprie', 10, 'desgraf3.jpg', 'Photoshop hingga saat ini masih merajai software desain. Jika serius ingin eksis di dunia desain, Photoshop wajib Anda kuasai. Photoshop bukan sekadar sebuah program editor gambar seperti yang diduga sebagian orang. Banyak hal yang bisa dilakukan dengan Photoshop. Hanya dengan program ini, Anda bisa merambah desain web, desain interface, desain ikon, menggambar karakter, dan tentu saja editing foto. Buku ini ingin memperlihatkan berbagai jenis desain yang bisa Anda buat di Photoshop. Itu sebabnya, materi buku ini sangat beragam, mulai dari editing hingga desain interface. Walaupun begitu, buku ini tidak rumit, termasuk bagi para pemula. Dengan banyak gambar dan hanya sedikit teori, buku ini mengajarkan berbagai teknik desain secara praktis dan ringkas.\r\n25 Proyek Desain dengan Photoshop quantity'),
('B019', 'K004', 'Photoshop Komplet', 'PB003', 'Iwan Nisaburi & Saiful Hadi Arofat', 5, 'desgraf4.jpg', 'Berawal dari beberapa tutorial terkait gambar ilustrasi yang biasanya beredar, baik di buku maupun internet, penulis mengamati bahwa kebanyakan tutorial tersebut menggunakan langkah-langkah yang cenderung hanya bisa diikuti oleh orang yang sudah memiliki basic teknik menggambar dengan baik. Dari permasalahan tersebut, penulis mencoba memberikan langkah-langkah yang lebih rinci disertai beberapa teknik yang simpel dengan bahasa yang jelas dan mudah untuk diikuti namun dengan hasil layaknya desain profesional.\r\n\r\nBuku ini sungguh cocok bagi pemula karena buku ini tidak memerlukan keahlian menggambar khusus. Buku ini akan membahas tentang teknik-teknik pembuatan desain ilustrasi dan desain karakter menggunakan Adobe Photoshop. Buku ini juga akan mengupas tidak hanya teknik coloring biasa namun coloring menggunakan teknik-teknik yang profesional seperti pattern, solid, gradasi yang mirip dengan menggunakan cat air.\r\nTeknik Desain Ilustrasi Dan Karakter Dengan Photoshop Komplet quantity'),
('B020', 'K005', 'Kitab Video Editing', 'PB002', 'Jubilee Enterprise', 0, 'mulmed2.jpg', '\r\nAdobe Premiere CC 2018 adalah software video editing yang paling canggih saat ini. Sebagai editor video, Anda harus mengenal dan menguasai software ini untuk mendapatkan pengalaman mengedit yang sempurna dan tanpa cacat. Buku ini membahas bagaimana memanfaatkan Adobe Premiere CC 2018 untuk keperluan editing dan penambahan efek-efek khusus.\r\nKitab Video Editing dan Efek Khusus quantity\r\n'),
('B021', 'K005', 'Adobe Premiere Komplet', 'PB003', 'Jubilee Enterprise', 5, 'mulmed3.jpg', '“Adobe Premiere Pro merupakan software yang dikhususkan untuk membantu editor video mengedit clip-clip, audio, dan aset lainnya, seperti title (judul), subtitle (caption), serta gambar/ilustrasi sehingga menjadi video utuh yang dapat dinikmati oleh siapa pun. Buku ini mengajarkan kepada para pembaca bagaimana menggunakan Adobe Premiere Pro secara cepat dan efisien.\r\n\r\nPembahasan di dalam buku ini meliputi:\r\n• Basic worklflow (alur kerja dasar) menggunakan Adobe Premiere Pro.\r\n• Mengenal Adobe Premiere Pro, clip, aset, dan panel-panel penting yang dapat digunakan untuk proses editing.\r\n• Mengenal clip dan bagaimana mengedit clip untuk keperluan video editing, seperti pembuatan subclip, menyeleksi clip, memotong, dan sebagainya.\r\n• Memahami fungsi sequence, timeline, track, dan pengaturan clip-clip.\r\n• Membuat Title dan Subtitle yang menarik serta informatif.\r\n• Menggunakan Marker untuk menandai clip dan video\r\n• Bekerja dengan efek-efek khusus Tujuan dari buku ini adalah untuk membantu pembaca menjadi seorang video editor pemula yang ingin tetap menggunakan Adobe Premiere Pro untuk jangka panjang.”\r\nAdobe Premiere Komplet quantity'),
('B022', 'K005', 'WhiteBoard Aniimation', 'PB002', 'Jefferly Helianthusonfri', 8, 'mulmed4.jpg', 'Salah satu jenis video yang populer di internet adalah video whiteboard animation. Kita bisa gunakan video whiteboard animation untuk berbagai keperluan, mulai dari video promosi, video edukasi, video tutorial, video konten YouTube, video profil bisnis, dan banyak lagi. Lantas, bagaimana cara membuat whiteboard animation dengan mudah, cepat, dan praktis? Temukan jawaban dan panduan lengkapnya dalam buku ini.\r\n\r\nBuku ini akan memandumu membuat whiteboard animation dengan mudah dan praktis. Usai mempraktikkan isi buku ini, dijamin kamu bisa membuat video whiteboard animation. Inilah pembahasan menarik dalam buku ini.\r\n\r\n? Panduan lengkap membuat video whiteboard animation profesional dengan mudah, cepat, dan praktis. Siapa pun bisa membuat whiteboard animation.\r\n\r\n? Cara dan panduan membuat video whiteboard animation secara gratis dan praktis.\r\n\r\n? Cara dan panduan menulis naskah video untuk YouTube dan video whiteboard animation.\r\n\r\n? Berbagai kreasi video whiteboard animation, mulai dari untuk keperluan infografik, untuk konten YouTube, untuk promosi, untuk konten media sosial, dan sebagainya.\r\n\r\n? Software-software terbaik untuk membuat whiteboard animation.\r\n\r\n? Tips dan kiat menghasilkan uang dari keterampilan membuat whiteboard animation.\r\n\r\n? Bonus video tutorial seputar YouTube dan pembuatan video whiteboard animation.\r\n\r\nTunggu apalagi, segera miliki dan baca buku ini. Yuk, belajar membuat whiteboard animation dengan mudah dan praktis.\r\nBelajar Membuat Whiteboard Animation untuk Pemula quantity\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `idTransaksi` varchar(7) NOT NULL,
  `idBuku` varchar(6) NOT NULL,
  `tglDikembalikan` date NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`idTransaksi`, `idBuku`, `tglDikembalikan`, `status`) VALUES
('TR0001', 'B001', '0000-00-00', '0'),
('TR0001', 'B007', '0000-00-00', '0'),
('TR0002', 'B008', '0000-00-00', '0'),
('TR0002', 'B008', '0000-00-00', '0'),
('TR0003', 'B014', '0000-00-00', '0'),
('TR0003', 'B014', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` varchar(5) NOT NULL,
  `kategoriBuku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idKategori`, `kategoriBuku`) VALUES
('K001', 'Database'),
('K002', 'Programming'),
('K003', 'Networking'),
('K004', 'Desain Grafis'),
('K005', 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `idPustakawan` varchar(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hakUser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`idPustakawan`, `username`, `password`, `hakUser`) VALUES
('P001', 'asep_komar', '202cb962ac59075b964b07152d234b70', 'Pustakawan'),
('P002', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `idPenerbit` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`idPenerbit`, `nama`, `alamat`, `phone`, `email`) VALUES
('PB001', 'Elex Media Corporat', 'Jln. Kebon Wwaru Jakarta Timur 40535 23', '08976767585940', 'elexmedia@gmail.com'),
('PB002', 'PT. Gramedia', 'Kebon Kopi', '08965354312', 'gramedia@pustaka.com'),
('PB003', 'PT Parmindho', 'Cibeunying', '09283932', 'parmindho@city.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustakawan`
--

CREATE TABLE `pustakawan` (
  `idPustakawan` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pustakawan`
--

INSERT INTO `pustakawan` (`idPustakawan`, `nama`, `alamat`, `phone`, `email`, `image`) VALUES
('P001', 'Asep Komarudin Sulis', 'Kebon Kawung', '08976767585940', 'asepkomar@gmail.com', 'asep.jpg'),
('P002', 'admin', 'admin', '45245345', 'admin@gmail.com', 'admin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `tingkat` char(5) NOT NULL,
  `kelas` char(1) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `jurusan`, `tingkat`, `kelas`, `phone`, `email`, `image`) VALUES
('083294829', 'Ikhsan tayomg', 'fg', 'TPTU', 'XII', 'C', '32454778', 'memetalkatiri@gmail.com', 'jesica.jpg'),
('12', 'as', 'as', 'SIJA', 'X', 'B', '08965354312', 'jej12e@gmail.com', 'calvin.jpg'),
('1237342', 'Jesica Alberto Gonzales sds', 'ds', 'SIJA', 'XII', 'B', '545443554', 'gramedia@pustaka.com', 'calvin.jpg'),
('1811', 'IKhsan', 'as', 'SIJA', 'XI', 'B', 'as', 'as@gmail.com', 'c++.jpg'),
('192838', 'Bayu baju', 'BONKOP', 'TEDK', 'XI', 'C', '32414124', 'asepss@gmail.com', '3x4 IKHSAN 9G copy.jpg'),
('234', 'edsfges', 'erwgds', 'TEDK', 'XII', 'B', '3543253245', 'd123qwgras@gmail.com', 'calvin.jpg'),
('23553', 'afsd', 'gfa', 'TEDK', 'XI', 'C', '213454', 'd12asfd3qweras@gmail.com', 'calvin.jpg'),
('324879378', 'haha', 'adsfa', 'TEDK', 'XII', 'C', '34534532', 'ddas@gmail.com', 'calvin.jpg'),
('3542', 'frsgrgt', 'dsfsdgfdsg', 'RPL', 'XII', 'B', '456356', 'a34ers@gmail.com', 'calvin.jpg'),
('43543', 'bvbb', 'vcbcb', 'SIJA', 'XI', 'B', '345345', '123@gmail.com', 'calvin.jpg'),
('456', '546', 'rty', 'SIJA', 'XI', 'B', '43563456', 'gramedia@pustaka.com', 'jesica.jpg'),
('567567', 'fdfsfew', 'dfad', 'TEI', 'XI', 'B', '6574e5', 'd123as@gmail.com', 'jesica.jpg'),
('64386', 'dfggdg', 'aefaesf', 'SIJA', 'XII', 'C', '3214324', 'adfsdsgs@gmail.com', 'jesica.jpg'),
('7347', 'ase', 'adfertrte', 'SIJA', 'XII', 'A', '08974626341', 'asepss@gmail.com', 'calvin.jpg'),
('892293', 'Memet', 'cipageran', 'TOI', 'XII', 'B', '342355543', 'memet@gmail.com', '3x4 IKHSAN 9G copy.jpg'),
('90', 'jaja', 'ads', 'TEDK', 'XI', 'B', '12342341', 'das@gmail.com', 'jesica.jpg'),
('978234', 'ujang', 'asd', 'TPTU', 'XI', 'B', '12341', 'd123qweras@gmail.com', 'jesica.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` varchar(7) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `idPustakawan` varchar(4) NOT NULL,
  `tglPinjam` date NOT NULL,
  `qty` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `nis`, `idPustakawan`, `tglPinjam`, `qty`) VALUES
('TR0001', '192838', 'P001', '2020-05-03', 2),
('TR0002', '892293', 'P001', '2020-03-03', 2),
('TR0003', '083294829', 'P001', '2020-04-03', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`),
  ADD KEY `idPenerbit` (`idPenerbit`),
  ADD KEY `idKategori` (`idKategori`);

--
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD KEY `idBuku` (`idBuku`),
  ADD KEY `idTransaksi` (`idTransaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD KEY `idPustakawan` (`idPustakawan`) USING BTREE;

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`idPenerbit`);

--
-- Indeks untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`idPustakawan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bag`
--
ALTER TABLE `bag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`idPenerbit`) REFERENCES `penerbit` (`idPenerbit`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`);

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`),
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`);

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idPustakawan`) REFERENCES `pustakawan` (`idPustakawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
