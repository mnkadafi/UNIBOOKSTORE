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
        Halaman Edit Buku
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

$id = $_GET['id_buku'];

if(isset($_POST["submit"])){
    $id_buku = $_POST["id_buku"];
    $nama_buku = $_POST["nama_buku"];
    $harga = (int)$_POST["harga"];
    $stok = (int)$_POST["stok"];
    $kategori = (int)$_POST["kategori"];
    $penerbit = $_POST["penerbit"];

    var_dump($id_buku);
    var_dump($nama_buku);
    var_dump($harga);
    var_dump($stok);
    var_dump($kategori);
    var_dump($penerbit);
    
    mysqli_query($conn, "UPDATE tbl_buku SET nama_buku='$nama_buku', harga=$harga, stok=$stok, id_kategori=$kategori, id_penerbit='$penerbit' WHERE id_buku='$id'");

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
                                <h1 class="h4 text-gray-900 mb-4">Edit Data Buku</h1>
                                <form action="" method="post" class="user">
                                <?php 
                                $result = mysqli_query($conn, "SELECT * FROM tbl_buku where id_buku='$id'");
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="id_buku" value="<?php echo $row['id_buku'] ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama_buku" value="<?php echo $row['nama_buku'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="kategori" required>
                                            <option>Pilih Kategori</option>
                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM tbl_kategori");

                                            if (!$result) {
                                                echo mysqli_error($conn);
                                            }

                                            while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $data['id_kategori'] ?>" <?php echo ($data['id_kategori'] == $row['id_kategori']) ? 'selected' : ''; ?>>
                                                <?php echo $data['nama_kategori'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" name="harga" value="<?php echo $row['harga'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" name="stok" value="<?php echo $row['stok'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="penerbit" required>
                                            <option>Pilih Penerbit</option>
                                            <?php

                                            $result = mysqli_query($conn, "SELECT * FROM tbl_penerbit");

                                            if (!$result) {
                                                echo mysqli_error($conn);
                                            }

                                            while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $data['id_penerbit'] ?>" <?php echo ($data['id_penerbit'] == $row['id_penerbit']) ? 'selected' : ''; ?>>
                                                <?php echo $data['nama'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
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