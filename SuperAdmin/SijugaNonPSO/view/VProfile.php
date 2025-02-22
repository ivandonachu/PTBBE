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
$nama = $data1['nama'];
$foto_profile = $data1['foto_profile'];
$username = $data1['username'];
if ($jabatan_valid == 'Super Admin') {
} else {
  header("Location: logout.php");
  exit;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 14px">PT BAHUGA BUMI ENERGI</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="DsSijugaNonPSO">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span style="font-size: 17px;">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Menu List Pt -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwox" aria-expanded="true" aria-controls="collapseTwox">
          <i class="fa-solid fa-building"></i>
          <span>List PT</span>
        </a>
        <div id="collapseTwox" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/SuperAdmin/SijugaNonPSO/view/DsSijugaNonPSO">SijugaNonPSO</a>
            <a class="collapse-item" href="/SuperAdmin/SijugaPSO/view/DsSijugaPSO">SijugaPSO</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Menu Keuangan -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa-solid fa-cash-register"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="VPenjualan">Penjualan</a>
            <a class="collapse-item" href="VPembelian">Pembelian</a>
            <a class="collapse-item" href="VListPiutang">List Piutang</a>
            <a class="collapse-item" href="VRiwayatPiutang">Riwayat Piutang</a>
            <a class="collapse-item" href="VLaporanSetoran">Laporan Setoran</a>
            <a class="collapse-item" href="VLaporanInventory">Laporan Inventory</a>
            <a class="collapse-item" href="VReturPenjualan">Retur Penjualan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Menu Pengeeluaran -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesx" aria-expanded="true" aria-controls="collapseUtilitiesx">
          <i class="fa-solid fa-wallet"></i>
          <span>Pengeluaran</span>
        </a>
        <div id="collapseUtilitiesx" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="VKasKecil">Kas Kecil</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Menu Anggota -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
          <i class="fa-solid fa-people-group"></i>
          <span>Customer</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="VListCustomer">List Customer</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Menu Anggota -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa-solid fa-people-group"></i>
          <span>Aset</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="VListKendaraan">List Kendaraan</a>
            <a class="collapse-item" href="VListSaldo">List Saldo</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Menu Pengaturan Akun -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan Akun</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="VListAkun">List Akun</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Informasi Akun -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "$nama"; ?></span><!-- link nama profile -->
                <img class="img-profile rounded-circle" src="/img/foto_profile/<?= $foto_profile; ?>"><!-- link foto profile -->
              </a>
              <!-- Dropdown - Informasi Akun -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="VProfile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container light-style flex-grow-1 container-p-y">

          <h4 class="font-weight-bold py-3 mb-4">
            Account settings
          </h4>


          <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
              <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                  <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                  <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                </div>
              </div>
              <div class="col-md-9">
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="account-general">
                    <?php echo "<form action='../proses/edit_profil' enctype='multipart/form-data' method='POST'>";  ?>
                    <div class="card-body media align-items-center">
                      <img src="/img/foto_profile/<?= $foto_profile; ?>" style="max-height: 150px; " alt="" class="d-block ui-w-80">
                      <div class="media-body ml-4">


                        <input type="file" class="" name='file_profile'>
                        <input type="hidden" name="username" value="<?= $username; ?>">

                      </div>
                    </div>
                    <hr class="border-light m-0">
                    <div class="card-body">
                      <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control mb-1" name="nama" value="<?= $nama; ?> ">
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jabatan</label>
                        <input type="text" class="form-control" value="<?= $jabatan_valid; ?> " disabled>

                      </div>


                    </div>
                  </div>


                  <div class="tab-pane fade" id="account-change-password">
                    <div class="card-body pb-2">
                      <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= $username; ?>" disabled>
                      </div>
                      <div class="form-group">
                        <label class="form-label">password lama</label>
                        <input type="password" name="password_lama" class="form-control">
                      </div>

                      <div class="form-group">
                        <label class="form-label">password baru</label>
                        <input type="password" name="password_baru1" class="form-control">
                      </div>

                      <div class="form-group">
                        <label class="form-label">Konfirmasi password baru</label>
                        <input type="password" name="password_baru2" class="form-control">
                      </div>
                      <small>
                        <ul>
                          <li>password tidak boleh ada spasi</li>
                          <li>minimal password 8 character</li>
                          <li>maksimal password 15 character</li>
                        </ul>
                      </small>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="text-right mt-3">
            <button type="Submit" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
          </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Balcom Solution 2023</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mau Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik Ya jika ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="/index">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor_sb/jquery/jquery.min.js"></script>
  <script src="/vendor_sb/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor_sb/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="/vendor_sb/jquery-easing/jquery.easing.min.js"></script>
  <script src="/bootstrap-select/dist/js/bootstrap-select.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>
  <script src="/js/jquery.dataTables.min.js"></script>
  <script src="/js/dataTables.bootstrap4.min.js"></script>
  <script src="/js/dataTables.buttons.min.js"></script>
  <script src="/js/buttons.bootstrap4.min.js"></script>
  <script src="/js/jszip.min.js"></script>
  <script src="/js/buttons.html5.min.js"></script>
  <!-- Fontawasome-->
  <script src="/js/6bcb3870ca.js" crossorigin="anonymous"></script>


</body>

</html>