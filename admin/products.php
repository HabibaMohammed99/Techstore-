<?php

use TechStore\Classes\Models\Product;

require_once "inc/header.php"; ?>

<?php

    $products = new Product;
    $products = $products->getAllWithCats("products.id AS id,products.name AS productName ,products.pieces_no AS productPices 
    ,products.price AS productPrice, products.img AS productImage ,products.created_at AS productDate
     ,cats.name AS catName");

?>
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Products</h3>
                    <a href="<?= AURL;?>add-product.php" class="btn btn-success">
                        Add new
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pieces</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $product): ?>
                      <tr>
                        <th scope="row">1</th>
                        <td><?= $product['productName'] ?></td>
                        <td><?= $product['catName'] ?></td>
                        <td>
                            <img style="width:50px" src="<?= URL ."uploads/".$product['productImage']?>" alt="">
                        </td>
                        <td><?= $product['productPices'] ?></td>
                        <td>$<?= $product['productPrice'] ?></td>
                        <td><?= date("d M,Y H:i",strtotime($product['productDate'])) ?></td>
                        <td>
                            <!-- <a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-eye"></i>
                            </a> -->
                            <a class="btn btn-sm btn-info" href="<?= AURL;?>edit-product.php?edit_id=<?= $product['id'];?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="<?= AURL;?>handlers/delete-product.php?delete_id=<?= $product['id'];?>" >
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


 <?php require_once "inc/footer.php"; ?>
