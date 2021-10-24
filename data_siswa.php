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
                    <a class="nav-link active" href="data_siswa.php">
                        Data Siswa<span class="sr-only">(current)</span>
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
                    <h1 class="h3">Data Siswa</h1>
                    <!-- Button trigger modal tambah -->
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#siswa_tambah" style="margin-left:500px; border-radius:50px;">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="siswa_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <form  method="POST" action="action_siswa.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                            <label for="nis_edit">Nomor Induk Siswa</label>
                                                            <input type="text" id="nis_edit" name="nis_tambah" class="form-control" placeholder="181113873">
                                                    </div>
                                                
                                                <div class="form-group">
                                                        <label for="nama">Nama Siswa</label>
                                                        <input type="text" id="nama" name="nama_tambah" class="form-control" placeholder="Nama Siswa">
                                                </div>
                                                <div class="form-group">
                                                        <label for="alamat_edit">Alamat</label>
                                                        <textarea id="alamat_edit" name="alamat_tambah" class="form-control" placeholder="Alamat Lengkap"></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputJurusan">Jurusan</label>
                                                    <select id="inputJurusan" class="form-control" name="jurusan_tambah">
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
                                                    <div class="form-group col-md-4">
                                                    <label for="inputTingkat">Tingkat</label>
                                                    <select id="inputTingkat" class="form-control" name="tingkat_tambah">
                                                        <option selected>Pilih...</option>
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label for="inputKelas">Kelas</label>
                                                    <select id="inputKelas" class="form-control" name="kelas_tambah">
                                                        <option selected>Pilih...</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telp_edit">No. Telepon</label>
                                                        <input type="text" id="telp_edit" class="form-control" placeholder="Telp" name="telpon_tambah">
                                                        
                                                </div>
                                                <div class="form-group">
                                                        <label for="email_edit">Email</label>
                                                        <input type="email" id="email_edit" class="form-control" placeholder="Email" name="email_tambah">
                                                </div>
                                                <div class="form-group">
                    
                                                    <!-- <div class="custom-file">
                                                    <label class="custom-file-label" for="customFile">Masukan Foto</label>
                                                    <input type="file" class="custom-file-input" id="customFile">    
                                                    </div> -->
                                                        <label for="masukanFoto">Masukan Foto Anda</label>
                                                        
                                                        <input type="file" name="photo_siswa" class="form-control-file" id="masukanFoto"onchange="document.getElementById('gambar_tambah').src=window.URL.createObjectURL(this.files[0])">
                                                        <img id="gambar_tambah" src="img_upload/<?php echo $row['image']; ?>" height="150" width="100"/>
                                                
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btn_tambah">Tambah</button>
                            </div>

                </form>
                            </div>
                        </div>
                        </div>
                    <form class="form-inline my-2 my-lg-0"  method="GET" action="">
                        <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search" style="border-radius:50px;">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" name="btn_cari" type="submit" style="border-radius:50px;">Search</button>
                    </form>
                </div>          
                    <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Tingkat</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">  </th>
                    
                    </tr>
                </thead>
                <?php
                    if(isset($_GET['cari'])){

                        $cari="%".$_GET['cari']."%";
                        
                        $sql = "SELECT * FROM siswa WHERE nis LIKE :pencarian OR nama LIKE :pencarian OR alamat LIKE :pencarian OR jurusan LIKE :pencarian OR tingkat LIKE :pencarian OR kelas LIKE :pencarian OR phone LIKE :pencarian OR email LIKE :pencarian OR image LIKE :pencarian";
                        $result=$db->prepare($sql);
                        $result->bindparam(':pencarian',$cari);
                        $result->execute();
                        
                    }else{
                        $sql ="SELECT * FROM siswa";			
                        $result=$db->prepare($sql);
                        $result->execute();
                    }

                    
                    
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        
                        
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $row['nis']; ?></th>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td><?php echo $row['tingkat']; ?></td>
                    <td><?php echo $row['kelas']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo "<img src='img_upload/".$row['image']."' style='width:100px; height:150px;'"?></td>
                    <td>
                       <!-- Button trigger modal edit -->
                       <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#<?php $formatted_value = "S".sprintf($row['nis']);echo $formatted_value; ?>">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $formatted_value; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <form enctype="multipart/form-data" action="action_siswa.php" method="POST">
                                                
                                                    <div class="form-group">
                                                            <label for="nis_edit">Nomor Induk Siswa</label>
                                                            <input type="text" id="nis_edit" name="nis_update"class="form-control" value="<?php echo $row['nis'];?>" disabled="disabled">
                                                            <input type="hidden" name="nis_update" value="<?php
                                                                echo $row['nis'];?>">
                                                    </div>
                                                
                                                <div class="form-group">
                                                        <label for="nama">Nama Siswa</label>
                                                        <input type="text" id="nama"  name="nama_update" class="form-control" placeholder="Nama Siswa" value="<?php echo $row['nama']; ?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="alamat_edit">Alamat</label>
                                                        <textarea id="alamat_edit"  name="alamat_update" class="form-control" placeholder="Alamat Lengkap"><?php echo $row['alamat']; ?></textarea>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                    <label for="inputJurusan">Jurusan</label>
                                                    <select id="inputJurusan" class="form-control"  name="jurusan_update">
                                                        <option selected value="<?php echo $row['jurusan']; ?>"><?php echo $row['jurusan']; ?></option>
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
                                                    <div class="form-group col-md-4">
                                                    <label for="inputTingkat">Tingkat</label>
                                                    <select id="inputTingkat" class="form-control"  name="tingkat_update">
                                                        <option selected value="<?php echo $row['tingkat']; ?>"><?php echo $row['tingkat']; ?></option>
                                                        <option value="X">X</option>
                                                        <option value="XI">XI</option>
                                                        <option value="XII">XII</option>
                                                    </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                    <label for="inputKelas">Kelas</label>
                                                    <select id="inputKelas" class="form-control" name="kelas_update">
                                                        <option selected value="<?php echo $row['kelas']; ?>" ><?php echo $row['kelas']; ?></option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="telp_edit">No. Telepon</label>
                                                        <input type="text" id="telp_edit"  name="telpon_update" class="form-control" placeholder="Telp" value="<?php echo $row['phone']; ?>">
                                                </div>
                                                <div class="form-group">
                                                        <label for="email_edit">Email</label>
                                                        <input type="email" id="email_edit"  name="email_update" class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>">
                                                </div>
                                                <div class="form-group">
                    
                                                    <!-- <div class="custom-file">
                                                    <label class="custom-file-label" for="customFile">Masukan Foto</label>
                                                    <input type="file" class="custom-file-input" id="customFile">    
                                                    </div> -->
                                                        <label for="masukanFoto">Masukan Foto Anda</label>
                                                        <input type="file" name="photo_update" class="form-control-file" id="masukanFoto"value="<?php echo $row['image']; ?>" onchange="document.getElementById('gambar').src=window.URL.createObjectURL(this.files[0])"/>
                                                        <img id="gambar" src="img_upload/<?php echo $row['image']; ?>" height="150" width="100"/>
                                                        <input type="hidden" value="<?php $_SESSION['gambar_siswa'] = $row['image'];
                                                        echo $_SESSION['gambar_siswa']?>" name="awal_siswa">
                                                
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"  class="btn btn-secondary" name="btn_delete_siswa">Delete</button>
                                    <button type="submit" class="btn btn-primary" name="btn_update_siswa">Update</button>
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
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</body>
</html>