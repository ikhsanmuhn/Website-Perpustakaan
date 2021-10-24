<?php
require_once ("koneksi.php");
if (isset($_POST['btn_tambah']))
{
    require_once ("koneksi.php");
    try 
    {
        session_start();
        
        $id = $_SESSION['id_value_pustakawan'];
        $nama = $_POST['nama_tambah'];
        $alamat = $_POST['alamat_tambah'];
        $telpon = $_POST['telpon_tambah'];
        $email = $_POST['email_tambah'];
        $image_file = $_FILES['photo_tambah']['name'];
        $type = $_FILES['photo_tambah']['type'];
        $size = $_FILES['photo_tambah']['size'];
        $temp = $_FILES['photo_tambah']['tmp_name'];

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


        $sql="INSERT INTO pustakawan (idPustakawan, nama, alamat, phone, email, image) VALUES(:idPustakawan_ta, :nama_ta, :alamat_ta, :telpon_ta, :email_ta, :image_ta)";
        $query=$db->prepare($sql);

        $query->bindparam(':idPustakawan_ta',$id);
        $query->bindparam(':nama_ta',$nama);
        $query->bindparam(':alamat_ta',$alamat);
        $query->bindparam(':telpon_ta',$telpon);
        $query->bindparam(':email_ta',$email);
        $query->bindparam(':image_ta',$image_file);
        move_uploaded_file($temp, "img_upload/".$image_file);
        $query->execute();

        echo "<script>alert('File Add Successfully !')</script>";
        header("location:data_pustakawan_admin.php");
                 
                     
    } catch (PDOExeption $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['btn_delete'])) {
        
        
    $id = $_POST['id_edit'];
    $sql = "SELECT * FROM pustakawan WHERE idPustakawan = '$id'";
    $select_stmt = $db->prepare($sql);
    $select_stmt -> execute();
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("img_upload/".$row['image']);

    $sql = "DELETE FROM pustakawan WHERE  idPustakawan = '$id'";
    $delete_stmt=$db->prepare($sql);
    $delete_stmt -> execute();
    header("Location:data_pustakawan_admin.php");
}

if (isset($_POST['btn_update']))
	{
		try 
		{
			
            $id = $_POST['id_edit'];
            $nama = $_POST['nama_edit'];
            $alamat = $_POST['alamat_edit'];
            $telpon = $_POST['telpon_edit'];
            $email = $_POST['email_edit'];
            $image_file = $_FILES['photo_edit']['name'];
            $type = $_FILES['photo_edit']['type'];
            $size = $_FILES['photo_edit']['size'];
            $temp = $_FILES['photo_edit']['tmp_name'];
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

 			
            $sql="UPDATE pustakawan SET  nama=:nama_ta, alamat=:alamat_ta, phone=:phone_ta, email=:email_ta, image=:image_ta WHERE idPustakawan='$id'";
            $query=$db->prepare($sql);
            
            $query->bindparam(':nama_ta',$nama);
            $query->bindparam(':alamat_ta',$alamat);
            $query->bindparam(':phone_ta',$telpon);
            $query->bindparam(':email_ta',$email);
            $query->bindparam(':image_ta',$image_file);
            move_uploaded_file($temp, "img_upload/".$image_file);
            $query->execute();


            echo "<script>alert('File Upload Successfully !')</script>";
            header("location:data_pustakawan_admin.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }

?>