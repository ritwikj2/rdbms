<?php
include('connection.php');

?>

<!DOCKTYPE HTML>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="stylesheet.php">-->
</head>
<!--<body class="center">
<form action="datasearch.php" method="GET">
<label >Which type of pesticide you need?</label>
<select name="pesttype">
	<option value="Insecticide">Insecticide</option>
	<option value="Alge">Algeacide</option>
	<option value="wetting">Wetting Agent</option>
	<option value="fungi">Fungicide</option>
	<option value="Bio Pesticide">Bio Pesticide</option>


</select>
<br>
<br>
<button class="search" type="submit" name="search" value="chin">Search</button>
</form>


</body>
-->
<body>
	<div style="background-color: #ccff99;margin-bottom:20px;">
		<h3 style="margin-left:499px; font-family: times new roman;font-size: 30px; ">Search Pesticide</h3> 
      

	</div>
	
	
	<?php
	
	$sql="select distinct(product_type) from product_detail;";
	$result=mysqli_query($con,$sql);
	echo "<div style=\"margin-top:40px;margin-left:200px;  \">";
	echo "<form action='search.php' method=\"GET\">";
	echo "<label for='type' style='font-size:20px; '>Select the pesticide type </label>";
	echo "<select name='type' class=\"btn btn-danger dropdown-toggle\" style=\"margin-left:10px;\">";
	echo "</div>";
	while($d=mysqli_fetch_array($result,MYSQLI_NUM))
{

	echo "<option class=\"dropdown-item\" value=\"$d[0]\" style='font-family:geneva'>".$d[0]."</option>";
	
}

?>
<div>
<br>
<?php
echo "<br>";
echo "<input type=\"submit\" value=\"Search\"class=\"btn btn-dark\" style=\"margin-left:50px;\">";

echo "</div>";
echo ""."<br>"."</form>";
?>





<?php
if(isset($_GET['type']))
{
$type=$_GET['type'];


//echo $type;
//$con=mysqli_connect("localhost","root","","pesticide");
$sql= 'select product_name,quantity,company,price from product_detail where product_type="'.$type.'";';
$result=mysqli_query($con,$sql);

//echo "$result";
echo "<div style=\" margin-left:0px; \">";
echo "<table class=\"table table-striped\">
<thead class=\"thead-dark\">
<tr>
<th >Product Name</th>
<th>Quantity</th>
<th>Company</th>
<th width=50>Price</th>
</thead>
</tr>";
}
$check=mysqli_num_rows($result);
if($check>0)

{
	while($a=mysqli_fetch_array($result))

	{
			
					//echo "<tr><td>".$a['product_name']."</tr><td>".$a['quantity']."</tr><td>".$a['company']."</tr><td>".$a['price']."</td></tr>";
			//echo  $a['product_name'] ;
	 	echo "<tr height=80>";
		echo "<td>".$a['product_name']."</td>";
		echo "<td>".$a['quantity']."</td>";
		echo "<td>".$a['company']."</td>";
		echo "<td>".$a['price']."</td>";
		echo "</tr>";

	}
	echo "</table>";
}
echo "</div>";


?>







</body>
</html>








