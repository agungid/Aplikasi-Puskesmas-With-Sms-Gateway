<?php
	if(empty($_GET['action']))
	{
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/dusun.png" width="56" height="53"/></div>
	<b>Form Data Dusun</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/dusun.png" width="16" height="16" /> Masukan Data Dusun</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Nama Dusun</b></td>
				 <td><input name="data[]" type="text"  size="50" required placeholder="Nama dusun"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_dusun">
					<input type="hidden" name="nilai_null" value="NULL">
					<input type="hidden" name="halaman" value="?page=dusun">
					<input type="submit" class="button" value="Simpan Data" name="btn-proses">
					<input type="reset" class="button" value="Batal">
				</td>
			</tr>
		</table>
	</form>
	<br>
	<table border="1" width="100%" class="data">
		<th class="data">NO</th>
		<th class="data">NAMA DUSUN</th>
		<th class="data">AKSI</th>
		<?php
			$sql_dusun = mysql_query("SELECT * FROM tbl_dusun ORDER BY id_dusun DESC");
			$no=0;
			while($data_dusun = mysql_fetch_array($sql_dusun))
			{
				$no++;
		?>
		<tr class="data">
			<td align="center" class="data"><?php echo $no?></td>
			<td class="data"><?php echo $data_dusun['nama_dusun']?></td>
			<td align="center" class="data">
				<a href="?page=dusun&action=edit&id=<?php echo $data_dusun['id_dusun']?>"><img src="icon/update.png">
				<a href="php/hapus-data.php?id_data=<?php echo $data_dusun['id_dusun']?>&x=id_dusun&y=tbl_dusun&z=?page=dusun" onclick="return confirm('Apakah anda yakin akan menghapus data yang dipilih ?');"><img src="icon/hapus.png"></a>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
<?php
	}
	else
	{
		$id_dusun = $_GET['id'];
		$sql_dusun = mysql_query("SELECT * FROM tbl_dusun WHERE id_dusun='$id_dusun'");
		$data_dusun = mysql_fetch_array($sql_dusun);
?>	
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/dusun.png" width="56" height="53"/></div>
	<b>Form Edit Data Dusun</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/dusun.png" width="16" height="16" /> Masukan Perubahan Data Dusun</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Nama Dusun</b></td>
				 <td><input name="data[]" value="<?php echo $data_dusun['nama_dusun']?>" type="text"  size="50" required placeholder="Nama dusun"/></td>
			</tr>  
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_dusun">
					<input type="hidden" name="id_data" value="<?php echo $id_dusun?>">
					<input type="hidden" name="halaman" value="?page=dusun">
					<input type="submit" class="button" value="Simpan Perubahan" name="btn-proses">
					<a href="?page=dusun"><input type="button" class="button" value="Batal"></a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
	}
?>