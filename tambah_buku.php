<?php 
include 'config.php';
include 'navigation.php';

if(isset($_POST["submit"])){
    $id_buku = $_POST["id_buku"];
    $kategori = $_POST["kategori"];
    $nama_buku = $_POST["nama_buku"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $penerbit = $_POST["penerbit"];
    
    mysqli_query($conn, "INSERT INTO tbl_buku VALUES('$id_buku','$nama_buku','$harga','$stok','$kategori','$penerbit')");

    if( mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Data berhasil ditambahkan');
        document.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan')</script>";
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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Data Buku</h1>
                                <form action="" method="post" enctype="multipart/form-data" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="id_buku"
                                            placeholder="ID Buku...">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nama_buku"
                                            placeholder="Nama Buku...">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="kategori">
                                            <option>Pilih Kategori</option>
                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM tbl_kategori");

                                            if (!$result) {
                                                echo mysqli_error($conn);
                                            }

                                            while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $data['id_kategori'] ?>">
                                                <?php echo $data['nama_kategori'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>                                    
                                    <div class="form-group">
                                        <input type="number" min=0 class="form-control form-control-user" name="harga"
                                            placeholder="Harga Buku...">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" min=0 class="form-control form-control-user" name="stok"
                                            placeholder="Stok Buku...">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" aria-label="Default select example" name="penerbit">
                                            <option>Pilih Penerbit</option>
                                            <?php

                                            $result = mysqli_query($conn, "SELECT * FROM tbl_penerbit");

                                            if (!$result) {
                                                echo mysqli_error($conn);
                                            }

                                            while ($data = mysqli_fetch_array($result)) {
                                                ?>
                                            <option value="<?php echo $data['id_penerbit'] ?>">
                                                <?php echo $data['nama'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
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