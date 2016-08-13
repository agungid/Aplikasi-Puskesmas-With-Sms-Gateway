<?php
	if(empty($_GET['action']))
	{
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/kegiatan.png" width="56" height="53"/></div>
	<b>Form Data Kegiatan</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/kegiatan.png" width="16" height="16" /> Masukan Data Kegiatan</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Nama Kegiatan</b></td>
				 <td><textarea name="data[]" cols="50" rows="5" required placeholder="Kegiatan"/></textarea></td>
			</tr>
			<tr>
				<td align="left"><b>Tanggal Kegiatan</b></td>
				<td><input name="data[]" type="date" size="30" required=""/></td>
			</tr>
			<tr>  
				<td><b>Hari</b></td>
				<td><input name="data[]" type="text" size="30" required="" placeholder="Hari" onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>  
				<td><b>Jam</b></td>
				<td><input name="data[]" type="time" size="30" required="" placeholder="Jam"/></td>
			</tr>
			<tr>  
				<td><b>Tempat</b></td>
				<td><input name="data[]" type="text" size="30" required="" placeholder="Tempat"/></td>
			</tr>
			<tr>
				<td align="left"><b>Tanggal Akan Dikirim</b></td>
				<td><input name="data[]" type="date" size="30" required=""/></td>
			</tr> 
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="data[]" value="0">
					<input type="hidden" name="nama_tabel" value="tbl_kegiatan">
					<input type="hidden" name="nilai_null" value="NULL">
					<input type="hidden" name="halaman" value="?page=kegiatan">
					<input type="submit" class="button" value="Simpan Data" name="btn-proses">
					<input type="reset" class="button" value="Batal">
				</td>
			</tr>
		</table>
	</form>
	<br>
	<table border="1" width="100%" class="data">
		<th class="data">NO</th>
		<th class="data">DETIL KEGIATAN</th>
		<th class="data">TGL KEGIATAN</th>
		<th class="data">HARI</th>
		<th class="data">JAM</th>
		<th class="data">TEMPAT</th>
		<th class="data">TGL KIRIM</th>
		<th class="data">STATUS</th>
		<th class="data">AKSI</th>
		<?php
			$sql_kegiatan = mysql_query("SELECT * FROM tbl_kegiatan ORDER BY id_kegiatan DESC");
			$no=0;
			while($data_kegiatan = mysql_fetch_array($sql_kegiatan))
			{
				$no++;
				if($data_kegiatan['status']==0)
					$status="Belum Dikirim";
				else
					$status="Sudah Dikirim";
		?>
		<tr class="data">
			<td align="center" class="data"><?php echo $no?></td>
			<td class="data"><?php echo $data_kegiatan['isi_kegiatan']?></td>
			<td class="data"><?php echo $data_kegiatan['tgl_kegiatan']?></td>
			<td class="data"><?php echo $data_kegiatan['hari']?></td>
			<td class="data"><?php echo $data_kegiatan['jam']?></td>
			<td class="data"><?php echo $data_kegiatan['tempat']?></td>
			<td class="data"><?php echo $data_kegiatan['tgl_alarm']?></td>
			<td class="data"><?php echo $status?></td>
			<td align="center" class="data">
				<a href="?page=kegiatan&action=edit&id=<?php echo $data_kegiatan['id_kegiatan']?>"><img src="icon/update.png">
				<a href="php/hapus-data.php?id_data=<?php echo $data_kegiatan['id_kegiatan']?>&x=id_kegiatan&y=tbl_kegiatan&z=?page=kegiatan" onclick="return confirm('Apakah anda yakin akan menghapus data yang dipilih ?');"><img src="icon/hapus.png"></a>
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
		$id_kegiatan = $_GET['id'];
		$sql_kegiatan = mysql_query("SELECT * FROM tbl_kegiatan WHERE id_kegiatan='$id_kegiatan'");
		$data_kegiatan = mysql_fetch_array($sql_kegiatan);
?>	
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/kegiatan.png" width="56" height="53"/></div>
	<b>Form Edit Data Kegiatan Polindes</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/posting.png" width="16" height="16" /> Masukan Perubahan Data Kegiatan Polindes</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Nama Kegiatan</b></td>
				 <td><textarea name="data[]" cols="50" rows="5" required placeholder="Kegiatan"/><?php echo $data_kegiatan['isi_kegiatan']?></textarea></td>
			</tr>
			<tr>
				<td align="left"><b>Tanggal Kegiatan</b></td>
				<td><input value="<?php echo $data_kegiatan['tgl_kegiatan']?>" name="data[]" type="date" size="30" required=""/></td>
			</tr>
			<tr>  
				<td><b>Hari</b></td>
				<td><input value="<?php echo $data_kegiatan['hari']?>" name="data[]" type="text" size="30" required="" placeholder="Hari" onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>  
				<td><b>Jam</b></td>
				<td><input value="<?php echo $data_kegiatan['jam']?>" name="data[]" type="time" size="30" required="" placeholder="Jam"/></td>
			</tr>
			<tr>  
				<td><b>Tempat</b></td>
				<td><input value="<?php echo $data_kegiatan['tempat']?>" name="data[]" type="text" size="30" required="" placeholder="Tempat"/></td>
			</tr>
			<tr>
				<td align="left"><b>Tanggal Akan Dikirim</b></td>
				<td><input value="<?php echo $data_kegiatan['tgl_alarm']?>" name="data[]" type="date" size="30" required=""/></td>
			</tr> 
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="data[]" value="<?php echo $data_kegiatan['status']?>">
					<input type="hidden" name="nama_tabel" value="tbl_kegiatan">
					<input type="hidden" name="id_data" value="<?php echo $id_kegiatan?>">
					<input type="hidden" name="halaman" value="?page=kegiatan">
					<input type="submit" class="button" value="Simpan Perubahan" name="btn-proses">
					<a href="?page=kegiatan"><input type="button" class="button" value="Batal"></a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
	}
?>