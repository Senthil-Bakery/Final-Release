



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/products1.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>


<?php
include 'header.php';
?>
<div class="row">
	<div class="col-12 content">
		<?php
			include_once('config.php');
			
				//make the database connection
	  		$conn  = db_connect();	
	  		
	  		$sql = "SELECT * FROM categories";
			
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	echo "<ul class='cat_menu'>";
			while($row = $result->fetch_assoc()) {
				echo "<li><a class='btn' href='products1.php?cat_id=".$row['cat_id']."'>".$row['cat_name']."</a></li>";
			}
	echo "</ul>";
}
else{
	echo "0 results";
}
	?>
	
	
		<?php
			include_once('config.php');
			
				//make the database connection
	  		$conn  = db_connect();	
	  		$item= isset($_GET['cat_id']) ? $_GET['cat_id']:'1';
	  		$sql = "SELECT * FROM products where category=$item";
			
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
			while($row = $result->fetch_assoc()) {
				?>
				<form action="products1.php?action=add&item_id=<?php echo $row['item_id'] ?>" method="post">
				<?php
				echo "<div class='product-item'>";
				echo "<div class='product-image'><img src='".$row['image']."' width='100px' height='100px'></div>";
				echo "<div><strong>".$row['name']."</strong></div>";
				echo "<div class='products-price'>".$row['price']."/".$row['unit']."</div>";
				echo "<div><input type='text' value='1' size='2'/><input type='submit' value='Add to cart' class='btnAddAction'></div>";
				echo "</div></form>";
				
			}
	
}
else{
	echo "0 results";
}
		?>
			
		
</div>
	</div>
<?php include 'footer.php';?>
	


</body>
</html>