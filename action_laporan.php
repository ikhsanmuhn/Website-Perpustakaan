<?php
    require_once("koneksi.php");
    if(isset($_POST['search']) AND $_POST['start_date'] !="" AND $_POST['end_date'] !=""){
        $from = $_POST['start_date'];
        $to = $_POST['end_date'];

        $query="SELECT t.idTransaksi, t.nis, s.nama, Concat(s.tingkat,' ',s.jurusan,' ',s.kelas)as kelas_nyatu, t.tglPinjam, MONTH(t.tglPinjam), t.qty, t.idPustakawan  FROM siswa s, transaksi t WHERE tglPinjam >=:from AND  tglPinjam<=:to; AND t.nis = s.nis";
        $stmt = $db->prepare($query);
        $stmt->bindParam('from',$from);
        $stmt->bindParam('to',$to);
        $stmt->execute();
        
    }
?>