


<?php
   session_start();
   require_once("koneksi.php");
   $admin = 'admin';
   $username = $_POST['username'];
   $pass = md5($_POST['pw']);
   $query = $db->prepare("SELECT * FROM login WHERE username = ?");
   $query->execute(array($username));
   $hasil = $query->fetch();
   if($query->rowCount() == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } 
   else {

     if($pass <> $hasil['password']) 
     {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } 
     else {

        if($hasil['username'] == $admin){
            $id=$hasil['idPustakawan'];
            $sql="SELECT * FROM pustakawan WHERE idPustakawan = '$id'";
            $select_stmt=$db->prepare($sql);
            $select_stmt->execute(array($username));
            $row=$select_stmt->fetch();
            $_SESSION['image'] = $row['image'];
            $_SESSION['idPustakawan'] = $id;
            $_SESSION['username'] = $hasil['username'];
            $_SESSION['hakUser'] = $hasil['hakUser'];
            header('location:pustakawan_admin.php');
        }
        else{
            $id=$hasil['idPustakawan'];
            $sql="SELECT * FROM pustakawan WHERE idPustakawan = '$id'";
            $select_stmt=$db->prepare($sql);
            $select_stmt->execute();
            $row=$select_stmt->fetch();
            $_SESSION['image'] = $row['image'];
            $_SESSION['idPustakawan'] = $id;
            $_SESSION['username'] = $hasil['username'];
            $_SESSION['hakUser'] = $hasil['hakUser'];
            header('location:pustakawan.php');

        }
        
        
        
     }
   }
?>