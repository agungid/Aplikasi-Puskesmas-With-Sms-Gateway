<html>
	<head>
	<script type="text/javascript">
			function ajaxrunning()
			{
				if (window.XMLHttpRequest)
				{
					xmlhttp=new XMLHttpRequest();
				}
				else
				{
					xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
				}
	
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("data_sms").innerHTML = xmlhttp.responseText;
					}
				}
	
				xmlhttp.open("GET","sms-autoreplay.php");
				xmlhttp.send();
				setTimeout("ajaxrunning()", 3000); 
			}
	</script>
	</head>
	<body onload="ajaxrunning()">
		<center><h4>SMS Autoreplay</h4></center>
		<div id="data_sms">&nbsp;</div>
	</body>
</html>