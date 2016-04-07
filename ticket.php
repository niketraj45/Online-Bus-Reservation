<html>


<?php 
$con=mysqli_connect("localhost","root","niket123","bus_ticket");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$pid='';
$no_of_tickets='';

if (isset($_POST['pid']))
{
$pid=$_POST['pid'];
}

if (isset($_POST['no_of_tickets']))
{
$no_of_tickets=$_POST['no_of_tickets'];
}




$sql = " SELECT * FROM reserves,route WHERE  reserves.rid=route.rid and pid='$pid' " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);
echo "<center><table border='3' style='border-color: black; cellspacing='11' cellpadding='11' ;'width =70%'>
<td><imgl> 
&#160;&#160;&#160;&#160;<img src='images/logo.png' />
</imgl>
<br>
<br>
<br>

<font face='System' font size='4' color='black'>Bus_id : ". $row['bid'] . "
&#160;&#160;&#160;&#160;&#160;&#160;

". $row['fromLoc'] . " to ". $row['toLoc'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;

Departure : ". $row['dep_date'] . "  ". $row['dep_time'] ."

<br><br>
Pid: ". $row['pid'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; ";


echo"

Total Fare : ". $no_of_tickets." * ".$row['fare']." =&#160;&#8377; ". $no_of_tickets * $row['fare']
."/-
&#160;&#160;&#160;
Arrival : ". $row['arr_date'] . "  ". $row['arr_time'] . "
<br><br>";

echo"DOT : ". $row['DOT'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

 <font face='impact' font size='5' color='red'>". $row['status'] . "</font>
&#160;&#160;&#160;&#160;

<br><br>

<table border='1' style='border-color: black; cellspacing='5' cellpadding='5' ;'width =70%'>
<tr><td>Tickets Numbers</tr>";


$sql = " SELECT * FROM reserves WHERE  pid='$pid' " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{
echo "<tr><td border='2'> <center>". $row['pnr']."</center></tr>";
}


echo"</table>


</table>	</center>";
mysqli_close($con);
?>
</html>