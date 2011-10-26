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
	
	<tr><td>&nbsp</td><td><a href="intro.php"><img src="img/Nitc_logoedit.png" width="90" height="107"/></a></td><td id="dipina"><h1>National Institute Of Technology</h1></td>
	<td id="dipin"><h1>Central Library</h1>
	</td>
		
	</tr>
	</table>

		<table width="100%" border="0" cellpadding="0" cellspacing="0" 		class="container">
	<tr>
	
	<td id="page">

	<h2>About Us</h2>

	This Library Management stands for its user friendly interface that 		it offers to both the user and the admin. The system offers a wide 		range of accessibilities to the admin from managing member accounts 		to handling book records while the member gets to explore the 		Library at the tip of his finger at ease.
	The schema has been prepared in such a way that maximum possible 		things are done using minimum entities. 
	
	<br/><br/><br/><h3>Project Submitted by</h3><br/><br/>
<h5>Dipin V Panicker B090487CS</h5><br/>
<h5>Jerrin Shaji George B090437CS</h5><br/>
<h5>Merrymel M George B090087cs</h5>

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
