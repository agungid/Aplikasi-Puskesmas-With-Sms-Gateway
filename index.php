<?php
	session_start();
	include"php/koneksi.php";
?>
<html dir="header1">
<head>
	<title>Polindes Palesangger</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Copyright" content="arirusmanto.com">
	<meta name="description" content="Admin MOS Template">
	<meta name="keywords" content="Admin Page">
	<meta name="author" content="Ari Rusmanto">
	<meta name="language" content="Bahasa Indonesia">
	<link rel="shortcut icon" href="icon/logo-puskesmas.png"> <!--Pemanggilan gambar favicon-->
	<link rel="stylesheet" type="text/css" href="mos-css/mos-style.css"> <!--pemanggilan file css-->
	<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
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
			else if ((("+0123456789").indexOf(keychar) > -1))
				return true;
			else
				return false;
		}

	</SCRIPT>

	<!--validasi nama-->
	<SCRIPT TYPE="text/javascript">
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
			else
				return false;
		}
	</script>
</head>
<body>
<div id="head1">
	<div class="mosAdm1">
	<?php
		if(!empty($_SESSION['id_user']) && !empty($_SESSION['username']) && !empty($_SESSION['password']))
		{
	?>
	<a href="php/logout.php" onclick="return confirm('Apakah anda yakin akan keluar dari aplikasi ?');"><strong>Keluar</strong></a>
	<?php
		}
		else
			echo"Keluar";
	?>
	</div>
	<div class="inHead1">
</div>
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
			<b style="font-size:14px;margin-left:12px;">
			<?php
				if(empty($_SESSION['id_user']) && empty($_SESSION['username']) && empty($_SESSION['password']))
				{
			?>
			<a href="?page=login">Masuk</a>
			<?php
				}
				else
				echo"Masuk";
			?>
			</b>
		</div>
		<img src="mos-css/img/logo-uim.png" width="80" height="70" style="float:left;margin-left:25px;margin-top:-8px;">
		<h2 style="font-size:20px;margin-left:50px;">Sistem Informasi Polindes Palesangger Pegantenan Pamekasan</h2>
		<h2 style="font-size:14px;margin-left:50px;line-height:2pt;">JL. Raya Pegantenan KM.09 Palesangger Pegantenan Pamekasan Telp (0324) 5566778</h2>
	<div class="clear"></div>
	</div>
</div>

<div id="wrapper">
	<div id="leftBar">
		<ul>
			<li><a href="index.php">Beranda</a></li>
			<li><a href="index.php?page=dusun">Dusun</a></li> 
			<li><a href="index.php?page=anggota">Anggota</a></li> 
			<li><a href="index.php?page=ibu_hamil">Ibu Hamil</a></li> 
			<li><a href="index.php?page=pemeriksaan">Pemeriksaan</a></li> 
			<li><a href="index.php?page=kelahiran">Kelahiran</a></li> 
			<li><a href="index.php?page=kegiatan">Kegiatan</a></li> 
			<li><a href="index.php?page=layanan">Layanan</a></li> 
			<li><a href="index.php?page=modem">Modem</a></li> 
			<li><a href="index.php?page=inbox">Inbox</a></li> 
			<li><a href="index.php?page=send_items">Sent Items</a></li> 
			<li><a href="index.php?page=administrator">Administrator</a></li> 
			<li><a href="index.php?page=atur_akun">Atur Akun</a></li> 
		</ul>
	</div>
	<div id="rightContent">
		<div>
			<p><marquee style="color:red;margin-right:20px;font-size:14px;font-weight:bold;" scrollamount="4" onMouseOver="this.stop()" onMouseOut="this.start()">Selamat Datang Di Sistem Informasi Polindes Palesanggar Pegantenan Pamekasan, Kami Siap Melayani Anda Sepenuh Hati</marquee></p>
		</div>
		<?php 
			if(empty($_GET['page']))
			{
				echo"<div class=\"quoteOfTipe\">";
				echo"<div class=\"mosAdm\"><img src=\"mos-css/img/home.jpg\" width=\"56\" height=\"53\"/></div>";
				echo"<b>Halaman Utama</b><br>";
				echo"<i style=\"color: #5b5b5b;\">&quot;Polindes Palesangger&quot;</i>";
				echo"</div>";
				echo"<p align=justify>Selamat datang di sistem informasi polindes palesanggar plakpak pegantenan pamekasan</p>";
				echo"<p align=justify>Sistem informasi ini dibuat untuk memberikan layanan yang optimal kepada seluruh lapisan masyarakat desa palesangger pegantenan pamekasa. Pada sistem informasi ini penekanannya ada pada layanan informasi seputar kegiatan polindes yang perlu diketahui oleh masyarakat umum. Sementara ini penyampaian informasi dilakukan secara manual dengan adanya sistem ini penyampaian informasi dapat melalui layanan SMS.</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
				echo"<p>&nbsp;</p>";
			}
			else
			{
				if(empty($_SESSION['id_user']) && empty($_SESSION['username']) && empty($_SESSION['password']) && $_GET['page']!="login")
				{
					echo"<div class=\"quoteOfTipe\">";
					echo"<div class=\"mosAdm\"><img src=\"mos-css/img/login.png\" width=\"56\" height=\"53\"/></div>";
					echo"<b>Proteksi Halaman</b><br>";
					echo"<i style=\"color: #5b5b5b;\">&quot;Polindes Palesangger&quot;</i>";
					echo"</div>";
					echo"<div id=\"smallRight1\">";
					echo"<p style=font-size:20px;text-align:center;color:red;font-weight:bold;>Maaf, Anda Harus <a href=?page=login>Login</a> Untuk Dapat Mengakses Halaman Ini</p>";
					echo"</div>";
				}
				else
				{
					if($_GET['page']=="dusun")
					{
						include"html/form-dusun.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
					else if($_GET['page']=="layanan")
					{
						include"html/form-layanan.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
					else if($_GET['page']=="modem")
					{
						echo"<div class=\"quoteOfTipe\">";
						echo"<div class=\"mosAdm\"><img src=\"mos-css/img/modem.png\" width=\"56\" height=\"53\"/></div>";
						echo"<b>Pengaturan Modem</b><br>";
						echo"<i style=\"color: #5b5b5b;\">&quot;Polindes Palesangger&quot;</i>";
						echo"</div>";
						echo"<iframe src=gammu-sms width=700 height=600></iframe>";
					}
					else if($_GET['page']=="inbox")
					{
						include"html/engine-inbox.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
					else if($_GET['page']=="send_items")
					{
						include"html/engine-senditem.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
					else if($_GET['page']=="anggota")
						include"html/form-anggota.php";
					else if($_GET['page']=="ibu_hamil")
						include"html/form-ibuhamil.php";
					else if($_GET['page']=="pemeriksaan")
						include"html/form-pemeriksaan.php";
					else if($_GET['page']=="kelahiran")
						include"html/form-kelahiran.php";
					else if($_GET['page']=="kegiatan")
						include"html/form-kegiatan.php";
					else if($_GET['page']=="administrator")
					{
						include"html/form-admin.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
					else if($_GET['page']=="login")
					{
						include"html/form-login.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
					else if($_GET['page']=="atur_akun")
					{
						include"html/form-atur-akun.php";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
						echo"<p>&nbsp;</p>";
					}
				}
			}
		?>
	</div>
<div class="clear"></div>
<div id="footer">
 &copy; 2016 Dewi PM | Polindes Palesangger Pamekasan<br>
 <iframe src="html/engine-autoreplay.php" height="49" width="500" style="border:none;background-color:transparent;"></iframe>
</div>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>