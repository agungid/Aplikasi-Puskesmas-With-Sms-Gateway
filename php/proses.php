<?php
	include"koneksi.php";
	$tombol = $_POST['btn-proses'];
	if($tombol=="Masuk Aplikasi")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = mysql_query("SELECT * FROM tbl_user WHERE username ='$username' AND password='$password'");
		if($data = mysql_fetch_array($sql))
		{
			session_start();
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['password'] = $data['password'];
			echo"<script>alert('Data Account Anda Benar, Anda Akan Masuk Kehalaman Administrator..!');location.href=\"../index.php\";</script>";
		}
		else
			echo"<script>alert('Login Gagal Data Account Anda Salah, Silahkan Masukkan Data Account Anda dengan Benar..!');location.href=\"../?page=login\";</script>";
	}
	else if($tombol=="Simpan Pengguna Baru")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cek = mysql_query("SELECT * FROM tbl_user WHERE username='$username'");
		if(!$ada = mysql_fetch_array($cek))
		{
			$query_insert = mysql_query("INSERT INTO tbl_user VALUES(NULL,'$username','$password')");
			echo"<script>alert('Pengguna Baru Berhasil Disimpan Kedalam Database..!');location.href=\"../?page=administrator\";</script>";
		}
		else
			echo"<script>alert('Maaf username sudah terdaftar, silahkan ganti username anda..!');location.href=\"../?page=administrator\";</script>";
	}
	else if($tombol=="Simpan Perubahan Akun")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$update = mysql_query("UPDATE tbl_user SET password='$password' WHERE username='$username'");
		session_start();
		session_destroy();
		echo"<script>alert('Perubahan Data Akun Berhasil Disimpan, Anda Akan Keluar Otomatis..!');location.href=\"../index.php\";</script>";
	}
	else if($tombol=="Simpan Data")
	{
		$nilai_null = $_POST['nilai_null'];
		$nama_tabel = $_POST['nama_tabel'];
		$halaman = $_POST['halaman'];
		if($nilai_null!="Kosong")
			$query_insert = "INSERT INTO $nama_tabel VALUES(NULL,";
		else
			$query_insert = "INSERT INTO $nama_tabel VALUES(";
		foreach($_POST['data'] as $x => $id_data)
		{
			$query_insert.="'".ucwords(addslashes($_POST['data'][$x]))."',";
		}
		$query_insert = substr($query_insert,0,strlen($query_insert)-1);
		$query_insert.=")";
		//echo $query_insert;
		$simpan = mysql_query($query_insert);
		echo"<script>alert('Data Baru Berhasil Disimpan Kedalam Database..!');location.href=\"../$halaman\";</script>";
	}
	else if($tombol=="Simpan Perubahan")
	{
		$id_data = $_POST['id_data'];
		$nama_tabel = $_POST['nama_tabel'];
		$halaman = $_POST['halaman'];
		$query_update = "UPDATE $nama_tabel SET ";
		$sql_tabel = mysql_query("SELECT kolom FROM tbl_tabel WHERE nama_tabel='$nama_tabel'");
		$data_tabel= mysql_fetch_array($sql_tabel);
		$kolom = explode(",",$data_tabel['kolom']);
		for($x=1; $x<count($kolom); $x++)
		{
			$query_update.=$kolom[$x]."="."'".ucwords(addslashes($_POST['data'][$x-1]))."',";
		}
		$query_update = substr($query_update,0,strlen($query_update)-1);
		$query_update.="  WHERE ".$kolom[0]."=".$id_data;
		//echo $query_update;
		$update = mysql_query($query_update);
		echo"<script>alert('Perubahan Data Berhasil Disimpan..!');location.href=\"../$halaman\";</script>";
	}
?>