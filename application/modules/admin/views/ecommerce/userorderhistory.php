<div class="col-sm-8">
            <?= lang('user_order_history') ?>
            <div class="">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= lang('usr_order_id') ?></th>
                            <th scope="col"><?= lang('usr_order_date') ?></th>
                            <th scope="col"><?= lang('user_order_products') ?></th>
                            <th scope="col">Order status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($orders_history)) {
                            foreach ($orders_history as $order) {
                                ?>
                                <tr>
                                    <td scope="row"><?= $order['order_id'] ?></td>
                                    <td><?= date('d.m.Y', $order['date']) ?></td>
                                    <td>    
                                        <?php
                                        $arr_products = unserialize($order['products']);
                                        foreach ($arr_products as $product) {
                                            ?>
                                            <div style="word-break: break-all;">
                                                <div>
                                                    <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="Product" style="width:200px; margin-right:10px;" class="img-responsive">
                                                </div> 
                                                <div style=" background-color: #f1f1f1; border-radius: 2px; padding: 2px 5px;"><b><?= lang('user_order_quantity') ?></b> <?= $product['product_quantity']; ?></div>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                                Know more
                                                </button>
                                                <div class="clearfix"></div>
                                            </div>
                                            <hr>
                                        <?php }
                                        ?>
                                    </td>
                                    <td><?php if ($order['processed']==1){
                                        ?>
                                        <div class="progress" align="center">
                                        <div class="progress-bar " role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="background-color:red;" align="center">Rejected</div>
                                        </div>
                                 <?php   }  if($order['processed']==2){
                                     ?>
                                     <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Confirmed</div>
                                    </div>
                                    <?php
                                      }  if($order['processed']==3){
                                          ?>
                                          <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Processing</div>
                                        </div>

                                      <?php   }   if($order['processed']==4){
                                          ?>
                                          <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Completed</div>
                                        </div>
                                  <?php    }  if($order['processed']==0){ ?>
                                    <div class="progress">
                                    <div class="progress-bar bg-default" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">order arrived</div>
                                    </div>  
                               <?php   } ?>
                                  </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5"><?= lang('usr_no_orders') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?= $links_pagination ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scroll down</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="embed-responsive embed-responsive-4by3">
          <iframe class="embed-responsive-item" src="<?= base_url($product['product_info']['url']) ?>"></iframe>
            </div> 
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>