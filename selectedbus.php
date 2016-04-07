<head>

<title> Star Bus </title>
</head>


<style>



k{


color:green;
font-size:20px;

background-color:#f28858;
height:100px;
width:1365px;
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
	width: 1365px;
	position:absolute;
        top:97;
        right:0px;
left:0px;
}

nav ul{
list-style-type:none;
float:right;
}
nav li{
float:left;
margin-right:12px;
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
	width: 400px;
        top:145;
        right:470px;
}

puk{

text-align:center;	

background-color: red;

position:absolute;
	height: 40px;
	width: 600px;
        top:145;
        right:400px;
}



div{
position:absolute;
top:280px;
left:475px;

border:1px solid black;
background:skyblue;
height:250px;
width:400px;
border-radius:15px;
}




</style>

<body>




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




<br><br><br><br><br><br><br><br><br>



<?php 
$con=mysqli_connect("localhost","root","niket123","bus_ticket");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$pid='';
$rid='';
$name='';
$email_id='';
$mob='';
$no_of_tickets='';
$date='';
$mode_sel='';

if (isset($_POST['rid']))
{
$rid=$_POST['rid'];
}



$sql='SELECT pid from passenger';
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{
$pid = $row['pid'] + 1;
}






if (isset($_POST['name']))
{
$name=$_POST['name'];
}


if (isset($_POST['email_id']))
{
$email_id=$_POST['email_id'];
}

if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}








if (isset($_POST['no_of_tickets']))
{
$no_of_tickets=$_POST['no_of_tickets'];
}



if (isset($_POST['date']))
{
$date=$_POST['date'];
}




if (isset($_POST['mode']))
{
$mode_sel=$_POST['mode'];
}







$sql = "SELECT avalseats from route where rid ='$rid' " ; 
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
$row=mysqli_fetch_array($retval);


if($mode_sel == 1 && $no_of_tickets <= $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '' && $date != '' ) 
{
echo"<pub>
<font face='Cursive' font size='5' color='yellow'>Complete Your Payment</font></a>
</pub>";


$sql="INSERT INTO passenger(pid,name,email,mob )
VALUES ('$pid','$name','$email_id','$mob')";

	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$fare='';
$totalfare='';
$sql = "SELECT fare from route where rid ='$rid' " ; 
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$fare =$row['fare'];

}
$totalfare=$fare*$no_of_tickets;

echo"<h2><font face='Arial' font size='3' color='black'><center><br><br>Total Amount : &#8377;&#160;"."$fare "."  * "."$no_of_tickets "." Seat(s) = &#8377;    "."$totalfare "."/-</h2><br></font></center>";




echo"<center><form action='paycard.php' method='post'>
<div class='transbox'><br>
<font face='Script MT' font size='4' color='black'>&#160;&#160;&#160;&#160;Select Bank&#160;:&#160;&#160;&#160;&#160;&#160;</font>
<select name='bank' >
<option value='SBI'>SBI</option>
<option value='Bank of India'>Bank of India</option>
<option value='HDFC'>HDFC</option>
<option value='ICICI'>ICICI</option>
<option value='PNB'>PNB</option>
<option value='YES'>YES</option>
<option value='Karnataka Bank'>Karnataka Bank</option>
<option value='Kotak Bank'>Kotak Bank</option>
<option value='Allahabad Bank'>Allahabad Bank</option>
<option value='Axis Bank'>Axis Bank</option>
<option value='RBS'>RBS</option>
<option value='Bank of Baroda'>Bank of Baroda</option>
<option value='City Union Bank'>City Union Bank</option>
<option value='Corporation Bank'>Corporation Bank</option>
<option value='IDBI'>IDBI</option>
<option value='Deutsche Bank'>Deutsche Bank</option>
<option value='Federal Bank'>Federal Bank</option>
<option value='IOB'>IOB</option>
<option value='Central Bank of India'>Central Bank of India</option>
<option value='Bank of Maharashtra'>Bank of Maharashtra</option>
<option value='Dhanlaxmi'>Dhanlaxmi</option>

<option value='Indian Bank'>Indian Bank</option>
<option value='Lakshmi Vilas Bank'>Lakshmi Vilas Bank</option>
<option value='Vijaya Bank'>Vijaya Bank</option>
<option value='South Indian Bank'>South Indian Bank</option>
<option value='Citibank'>Citibank</option>
<option value='United Bank'>United Bank</option>
<option value='Union Bank'>Union Bank</option>
<option value='J & K Bank'>J & K Bank</option>
<option value='Catholic Syrian Bank'>Catholic Syrian Bank</option>
<option value='ING VYSYA Bank'>ING VYSYA Bank</option>
<option value='Standard Chartered'>Standard Chartered</option>



<option value='Canara Bank'>Canara Bank</option>
</select>
<br><br>
<font face='Script MT' font size='4' color='black'>Card Type&#160;:&#160;&#160;&#160;&#160;&#160;</font>
<select name='type' >
<option value='VISA'>	VISA</option>
<option value='Master Card'>	Master Card</option>


<option value='Mastreo'>Mastreo</option>
<option value='Rupay'>Rupay</option>
<option value='American Express'>American Express</option>

</select>
<br><br>
<font face='Script MT' font size='4' color='black'>Card Number:</font>
<input type='text' name='num'>
<br><br>
<font face='Script MT' font size='4' color='black'>CVV No.
:</font>
<input type='password' name='cvv'>
<br>
<font face='Script MT' font size='4' color='black'><br>Expiry Date :</font>
<input type='date' name='expdate'>
<input type='hidden'  name='no_of_tickets' value='$no_of_tickets'>
<input type='hidden'  name='pid' value='$pid'>
<input type='hidden'  name='rid' value='$rid'>
<input type='hidden'  name='status' value='booked'>


<br><br>
<input type='submit' value='Go'></center>
</p>
</div></f>
</form></center>
<br><br><br><br><br><br><br><br><br><br><br>
";
}




 else if($mode_sel == 2 && $no_of_tickets <= $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '' && $date != '') 
{

echo"<pub>
<font face='Cursive' font size='5' color='yellow'>Complete Your Payment</font></a>
</pub>
";


$sql="INSERT INTO passenger(pid,name,email,mob )
VALUES ('$pid','$name','$email_id','$mob')";

	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));
}

$fare='';
$totalfare='';
$sql = "SELECT fare from route where rid ='$rid' " ; 
$retval = mysqli_query( $con, $sql);
if(! $retval )
{
  die('Could not get data: ' . mysql_error());

}
while($row = mysqli_fetch_array($retval,MYSQL_ASSOC))
{

$fare =$row['fare'];

}
$totalfare=$fare*$no_of_tickets;

echo"<h2><font face='Arial' font size='3' color='black'><center><br><br>Total Amount : 
&#8377;&#160;"."$fare "."  * "."$no_of_tickets "." Seat(s) = &#8377;    "."$totalfare "."/-</h2><br></font></center>";


echo"<form action='paynb.php' method='post'>
<center><div class='transbox'><br><br>
<font face='Script MT' font size='6' color='black'>Select Bank&#160;:</font>
<select name='bank' >
<option value='SBI'>SBI</option>
<option value='Bank of India'>Bank of India</option>
<option value='HDFC'>HDFC</option>
<option value='ICICI'>ICICI</option>
<option value='PNB'>PNB</option>
<option value='YES'>YES</option>
<option value='Karnataka Bank'>Karnataka Bank</option>
<option value='Kotak Bank'>Kotak Bank</option>
<option value='Allahabad Bank'>Allahabad Bank</option>
<option value='Axis Bank'>Axis Bank</option>
<option value='RBS'>RBS</option>
<option value='Bank of Baroda'>Bank of Baroda</option>
<option value='City Union Bank'>City Union Bank</option>
<option value='Corporation Bank'>Corporation Bank</option>
<option value='IDBI'>IDBI</option>
<option value='Deutsche Bank'>Deutsche Bank</option>
<option value='Federal Bank'>Federal Bank</option>
<option value='IOB'>IOB</option>
<option value='Central Bank of India'>Central Bank of India</option>

<option value='Bank of Maharashtra'>Bank of Maharashtra</option>
<option value='Dhanlaxmi'>Dhanlaxmi</option>

<option value='Indian Bank'>Indian Bank</option>
<option value='Lakshmi Vilas Bank'>Lakshmi Vilas Bank</option>
<option value='Vijaya Bank'>Vijaya Bank</option>
<option value='South Indian Bank'>South Indian Bank</option>
<option value='Citibank'>Citibank</option>
<option value='United Bank'>United Bank</option>
<option value='Union Bank'>Union Bank</option>
<option value='J & K Bank'>J & K Bank</option>
<option value='Catholic Syrian Bank'>Catholic Syrian Bank</option>
<option value='ING VYSYA Bank'>ING VYSYA Bank</option>
<option value='Standard Chartered'>Standard Chartered</option>



<option value='Canara Bank'>Canara Bank</option>

</select>
<br><br>

<center>
<font face='Script MT' font size='6' color='black'>&#160;&#160;&#160;username :</font>
<input type='text' name='uname'>
<br><br>
<font face='Script MT' font size='6' color='black'>&#160;&#160;&#160;password :</font>
<input type='password' name='password'>
<input type='hidden'  name='no_of_tickets' value='$no_of_tickets'>
<input type='hidden'  name='pid' value='$pid'>
<input type='hidden'  name='rid' value='$rid'>
<input type='hidden'  name='status' value='booked'>

<br><br>
<br></center>
<center>
<input type='submit' value='Go'></center>
</p>
</div></center></f>
</form>
<br><br><br><br><br><br><br><br><br><br><br>


";
}






else if($mode_sel == 1  && $no_of_tickets > $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != ''  && $date != '') 
{

echo" <puk><font face='Cursive' font size='5' color='yellow'>Sorry.. Only " .$row['avalseats'] . " seats Are Available in selected Bus......</puk></font> ";
}


else if($mode_sel == 2  && $no_of_tickets > $row['avalseats']  && $rid != '' && $name != '' && $email_id != '' && $mob != '' && $date != '')
{

echo"<puk> <font face='Cursive' font size='5' color='yellow'>Sorry.. Only " .$row['avalseats'] . " seats Are Available in selected Bus...</puk> </font>";
}







else
{

echo "
<pub>
<font face='Cursive' font size='5' color='yellow'>Invalid Payment Option </font></a>
</pub>

<center><br><font face='Cursive' font size='6' color='blue'>or<br> You have not selected any Bus Route</center></font>
<center><br><font face='Cursive' font size='6' color='blue'>or<br> Fill the Form Correctly</center></font>

";



}







mysqli_close($con);
?>




<br>

<br><br><br>
<n>
<font face="Gunplay" font size="3" color="white"><h3>&#160;&#160;About STAR Bus Booking</h3></font>
			   	<font face="Gunplay" font size="2" color="white"><p>&#160;&#160;Star Bus  is a registerd online bus booking website by the Our Star team. <br>&#160;&#160;Any issues can be brought up to the judicial of the Bangalore High Court, Bangalore.  </p></font>
			    <ul >
			    <li><a href="about.html">	<font face="Gunplay" font size="2" color="#FFF">About</a> </li></font>
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

