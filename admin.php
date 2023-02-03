<?php include 'config.php' ?>
<?php include 'navigation.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="tambah_buku.php" class="text-white btn btn-primary text-left rounded-pill">
                <i class="fa fa-plus" aria-hidden="true"></i> 
                <span class="sr-only"></span>Tambah
            </a>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = mysqli_query($conn, "SELECT * FROM tbl_buku as b LEFT JOIN tbl_kategori as k ON b.id_kategori = k.id_kategori LEFT JOIN tbl_penerbit as p ON b.id_penerbit = p.id_penerbit");

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
                            <td>
                                <a type="button" href="edit_buku.php?id_buku=<?php echo $data['id_buku'];?>" class="btn btn-primary btn-circle btn-sm btn-warning"><i class="fa fa-edit"></i></a>                                
                                <a type="button" onclick="return confirm('Apakah yakin data akan di hapus?')" href="hapus_buku.php?id_buku=<?php echo $data['id_buku'];?>" class="btn btn-primary btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Penerbit</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="tambah_penerbit.php" class="text-white btn btn-primary text-left rounded-pill">
                <i class="fa fa-plus" aria-hidden="true"></i> 
                <span class="sr-only"></span>Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Penerbit</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = mysqli_query($conn, "SELECT * FROM tbl_penerbit");

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
                                <?php echo $data['id_penerbit'] ?>
                            </td>
                            <td>
                                <?php echo $data['nama'] ?>
                            </td>
                            <td>
                                <?php echo $data['alamat'] ?>
                            </td>
                            <td>
                                <?php echo $data['kota'] ?>
                            </td>
                            <td>
                                <?php echo $data['telepon'] ?>
                            </td>
                            <td>
                                <a type="button" href="edit_penerbit.php?id_penerbit=<?php echo $data['id_penerbit'];?>" class="btn btn-primary btn-circle btn-sm btn-warning"><i class="fa fa-edit"></i></a>                                
                                <a type="button" onclick="return confirm('Apakah yakin data akan di hapus?')"  href="hapus_penerbit.php?id_penerbit=<?php echo $data['id_penerbit'];?>" class="btn btn-primary btn-circle btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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