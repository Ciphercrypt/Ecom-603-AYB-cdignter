<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
<h1><img src="<?= base_url('assets/imgs/discount.png') ?>" class="header-img" style="margin-top:-3px;"> Monthly subscription management</h1>
<hr>

<div style="margin-bottom: 20px;">
    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalavi" class="btn btn-primary pull-left">
        <b>+</b> Add subcription details
    </a>
    
    <div class="clearfix"></div>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr> 
                <th>id </th>
                <th>milk type</th>
                <th>quantity</th>
                <th> rate per day</th>
                <th>rate per month</th>
                <th>rate for discount</th>
                <th></th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($subscdetails)) {
                foreach ($subscdetails as $code) {
                    
                    ?>
                    <tr> 
                        <td><?= htmlspecialchars($code['id']) ?></td>
                        <td><?= $code['milk_type'] ?></td>
                        <td><?= $code['quantity'] ?></td>
                        <td><?= $code['rate_day']?></td>
                        <td><?= $code['rate_month']?></td>
                        <td ><?= $code['rate_pay_now'] ?> </td>
                        <td class="text-center">
                            <form action="<?= base_url('admin/subscription/delete') ?>" method="POST">
                                <input type="hidden" name="id" value="<?=$code['id']?>">
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                        <td class="text-center">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?=$code['id']?>">Edit</button>

                        <div class="modal" id="myModal<?=$code['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Update subscrption</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                   <form action="<?= base_url('admin/subscription/update') ?>" method="POST">
                                   <div class="form-group">
                                        <label for="milktype">Select milk type</label>
                                        <select name="type" id="milktype">
                                        <option selected ><?= $code['milk_type'] ?></option>
                                            <option value="cow">cow</option>
                                            <option value="buffalo">buffalo</option>
                                            <option value="goat">goat</option>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="hidden" name="id" value="<?= $code['id'] ?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="quantity">Select Quantity</label>
                                        <select name="quantity" id="quantity">
                                        <option selected ><?= $code['quantity']?></option>
                                            <option value="0.250">0.250</option>
                                            <option value="0.50">0.50</option>
                                            <option value="1.0">1.0</option>
                                            <option value="1.250">1.250</option>
                                            <option value="1.50">1.50</option>
                                            <option value="2.0">2.0</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate_day">rate per day</label>
                                        <input type="text" class="form-control" id="rate_day" name="rate_day" value="<?= $code['rate_day']?>"aria-describedby="day<?=$code['id']?>">
                                        <small id="day<?=$code['id']?>" class="form-text text-muted">This is rate of milk per day.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate_month">rate per month</label>
                                        <input type="text" class="form-control" id="rate_month" value="<?= $code['rate_month']?>" name="rate_month" aria-describedby="month<?=$code['id']?>">
                                        <small id="month<?=$code['id']?>" class="form-text text-muted">This is rate of milk per month.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate_pay_now">rate under pay at the start of the month</label>
                                        <input type="text" class="form-control" id="rate_pay_now"  value = "<?= $code['rate_pay_now'] ?>" name="rate_pay_now" aria-describedby="pay<?=$code['id']?>">
                                        <small id="pay<?=$code['id']?>" class="form-text text-muted">This is rate of milk who pays at the start of the month.</small>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                   </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                                </div>
                            </div>
                           </div>



                        </td>
                    </tr> 
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">No subscription details added</td> 
                </tr> 
            <?php } ?>
        </tbody>
    </table>
</div>





<!-- add/edit discounts -->

<div class="modal" id="myModalavi">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit subscription details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="modal-body">
                                   <form action="<?= base_url('admin/subscription/edit') ?>" method="POST">
                                   <div class="form-group">
                                        <label for="milktype">Select milk type</label>
                                        <select name="type" id="milktype">
                                            <option value="cow">cow</option>
                                            <option value="buffalo">buffalo</option>
                                            <option value="goat">goat</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="quantity">Select Quantity</label>
                                        <select name="quantity" id="quantity">
                                            <option value="0.250">0.250</option>
                                            <option value="0.50">0.50</option>
                                            <option value="1.0">1.0</option>
                                            <option value="1.250">1.250</option>
                                            <option value="1.50">1.50</option>
                                            <option value="2.0">2.0</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate_day">rate per day</label>
                                        <input type="text" class="form-control" id="rate_day" name="rate_day" aria-describedby="day">
                                        <small id="day" class="form-text text-muted">This is rate of milk per day.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate_month">rate per month</label>
                                        <input type="text" class="form-control" id="rate_month" name="rate_month" aria-describedby="month">
                                        <small id="month" class="form-text text-muted">This is rate of milk per month.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate_pay_now">rate under pay at the start of the month</label>
                                        <input type="text" class="form-control" id="rate_pay_now"   name="rate_pay_now" aria-describedby="pay">
                                        <small id="pay" class="form-text text-muted">This is rate of milk who pays at the start of the month.</small>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                   </form>
                                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>









<div class="modal fade" id="addDiscountCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <input type="hidden" name="update" value="<?= isset($_POST['update']) ? (int)$_POST['update'] : '0' ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add discount code</h4>
                </div>
                <div class="modal-body">
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger"><?= implode('<br>', $this->session->flashdata('error')) ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label>Type of discount</label>
                        <select class="selectpicker form-control show-tick show-menu-arrow" name="type">
                            <option <?= (isset($_POST['type']) && $_POST['type'] == 'percent') || !isset($_POST['percent']) ? 'selected=""' : '' ?> value="percent">%</option>
                            <option <?= isset($_POST['type']) && $_POST['type'] == 'float' ? 'selected=""' : '' ?> value="float">Float</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Discount value</label>
                        <input class="form-control" name="amount" value="<?= isset($_POST['amount']) ? htmlspecialchars($_POST['amount']) : '' ?>" type="text">
                    </div>
                    <div class="form-group" style="position: relative;">
                        <label>Discount code</label>
                        <input class="form-control" name="code" value="<?= isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '' ?>" type="text">
                        <div style="position: absolute; right:5px; top:30px;">
                            <input type="text" data-toggle="tooltip" title="Set length of code" data-placement="top" class="codeLength" value="6" style="border: 1px solid #dadada;float: left;height: 20px; margin-right: 4px; text-align: center; margin-top: 1px; width: 20px;">
                            <a href="javascript:void(0);" onclick="generateDiscountCode()" class="btn btn-xs btn-default">Generate</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Valid from date</label>
                        <input class="form-control datepicker" name="valid_from_date" value="<?= isset($_POST['valid_from_date']) ? htmlspecialchars($_POST['valid_from_date']) : '' ?>" type="text">
                    </div>
                    <div class="form-group">
                        <label>Valid to date</label>
                        <input class="form-control datepicker" name="valid_to_date" value="<?= isset($_POST['valid_to_date']) ? htmlspecialchars($_POST['valid_to_date']) : '' ?>" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="location.href = '<?= base_url('admin/discounts') ?>';" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap-toggle.min.js') ?>"></script>
<script>
                        $(document).ready(function () {
                            $('[data-toggle="tooltip"]').tooltip();
<?php if (isset($_POST['code'])) { ?>
                                $('#addDiscountCode').modal('show');
<?php } ?>
                        });
                        $('.datepicker').datepicker({
                            format: "dd.mm.yyyy"
                        });
                        function generateDiscountCode() {
                            var length = $('.codeLength').val();
                            if (length < 3 || length == '') {
                                alert('Too short discount code!');
                            } else {
                                var text = "";
                                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                                for (var i = 0; i < length; i++) {
                                    text += possible.charAt(Math.floor(Math.random() * possible.length));
                                }
                                $('[name="code"]').val(text.toUpperCase());
                            }
                        }
</script>