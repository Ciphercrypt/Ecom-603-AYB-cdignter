
<h1><img src="<?= base_url('assets/imgs/dudhaiim.png') ?>" class="header-img" style="margin-top:-3px;"> Cash on delivery settings</h1>
<hr>
<div style="margin-bottom: 20px;" >
<div class="row">
    <div class="col-sm-6 col-md-4">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal_cod" class="btn btn-default" style="margin-bottom:10px;">Add city</a>
        
        <div class="table-responsive" style="margin-bottom: 1500px;" >
                <table class="table table-bordered table-striped">
                 <thead>
                         <tr> 
                              <th>city</th>
                            <th>Amount</th>
                             <th></th>
                            </tr>
                </thead>
                <tbody>
        
            <?php if (!empty($cod_details)) {
            ?>      <?php
                foreach ($cod_details as $cod) {
                    ?>
                    <tr>
                    <td >
                        <?= $cod['city'] ?>
                    </td>
                    <td >
                        <?= $cod['amount'] ?>
                    </td>
                    <td><a href="?delete=<?= $cod['id'] ?>" class="pull-right confirm-delete">X</a>
                    </td>
                    </tr>
                <?php }
                ?>
        <?php } else {
        ?>
		<tr colspan="3"> No cities added!</tr>
		<?php } ?>
        </tbody>
    </div>
</div>



<div id="myModal_cod" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new city</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="city_name">city name</label>
                        <input type="text" name="city_name" class="form-control" id="city_name" required>
                    </div>
                    <div class="form-group">
                        <label for="value">Cash on delivery amount:</label>
                        <input type="number" name="cod_value" class="form-control" id="value" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>