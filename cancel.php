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
				            <li><a href="support.html"><font face="Gunplay" font size="4" color="white">Support</a></li></font>
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
$mob='';

if (isset($_POST['pnr']))
{
$pnr=$_POST['pnr'];
}

if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}




//s$sql = "SELECT  pnr,mob,status FROM reserves,passenger WHERE passenger.pid = reserves.pid and pnr='$pnr' and mob ='$mob' " ;
$sql = "SELECT email,name,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and pnr='$pnr' and mob ='$mob' and reserves.rid=route.rid " ;

$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
echo " ticket number doesn't exists";
}
$row=mysqli_fetch_array($retval);
if ($row['mob'] == $_POST['mob'] && $row['pnr'] == $_POST['pnr'] && $row['status'] == 'booked' )
{

$sqll = "UPDATE reserves  SET status = 'cancelled' WHERE  pnr  = '$pnr' ";
	if (!mysqli_query($con,$sqll))
	{
  		die('Error: ' . mysqli_error($con));
}

echo"<h1>Ticket Number : " .$pnr . " is successfully Cancelled.</h1>
<br>
<center><table border='3' style='border-color: black; cellspacing='11' cellpadding='11' ;'width =70%'><h2>

<tr><th>PNR :<th> " .$pnr . " <th>Name :<th> ". $row['name'] . "</tr>
<tr><th>Date :  <th>". $row['dep_date'] . "<th>Mobile :<th> ". $row['mob'] . "</tr>


<tr><th>Time : <th>". $row['dep_time'] ."<th>Email : <th>". $row['email'] . "  </tr>
<tr><th>Bus_id : <th>". $row['bid'] . "<th>Status<th> <font face='Franklin Gothic' font size='4' color='red'> cancelled</font></tr>
<tr><th>". $row['fromLoc'] . "    <th>to&#160;&#160; ". $row['toLoc'] . "  
<th>Fare :<th>&#8377;&#160;". $row['fare'] . "/-</tr>




</table>

<br>


<form action='printmulti.php' method='post'><input type='hidden'  name='pnr[]'  value=". $row['pnr']."</form><input type='submit' value='print'>

</center>

}









<br><br><br>";
}

else if ($row['mob'] == $_POST['mob'] && $row['pnr'] == $_POST['pnr'] && $row['status'] == 'cancelled' )
{
echo"<h1>Ticket Number: " .$pnr . " has been <u>Cancelled Already </h1></u>


<center><table border='3' style='border-color: black; cellspacing='11' cellpadding='11' ;'width =70%'><h2>

<tr><th>PNR :<th> " .$pnr . " <th>Name :<th> ". $row['name'] . "</tr>
<tr><th>Date :  <th>". $row['dep_date'] . "<th>Mobile :<th> ". $row['mob'] . "</tr>


<tr><th>Time : <th>". $row['dep_time'] ."<th>Email : <th>". $row['email'] . "  </tr>
<tr><th>Bus_id : <th>". $row['bid'] . "<th>Status<th> <font face='Franklin Gothic' font size='4' color='red'> ". $row['status'] . "</font></tr>
<tr><th>". $row['fromLoc'] . "    <th>to&#160;&#160; ". $row['toLoc'] . "  
<th>Fare :<th>&#8377;&#160;". $row['fare'] . "/-</tr>




</table>

<br><form action='printmulti.php' method='post'><input type='hidden'  name='pnr[]'  value=". $row['pnr']."</form><input type='submit' value='print'>

</center>




<br><br><br>";

}
else
{
echo "<h1>Invalid Ticket number Or Mobile number
<br><br><br><br><br><br><br>

</h1>";

}




mysqli_close($con);
?>

<n>
<font face="Gunplay" font size="3" color="white"><h3>&#160;&#160;About STAR Bus Booking</h3></font>
			   	<font face="Gunplay" font size="2" color="white"><p>&#160;&#160;Star Bus  is a registerd online bus booking website by the Our Star team. <br>&#160;&#160;Any issues can be brought up to the judicial of the Bangalore High Court, Bangalore.  </p></font>
			    <ul >
			    <li><a href="about.html">	<font face="Gunplay" font size="2" color="white">About</a> </li></font>
			    <li><a href="#">	<font face="Gunplay" font size="2" color="white">Term of Services</a> </li></font>
			    	
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