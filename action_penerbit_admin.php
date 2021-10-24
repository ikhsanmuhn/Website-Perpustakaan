<?php 
require_once ("koneksi.php");
    if (isset($_POST['btn_tambah']))
	{
        require_once ("koneksi.php");
		try 
		{
            session_start();
            
            $id = $_SESSION['id_value_penerbit'];
            $nama = $_POST['nama_tambah'];
            $alamat = $_POST['alamat_tambah'];
            $telpon = $_POST['telpon_tambah'];
            $email = $_POST['email_tambah'];
            

            $sql="INSERT INTO penerbit (idPenerbit, nama, alamat, phone, email) VALUES(:idPenerbit_ta, :nama_ta, :alamat_ta, :telpon_ta, :email_ta)";
            $query=$db->prepare($sql);

            $query->bindparam(':idPenerbit_ta',$id);
            $query->bindparam(':nama_ta',$nama);
            $query->bindparam(':alamat_ta',$alamat);
            $query->bindparam(':telpon_ta',$telpon);
            $query->bindparam(':email_ta',$email);
            
            $query->execute();

            echo "<script>alert('File Add Successfully !')</script>";
            header("location:data_penerbit_admin.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }

    if (isset($_POST['btn_update_pene']))
	{
        require_once ("koneksi.php");
		try 
		{
			
            $id = $_POST['id_update'];
            $nama = $_POST['nama_update'];
            $alamat = $_POST['alamat_update'];
            $telpon = $_POST['telpon_update'];
            $email = $_POST['email_update'];

 			
            $sql="UPDATE penerbit SET  nama=:nama, alamat=:alamat, phone=:telpon, email=:email WHERE idPenerbit='$id'";
            $query=$db->prepare($sql);
            
            
            $query->bindparam(':nama',$nama);
            $query->bindparam(':alamat',$alamat);
            $query->bindparam(':telpon',$telpon);
            $query->bindparam(':email',$email);
            $query->execute();


            echo "<script>alert('File Upload Successfully !')</script>";
            header("location:data_penerbit_admin.php");
 					
 						
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
    }

    if (isset($_POST['btn_delete_pene'])) {
        

        $id = $_POST['id_update'];
        echo $id;
        
        $sql = "DELETE FROM penerbit WHERE idPenerbit= '$id'";
        $delete_stmt=$db->prepare($sql);
        
        $delete_stmt -> execute();
        echo "<script>alert('File Upload Successfully !')</script>";
        header("location:data_penerbit_admin.php");
    }

?>

