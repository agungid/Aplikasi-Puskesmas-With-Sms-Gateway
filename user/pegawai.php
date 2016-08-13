<div class="quoteOfTipe">
  <div class="mosAdm"><a href="index.php?page=user"><img src="mos-css/img/incomingicongreen.png" width="56" height="53" /></a></div>
  <script src="media/js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="development-bundle/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="development-bundle/ui/ui.core.js"></script>
		<script type="text/javascript" src="development-bundle/ui/ui.datepicker.js"></script>
		<script type="text/javascript" src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>
        <script type="text/javascript"> 
			$(document).ready(function(){
				$("#tglL").datepicker({
					dateFormat  : "dd-mm-yy",        
					changeMonth : true,
					changeYear  : true,			  
			});	  
			$(document).ready(function(){
				$("#tglP").datepicker({
					dateFormat  : "yy-mm-dd",        
					changeMonth : true,
					changeYear  : true,			  
        
			});
			$("#tglJD").datepicker({
					dateFormat  : "yy-mm-dd",        
					changeMonth : true,
					changeYear  : true
			});
			$("#tglJS").datepicker({
					dateFormat  : "yy-mm-dd",        
					changeMonth : true,
					changeYear  : true
			});	
			$("#tglT").datepicker({
					dateFormat  : "yy-mm-dd",        
					changeMonth : true,
					changeYear  : true
			});	
			$("#tglJPe").datepicker({
					dateFormat  : "yy-mm-dd",        
					changeMonth : true,
					changeYear  : true
			});	
			});	
			});
			
		</script>
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
</script>
		<style type="text/css">
            @import "media/css/table.css";
            @import "media/themes/smoothness/jquery-ui-1.8.4.custom.css";
        </style>
  <b>Form Data Pegawai</b><br>
  <i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i></div>
<div id="smallRight1">
<h3><img src="mos-css/img/posting.png" width="16" height="16" /> Masukan Data Kepegawaian Anda</h3>	
<table width="95%">
<?php
	include "koneksi.php";
	$hasil = mysql_query("SELECT MAX(id_user) AS kode FROM tbluser");
	$maks = mysql_fetch_array($hasil); //memecah hasil ke dalam array
	$kod= $maks['kode']+1; //no ditambah 1 agar no baru terinput otomatis
	$pgw="PGW";
	$kode=$pgw.''.$kod;
?>
<form id="form1" name="form1" method="post" action="data/simpanpeg.php">
         <tr>
			  <td><b>Kode User</b></td>
             <td width="227"><input name="kodeuser" type="text" value="<?php echo $kode ?>" readonly="disable" size="10" /></td>
        </tr>
		<tr>
			  <td><b>N I P</b></td>
             <td width="227"><input name="nip" type="text"  size="30" autofocus required placeholder="nip" onKeyPress="return numbersonly(this, event)"/></td>
        </tr>
        <tr>
			  <td><b>Nama Lengkap</b></td>
             <td><input name="namapeg" type="text" size="30" required placeholder="nama lengkap" onKeyPress="return namesonly(this, event)"/></td>
        </tr>
		 <tr>
			  <td><b>Alamat</b></td>
				<td><textarea name="almtpeg" type="text"  style="height:50px;width:205px;" required=""></textarea></td>
		</tr>
		<tr>
			  <td><b>Tempat Lahir</b></td>
             <td><input name="tptpeg" type="text" size="30" required placeholder="tempat lahir" onKeyPress="return namesonly(this, event)"/></td>
        </tr>
        <tr>
			<td align="left"><b>Tanggal Lahir</b></td>
			<td><input name="tglpeg" id="tglL" type="text" size="30" required=""/></td>
		</tr> 
        <tr>
             <td align="left"><b>Jenis Kelamin</b></td>
             <td><input type='radio' name='jkpeg' value='Pria' required="">Pria <input type='radio' name='jkpeg' value='Wanita'>Wanita</td>
		</tr> 
		<tr>
        	<td><b>Agama</b></td>
			<td><select name="agamapeg" required="">
				<option value="" selected="selected">-- Pilih --</option>
				<option value="Islam">Islam</option>
				<option value="Kristen Katolik">Kristen Katolik</option>
				<option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
			</select>
            </td>
		</tr>       
         <tr>
				<td align="left"><b>Pekerjaan</b></td>
				<td><input name="pkjpeg"  type="text" size="30" required placeholder="pekerjaan" onKeyPress="return namesonly(this, event)"/></td>
		</tr>
         <tr>
              <td><b>No Telp/Hp</b></td>
              <td><input name="notelp"type="text" size="30" maxlength="12" required placeholder="no.telp/hp" onKeyPress="return numbersonly(this, event)"/></td>
        </tr>
        <tr>  <td><b>Umur</b></td>
              <td><input name="umur"  type="text" size="30"maxlength="3"required placeholder="umur" onKeyPress="return numbersonly(this, event)"/></td>
        </tr> 
        <tr>
        	  <td width="156"><b>Username</b></td>
              <td><input name="user" type="text" size="30" required placeholder="username"/></td>
        </tr>
		<tr>
			  <td><b>Password</b></td>
			   <td><input name="pass" type="Password" size="30" required placeholder="password"/></td>
        </tr>
        <tr>
              <td><b>Pin</b></td>
               <td><input name="pin" type="text" size="30" required placeholder="pin"/></td>
        </tr>
        <tr>
              <td><b>Level</b></td>
               <td><select name="level" required="">
                  <option value="" selected="selected">-- Pilih --</option>
                  <option value="Direktur">Direktur</option>
				  <option value="Operator">Operator</option>
				  <option value="Dokter">Dokter</option>
                </select></td>
        </tr>
			<tr><td></td><td><input type="submit" class="button" value="Simpan">
			<input type="reset" class="button" value="Batal">
</td></tr>
		</table></div>