<?php

use TechStore\Classes\Models\Cat;

require_once "inc/header.php"; ?>

<?php

    if($request->getHas('id'))
    {
        $id = $request->get('id');
    }else{
        $id =1;
    }
    $c = new Cat;
     $cat = $c->getOne($id);
?>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Category : <?= $cat['name'] ?> here</h3>
                <div class="card">
                    <div class="card-body p-5">
                    <?php require_once (APATH."inc/errors.php"); ?>
                        <form method="POST" action="<?= AURL."handlers/handle-edit_cat.php"; ?>" >
                            <input type="hidden" name="id" value="<?= $id ?>">    
                                                     <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" value="<?= $cat['name'] ?>" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="<?= AURL."categories.php" ?>">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>


<?php require_once "inc/footer.php"; ?>
