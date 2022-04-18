<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="inner-nav">
   
    <div class="container">
        <a href="<?= LANG_URL ?>" class="btn btn-info"><?= lang('home') ?></a> <span class="active"> 
        <span ><i class="glyphicon glyphicon-arrow-left"></i></span>
        <?= lang('user_login') ?></span>
</div>
<div class="container user-page">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="loginmodal-container">

            <div class="row ">
                <div class="col "><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
                <div class="col-auto" align="center"><h4><b><?= lang('login_to_acc') ?></b></h4></div>
                <div class="col"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
                


                <div class="bg bg-info">
                <form method="POST" action="">
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>

                <div>
                forgot password settings<a href="<?= LANG_URL . '/register' ?>"><?= lang('register') ?></a>

                <div class="col text-center">
                <input type="submit" name="login" class="btn btn-success" value="<?= lang('login') ?>">

                </div>
                </div>
                
                </form>
                </div>  
                
                <div class="login-help">
                <?=lang('register_war') ?><a href="<?= LANG_URL . '/register' ?>"><?= lang('register') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>


