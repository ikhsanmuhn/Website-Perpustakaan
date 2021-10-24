<?php
    require_once ("koneksi.php");
    
    if (isset($_POST['btn_tambah']))
	{
        require_once ("koneksi.php");
		try 
		{
            
            
            $nis = $_POST['nis_tambah'];
            $nama = $_POST['nama_tambah'];
            $alamat = $_POST['alamat_tambah'];
            $jurusan = $_POST['jurusan_tambah'];
            $tingkat = $_POST['tingkat_tambah'];
            $kelas = $_POST['kelas_tambah'];
            $telpon = $_POST['telpon_tambah'];
            $email = $_POST['email_tambah'];
 			$image_file = $_FILES['photo_siswa']['name'];
 			$type = $_FILES['photo_siswa']['type'];
 			$size = $_FILES['photo_siswa']['size'];
            $temp = $_FILES['photo_siswa']['tmp_name'];

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
   
     
           


            echo "<script>alert('File Add Successfully !')</script>";
            header("location:data_siswa.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }

    if (isset($_POST['btn_delete_siswa'])) {
        
        
        $nis = $_POST['nis_update'];
        
        $sql = "SELECT * FROM siswa WHERE nis = '$nis'";
        $select_stmt = $db->prepare($sql);
      
        
        $select_stmt -> execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("img_upload/".$row['image']);
        $sql = "DELETE FROM siswa WHERE  nis = '$nis'";
        $delete_stmt=$db->prepare($sql);
        
        $delete_stmt -> execute();
        header("Location:data_siswa.php");
    }

    if (isset($_POST['btn_update_siswa']))
	{
		try 
		{
			
            $nis = $_POST['nis_update'];
            $nama = $_POST['nama_update'];
            $alamat = $_POST['alamat_update'];
            $jurusan = $_POST['jurusan_update'];
            $tingkat = $_POST['tingkat_update'];
            $kelas = $_POST['kelas_update'];
            $telpon = $_POST['telpon_update'];
            $email = $_POST['email_update'];
 			$image_file = $_FILES['photo_update']['name'];
 			$type = $_FILES['photo_update']['type'];
 			$size = $_FILES['photo_update']['size'];
            $temp = $_FILES['photo_update']['tmp_name'];
            $gatau = $_POST['awal_siswa'];

             $path = "img_upload/".$image_file;

             $directory = "img_upload/";


             if ($image_file) {
                if ($type=="image/jpg" || $type=="image/png"|| $type=="image/jpeg" || $type=="image/gif") {
                    if (!file_exists($path)) {
                        if ($size<5000000) {
                            unlink($directory.$gatau);
                            move_uploaded_file($temp, "img_upload/".$image_file);
                        }
                        else{
                            $errorMsg="Your File To large Please Upload 5MB Size";
                        }
                        
                    }
                    else{
                            $errorMsg="File Already Exists ..... Check Upload Folder";
                        }				
                }
                else{
                        $errorMsg="Upload JPG, JPEG, PNG & GIF File Formate ...... CHECK FILE EXTENSION";
                    }
            }
    
            else{
                $image_file=$gatau;
            }

 			
            $sql="UPDATE siswa SET  nama=:nama_ta, alamat=:alamat_ta, jurusan=:jurusan_ta, tingkat=:tingkat_ta, kelas=:kelas_ta, phone=:phone_ta, email=:email_ta, image=:image_ta WHERE nis='$nis'";
            $query=$db->prepare($sql);
            
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


            echo "<script>alert('File Upload Successfully !')</script>";
            header("location:data_siswa.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }

?>