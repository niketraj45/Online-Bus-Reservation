
<?php
$con=mysqli_connect("localhost","root","niket123","bus_ticket");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$pid='';
$name='';
$mob='';
$email='';
$password='';

if (isset($_POST['pid']))
{
$pid=$_POST['pid'];
}

if (isset($_POST['name']))
{
$name=$_POST['name'];
}

if (isset($_POST['mob']))
{
$mob=$_POST['mob'];
}


if (isset($_POST['email']))
{
$email=$_POST['email'];
}

if (isset($_POST['password']))
{
$password=$_POST['password'];
}




$sqll="select pid from passenger";
$retval=mysqli_query($con,$sqll);
$flag=1;

if($flag==1)
{
while($row=mysqli_fetch_array($retval,MYSQL_ASSOC))
{
	if($pid==$row['pid'])
	{
		
header("Location:next.html");
	}

}

}

if($flag==1){	
$sql="INSERT INTO passenger(pid,name,mob,email,password )
	VALUES ('$pid','$name','$mob','$email','$password')";

	if (!mysqli_query($con,$sql))
	{
  		die('Error: ' . mysqli_error($con));

	}
}

 header("Location:#");


mysqli_close($con);
?>
