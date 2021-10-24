<?php
    require_once("koneksi.php");

    if(isset($_POST['data_update'])){
        try {
            session_start();

            $id_u= $_SESSION['idPustakawan'];
            $nama_u=$_POST['nama_update'];
            $alamat_u=$_POST['alamat_update'];
            $telpon_u=$_POST['telpon_update'];
            $email_u=$_POST['email_update'];
            $image_file = $_FILES["photo_update"]["name"];
            $size = $_FILES["photo_update"]["size"];
            $type = $_FILES["photo_update"]["type"];
            $temp = $_FILES["photo_update"]["tmp_name"];
            $gatau = $_POST['awal_pustakawan'];
            
            
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
    
            
                $sql="UPDATE pustakawan SET nama=:nama, alamat=:alamat, phone=:telpon, email=:email, image=:photo WHERE idPustakawan= '$id_u'";
                $update_stmt=$db->prepare($sql);
                
                $update_stmt->bindParam(':nama',$nama_u);
                $update_stmt->bindParam(':alamat',$alamat_u);
                $update_stmt->bindParam(':telpon',$telpon_u);
                $update_stmt->bindParam(':email',$email_u);
                $update_stmt->bindParam(':photo',$image_file);
                move_uploaded_file($temp, "img_upload/".$image_file);
                $update_stmt->execute();
                echo "<script>alert('File Update Successfully !')</script>";
                header("location:edit_pustakawan.php");
                
            
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }
    
?>


