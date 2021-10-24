<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/stylelaporan.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    <title>Admin</title>
</head>
<body>
<?php
    session_start();
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
                    <a class="nav-link" href="data_penerbit_admin.php">
                        Data Penerbit
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Laporan<span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-link" href="laporan_all_admin.php" style="background: none;">All</a>
                        <a class="dropdown-item nav-link" href="laporan_transaksi_admin.php" style="background:none;">Transaksi</a>
                        <a class="dropdown-item nav-link active" href="laporan_terlambat_admin.php" style="background:none;">Terlambat</a>
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
                    <h1 class="h3">Laporan Terlambat</h1>
                </div>
                <?php
                    require_once("koneksi.php");
                    if(isset($_POST['search']) AND isset($_POST['tingkat_cari']) !="" AND isset($_POST['jurusan_cari']) !=""){
                        $tingkat2=$_POST['tingkat_cari'];
                        $jurusan2=$_POST['jurusan_cari'];

                        $tingkat="%".$_POST['tingkat_cari']."%";
                        $jurusan="%".$_POST['jurusan_cari']."%";
                        
                        $query="SELECT t.idTransaksi, t.nis, s.nama, Concat(s.tingkat,' ',s.jurusan,' ',s.kelas)as kelas_nyatu, t.tglPinjam, t.qty, t.idPustakawan  FROM siswa s, transaksi t 
                        WHERE t.nis = s.nis AND s.tingkat LIKE :tingkat  AND s.jurusan LIKE :jurusan";
                        $stmt = $db->prepare($query);
                        $stmt->bindparam(':tingkat',$tingkat);
                        $stmt->bindparam(':jurusan',$jurusan);
                        $stmt->execute();
                        $cari = 0;
                    }
                    else{
                        $bulan = date('m');
                        $query = "SELECT t.idTransaksi, t.nis, s.nama, Concat(s.tingkat,' ',s.jurusan,' ',s.kelas)as kelas_nyatu, t.tglPinjam, t.qty, t.idPustakawan  FROM siswa s, transaksi t WHERE t.nis = s.nis";
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $cari = 1;
                    }
                    
                    $bebas=0;
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    
                        $pinjam = $row['tglPinjam'];
                        $date = date('Y-m-d');
                        $count = 0;
                        while($date != $pinjam){
                            $count++;
                            $date  = date('Y-m-d',strtotime('-'.$count.' day'));
                        }
                        $telat = $count-3;
                    if($bebas != 1){
                        
                        $bebas=1;
                    
                ?>

                        <div class="col-md-12 d-flex justify-content-center">
                            <?php
                                if($cari==0){  
                            ?>
                            <h4 style="margin-bottom:30px;">Laporan Keterlambatan Pengembalian Buku <?php echo $tingkat2;?> & <?php echo $jurusan2;?></h4>
                            <?php
                                 }elseif ($cari==1) {
                            ?>
                            <h4 style="margin-bottom:30px;">Laporan Keterlambatan Pengembalian Buku (Semua Kelas & Jurusan)</h4>
                            <?php
                                 }
                            ?>
                        </div>
                        <div class="form">
                    <form method="POST" action="">
                                <div class="form-row">
                                    <label for="inputTingkat" class="col-md-2">Tingkat</label>
                                    <div class="form-group col-md-3">
                                    <select id="inputTingkat" class="form-control" name="tingkat_cari">
                                        <option selected>Pilih...</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    </div>
                                    <label for="inputJurusan" class="col-md-2">Jurusan</label>
                                    <div class="form-group col-md-3">
                                    <select id="inputJurusan" class="form-control" name="jurusan_cari">
                                            <option selected>Pilih...</option>
                                            <option value="RPL">RPL</option>
                                            <option value="SIJA">SIJA</option>
                                            <option value="TEDK">TEDK</option>
                                            <option value="TEI">TEI</option>
                                            <option value="TPTU">TPTU</option>
                                            <option value="TOI">TOI</option>
                                            <option value="IOP">IOP</option>
                                            <option value="MEKA">MEKA</option>
                                            <option value="PFPT">PFPT</option>
                                        </select>
                                    </div>
                                    <button name="search" class="btn btn-outline-secondary my-2 my-sm-0 col-md-2 " type="submit" style="border-radius:50px; height:40px;">Search</button> 
                                </div>
                            </form>
                        </div>
                    
                        
                    <table class="table table-hover table-dark" id="lier">
                <thead>
                    <tr>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas/Jurusan</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Jumlah Buku</th>
                    <th scope="col">Telat (Hari)</th>
                    
                    </tr>
                </thead>
                <?php
                }
                if ($telat>0) {
    
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row['idTransaksi'];?></th>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['kelas_nyatu'];?></td>
                    <td><?php echo $row['tglPinjam'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $telat;?></td>
                    </tr>
                </tbody>
                <?php
                    }}
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