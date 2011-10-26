<html>
<head>

<title>NITC Central Library</title>
<link href="../default.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>

<body>

<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

session_start();
if ($_SESSION['user']!='admin')
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

function publisher_val()
{
var id=document.dropp.id.value;
if(!id.length)
{
alert('Incomplete form');
document.dropp.id.focus();
return false;
}
return true;


}


function pub_val()
{

if((document.pubview.namec.checked)&&(document.pubview.idc.checked))
{
alert("Select either fields");
document.pubview.namet.focus();
return false;
}

if (document.pubview.namec.checked)
{

var nm=document.pubview.namet.value;

if(!nm.length)
{
alert("Incomplete Form");
document.pubview.namet.focus();
return false;

}


}

if (document.pubview.idc.checked)
{
var id=document.pubview.idt.value;
if(!id.length)
{
alert("Incomplete Form");
document.pubview.idt.focus();
return false;

}

}

return true;

}

function changeme(id, action) {
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}


function addpub()
{
changeme('droppub', 'hide');
changeme('text', 'hide');
changeme('add', 'show');
changeme('viewpub', 'hide');
changeme('pubres', 'hide');
changeme('droppub', 'hide');
}

function viewpub()
{
changeme('droppub', 'hide');
changeme('text', 'hide');
changeme('add', 'hide');
changeme('viewpub', 'show');
changeme('pubres', 'hide');
changeme('droppub', 'hide');
}

function editpub()
{
changeme('droppub', 'hide');
changeme('pubres', 'hide');
changeme('text', 'hide');
changeme('add', 'hide');
changeme('viewpub', 'hide');
changeme('droppub', 'hide');
}

function droppub()
{
changeme('viewpub', 'hide');
changeme('droppub', 'show');
changeme('text', 'hide');
changeme('pubres', 'hide');
changeme('text', 'hide');
changeme('add', 'hide');
changeme('viewpub', 'hide');

}


</script>


<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr><td>&nbsp</td><td><img src="Nitc_logoedit.png" width="90" height="107"/></td><td style="color: #FFFFFF"><h1>National Institute of Technology</h1></td>
	<td style="color: #FFFFFF"><h1>Central Library</h1>
	</td>
	
	</tr>
	</table>


<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr>
		<td id="logo"> 
			<p>Welcome Admin&nbsp|&nbsp<a href="admin.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
				<tr>
					<td><a href="members.php">Members</a></td>
					<td><a href="books.php">Books</a></td>
					<td><a href="publications.php">Publications</a></td>
					<td><a href="publishers.php">Publishers</a></td>
					<td><a href="issue.php">Issue</a></td>
				</tr>
			</table></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
		<td id="page">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td id="sidebar"><table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>Working Menu</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><strong><span onclick="addpub();" style="cursor: pointer;">Add Publisher</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="viewpub();" style="cursor: pointer;">View Publisher Details</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<!--tr>
								<td><p><strong><span onclick="editpub();" style="cursor: pointer;">Edit Details</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr-->
							<tr>
								<td><p><strong><span onclick="droppub();" style="cursor: pointer;">Delete Publisher</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table></td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>NITC LIBRARY MANAGEMENT</h2></td>
							</tr>
							<tr>
								<td>Publisher Management</td>
							</tr>
							
							<tr>
								<td class="divider">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							
						</table>
						<table id="text" style="display:block;" width="506" border="0" cellpadding="0" cellspacing="0">
						<tr>
						<td>Manage Publishers for the library management system
						
						<?php
						
						$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());
						
						
						
						$pub="select count(*) from publisher";
						
						$res=pg_query($dbconn,$pub)  or die('Could not execute query' . pg_last_error());
		
						$no=pg_fetch_row($res,0);
			
						echo "<br /><br />Total number of Publishers : " . $no[0] . "<br />";
						
						pg_free_result($res);

						pg_close($dbconn);
						
						?>
						
						
						</td>
						</tr>
						</table>
						
						
						
						<table id="droppub" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=dropp action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return publisher_val()">
							<tr>
							<td>
							Publisher ID :
							</td>
							<td>
							
							<input type="text" name="id" />							
							
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag15" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>


							</FORM>
							</table>
						
						
						
						<table id="viewpub" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<form NAME=pubview action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return pub_val()">
							<tr><td>&nbsp;</td></tr>
							<tr>
<td>
Publisher Name
</td><td></td>
<td>
<input type="text" name="namet">
<input type="checkbox" name="namec" value="n" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>



<tr>
<td>
Publisher ID
</td><td></td>
<td>
<input type="text" name="idt">
<input type="checkbox" name="idc" value="i" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>



<tr>
<td>
<input type="hidden" name="flag9" value=1 />
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


if(isset($_POST['flag9']))
{

unset($_POST['flag9']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$query="select * from publisher";

if(isset($_POST['namec']))
{
$query=$query." where name='".$_POST['namet']."'";

}

else if(isset($_POST['idc']))
{
$query=$query." where pub_id='".$_POST['idt']."'";

}



$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());
echo '<br /><br />';
  echo '<table id="pubres" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
	echo "<tr><th>"."ID"."</th>"."<th>"."PLACE"."</th>"."<th>"."Name"."</th>";
	while ($line = pg_fetch_array($result, NULL, PGSQL_ASSOC))
   {
   echo "<tr>";
foreach ($line as $col_value) 
	{
        echo "<td>$col_value</td>";
   	}
   	   echo "</tr>";
   
}
echo "</table>\n";

pg_free_result($result);
pg_close($dbconn);


}
?>

						
						
						
						<table id="add" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=publ action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return pub_val()">
							<tr>
							<td>
							Name :
							</td>
							<td>
							<input type="text" name="nm" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							<tr>
							<td>
							Place :
							</td>
							<td>
							<input type="text" name="pl" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag4" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>


							</FORM>
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


<?php


if(isset($_POST['flag4']))
{

unset($_POST['flag4']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$result1=pg_query($dbconn,"select count(*) from publisher") or die('Could not execute query '.pg_last_error());
$count=pg_fetch_row($result1);
$count[0]=$count[0]+100;
$id="pub".$count[0];

$query="insert into publisher values('".$id."','".$_POST['pl']."','".$_POST['nm']."')";
$result=pg_query($dbconn,$query);


if($result)
{

?>

<script type="text/javascript">
var id="<?php echo $id ?>";
var nam="<?php echo $_POST['nm'] ?>";
alert("Publisher "+nam+" successfully registered with id  "+id);
window.location = "publishers.php"
</script>


<?

}
else
{
?>
<script type="text/javascript">

alert('some incorrect field set '+id);
</script>
<?
}

pg_free_result($result1);
pg_free_result($result);
pg_close($dbconn);


}
?>






<?


if(isset($_POST['flag15']))
{
unset($_POST['flag15']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$q1="select * from publisher where pub_id='".$_POST['id']."'";
$r1=pg_query($dbconn,$q1);
$mem=pg_fetch_row($r1,0);

if(!$mem[0])
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Publisher ' + id + ' does not exist ');
  window.location("droppub.php");
</script>
<?
pg_free_result($r1);
}


else
{

$q2="select count(*) from books where pub_id='".$_POST['id']."'";

$r2=pg_query($dbconn,$q2);

$mem=pg_fetch_row($r2,0);

echo $mem[0];
if($mem[0])
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Publisher ' + id + ' Cannot be deletd as still associated with books');
  window.location("droppub.php");
</script>
<?
pg_free_result($r2);
}


else
{

$q3="delete from publisher where pub_id='".$_POST['id']."'";
$r3=pg_query($dbconn,$q3);
if($r3)
{
?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Publisher ' + id + ' successfully dropped');
  window.location("droppub.php");
</script>
<?

}

else
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Error..Publisher ' + id + ' Cannot be dropped);
  window.location("droppub.php");
</script>
<?
}


}


pg_free_result($r2);
pg_close($dbconn);




}


}


?>






</body>
</html>
