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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin</a>
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
                        <a href='edit_pustakawan_admin.php'><img src='img_upload/".$_SESSION['image']."'class='img-circle' alt='User Image' style='width:100px; height:100px;'></a>
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
                    <a class="nav-link" href="pustakawan_admin.php">
                        Transaksi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_pustakawan_admin.php">
                        Pustakawan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_siswa_admin.php">
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_buku_admin.php">
                        Data Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="data_penerbit_admin.php">
                        Data Penerbit<span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="laporan_all_admin.php">All</a>
                        <a class="dropdown-item" href="laporan_transaksi_admin.php">Transaksi</a>
                        <a class="dropdown-item" href="laporan_terlambat_admin.php">Terlambat</a>
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
                    <h1 class="h3">Data Penerbit</h1>
                    <!-- Button trigger modal tambah -->
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" style="margin-left:480px; border-radius:50px;">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Penerbit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form">
                        <form  method="POST" action="action_penerbit_admin.php" enctype="multipart/form-data">
                                                
                                                    <div class="form-group">
                                                            <label for="id_pe">ID Penerbit</label>
                                                            <input type="text" id="id_p" class="form-control" placeholder="P001" value="<?php echo $_SESSION['id_value_penerbit'];?>" disabled="disabled">
                                                            <input type="hidden" name="id_tambah" value="<?php $pene = $_SESSION['id_value_penerbit'];
                                                                echo $pene?>">
                                                    </div>
                                                
                                                <div class="form-group">
                                                        <label for="nama_pe">Nama</label>
                                                        <input type="text" id="nama_pe" name="nama_tambah" class="form-control" placeholder="Nama Penerbit">
                                                </div>
                                                <div class="form-group">
                                                        <label for="alamat_pe">Alamat</label>
                                                        <textarea id="alamat_pe" name="alamat_tambah" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telp_pe">No. Telepon</label>
                                                        <input type="text" id="telp_pe" name="telpon_tambah" class="form-control" placeholder="Telp">
                                                </div>
                                                <div class="form-group">
                                                        <label for="email_pe">Email</label>
                                                        <input type="email" id="email_pe" name="email_tambah" class="form-control" placeholder="Email">
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn_tambah">Tambah</button>
                            </div>
                            </div>
                    </form>
                        </div>
                        </div>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="">
                        <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search" style="border-radius:50px;">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" style="border-radius:50px;" name="btn_cari">Search</button>
                    </form>
                    
                </div>          
                    <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID Penerbit</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telpon</th>
                    <th scope="col">Email</th>
                    <th scope="col"> </th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET['cari'])){

                        $cari="%".$_GET['cari']."%";
                        
                        $sql = "SELECT * FROM penerbit WHERE idPenerbit LIKE :pencarian OR nama LIKE :pencarian OR alamat LIKE :pencarian OR phone LIKE :pencarian OR email LIKE :pencarian";
                        $result=$db->prepare($sql);
                        $result->bindparam(':pencarian',$cari);
                        $result->execute();
                    }else{
                        $sql ="SELECT * FROM penerbit";			
                        $result=$db->prepare($sql);
                        $result->execute();
                    }

                    
                    
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){


                ?>
                    <tr>
                    <th scope="row"><?php echo $row['idPenerbit']; ?></th>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <!-- Button trigger modal edit -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php echo $row['idPenerbit'];?>">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $row['idPenerbit'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Penerbit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form">
                    <form method="POST" action="action_penerbit_admin.php" enctype="multipart/form-data">
                                                
                                                    <div class="form-group">
                                                            <label for="id_pe">ID Penerbit</label>
                                                            <input type="text" id="id_p" class="form-control" placeholder="P001" value="<?php echo $row['idPenerbit']; ?>" disabled="disabled">
                                                            <input type="hidden" name="id_update" value="<?php echo $row['idPenerbit']?>">
                                                    </div>
                                                
                                                <div class="form-group">
                                                        <label for="nama_pe">Nama</label>
                                                        <input type="text" id="nama_pe" name="nama_update" class="form-control" placeholder="Nama Penerbit" value="<?php echo $row['nama']; ?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="alamat_pe">Alamat</label>
                                                        <textarea id="alamat_pe" name="alamat_update" class="form-control" placeholder="Alamat Lengkap" ><?php echo $row['alamat']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telp_pe">No. Telepon</label>
                                                        <input type="text" id="telp_pe" name="telpon_update" class="form-control" placeholder="Telp" value="<?php echo $row['phone']; ?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="email_pe">Email</label>
                                                        <input type="email" id="email_pe" name="email_update" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>">
                                                </div>
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" name="btn_delete_pene">Delete</button>
                                <button type="submit" class="btn btn-primary" name="btn_update_pene">Update</button>
                            </div>
                    </form>
                            </div>
                            
                        </div>
                        </div>

                    </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
            </main>

        </div>
    </div>



    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</body>
</html>

<?php
    require_once "koneksi.php";
    $sql="SELECT idPenerbit FROM penerbit ORDER BY idPenerbit DESC LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($row)){
        $angka=1;
    }else{
        $angka=preg_replace('/[^0-9]/','',$row['idPenerbit']);
        $angka++;
    }

    $formatted_value = "PB".sprintf("%03d", $angka);
    $_SESSION['id_value_penerbit'] = $formatted_value;
?>

