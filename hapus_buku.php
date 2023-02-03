<?php

include "config.php";
 
$id = $_GET['id_buku'];
mysqli_query($conn, "DELETE FROM tbl_buku WHERE id_buku = '$id'");

 if(mysqli_affected_rows($conn) > 0) {
	echo "<script>alert('Data berhasil dihapus');
	document.location.href = 'admin.php';</script>";
} else{
	echo "<script>alert('Data gagal di hapus')</script>";
}
?>
 