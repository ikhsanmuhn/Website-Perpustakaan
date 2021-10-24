<?php
require_once ("koneksi.php");


if (isset($_POST['btn_update']))
	{
		try 
		{
			
            $id = $_POST['id_buku_update'];
            $id_kate = $_POST['id_kate_update'];
            $judul_buk = $_POST['judul_update'];
            $id_pene = $_POST['id_penerbit_update'];
            $penulis_buk = $_POST['penulis_update'];
            $qty_buk = $_POST['qty_update'];
            $sinopsis_buk = $_POST['sinopsis_update'];
 			$image_file = $_FILES['photo_update']['name'];
 			$type = $_FILES['photo_update']['type'];
 			$size = $_FILES['photo_update']['size'];
             $temp = $_FILES['photo_update']['tmp_name'];
            $gatau = $_POST['awal'];

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

 			
            $sql="UPDATE buku SET  idKategori=:idKategori, judul=:judul, idPenerbit=:idPenerbit, penulis=:penulis, qty=:qty, image=:image, sinopsis=:sinopsis WHERE idBuku='$id'";
            $query=$db->prepare($sql);
            
            $query->bindparam(':idKategori',$id_kate);
            $query->bindparam(':judul',$judul_buk);
            $query->bindparam(':idPenerbit',$id_pene);
            $query->bindparam(':penulis',$penulis_buk);
            $query->bindparam(':qty',$qty_buk);
            $query->bindparam(':image',$image_file);
            $query->bindparam(':sinopsis',$sinopsis_buk);
            move_uploaded_file($temp, "img_upload/".$image_file);
            $query->execute();


            echo "<script>alert('File Upload Successfully !')</script>";
            header("location:data_buku_admin.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }


    if (isset($_POST['btn_delete'])) {

        $id = $_POST['id_buku_update'];
        $sql = "SELECT * FROM buku WHERE idBuku= '$id'";
        $select_stmt = $db->prepare($sql);
        
        $select_stmt -> execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        unlink("img_upload/".$row['image']);
        $sql = "DELETE FROM buku WHERE idBuku= '$id'";
        $delete_stmt=$db->prepare($sql);
        
        $delete_stmt -> execute();
        header("location:data_buku_admin.php");
    }



    if (isset($_POST['btn_tambah']))
	{
        require_once ("koneksi.php");
		try 
		{
            session_start();
            
            $id = $_SESSION['id_value'];
            $id_kate = $_POST['id_kate_tambah'];
            $judul_buk = $_POST['judul_tambah'];
            $id_pene = $_POST['id_penerbit_tambah'];
            $penulis_buk = $_POST['penulis_tambah'];
            $qty_buk = $_POST['qty_tambah'];
            $sinopsis_buk = $_POST['sinopsis_tambah'];
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

 			
            $sql="INSERT INTO buku (idBuku, idKategori, judul, idPenerbit, penulis, qty, image, sinopsis) VALUES(:idBuku_ta, :idKategori_ta, :judul_ta, :idPenerbit_ta, :penulis_ta, :qty_ta, :image_ta, :sinopsis_ta)";
            $query=$db->prepare($sql);

            $query->bindparam(':idBuku_ta',$id);
            $query->bindparam(':idKategori_ta',$id_kate);
            $query->bindparam(':judul_ta',$judul_buk);
            $query->bindparam(':idPenerbit_ta',$id_pene);
            $query->bindparam(':penulis_ta',$penulis_buk);
            $query->bindparam(':qty_ta',$qty_buk);
            $query->bindparam(':image_ta',$image_file);
            $query->bindparam(':sinopsis_ta',$sinopsis_buk);
            move_uploaded_file($temp, "img_upload/".$image_file);
            $query->execute();
   
     
           


            echo "<script>alert('File Add Successfully !')</script>";
            header("location:data_buku_admin.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }







    
?>

