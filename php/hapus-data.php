<?php
	include"koneksi.php";
	$id_data = $_GET['id_data'];
	$pk = $_GET['x'];
	$nama_tabel = $_GET['y'];
	$halaman = $_GET['z'];
	$hapus = mysql_query("DELETE FROM $nama_tabel WHERE $pk='$id_data'");
	echo"<script>alert('Data yang Dipilih Berhasil Dihapus..!');location.href=\"../$halaman\";</script>";
?>