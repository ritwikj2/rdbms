<?php
include 'connection.php'
?>
<!DOCKTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<?php
$cityname=$_GET['city'];
$sql='select dealer_name,shop_name,phone_no,city,landmark,zip_code,state from dealer_detail dd,dealer_address da where dd.dealer_license=da.dealer_license && da.city="'.$cityname.'";';
$result=mysqli_query($con,$sql);
$check=mysqli_num_rows($result);
if($check>0)
{
	echo "<table>
<tr>
<th>Dealer_name</th>
<th>Shop_name</th>
<th>Phone_no</th>
<th>City</th>
<th>Landmark</th>
<th>Zip_code</th>
<th>State</th>";
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
else
{

	echo "No dealer is available in your city";
}
?>
</body>
</html>

