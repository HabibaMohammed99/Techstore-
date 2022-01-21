<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Models\Product;

require_once "inc/header.php"; ?>

<?php

    if($request->getHas('edit_id'))
    {
        $id = $request->get('edit_id');
    }else{
        $id =1;
    }

    $pro = new Product;
    $prod = $pro->getOne($id," products.name AS prodName ,`desc` , price ,pieces_no , img , cats.name AS catName ,cat_id");

    $c = new Cat;
     $cats = $c->getAll();
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Product :<?= $prod['prodName'] ?></h3>
                <div class="card">
                    <div class="card-body p-5">
                        <?php require_once (APATH."inc/errors.php"); ?>
                        <form method="POST" action="<?= AURL."handlers/handle-edit.php"; ?>" enctype="multipart/form-data">
                            <input type="hidden" name="edit_id" value="<?= $id ?>">    
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" value="<?= $prod['prodName'] ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select name="cat_id" class="form-control">
                                <?php  foreach($cats as $cat): ?>
                                  <option value="<?= $cat['id']; ?>" <?php if($cat['id']== $prod['cat_id']){echo "selected";} ?>><?= $cat['name'] ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price"  value="<?= $prod['price'] ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Pieces</label>
                                <input type="number" name="pieces_no" value="<?= $prod['pieces_no'] ?>" class="form-control">
                            </div>
  
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="desc" rows="3"><?= $prod['desc'] ?></textarea>
                            </div>
                            
                            <img src="<?= URL."uploads/".$prod['img'] ?>" width="100px" alt="" srcset="">
                            <div class="custom-file mt-2">
                                <input type="file" name="img" value="<?= $prod['img'] ?>" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                              
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="#">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require_once "inc/footer.php"; ?>
