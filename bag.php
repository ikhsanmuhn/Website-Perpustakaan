<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/stylebag.css">
    <link rel="stylesheet" type="text/css" href="fonts/montserrat/stylesheet.css"> <!-- font -->
    <title>BAG | SISWA</title>
</head>
<body>
<?php
    session_start();
    require_once "koneksi.php";
    $tran="SELECT idTransaksi FROM transaksi ORDER BY idTransaksi DESC LIMIT 1";
    $sak = $db->prepare($tran);
    $sak->execute();
    $si=$sak->fetch(PDO::FETCH_ASSOC);

    if(empty($si)){
        $angka=1;
    }else{
        $angka=preg_replace('/[^0-9]/','',$si['idTransaksi']);
        $angka++;
    }

    $formatted_value = "TR".sprintf("%04d", $angka);
?>
    <div class="container-fluid">
        <div class="col-md-8 form_siswa">
            <div class="form">
                <a href="siswa.php" ><img class="bag" src="img/back.png" style="margin-bottom:30px; width: 50px; heightL 50px;"></a>
                <h3>01 Form Siswa</h3>
<form class="data" action="action_close.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputNis">NIS</label>
                        <input type="text" class="form-control" id="inputNis" placeholder="Nomor Induk Siswa" name="input_nis">
                        </div>
                        <div class="form-group col-md-8">
                        <label for="inputNama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="inputNama" placeholder="Nama Lengkap" name="input_nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAlamat">Alamat</label>
                        <textarea class="form-control" id="inputAlamat" rows="3" placeholder="Masukan Alamat Lengkap" name="input_alamat"></textarea>
                        <!-- <input type="text" class="form-control" id="inputAlamat" placeholder="Alamat Lengkap"> -->
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputJurusan">Jurusan</label>
                        <select id="inputJurusan" class="form-control" name="input_jurusan">
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
                        <select id="inputTingkat" class="form-control" name="input_tingkat">
                            <option selected>Pilih...</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputKelas">Kelas</label>
                        <select id="inputKelas" class="form-control" name="input_kelas">
                            <option selected>Pilih...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputTelp">No.Telephone</label>
                        <input type="text" class="form-control" id="inputTelp" placeholder="Nomor Telephone" name="input_telpon">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Masukan Email" name="input_email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Masukan Foto</label>
                            <input type="file" class="custom-file-input" id="customFile">    
                            </div> -->
                                <label for="masukanFoto">Masukan Foto Anda</label>
                                <input type="file" class="form-control-file" id="masukanFoto" name="input_photo" onchange="document.getElementById('gambar').src=window.URL.createObjectURL(this.files[0])"/>
                                
                        </div>
                        <div class="form-group col-md-6">
                            <img id="gambar" src="img_upload/<?php echo $row['image']; ?>" height="150" width="100"/>
                        </div>
                    </div>
                
                    <button name="btn_submit" type="submit" class="btn btn-primary" style="width:100%;">
                                 Submit
                    </button>
            </div>
</form>
        </div>
        <div class="col-md-4 chart">
            <div class="buku">
                <h3>02 Buku Pinjaman</h3>
                <!-- <div class="card-deck buku-2">
                    <div class="card" style="width: 100px;">
                        <img class="card-img-top" src="img/c++.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">QTY : 1</p>
                        </div>  
                    </div>
                    <div class="card" style="width: 100px;">
                        <img class="card-img-top" src="img/c++.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">QTY : 1</p>
                        </div>  
                    </div>
                </div> -->
                <?php
                    require_once("koneksi.php");
                    
                   

                    $sql="SELECT SUM(qty) AS jumlah FROM bag ";
                    $bismilah=$db->prepare($sql);
                    $bismilah->execute();
                    
                    $bisa = $bismilah->fetch(PDO::FETCH_ASSOC);
                    
                    $count = $bisa['jumlah'];
            
                    if($count >2){
                        echo "<script>alert('Bag Penuh !')</script>";
                        $eskiel="DELETE FROM bag WHERE id=3;";
                        $ciknya=$db->prepare($eskiel);
                        $ciknya->execute();
                    }
                
                   
                        $sql="SELECT * FROM bag ";
                        $result=$db->prepare($sql);
                        $result->execute();
                            
                    
                    $i=0;
                    while($i < $count){
                        $row = $result->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="kontainer-buku">
                    <form action="action_close.php" method="POST">
                    <button name="btn_close" type="submit" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="id_buku" value="<?php echo $row['id']?>">
                    </form>
                    <img src="img_upload/<?php echo $row['gambar'];?>" style="width: 150px; height: 225px; border-radius: 25px;">
                    
                        <!-- <input type="number" class="form-control" style="width:80%; background-color: #e4ecec; border: 1px solid #e4ecec;"> -->
                        <input type="text" class="form-control" style="width:80%; background-color: #e4ecec; border: 1px solid #e4ecec;" value="QTY : <?php echo $row['qty'];?>" disabled="disabled">
                        <input type="hidden" value="<?php echo $row['qty'];?>" disabled="disabled" name="input_quanty">
                        
                    
                </div>
                <?php
                    $i++;}
                ?>
               <div class="peminjaman col-md-12">
                   
                        <fieldset disabled>
                            <div class="form-group">
                                <label for="disabledTextInput">Tanggal Peminjaman</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="<?php $tgl=date('d-m-Y');echo $tgl;?>">
                                
                            </div>
                            <div class="form-group">
                                <label for="disabledTextInput">Tanggal Pengembalian</label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="<?php $tgl=date('d-m-Y',strtotime('+3 day'));echo $tgl;?>">
                                
                            </div>
                        </fieldset>

                        
                        

                            <!-- Button trigger modal -->
                            <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" style="width:100%; margin-top:20px">
                                 Checkout
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Checkout Peminjaman Buku</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form">
                    <form action="action_close.php" method="POST" enctype="multipart/form-data">
                                        
                                        <?php
                                            require_once("koneksi.php");

                                            $sql="SELECT * FROM bag";
                                            $bisa=$db->prepare($sql);
                                            $bisa->execute();
                                            $rowc = $bisa->rowCount();
                                            echo "<input type='hidden' value='".$rowc."' name='rowkon'>";
                                            while($row = $bisa->fetch(PDO::FETCH_ASSOC)){
                                                
                                            
                                        ?>
                                        <div class="kontainer-modal">
                                                    <img src="img_upload/<?php echo $row['gambar'];?>" style="width: 150px; height: 225px; border-radius: 25px;">
                                                    <input type="text" class="form-control" style="width:80%; background-color: #e4ecec; border: 1px solid #e4ecec;" value="QTY : <?php echo $row['qty'];?>" disabled="disabled">
                                                    
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <input type="hidden" name="input_pinjam" value="<?php $tgl=date('Y-m-d');echo $tgl;?>">
                                        <input type="hidden" name="input_pengembalian" value="<?php $tgl=date('Y-m-d',strtotime('+3 day'));echo $tgl;?>">
                                        <div class="form-group">
                                            <label for="id_transaksi">ID Transaksi</label>
                                            <input type="text" id="id_transaksi" class="form-control text-center" value="<?php echo $formatted_value;?>" disabled="disabled">
                                            <input type="hidden" name="input_idTransaksi" value="<?php echo $formatted_value;?>">
                                        </div>
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label for="disabledTextInput">Tanggal Peminjaman</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="<?php $tgl=date('Y-m-d');echo $tgl;?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledTextInput">Tanggal Pengembalian</label>
                                                <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="<?php $tgl=date('Y-m-d',strtotime('+3 day'));echo $tgl;?>">                
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="btn_pinjam_akhir">Pinjam</button>
                                </div>
                    </form>
                                </div>
                            </div>
                            </div>
                </div>
                
            </div>
            
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    
</body>
</html>


