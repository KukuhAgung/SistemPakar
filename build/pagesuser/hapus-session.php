<?php
session_start();
include "koneksi.php";

$nama_konsultan = $_SESSION['nama'];
$jenis_anjing = $_SESSION['jenis'];
$umur_anjing = $_SESSION['umur'];
$hasil = $_SESSION['nama_penyakit'];


$sql2 = "INSERT INTO tb_konsultan (nama_konsultan, jenis_anjing, umur_anjing, hasil) VALUES ('$nama_konsultan', '$jenis_anjing', '$umur_anjing', '$hasil')";

unset($_SESSION['nama']);
unset($_SESSION['jenis']);
unset($_SESSION['umur']);
unset($_SESSION['nama_penyakit']);

if (mysqli_query($connect, $sql2)) {
    header('location:index.php');
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($connect);
}
?>