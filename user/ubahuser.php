<?php
	include ("../koneksi.php");

	$sql = "UPDATE tbluser set 	kode ='$_POST[kode]',
								nip ='$_POST[nip]',
								namalengkap	='$_POST[nama]',
								alamat	='$_POST[almt]',
								tmptlahir ='$_POST[tpt]',
								tgllahir ='$_POST[tgl]',
								jk	='$_POST[jk]',
								agama	='$_POST[agm]',
								pkj	='$_POST[pkj]',
								no_telp	='$_POST[notelp]',
								umur ='$_POST[umur]',
								username ='$_POST[user]',
								password ='$_POST[pass]',
								pin	='$_POST[pin]',
								level ='$_POST[lev]'
								WHERE id_user='$_POST[id]'";
								
	$result = mysql_query($sql);
if($result){
?>
<script>document.location.href="../index.php?page=listuser" </script>
<?php
}

else {
echo "ERROR".mysql_error();
}

mysql_close();
?>
