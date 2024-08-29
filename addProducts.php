<?php 
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

	<style>
		.form-group{
			margin-bottom: 8px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row mt-3">
			<div class="col-sm-6 mx-auto">
			<?php
				if(isset($_POST['submit'])) {

					
					$name = $_POST['name'];
					$description = $_POST['description'];
					$price = $_POST['price'];
					$quantity = $_POST['quantity'];
					$barcode = $_POST['barcode'];
					$created_at = $_POST['created_at'];
					

					
					$sql = 'insert into products (name, description, price, quantity, barcode, created_at) values (?, ?, ?, ?, ?, ?)';

					
					$stmt = $con->prepare($sql);

					
					$stmt->execute(array($name, $description, $price, $quantity, $barcode, $created_at));//yun $username at $password ay yung variable sa taas, un kinuha from inputs

					if($stmt->rowCount() > 0) { ?>
						<div class="alert alert-success" role="alert">Saved Successfully</div>
					<?php } else { ?>
						<div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
					<?php
					}
				}
				?>
				
				<h2>Add Products</h2>
				  <form action="" method="POST">
					<div class="form-group">
				      <label for="name">Product Name:</label>
				      <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
				    </div>
				    <div class="form-group">
				      <label for="description">Description:</label>
				      <input type="text" class="form-control" id="description" placeholder="Enter Product Description" name="description">
				    </div>
					<div class="form-group">
				      <label for="price">Price:</label>
				      <input type="text" class="form-control" id="price" placeholder="Enter Product Price" name="price">
				    </div> 
					<div class="form-group">
						<label for="quantity">Quantity:</label>
						<input type="text" class="form-control" id="quatity" placeholder="Enter Quantity" name="quantity">
					  </div>
					  <div class="form-group">
						<label for="barcode">Barcode:</label>
						<input type="text" class="form-control" id="barcode" placeholder="Enter barcode" name="barcode">
					  </div>
					  <div class="form-group">
						<label for="created_at">Date Created:</label>
						<input type="date" class="form-control" id="created_at" placeholder="Enter Date Created" name="created_at">
					  </div>
				    <button type="submit" name="submit" class="btn btn-primary">Add Products</button>&nbsp;<a href="index.php" class="btn btn-primary" role="button">All Products</a>
					</form>
				  </form>
			</div>
		</div>
	</div>

</body>
</html>