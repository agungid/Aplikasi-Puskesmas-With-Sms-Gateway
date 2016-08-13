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
						document.getElementById("sms_senditem").innerHTML = xmlhttp.responseText;
					}
				}
	
				xmlhttp.open("GET","html/sms-senditem.php");
				xmlhttp.send();
				setTimeout("ajaxrunning()", 1000); 
			}
	</script>
	</head>
	<body onload="ajaxrunning()">
		<div id="sms_senditem">&nbsp;</div>
	</body>
</html>