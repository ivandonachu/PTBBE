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
$tanggal_awal = htmlspecialchars($_POST['tanggal1']);
$tanggal_akhir = htmlspecialchars($_POST['tanggal2']);
$no_retur = htmlspecialchars($_POST['no_retur']);

	

		$query = mysqli_query($koneksi,"DELETE FROM retur_penjualan_pso WHERE no_retur = '$no_retur'");



	
		echo "<script>alert('Data Retur Berhasil di Hapus'); window.location='../view/VReturPenjualan?tanggal1=$tanggal_awal&tanggal2=$tanggal_akhir';</script>";exit;
	