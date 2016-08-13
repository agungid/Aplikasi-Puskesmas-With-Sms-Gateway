<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/atur_akun.png" width="56" height="53"/></div>
	<b>Form Pengaturan Data Akun</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<h3><img src="mos-css/img/atur_akun.png" width="16" height="16" /> Masukan Perubahan Data Akun</h3>	
	<form name="form1" method="post" action="php/proses.php">
		<table width="95%" >
			<tr>
				 <td><b>Username</b></td>
				 <td><input name="username" readonly value="<?php echo $_SESSION['username']?>" type="text"  size="40" required="" autofocus placeholder="Username"/> <font color="red"><b><i>* Tidak Bisa Diganti</i></b></font></td>
			</tr>
			<tr>
				 <td><b>Password</b></td>
				 <td><input name="password" value="<?php echo $_SESSION['password']?>" type="text"  size="40" required="" placeholder="Password"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="submit" class="button" value="Simpan Perubahan Akun" name="btn-proses">
					<input type="reset" class="button" value="Batal">
				</td>
			</tr>
		</table>
	</form>
</div>