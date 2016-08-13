<?php
	include ("../koneksi.php");
	$sql = "DELETE FROM tbluser WHERE id_user='".$_GET['user']."'";
	$result = mysql_query($sql);
	if($result){
	?>
		<script>document.location.href="../index.php?page=listuser"</script>
	<?php
	}
	
	else{
		echo "ERROR".mysql_error();
	}
	
	mysql_close();
?>
