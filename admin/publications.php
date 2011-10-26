<html>
<head>

<script>

function changeme(id, action) {
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}



function addpubn()
{
changeme('text', 'hide');
changeme('addp', 'show');
changeme('droppubli', 'hide');
changeme('disppubli', 'hide');
changeme('pubview', 'hide');

}

function viewpubn()
{
changeme('text', 'hide');
changeme('addp', 'hide');
changeme('droppubli', 'hide');
changeme('disppubli', 'show');
changeme('pubview', 'hide');

}

function editpubn()
{
changeme('text', 'hide');
changeme('addp', 'hide');
changeme('droppubli', 'hide');
changeme('disppubli', 'hide');
changeme('pubview', 'hide');
}

function droppubn()
{
changeme('text', 'hide');
changeme('addp', 'hide');
changeme('droppubli', 'show');
changeme('disppubli', 'hide');
changeme('pubview', 'hide');
}

</script>

<script type="text/javascript">


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


function addp_val()
{

var nam=document.add_pubn.nam.value;
var id=document.add_pubn.id.value;
var freq=document.add_pubn.freq.value;
var price=document.add_pubn.price.value;

if(!nam.length || !id.length || !freq.length || !price.length)
{
if(!nam.length)
document.add_pubn.nam.focus();

if(!id.length)
document.add_pubn.id.focus();

if(!freq.length)
document.add_pubn.freq.focus();


if(!price.length)
document.add_pubn.price.focus();

alert('Incomplete form');
return false;
}


var myDayStr = document.add_pubn.formDate.value;
var myMonthStr = document.add_pubn.formMonth.value;
var myYearStr = document.add_pubn.formYear.value;

var myMonth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
var myDateStr = myDayStr + ' ' + myMonth[myMonthStr] + ' ' + myYearStr;

/* Using form values, create a new date object using the setFullYear function */
var myDate = new Date();
myDate.setFullYear( myYearStr, myMonthStr, myDayStr );
if ( myDate.getMonth() != myMonthStr )
 {
  alert( 'Invalid Date' );
  document.add_pubn.formMonth.focus();
  return false;
} 


var regex = /\d/g;
if(regex.test(nam))
{
alert('Invalid name');
document.add_pubn.nam.focus();
return false;
}


var regex = /\d/g;
if(regex.test(freq))
{
alert('Invalid frequency');
document.add_pubn.freq.focus();
return false;
}


if(isNaN(price))
{
alert('Incorrect Price');
document.add_pubn.price.focus();
return false;
}

return true;

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
		<p>Welcome Admin&nbsp|&nbsp<a href="admin.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p>
		</td>
		<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
			<tr>
				<td><a href="members.php">Members</a></td>
				<td><a href="books.php" >Books</a></td>
				<td><a href="publications.php">Publications</a></td>
				<td><a href="publishers.php">Publishers</a></td>
				<td><a href="issue.php">Issue</a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
		<td id="page">
		<table border="0" cellpadding="0" cellspacing="0">
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
						<td width="100%"><p><strong><span onclick="addpubn();" style="cursor: pointer;">Add Publication</span></strong><br /></p></td>
					</tr>

					<tr>
						<td>&nbsp;</td>
					</tr>
<tr>
						<td width="100%"><p><strong><span onclick="viewpubn();" style="cursor: pointer;">View Publication</span></strong><br /></p></td>
					</tr>

					<tr>
						<td>&nbsp;</td>
					</tr>
					<!--tr>
						<td><p><strong><span onclick="editpubn();" style="cursor: pointer;">Edit Publication Details</strong><br /></p></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr-->

					<tr>
						<td><p><strong><span onclick="droppubn();" style="cursor: pointer;">Delete Publication</strong><br /></p></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</table>
				</td>
					
				<td>&nbsp;</td>
					
				<td id="content">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td><h2>NITC LIBRARY MANAGEMENT</h2></td>
					</tr>
					<tr>
						<td>Publication Management</td>
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
						<td>Manage Publications for the library management system
						
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
						
			
						echo "<br /><br />Total number of publications : " . $m['count'] . "<br />";
						
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

						<table id="droppubli" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=publidrop action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
							<tr>
							<td>
							Publication ID :
							</td>
							<td>
							
							<input type="text" name="pid" />							
							
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
							<input type="hidden" name="flag16" value=1 />
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

if(isset($_POST['flag16']))
{

unset($_POST['flag16']);
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$query="select * from publications where type='".$_POST['type']."'";


if(isset($_POST['titlec']))
$query=$query." and name = '".$_POST['titlet']."'";


if(isset($_POST['freqc']))
$query=$query." and freq = '".$_POST['freqt']."'";


$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());


$num=pg_numrows($result); 

echo '<br /><table id="pubview" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
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


<table id="addp" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
				<form name="add_pubn" action="<?= $_SERVER['PHP_SELF']; ?>" method=POST onSubmit="return addp_val()">
					<tr>

						<td>Title&nbsp&nbsp</td>
						<td>
						<input type="text" name="nam" ONFOCUS="clear(this)">
						</td>
						</tr>
						<tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						ISBN_Pub 
						</td>
						<td>
						<input type="text" name="id">
						</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						Frequency 
						</td>
						<td>
						<input type="text" name="freq">
						</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						Price 
						</td>
						<td>
						<input type="text" name="price">
						</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						Type 
						</td>
						<td>
						<select name="type">
						<option value='Np'>Newspaper
						<option value='Mag'>Magazine
						</select></td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						<tr>
						<td>
						Publishing Date
						</td>
						<td>
							<SELECT NAME=formMonth>
							<OPTION VALUE=0>Jan
							<OPTION VALUE=1>Feb
							<OPTION VALUE=2>Mar
							<OPTION VALUE=3>Apr
							<OPTION VALUE=4>May
							<OPTION VALUE=5>Jun
							<OPTION VALUE=6>Jul
							<OPTION VALUE=7>Aug
							<OPTION VALUE=8>Sep
							<OPTION VALUE=9>Oct
							<OPTION VALUE=10>Nov
							<OPTION VALUE=11>Dec 
							</SELECT>


							<SELECT NAME=formDate>
							<OPTION VALUE=1>1
							<OPTION VALUE=2>2
							<OPTION VALUE=3>3
							<OPTION VALUE=4>4
							<OPTION VALUE=5>5
							<OPTION VALUE=6>6
							<OPTION VALUE=7>7
							<OPTION VALUE=8>8
							<OPTION VALUE=9>9
							<OPTION VALUE=10>10
							<OPTION VALUE=11>11
							<OPTION VALUE=12>12
							<OPTION VALUE=13>13
							<OPTION VALUE=14>14
							<OPTION VALUE=15>15
							<OPTION VALUE=16>16
							<OPTION VALUE=17>17
							<OPTION VALUE=18>18
							<OPTION VALUE=19>19
							<OPTION VALUE=20>20
							<OPTION VALUE=21>21
							<OPTION VALUE=22>22
							<OPTION VALUE=23>23
							<OPTION VALUE=24>24
							<OPTION VALUE=25>25
							<OPTION VALUE=26>26
							<OPTION VALUE=27>27
							<OPTION VALUE=28>28
							<OPTION VALUE=29>29
							<OPTION VALUE=30>30
							<OPTION VALUE=31>31
							</SELECT>
							<SELECT NAME=formYear>
							<OPTION VALUE=1975>1975
							<OPTION VALUE=1976>1976
							<OPTION VALUE=1977>1977
							<OPTION VALUE=1978>1978
							<OPTION VALUE=1979>1979
							<OPTION VALUE=1980>1980
							<OPTION VALUE=1981>1981
							<OPTION VALUE=1982>1982
							<OPTION VALUE=1983>1983
							<OPTION VALUE=1984>1984
							<OPTION VALUE=1985>1985
							<OPTION VALUE=1986>1986
							<OPTION VALUE=1987>1987 							<OPTION VALUE=1988>1988
							<OPTION VALUE=1989>1989
							<OPTION VALUE=1990>1990
							<OPTION VALUE=1991>1991
							<OPTION VALUE=1992>1992
							<OPTION VALUE=1993>1993
							<OPTION VALUE=1994>1994
							</SELECT>
							</td>




</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="hidden" name="flag10" value=1 />
</td>
</tr>


<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="submit" value="Submit">
</td>
</tr>


</form>

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


if(isset($_POST['flag10']))
{

unset($_POST['flag10']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$month=$_POST['formMonth']+1;

$query="insert into publications values('".$_POST['freq']."','".$_POST['type']."','".$_POST['price']."','".$_POST['nam']."','".$_POST['id']."','".$month."-".$_POST['formDate']."-".$_POST['formYear']."')";

$result=pg_query($dbconn,$query);


if($result)
{

?>

<script type="text/javascript">
alert("Publication successfully added !");
window.location = "publications.php"
</script>


<?

}
else
{
?>
<script type="text/javascript">

alert('some incorrect field set');
</script>
<?
}


pg_free_result($result);
pg_close($dbconn);


}
?>

	
		<?

if(isset($_POST['flag15']))
{

unset($_POST['flag15']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$q1="select * from publications where id='".$_POST['pid']."'";

$r1=pg_query($dbconn,$q1);

$mem=pg_fetch_row($r1,0);

if(!$mem[0])
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['pid'] ?>";
alert('Publication id ' + id + ' does not exist');
  window.location("delpub.php");
</script>
<?
pg_free_result($r1);
}
else
{


$q3="delete from publications where id='".$_POST['pid']."'";
$r3=pg_query($dbconn,$q3);

if($r3)
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['pid'] ?>";
alert('Publicatio ' + id + ' successfully deleted !');
  window.location("delpub.php");
</script>
<?

}
else
{
?>

<script type="text/javascript">
alert('Error..Cannot delete publication');
  window.location("delpub.php");
</script>

<?

}
pg_free_result($r3);
}


pg_close($dbconn);

}

?>



</body>
</html>
