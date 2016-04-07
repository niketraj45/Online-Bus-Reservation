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



<pub>
<font face="Cursive" font size="5" color="yellow">Available Buses</font></a>
</pub>



<br><br><br><br><br><br><br><br>
<?php
$con=mysqli_connect("localhost","root","niket123","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="UPDATE route  SET avalseats = maxseats-(select count(rid) from 
reserves where rid=route.rid and status='booked' )   ";



	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}




$from='';
$to='';
$date='';


if (isset($_POST['fromLoc']))
{
$from=mysqli_real_escape_string($con,$_POST['fromLoc']);

}

if (isset($_POST['toLoc']))
{
$to=mysqli_real_escape_string($con,$_POST['toLoc']);
}

if (isset($_POST['dep_date']))
{
$date=mysqli_real_escape_string($con,$_POST['dep_date']);
}

echo" <font face='Gunplay' font size='4' color='Black'><br> <br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; 

&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
For<br>
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
 $from To $to  
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; 

&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;
on 
<br>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
&#160;&#160;&#160;&#160;
&#160;&#160;&#160;
 $date </font><br> ";




$count=0;
$sql="select *from bus,route where route.bid=bus.bid  and route.fromLoc='$from ' and route.toLoc= '$to' and route.dep_date='$date ' ORDER BY route.dep_time ASC ";


$retval=mysqli_query($con,$sql);

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo "<table border='3' style='border-color: green; cellspacing='8' cellpadding='8'>
<tr>

<th border='2'><form action='buslist.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'>
<input type='submit' value='Route_id' ></form>
</th>

<th border='2'><form action='sortYbname.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'>
<input type='submit' value='Bus' ></form>
</th>

<th border='2'>
<form action='sortYdtimeA.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'>
<input type='submit' value='Dep_Time' ></form>
</th>

<th border='2'><form action='sortYatime.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Arr_Time' ></form>
</th>

<th border='2'><form action='sortYadate.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Arr_date' ></form>
</th>

<th border='2'><form action='sortYac.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='AC' ></form>
</th>

<th border='2'>
<form action='sortYsl.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Sleeper' ></form>
</th>

<th border='2'><form action='sortYfare.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Fare(&#8377;)' ></form>
</th>

<th border='2'><form action='sortYavl.php' method='post'>
<input type='hidden'  name='fromLoc' value='$from'>
<input type='hidden'  name='toLoc' value='$to'>
<input type='hidden'  name='dep_date' value='$date'><input type='submit' value='Available' ></form>
</th>

<th border='2'>Select
</th>



</tr border='2'>";

$dur='';
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{
	$count=1;





echo "<td border='2'> <center>". $row['rid']."</center></td>";
echo "<td border='2'> <center>". $row['bname']."</center></td>";

echo "<td border='2'><center>" . $row['dep_time']."</center> </td>";

echo "<td border='2'><center>" . $row['arr_time']."</center> </td>";
echo "<td border='2'><center>" . $row['arr_date']."</center> </td>";

echo "<td border='2'> <center>". $row['type_ac']."</center></td>";

echo "<td border='2'><center>". $row['type_sl']."</center></td>";

echo "<td border='2'><center>" . $row['fare']. "</center></td>";

echo "<td border='2'><center>" . $row['avalseats']. "</center></td>";

echo "<td border='2'><center><form action='selectedbus.php' method='post'><input type='radio'  name='rid' value=". $row['rid']." </center></td>";




echo "</tr border='2'>"; }
echo "</table><p>";

 
mysqli_close($con);
?>


<form action="selectedbus.php" method="post">
<div class="transbox">

<center>
<font face="Impact" font size="6" color="Maroon"><u>Fill Your Details</u></font><br>
<br>
<font face="Script MT" font size="4" color="black">Confirm Date :</font>
<input type="date" name="date">
<br>
<br></center>
<font face="Script MT" font size="4" color="black">&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160&#160;&#160;&#160;&#160No. of Tickets&#160;:&#160;&#160;&#160;&#160;&#160;</font>
<select name="no_of_tickets" >
<option value="1">	1</option>
<option value="2">	2</option>
<option value="3">	3</option>
<option value="4">	4</option>
<option value="5">	5</option>
<option value="6">	6</option>
<option value="7">	7</option>
<option value="8">	8</option>
<option value="9">	9</option>


</select>
<br><center>
<br><font face="Script MT" font size="4" color="black">Name&#160;:&#160;&#160;&#160;&#160;&#160;&#160;</font>
<input type= "text" name="name">
<br>
<br></center>
<center>
<font face="Script MT" font size="4" color="black">Email &#160;:&#160;</font>&#160;&#160;&#160;&#160;&#160;
<input type= "email" name="email_id">
<br>

<br>
</center><center>
<font face="Script MT" font size="4" color="black">Mobile &#160;:</font>
&#160;&#160;&#160;&#160;<input type= "number" name="mob" min="0" max= "9999999999">
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<br>
<br><br></center>
<center>
<font face="Script MT" font size="6" color="Maroon"><u>Select Payment Mode</u></font><br><br>
<input type="radio" name="mode" value="1"><font face="Script MT" font size="4" color="black">Debit & Credit Card</font><br>
<input type="radio" name="mode" value="2"><font face="Script MT" font size="4" color="black">Net Banking&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</font><br><br>
</center>




<center>
<input type="submit" value="Book Now"></center>
</p>
</div></f>
</form>

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
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