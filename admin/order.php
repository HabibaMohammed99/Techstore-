<?php

use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;

require_once "inc/header.php"; ?>

<?php
  if($request->getHas('id'))
  {
    $id = $request->get('id');
  }else{
    $request->aredirect('orders.php');
  }
  $or = new Order;
  $order = $or->getOne($id,"orders.*,SUM(qty*price) AS total");

  $orDetail = new OrderDetail;
  $orderDetail= $orDetail->selectWithProducts($id);
?>

    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Order : <?= $order['id']; ?> here</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">Customer</th>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Name</th>
                                <td><?= $order['name']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Email</th>
                                <td><?= $order['email']??"..."; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Phone</th>
                                <td><?= $order['phone']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Address</th>
                                <td><?= $order['address'] ?? "..."; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">Time</th>
                                <td><?= date("d M,Y H:i",strtotime($order['created_at']))?></td>
                              </tr>
                              <tr>
                                <th scope="row">Status</th>
                                <td><?= $order['status']  ?></td>
                              </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($orderDetail as $pro): ?>
                                <tr>
                                  <td><?= $pro['name'] ?></td>
                                  <td><?= $pro['qty'] ?></td>
                                  <td>$<?= $pro['price'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <?php if($order['status']=='pending'):?>
                                    <th>Change Status</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>$<?= $order['total'] ?></td>
                                <?php if($order['status']=='pending'):?>
                                  <td>
                                      <a class="btn btn-success" href="<?= AURL."handlers/approve.php?id=".$order['id'] ?>">Approve</a>
                                      <a class="btn btn-danger" href="<?= AURL."handlers/cancel.php?id=".$order['id'] ?>">Cancel</a>
                                  </td>
                                <?php endif; ?>
                              </tr>
                            </tbody>
                        </table>

                        <a class="btn btn-dark" href="<?=AURL; ?>orders.php">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


<?php require_once "inc/footer.php"; ?>