<?php
    require_once("koneksi.php");

    if(isset($_POST['btn_close'])){

        $idBuku = $_POST['id_buku'];
        $sql="DELETE FROM bag WHERE id='$idBuku';";
        $result=$db->prepare($sql);
        $result->execute();

        $kuery="ALTER TABLE bag DROP id;";
        $mikil=$db->prepare($kuery);
        $mikil->execute();
        
        $kueri="ALTER TABLE bag ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
        $mikilatuh=$db->prepare($kueri);
        $mikilatuh->execute();

        header('location:bag.php');

    }


    if(isset($_POST['pinjam'])){

                        
        $idBuku = $_POST['id_buku_pinjam'];
        $qty = $_POST['id_qty_pinjam'];
        $img = $_POST['id_gambar_pinjam'];
        echo $qty;

        $sql="INSERT INTO bag(idBuku, gambar,qty) VALUES(:idBuku, :img, :qty)";
        $query=$db->prepare($sql);
        $query->bindparam(':idBuku',$idBuku);
        $query->bindparam(':img',$img);
        $query->bindparam(':qty',$qty);
        $query->execute();

        $kuery="ALTER TABLE bag DROP id;";
        $mikil=$db->prepare($kuery);
        $mikil->execute();
        
        $kueri="ALTER TABLE bag ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;";
        $mikilatuh=$db->prepare($kueri);
        $mikilatuh->execute();

        header('location:bag.php');
    }  

    if (isset($_POST['btn_submit']))
	{
        require_once ("koneksi.php");
		try 
		{
            
            
            $nis = $_POST['input_nis'];
            $nama = $_POST['input_nama'];
            $alamat = $_POST['input_alamat'];
            $jurusan = $_POST['input_jurusan'];
            $tingkat = $_POST['input_tingkat'];
            $kelas = $_POST['input_kelas'];
            $telpon = $_POST['input_telpon'];
            $email = $_POST['input_email'];
 			$image_file = $_FILES['input_photo']['name'];
 			$type = $_FILES['input_photo']['type'];
 			$size = $_FILES['input_photo']['size'];
            $temp = $_FILES['input_photo']['tmp_name'];

             $path = "img_upload/".$image_file;

             if (empty($name)) {
                $errorMsg="Please Enter Name";
            }
            else if (empty($image_file)) {
                $errorMsg="Please Select Image";
            }
            else if ($type=="image/jpg"||$type=='image/png'||$type=='image/jpeg'||$type=='image/gif')
            {
                if (!file_exists($path)) 
                {
                    if ($size < 5000000) 
                    {
                        move_uploaded_file($temp, "img_upload/".$image_file);
                    }
                    else
                    {
                        $errorMsg="Your File To large Please Upload 5MB Size";
                    }
                }
                else
                {
                    $errorMsg="File Already Exists ..... Check Upload Folder";
                } 				
            }
            else
            {
                    $errorMsg="Upload JPG, JPEG, PNG & GIF File Formate ...... CHECK FILE EXTENSION";
                }

 			
            $sql="INSERT INTO siswa (nis, nama, alamat, jurusan, tingkat, kelas, phone, email, image) VALUES(:nis_ta, :nama_ta, :alamat_ta, :jurusan_ta, :tingkat_ta, :kelas_ta, :phone_ta, :email_ta, :image_ta)";
            $query=$db->prepare($sql);

            $query->bindparam(':nis_ta',$nis);
            $query->bindparam(':nama_ta',$nama);
            $query->bindparam(':alamat_ta',$alamat);
            $query->bindparam(':jurusan_ta',$jurusan);
            $query->bindparam(':tingkat_ta',$tingkat);
            $query->bindparam(':kelas_ta',$kelas);
            $query->bindparam(':phone_ta',$telpon);
            $query->bindparam(':email_ta',$email);
            $query->bindparam(':image_ta',$image_file);
            move_uploaded_file($temp, "img_upload/".$image_file);
            $query->execute();
            
            session_start();
            $_SESSION['nis'] = $nis;
            echo "<script>alert('File Add Successfully !')</script>";
            header("location:bag.php");
 					
             
             
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }

    if(isset($_POST['btn_pinjam_akhir'])){

        $rowc = $_POST['rowkon'];
        $rowc2 = $_POST['rowkon'];
        session_start();
        $nis_transaksi = $_SESSION['nis'];
        $id_transaksi = $_POST['input_idTransaksi'];
        $date_peminjaman = $_POST['input_pinjam'];
        
        $rumah="SELECT qty FROM bag";
        $ke=$db->prepare($rumah);
        $ke->execute();
        $qty = $ke->rowCount();
        
        
       
        echo $rowc;
        echo $qty;
        $sql="INSERT INTO transaksi (idTransaksi, nis, tglPinjam, qty) VALUES(:id, :nis_t, :tgl, :qty_t)";
        $hasil=$db->prepare($sql);
        $hasil->bindparam(':id',$id_transaksi);
        $hasil->bindparam(':nis_t',$nis_transaksi);
        $hasil->bindparam(':qty_t',$qty);
        $hasil->bindparam(':tgl',$date_peminjaman);
        $hasil->execute();

        $i=1;
        if($rowc == 2){

            
            while( $i <= $rowc){
                $lsq="SELECT * FROM bag WHERE id='$i'";
                $ah=$db->prepare($lsq);
                $ah->execute();
                while($wor = $ah->fetch(PDO::FETCH_ASSOC)){
                    $idBuku1 = $wor['idBuku'];
                }
                
                
                $status=0;

                $otaknya="INSERT INTO detailtransaksi (idTransaksi, idBuku, status) VALUES(:id, :id_buk, :status_t)";
                $ilang=$db->prepare($otaknya);
                $ilang->bindparam(':id',$id_transaksi);
                $ilang->bindparam(':id_buk',$idBuku1);
                $ilang->bindparam(':status_t',$status);
                $ilang->execute();   
                
                $i++;
            }
            
        }
        else{
            $lsq="SELECT * FROM bag WHERE id='$i'";
            $ah=$db->prepare($lsq);
            $ah->execute();
            $wor = $ah->fetch(PDO::FETCH_ASSOC);
            $idBuku2 = $wor['idBuku'];
            $qty = $wor['qty'];
            $status=0;

            $otaknya="INSERT INTO detailtransaksi (idTransaksi, idBuku, status) VALUES(:id, :id_buk, :status_t)";
            $ilang=$db->prepare($otaknya);
            $ilang->bindparam(':id',$id_transaksi);
            $ilang->bindparam(':id_buk',$idBuku2);
            $ilang->bindparam(':status_t',$status);
            $ilang->execute();
        }


        echo "<script>alert('Terimakasih')</script>";
        header("location:bag.php");
    }
?>