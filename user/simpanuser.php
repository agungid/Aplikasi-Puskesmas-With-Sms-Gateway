<?php
	include ("../sambung.php");	
	$nip = $_POST['nip'];
	if(empty($nip)){
		?><script>alert('Data Harus Diisi Sesuai ketentuan, Mohon Ulangi Lagi!');document.location.href="../index.php?page=tmbhuser"</script><?
	}else{
	$max=mysql_query("select max(kode_admin) from user");
	$hasilmax=mysql_fetch_array($max);
	$idmax=$hasilmax[0]+1;
	$sql = "INSERT INTO user VALUES ('$idmax',
								'$_POST[nip]',
								'$_POST[level]',
								'$_POST[nama]',
								'$_POST[password]')";
	
	$result = mysql_query($sql);
	
	if($result){
	?>
        <script>alert('Data Telah Ditambahkan!');document.location.href="../index.php?page=tmbhuser"</script>;
	<?php
	}
	
	else{
		echo "ERROR".mysql_error();
	}
	}
	mysql_close();
?>
