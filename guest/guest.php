<html>
<head>

<title>NITC Central Library</title>
<link href="../default1.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>

<body>


<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
session_start();
if ($_SESSION['user']!='guest')
{
?>
	<script type="text/javascript">
	alert("You do not have necessary privileges to see this page\nPlease relogin");
	window.location = "../login.php"
	</script>
	<?php

}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr><td>&nbsp</td>
	<td><img src="Nitc_logoedit.png" width="90" height="107"/></td>
	<td style="color: #FFFFFF"><h1>National Institute of Technology</h1></td>
	<td style="color: #FFFFFF"><h1>Central Library</h1>
	</td>
	
	</tr>
	</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr>
		<tr>
		<td id="logo"><p>Welcome Guest&nbsp|&nbsp<a href="../login.php">Logout</a></p></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
				<tr>
					<td><a href="browse.php">Browse</a></td>
					<td><a href="publications.php">Publications</a></td>
					<td><a href="books.php">My account</a></td>
			</tr>
			</tr>
			</table></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
		<td id="page">
			<table  border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td id="sidebar">
					<!--<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>Working Menu</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><strong><span onclick="modadmin();" style="cursor: pointer;">Modify Admin Account</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="modguest();" style="cursor: pointer;">Modify Guest Account</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>-->
						</td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>GENERAL INFORMATION</h2></td>
							</tr>
							<tr>
								<td>Guest Portal</td>
							</tr>
							
							<tr>
								<td class="divider">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							
						</table>
						
						<table id="msg" style="display:block;" width="506" border="0" cellpadding="0" cellspacing="0">
						<tr>
						<td>Manage The Library System
						</td>
						</tr>
						</table>
						
						
							
						</td>
						</tr>
						</table>
					</td>
					</tr>
					</table>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2011 owned by dipin,jerrin and merry ! </a></p></td>
	</tr>
</table>



</body>
</html>
