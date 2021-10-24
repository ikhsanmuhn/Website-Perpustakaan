<?php
    require_once ("koneksi.php");
    if (isset($_POST['btn_verifikasi'])){

        $id_t = $_POST['idTransaksi'] ;
        $nama_t = $_POST['namaTransaksi'] ;
        $nis_t = $_POST['nisTransaksi'] ;
        $kelas_t = $_POST['kelasTransaksi'] ;
        $tgl_t = $_POST['tglTransaksi'] ;
        $jumlah_t = $_POST['jumlahTransaksi'] ;
        $idBuku_t = $_POST['idBuku_transaksi'] ;
        $idPustakawan_t = $_POST['id_pustakawan'] ;
        

        $sql="UPDATE transaksi SET idTransaksi=:id_t, nis=:nis_t, idPustakawan=:idPustakawan_t, tglPinjam=:tgl_t, qty=:jumlah_t WHERE idTransaksi='$id_t'";
        $query=$db->prepare($sql);

        $query->bindparam(':id_t',$id_t);
        $query->bindparam(':nis_t',$nis_t);
        $query->bindparam(':idPustakawan_t',$idPustakawan_t);
        $query->bindparam(':tgl_t',$tgl_t);
        $query->bindparam(':jumlah_t',$jumlah_t);
        $query->execute();

        $low="UPDATE buku SET  qty=qty-:jumlah_t WHERE idBuku='$idBuku_t'";
        $kquery=$db->prepare($low);

        $kquery->bindparam(':jumlah_t',$jumlah_t);
        $kquery->execute();

        $sql = "DELETE FROM BAG ";
        $delete_stmt=$db->prepare($sql);
        $delete_stmt -> execute();

        echo "<script>alert('File Upload Successfully !')</script>";
        header("location:pustakawan.php");

    }
    if (isset($_POST['btn_update'])){

        $id_t = $_POST['idTransaksi'] ;
        $nama_t = $_POST['namaTransaksi'] ;
        $nis_t = $_POST['nisTransaksi'] ;
        $kelas_t = $_POST['kelasTransaksi'] ;

        $pecah= explode(" ", $kelas_t);
        
        $tingkat= $pecah[0];
        $jurusan= $pecah[1];
        $kelas= $pecah[2];

        $tgl_t = $_POST['tglTransaksi'] ;
        $jumlah_t = $_POST['jumlahTransaksi'] ;
        $idBuku_t = $_POST['idBuku_transaksi'] ;
        $idPustakawan_t = $_POST['id_pustakawan'] ;
        
        $sql="UPDATE siswa SET nis=:nis_t, nama=:nama_t, tingkat=:tingkat_t, jurusan=:jurusan_t, kelas=:kelas_t WHERE nis='$nis_t'";
        $query=$db->prepare($sql);

        $query->bindparam(':nis_t',$nis_t);
        $query->bindparam(':nama_t',$nama_t);
        $query->bindparam(':tingkat_t',$tingkat);
        $query->bindparam(':jurusan_t',$jurusan);
        $query->bindparam(':kelas_t',$kelas);
        $query->execute();

        $mysql="UPDATE transaksi SET idTransaksi=:id_t, nis=:nis_t, tglPinjam=:tgl_t, qty=:jumlah_t WHERE idTransaksi='$id_t'";
        $myquery=$db->prepare($mysql);

        $myquery->bindparam(':id_t',$id_t);
        $myquery->bindparam(':nis_t',$nis_t);
        $myquery->bindparam(':tgl_t',$tgl_t);
        $myquery->bindparam(':jumlah_t',$jumlah_t);
        $myquery->execute();
        
        $yousql="UPDATE detailtransaksi SET idBuku=:idBuku_t WHERE idTransaksi='$id_t'";
        $youquery=$db->prepare($yousql);

        $youquery->bindparam(':idBuku_t',$idBuku_t);
        $youquery->execute();


        echo "<script>alert('File Upload Successfully !')</script>";
        header("location:pustakawan.php");

    }

    if (isset($_POST['btn_delete'])) {

        $id_t = $_POST['idTransaksi'];

        $sql2 = "DELETE FROM detailtransaksi WHERE idTransaksi= '$id_t'";
        $delete_stmt2=$db->prepare($sql2);
        $delete_stmt2 -> execute();
        

        $sql = "DELETE FROM transaksi WHERE idTransaksi= '$id_t'";
        $delete_stmt=$db->prepare($sql);
        $delete_stmt -> execute();
        header("Location:pustakawan.php");
        
    }

    if (isset($_POST['btn_kembali'])) {

        $id_t = $_POST['gg'];
        $idBuku_t = $_POST['id_buku_detail'];
        $jumlah_t = $_POST['kuantiti'];
        
        echo $id_t;
        $low="UPDATE buku SET  qty=qty+:jumlah_t WHERE idBuku='$idBuku_t'";
        $kquery=$db->prepare($low);
        $kquery->bindparam(':jumlah_t',$jumlah_t);
        $kquery->execute();

        $ff = "DELETE FROM detailtransaksi WHERE idTransaksi= '$id_t'";
        $delete_stmtff=$db->prepare($ff);
        $delete_stmtff -> execute();    
        
        $sql = "DELETE FROM transaksi WHERE idTransaksi= '$id_t'";
        $delete_stmt=$db->prepare($sql);
        $delete_stmt -> execute();

        
        header("Location:pustakawan.php");
    }

?>