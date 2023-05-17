<?php
    include "./data/data.php";
    include "./classes/Product.php";

    if(isset($_GET["category"])){
        $categoryFilter = $_GET["category"];
        $typeFilter = $_GET["type"];
    }
    else{
        $categoryFilter = "Tutti";
        $typeFilter = "Tutti";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP OOP 2</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-5 pt-sm-4 pb-5">
            <h1 class="d-none d-sm-block">
                PHP OOP 2
            </h1>

            <form action="index.php" method="get" class="d-flex justify-content-center align-items-center gap-4">
                <div class="d-flex justify-content-center align-items-center gap-1">
                    <label for="category">Categoria</label>
                    <select name="category" id="category">
                        <option value="Tutti" selected>Tutti</option>
                        <option value="Cane">Cani</option>
                        <option value="Gatto">Gatti</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-1">
                    <label for="type">Tipo</label>
                    <select name="type" id="type">
                        <option value="Tutti" selected>Tutti</option>
                        <option value="Cibo">Cibo</option>
                        <option value="Gioco">Giochi</option>
                        <option value="Cuccia">Cuccie</option>
                    </select>
                </div>

                <input type="submit" value="Filtra" class="ms-2">
            </form>
        </div>

        <div class="row">

            <?php
                $dim = count($productsData["name"]);
                $products = array($dim);

                for($i = 0; $i < $dim; $i++)
                    $products[$i] = new Product($productsData["name"][$i], $productsData["price"][$i], $productsData["category"][$i], $productsData["type"][$i], $productsData["img"][$i]);

                foreach($products as $product)
                    if(($categoryFilter == "Tutti" || $categoryFilter == $product->category) && ($typeFilter == "Tutti" || $typeFilter == $product->type)){
                        echo "
                            <div class='col-12 col-sm-6 col-md-4 col-lg-3 pb-5'>
                                <div class='al-card'>
                                    <div class='mb-3'>
                                        <img src='$product->img' alt='$product->name'>
                                    </div>

                                    <div class='d-flex flex-column justify-content-center align-items-center text-center'>
                                        <h4>$product->name</h4>

                                        <h5>$product->category</h5>

                                        <h5>$product->type</h5>

                                        <h5>$product->price</h5>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
            ?>

        </div>
    </div>

    <script>
        let categorySelect = document.getElementById("category");
        let typeSelect = document.getElementById("type");

        let categoryValue = <?php 
            if(isset($_GET["category"]))
                echo json_encode($categoryFilter);
            else
                echo json_encode(null);
        ?>

        let typeValue = <?php 
            if(isset($_GET["type"]))
                echo json_encode($typeFilter);
            else
                echo json_encode(null);
        ?>

        if(categoryValue != null)
            categorySelect.value = categoryValue;

        if(typeValue != null)
            typeSelect.value = typeValue;
    </script>
</body>
</html>