<?php
	if(empty($_GET['action']))
	{
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/pemeriksaan.png" width="56" height="53"/></div>
	<b>Form Data Pemeriksaan Ibu Hamil</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/pemeriksaan.png" width="16" height="16" /> Masukan Data Pemeriksaan Ibu Hamil</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="50%" >
			<tr>
				<td><b>Pilih Pasien Ibu Hamil</b></td>
				<td>
					<select name="data[]" required="">
						<option value="" selected="selected">Pilih Nama Pasien</option>
						<?php
							$sql_ibuhamil = mysql_query("SELECT * FROM tbl_ibuhamil ORDER BY nama ASC");
							while($data_ibuhamil = mysql_fetch_array($sql_ibuhamil))
							{
						?>
						<option value="<?php echo $data_ibuhamil['id_ibuhamil']?>"><?php echo $data_ibuhamil['nama']." (".$data_ibuhamil['nama_suami'].")"?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>   
			<tr>
				 <td><b>Tanggal Periksa</b></td>
				 <td><input name="data[]" type="date"  size="50" required=""/></td>
			</tr>
			<tr>
				 <td><b>Tanggal Periksa Ulang</b></td>
				 <td><input name="data[]" type="date"  size="50" required=""/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="data[]" value="0">
					<input type="hidden" name="nama_tabel" value="tbl_pemeriksaan">
					<input type="hidden" name="nilai_null" value="NULL">
					<input type="hidden" name="halaman" value="?page=pemeriksaan">
					<input type="submit" class="button" value="Simpan Data" name="btn-proses">
					<input type="reset" class="button" value="Batal">
				</td>
			</tr>
		</table>
	</form>
	<br>
	<table border="1" width="100%" class="data">
		<th class="data">NO</th>
		<th class="data">NAMA PASIEN</th>
		<th class="data">TANGGAL PERIKSA</th>
		<th class="data">TANGGAL PERIKSA ULANG</th>
		<th class="data">AKSI</th>
		<?php
			$sql_pemeriksaan = mysql_query("SELECT * FROM tbl_pemeriksaan,tbl_ibuhamil WHERE tbl_pemeriksaan.id_ibuhamil = tbl_ibuhamil.id_ibuhamil ORDER BY tbl_pemeriksaan.id_pemeriksaan DESC");
			$no=0;
			while($data_pemeriksaan = mysql_fetch_array($sql_pemeriksaan))
			{
				$no++;
		?>
		<tr class="data">
			<td align="center" class="data"><?php echo $no?></td>
			<td class="data"><?php echo $data_pemeriksaan['nama']?></td>
			<td class="data"><?php echo $data_pemeriksaan['tgl_periksa']?></td>
			<td class="data"><?php echo $data_pemeriksaan['tgl_periksa_ulang']?></td>
			<td align="center" class="data">
				<a href="?page=pemeriksaan&action=edit&id=<?php echo $data_pemeriksaan['id_pemeriksaan']?>"><img src="icon/update.png"></a>
				<a href="php/hapus-data.php?id_data=<?php echo $data_pemeriksaan['id_pemeriksaan']?>&x=id_pemeriksaan&y=tbl_pemeriksaan&z=?page=pemeriksaan" onclick="return confirm('Apakah anda yakin akan menghapus data yang dipilih ?');"><img src="icon/hapus.png"></a>
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
		$id_pemeriksaan = $_GET['id'];
		$sql_pemeriksaan = mysql_query("SELECT * FROM tbl_pemeriksaan WHERE id_pemeriksaan='$id_pemeriksaan'");
		$data_pemeriksaan= mysql_fetch_array($sql_pemeriksaan);
?>	
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/pemeriksaan.png" width="56" height="53"/></div>
	<b>Form Edit Data Pemeriksaan Ibu Hamil</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/pemeriksaan.png" width="16" height="16" /> Masukan Perubahan Data Pemeriksaan Ibu Hamil</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="60%" >
			<tr>
				<td><b>Nama Pasien Ibu Hamil</b></td>
				<td>
					<select name="data[]" required="">
						<option value="" selected="selected">Pilih Nama Pasien</option>
						<?php
							$sql_ibuhamil = mysql_query("SELECT * FROM tbl_ibuhamil ORDER BY id_ibuhamil DESC");
							while($data_ibuhamil = mysql_fetch_array($sql_ibuhamil))
							{
						?>
						<option value="<?php echo $data_ibuhamil['id_ibuhamil']?>" <?php if($data_ibuhamil['id_ibuhamil']==$data_pemeriksaan['id_ibuhamil']){?> selected <?php } ?>><?php echo $data_ibuhamil['nama']?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>   
			<tr>
				 <td><b>Tanggal Periksa</b></td>
				 <td><input value="<?php echo $data_pemeriksaan['tgl_periksa']?>" name="data[]" type="date"  size="50" required /></td>
			</tr>
			<tr>
				 <td><b>Tanggal Periksa Ulang</b></td>
				 <td><input value="<?php echo $data_pemeriksaan['tgl_periksa_ulang']?>" name="data[]" type="date"  size="50" required /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_pemeriksaan">
					<input type="hidden" name="id_data" value="<?php echo $id_pemeriksaan?>">
					<input type="hidden" name="halaman" value="?page=pemeriksaan">
					<input type="submit" class="button" value="Simpan Perubahan" name="btn-proses">
					<a href="?page=pemeriksaan"><input type="button" class="button" value="Batal"></a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
	}
?>