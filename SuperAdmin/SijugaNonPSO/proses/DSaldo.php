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
if ($jabatan_valid == 'Super Admin') {
} else {
    header("Location: logout.php");
    exit;
}


$kode_saldo = htmlspecialchars($_POST['kode_saldo']);

		$query = mysqli_query($koneksi,"DELETE FROM list_saldo WHERE kode_saldo = '$kode_saldo'");
		echo "<script>alert('Data Saldo Berhasil Di Hapus'); window.location='../view/VListSaldo';</script>";exit;
	