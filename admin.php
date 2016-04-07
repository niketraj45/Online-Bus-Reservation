<?php 

$con=mysqli_connect("localhost","root","niket123","bus_ticket");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if (isset($_POST['uname']))
{
$uname=$_POST['uname'];
}



$sql="select password from admin where uname='$uname' ";
$res=mysqli_query($con, $sql);
if(!$res)
  {
  die('Error:' . mysql_error()); 
  }


$row=mysqli_fetch_array($res);

if ($row['password'] == $_POST['password'])
{

header("Location:adminhome.html");
}
else
{
header("Location:wrngpwd.html");

}

mysqli_close($con);
?>

