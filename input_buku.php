
<?php
    require_once ("koneksi.php");
    
if (isset($_POST['btn_tambah']))
{
    $sql="INSERT INTO buku(idBuku, idKategori, judul, idPenerbit, penulis, qty, image, sinopsis) VAUES(:idBuku, :idKategori, :judul, :idPenerbit, :penulis, :qty, :image, :sinopsis)";
    $image_file = $_FILES['photo_tambah']['name'];
    $type = $_FILES['photo_tambah']['type'];
    $size = $_FILES['photo_tambah']['size'];
    $temp = $_FILES['photo_tambah']['tmp_name'];
    move_uploaded_file($temp, "img_upload/".$image_file);

    $query=$db->prepare($sql);
    $query->execute(array(
    ':idBuku'=> $_POST['id_buku_tambah'],
    ':idKategori'=> $_POST['id_kate_tambah'],
    ':judul'=> $_POST['judul_tambah'],
    ':idPenerbit'=> $_POST['id_penerbit_tambah'],
    ':penulis'=> $_POST['penulis_tambah'],
    ':qty'=> $_POST['qty_tambah'],
    ':image'=> $image_file,
    ':sinopsis'=> $_POST['sinopsis_tambah'],
    ));
}

?>
