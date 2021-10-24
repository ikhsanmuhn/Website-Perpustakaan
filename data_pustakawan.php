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
                    <a class="nav-link active" href="data_pustakawan.php">
                        Pustakawan<span class="sr-only">(current)</span>
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
                    <h1 class="h3">Data Pustakawan</h1>
                    <form class="form-inline my-2 my-lg-0" method="GET" action="">
                        <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search" style="border-radius:50px;">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="btn_cari" style="border-radius:50px;">Search</button>
                    </form>
                    
                </div>          
                    <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">ID Pustakawan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telpon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET['cari'])){

                        $cari="%".$_GET['cari']."%";
                        
                        $sql = "SELECT * FROM pustakawan WHERE idPustakawan LIKE :pencarian OR nama LIKE :pencarian OR alamat LIKE :pencarian OR phone LIKE :pencarian OR email LIKE :pencarian";
                        $result=$db->prepare($sql);
                        $result->bindparam(':pencarian',$cari);
                        $result->execute();
                    }else{
                        $sql ="SELECT * FROM pustakawan";			
                        $result=$db->prepare($sql);
                        $result->execute();
                    }

                    
                    
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){


                   

                ?>
                    <tr>
                    <th scope="row"><?php echo $row['idPustakawan']; ?></th>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo "<img src='img_upload/".$row['image']."' style='width:100px; height:150px;'>" ?></td>
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