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

function view_cat()
{
changeme('catview','show');
changeme('msg','hide');
changeme('showbooks','hide');


}

function view_date()
{
changeme('dateview','show');
changeme('msg','hide');
changeme('catview','hide');
changeme('showbooks','hide');
}

function date_val()
{

if(isset(document.viewdate.yearc.checked))
{
alert('called');
$year=document.viewdate.yeart.value;
if(!$year.length)
{
alert('Invalid Date');
document.viewdate.yeart.focus();
return false;
}
}


if(isset(document.viewdate.ednc.checked))
{
$edn=document.viewdate.ednt.value;
if(!$edn.length)
{
alert('Invalid Date');
document.viewdate.ednt.focus();
return false;
}
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
								<td><h2>Browse By</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><span onclick="view_cat();" style="cursor: pointer;"><strong>CATEGORY</strong></span><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							
							<tr>
								<td><p><strong><span onclick="view_date();" style="cursor: pointer;">PUBLISHING DATE</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
						</table>
						</td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>BROWSE BOOKS </h2></td>
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
						<td>Choose a browse category
						</td>
						</tr>
						</table>
						
						<table id="catview" style="display: none;" width="700" border="0" cellpadding="0" cellspacing="0">
							<form NAME=bookview action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return view_val()">
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
Author:First Name
</td><td></td>
<td>
<input type="text" name="fnamet"><input type="checkbox" name="fnamec" value="fname" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td>
Author:Last Name
</td><td></td>
<td>
<input type="text" name="lnamet"><input type="checkbox" name="lnamec" value="lname" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td>
Category
</td><td></td>
<td>


<select name="category">
<?php
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

$query="select distinct category from books"; 

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
							<input type="hidden" name="flag20" value=1 />
							</td>
							</tr>


<tr>
<td>
<input type="submit" name="submit" value="Submit" />
</td>
</tr>
							</form>
							</table>	
		














<table id="dateview" style="display: none;" width="700" border="0" cellpadding="0" cellspacing="0">
							<form NAME=viewdate action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return date_val()">
							<tr><td>&nbsp;</td></tr>
							<tr>
<td>
Year of publishing
</td><td></td>
<td>
<input type="text" name="yeart"><input type="checkbox" name="yearc" value="year" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td>
Edition
</td><td></td>
<td>
<input type="text" name="ednt"><input type="checkbox" name="ednc" value="edn" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>


<tr>
<td>
Category
</td><td></td>
<td>


<select name="category">
<?php
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

$query="select distinct category from books"; 

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
							<input type="hidden" name="flag25" value=1 />
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

if(isset($_POST['flag20']))
{

unset($_POST['flag20']);
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());
$query="select * from books natural join publisher where category='".$_POST['category']."'";

if(isset($_POST['titlec']))
$query=$query." and title = '".$_POST['titlet']."'";

if(isset($_POST['fnamec']))
$query=$query." and title = '".$_POST['fnamet']."'";


if(isset($_POST['lnamec']))
$query=$query." and title = '".$_POST['lnamet']."'";


$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());


$num=pg_numrows($result); 

echo '<table id="showbooks" style="display:block;" border="0" cellpadding="8" cellspacing="0">';
	echo "<tr><th>Title</th><th>Author_FName</th><th>Author_LName</th><th>ISBN</th><th>Availability</th><th>Category</th><th>Price</th><th>Publisher</th><th>Edition</th></tr>";
	
    for ($i=0;$i<$num;$i++)
    {	
    	echo "<tr>";
        $row = pg_fetch_row($result,$i);
	echo "<td>".$row[9]."</td><td>".$row[3]."</td><td>".$row[7]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[6]."</td><td>".$row[4]."</td><td>".$row[11]."</td><td>".$row[5]."</td>";
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
