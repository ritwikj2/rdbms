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

</head>
<body>



<form action="" method="POST">

<input type="text" placeholder="Enter crop name" name="crop">
<input type="submit" name="boton" value="Search" class="btn btn-dark" style="margin-left:50px;">

</form>


<?php
if(isset($_POST['boton']))
{
	$crop=$_POST['crop'];
	
    $sql="select product_name,quantity,company,price from product_detail pd,pesticide_usage pu where pd.product_id=pu.product_id and pu.crops like '%$crop%';";
    $temp=mysqli_query($con,$sql);
    $check=mysqli_num_rows($temp);
    if($check>0)
    {
    	$sql1="select product_name,quantity,company,price from product_detail pd,pesticide_usage pu where pd.product_id=pu.product_id and pu.crops like '%$crop%' union select product_name,quantity,company,price from product_detail pd,pesticide_usage pu where pd.product_id=pu.product_id and pu.crops like '%any_crops%';";
        $temp2=mysqli_query($con,$sql1);


 echo "<div style=\" margin-left:0px; \">";
echo "<table class=\"table table-striped\">
<thead class=\"thead-dark\">
<tr>
<th >Product Name</th>
<th>Quantity</th>
<th>Company</th>
<th >Price</th>
</thead>
</tr>";
}
else
{
	echo '<script> alert("data not found");</script>';
	exit();
}

$check1=mysqli_num_rows($temp2);
if($check1>0)

{
	while($b=mysqli_fetch_array($temp2))

	{
			
					//echo "<tr><td>".$a['product_name']."</tr><td>".$a['quantity']."</tr><td>".$a['company']."</tr><td>".$a['price']."</td></tr>";
			//echo  $a['product_name'] ;
	 	echo "<tr>";
		echo "<td>".$b['product_name']."</td>";
		echo "<td>".$b['quantity']."</td>";
		echo "<td>".$b['company']."</td>";
		echo "<td>".$b['price']."</td>";
		echo "</tr>";

	}
	echo "</table>";
}
echo "</div>";

}
?>

</body>
</html>