<html>
<head>
<title>NITC Central Library</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="User-icon.png" />
</head>


<?php
session_start(); 
unset($_SESSION['user']);

//////////////////////////////////  DISPLAYS PHP ERRORS !!
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//////////////////////////////////

?>

<script type="text/javascript">

function validate()
{

var id=document.login.user.value;
var pass=document.login.password.value;

if(!id)
{
document.login.user.focus();
return false;
}

if(!pass)
{
document.login.password.focus();
return false;
}
return true;

}

</script>

<body>

	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	
	<tr><td>&nbsp</td><td><img src="img/Nitc_logoedit.png" width="90" height="107"/></td><td id="dipina"><h1>National Institute of Technology</h1></td>
	<td id="dipin"><h1>Central Library</h1>
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
		</td>
		
		</tr>
		<tr><td>&nbsp	
		
	 	</td></tr>
 		<tr><td>&nbsp	
		<table >
		<tr><td><a href="about.php"><img src="img/About.png"/></a></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><a href="resources.php"><img src="img/resource.png"/></a></td></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><a href="login.php"><img src="img/Librsearch.png"/></a></td></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		
		</table>

		 </td></tr>


		 <tr><td>&nbsp	
		
		 </td></tr>
 		<tr><td>&nbsp</td></tr>
	<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>&nbsp&nbsp&nbsp&nbsp&nbsp</td><td><a href="login.php"><h2><img src="img/admin entry.png"/></a></td></tr>	
		</table></td>
	</tr>
	</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
<td id="page"><marquee scrollamount="6" direction="right" loop="true" scrolldelay="50" onMouseover="this.scrollAmount=0" onMouseOut="this.scrollAmount=5" align="top"><h2 id=dipinb>WELCOME TO NITC CENTRAL LIBRARY</h2></marquee></td>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2011 owned by dipin,jerrin and merry ! </a></p></td>
	</tr>
</table>
</body>
</html>
