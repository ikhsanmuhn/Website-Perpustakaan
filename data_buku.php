<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/stylelaporan.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    
    <title>Pustakawan</title>
</head>
<body>
<?php

    session_start();
    require_once("koneksi.php");

    
    $gambar=$_SESSION['image']."<br>";
    $id=$_SESSION['idPustakawan']."<br>";
    $nama =$_SESSION['username']."<br>";
    $akses = $_SESSION['hakUser']."<br>";




?>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pustakawan</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="user-panel">
                    <?php
                    echo "<div class='photo_profil d-flex justify-content-center'>
                        <a href='edit_pustakawan.php'><img src='img_upload/".$_SESSION['image']."'class='img-circle' alt='User Image' style='width:100px; height:100px;'></a>
                        </div>
                        <div class='d-flex justify-content-center info'>
                        <p class='text-center'>".$nama."<br>
                        ".$id."
                        ".$akses."</p>
                        </div>"
                    ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pustakawan.php">
                        Transaksi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_pustakawan.php">
                        Pustakawan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_siswa.php">
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="data_buku.php">
                        Data Buku<span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_penerbit.php">
                        Data Penerbit
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-link" href="laporan_all.php" style="background: none;">All</a>
                        <a class="dropdown-item nav-link" href="laporan_transaksi.php" style="background:none;">Transaksi</a>
                        <a class="dropdown-item nav-link" href="laporan_terlambat.php" style="background:none;">Terlambat</a>
                    </div>
                </li>
                </ul>

                <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Saved reports</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <span data-feather="plus-circle"></span>
                </a>
                </h6>
                <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                    </a>
                </li>
                </ul> -->
            </div>
            </nav>


            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                    <h1 class="h3">Data Buku</h1>
                    <!-- Button trigger modal tambah -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#tambah_siswa" style="margin-left:500px; border-radius:50px;">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah_siswa" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form">
                             <form  method="POST" action="action_buku.php" enctype="multipart/form-data">
                                                    <fieldset disabled>
                                                        <div class="form-group">
                                                                <label for="id_buku">ID Buku</label>
                                                                <input type="text" id="id_buku" name="id_buku_tambah" class="form-control" value="<?php echo $_SESSION['id_value'];?>">
                                                                <input type="hidden" name="id_tambah" value="<?php $cucunguk = $_SESSION['id_value'];
                                                                echo $cucunguk?>">
                                                        </div>
                                                    </fieldset>
                                                    <div class="form-group">
                                                                <label for="id_kate">ID Kategori</label>
                                                                <input type="text" id="id_kate" name="id_kate_tambah" class="form-control" placeholder="K001">
                                                        </div>
                                                    <div class="form-group">
                                                            <label for="judul_buk">Judul</label>
                                                            <input type="text" id="judul_buk" name="judul_tambah" class="form-control" placeholder="Judul Buku">
                                                    </div>
                                                    
                                                        <div class="form-group">
                                                                <label for="id_pener">ID Penerbit</label>
                                                                <input type="text" id="id_pener" name="id_penerbit_tambah" class="form-control" placeholder="EG001">
                                                        </div>
                                                    
                                                    <div class="form-group">
                                                            <label for="penulis_buk">Penulis</label>
                                                            <input type="text" id="penulis_buk" name="penulis_tambah" class="form-control" placeholder="Penulis Buku">
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="qty_buk">QTY</label>
                                                            <input type="text" id="qty_buk"name="qty_tambah" class="form-control" placeholder="Jumlah Buku">
                                                    </div>
                                                    <div class="form-group">
                        
                                                        <!-- <div class="custom-file">
                                                        <label class="custom-file-label" for="customFile">Masukan Foto</label>
                                                        <input type="file" class="custom-file-input" id="customFile">    
                                                        </div> -->
                                                            <label for="masukanFoto">Masukan Foto</label>
                                                            <input type="file" name="photo_tambah" class="form-control-file" id="masukanFoto"onchange="document.getElementById('gambar_tambah').src=window.URL.createObjectURL(this.files[0])">
                                                            <img id="gambar_tambah" src="img_upload/<?php echo $row['image']; ?>" height="150" width="100"/>

                                                    </div>
                                                    <div class="form-group">
                                                            <label for="sinopsis_buk">Sinopsis</label>
                                                            <textarea id="sinopsis_buk" name="sinopsis_tambah" class="form-control" placeholder="Sinopsis"></textarea>
                                                    </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary submitBtn" name="btn_tambah" type="submit">Tambah</button>
                            
                                </div>
                            </form> 
                            </div>
                        </div>
                        </div>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="">
                        <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search" style="border-radius:50px;">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" style="border-radius:50px;" name="btn_cari">Search</button>
                    </form>
                </div>  
                    <table class="table table-hover table-dark">

                <thead>
                 
                    <tr>
                    <th scope="col">ID Buku</th>
                    <th scope="col">ID Kategori</th>
                    <th scope="col">Judul</th>
                    <th scope="col">ID Penerbit</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Image</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col">  </th>
                    
                    </tr>

                </thead>
                <?php
                    if(isset($_GET['cari'])){

                        $cari="%".$_GET['cari']."%";
                        
                        $sql = "SELECT * FROM buku WHERE idBuku LIKE :pencarian OR idKategori LIKE :pencarian OR judul LIKE :pencarian OR idPenerbit LIKE :pencarian OR penulis LIKE :pencarian OR qty LIKE :pencarian OR image LIKE :pencarian OR sinopsis LIKE :pencarian";
                        $result=$db->prepare($sql);
                        $result->bindparam(':pencarian',$cari);
                        $result->execute();
                    }else{
                        $sql ="SELECT * FROM buku";			
                        $result=$db->prepare($sql);
                        $result->execute();
                    }

                    
                    
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    

                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row['idBuku']; ?></th>
                    <td><?php echo $row['idKategori']; ?></td>
                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['idPenerbit']; ?></td>
                    <td><?php echo $row['penulis']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo "<img src='img_upload/".$row['image']."' style='width:100px; height:150px;'>" ?></td>
                    <td><?php echo $row['sinopsis']; ?></td>
                    <td>
                       <!-- Button trigger modal edit -->
                       <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php echo $row['idBuku'];?>">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $row['idBuku'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form">
                                        
                        <form method="POST" action="action_buku.php" enctype="multipart/form-data">
                                                
                                                
                                                    <div class="form-group">
                                                            <label for="id_buku">ID Buku</label>
                                                            <input type="text" id="id_buku" disabled="disabled" class="form-control" placeholder="B001" value="<?php echo $row['idBuku']; ?>">
                                                            <input type="hidden" name="id_buku_update" value="<?php echo $row['idBuku']; ?>">
                                                    </div>
                                                
                                                <div class="form-group">
                                                            <label for="id_kate">ID Kategori</label>
                                                            <input type="text" id="id_kate" name="id_kate_update" class="form-control" placeholder="PR001" value="<?php echo $row['idKategori']; ?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="judul_buk">Judul</label>
                                                        <input type="text" id="judul_buk" name="judul_update" class="form-control" placeholder="Judul Buku" value="<?php echo $row['judul']; ?>">
                                                </div>
                                                
                                                    <div class="form-group">
                                                            <label for="id_pener">ID Penerbit</label>
                                                            <input type="text" id="id_pener" name="id_penerbit_update" class="form-control" placeholder="EG001" value="<?php echo $row['idPenerbit']; ?>">
                                                    </div>
                                                
                                                <div class="form-group">
                                                        <label for="penulis_buk">Penulis</label>
                                                        <input type="text" id="penulis_buk"name="penulis_update" class="form-control" placeholder="Penulis Buku"value="<?php echo $row['penulis']; ?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="qty_buk">QTY</label>
                                                        <input type="text" id="qty_buk" name="qty_update" class="form-control" placeholder="Jumlah Buku"value="<?php echo $row['qty']; ?>">
                                                </div>
                                                <div class="form-group">
                    
                                                    <!-- <div class="custom-file">
                                                    <label class="custom-file-label" for="customFile">Masukan Foto</label>
                                                    <input type="file" class="custom-file-input" id="customFile">    
                                                    </div> -->
                                                        <label for="masukanFoto">Masukan Foto</label>
                                                        <input type="file" name="photo_update" class="form-control-file" id="masukanFoto"value="<?php echo $row['image']; ?>" onchange="document.getElementById('gambar').src=window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="gambar" src="img_upload/<?php echo $row['image']; ?>" height="150" width="100"/>
                                                        <input type="hidden" value="<?php $_SESSION['gambar'] = $row['image'];
                                                        echo $_SESSION['gambar']?>" name="awal">
                                                        
                                                </div>
                                                <div class="form-group">
                                                        <label for="sinopsis_buk">Sinopsis</label>
                                                        <textarea id="sinopsis_buk" class="form-control" name="sinopsis_update" placeholder="Sinopsis"><?php echo $row['sinopsis']; ?></textarea>
                                                </div>
                                                
                                                
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" name="btn_delete" >Delete</button>
                                <button type="submit" class="btn btn-primary" name="btn_update">Save changes</button>
                            </div>
                           
                        </form>
                        
                            </div>
                        </div>
                        </div>

                    </td>
                    
                    </tr>
                    
                </tbody>
                <?php
                    }
                    
                ?>
                </table>
            </main>

        </div>
    </div>



    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    


</body>
</html>

<?php
    require_once "koneksi.php";
    $sql="SELECT idBuku FROM buku ORDER BY idBuku DESC LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($row)){
        $angka=1;
    }else{
        $angka=preg_replace('/[^0-9]/','',$row['idBuku']);
        $angka++;
    }

    $formatted_value = "B".sprintf("%03d", $angka);
    $_SESSION['id_value'] = $formatted_value;
?>

