<?php
include '../php/koneksi-sms.php';
?>
<div class="quoteOfTipe">
	<div class="mosAdm"><img src="mos-css/img/inbox.png" width="56" height="53"/></div>
	<b>Data SMS Masuk</b><br>
	<i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i>
</div>
<div id="smallRight1">
	<table border="1" style="border-collapse:collapse" cellpadding="5" class="data">
		<th class="data">No</th>
		<th class="data">Pesan SMS</th>
		<th class="data">Nomor</th>
		<th class="data">Tanggal & Waktu Terima</th>
		<th class="data">SMS Center</th>
		<?php
			// menampilkan semua sms di inbox
			$query = mysql_query("SELECT * FROM inbox ORDER BY ReceivingDateTime DESC");
			$no=0;
			while ($data = mysql_fetch_array($query))
			{
				$nohp = $data['SenderNumber'];
				$nosmsC = $data['SMSCNumber']; 
				$time = $data['ReceivingDateTime'];
				$text = $data['TextDecoded'];
				$no++;
		?>
		<tr class="data">
			<td class="data"><?php echo $no?></td>
			<td width="50%" class="data"><?php echo $text?></td>
			<td class="data"><?php echo $nohp?></td>
			<td class="data"><?php echo $time?></td>
			<td class="data"><?php echo $nosmsC?></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>