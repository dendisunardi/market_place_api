<?php

//Panggil Koneksi
include "../config/koneksi.php";

//Getting values
$id = $_POST['id_prdk'];
$jumlah = $_POST['jumlah'];
$penerima = $_POST['penerima'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$pembayaran = $_POST['pembayaran'];

//Creating an sql query
$sql = "INSERT INTO test (id,jumlah,penerima,alamat,notelp,pembayaran) VALUES ('$id','$jumlah','$penerima','$alamat','$notelp','$pembayaran')";

//Executing query ke database
if(mysqli_query($con,$sql)){
echo 'Sukses Tambah Data';
}else{
echo 'Gagal Tambah Data';
}
//Closing the database
mysqli_close($con);


?>