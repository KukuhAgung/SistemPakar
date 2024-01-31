<?php
include ("koneksi.php");
$user = $_POST['nama'];
$jenis = $_POST['jenis'];
$umur = $_POST['umur'];
    session_start(); 
    $_SESSION['nama'] = $user;//nyimpen session nama
    $_SESSION['jenis'] = $jenis; //nyimpen session umur
    $_SESSION['umur'] = $umur; //nyimpen session umur
    $_SESSION['nama_penyakit'] = $hasil; //nyimpen session umur
    header('location:question.php');

?>