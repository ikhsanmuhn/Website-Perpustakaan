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
    $gambar=$_SESSION['image'];
    $id=$_SESSION['idPustakawan'];
    $nama =$_SESSION['username'];
    $akses = $_SESSION['hakUser'];

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
                        ".$id."</br>
                        ".$akses."</p>
                        </div>"
                    ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="pustakawan.php">
                        Transaksi<span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    
                    
                        <a id='data_pustakawan' class='nav-link' href='data_pustakawan.php'>
                        Pustakawan
                        </a>
                       
                    
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_siswa.php">
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_buku.php">
                        Data Buku
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
                    <h1 class="h3">Transaksi Peminjaman & Pengembalian</h1>
                    <form class="form-inline my-2 my-lg-0"  method="GET" action="">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Id Transaksi" name="cari" aria-label="Search" style="border-radius:50px;">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="btn_cari" style="border-radius:50px;">Search</button>
                    </form>
                </div>
                <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Kelas/Jurusan</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Jumlah Buku</th>
                    <th scope="col">Status Verifikasi</th>
                    <th scope="col"> </th>
                    </tr>
                </thead>
                <?php
                    require_once ("koneksi.php");
                    if(isset($_GET['cari'])){

                        $cari="%".$_GET['cari']."%";
                        
                        
                        $sql = "SELECT t.idTransaksi, t.nis, s.nama, Concat(s.tingkat,' ',s.jurusan,' ',s.kelas)as kelas_nyatu, t.tglPinjam, t.qty, t.idPustakawan FROM siswa s, transaksi t WHERE t.nis = s.nis AND idTransaksi LIKE :pencarian";
                        $result=$db->prepare($sql);
                        $result->bindparam(':pencarian',$cari);
                        $result->execute();
                        
                    }else{
                        $sql="SELECT t.idTransaksi, t.nis, s.nama, Concat(s.tingkat,' ',s.jurusan,' ',s.kelas)as kelas_nyatu, t.tglPinjam, t.qty, t.idPustakawan  FROM siswa s, transaksi t WHERE t.nis = s.nis";
                        $result=$db->prepare($sql);
                        $result->execute();
                        $result->execute();
                        
                    }

                       
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row['idTransaksi'];?></th>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama'];?></td>
                    <td><?php echo $row['kelas_nyatu'];?></td>
                    <td><?php echo $row['tglPinjam'];?></td>
                    <td><?php echo $row['qty'];?></td>
                    <td><?php echo $row['idPustakawan'];?></td>
                    <td>
                                                    <!-- Button trigger verified -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php echo $row['idTransaksi'];?>">
                            Verifikasi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $row['idTransaksi'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Verifikasi Peminjaman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form">
                        <form method="POST" action="action_transaksi.php" enctype="multipart/form-data">
                                                
                                                    <div class="form-group">    
                                                        <input type="text" id="id_transaksi"  class="form-control" placeholder="TR001" value="<?php echo $row['idTransaksi'];?>" disabled="disabled">
                                                        <input type="hidden" name="idTransaksi" value="<?php echo $row['idTransaksi'];?>">
                                                    </div>
                                                
                                                
                                                <div class="form-group">
                                                        <label for="nis">NIS</label>
                                                        <input type="text" id="nis" name="nisTransaksi" class="form-control" placeholder="Nomor Induk Siswa" value="<?php echo $row['nis'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="nama">Nama Siswa</label>
                                                        <input type="text" id="nama" name="namaTransaksi" class="form-control" placeholder="Nama Siswa" value="<?php echo $row['nama'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="kelas">Kelas/Jurusan</label>
                                                        <input type="text" id="kelas" name="kelasTransaksi" class="form-control" placeholder="Kelas dan Jurusan" value="<?php echo $row['kelas_nyatu'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="minjam">Tanggal Peminjaman</label>
                                                        <input type="date" id="minjam" name="tglTransaksi" class="form-control" placeholder="Tgl Peminjaman" value="<?php echo $row['tglPinjam'];?>">
                                                </div>
                                                
                                                <?php echo $row['qty'];if($row['qty'] == 1){
                                                        $aidi = $row['idTransaksi'];
                                                      $qw="SELECT dt.idBuku, b.judul FROM buku b, detailtransaksi dt WHERE idTransaksi = '$aidi' AND dt.idBuku=b.idBuku";
                                                      $er=$db->prepare($qw);
                                                      $er->execute();
                                                      
                                                ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="jmlh" class="col-md-6">Jumlah Peminjaman</label>
                                                        
                                                        <div class="col-md-6">
                                                        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio1" value="1" checked>
                                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio2" value="2">
                                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    $wow = $er->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                <div class="form-group">
                                                    <input type="text" id="id_buku" class="form-control" placeholder="Kode Buku" name="idBuku_transaksi" value="<?php echo $wow['idBuku'];?>">   
                                                    <fieldset disabled><input type="text" id="judul_buku" class="form-control" placeholder="Judul BUku" value="<?php echo $wow['judul'];?>" ></fieldset>
                                                </div>
                                                        <?php 
                                                        }elseif($row['qty'] == 2){
                                                            $aidi = $row['idTransaksi'];
                                                            $qw="SELECT dt.idBuku, b.judul FROM buku b, detailtransaksi dt WHERE idTransaksi = '$aidi' AND dt.idBuku=b.idBuku";
                                                            $er=$db->prepare($qw);
                                                            $er->execute();
                                                        
                                                        ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="jmlh" class="col-md-6">Jumlah Peminjaman</label>
                                                        
                                                        <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio1" value="1">
                                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio2" value="2" checked>
                                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>  
                                                </div>
                                                <?php
                                                    $mn=1;
                                                    while($mn <=$row['qty']){
                                                        $wow = $er->fetch(PDO::FETCH_ASSOC);
                                                        $mn++;
                                                ?>
                                                <div class="form-group">
                                                    <input type="text" id="id_buku" class="form-control" placeholder="Kode Buku" name="idBuku_transaksi" value="<?php echo $wow['idBuku'];?>">   
                                                    <fieldset disabled><input type="text" id="judul_buku" class="form-control" placeholder="Judul BUku" value="<?php echo $wow['judul'];?>" ></fieldset>
                                                </div>
                                                <?php 
                                                    }}
                                                ?>
                                                    <fieldset disabled><input type="text" id="judul_buku" class="form-control" placeholder="P001" value="<?php echo $id;?>"></fieldset>
                                                    <input type="hidden" name="id_pustakawan"  value="<?php echo $id;?>">
                                                
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn_verifikasi">Verifikasi</button>
                            </div>
                </form>
                            </div>
                        </div>
                        </div>

                        <!-- Button trigger edit -->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php $edit = "E".sprintf($row['idTransaksi']);echo $edit; ?>">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $edit;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Peminjaman</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form">
                        <form method="POST" action="action_transaksi.php" enctype="multipart/form-data">
                                                
                                                    <div class="form-group">    
                                                        <input type="text" id="id_transaksi"  class="form-control" placeholder="TR001" value="<?php echo $row['idTransaksi'];?>" disabled="disabled">
                                                        <input type="hidden" name="idTransaksi" value="<?php echo $row['idTransaksi'];?>">
                                                    </div>
                                                
                                                
                                                <div class="form-group">
                                                        <label for="nis">NIS</label>
                                                        <input type="text" id="nis" name="nisTransaksi" class="form-control" placeholder="Nomor Induk Siswa" value="<?php echo $row['nis'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="nama">Nama Siswa</label>
                                                        <input type="text" id="nama" name="namaTransaksi" class="form-control" placeholder="Nama Siswa" value="<?php echo $row['nama'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="kelas">Kelas/Jurusan</label>
                                                        <input type="text" id="kelas" name="kelasTransaksi" class="form-control" placeholder="Kelas dan Jurusan" value="<?php echo $row['kelas_nyatu'];?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="minjam">Tanggal Peminjaman</label>
                                                        <input type="date" id="minjam" name="tglTransaksi" class="form-control" placeholder="Tgl Peminjaman" value="<?php echo $row['tglPinjam'];?>">
                                                </div>
                                                
                                                <?php echo $row['qty'];
                                                        if($row['qty'] == 1){
                                                            $aidi = $row['idTransaksi'];
                                                      $qw="SELECT dt.idBuku, b.judul FROM buku b, detailtransaksi dt WHERE idTransaksi = '$aidi' AND dt.idBuku=b.idBuku";
                                                      $er=$db->prepare($qw);
                                                      $er->execute();
                                                      
                                                ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="jmlh" class="col-md-6">Jumlah Peminjaman</label>
                                                        
                                                        <div class="col-md-6">
                                                        
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio1" value="1" checked>
                                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio2" value="2">
                                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    $wow = $er->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                <div class="form-group">
                                                    <input type="text" id="id_buku" class="form-control" placeholder="Kode Buku" name="idBuku_transaksi" value="<?php echo $wow['idBuku'];?>">   
                                                    <fieldset disabled><input type="text" id="judul_buku" class="form-control" placeholder="Judul BUku" value="<?php echo $wow['judul'];?>" ></fieldset>
                                                </div>
                                                        <?php 
                                                        }elseif($row['qty'] == 2){

                                                            $aidi = $row['idTransaksi'];
                                                            $qw="SELECT dt.idBuku, b.judul FROM buku b, detailtransaksi dt WHERE idTransaksi = '$aidi' AND dt.idBuku=b.idBuku";
                                                            $asep=$db->prepare($qw);
                                                            $asep->execute();
                                                        
                                                        ?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label for="jmlh" class="col-md-6">Jumlah Peminjaman</label>
                                                        
                                                        <div class="col-md-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio1" value="1">
                                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jumlahTransaksi" id="inlineRadio2" value="2" checked>
                                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>  
                                                </div>
                                                <?php
                                                    $ab=1;
                                                    while($ab <=$row['qty']){
                                                        $solihin = $asep->fetch(PDO::FETCH_ASSOC);
                                                        $ab++;
                                                ?>
                                                <div class="form-group">
                                                    <input type="text" id="id_buku" class="form-control" placeholder="Kode Buku" name="idBuku_transaksi" value="<?php echo $solihin['idBuku'];?>">   
                                                    <fieldset disabled><input type="text" id="judul_buku" class="form-control" placeholder="Judul BUku" value="<?php echo $solihin['judul'];?>" ></fieldset>
                                                </div>
                                                <?php 
                                                    }}
                                                ?>
                                                    <fieldset disabled><input type="text" id="judul_buku" class="form-control" placeholder="P001" value="<?php echo $id;?>"></fieldset>
                                                    <input type="hidden" name="id_pustakawan"  value="<?php echo $id;?>">
                                                
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" name="btn_delete">Delete</button>
                                <button type="submit" class="btn btn-primary" name="btn_update">Update</button>
                            </div>
                        </form> 
                            </div>
                        </div>
                        </div>
                                                    

                                                    <!-- Button trigger modal detail-->
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php $edit = "D".sprintf($row['idTransaksi']);echo $edit; ?>">
                            Detail
                        </button>

                        <!-- Modal -->
                        <div class="modal fade dark" id="<?php $edit = "D".sprintf($row['idTransaksi']);echo $edit; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Pengembalian Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form">
                            <form method="POST" action="action_transaksi.php" enctype="multipart/form-data">
                                        <?php
                                            require_once ("koneksi.php");
                                            $id_rudet = $row['idTransaksi'];
                                            $dolar="SELECT idTransaksi, tglPinjam, qty FROM transaksi WHERE idTransaksi='$id_rudet'";
                                            $money=$db->prepare($dolar);
                                            $money->execute();
                                            $yow = $money->fetch(PDO::FETCH_ASSOC);
                                            $kuantiti = $yow['qty'];
                                           

                                        ?>
                                                
                                                    <div class="form-group">
                                                        <input type="text" id="disabledTextInput" class="form-control text-center" placeholder="Disabled input" value="<?php echo $yow['idTransaksi']?>" disabled="disabled">
                                                        <input type="hidden" id="judul_buku"  value="<?php echo $yow['idTransaksi'];?>" name="gg">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                                        <input type="date" id="tanggal_pinjam" class="form-control" placeholder="Tanggal Pinjam" value="<?php echo $yow['tglPinjam'];?>">
                                                    </div>
                                                
                                                <div class="form-group">
                                                        <label for="tanggal_kembali">Tanggal Kembali</label>
                                                        <input type="date" id="tanggal_kembali" class="form-control" placeholder="Tanggal Kembali" value="<?php $tgl=date('Y-m-d');echo $tgl;?>">
                                                </div>
                                                <?php
                                                   $pinjam = $yow['tglPinjam'];
                                                   $date = date('Y-m-d');
                                                   $count = 0;
                                                   while($date != $pinjam){
                                                       $count++;
                                                       $date  = date('Y-m-d',strtotime('-'.$count.' day'));
                                                    }
                                                    $telat = $count-3;
                                                    $denda = $telat*1000;

                                                    require_once ("koneksi.php");
                                                    $rt="SELECT dt.idBuku, b.judul FROM detailtransaksi dt, buku b WHERE dt.idTransaksi='$id_rudet' AND dt.idBuku = b.idBuku";
                                                    $rw=$db->prepare($rt);
                                                    $rw->execute();
                                                    
                                                    while($kelurahan = $rw->fetch(PDO::FETCH_ASSOC)){

                                                ?>

                                                <div class="form-group">
                                                        <label for="judul_buku">Judul Buku</label>
                                                        <div class="form-check">
                                                            <div class="row">
                                                            <input class="form-check-input position-static col-md-1" type="checkbox" id="blankCheckbox" value="1" aria-label="...">
                                                            <input type="text" id="judul_buku" class="form-control col-md-11" placeholder="Judul Buku" value="<?php echo $kelurahan['judul'] ?>">
                                                            <input type="hidden" id="judul_buku"  value="<?php echo $kelurahan['idBuku']; ?>" name="id_buku_detail">
                                                            <input type="hidden" id="judul_buku"  value="<?php echo $kuantiti; ?>" name="kuantiti">
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <fieldset disabled><input type="text" id="terlambat" class="form-control" placeholder="Terlambat : 0 Hari" value="Terlambat : <?php echo $telat; ?> Hari"></fieldset>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                                <fieldset disabled>
                                                <div class="form-group">
                                                        <label for="denda">Jumlah Denda</label>
                                                        <input type="text" id="denda" class="form-control" placeholder="IDR. 3000" value="IDR.<?php echo $denda;?>">
                                                </div>
                                                </fieldset>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn_kembali">Update</button>
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