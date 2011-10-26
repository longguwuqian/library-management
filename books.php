<html>
<head>



<script>
function clearDefaultandCSS(el) {
	if (el.defaultValue==el.value) el.value = ""
	// If Dynamic Style is supported, clear the style
	if (el.style) el.style.cssText = ""
}

function changeme(id, action) {
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}


function addbook()
{
changeme('text', 'hide');
changeme('add', 'show');
}

function addpubn()
{
changeme('text', 'hide');
changeme('add', 'hide');
}

function viewbook()
{
changeme('text', 'hide');
changeme('add', 'hide');
}

function editbook()
{
changeme('text', 'hide');
changeme('add', 'hide');
}

function dropbook()
{
changeme('text', 'hide');
changeme('add', 'hide');
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

function add_val()
{

var tit=document.add_book.title.value;
var pub=document.add_book.pub.value;
var price=document.add_book.price.value;
var cat=document.add_book.cat.value;
var edn=document.add_book.edn.value;
var avail=document.add_book.avail.value;
var fname=document.add_book.fname.value;
var lname=document.add_book.lname.value;
var isbn=document.add_book.isbn.value;

//alert(tit+' ' +pub+' ' +price+' ' +cat+' ' +edn+' ' +avail+' ' +fname+' ' +lname+' ' +isbn);


if(!tit.length || !pub.length || !price.length || !cat.length || !edn.length || !avail.length || !fname.length || !lname.length || !isbn.length)
{
alert('Incomplete form');


if(!isbn.length)
document.add_book.isbn.focus();
if(!lname.length)
document.add_book.lname.focus();
if(!fname.length)
document.add_book.fname.focus();
if(!avail.length)
document.add_book.avail.focus();
if(!edn.length)
document.add_book.edn.focus();

if(!cat.length)
document.add_book.cat.focus();

if(!price.length)
document.add_book.price.focus();



if(!pub.length)
document.add_book.pub.focus();
if(!tit.length )
document.add_book.title.focus();


return false;
}

var myDayStr = document.add_book.formDate.value;
var myMonthStr = document.add_book.formMonth.value;
var myYearStr = document.add_book.formYear.value;
var myMonth = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
var myDateStr = myDayStr + ' ' + myMonth[myMonthStr] + ' ' + myYearStr;

/* Using form values, create a new date object using the setFullYear function */
var myDate = new Date();
myDate.setFullYear( myYearStr, myMonthStr, myDayStr );
if ( myDate.getMonth() != myMonthStr )
 {
  alert( 'Invalid Date' );
  document.add_book.formMonth.focus();
  return false;
} 


var regex = /\d/g;
if(regex.test(lname))
{
alert('Invalid name');
document.add_book.lname.focus();
return false;
}

var regex = /\d/g;
if(regex.test(fname))
{
alert('Invalid name');
document.add_book.fname.focus();
return false;
}




if(isNaN(price))
{
alert('Incorrect Price');
document.add_book.price.focus();
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
						<td width="100%"><p><strong><span onclick="addbook();" style="cursor: pointer;">Add Book</span></strong><br /></p></td>
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
						<td><p><strong><span onclick="viewbook();" style="cursor: pointer;">View Book Details</strong><br /></p></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><p><strong><span onclick="editbook();" style="cursor: pointer;">Edit Details</strong><br /></p></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><p><strong><span onclick="dropbook();" style="cursor: pointer;">Delete Books</strong><br /></p></td>
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
						<td>Book Management</td>
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
						<td>Manage Books for the library management system
						</td>
					</tr>
				</table>

				<table id="add" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
				<form name="add_book" action="<?= $_SERVER['PHP_SELF']; ?>" method=POST onSubmit="return add_val()">
					<tr>

						<td>Title&nbsp&nbsp</td>
						<td>
						<input type="text" name="title" ONFOCUS="clear(this)">
						</td>
						</tr>
						<tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						
						<td>Author&nbsp&nbsp</td>
						<td>
						<INPUT name="fname" STYLE="color: grey" TYPE=text VALUE="First Name" STYLE="color: red" ONFOCUS="clearDefaultandCSS(this)">
						</td><td>&nbsp</td>
						<td>
						<INPUT name="lname" TYPE=text VALUE="Last Name" STYLE="color: grey" ONFOCUS="clearDefaultandCSS(this)">
						</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						ISBN 
						</td>
						<td>
						<input type="text" name="isbn">
						</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						Category 
						</td>
						<td>
						<input type="text" name="cat">
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
						Edition 
						</td>
						<td>
						<input type="text" name="edn">
						</td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						Availability
						</td>
						<td>
						<select name="avail">
						<option value='y'>Yes
						<option value='n'>No
						</select>
						</td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						
						<tr>
						<td>
						Publisher
						</td>
						<td>
						<select name="pub">
						<?php
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

$query="select pub_id,name from publisher"; 

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
<tr><td>&nbsp;</td></tr>
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
							<OPTION VALUE=1987>1987						<OPTION VALUE=1988>1988
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
<input type="hidden" name="flag3" value=1 />
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

<table id="addp" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
				<form name="add_pubn" action="<?= $_SERVER['PHP_SELF']; ?>" method=POST onSubmit="return add_val()">
					<tr>

						<td>Title&nbsp&nbsp</td>
						<td>
						<input type="text" name="name" ONFOCUS="clear(this)">
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
						<option value='Newspaper'>
						<option value='Magazine'>
						</select></td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						<tr>
						<td>
						Availability
						</td>
						<td>
						<select name="avail">
						<option value='y'>Yes
						<option value='n'>No
						</select>
						</td>
						</tr>
						
						<tr><td>&nbsp;</td></tr>
						
						<tr>
						<td>
						Publisher
						</td>
						<td>
						<select name="pub">
						<?php
$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect ' . pg_last_error());

$query="select pub_id,name from publisher"; 

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
<tr><td>&nbsp;</td></tr>
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
							<OPTION VALUE=1987>1987						<OPTION VALUE=1988>1988
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
<input type="hidden" name="flag3" value=1 />
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


if(isset($_POST['flag3']))
{

unset($_POST['flag3']);

$dbconn=pg_connect("host=localhost dbname=db_b090437cs user=b090437cs password=may21991") or die('Could not connect' . pg_last_error());

$month=$_POST['formMonth']+1;

$query="insert into books values('".$_POST['pub']."','".$_POST['isbn']."','".$_POST['avail']."','".$_POST['fname']."','".$_POST['price']."','".$_POST['edn']."','".$_POST['cat']."','".$_POST['lname']."','".$month."-".$_POST['formDate']."-".$_POST['formYear']."','".$_POST['title']."')";

$result=pg_query($dbconn,$query);


if($result)
{

?>

<script type="text/javascript">
alert("Book successfully added !");
window.location = "books.php"
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

</body>
</html>
