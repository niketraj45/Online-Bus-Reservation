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

pub{

text-align:center;	

background-color: blue;

position:absolute;
	height: 40px;
	width: 100px;
        top:145;
        left:350px;
}


puk{

text-align:center;	

background-color: blue;

position:absolute;
	height: 59px;
	width: 270px;
        top:155;
        left:550px;
}


body
{
background-color:white;
}


pub{

text-align:center;	

background-color: blue;

position:absolute;
	height: 40px;
	width: 900px;
        top:145;
        left:230px;
}


pun{

text-align:center;	

background-color: blue;

position:absolute;
	height: 40px;
	width: 550px;
        top:145;
        left:360px;
}

crt{

text-align:center;




font-family:Britannic;
background-color:skyblue;
position:absolute;
	height: 60px;
	width: 480px;
        top:150px;
       left:430px;

}


crt{

text-align:center;
font-family:Britannic;
background-color:red;
position:absolute;
	height: 40px;
	width: 580px;
        top:150px;
       left:370px;

}



bk{
border: 2px solid black;
border-radius: 6px;
text-align:center;

background-color:blue;


	height: 40px;
	width: 480px;
position:absolute;
        top:250px;
       left:430px;

}

nw
{
border: 1px solid blue;
border-radius: 6px;
text-align:center;

background-color:lightgreen;
height: 40px;
width: 320px;
position:absolute;
        top:380px;
       left:505px;

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

$email='';
$mob='';

if (isset($_POST['email']))
{
$email=$_POST['email'];
}


if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}


$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid   ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$row=mysqli_fetch_array($retval);


if ($row['pnr'] != ''  )
{


$sql = "SELECT email,pnr,bid,fromLoc,toLoc,dep_date,dep_time ,arr_time,fare,mob,status FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='booked'  ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$row=mysqli_fetch_array($retval);

if ($row['pnr'] != ''  )
{


$count=0;
echo "
<puk>
<font face='Impact' font size='7' color='yellow'>Your Tickets</font>
</puk>
<br><br><br>

<center><table border='3' style='border-color: green; cellspacing='11' cellpadding='11'>
<tr>
<th border='2'>select</th>
<th border='2'>Route_id</th>
<th border='2'>Bus_id</th>
<th border='2'>PNR</th>

<th border='2'>From</th>
<th border='2'>To</th>
<th border='2'>Journey Date</th>
<th border='2'>Time</th>
<th border='2'>Arival time</th>
<th border='2'>Fare(&#8377;)</th>
<th border='2'>Status</th>


</tr border='2'>";

$sql = "SELECT * FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='booked' ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo"<center><form action='printmulti.php' method='post'><input type='submit'  value='print selected'></center><br>";
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$count=1;
 echo "<tr>";

echo "<td border='2'> <center><input type='checkbox'  name='pnr[]'  value=". $row['pnr']."</form></center></td>";
echo "<td border='2'><center>". $row['rid']."</center></td>";
echo "<td border='2'><center>". $row['bid']."</center></td>";
echo "<td border='2'> <center>". $row['pnr']."</center></td>";


echo "<td border='2'><center>" . $row['fromLoc']. "</center></td>";

echo "<td border='2'><center>". $row['toLoc']."</center></td>";

echo "<td border='2'><center>" . $row['dep_date']."</center> </td>";

echo "<td border='2'><center>". $row['dep_time']."</center></td>";

echo "<td border='2'><center>" . $row['arr_time']. "</center></td>";

echo "<td border='2'><center>". $row['fare']."/-</center></td>";
echo "<td border='2'><center>". $row['status']."</center></td>";

echo "</tr border='2'>";
} 
echo "</center></table>


<br><br><p>
<br><br><br><br><br><br>";
}
else
{

$sql = "SELECT * FROM reserves,passenger,route WHERE passenger.pid = reserves.pid and email='$email' and mob ='$mob' and reserves.rid=route.rid and status='cancelled' ";
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

echo "<pub><font face='Cursive' font size='5' color='yellow'>Currently You Don't have Any Booked Tickets, Here  is your cancelled Tickets.</font></pub>
<br><br><br>";
echo "<center><table border='3' style='border-color: green; cellspacing='13' cellpadding='13'>
<tr>

<th border='2'>Route_id</th>
<th border='2'>Bus_id</th>
<th border='2'>PNR</th>
<th border='2'>From</th>
<th border='2'>To</th>
<th border='2'>Journey Date</th>
<th border='2'>Time</th>
<th border='2'>Arival time</th>
<th border='2'>Fare(&#8377;)</th>
<th border='2'>Status</th>


</tr border='2'>";



while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$count=1;
 echo "<tr>";
echo "<tr border='2'>";




echo "<td border='2'> <center>". $row['rid']."</center></td>";
echo "<td border='2'><center>". $row['bid']."</center></td>";
echo "<td border='2'> <center>". $row['pnr']."</center></td>";
echo "<td border='2'><center>" . $row['fromLoc']. "</center></td>";

echo "<td border='2'><center>". $row['toLoc']."</center></td>";

echo "<td border='2'><center>" . $row['dep_date']."</center> </td>";

echo "<td border='2'><center>". $row['dep_time']."</center></td>";

echo "<td border='2'><center>" . $row['arr_time']. "</center></td>";

echo "<td border='2'><center>". $row['fare']."/-</center></td>";
echo "<td border='2'><center>". $row['status']."</center></td>";


echo "</tr border='2'>";
} 
echo "</center></table><p>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

";

}





}

else if ( $email ==  ''  && $mob == '')
{
echo "
<pun>
<font face='Cursive' font size='5' color='yellow'>Please Enter Your email id & Mobile Number...</font></a>
</pun>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
";

}




else
{
echo "
<crt>
<font face='Cursive' font size='5' color='yellow'>Please Enter Correct email id Or Mobile Number...</font></a>
</crt>
<br><br><br><center><font face='Cursive' font size='5' color='blue'>OR</font></center> <br>

<bk>
<font face='Cursive' font size='5' color='yellow'>You Have not booked any Tickets yet...</font></a>
</bk>

<nw>
<a href='book.html'><font face='Arial' font size='6' >Book Tickets Now<br></font></a>
</nw>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

";
}


mysqli_close($con);
?>

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