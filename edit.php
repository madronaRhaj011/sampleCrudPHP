<?php 
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Products</title>
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

                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $barcode = $_POST['barcode'];
                    $created_at = $_POST['created_at'];

                    $sql = 'update products set name = ?, description = ? , price = ? , quantity = ?, barcode = ?, created_at = ? where id = ?';

                    $stmt = $con->prepare($sql);

                    $stmt->execute(array($name, $description, $price, $quantity, $barcode, $created_at, $id));
                    
                    if($stmt->rowCount() > 0) { ?>
                        <div class="alert alert-success" role="alert">Updated successfully</div>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
                    <?php
                    }
                }
                ?>
                <h2>Edit Products</h2>
                <?php
                $id = !empty($_GET['id']) ? $_GET['id'] : '';

                $sql = 'select * from products where id = ?';

                $stmt = $con->prepare($sql);

                $stmt->execute(array($id));

                $products = $stmt->fetch();
                ?>
                  <form action="" method="POST">
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div class="form-group">
                      <label for="name">Product Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name"  value="<?php echo $products['name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="description">Description:</label>
                      <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" value="<?php echo $products['description'];?>">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div class="form-group">
                      <label for="price">Price:</label>
                      <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price" value="<?php echo $products['price'];?>">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div class="form-group">
                      <label for="quantity">Quantity:</label>
                      <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity"  value="<?php echo $products['quantity'];?>">
                    </div>
                    <div class="form-group">
                      <label for="barcode">Barcode:</label>
                      <input type="text" class="form-control" id="barcode" placeholder="Enter Barcode" name="barcode" value="<?php echo $products['barcode'];?>">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    <div class="form-group">
                      <label for="created_at">Date Created:</label>
                      <input type="date" class="form-control" id="created_at" placeholder="Enter Date Created" name="created_at" value="<?php echo $products['created_at'];?>">
                      <input type="hidden" name="id" value="<?php echo $id;?>">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>&nbsp;<a href="addProducts.php" class="btn btn-primary" role="button">Add New</a>&nbsp;<a href="index.php" class="btn btn-primary" role="button">All Products</a>
                  </form>
            </div>
        </div>
    </div>


</body>
</html>