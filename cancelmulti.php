<html>

<head>

<title> Star Bus </title>
</head>
<style>

k{


color:green;
font-size:20px;

background-color:#f28858;
height:100px;
width:1345px;
position:absolute;
          top:1px;

left:0px;
right:0px;
}


n{


color:white;
font-size:20px;

background-color:#f28858;
height:220px;
width:100%;
position:absolute;
    left:0px;   
}



nav {


	
	background-color:#f28858;
	height: 40px;
	width: 1345px;
	position:absolute;
        top:97;
         right:0px;
}

nav ul{
list-style-type:none;
float:right;
}
nav li{
float:left;
margin-right:12px;
}

div{
position:absolute;
top:200px;
right:80px;

border:1px solid black;
background:skyblue;
width:400px;
border-radius:15px;
}





<style>






body
{
background-color:white;
}


pub{

text-align:center;	

background-color: blue;

position:absolute;
	height: 40px;
	width: 400px;
        top:145;
        left:200px;
}


</style>


<k>

<nav>
 <ul >
			 <li><a href="index.html"><font face="Gunplay" font size="4" color="white">HOME</a></li></font>	
				            <li><a href="about.html"><font face="Gunplay" font size="4" color="white">About</a></li></font>
				          <li><a href="mybookings.html"><font face="Gunplay" font size="4" color="white">My Booking</a></li></font>
					 <li><a href="cancellation.html"><font face="Gunplay" font size="4" color="white">Cancellation</a></li></font>
				         <li><a href="print.html"><font face="Gunplay" font size="4" color="white">Print Ticket</a></li></font>
				            <li><a href="contact.html"><font face="Gunplay" font size="4" color="white">Contact Us</a></li></font>
				          </ul></nav>

<imgl> 
&#160;&#160;&#160;&#160;<img src="images/logo.png" />
</imgl>
</k>





<br><br><br><br><br><br><br><br>


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
echo "<h1>Selected Tickets : ";
for ($i=0; $i<$n; $i++)
	{

$sqll = "UPDATE reserves  SET status = 'cancelled' WHERE  pnr  = '$apnr[$i]' ";
		if (!mysqli_query($con,$sqll))
		{
  		die('Error: ' . mysqli_error($con));
		}
echo "<font face='System' font size='6' color='black'>  " .$apnr[$i]. " ";

}

echo " <font face='System' font size='6' color='black'>&#160;are successfully Cancelled.</font></h1>";


$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$apnr[0]' and reserves.rid=route.rid " ;
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
<font face='System' font size='4' color='black'>Name : ". $row['name'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
". $row['fromLoc'] . " to ". $row['toLoc'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;


Date : ". $row['dep_date'] . "  Time: ". $row['dep_time'] ."

<br><br>
Mobile: ". $row['mob'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
Bus_id : ". $row['bid'] . "
&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
Total Fare : ".$n." *". $row['fare'] . " = &#8377;&#160;".$n *  $row['fare'] ."/-
<br><br>
Email: ". $row['email'] . "
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

 <font face='impact' font size='5' color='red'>". $row['status'] . "</font>
&#160;&#160;&#160;&#160;


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


</table>	</center>";





	
}




mysqli_close($con);
?>

<br><br><br><br><br><br><br><br><br> 
<n>
<font face="Gunplay" font size="3" color="white"><h3>&#160;&#160;About STAR Bus Booking</h3></font>
			   	<font face="Gunplay" font size="2" color="white"><p>&#160;&#160;Star Bus  is a registerd online bus booking website by the Our Star team. <br>&#160;&#160;Any issues can be brought up to the judicial of the Bangalore High Court, Bangalore.  </p></font>
			    <ul >
			    <li><a href="about.html">	<font face="Gunplay" font size="2" color="white">About</a> </li></font>
			    <li><a href="tc.html">	<font face="Gunplay" font size="2" color="white">Term of Services</a> </li></font>
			    	
			    </ul> 

<font face="Gunplay" font size="2" color="white">&#160;&#160;STAR BUS BOOKING COPYRIGHT © 2002-2015 ALL RIGHT RESERVED.&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
	




</font>
<img2> 
<img src="soc.png" />
</img2>

</n>

</body>
</html>