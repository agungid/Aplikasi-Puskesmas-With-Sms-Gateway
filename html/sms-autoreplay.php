<?php
	date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
	include "../php/koneksi-sms.php";
	//ambil nama modem
	$sql_modem = mysql_query("SELECT ID FROM phones");
	$modem="";
	if($data_modem = mysql_fetch_array($sql_modem))
	{
		$modem = $data_modem['ID'];
	}
	else
		echo"Modem Tidak Dikenali";
	//kirim kegiatan otomatis
	include"../php/koneksi.php";
	$tgl_sekarang=date('Y-m-d');
	$sql_kegiatan = mysql_query("SELECT * FROM tbl_kegiatan WHERE tgl_alarm='$tgl_sekarang' AND status=0");
	if($data_kegiatan= mysql_fetch_array($sql_kegiatan))
	{
		$id_kegiatan = $data_kegiatan['id_kegiatan'];
		$pesan = "Info : ".$data_kegiatan['isi_kegiatan'].", ".$data_kegiatan['hari']." ".$data_kegiatan['tgl_kegiatan']." jam ".$data_kegiatan['jam']." di ".$data_kegiatan['tempat'];
		$sql_anggota = mysql_query("SELECT notelp FROM tbl_anggota ORDER BY id_anggota ASC");
		while($data_anggota = mysql_fetch_array($sql_anggota))
		{
			$nohp = $data_anggota['notelp'];
			include"../php/koneksi-sms.php";
			$query = mysql_query("INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$pesan', 'Gammu 1.28.90')");
		}
		//update kegiatan
		include"../php/koneksi.php";
		$update_kegiatan = mysql_query("UPDATE tbl_kegiatan SET status=1 WHERE id_kegiatan='$id_kegiatan'");
	}		
	//echo $pesan;
	// menampilkan semua sms di inbox
	include"../php/koneksi-sms.php";
	$query = mysql_query("SELECT * FROM inbox WHERE Processed='false' ORDER BY ReceivingDateTime DESC");
	while ($data = mysql_fetch_array($query))
	{
		$id = $data['ID'];
		$nohp = $data['SenderNumber'];
		$tgl_sms = $data['ReceivingDateTime'];
		$text = strtolower($data['TextDecoded']);
		$tglnya_sms = explode(" ",$tgl_sms);
		$tgl_diterima = $tglnya_sms[0];
		//cek isi sms
		$isi_sms = explode(" ",$text);
		$panjang_sms = count($isi_sms);
		if($panjang_sms<2)
		{
			$balasan = "Maaf, Format yang Anda Masukkan Salah";
			include"../php/koneksi-sms.php";
			$balas_sms = mysql_query("INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$balasan', 'Gammu 1.28.90')");
			//update status processed
			$update_sms = mysql_query("UPDATE inbox set Processed='true' WHERE ID='$id'");
		}
		else
		{
			$format = $isi_sms[1];//cek request
			$balasan="";
			if($format=="jadwal")//request jadwal
			{
				include"../php/koneksi.php";
				//ambil informasi kegiatan
				$sql_kegiatan = mysql_query("SELECT * FROM tbl_kegiatan WHERE tgl_kegiatan='$tgl_diterima' AND status=0");
				if($ada = mysql_fetch_array($sql_kegiatan))
					$balasan = "Jadwal Tgl $tgl_diterima : ".$ada['isi_kegiatan'].", ".$ada['hari']." jam ".$ada['jam']." di ".$ada['tempat'];
				else
					$balasan="Tidak Ada Jadwal Kegiatan Pada Hari Ini Tanggal $tgl_diterima";
				//simpan ke tbloutbox
				include"../php/koneksi-sms.php";
				$balas_sms = mysql_query("INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$balasan', 'Gammu 1.28.90')");
				//update status processed
				$update_sms = mysql_query("UPDATE inbox set Processed='true' WHERE ID='$id'");
			}
			else if($format=="ibuhamil")//jadwal pemeriksaan ibu hamil
			{
				include"../php/koneksi.php";
				//echo $nohp;
				//ambil data ibu hamil
				$sql_ibuhamil = mysql_query("SELECT * FROM tbl_ibuhamil WHERE notelp='$nohp'");
				if($data_ibuhamil = mysql_fetch_array($sql_ibuhamil))
				{
					$id_ibuhamil = $data_ibuhamil['id_ibuhamil'];
					//ambil data pemeriksaan
					$sql_pemeriksaan = mysql_query("SELECT * FROM tbl_pemeriksaan WHERE id_pemeriksaan = (SELECT MAX(id_pemeriksaan) FROM tbl_pemeriksaan WHERE id_ibuhamil='$id_ibuhamil')");
					$data_pemeriksaan = mysql_fetch_array($sql_pemeriksaan);
					$balasan = "Anda harus periksa ulang kehamilan anda pada tanggal ".$data_pemeriksaan['tgl_periksa_ulang'];
				}
				else
					$balasan="Maaf, Anda tidak terdaftar pada sistem kami, silahkan konfirmasi ulang data anda";
				//simpan ke tbloutbox
				include"../php/koneksi-sms.php";
				$balas_sms = mysql_query("INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$balasan', 'Gammu 1.28.90')");
				//update status processed
				$update_sms = mysql_query("UPDATE inbox set Processed='true' WHERE ID='$id'");
			}
			else
			{
				$balasan = "Maaf, Format yang Anda Masukkan Salah";
				include"../php/koneksi-sms.php";
				$balas_sms = mysql_query("INSERT INTO outbox (DestinationNumber, SenderID, TextDecoded, CreatorID) VALUES ('$nohp', '$modem', '$balasan', 'Gammu 1.28.90')");
				//update status processed
				$update_sms = mysql_query("UPDATE inbox set Processed='true' WHERE ID='$id'");
			}
		}
	}
?>