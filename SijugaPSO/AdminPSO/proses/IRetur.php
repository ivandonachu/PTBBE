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
$tanggal_awal = $_GET['tanggal1'];
$tanggal_akhir = $_GET['tanggal2'];
$tanggal = htmlspecialchars($_POST['tanggal']);
$kode_customer = htmlspecialchars($_POST['kode_customer']);
$qty_3kg = htmlspecialchars($_POST['qty_3kg']);
$keterangan = htmlspecialchars($_POST['keterangan']);


mysqli_query($koneksi, "INSERT INTO retur_penjualan_pso VALUES('','$tanggal','$kode_customer','$qty_3kg','$keterangan')");

echo "<script>alert('Data Returs Berhasil di Input'); window.location='../view/VReturPenjualan?tanggal1=$tanggal_awal&tanggal2=$tanggal_akhir';</script>";
exit;
