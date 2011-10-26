<html>
<head>

<title>NITC Central Library</title>
<link href="../default.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>

<body>

<script>

function ren_val()
{
var title=document.renw.title.value;

if(!title.length)
{
alert('Invalid Request');
document.renw.title.focus();
return false;
}

return true;

}


function iss_val()
{
var book=document.issue.book.value;
var mem=document.issue.mem.value;

if (!book.length)
{
alert('Incomplete form');
document.issue.book.focus();
return false;
}

if (!mem.length)
{
alert('Incomplete form');
document.issue.mem.focus();
return false;
}

return true;
}

function ret_val()
{
var title=document.retn.book.value;

if(!title.length)
{
alert('Invalid Request');
document.retn.book.focus();
return false;
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


function issbook()
{
changeme('text', 'hide');
changeme('iss', 'show');
changeme('pending','hide');
changeme('retn', 'hide');
changeme('renw','hide');
}

function retbook()
{
changeme('text', 'hide');
changeme('iss', 'hide');
changeme('retn', 'show');
changeme('pending','hide');
changeme('renw','hide');

}

function renbook()
{
changeme('text', 'hide');
changeme('iss', 'hide');
changeme('retn', 'hide');
changeme('pending','hide');
changeme('renw','show');
}

function penbook()
{
changeme('text', 'hide');
changeme('iss', 'hide');
changeme('retn', 'hide');
changeme('pending','show');
changeme('renw','hide');

}

</script>



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
								<td width="100%"><p><strong><span onclick="issbook();" style="cursor: pointer;">Issue Book</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="renbook();" style="cursor: pointer;">Renew Book</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="retbook();" style="cursor: pointer;">Return Book</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							<tr>
								<td width="100%"><p><strong><span onclick="penbook();" style="cursor: pointer;">Pending Return</span></strong><br /></p></td>
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
								<td>Issue Management</td>
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
						<td>Issue, Renew and Return books 
						
						
						<?php
						
						$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());
						$q1="select count(*) from issue";
						$q2="select count(*) from issue where ret_date < (select current_date)";
						
						$r1=pg_query($dbconn,$q1);
						$r2=pg_query($dbconn,$q2);
						
						$tot=pg_fetch_row($r1,0);
						$pend=pg_fetch_row($r2,0);
						
						echo "<br /><br />Total books issued : " . $tot[0] . "<br />";
						echo "Number of pending returns : " . $pend[0] . "<br />";

						pg_free_result($r1);
						pg_free_result($r2);

						pg_close($dbconn);
						
						?>						
						
						
						
						
						
						
						
						
						
						
						
						
						
						</td>
						</tr>
						</table>
						
						<table id="iss" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=issue action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return iss_val()">
							<tr>
							<td>
							Title :
							</td>
							<td>
							
							<select name="book">
							<?php
							$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

							$query="select isbn,title from books where avail='y'"; 

							$result=pg_query($dbconn,$query) or die('Could not execute query ' . pg_last_error());
							
							$num=pg_numrows($result); 
							    
							for ($i=0;$i<$num;$i++)
							{
							     $row = pg_fetch_row($result,$i);
        
							     print("<option value=\"$row[0]\">$row[1]</option>");
							}

							pg_free_result($result);							
							pg_close($dbconn);
							
							?>

							</select>
							
							
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							<tr>
							<td>
							Member ID :
							</td>
							<td>
							<input type="text" name="mem" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag5" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>


							</FORM>
							</table>



							<table id="pending" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<tr>
							<th>&nbsp ISBN&nbsp&nbsp</th><th>&nbsp&nbsp TITLE&nbsp&nbsp</th><th>&nbsp&nbsp MEMBER&nbsp&nbsp</th><th>&nbsp&nbsp No of days</th>
							</tr>
							
							
							
							<?php
			$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

$query="select isbn,title,name,((select current_date)-ret_date) as no_days from issue natural join books natural join members where ret_date < (select current_date)"; 

							$result=pg_query($dbconn,$query) or die('Could not execute query ' . pg_last_error());
							
							$num=pg_numrows($result); 
							 
							for ($i=0;$i<$num;$i++)
							{
							     $row = pg_fetch_row($result,$i);
        
						     echo "<tr><td>&nbsp ".$row[0]."&nbsp&nbsp</td><td>&nbsp&nbsp ".$row[1]."&nbsp&nbsp</td><td>&nbsp&nbsp ".$row[2]."&nbsp&nbsp</td><td>&nbsp&nbsp ".$row[3]."</td></tr>";
							     
							}

							pg_free_result($result);							
							pg_close($dbconn);
							
							?>

							</tr>
							
							<tr><td>&nbsp</td></tr>


							</table>

							
							<table id="renw" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=renew action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return ren_val()">
							<tr>
							<td>
							Title :
							</td>
							
							<td>
							
							<select name="title">
							<?php
							$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

							$query="select isbn,title from issue natural join books"; 

							$result=pg_query($dbconn,$query) or die('Could not execute query ' . pg_last_error());
							
							$num=pg_numrows($result); 
							    
							for ($i=0;$i<$num;$i++)
							{
							     $row = pg_fetch_row($result,$i);
        
							     print("<option value=\"$row[0]\">$row[1]</option>");
							}

							pg_free_result($result);							
							pg_close($dbconn);
							
							?>

							</select>
							</td>
							</tr>
							
							<tr><td>&nbsp</td></tr>

							<tr>
							<td>
							<input type="hidden" name="flag7" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>


							</FORM>
							</table>
							
							
							



							<table id="retn" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=ret action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return ret_val()">
							<tr>
							<td>
							Title :
							</td>
							
							<td>
							
							<select name="book">
							<?php
							$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

							$query="select isbn,title from issue natural join books"; 

							$result=pg_query($dbconn,$query) or die('Could not execute query ' . pg_last_error());
							
							$num=pg_numrows($result); 
							    
							for ($i=0;$i<$num;$i++)
							{
							     $row = pg_fetch_row($result,$i);
        
							     print("<option value=\"$row[0]\">$row[1]</option>");
							}

							pg_free_result($result);							
							pg_close($dbconn);
							
							?>

							</select>
							</td>
							</tr>
							
							<tr><td>&nbsp</td></tr>

							<tr>
							<td>
							<input type="hidden" name="flag6" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td></td>
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






<?


if(isset($_POST['flag7']))
{
unset($_POST['flag7']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());


$q1="select ret_date,mem_type from issue natural join members where isbn='".$_POST['title']."'";
$r1=pg_query($dbconn,$q1) or die('Could not execute query ' . pg_last_error());

$row= pg_fetch_row($r1,0);

$ret=$row[0];

$today=date('Y-m-d');

echo $today." ".$ret;



if($today>$ret)
{
?>

<script type="text/javascript">

alert('Cannot renew as pending fines');
 window.location("renew.php");
</script>


<?php

}

else
{

 if($row[1]=='faculty')
    $due=Date('m-d-Y', strtotime("+2 months"));
    
    else if($row[1]=='adhoc')
    $due=Date('m-d-Y', strtotime("+1 months"));
    
    else if($row[1]=='student')
    $due=Date('m-d-Y', strtotime("+14 days"));

  $q2="update books set avail='n' where isbn='".$_POST['title']."'"; 	
  $q3="update issue set ret_date='".$due."' where isbn='".$_POST['title']."'"; 
  
  $r2=pg_query($dbconn,$q2);
  $r3=pg_query($dbconn,$q3);
  
  if($r2&&$r3)
  {
  ?>
  <script type="text/javascript">
  var due="<?php echo $due ?>";
  alert('Book successfully renewd.. New return date is ' + due);
  </script>
  <?
  }

  else
  {
  ?>
  <script type="text/javascript">
  alert('Error..Cannot renew book');
  </script>
  <?
  
  } 


}

}

?>














<?


if(isset($_POST['flag6']))
{
unset($_POST['flag6']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$q3="select ret_date from issue where isbn='".$_POST['book']."'";

$r3=pg_query($dbconn,$q3) or die('Could not execute query ' . pg_last_error());

$row = pg_fetch_row($r3,0);


$ret=$row[0];
$tod=Date('Y-m-d');

if($ret<$tod)
{

$diff = strtotime($tod) - strtotime($ret);
$diff=$diff/(60*60*24);

?>
<script type="text/javascript">
var diff="<?php echo $diff ?>";
alert('Pending late fees for '+diff+' days');

</script>
<?

}



$q1="delete from issue where isbn='".$_POST['book']."'";
$q2="update books set avail='y'where isbn='".$_POST['book']."'";

$r1=pg_query($dbconn,$q1);
$r2=pg_query($dbconn,$q2);

if($r1&&$r2)
{
?>
<script type="text/javascript">
alert('Books successfully returned');

</script>
<?

}

else
{
{
?>
<script type="text/javascript">
alert('Error returning the books');

</script>
<?

}



}


}

?>
			



<?


if(isset($_POST['flag5']))
{
unset($_POST['flag5']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$q1="select mem_id from members";

$r1=pg_query($dbconn,$q1);

$temp=0;

$num=pg_numrows($r1); 
    
    for ($i=0;$i<$num;$i++)
    {
        $row = pg_fetch_row($r1,$i);
        if($row[0]==$_POST['mem'])
        	{
        	$temp=1;
        	break;
        	}
    }
	
    if($temp==0)
    {
    
    ?>
    
    <script type="text/javascript">
    alert('Invalid Member ID');
    window.location("issue.php");
    
    </script>
    
    
    <?php
    
    }
    
    
    else
    {
    $today=date('m-d-Y');
    
    $q5="create view v as ( select mem_id,isbn from issue where ret_date < (select now()::date))";
    $q55="select * from v";
    $q6="drop view v";
    $temp5=0;
    $r5=pg_query($dbconn,$q5);
    $r55=pg_query($dbconn,$q55);

    $num5=pg_numrows($r55); 
    
    
    for ($i=0;$i<$num5;$i++)
    {
        $row5 = pg_fetch_row($r55,$i);
        if($row5[0]==$_POST['mem'])
        	{
        	$temp5=1;
        	break;
        	}
    }
    
    
    if($temp5==1)
    {
    
    $r6=pg_query($dbconn,$q6);
    
    ?>
    
    <script type="text/javascript">
    alert('Cannot issue book to member as pending book return');
    window.location("issue.php");
    
    </script>
    
    
    <?php
    
    }
    
    else
    {
    $r6=pg_query($dbconn,$q6);
    $q3="select mem_type from members where mem_id='".$_POST['mem']."'";
    $r3=pg_query($dbconn,$q3);
    $row3= pg_fetch_row($r3);
    
    if($row3[0]=='faculty')
    $due=Date('m-d-Y', strtotime("+2 months"));
    
    else if($row3[0]=='adhoc')
    $due=Date('m-d-Y', strtotime("+1 months"));
    
    else if($row3[0]=='student')
    $due=Date('m-d-Y', strtotime("+14 days"));
    
    
    $q2="update books set avail='n' where isbn='".$_POST['book']."'"; 	
    $q4="insert into issue values('".$due."','".$_POST['book']."','".$_POST['mem']."','".$today."')";
    
    $r2=pg_query($dbconn,$q2);
    $r4=pg_query($dbconn,$q4);
    
    if($r2&&$r3)
    {
    ?>
    <script type="text/javascript">
    alert('Book successfully issued\nReturn Date is '+"<?php echo $due ?>");
    </script>
    <?
    }
    pg_free_result($r2);
    pg_free_result($r3);
    pg_free_result($r4);
    pg_free_result($r5);
    pg_free_result($r6);
    }
    }
    
pg_free_result($r1);
pg_close($dbconn);

}

?>

</body>
</html>
