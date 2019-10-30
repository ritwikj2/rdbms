<?php
include 'connection.php';
/*if(isset($_GET['page']))
{
	$page=$_GET['page'];

}
else
{
	$page=1;
}
$num_per_page=5;
$start=($page-1)*5;
#$pg_sql="select product_name,crops,dosage from product_detail pd, pesticide_usage pu WHERE pd.product_id=pu.product_id limit $start,$num_per_page ;";
#$pg_result=mysqli_query($con,$pg_sql);


*/
?>
<!DOCKTYPE HTML>
<html>
<head>
	
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>
<div style="margin-top: 5px;">
	<h3 style="font-family: geneva;padding-top: 10px; text-align: center;">Pesticide Usage</h3>

</div>
<div style="margin-top:20px; margin-bottom: 15px;">
<form>
<input type="text"  placeholder="  search" id="searchtable" onkeyup="searchfun()" style="width: 1500px;">
</form>
</div>

<?php
echo "<div style=\" margin-top:20px;\">";
echo "<table class=\"table table-striped\" id=\"mytable\">
 <thead class=\"thead-dark\">
<tr>
<th>Pesticide_name</th>
<br>
<th>Crops</th>
<th>Dosage</th>
</thead>
</tr>
<br>";

$sql="select product_name,crops,dosage from product_detail pd, pesticide_usage pu WHERE pd.product_id=pu.product_id;";
$result=mysqli_query($con,$sql);
#$check=mysqli_num_rows($result);

	while($c=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$c['product_name']."</td>";
		echo "<td>".$c['crops']."</td>";
		echo "<td>".$c['dosage']."</td>";
		echo "</tr>";


	}
	echo "</table>";

echo "</div>";
?>
</form>


<!--<?php
/*
$pr_sql="select product_name,crops,dosage from product_detail pd, pesticide_usage pu WHERE pd.product_id=pu.product_id;";
$pr_result=mysqli_query($con,$pr_sql);
$total=mysqli_num_rows($pr_result);
#echo $total;
#exit();
$total_pages=ceil($total/$num_per_page);
if($page>1)
{
	echo "<a href='usage.php?page=".($page-1)."' class=\"btn btn-danger\">Previous</a>";
}

for($j=1;$j<$total_pages;$j++)
{
	echo "<a href='usage.php?page=".$j."' class=\"btn btn-primary\">$j</a>";
}
if($j>$page)
{
	echo "<a href='usage.php?page=".($page+1)."' class=\"btn btn-danger\">Next</a>";
}
*/
?>-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
    $('#mytable').DataTable();
} );
	</script>
<script>
function  searchfun(){
	 let filter=document.getElementById('searchtable').value.toUpperCase();
	 let myTable=document.getElementById('mytable');
	 let tr=myTable.getElementsByTagName('tr');
     //document.write(tr.length);
	 for(var i=0;i<tr.length;i++)
	 {
	 	let td=tr[i].getElementsByTagName('td')[0];
	 	if(td)
	 	{
	 		let textvalue=td.textContent || td.innerHTML;
	 		if(textvalue.toUpperCase().indexOf(filter)>-1)
	 		{
	 			tr[i].style.display="";

	 		}
	 		else
	 		{
	 			tr[i].style.display="none";
	 		}

	 	}

	 }


}
</script>





</body>