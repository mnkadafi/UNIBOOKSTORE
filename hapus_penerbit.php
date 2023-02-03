<?php

include "config.php";
 
$id = $_GET['id_penerbit'];
mysqli_query($conn, "DELETE FROM tbl_penerbit WHERE id_penerbit = '$id'");

 if(mysqli_affected_rows($conn) > 0) {
	echo "<script>alert('Data berhasil dihapus');
	document.location.href = 'admin.php';</script>";
} else{
	echo "<script>alert('Data gagal di hapus')</script>";
}
?>
 