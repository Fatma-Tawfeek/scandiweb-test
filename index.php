<?php
include_once 'Classes/Service.php';
include_once 'Classes/Database.php';

if (isset($_POST['delete'])) {   
    (new Service)->deleteProducts($_POST['checkbox']);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Product List</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-8">
                <h1>Products List</h1>
            </div>
            <div class="col-1 mt-2">
                <button onclick="window.location.href='add.php'" class="btn btn-primary">ADD</button>
            </div>
            <div class="col-3 mt-2">
                <button name="delete" class="btn btn-danger" id="delete-product-btn" form="form">MASS DELETE</button>
            </div>
        </div>
        <hr>
        <form action="" method="post" id="form">
            <div class="row py-5">
                <?php
                //Getting all the products from the database
                $products = (new Service)->getProducts();
                //Loop through array of objects and display each of them
                foreach ($products as $product) {
                    echo '
                <div class="col-3 mb-5">
                        <div class="product border border-secondary rounded bg-light p-4">
                        <input type="checkbox" class="delete-checkbox move-left" name="checkbox[]" value="' . $product->id . '">
                            <div class="product-body">
                                <h6 class="text-center">' . $product->sku . '</h6>
                                <h6 class="text-center">' . $product->name . '</h6>
                                <h6 class="text-center">' . $product->price . ' $</h6>
                                <h6 class="text-center">' . $product->specification . '</h6>
                            </div>
                        </div>
                </div>';
                }
                ?>
            </div>
        </form>
    </div>
    <div class="footer">    
      <div class="container text-center">         
        <span class="text-muted">Scandiweb Test Assigment</span>
      </div>
    </div>    
    <script src="js/script.js"></script>
</body>

</html>
