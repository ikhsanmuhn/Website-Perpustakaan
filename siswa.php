<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/stylesiswa.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    <title>SISWA | BROWSE BUKU</title>
</head>
<body>
    
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" style="width: 50px; height:50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="siswa.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bag.php">Bag</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pills-tab">Pinjam Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#puter">Kontak</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="GET">
            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger my-2 my-sm-0" name="btn_cari" type="submit" style="border-radius: 50px;">Search</button>
            </form>
        </div>
        </nav>
    </div>
    
    <div class="container-fluid">
        <!-- proto[1] <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand ">Perpustakaan</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" style="border-radius: 50px;">Search</button>
            </form>
                <ul>
                    <li>
                    <a href="bag.php"><img class="bag" src="img/bag.png" style="width: 30px; heightL 40px;"></a>
                    </li>
                </ul>
                
            
            
        </nav> -->

        <!-- proto[2] <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Perpustakaan SMK Negeri 1 Cimahi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="bag.php" ><img class="bag" src="img/bag.png" style="width: 30px; heightL 40px;"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
               proto[2].[1] <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                proto[2].[1] </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" style="border-radius: 50px;">Search</button>
                </form>
            </div>
        </nav> -->


        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#"><img class="d-block w-100 first" src="img/1.png" alt="First slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img class="d-block w-100" src="img/2.png" alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img class="d-block w-100" src="img/3.png" alt="Third slide"></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-database-tab" data-toggle="pill" href="#pills-database" role="tab" aria-controls="pills-database" aria-selected="false">Database</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-programming-tab" data-toggle="pill" href="#pills-programming" role="tab" aria-controls="pills-programming" aria-selected="false">Programming</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-networking-tab" data-toggle="pill" href="#pills-networking" role="tab" aria-controls="pills-networking" aria-selected="false">Networking</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-desgraf-tab" data-toggle="pill" href="#pills-desgraf" role="tab" aria-controls="pills-desgraf" aria-selected="false">Design Grafis</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-mulmed-tab" data-toggle="pill" href="#pills-mulmed" role="tab" aria-controls="pills-mulmed" aria-selected="false">Multimedia</a>
        </li>
    </ul>
       
    </div>
    <div class="container-fluid">
         <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                <div class="container-fluid col-md-12" id="penjelasan">
                    <h2 class="d-flex justify-content-center" style="padding-top:50px;">" AYO PENUHI KEBUTUHAN LITERASIMU MULAI SEKARANG! "</H2>
                </div>

                <div class="row m-0">
                <?php
                require_once("koneksi.php");
                if(isset($_GET['cari'])){

                    $cari="%".$_GET['cari']."%";
                    
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku WHERE idBuku LIKE :pencarian OR judul LIKE :pencarian OR idPenerbit LIKE :pencarian OR penulis LIKE :pencarian OR qty LIKE :pencarian";
                    $result=$db->prepare($sql);
                    $result->bindparam(':pencarian',$cari);
                    $result->execute();
                }else{
                    
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku";
                    $result=$db->prepare($sql);
                    $result->execute();
                    $total = $result->rowCount();
                }




                   
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
                ?>
                    <div class="card col-md-3 p-4" id="buku_perpus" style="border:none;" >
                        <a href="detail_buku.php?id_buku=<?php echo $row['idBuku'];?>" class="d-flex justify-content-center" target="blank"><img class="card-img-top" src="img_upload/<?php echo $row['image']?>" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?php echo $row['judul'];?></h5>
                        <p class="card-text"><?php echo $row['idBuku'];?><br><?php echo $row['penulis'];?><br><?php echo $row['idPenerbit'];?><br>QTY  :<?php echo $row['qty'];?></p>
                        <form action="action_close.php" method="POST">
                            <input type="hidden" value="<?php echo $row['image'];?>" name="id_gambar_pinjam">
                            <input type="hidden" value="<?php echo $row['idBuku'];?>" name="id_buku_pinjam">
                            <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                        <button type="submit" name="pinjam" class="btn btn-primary col-md-12" style="border-radius: 50px;">Pinjam</button>
                        </form>
                        
                        </div>
                    </div>
                <?php
                    }
                ?>                            
                </div>

            </div>
            <div class="tab-pane fade" id="pills-database" role="tabpanel" aria-labelledby="pills-database-tab">
            <div class="container-fluid col-md-12" id="penjelasan">
                    <p class="text-left">Basis data dapat didefinisikan atau diartikan sebagai kumpulan data yang disimpan secara sistematis di dalam komputer yang dapat
                         diolah atau dimanipulasi menggunakan perangkat lunak (software) program atau aplikasi untuk menghasilkan informasi. Pendefinisian basis data meliputi spesifikasi berupa tipe data,
                          struktur data dan juga batasan-batasan pada data yang kemudian disimpan.<br></p>
                    <p class="text-left">Basis data merupakan aspek yang sangat penting dalam sistem informasi karena berfungsi
                         sebagai gudang penyimpanan data untuk diolah lebih lanjut. Basis data menjadi penting karena dapat
                          mengorganisasi data, menghidari duplikasi data, menghindari hubungan antar data yang tidak jelas dan juga update yang rumit.</p>
                </div>

                <div class="row m-0">
                <?php
                    require_once("koneksi.php");
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku WHERE idKategori = 'K001'";
                    $result=$db->prepare($sql);
                    $result->execute();
                    $total = $result->rowCount();
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){

                    
                ?>
                    <div class="card col-md-3 p-4" id="buku_perpus" style="border:none;" >
                        <a href="detail_buku.php?id_buku=<?php echo $row2['idBuku'];?>" class="d-flex justify-content-center" target="blank"><img class="card-img-top" src="img_upload/<?php echo $row['image']?>" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?php echo $row['judul'];?></h5>
                        <p class="card-text"><?php echo $row['idBuku'];?><br><?php echo $row['penulis'];?><br><?php echo $row['idPenerbit'];?><br>QTY  :<?php echo $row['qty'];?></p>
                        <form action="action_close.php" method="POST">
                            <input type="hidden" value="<?php echo $row['image'];?>" name="id_gambar_pinjam">
                            <input type="hidden" value="<?php echo $row['idBuku'];?>" name="id_buku_pinjam">
                            <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                        <button type="submit" name="pinjam" class="btn btn-primary col-md-12" style="border-radius: 50px;">Pinjam</button>
                        </form>
                        
                        </div>
                    </div>
                <?php
                    }
                ?>                            
                </div>

                

            </div>
            <div class="tab-pane fade" id="pills-programming" role="tabpanel" aria-labelledby="pills-programming-tab">
            <div class="container-fluid col-md-12" id="penjelasan">
                    <p class="text-left">Programming adalah sebuah proses seseorang menulis, memperbaiki, menguji,
                        dan memelihara kode-kode dalam membuat sebuah program komputer.
                        Kode-kode tersebut ditulis dalam bahasa pemrograman yang tidak hanya ada satu macam saja.<br></p>
                    <p class="text-left">Anda bisa membuat sebuah program dengan bahasa pemrograman yang mungkin berbeda dengan bahasa milik teman Anda.
                         Tergantung bahasa pemrograman apa yang Anda kuasai dalam melakukan program sistem.
                         Dengan Anda memahami dan mampu mengaplikasikan langsung bahasa ke dalam program.</p>
                </div>

                <div class="row m-0">
                <?php
                    require_once("koneksi.php");
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku WHERE idKategori = 'K002'";
                    $io=$db->prepare($sql);
                    $io->execute();
                    
                    while($row2 = $io->fetch(PDO::FETCH_ASSOC)){

                    
                ?>
                    <div class="card col-md-3 p-4" id="buku_perpus" style="border:none;" >
                        <a href="detail_buku.php?id_buku=<?php echo $row2['idBuku'];?>" class="d-flex justify-content-center" target="blank"><img class="card-img-top" src="img_upload/<?php echo $row2['image']?>" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?php echo $row2['judul'];?></h5>
                        <p class="card-text"><?php echo $row2['idBuku'];?><br><?php echo $row2['penulis'];?><br><?php echo $row2['idPenerbit'];?><br>QTY  :<?php echo $row2['qty'];?></p>
                        <form action="action_close.php" method="POST">
                            <input type="hidden" value="<?php echo $row2['image'];?>" name="id_gambar_pinjam">
                            <input type="hidden" value="<?php echo $row2['idBuku'];?>" name="id_buku_pinjam">
                            <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                        <button type="submit" name="pinjam" class="btn btn-primary col-md-12" style="border-radius: 50px;">Pinjam</button>
                        </form>
                        
                        </div>
                    </div>
                <?php
                    }
                ?>                            
                </div>

                

            </div>
            <div class="tab-pane fade" id="pills-networking" role="tabpanel" aria-labelledby="pills-networkking-tab">
                <div class="container-fluid col-md-12" id="penjelasan">
                    <p class="text-left">Networking dan Jaringan adalah salah satu cabang ilmu dunia IT yang membahas tentang komunikasi antar komputer. Networking ini juga dapat diartikan sebagai sebuah kumpulan komputer atau perangkat keras yang terhubung secara bersamaan, baik secara fisik maupun logis, dan menggunakan
                         hardware maupun software khusus, yang memungkinkan untuk bertukar informasi dan bekerja sama.<br></p>
                    <p class="text-left">Networking merupakan istilah yang menggambarkan proses mengenai keterlibatan dalam merancang, melaksanakan, upgrade, mengelola dan bekerja dengan jaringan dan teknologi jaringan. Dalam postingan kali ini,
                         Kami akan membahas secara lengkap dan detail tentang apa itu yang disebut dengan networking.</p>
                </div>

                <div class="row m-0">
                <?php
                    require_once("koneksi.php");
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku WHERE idKategori = 'K003'";
                    $io=$db->prepare($sql);
                    $io->execute();
                    
                    while($row2 = $io->fetch(PDO::FETCH_ASSOC)){

                    
                ?>
                    <div class="card col-md-3 p-4" id="buku_perpus" style="border:none;" >
                        <a href="detail_buku.php?id_buku=<?php echo $row2['idBuku'];?>" class="d-flex justify-content-center" target="blank"><img class="card-img-top" src="img_upload/<?php echo $row2['image']?>" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?php echo $row2['judul'];?></h5>
                        <p class="card-text"><?php echo $row2['idBuku'];?><br><?php echo $row2['penulis'];?><br><?php echo $row2['idPenerbit'];?><br>QTY  :<?php echo $row2['qty'];?></p>
                        <form action="action_close.php" method="POST">
                            <input type="hidden" value="<?php echo $row2['image'];?>" name="id_gambar_pinjam">
                            <input type="hidden" value="<?php echo $row2['idBuku'];?>" name="id_buku_pinjam">
                            <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                        <button type="submit" name="pinjam" class="btn btn-primary col-md-12" style="border-radius: 50px;">Pinjam</button>
                        </form>
                        
                        </div>
                    </div>
                <?php
                    }
                ?>                            
                </div>

            </div>
            <div class="tab-pane fade" id="pills-desgraf" role="tabpanel" aria-labelledby="pills-desgraf-tab">
                <div class="container-fluid col-md-12" id="penjelasan">
                    <p class="text-left">Desain grafis lebih dari apa yang telah dijelaskan diatas. Pengertian desain grafis terus berkembang mengikuti siklus masa, karena bidang ini adalah salah satu bidang studi yang paling cepat dalam beradaptasi terhadap perkembangan zaman.
                         Jenis produk yang dihasilkannya juga semakin beragam, tidak hanya terbatas pada media cetak.<br></p>
                    <p class="text-left">Desain adalah metode perancangan estetika yang didasari dengan kreatifitas, sedangkan grafis adalah ilmu dari perancangan titik maupun garis sehingga akan
                         membentuk sebuah gambar yang dapat memberikan informasi serta berhubungan dengan proses pencetakan.</p>
                </div>

                <div class="row m-0">
                <?php
                    require_once("koneksi.php");
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku WHERE idKategori = 'K004'";
                    $io=$db->prepare($sql);
                    $io->execute();
                    
                    while($row2 = $io->fetch(PDO::FETCH_ASSOC)){

                    
                ?>
                    <div class="card col-md-3 p-4" id="buku_perpus" style="border:none;" >
                        <a href="detail_buku.php?id_buku=<?php echo $row2['idBuku'];?>" class="d-flex justify-content-center" target="blank"><img class="card-img-top" src="img_upload/<?php echo $row2['image']?>" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?php echo $row2['judul'];?></h5>
                        <p class="card-text"><?php echo $row2['idBuku'];?><br><?php echo $row2['penulis'];?><br><?php echo $row2['idPenerbit'];?><br>QTY  :<?php echo $row2['qty'];?></p>
                        <form action="action_close.php" method="POST">
                            <input type="hidden" value="<?php echo $row2['image'];?>" name="id_gambar_pinjam">
                            <input type="hidden" value="<?php echo $row2['idBuku'];?>" name="id_buku_pinjam">
                            <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                        <button type="submit" name="pinjam" class="btn btn-primary col-md-12" style="border-radius: 50px;">Pinjam</button>
                        </form>
                        
                        </div>
                    </div>
                <?php
                    }
                ?>                            
                </div>

            </div>
            <div class="tab-pane fade" id="pills-mulmed" role="tabpanel" aria-labelledby="pills-mulmed-tab">
                <div class="container-fluid col-md-12" id="penjelasan">
                    <p class="text-left">Multimedia adalah penggunaan komputer untuk menyajikan dan menggabungkan teks, suara, gambar, animasi dan video dengan alat bantu ([tool]) dan koneksi ([link]) sehingga
                         pengguna dapat ber-([navigasi]), berinteraksi, berkarya dan berkomunikasi. Multimedia sering
                         digunakan dalam dunia hiburan.  Selain dari dunia hiburan, Multimedia juga diadopsi oleh dunia game<br></p>
                    <p class="text-left">Multimedia dimanfaatkan juga dalam dunia pendidikan dan bisnis. Di dunia pendidikan, multimedia digunakan sebagai media pengajaran, baik dalam kelas maupun secara sendiri-sendiri.
                         Di dunia bisnis, multimedia digunakan sebagai media profil perusahaan,
                         profil produk, bahkan sebagai media kios informasi dan pelatihan dalam sistem e-learning.</p>
                </div>

                <div class="row m-0">
                <?php
                    require_once("koneksi.php");
                    $sql = "SELECT idBuku, judul, penulis, idPenerbit, qty, image FROM buku WHERE idKategori = 'K005'";
                    $io=$db->prepare($sql);
                    $io->execute();
                    
                    while($row2 = $io->fetch(PDO::FETCH_ASSOC)){

                    
                ?>
                    <div class="card col-md-3 p-4" id="buku_perpus" style="border:none;" >
                        <a href="detail_buku.php?id_buku=<?php echo $row2['idBuku'];?>" class="d-flex justify-content-center" target="blank"><img class="card-img-top" src="img_upload/<?php echo $row2['image']?>" alt="Card image cap"></a>
                        <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center"><?php echo $row2['judul'];?></h5>
                        <p class="card-text"><?php echo $row2['idBuku'];?><br><?php echo $row2['penulis'];?><br><?php echo $row2['idPenerbit'];?><br>QTY  :<?php echo $row2['qty'];?></p>
                        <form action="action_close.php" method="POST">
                            <input type="hidden" value="<?php echo $row2['image'];?>" name="id_gambar_pinjam">
                            <input type="hidden" value="<?php echo $row2['idBuku'];?>" name="id_buku_pinjam">
                            <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                        <button type="submit" name="pinjam" class="btn btn-primary col-md-12" style="border-radius: 50px;">Pinjam</button>
                        </form>
                        
                        </div>
                    </div>
                <?php
                    }
                ?>                            
                </div>
               
                
            </div>
    </div>
    <div class="container-fluid" id="tentang">
        <div class="tentang col-md-12">

        </div>
    </div>
    <!-- <div class="container-fluid">
        <div class="navbar_bawah col-md-12">

        </div>
    </div> -->


      <!-- Site footer -->
      <footer class="site-footer" id="puter">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>PERPUSTAKAAN SMKN 1 CIMAHI</h6>
            <p class="text-justify"><p>Website perpustakaan online cimahi dibuat untuk mempermudah jangkauan siswa dalam mengakses fasilitas perpustakaan yang ada di SMK Negeri 1 Cimahi.<br>
            Website ini dapat digunakan untuk registrasi pada saat meminjam buku. Siswa dapat mengakses nya dimana saja.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>KATEGORI BUKU</h6>
            <ul class="footer-links">
              <li><a href="#">Database</a></li>
              <li><a href="#">Programming</a></li>
              <li><a href="#">Networking</a></li>
              <li><a href="#">Desain Grafis</a></li>
              <li><a href="#">Multimedia</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>TENTANG PERPUSTAKAAN SMKN 1 CIMAHI</h6>
            <ul class="footer-links">
              <li><a href="#">Tentang Kami</a></li>
              <li><a href="#">Kontak Kami</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 18 | Ikhsan Muhamad Nurdin 
            </p>
          </div>
        </div>
      </div>
</footer>
    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>