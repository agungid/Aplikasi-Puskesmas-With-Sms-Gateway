<script>
// Distribute this script freely but keep this notice in place
function numbersonly(myfield, e, dec)
{
	var key;
	var keychar;

	if (window.event)
		key = window.event.keyCode;
	else if (e)
		key = e.which;
	else
		return true;
	keychar = String.fromCharCode(key);
	// control keys
	if ((key==null) || (key==0) || (key==8) ||(key==9) || (key==13) || (key==27) )
		return true;
	// numbers
	else if ((("0123456789").indexOf(keychar) > -1))
		return true;

	// decimal point jump
	/*else if (dec && (keychar == ""))
	{
		alert("NPM harus diisi dengan Angka");
		myfield.form.elements[dec].focus();
		return false;
	}*/
	else
		return false;
}

</SCRIPT>

<!--validasi nama-->
<SCRIPT TYPE="text/javascript">
<!--
// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function namesonly(myfield, e, dec)
{
	var key;
	var keychar;

	if (window.event)
		key = window.event.keyCode;
	else if (e)
		key = e.which;
	else
		return true;
	keychar = String.fromCharCode(key);
	// control keys
	if ((key==null) || (key==0) || (key==8) ||(key==9) || (key==13) || (key==27) )
		return true;
	// numbers
	else if (((" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,.'`").indexOf(keychar) > -1))
		return true;

	// decimal point jump
	/*else if (dec && (keychar == ""))
	{
		alert("NPM harus diisi dengan Angka");
		myfield.form.elements[dec].focus();
		return false;
	}*/
	else
		return false;
}
</script><div class="quoteOfTipe">
  <div class="mosAdm"><a href="index.php?page=listuser"><img src="mos-css/img/incomingicongreen.png" width="56" height="53" /></a></div>
  <b>Form Edit User </b><br>
  <i style="color: #5b5b5b;">&quot;Puskesmas Pademawu&quot;</i></div
><div id="smallRight1">
<h3><img src="mos-css/img/lsuser.png" width="16" height="16" /> Edit Data User</h3>	
<table width="95%">
<?php
	include "koneksi.php";
	$user= $_GET['user'];
	$sql="select * FROM tbluser WHERE id_user='$user'";
	$result = mysql_query($sql);
	while ($row=mysql_fetch_array($result))
{
?>
<form id="form1" name="form1" method="post" action="user/ubahuser.php">
	<table class="display1">	
		<table width="95%">
			<tr>
					<td width="28%" align="left"><b>Kode</b></td>
					<td width="72%">
						<input name="id" type="hidden" value="<?php echo $row['id_user']?>" readonly="disable" size="10" />
						<input name="kode" type="text" value="<?php echo $row['kode']?>" readonly="disable" size="10" />
					</td>
			</tr>
			<tr>
					<td align="left"><b>NIP</b></td>
					<td><input  name="nip"  value="<?php echo $row['nip']?>" type="text" readonly="eneble" size="30" required onKeyPress="return numbersonly(this, event)"/></td>
			</tr>
					
			<tr>
					<td align="left"><b>Nama</b></td>
					<td><input  name="nama"  value="<?php echo $row['namalengkap']?>" type="text" size="30"required onKeyPress="return namesonly(this, event)"/></td>
			</tr>   
			<tr>
					<td align="left"><b>Alamat</b></td>
					<td><input  name="almt"  value="<?php echo $row['alamat']?>" type="text" size="30"required onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>Tempat Lahir</b></td>
					<td><input  name="tpt"  value="<?php echo $row['tmptlahir']?>" type="text" size="30"required onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>Tanggal Lahir</b></td>
					<td><input  name="tgl"  value="<?php echo $row['tgllahir']?>" type="text" size="30"required )"/></td>
			</tr>
			<tr>
					<td align="left"><b>Jenis Kelamin</b></td>
					<td><input  name="jk"  value="<?php echo $row['jk']?>" type="text" size="30"required onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>Agama</b></td>
					<td><input  name="agm"  value="<?php echo $row['agama']?>" type="text" size="30"required onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>Pekerjaan</b></td>
					<td><input  name="pkj"  value="<?php echo $row['pkj']?>" type="text" size="30"required onKeyPress="return namesonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>No Telp/Hp</b></td>
					<td><input  name="notelp"  value="<?php echo $row['no_telp']?>" type="text" size="30" required maxlength="12" onKeyPress="return numbersonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>Umur</b></td>
					<td><input  name="umur"  value="<?php echo $row['umur']?>" type="text" size="30" required maxlength="3" onKeyPress="return numbersonly(this, event)"/></td>
			</tr>
			<tr>
					<td align="left"><b>Username</b></td>
					<td><input  name="user"  value="<?php echo $row['username']?>" type="text" size="30" required/></td>
			</tr>
			<tr>
					<td align="left"><b>Password</b></td>
					<td><input  name="pass"  value="<?php echo $row['password']?>" type="password"size="30" required/></td>
			</tr>
			<tr>
					<td align="left"><b>Pin</b></td>
					<td><input  name="pin"  value="<?php echo $row['pin']?>" type="text" size="30" required/></td>
			</tr>
			<tr>
					<td align="left"><b>Level</b></td>
					<td>
						<select name="lev" required="">
						  <option value="<?php echo $row['level']?>"><?php echo $row['level']?></option>
						  <option value="Direktur">Direktur</option>
						  <option value="Kepala Pelayanan">Kepala Pelayanan</option>
						  <option value="Perawat">Perawat</option>
						  <option value="Bendahara">Bendahara</option>
						  <option value="Administrasi">Administrasi</option>
						  <option value="Operator">Operator</option>
						  <option value="Dokter">Dokter</option>
						</select>
					</td>
			</tr>
			<tr>
        <?php
	}
?>
				<td></td>
				<td><input type="submit" name="edit" class="button" value="Ubah" />
				  <a href="?page=listuser">
				  <input type="button" class="button" name="Save" value="Batal" />
				  </a></td>
			</tr>
		</table>
	</table>
</form>
</div>