<?php session_start(); ?>

<html>
<head>
<title>Library Management System</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="User-icon.png" />
</head>


<body>


	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr><td>&nbsp</td><td><a href="intro.php"><img src="img/Nitc_logoedit.png" width="90" height="107"/></a></td><td id="dipina"><h1>National Institute of Technology</h1></td>
	<td id="dipin"><h1>Central Library</h1>
	</td>
	</td>
		
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
	<td id="page">
		
		
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr valign="top">
		<td id="sidebar">		
		<td>&nbsp;</td>
		<td >
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>

			<tr>
			<td style="color: #78AA00"><h1>NIT-C library management system </h1></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td width="100%"><p>Please log in to continue</p></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td class="divider">&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td class="bg4">&nbsp;</td>
			<td>&nbsp;</td>
				</tr>
			
			<td>&nbsp;</td>
			<td class="bg4">&nbsp;</td>
			<td>&nbsp;</td>
				</tr>
			<tr valign="top">
			<td class="bg4">&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr><tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			</table>
						
		</td>
		</tr>
		</table></td>
	</tr>
	</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2011 owned by dipin,jerrin and merry ! </a></p></td>
	</tr>
</table>





	<?php

//////////////////////////////////  DISPLAYS PHP ERRORS !!
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//////////////////////////////////

$user=$_POST['user'];
$passw=$_POST['password'];
if($user&&$passw)
{
$dbconn = pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect: ' . pg_last_error());

$query='select pass from login where usr=' ."'". $user . "'";

$result=pg_query($dbconn,$query) or die('could not connect' . pg_last_error());

$password=pg_fetch_array($result,0,PGSQL_ASSOC);

if($password['pass']==$passw)
{

if($user=="admin")
{
$_SESSION['user']='admin';
?>
<script type="text/javascript">
	window.location = "admin/admin.php"	
	</script>

<?php
}
else
{
$_SESSION['user']='guest';
?>
<script type="text/javascript">
	window.location = "guest/guest.php"	
	</script>
<?php
}
}

else
{
?>
<script type="text/javascript">
	alert("Login failed ");	
	window.location = "login.php"
	</script>

<?php

}

pg_free_result($result);
pg_close($dbconn);



}

else
{
?>
<script type="text/javascript">
	alert("Login failed ");	
	window.location = "login.php"
	</script>

<?php
}



?>






	
</body>
</html>
