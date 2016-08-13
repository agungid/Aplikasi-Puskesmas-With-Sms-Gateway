<?php
	if(empty($_GET['action']))
	{
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/ibu_hamil.png" width="56" height="53"/></div>
	<b>Form Data Ibu Hamil</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/ibu_hamil.png" width="16" height="16" /> Masukan Data Ibu Hamil</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				<td><b>Dusun</b></td>
				<td>
					<select name="data[]" required="">
						<option value="" selected="selected">Pilih Dusun</option>
						<?php
							$sql_dusun = mysql_query("SELECT * FROM tbl_dusun ORDER BY id_dusun DESC");
							while($data_dusun = mysql_fetch_array($sql_dusun))
							{
						?>
						<option value="<?php echo $data_dusun['id_dusun']?>"><?php echo $data_dusun['nama_dusun']?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>   
			<tr>
				 <td><b>Nama Pasien</b></td>
				 <td><input name="data[]" type="text"  size="50" required placeholder="Nama Pasien"/></td>
			</tr>
			<tr>
				 <td><b>Nama Suami</b></td>
				 <td><input name="data[]" type="text"  size="50" required placeholder="Nama Suami"/></td>
			</tr>
			<tr>
				<td><b>Alamat</b></td>
				<td><textarea name="data[]" rows="3" cols="20" arequired="" placeholder="Alamat"/></textarea></td>
			</tr>
			<tr>  
				<td><b>No.Telp</b></td>
				<td><input name="data[]" type="text" size="30" required="" placeholder="Nomor Telp" maxlength="15" onKeyPress="return numbersonly(this,event)"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_ibuhamil">
					<input type="hidden" name="nilai_null" value="NULL">
					<input type="hidden" name="halaman" value="?page=ibu_hamil">
					<input type="submit" class="button" value="Simpan Data" name="btn-proses">
					<input type="reset" class="button" value="Batal">
				</td>
			</tr>
		</table>
	</form>
	<br>
	<table border="1" width="100%" class="data">
		<th class="data">NO</th>
		<th class="data">DUSUN</th>
		<th class="data">NAMA PASIEN</th>
		<th class="data">NAMA SUAMI</th>
		<th class="data">ALAMAT</th>
		<th class="data">NO.TELP</th>
		<th class="data">AKSI</th>
		<?php
			$sql_ibuhamil = mysql_query("SELECT * FROM tbl_ibuhamil,tbl_dusun WHERE tbl_ibuhamil.id_dusun = tbl_dusun.id_dusun ORDER BY id_ibuhamil DESC");
			$no=0;
			while($data_ibuhamil = mysql_fetch_array($sql_ibuhamil))
			{
				$no++;
		?>
		<tr class="data">
			<td align="center" class="data"><?php echo $no?></td>
			<td class="data"><?php echo $data_ibuhamil['nama_dusun']?></td>
			<td class="data"><?php echo $data_ibuhamil['nama']?></td>
			<td class="data"><?php echo $data_ibuhamil['nama_suami']?></td>
			<td class="data"><?php echo $data_ibuhamil['alamat']?></td>
			<td class="data"><?php echo $data_ibuhamil['notelp']?></td>
			<td align="center" class="data">
				<a href="?page=ibu_hamil&action=edit&id=<?php echo $data_ibuhamil['id_ibuhamil']?>"><img src="icon/update.png"></a>
				<a href="php/hapus-data.php?id_data=<?php echo $data_ibuhamil['id_ibuhamil']?>&x=id_ibuhamil&y=tbl_ibuhamil&z=?page=ibu_hamil" onclick="return confirm('Apakah anda yakin akan menghapus data yang dipilih ?');"><img src="icon/hapus.png"></a>
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
		$id_ibuhamil = $_GET['id'];
		$sql_ibuhamil = mysql_query("SELECT * FROM tbl_ibuhamil WHERE id_ibuhamil='$id_ibuhamil'");
		$data_ibuhamil = mysql_fetch_array($sql_ibuhamil);
?>	
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/ibu_hamil.png" width="56" height="53"/></div>
	<b>Form Edit Data Ibu Hamil</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/posting.png" width="16" height="16" /> Masukan Perubahan Data Ibu Hamil</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				<td><b>Dusun</b></td>
				<td>
					<select name="data[]" required="">
						<option value="" selected="selected">Pilih Dusun</option>
						<?php
							$sql_dusun = mysql_query("SELECT * FROM tbl_dusun ORDER BY id_dusun DESC");
							while($data_dusun = mysql_fetch_array($sql_dusun))
							{
						?>
						<option value="<?php echo $data_dusun['id_dusun']?>" <?php if($data_ibuhamil['id_dusun']==$data_dusun['id_dusun']){?> selected <?php } ?>><?php echo $data_dusun['nama_dusun']?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>   
			<tr>
				 <td><b>Nama Pasien</b></td>
				 <td><input value="<?php echo $data_ibuhamil['nama']?>" name="data[]" type="text"  size="50" required placeholder="Nama ibuhamil"/></td>
			</tr>
			<tr>
				 <td><b>Nama Suami</b></td>
				 <td><input value="<?php echo $data_ibuhamil['nama_suami']?>" name="data[]" type="text"  size="50" required placeholder="Nama ibuhamil"/></td>
			</tr>
			<tr>
				<td><b>Alamat</b></td>
				<td><textarea name="data[]" rows="3" cols="20" arequired="" placeholder="Alamat"/><?php echo $data_ibuhamil['alamat']?></textarea></td>
			</tr>
			<tr>  
				<td><b>No.Telp</b></td>
				<td><input value="<?php echo $data_ibuhamil['notelp']?>" name="data[]" type="text" size="30" required="" placeholder="Nomor Telp" maxlength="15" onKeyPress="return numbersonly(this,event)"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_ibuhamil">
					<input type="hidden" name="id_data" value="<?php echo $id_ibuhamil?>">
					<input type="hidden" name="halaman" value="?page=ibu_hamil">
					<input type="submit" class="button" value="Simpan Perubahan" name="btn-proses">
					<a href="?page=ibu_hamil"><input type="button" class="button" value="Batal"></a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
	}
?>