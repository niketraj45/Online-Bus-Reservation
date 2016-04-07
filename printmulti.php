<html>

<head>

<title> Star Bus </title>
</head>

<?php 
$con=mysqli_connect("localhost","root","niket123","bus_ticket");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$pnr='';

$apnr=$_POST['pnr'];


if (empty($apnr))
{
echo("plz select");
}


else
{
$n=count($apnr);
$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$apnr[0]' and reserves.rid=route.rid " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);
echo "<br><br><center><table border='3' style='border-color: black; cellspacing='11' cellpadding='11' ;'width =70%'>
<td><imgl> 
&#160;&#160;&#160;&#160;<img src='images/logo.png' />
</imgl>
<br>
<br>
<br>
<font face='System' font size='4' color='black'>Name : ". $row['name'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

". $row['fromLoc'] . " to ". $row['toLoc'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;


Date : ". $row['dep_date'] . "  Time: ". $row['dep_time'] ."

<br><br>
Mobile: ". $row['mob'] . "
&#160;&#160;&#160;&#160;&#160;
Bus_id : ". $row['bid'] . "
&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
Total Fare : ".$n." *". $row['fare'] . " = &#8377;&#160;".$n *  $row['fare'] ."/-
<br><br>
Email: ". $row['email'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

 <font face='impact' font size='5' color='red'>". $row['status'] . "</font>
&#160;&#160;&#160;&#160;

<img src='paid.png'  width='35px' height='35px' />
<br><br>

<table border='1' style='border-color: black; cellspacing='5' cellpadding='5' ;'width =70%'>
<tr><td>Tickets Numbers</tr>";
for ($i=0; $i<$n; $i++)
	{

$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$apnr[$i]' and reserves.rid=route.rid " ;
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);


echo "

<tr><td>".$apnr[$i]."</tr>";

}
echo"</table>


</table>	


";


	
}




mysqli_close($con);
?>


</body>
</html>