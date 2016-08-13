<html>
    <head>
<div class="quoteOfTipe">
  <div class="mosAdm"><a href="index.php?page=user"><img src="mos-css/img/incomingicongreen.png" width="56" height="53" /></a></div><script src="media/js/jquery.js" type="text/javascript"></script>
        <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
        
        <style type="text/css">
            @import "media/css/demo_table_jui.css";
            @import "media/themes/ui-lightness/jquery-ui-1.8.4.custom.css";
        </style>
        
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[0, "asc"]],
                    "bJQueryUI":true
                });
            })
			
			function confirmMsg(){
				var r = confirm("Anda yakin ?");
				if(r)
					return true;
				else
					return false;	
			}
            
        </script>
  <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
      
               
            });
            function confirmSubmit(){
				var msg;
				msg = "Yakin akan menghapus data?";
				var agree = confirm(msg);
				if(agree)
					return true;
				else
					return false;
			}
        </script>
  <b>Daftar User</b><br>
  <i style="color: #5b5b5b;">&quot;Polindes Palesangger&quot;</i></div
>
<div id="smallRight1">
  <h3><img src="mos-css/img/lsuser.png" width="16" height="16" /> Daftar User</h3>
	<table width="466" class="data" border="0">
		<tr >
			<table id="datatables" class="display">
                <thead>
					<td width="30">No</td>
					<td width="30">Kode</td>
					<td width="30">NIP</td>
					<td width="38" >Level</td>
					<td width="27" >Edit</td>
					<td width="39">Hapus</td>
				</thead>
		</tr>	
			<?php
					include "koneksi.php";
					$sql = "select * FROM tbluser";
					$kode_mutasi=0;
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result))
		{
			?>
		<tr>
					<td class="data" align="center">
						<input name="nama3" type="text" style="text-align:center" value="<?php echo $kode_admin=$kode_admin+1;?>" size="1" readonly="readonly" /></td>   
					<td class="data" width="120">
						<input name="nama4" type="text" value="<?php echo $row['kode'];?>" size="10" readonly="readonly" /></td>   
					<td class="data" width="120">
						<input name="nama4" type="text" value="<?php echo $row['nip'];?>" size="10" readonly="readonly" /></td>
					<td class="data" align="center">
						<input name="nama2" type="text" value="<?php echo $row['level'];?>" size="10" readonly="readonly" /></td>
					<td class="data" align="center" width="27"><a href="?page=editus&user=<?php echo $row['id_user']?>"><img title="Edit" src="mos-css/img/edit.png" border="0" width="21" height="19"></a></td>
					<td class="data" align="center" width="39"><a href="user/hapususer.php?user=<?php echo $row['id_user']?>" onClick="return confirmSubmit()"><img title="Hapus" src="mos-css/img/hapus.png" border="0" width="23" height="19"></a></td>
		</tr>
       		<?php
                        	
		}
			?>
  </table>
</div>
