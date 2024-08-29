<?php 
//call the pdo.php file para magamit ang $con variable natin
include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete User Records</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-6 mx-auto">
                <h2>Delete User</h2>
                <?php
                //kuhain natin yun id string sa url. ?id=(id ng record na ieedit)
                $id = !empty($_GET['id']) ? $_GET['id'] : '';//check nyo sa module yun ternary operator kung nagtataka kayo dito

                //sql statement para makuha ang member sa database na may id na equal kay var $id
                $sql = 'delete from products where id = ?';

                //prepared statement natin
                $stmt = $con->prepare($sql);

                //execute na natin dito
                $stmt->execute(array($id));

                if($stmt->rowCount() > 0) { ?>
                    <div class="alert alert-success" role="alert">Deleted successfully</div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">Oopss, something went wrong!</div>
                <?php
                }
                ?>
                <a href="index.php" class="btn btn-primary" role="button">All Members</a>
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