<?php
	if(empty($_GET['action']))
	{
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/layanan.png" width="56" height="53"/></div>
	<b>Form Data Layanan Polindes</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/layanan.png" width="16" height="16" /> Masukan Data Layanan Polindes</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Nama layanan</b></td>
				 <td><input name="data[]" type="text"  size="50" required placeholder="Nama Layanan"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_layanan">
					<input type="hidden" name="nilai_null" value="NULL">
					<input type="hidden" name="halaman" value="?page=layanan">
					<input type="submit" class="button" value="Simpan Data" name="btn-proses">
					<input type="reset" class="button" value="Batal">
				</td>
			</tr>
		</table>
	</form>
	<br>
	<table border="1" width="100%" class="data">
		<th class="data">NO</th>
		<th class="data">NAMA LAYANAN</th>
		<th class="data">AKSI</th>
		<?php
			$sql_layanan = mysql_query("SELECT * FROM tbl_layanan ORDER BY id_layanan DESC");
			$no=0;
			while($data_layanan = mysql_fetch_array($sql_layanan))
			{
				$no++;
		?>
		<tr class="data">
			<td align="center" class="data"><?php echo $no?></td>
			<td class="data"><?php echo $data_layanan['jenis_layanan']?></td>
			<td align="center" class="data">
				<a href="?page=layanan&action=edit&id=<?php echo $data_layanan['id_layanan']?>"><img src="icon/update.png">
				<a href="php/hapus-data.php?id_data=<?php echo $data_layanan['id_layanan']?>&x=id_layanan&y=tbl_layanan&z=?page=layanan" onclick="return confirm('Apakah anda yakin akan menghapus data yang dipilih ?');"><img src="icon/hapus.png"></a>
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
		$id_layanan = $_GET['id'];
		$sql_layanan = mysql_query("SELECT * FROM tbl_layanan WHERE id_layanan='$id_layanan'");
		$data_layanan = mysql_fetch_array($sql_layanan);
?>	
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/layanan.png" width="56" height="53"/></div>
	<b>Form Edit Data Layanan</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/layanan.png" width="16" height="16" /> Masukan Perubahan Data Layanan</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Nama layanan</b></td>
				 <td><input name="data[]" value="<?php echo $data_layanan['jenis_layanan']?>" type="text"  size="50" required placeholder="Nama layanan"/></td>
			</tr>  
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_layanan">
					<input type="hidden" name="id_data" value="<?php echo $id_layanan?>">
					<input type="hidden" name="halaman" value="?page=layanan">
					<input type="submit" class="button" value="Simpan Perubahan" name="btn-proses">
					<a href="?page=layanan"><input type="button" class="button" value="Batal"></a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
	}
?>