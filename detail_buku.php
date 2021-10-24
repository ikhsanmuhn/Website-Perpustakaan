<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/styledetailbuku.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    <title>Detail | Buku</title>
</head>
<body>
<?php
    require_once("koneksi.php");
    $id_buku = $_GET['id_buku'];
    $sql = "SELECT * FROM buku b, penerbit p, kategori k WHERE idBuku ='$id_buku' AND b.idPenerbit = p.idPenerbit AND k.idKategori = b.idKategori";
    $result=$db->prepare($sql);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);
?>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" style="width: 50px; height:50px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="siswa.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bag.php">Bag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Pinjam Buku<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" style="border-radius: 50px;">Search</button>
                </form>
            </div>
            </nav>

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
    </div>
        

    <div class="row" style="margin:0px;">
                <div class="photo col-md-9">
                    <img src="img_upload/<?php echo $row['image'];?>" style="width: 200px; height: 300px; box-shadow: 3px 3px 10px #bbbbbb;">
                    <div class="row">
                        <div class="row col-md-9">
                            <h3><?php echo $row['judul'];?></h3>
                        </div>
                        <div class="row col-md-3" >
                            <form class="masukan" action="action_close.php" method="POST">
                                <select name="kuantiti" id="inputJumlah" class="form-control" style="float:right; border-radius: 50px;">
                                                <option selected >QTY</option>
                                                <option value="1">1</option>
                                                
                                    </select>
                                    <input type="hidden" value="<?php echo $row['image'];?>" name="id_gambar_pinjam">
                                    <input type="hidden" value="<?php echo $row['idBuku'];?>" name="id_buku_pinjam">
                                    <input type="hidden" value="<?php echo $qty=1;?>" name="id_qty_pinjam">
                                <button class="btn btn-outline-primary my-2 my-sm-0" name="pinjam" type="submit" style="border-radius: 50px;">Pinjam</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <h6>Penulis: <?php echo $row['penulis'];?></h6><br>
                    </div>
                    <div class="row">
                        <h6><?php echo $row['nama'];?></h6>
                    </div>
                    <div class="row">
                        <p><?php echo $row['sinopsis'];?></p>
                    </div>
                    <dl class="row col-md-9 rinci">
                        <dt class="col-sm-4">Kode Buku</dt>
                        <dd class="col-sm-8"><?php echo $row['idBuku'];?></dd>

                        <dt class="col-sm-4">Judul Buku</dt>
                        <dd class="col-sm-8"><?php echo $row['judul'];?></dd>

                        <dt class="col-sm-4">Identitas Buku</dt>
                        <dd class="col-sm-8">
                            <dl class="row">
                                <dt class="col-sm-4">Penulis</dt>
                                <dd class="col-sm-8"><?php echo $row['penulis'];?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">Penerbit</dt>
                                <dd class="col-sm-8"><?php echo $row['nama'];?></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4">Kategori</dt>
                                <dd class="col-sm-8"><?php echo $row['kategoriBuku'];?></dd>
                            </dl>
                        </dd>
                        <dt class="col-sm-4">Jumlah Buku</dt>
                        <dd class="col-sm-8"><?php echo $row['qty'];?> pcs</dd>
                    </dl>
                </div>
                <div class="col-md-3 related ">
                    <div class="related-konten">
                        <h5>Saran Untuk Kamu</h5>
                        <div class="row baris1">
                            <div class="col-md-6">
                            <a href="#"><img src="img_upload/c++.jpg" style="width:100px; height:150px; box-shadow: 3px 3px 10px #bbbbbb;"></a>
                                
                            </div>
                            <div class="col-md-6">
                                <h6>Belajar C++</h6>
                                <h6>Pemograman</h6>
                            </div>
                        </div>
                        <div class="row baris1">
                            <div class="col-md-6">
                            <a href="#"><img src="img_upload/c++.jpg" style="width:100px; height:150px; box-shadow: 3px 3px 10px #bbbbbb;"></a>
                                
                            </div>
                            <div class="col-md-6">
                                <h6>Belajar C++</h6>
                                <h6>Pemograman</h6>
                            </div>
                        </div>
                        <div class="row baris1">
                            <div class="col-md-6">
                            <a href="#"><img src="img_upload/c++.jpg" style="width:100px; height:150px; box-shadow: 3px 3px 10px #bbbbbb;"></a>
                                
                            </div>
                            <div class="col-md-6">
                                <h6>Belajar C++</h6>
                                <h6>Pemograman</h6>
                            </div>
                        </div>
                        <div class="row baris1">
                            <div class="col-md-6">
                            <a href="#"><img src="img_upload/c++.jpg" style="width:100px; height:150px; box-shadow: 3px 3px 10px #bbbbbb;"></a>
                                
                            </div>
                            <div class="col-md-6">
                                <h6>Belajar C++</h6>
                                <h6>Pemograman</h6>
                            </div>
                        </div>
                    </div>
                </div>
    </div>   


    <footer class="site-footer">
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