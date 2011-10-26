<html>
<head>


<script type="text/javascript">

function changeme(id, action) {
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}


function adduser()
{
changeme('dropuser','hide');
changeme('add', 'show');
changeme('text', 'hide');
changeme('t', 'hide');
changeme('view', 'hide');
changeme('resultset', 'hide');
}

function viewuser()
{
changeme('dropuser','hide');
changeme('view', 'show');
changeme('t', 'show');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('resultset', 'hide');
}

function edituser()
{
changeme('dropuser','hide');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('view', 'hide');
changeme('t', 'hide');
changeme('resultset', 'hide');
}

function dropuser()
{
changeme('dropuser','show');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('view', 'hide');
changeme('t', 'hide');
changeme('resultset', 'hide');
}

function dispuser()
{
changeme('dropuser','hide');
changeme('resultset','show');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('view', 'hide');
changeme('t', 'hide');


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


function view_val()
{

if (document.view_mem.v_n.checked)
{

var nm=document.view_mem.v_name.value;
if(!nm.length)
{
alert("Incomplete Form");
document.view_mem.v_name.focus();
return false;

}

else
{

var regex = /\d/g;
if(regex.test(nm))
{
alert('Invalid name');
document.view_mem.v_name.focus();
return false;
}

}

}

if (document.view_mem.v_i.checked)
{
var id=document.view_mem.v_id.value;
if(!id.length)
{
alert("Incomplete Form");
document.view_mem.v_id.focus();
return false;

}

}

if (document.view_mem.v_em.checked)
{
var em=document.view_mem.v_email.value;

if(!em.length)
{
alert("Incomplete Form");
document.view_mem.v_email.focus();
return false;

}

}

return true;


}


function add_val()
{
var mail=document.regn.email.value;
var nm=document.regn.nm.value;
var age=document.regn.age.value;

if(!nm.length||!mail.length||!age.length)
{
alert("Incomplete Form");
if(!nm.length)
document.regn.nm.focus();
else if(!mail.length)
document.regn.email.focus();
else
document.regn.age.focus();

return false;
}


var regex = /\d/g;
if(regex.test(nm))
{
alert('Invalid name');
document.regn.nm.focus();
return false;
}

// ** comparing parseFloat and parseInt and also checking whether number
if(((parseFloat(age)!=parseInt(age))||(isNaN(age)||(age<10)||(age>70))))
{
alert('Incorrect age');
document.regn.age.focus();
return false;
}

var atpos=mail.indexOf('@');
var dotpos=mail.indexOf('.');

if (atpos<1 || dotpos<atpos+2 || dotpos+1>=mail.length)
{
alert("invalid email");
document.regn.email.focus();
return false;
}

var myDayStr = document.regn.formDate.value;
var myMonthStr = document.regn.formMonth.value;
var myYearStr = document.regn.formYear.value;
var myMonth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
var myDateStr = myDayStr + ' ' + myMonth[myMonthStr] + ' ' + myYearStr;

/* Using form values, create a new date object using the setFullYear function */
var myDate = new Date();
myDate.setFullYear( myYearStr, myMonthStr, myDayStr );
if ( myDate.getMonth() != myMonthStr )
 {
  alert( 'Invalid DOB' );
  document.regn.formMonth.focus();
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
			<p>Welcome Admin&nbsp|&nbsp<a href="admin.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
				<tr>
					<td><a href="members.php">Members</a></td>
					<td><a href="books.php">Books</a></td>
					<td><a href="publications.php">Publications</a></td>
					<td><a href="publishers">Publishers</a></td>
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
								<td width="100%"><p><strong><span onclick="adduser();" style="cursor: pointer;">Add user</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="viewuser();" style="cursor: pointer;">View User Details</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<!--tr>
								<td><p><strong><span onclick="edituser();" style="cursor: pointer;">Edit Details</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr-->
							<tr>
								<td><p><strong><span onclick="dropuser();" style="cursor: pointer;">Drop User</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table></td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>NITC LIBRARY MANAGEMENT </h2></td>
							</tr>
							<tr>
								<td>Members Management</td>
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
						<td>Manage members for the library management system
						
						<?php
						
						$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());
						
						
						
						$mem="select count(*) from members";
						$fac="select count(*) from members where mem_type='faculty'";
						$std="select count(*) from members where mem_type='student'";
						$adh="select count(*) from members where mem_type='adhoc'";
						
						$r_mem=pg_query($dbconn,$mem)  or die('Could not execute query' . pg_last_error());
						$r_fac=pg_query($dbconn,$fac)  or die('Could not execute query' . pg_last_error());
						$r_std=pg_query($dbconn,$std)  or die('Could not execute query' . pg_last_error());
						$r_adh=pg_query($dbconn,$adh)  or die('Could not execute query' . pg_last_error());
		
						$m= pg_fetch_array($r_mem, 0, PGSQL_ASSOC);
						$f= pg_fetch_array($r_fac, 0, PGSQL_ASSOC);
						$s= pg_fetch_array($r_std, 0, PGSQL_ASSOC);
						$a= pg_fetch_array($r_adh, 0, PGSQL_ASSOC);
			
						echo "<br /><br />Total number of members : " . $m['count'] . "<br />";
						echo "Total number of Faculties : " . $f['count'] . "<br />";
						echo "Total number of Students : " . $s['count'] . "<br />";
						echo "Total number of Adhoc&nbsp&nbsp&nbsp&nbsp : " . $a['count'] . "<br />";
						
						pg_free_result($r_mem);
						pg_free_result($r_fac);
						pg_free_result($r_std);
						pg_free_result($r_adh);						

						pg_close($dbconn);
						
						?>
						
						
						</td>
						</tr>
						</table>

						
						<table id="dropuser" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=issue action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
							<tr>
							<td>
							User ID :
							</td>
							<td>
							
							<input type="text" name="id" />							
							
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag8" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>

							</FORM>
							</table>



						<table id="add" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=regn action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return add_val()">
							<tr>
							<td>
							Name :
							</td>
							<td>
							<input type="text" name="nm" />
							</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
							<td>
							Age : 
							</td>
							<td>
							<input type="text" name="age" />
							</td>
							<tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
							<td>
							Email : 
							</td>
							<td>
							<input type="text" name="email" />
							</td>
							</tr>
							<tr><td>&nbsp;</td></tr>

							<tr>
							<td>
							Date of Birth : 
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
							<OPTION VALUE=1987>1987							
							<OPTION VALUE=1988>1988
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
							Account type :
							</td>
							<td>
							<select name="account">
							<option value=student>Student
							<option value=faculty>Faculty
							<option value=adhoc>Adhoc
							</select>
							</td>
							</tr>
							<tr>
							<td>
							<input type="hidden" name="flag1" value=1 />
							</td>
							</tr>
							<tr>
							<td>
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>
							</FORM>
							</table>
							
							<table id="t" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<tr><td>Tick the search attributes</td></tr>
							</table>
							<table id="view" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<form NAME=viewmem action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return view_val()">
							<tr><td>&nbsp;</td></tr>
							<tr>
<td>
Name
</td><td></td>
<td>
<input type="text" name="v_name"><input type="checkbox" name="v_n" value="name" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
ID
</td><td></td>
<td>
<input type="text" name="v_id"><input type="checkbox" name="v_i" value="ID" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
Email
</td><td></td>
<td>
<input type="text" name="v_email"><input type="checkbox" name="v_em" value="email" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
Account
</td><td></td>
<td>
<select name="type" style="width: 200px">
<option value="faculty">Faculty
<option value="student">Student
<option value="adhoc">Adhoc
</select>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="hidden" name="flag2" value=1 />
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


<?

if(isset($_POST['flag8']))
{
unset($_POST['flag8']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$q1="select * from members where mem_id='".$_POST['id']."'";

$r1=pg_query($dbconn,$q1);

$mem=pg_fetch_row($r1,0);

if(!$mem[0])
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Member id ' + id + ' does not exist');
  window.location("members.php");
</script>
<?
pg_free_result($r1);
}
else
{

$q2="select count(*) from issue where mem_id='".$_POST['id']."'";
$r2=pg_query($dbconn,$q2);

$no=pg_fetch_row($r2,0);

if($no[0])
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Cannot delete..Member ' + id + ' has pending book returns');
  window.location("members.php");
</script>
<?

pg_free_result($r2);

}

else
{

$q3="delete from members where mem_id='".$_POST['id']."'";
$r3=pg_query($dbconn,$q3);

if($r3)
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Member ' + id + ' successfully deleted !');
  window.location("members.php");
</script>
<?

pg_free_result($r2);
}
else
{
?>

<script type="text/javascript">
alert('Error..Cannot delete member');
  window.location("members.php");
</script>

<?

}

}

}

pg_close($dbconn);

}

?>


<?php


if(isset($_POST['flag2']))
{
unset($_POST['flag2']);
?>
<script type="text/javascript">
</script>
<?
unset($_POST['flag2']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$query="select * from members where mem_type='".$_POST['type']."'";

echo "<br />";

if($_POST['v_name']&&isset($_POST['v_n']))
$query=$query." AND name='".$_POST['v_name']."'";


if($_POST['v_id']&&isset($_POST['v_i']))
{
$query=$query." AND mem_id='".$_POST['v_id']."'";

}

if($_POST['v_email']&&isset($_POST['v_em']))
$query=$query." AND email='".$_POST['v_email']."'";


$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());

  echo '<table id="resultset" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
	echo "<tr><th>"."ID"."</th>"."<th>"."NAME"."</th>"."<th>"."Account Type"."</th>"."<th>"."Reg_Date"."</th>"."<th>"."E-Mail"."</th>"."<th>"."Date of Birth"."</th>";
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

?>

<script type="text/javascript">
changeme('t', 'hide');
</script>
<?

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


<?


if(isset($_POST['flag1']))
{

if(isset($_POST['nm'])&&isset($_POST['age'])&&isset($_POST['email'])&&isset($_POST['formDate'])&&isset($_POST['formYear'])&&isset($_POST['formMonth'])&&isset($_POST['account']))
{
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());


$res=pg_query($dbconn,"select count(*) from members where mem_type='".$_POST['account']."'");
$line=pg_fetch_row($res);
$line[0]=$line[0]+100;

$line=substr($_POST['account'],0,3).$line[0];

$year=date("Y");

if($_POST['account']=='faculty')
{
//$acc='fac'.$sub;
$year=$year+3;
}
else if($_POST['account']=='student')
{
//$acc='std'.$sub;
$year=$year+1;
}
else if($_POST['account']=='adhoc')
{
//$acc='adh'.$sub;
$year=$year+1;
}

$date=date("d");
$month=date("m");
// faculties validity for 3 years
// students and adhoc 1 year validity


$query="insert into members values('".$line."','".$_POST['nm']."','".$_POST['account']."','".$month."-".$date."-".$year."','".$_POST['email']."','".$month."-".$_POST['formDate']."-".$_POST['formYear']."')";

$result=pg_query($dbconn,$query) or die('Could not execute last query ' . pg_last_error());
if($result)
{
?>

<script type="text/javascript">
var id="<?php echo $line ?>";
var nam="<?php echo $_POST['nm'] ?>";
var acc="<?php echo $_POST['account'] ?>";

if(acc=="faculty")
{
alert('Faculty account for '+nam+' successfuly created\nFaculty id is '+id);
}

else if(acc=="student")
{
alert('Student account for '+nam+' successfuly created\nStudent id is '+id);
}


else if(acc=="adhoc")
{
alert('Adhoc account for '+nam+' successfuly created\nAdhoc id is '+id);
}


window.location = "members.php"
</script>
<?
}

else
{
?>
<script type="text/javascript">

alert('Unable to process request');
</script>
<?

}

}
else
{
?>
<script type="text/javascript">

alert('some incorrect field set');
</script>


<?php
}
unset($flag1);
}
?>


</body>
</html>
