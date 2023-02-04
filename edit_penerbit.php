<?php include 'config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Halaman Edit Penerbit
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

$id = $_GET['id_penerbit'];

if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];
    $telepon = $_POST["telepon"];
    $penerbit = $_POST["penerbit"];
    
    mysqli_query($conn, "UPDATE tbl_penerbit SET nama='$nama', alamat='$alamat', kota='$kota', telepon='$telepon' WHERE id_penerbit='$id'");

    if( mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Data berhasil di update');
        document.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Data gagal di update')</script>";
    }
}
?>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <h1 class="h4 text-gray-900 mb-4">Edit Data Penerbit</h1>
                                <form action="" method="post" class="user">
                                <?php 
                                $result = mysqli_query($conn, "SELECT * FROM tbl_penerbit where id_penerbit='$id'");
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="id_penerbit"
                                         placeholder="ID Penerbit..." value="<?php echo $row['id_penerbit'] ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama"
                                            placeholder="Nama Penerbit..." value="<?php echo $row['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="alamat"
                                            placeholder="Alamat..." value="<?php echo $row['alamat'] ?>" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="kota"
                                            placeholder="Kota..." value="<?php echo $row['kota'] ?>" required>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="telepon"
                                            placeholder="Telepon..." value="<?php echo $row['telepon'] ?>" required>
                                    </div>                                    
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Update</button>
                                    <?php
                                        }
                                    ?>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>