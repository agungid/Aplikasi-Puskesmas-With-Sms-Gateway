<?php
	if(empty($_GET['action']))
	{
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/kelahiran.png" width="56" height="53"/></div>
	<b>Form Data Kelahiran</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/kelahiran.png" width="16" height="16" /> Masukan Data Kelahiran</h3>	
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
				<td align="left"><b>Tanggal Melahirkan</b></td>
				<td><input name="data[]" type="date" size="30" required=""/></td>
			</tr> 
			<tr>
				<td><b>Jenis Kelamin Bayi</b></td>
				<td>
					<input type="radio" name="data[]" required="" value="Laki-Laki"/>&nbsp;Laki-Laki
					<input type="radio" name="data[]" required="" value="Perempuan"/>&nbsp;Perempuan
				</td>
			</tr>
			<tr>  
				<td><b>Berat Bayi</b></td>
				<td><input name="data[]" type="text" size="20" required="" placeholder="Berat Bayi" /></td>
			</tr>
			<tr>
				<td><b>Proses Kelahiran</b></td>
				<td>
					<select name="data[]" required="">
						<option value="" selected>Pilih Proses Kelahiran</option>
						<option value="Operasi">Operasi</option>
						<option value="Normal">Normal</option>
					</select>
				</td>
			</tr>
			<tr>  
				<td><b>Nama Suami</b></td>
				<td><input name="data[]" type="text" size="50" required placeholder="Nama Suami" onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_kelahiran">
					<input type="hidden" name="nilai_null" value="NULL">
					<input type="hidden" name="halaman" value="?page=kelahiran">
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
		<th class="data">TGL MELAHIRKAN</th>
		<th class="data">JENIS KELAMIN</th>
		<th class="data">BERAT BAYI</th>
		<th class="data">PROSES KELAHIRAN</th>
		<th class="data">NAMA SUAMI</th>
		<th class="data">AKSI</th>
		<?php
			$sql_kelahiran = mysql_query("SELECT * FROM tbl_kelahiran,tbl_dusun WHERE tbl_kelahiran.id_dusun = tbl_dusun.id_dusun ORDER BY id_kelahiran DESC");
			$no=0;
			while($data_kelahiran = mysql_fetch_array($sql_kelahiran))
			{
				$no++;
		?>
		<tr class="data">
			<td align="center" class="data"><?php echo $no?></td>
			<td class="data"><?php echo $data_kelahiran['nama_dusun']?></td>
			<td class="data"><?php echo $data_kelahiran['nama_pasien']?></td>
			<td class="data"><?php echo $data_kelahiran['tgl_melahirkan']?></td>
			<td class="data"><?php echo $data_kelahiran['jk_anak']?></td>
			<td class="data"><?php echo $data_kelahiran['berat']?></td>
			<td class="data"><?php echo $data_kelahiran['proses_kelahiran']?></td>
			<td class="data"><?php echo $data_kelahiran['nama_suami']?></td>
			<td align="center" class="data">
				<a href="?page=kelahiran&action=edit&id=<?php echo $data_kelahiran['id_kelahiran']?>"><img src="icon/update.png">
				<a href="php/hapus-data.php?id_data=<?php echo $data_kelahiran['id_kelahiran']?>&x=id_kelahiran&y=tbl_kelahiran&z=?page=kelahiran" onclick="return confirm('Apakah anda yakin akan menghapus data yang dipilih ?');"><img src="icon/hapus.png"></a>
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
		$id_kelahiran = $_GET['id'];
		$sql_kelahiran = mysql_query("SELECT * FROM tbl_kelahiran WHERE id_kelahiran='$id_kelahiran'");
		$data_kelahiran = mysql_fetch_array($sql_kelahiran);
?>	
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/kelahiran.png" width="56" height="53"/></div>
	<b>Form Edit Data Kelahiran Polindes</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/posting.png" width="16" height="16" /> Masukan Perubahan Data Kelahiran Polindes</h3>	
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
						<option value="<?php echo $data_dusun['id_dusun']?>" <?php if($data_kelahiran['id_dusun']==$data_dusun['id_dusun']){?> selected <?php } ?>><?php echo $data_dusun['nama_dusun']?></option>
						<?php
							}
						?>
					</select>
				</td>
			</tr>   
			<tr>
				 <td><b>Nama Pasien</b></td>
				 <td><input value="<?php echo $data_kelahiran['nama_pasien']?>" name="data[]" type="text"  size="50" required placeholder="Nama kelahiran"/></td>
			</tr>
			<tr>
				<td align="left"><b>Tanggal Melahirkan</b></td>
				<td><input value="<?php echo $data_kelahiran['tgl_melahirkan']?>" name="data[]" type="date" size="30" required=""/></td>
			</tr> 
			<tr>
				<td><b>Jenis Kelamin Bayi</b></td>
				<td>
					<?php
						if($data_kelahiran['jk_anak']=="Laki-Laki")
						{
					?>
					<input type="radio" name="data[]" required="" value="Laki-Laki" checked />&nbsp;Laki-Laki
					<input type="radio" name="data[]" required="" value="Perempuan"/>&nbsp;Perempuan
					<?php
						}
						else
						{
					?>
					<input type="radio" name="data[]" required="" value="Laki-Laki" />&nbsp;Laki-Laki
					<input type="radio" name="data[]" required="" value="Perempuan" checked />&nbsp;Perempuan
					<?php
						}
					?>
				</td>
			</tr>
			<tr>  
				<td><b>Berat Bayi</b></td>
				<td><input value="<?php echo $data_kelahiran['berat']?>" name="data[]" type="text" size="20" required="" placeholder="Berat Bayi" /></td>
			</tr>
			<tr>
				<td><b>Proses Kelahiran</b></td>
				<td>
					<select name="data[]" required="">
						<option value="" selected>Pilih Proses Kelahiran</option>
						<?php
							if($data_kelahiran['proses_kelahiran']=="Operasi")
							{
						?>
						<option value="Operasi" selected>Operasi</option>
						<option value="Normal">Normal</option>
						<?php
							}
							else
							{
						?>
						<option value="Operasi">Operasi</option>
						<option value="Normal" selected>Normal</option>
						<?php
							}
						?>
					</select>
				</td>
			</tr> 
			<tr>  
				<td><b>Nama Suami</b></td>
				<td><input value="<?php echo $data_kelahiran['nama_suami']?>" name="data[]" type="text" size="50" required placeholder="Nama Ayah " onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="nama_tabel" value="tbl_kelahiran">
					<input type="hidden" name="id_data" value="<?php echo $id_kelahiran?>">
					<input type="hidden" name="halaman" value="?page=kelahiran">
					<input type="submit" class="button" value="Simpan Perubahan" name="btn-proses">
					<a href="?page=kelahiran"><input type="button" class="button" value="Batal"></a>
				</td>
			</tr>
		</table>
	</form>
</div>
<?php
	}
?>