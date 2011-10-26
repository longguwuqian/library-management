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
	
	<tr><td>&nbsp</td><td><a href="intro.php"><img src="img/Nitc_logoedit.png" width="90" height="107"/></a></td><td id="dipina"><h1>National Institute of Technology</h1></td>
	<td id="dipin"><h1>Central Library</h1>
	</td>
	
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0" 		class="container">
	<tr>
	
	<td id="page">

	<h2>Library Resources</h2>

	National Institute of Technology Calicut Library  is one of the best 		technical in the country. The library has a good holding of valuable 		books, journals, reports and CD ROM Databases. 		
	<br/><br/>
	<h3>Books</h3>
	Book Bank<br/>

	Text Books<br/>

	Reference 
	<br/><br/>
	<h3>Publications</h3>
	<br/>
	<h2>Stats</h2>
	No. of Books available:
<?php
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$query1="select count(isbn) from books";
$query2="select count(id) from publications";
$query3="select count(*) from publications full join books on  publications.id=books.isbn";
$query4="select count(*) from publications where type='NP'";
$query5="select count(*) from publications where type='Mag'";


$result1=pg_query($dbconn,$query1);
$result2=pg_query($dbconn,$query2);
$result3=pg_query($dbconn,$query3);
$result4=pg_query($dbconn,$query4);
$result5=pg_query($dbconn,$query5);

while ($line=pg_fetch_array($result1,null,PGSQL_ASSOC))
{
	foreach($line as $value)
	echo "$value";
}
echo "<br/>No. of Publications available:";
while ($line2=pg_fetch_array($result2,null,PGSQL_ASSOC))
{
	foreach($line2 as $value)
	echo "$value";
}
echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Newspapers:";
while ($line4=pg_fetch_array($result4,null,PGSQL_ASSOC))
{
	foreach($line4 as $value)
	echo "$value";
}
echo "<br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Magazines:";
while ($line5=pg_fetch_array($result5,null,PGSQL_ASSOC))
{
	foreach($line5 as $value)
	echo "$value";
}

echo '<br/>';
echo '<p style="font-weight:bold">TOTAL:  ';
while ($line3=pg_fetch_array($result3,null,PGSQL_ASSOC))
{
	foreach($line3 as $value)
	echo "$value";
}
echo '</p>';

?>	
	</td>
	</tr>
	</table>



<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2011 owned by dipin,jerrin and merry  </a></p></td>
	</tr>
</table>
</body>
</html>
