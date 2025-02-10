<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["login"])) {
    header("Location: logout.php");
    exit;
}
$username = $_COOKIE['username'];
$result1 = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$username'");
$data1 = mysqli_fetch_array($result1);
$jabatan_valid = $data1['jabatan'];
if ($jabatan_valid == 'Admin PSO') {
} else {
    header("Location: logout.php");
    exit;
}

$tanggal_awal = $_POST['tanggal1'];
$tanggal_akhir = $_POST['tanggal2'];
$no_retur = htmlspecialchars($_POST['no_retur']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$kode_customer = htmlspecialchars($_POST['kode_customer']);
$qty_3kg = htmlspecialchars($_POST['qty_3kg']);
$keterangan = htmlspecialchars($_POST['keterangan']);



    mysqli_query($koneksi,"UPDATE retur_penjualan_pso SET tanggal = '$tanggal' , kode_customer = '$kode_customer' , qty_3kg = '$qty_3kg' , keterangan = '$keterangan' WHERE no_retur =  '$no_retur'");


  echo "<script>alert('Data Retur Berhasil di Edit'); window.location='../view/VReturPenjualan?tanggal1=$tanggal_awal&tanggal2=$tanggal_akhir';</script>";exit;



     
        

       


  ?>