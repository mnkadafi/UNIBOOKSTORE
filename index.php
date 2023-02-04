<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Halaman Home
    </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<?php
include 'navigation.php';

if(isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div class="row">
            <div class="col-xl-12">
                <div class="float-right">
                <form action="index.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-0 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control border-1 medium" name="keyword" placeholder="Cari Buku..." id="keyword" aria-label="Search" aria-describedby="basic-addon2" value="<?php if(isset($_POST['keyword'])) { echo $keyword; } ?>">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>                            
                        </div>
                    </div>
                </form>
                </div>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form action="index.php" class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>                           
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Buku</th>
                            <th>Kategori</th>
                            <th>Nama Buku</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if(isset($_POST['keyword'])){
                            $keyword = $_POST['keyword'];
                            $result = mysqli_query($conn, "SELECT * FROM tbl_buku as b LEFT JOIN tbl_kategori as k ON b.id_kategori = k.id_kategori LEFT JOIN tbl_penerbit as p ON b.id_penerbit = p.id_penerbit WHERE b.nama_buku like '%".$keyword."%'");
                        } else {
                            $result = mysqli_query($conn, "SELECT * FROM tbl_buku as b LEFT JOIN tbl_kategori as k ON b.id_kategori = k.id_kategori LEFT JOIN tbl_penerbit as p ON b.id_penerbit = p.id_penerbit");
                        }

                        if (!$result) {
                            echo mysqli_error($conn);
                        }

                        $no = 1;
                        while ($data = mysqli_fetch_array($result)) {
                            ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $data['id_buku'] ?>
                            </td>
                            <td>
                                <?php echo $data['nama_kategori'] ?>
                            </td>
                            <td>
                                <?php echo $data['nama_buku'] ?>
                            </td>
                            <td>
                                <?php echo number_format($data['harga']) ?>
                            </td>
                            <td>
                                <?php echo number_format($data['stok']) ?>
                            </td>
                            <td>
                                <?php echo $data['nama'] ?>
                            </td>
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include 'footer.php' ?>