<?php 
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="mx-auto">
                <?php
                $sql = 'select * from products';

                $stmt = $con->prepare($sql);

                $stmt->execute();

                $products = $stmt->fetchAll();
                ?>
                <h2></h2>
                <table class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<td>ID</td>
                			<td>Name</td>
                			<td>Description</td>
                			<td>Price</td>
                            <td>Quantity</td>
                			<td>Barcode</td>
                			<td>Date_Created</td>
                            <td>Date_Updated</td>
                		</tr>
                	</thead>
                	<tbody>
                		<?php foreach($products as $product): ?>
                			<tr>
                				<td><?php echo $product['id']; ?></td>
                				<td><?php echo $product['name']; ?></td>
                				<td><?php echo $product['description']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                				<td><?php echo $product['quantity']; ?></td>
                				<td><?php echo $product['barcode']; ?></td>
                                <td><?php echo $product['created_at']; ?></td>
                				<td><?php echo $product['updated_at']; ?></td>
                				<td><a class="btn btn-info" role="button" href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" role="button" href="delete.php?id=<?php echo $product['id']; ?>">Delete</a></td>
                			</tr>
                		<?php endforeach ?>
                	</tbody>
                </table>
                <a href="addProducts.php" class="btn btn-primary" role="button">Add New</a>
            </div>
        </div>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>