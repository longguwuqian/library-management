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


<script type="text/javascript">

function changeme(id, action) 
{
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}

function viewpub()
{
changeme('disppubli','hide');
changeme('pubview','show');
changeme('msg','hide');
changeme('publications','hide');
changeme('disppubli','hide');
changeme('publiall','hide');

}

function searchpub()
{
changeme('pubview','hide');
changeme('disppubli','show');
changeme('publiall','hide');
changeme('msg','hide');
changeme('publications','hide');
changeme('publiall','hide');


}



function publi_val()
{

if(document.publidisp.titlec.checked)
{
var title=document.publidisp.titlet.value;
if(!title.length)
{
alert("Incomplete Form");
document.publidisp.titlet.focus();
return false;
}
}

if(document.publidisp.freqc.checked)
{
var title=document.publidisp.freqt.value;
if(!title.length)
{
alert("Incomplete Form");
document.publidisp.freqt.focus();
return false;
}
}



return true;
}


</script>


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
								<td><h2>Browse by</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><strong><span onclick="viewpub();" style="cursor: pointer;">View All</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="searchpub();" style="cursor: pointer;">Search</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>
						</td>
					<td>&nbsp;</td>
					
									
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>PUBLICATIONS</h2></td>
							</tr>
							<tr>
								<td>Guest Portal<br />Choose an option</td>
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
						<td>
						<?php
						
						$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());
						
						
						$mem="select count(*) from publications";
						
						$t1="create view v as select distinct type from publications";
						$t2="select count(*) from v";
						$t3="drop view v";
						
						
						$r_mem=pg_query($dbconn,$mem)  or die('Could not execute query' . pg_last_error());
						
						$rt1=pg_query($dbconn,$t1)  or die('Could not execute query' . pg_last_error());
						$rt2=pg_query($dbconn,$t2)  or die('Could not execute query' . pg_last_error());
						$rt3=pg_query($dbconn,$t3)  or die('Could not execute query' . pg_last_error());
						
		
						$m= pg_fetch_array($r_mem, 0, PGSQL_ASSOC);
						
						$c= pg_fetch_array($rt2, 0, PGSQL_ASSOC);
						
			
						echo "Total number of publications : " . $m['count'] . "<br />";
						
						echo "Total number of distinct publication type : " . $c['count'] . "<br />";
						
						pg_free_result($r_mem);
						
						pg_free_result($rt1);
						pg_free_result($rt2);
						pg_free_result($rt3);
						

						pg_close($dbconn);
						
						?>
						
						
						
						</td>
						</tr>
						</table>
						
						
						
						<table id="disppubli" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<form NAME=publidisp action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return publi_val()">
							<tr><td>&nbsp;</td></tr>
							<tr>
<td>
Title
</td><td></td>

<td>
<input type="text" name="titlet"><input type="checkbox" name="titlec" value="Title" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td>
Frequency
</td><td></td>
<td>
<input type="text" name="freqt"><input type="checkbox" name="freqc" value="fname" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>


<tr>
<td>
Type
</td><td></td>
<td>


<select name="type">
<?php
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

$query="select distinct type from publications"; 

$result=pg_query($dbconn,$query) or die('Could not execute query ' . pg_last_error());

$num=pg_numrows($result); 
    
    for ($i=0;$i<$num;$i++)
    {
        $row = pg_fetch_row($result,$i);
        
        print("<option value=\"$row[0]\">$row[0]</option>");
    }

pg_free_result($result);
pg_close($dbconn);

?>

</select>


</td>
</tr>
<tr><td>&nbsp;</td></tr>


							<tr>
							<td>
							<input type="hidden" name="flag22" value=1 />
							</td>
							</tr>


<tr>
<td>
<input type="submit" name="submit" value="Submit" />
</td>
</tr>
							</form>
							</table>
						
			<?php

if(isset($_POST['flag22']))
{

unset($_POST['flag22']);
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$query="select * from publications where type='".$_POST['type']."'";


if(isset($_POST['titlec']))
$query=$query." and name = '".$_POST['titlet']."'";


if(isset($_POST['freqc']))
$query=$query." and freq = '".$_POST['freqt']."'";


$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());


$num=pg_numrows($result); 

echo '<br /><table id="publiall" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
	echo "<tr><th>Title</th><th>Type</th><th>Frequency</th><th>Price</th><th>Issue Date</th></tr>";
	
    for ($i=0;$i<$num;$i++)
    {	
    	echo "<tr>";
        $row = pg_fetch_row($result,$i);
	echo "<td>".$row[3]."</td><td>".$row[1]."</td><td>".$row[0]."</td><td>".$row[2]."</td><td>".$row[5]."</td>";
	echo "</tr>";   
    }
	
   
echo "</table>\n";

pg_free_result($result);
pg_close($dbconn);


}

?>			
						
						
						<table id="pubview" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
<form NAME=publidisp action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
							
							<tr>
<td>
Click to view all publications
</td><td></td>
<td>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
							

							<tr>
							<td>
							<input type="hidden" name="flag21" value=1 />
							</td>
							</tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit" />
</td>
</tr>


</form>
						</table>
						


<?php

if(isset($_POST['flag21']))
{

unset($_POST['flag21']);
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$query="select * from publications";


$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());


$num=pg_numrows($result); 

echo '<br /><table id="publications" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
	echo "<tr><th>Title</th><th>Type</th><th>Frequency</th><th>Price</th><th>Issue Date</th></tr>";
	
    for ($i=0;$i<$num;$i++)
    {	
    	echo "<tr>";
        $row = pg_fetch_row($result,$i);
	echo "<td>".$row[3]."</td><td>".$row[1]."</td><td>".$row[0]."</td><td>".$row[2]."</td><td>".$row[5]."</td>";
	echo "</tr>";   
    }
	
   
echo "</table>\n";

pg_free_result($result);
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
