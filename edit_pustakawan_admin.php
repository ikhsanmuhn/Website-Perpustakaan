<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/stylepustakawan.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    <title>Pustakawan</title>
</head>
<body>
<?php
    session_start();
    $gambar=$_SESSION['image']."<br>";
    $id=$_SESSION['idPustakawan'];
    $nama =$_SESSION['username']."<br>";
    $akses = $_SESSION['hakUser']."<br>";


?>
<?php
    require_once("koneksi.php");
    $sql = "SELECT * FROM pustakawan WHERE idPustakawan= '$id'";
    $query = $db->prepare($sql);
    $query->execute();

    while($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['idPustakawan'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $telpon = $row['phone'];
        $email = $row['email'];
        $photoprofil = $row['image'];
    }
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
                    <a class="nav-link" href="data_penerbit_admin.php">
                        Data Penerbit
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
                    <h1 class="h3">Edit Profil</h1>
                </div>
                <form action="action_profil_admin.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <fieldset disabled>
                            <label for="id_pustakawan">ID Pustakawan</label>
                            <?php echo "<input type='text' class='form-control' id='id_pustakawan'  placeholder='".$id."' value='".$id."'>"?>
                            <input type="hidden" name="id_update" value="<?php echo $id; ?>">

                            </fieldset>
                        </div>
                        <div class="form-group col-md-9">
                        <label for="nama_p">Nama</label>
                        <?php echo "<input type='text' class='form-control' id='nama_p' name='nama_update' placeholder='Nama Lengkap' value='".$nama."'>"?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <?php echo "<textarea class='form-control' name='alamat_update' id='alamat' placeholder='Alamat Lengkap'>".$alamat."</textarea>"?>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="telp">No. Telepon</label>
                        <input type="text" class="form-control" name="telpon_update" id="telp" value="<?php echo $telpon;?>">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email_update" value="<?php echo $email;?>">
                        </div>
                    </div>
                    <div class="form-group">
                    
                        <!-- <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Masukan Foto</label>
                        <input type="file" class="custom-file-input" id="customFile">    
                        </div> -->
                            <label for="masukanFoto">Masukan Foto Anda</label>
                            <input type="file" name="photo_update" class="form-control-file" id="masukanFoto"value="<?php echo $photoprofil; ?>" onchange="document.getElementById('gambar_pustakawan').src=window.URL.createObjectURL(this.files[0])"/>
                            <img id="gambar_pustakawan" src="img_upload/<?php echo $photoprofil; ?>" height="150" width="100"/>
                            <input type="hidden" value="<?php $_SESSION['gambar_pustakawan'] = $row['image'];
                            echo $_SESSION['gambar_pustakawan']?>" name="awal_pustakawan">
                            
                    </div>
                    <button type="submit" class="btn btn-primary" name="data_update">Update</button>
                </form>

                </div>
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


