<html>
<head>

<title>NITC Central Library</title>
<link href="../default1.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>

<body>

<script type="text/javascript">

function changeme(id, action) 
{
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}



function viewacc()
{


changeme('msg','hide');
changeme('view','show');
changeme('resultset2','hide');
changeme('books','hide');
}


function view_val()
{

$id=document.viewmem.id.value;
if(!$id.length)
{
alert('Invalid form');
document.viewmem.id.focus();
return false;
}
return true;
}


</script>


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
		<td id="logo"><p>Welcome Guest&nbsp|&nbsp<a href="guest.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p></td>
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
					<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>Working Menu</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><strong><span onclick="viewacc();" style="cursor: pointer;">View account details</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>
						</td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>MEMBER DETAILS</h2></td>
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
						<td>User information portal
						</td>
						</tr>
						</table>
						
						
							<table id="view" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<form NAME=viewmem action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return view_val()">
							<tr><td>&nbsp;</td></tr>
							
<tr>
<td>
Enter user ID to view info
</td><td></td>
<td>
<input type="text" name="id" />
</td>
</tr>

<tr>
<td>
<input type="hidden" name="flag23" value=1 />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit" />
</td>
</tr>
							</form>
							</table>
<?php


if(isset($_POST['flag23']))
{
unset($_POST['flag23']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());


echo "<br />";

echo "BOOKS ISSUED";

$query1="select title,name,ret_date from issue natural join books natural join members where mem_id='".$_POST['id']."'";
$result1=pg_query($dbconn,$query1) or die('Could not execute last query ' . pg_last_error());


echo '<table id="resultset2" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
	echo "<tr><th>TITLE</th><th>NAME</th><th>RETURN DATE</th></tr>";
	while ($line1 = pg_fetch_array($result1, NULL, PGSQL_ASSOC))
   {
   echo "<tr>";
foreach ($line1 as $col_value1) 
	{
        echo "<td>$col_value1</td>";
   	}
   	   echo "</tr>";
   
}
echo "</table>\n";

pg_free_result($result1);

pg_close($dbconn);
}
?>
						
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
