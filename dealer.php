<?php
include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="stylesheet.php">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div style="background-color: #ccff99;margin-bottom:10px;">
		<h3 style="margin-left:499px; font-family: times new roman;font-size: 30px; ">Search Dealer</h3> 


	</div>
	<?php 
	$sql="select distinct(city) from dealer_address";
	$result=mysqli_query($con,$sql);
	
    echo "<div style=\"margin-top:40px;margin-left:200px;  \">";
	echo "<form action='dealer.php' method='GET'>";
echo "<label for='city' style='font-size:20px;'>Select your city name:</label>";
echo "<select name='city' class=\"btn btn-danger dropdown-toggle\" >";
while($d=mysqli_fetch_array($result,MYSQLI_NUM))
{

	echo "<option class=\"dropdown-item\"  value=\"$d[0]\">".$d[0]."</option>";
	
}

echo "<div>";
echo "<input type=\"submit\" value=\"Search\" class=\"btn btn-dark\" style=\"margin-left:50px;\">";
echo "</div>";
echo "<br>";
echo ""."<br>"."</form>";
?>
<br>
<br>


<?php
if(isset($_GET['city']))
{


$cityname=$_GET['city'];
$sql='select dealer_name,shop_name,phone_no,city,landmark,zip_code,state from dealer_details dd,dealer_address da where dd.dealer_license=da.dealer_license && da.city="'.$cityname.'";';
$result=mysqli_query($con,$sql);
$check=mysqli_num_rows($result);
if($check>0)
{
	echo "<table class=\"table table-striped\">
	<thead class=\"thead-dark\">
<tr>
<th>Dealer_name</th>
<th>Shop_name</th>
<th>Phone_no</th>
<th>City</th>
<th>Landmark</th>
<th>Zip_code</th>
<th>State</th>
</thead>
</tr>";
}

	while($b=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$b['dealer_name']."</td>";
		echo "<td>".$b['shop_name']."</td>";
		echo "<td>".$b['phone_no']."</td>";
		echo "<td>".$b['city']."</td>";
		echo "<td>".$b['landmark']."</td>";
		echo "<td>".$b['zip_code']."</td>";
		echo "<td>".$b['state']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>


</body>
</html>