<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keywords ?>" />
        <meta property="og:title" content="<?= $title ?>" />
        <meta property="og:description" content="<?= $description ?>" />
        <meta property="og:url" content="<?= LANG_URL ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="<?= isset($image) && !is_null($image) ? $image : base_url('assets/img/site-overview.png') ?>" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">      


        <link rel="stylesheet" href="<?= base_url('assets/bootstrap-select-1.12.1/bootstrap-select.min.css') ?>" />
        <link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('cssloader/theme.css') ?>" rel="stylesheet" />
       <script> AOS.init({
 	duration: 8,
 	easing: 'slide',
 	once: false
 }); </script>
        <script src="<?= base_url('assets/js/aos.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
        
        <?php if ($cookieLaw != false) { ?>
            <script type="text/javascript">
                window.cookieconsent_options = {"message": "<?= $cookieLaw['message'] ?>", "dismiss": "<?= $cookieLaw['button_text'] ?>", "learnMore": "<?= $cookieLaw['learn_more'] ?>", "link": "<?= $cookieLaw['link'] ?>", "theme": "<?= $cookieLaw['theme'] ?>"};
            </script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
        <?php } ?>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![en]-->
    </head>
    <body style="background-color:#eaf0f3;overflow:scroll;" data-aos="fade-down-right">
                     
    <div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="  largenav  pull-right">
                


           



                <?php if(isset($_SESSION['logged_user'])){
                   $userInfo= $this->Public_model->getUserProfileInfo($_SESSION['logged_user']);
                   if ( $userInfo['subscribed']==1){ ?>
                  <li class="upper-links"><a class="links" href=""><b style="color:cyan;" >Welcome 🙏,<?=$userInfo['name']?>!</b></a></li>
                  <li class="upper-links"  <?= uri_string() == '' || uri_string() == MY_LANGUAGE_ABBR ? ' class="active"' : '' ?>><a  class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;"  href="<?= LANG_URL ?>"><?=lang('home')?></a></li>
                <li class="upper-links" <?= uri_string() == 'contacts' || uri_string() == MY_LANGUAGE_ABBR . '/contacts' ? ' class="active"' : '' ?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/contacts' ?>"><?= lang('contacts') ?></a></li>
                <?php
                                if (!empty($nonDynPages)) {
                                    foreach ($nonDynPages as $addonPage) {
                                        ?>
                                        <li class="upper-links" <?= uri_string() == '' || uri_string() == MY_LANGUAGE_ABBR ? ' class="active"' : '' ?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/' . $addonPage ?>"><?= mb_ucfirst(lang($addonPage)) ?></a></li>
                                        <?php
                                    }
                                }
                                if (!empty($dynPages)) {
                                    foreach ($dynPages as $addonPage) {
                                        ?>
                                        
                                        <li class="upper-links" <?= urldecode(uri_string()) == 'page/' . $addonPage['pname'] || uri_string() == MY_LANGUAGE_ABBR . '/' . 'page/' . $addonPage['pname'] ? ' class="active"' : ''?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/page/' . $addonPage['pname'] ?>"><?= mb_ucfirst($addonPage['lname']) ?></a></li>

                                            <?php
                                        }
                                    }
                                    ?>
                    <li class="upper-links"><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/myaccount' ?>"><?= lang('my_acc') ?></a></li>
                   <?php if ( $userInfo['subscribed']==1){ ?>
                    <li class="upper-links"><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/mysubscription' ?>">सदस्यता</a></li>
                    <?php }?>
                    <li class="upper-links"><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(red,pink,magenta) 1;" href="<?= LANG_URL . '/logout' ?>"><?= lang('logout') ?></a></li>



               <?php  }}else{
                   ?>
                    <li class="upper-links"><a class="links" href=""><b style="color:cyan;" >Welcome 🙏, Guest!</b></a></li>
                    <li class="upper-links" <?= uri_string() == '' || uri_string() == MY_LANGUAGE_ABBR ? ' class="active"' : '' ?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;   border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL ?>"><b><?=lang('home')?></b></a></li>
                <li class="upper-links" <?= uri_string() == 'contacts' || uri_string() == MY_LANGUAGE_ABBR . '/contacts' ? ' class="active"' : '' ?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;  border-image: conic-gradient(lime, aqua, blue,magenta) 1" href="<?= LANG_URL . '/contacts' ?>"><?= lang('contacts') ?></a></li>
                <?php
                                if (!empty($nonDynPages)) {
                                    foreach ($nonDynPages as $addonPage) {
                                        ?>
                                        <li class="upper-links" <?= uri_string() == $addonPage || uri_string() == MY_LANGUAGE_ABBR . '/' . $addonPage ? ' class="active"' : '' ?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50; border-image: conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/' . $addonPage ?>"><?= mb_ucfirst(lang($addonPage)) ?></a></li>
                                        <?php
                                    }
                                }
                                if (!empty($dynPages)) {
                                    foreach ($dynPages as $addonPage) {
                                        ?>
                                        
                                        <li class="upper-links" <?= urldecode(uri_string()) == 'page/' . $addonPage['pname'] || uri_string() == MY_LANGUAGE_ABBR . '/' . 'page/' . $addonPage['pname'] ? ' class="active"' : ''?>><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/page/' . $addonPage['pname'] ?>"><?= mb_ucfirst($addonPage['lname']) ?></a></li>

                                            <?php
                                        }
                                    }
                                    ?>
                                    
                    <li class="upper-links"><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50; " href="<?=base_url()?>Home/Showsubscription">Subscription</a></li>
                    <li class="upper-links"> <a href="<?= LANG_URL . '/login' ?>" class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;  border-image: conic-gradient(lime, aqua, blue,magenta) 1;">
                        <?= lang('login') ?>
                    </a></li>
                    <li class="upper-links"><a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image: conic-gradient(lime, aqua, blue,magenta) 1;" href="<?= LANG_URL . '/register' ?>"><?= lang('register') ?></a></li>

              <?php } ?>
              <!--  <li class="upper-links"><a class="links" href="http://clashhacks.in/">Link 3</a></li>
                <li class="upper-links"><a class="links" href="http://clashhacks.in/">Link 4</a></li>
                <li class="upper-links"><a class="links" href="http://clashhacks.in/">Link 5</a></li>
                <li class="upper-links"><a class="links" href="http://clashhacks.in/">Link 6</a></li>-->
                <li class="upper-links">
                    <a class="links" href="">
                        <svg class="" width="16px" height="12px" style="overflow: visible;">
                            <path d="M8.037 17.546c1.487 0 2.417-.93 2.417-2.417H5.62c0 1.486.93 2.415 2.417 2.415m5.315-6.463v-2.97h-.005c-.044-3.266-1.67-5.46-4.337-5.98v-.81C9.01.622 8.436.05 7.735.05 7.033.05 6.46.624 6.46 1.325v.808c-2.667.52-4.294 2.716-4.338 5.98h-.005v2.972l-1.843 1.42v1.376h14.92v-1.375l-1.842-1.42z" fill="#fff"></path>
                        </svg>
                    </a>
                </li>

        <li class="upper-links dropdown"><a class="links" href=""> <img src= "<?= base_url('attachments/lang_flags/'.MY_LANGUAGE_ABBR.'.png') ?>" width="20" height="15"> <?=  MY_LANGUAGE_FULL_NAME ?></a> 

                    <ul class="dropdown-menu">    
                    <?php
                        $num_langs = count($allLanguages);
                        if ($num_langs > 0) {
                            ?>
                            
                            <ul class="dropdown-menu">
                                <?php
                                $i = 1;
                                $lang_last = '';
                                foreach ($allLanguages as $key_lang => $lang) {
                                    ?>
                                    <li class="profile-li">
                                    <a href="<?= base_url($key_lang) ?>"> 
                             <img src= "<?= base_url('attachments/lang_flags/' . $lang['flag']) ?>" width="20" height="15"> <?= $lang['name'] ?></a> 
      
                                </li>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                            
                        <?php } ?> 
                        
                </li>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h3 style="margin:0px;"><span class="smallnav menu">
                    <span onclick="openNav()">☰</span>
                    <span class="col-sm-3 col-md-3 col-lg-4 " style="height:-100px;width:150px;">
                   <a href="<?= LANG_URL ?>"> <img src="<?= base_url('attachments/site_logo/' . $sitelogo) ?>" class="site-logo" alt="<?= $_SERVER['HTTP_HOST'] ?>"></span><a>

                   <a class="cart-buttonavi" href="<?= LANG_URL . '/shopping-cart' ?>" >
<svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
    <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
</svg> 
<span class=" " style="background-color:none ; color:red;"><?= is_numeric($cartItems) && (int)$cartItems == 0 ? 0 : $sumOfItems ?></span>
</a>
<li class=" dropdown" align="right"  style="position:relative; float:right;"><span class="glyphicon glyphicon-user" style="font-size: 30px;"></span> 

                                 
                            <ul class="dropdown-menu" >
                                <?php if(isset($_SESSION['logged_user'])){ ?>
                                    <li class="profile-li">
                                    <a href="<?= LANG_URL . '/myaccount' ?>"><?= lang('my_acc') ?>
                                    </a> 
      
                                     </li>

                                     <li class="profile-li">
                                    <a href="<?= LANG_URL . '/mysubscription' ?>">सदस्यता
                                    </a> 
                                    </li>
      
                                     </li>
                                    <?php } else {?>

                                    <li class="profile-li">
                                    <a href="<?=base_url()?>Home/Showsubscription"> Subscription
                                    </a> 
      
                                     </li>

                                     <li class="profile-li">
                                    <a href="<?= LANG_URL . '/login' ?>"> <?= lang('login') ?>
                                    </a> 
                                    </li>

                                    <li class="profile-li">
                                    <a href="<?= LANG_URL . '/register' ?>"> <?= lang('register') ?>
                                    </a> 
                                    </li>
                                    <?php }?>

                                     </ul></li>
</span>

</h3>






                <h1 style="margin:0px;" ><span class="largenav"><a href="<?= base_url() ?>">
                                    <img src="<?= base_url('attachments/site_logo/' . $sitelogo) ?>" class="site-logo" alt="<?= $_SERVER['HTTP_HOST'] ?>">
                                </a></span></h1>
            </div>

            
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div >
                <div class="row" >
                    <input class="flipkart-navbar-input col-xs-11 " id="search_in_title"  type="text"  value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>" placeholder="<?= lang('search_by_keyword_title') ?>"   style="color:black;">
                    <button class="flipkart-navbar-button col-xs-1" onclick="submitForm()">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
                </div>
            </div>
            <div class="cart largenav col-sm-2">
                <a class="cart-button" href="<?= LANG_URL . '/shopping-cart' ?>">

                    <svg class="cart-svg " width="16 " height="16 " viewBox="0 0 16 16 ">
                        <path d="M15.32 2.405H4.887C3 2.405 2.46.805 2.46.805L2.257.21C2.208.085 2.083 0 1.946 0H.336C.1 0-.064.24.024.46l.644 1.945L3.11 9.767c.047.137.175.23.32.23h8.418l-.493 1.958H3.768l.002.003c-.017 0-.033-.003-.05-.003-1.06 0-1.92.86-1.92 1.92s.86 1.92 1.92 1.92c.99 0 1.805-.75 1.91-1.712l5.55.076c.12.922.91 1.636 1.867 1.636 1.04 0 1.885-.844 1.885-1.885 0-.866-.584-1.593-1.38-1.814l2.423-8.832c.12-.433-.206-.86-.655-.86 " fill="#fff "></path>
                    </svg> Cart
                  <span class="item-number " style="background-color:white ; color:orange;"><?= is_numeric($cartItems) && (int)$cartItems == 0 ? 0 : $sumOfItems ?></span>
                </a>
            </div>
            
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
                    
                        
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
    
        <span class="sidenav-heading">
        <?php
                        $num_langs = count($allLanguages);
                        if ($num_langs > 0) {
                            ?>
                            
                            <ul class="avi " >
                                <?php
                                $i = 1;
                                $lang_last = '';
                                foreach ($allLanguages as $key_lang => $lang) {
                                    ?>
                                  
                                        <img src="<?= base_url('attachments/lang_flags/' . $lang['flag']) ?>" width="20" height="15" style="float:left;"  alt="Language-<?= MY_LANGUAGE_ABBR ?>"><a href="<?= base_url($key_lang) ?>" style="font-size:15px;padding-left:2px; margin-top:-10px;"><b style="color:black;"><?= $lang['name'] ?></b></a>
                                    
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                            
                        <?php } ?> 
                        
      
        <?php if(isset($_SESSION['logged_user'])){
            ?> 
                              <a class="links" href=""><b style="color:cyan;font-size:15px;" >🙋🏻‍♂️ Welcome ,<?=$userInfo['name']?>!</b></a>


     <?php } else {
         ?><a class="links " href=""><b style="color:white;font-size:15px;" > 🙋🏻‍♂️ Welcome ,Guest!</b></a>

  <?php     } ?>
        
        
        </span>
        <a href="javascript:void(0)" class="closebtn" style="position:absolute;margin-top:-15px;margin-right:-15px; float:right;" onclick="closeNav()">×</a>
    </div>



    


    <?php if(isset($_SESSION['logged_user'])){ ?>
        <a  class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(violet, indigo, blue,green) 1;text-align: left;font-size:20px;"   href="<?= LANG_URL ?>"><span align="left"><?=lang('home')?></span></a>    
        <a  class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;"  href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart') ?></a>    

        <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/myaccount' ?>"><?= lang('my_acc') ?></a>   
     <?php   if ( $userInfo['subscribed']==1){ ?>
                <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/mysubscription' ?>">सदस्यता</a>
                    <?php } else {?>
<a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?=base_url()?>Home/Showsubscription">Subscription</a> <?php }?>



<?php
                                if (!empty($nonDynPages)) {
                                    foreach ($nonDynPages as $addonPage) {
                                        ?>
                                        <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50; border-image: conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/' . $addonPage ?>"><?= mb_ucfirst(lang($addonPage)) ?></a>
                                        <?php
                                    }
                                }
                                if (!empty($dynPages)) {
                                    foreach ($dynPages as $addonPage) {
                                        ?>
                                        
                                        <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/page/' . $addonPage['pname'] ?>"><?= mb_ucfirst($addonPage['lname']) ?></a>

                                            <?php
                                        }
                                    }
                                    ?>
                                    

 <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/contacts' ?>"><?= lang('contacts') ?></a>

<a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(red,pink,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/logout' ?>"><?= lang('logout') ?></a>



    <?php } else { ?>

        <a  class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;"  href="<?= LANG_URL ?>"><?=lang('home')?></a>  
        <a  class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;"  href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart') ?></a>   
        <a  class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;"  href="<?=base_url()?>Home/Showsubscription">Subscription</a>     
        <a href="<?= LANG_URL . '/login' ?>" class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;  border-image: conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;">  <?= lang('login') ?></a>
        <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image: conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/register' ?>"><?= lang('register') ?></a>    
        

    <?php
                                if (!empty($nonDynPages)) {
                                    foreach ($nonDynPages as $addonPage) {
                                        ?>
                            <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50; border-image: conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/' . $addonPage ?>"><?= mb_ucfirst(lang($addonPage)) ?></a>
                                        <?php
                                    }
                                }
                                if (!empty($dynPages)) {
                                    foreach ($dynPages as $addonPage) {
                                        ?>
                                        
         <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/page/' . $addonPage['pname'] ?>"><?= mb_ucfirst($addonPage['lname']) ?></a>

                                            <?php
                                        }
                                    }
                                    ?>
                                
    <a class="btn btn-light  active" style=" background-color: none;color: white;border: 2px solid #4CAF50;border-image:conic-gradient(lime, aqua, blue,magenta) 1;text-align: left;font-size:20px;" href="<?= LANG_URL . '/contacts' ?>"><?= lang('contacts') ?></a>
<?php }?>
</div>



                 

<div id="wrapper">
            <div id="content">
                <?php if ($multiVendor == 1) { ?>
                    <div id="top-user-panel" class="hidden">
                        <d class="container">
                            <a href="<?= LANG_URL . '/vendor/register' ?>" class="btn btn-default"><?= lang('register_me') ?></a>
                            <form class="form-inline" method="POST" action="<?= LANG_URL . '/vendor/login' ?>">
                                <div class="form-group">
                                    <input type="email" name="u_email" class="form-control" placeholder="<?= lang('email') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="u_password" class="form-control" placeholder="<?= lang('password') ?>">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember_me"><?= lang('remember_me') ?></label>
                                </div>
                                <button type="submit" name="login" class="btn btn-default"><?= lang('u_login') ?></button>
                            </form> 
                        </d>
                    </div>
                <?php } ?>
                <div id="languages-bar" class="hidden">
                    <div class="container">
                        <?php
                        $num_langs = count($allLanguages);
                        if ($num_langs > 0) {
                            ?>
                            <ul class="pull-left">
                                <?php
                                $i = 1;
                                $lang_last = '';
                                foreach ($allLanguages as $key_lang => $lang) {
                                    ?>
                                    <li <?= $i == $num_langs ? 'class="last-item"' : '' ?>>
                                        <img src="<?= base_url('attachments/lang_flags/' . $lang['flag']) ?>" alt="Language-<?= MY_LANGUAGE_ABBR ?>"><a href="<?= base_url($key_lang) ?>"><?= $lang['name'] ?></a>
                                    </li>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </ul>
                        <?php } ?>
                        <div class="phone pull-right" class="hidden">
                            <?php
                            if ($footerContactPhone != '') {
                                ?>
                                <img src="<?= base_url('template/imgs/Phone-icon.png') ?>" alt="Call us">
                                <?php
                                echo $footerContactPhone;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="top-part" class="hidden">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-4 left">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('attachments/site_logo/' . $sitelogo) ?>" class="site-logo" alt="<?= $_SERVER['HTTP_HOST'] ?>">
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-5 col-lg-5">
                                <div class="input-group" id="adv-search">
                                    <input type="text" value="<?= isset($_GET['search_in_title']) ? $_GET['search_in_title'] : '' ?>" id="search_in_title" class="form-control" placeholder="<?= lang('search_by_keyword_title') ?>" />
                                    <div class="input-group-btn">
                                        <div class="btn-group" role="group">
                                            <div class="dropdown dropdown-lg">
                                                <button type="button" class="button-more dropdown-toggle mine-color" data-toggle="dropdown" aria-expanded="false"><?= lang('more') ?> <span class="caret"></span></button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <form class="form-horizontal" method="GET" action="<?= isset($vendor_url) ? $vendor_url : LANG_URL ?>" id="bigger-search">
                                                        <input type="hidden" name="category" value="<?= isset($_GET['category']) ? htmlspecialchars($_GET['category']) : '' ?>">
                                                        <input type="hidden" name="in_stock" value="<?= isset($_GET['in_stock']) ? htmlspecialchars($_GET['in_stock']) : '' ?>">
                                                        <input type="hidden" name="search_in_title" value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>">
                                                        <input type="hidden" name="order_new" value="<?= isset($_GET['order_new']) ? htmlspecialchars($_GET['order_new']) : '' ?>">
                                                        <input type="hidden" name="order_price" value="<?= isset($_GET['order_price']) ? htmlspecialchars($_GET['order_price']) : '' ?>">
                                                        <input type="hidden" name="order_procurement" value="<?= isset($_GET['order_procurement']) ? htmlspecialchars($_GET['order_procurement']) : '' ?>">
                                                        <input type="hidden" name="brand_id" value="<?= isset($_GET['brand_id']) ? htmlspecialchars($_GET['brand_id']) : '' ?>">
                                                        <div class="form-group">
                                                            <label for="quantity_more"><?= lang('quantity_more_than') ?></label>
                                                            <input type="text" value="<?= isset($_GET['quantity_more']) ? htmlspecialchars($_GET['quantity_more']) : '' ?>" name="quantity_more" id="quantity_more" placeholder="<?= lang('type_a_number') ?>" class="form-control">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="added_after"><?= lang('added_after') ?></label>
                                                                    <div class="input-group date">
                                                                        <input type="text" value="<?= isset($_GET['added_after']) ? htmlspecialchars($_GET['added_after']) : '' ?>" name="added_after" id="added_after" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="added_before"><?= lang('added_before') ?></label>
                                                                    <div class="input-group date">
                                                                        <input type="text" value="<?= isset($_GET['added_before']) ? htmlspecialchars($_GET['added_before']) : '' ?>" name="added_before" id="added_before" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="search_in_body"><?= lang('search_by_keyword_body') ?></label>
                                                            <input class="form-control" value="<?= isset($_GET['search_in_body']) ? htmlspecialchars($_GET['search_in_body']) : '' ?>" name="search_in_body" id="search_in_body" type="text" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="price_from"><?= lang('price_from') ?></label>
                                                                    <input type="text" value="<?= isset($_GET['price_from']) ? htmlspecialchars($_GET['price_from']) : '' ?>" name="price_from" id="price_from" class="form-control" placeholder="<?= lang('type_a_number') ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="price_to"><?= lang('price_to') ?></label>
                                                                    <input type="text" name="price_to" value="<?= isset($_GET['price_to']) ? htmlspecialchars($_GET['price_to']) : '' ?>" id="price_to" class="form-control" placeholder="<?= lang('type_a_number') ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-inner-search">
                                                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                                        </button>
                                                        <a class="btn btn-default" id="clear-form" href="javascript:void(0);"><?= lang('clear_form') ?></a>
                                                    </form>
                                                </div>
                                            </div>
                                            <button type="button" onclick="submitForm()" class="btn-go-search mine-color">
                                                <img src="<?= base_url('template/imgs/search-ico.png') ?>" alt="Search">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3" class="hidden">
                                <div class="basket-box">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="<?= base_url('template/imgs/green-basket.png') ?>" class="green-basket" alt="">
                                            </td>
                                            <td>
                                                <div class="center">
                                                    <h4><?= lang('your_basket') ?></h4>
                                                    <a href="<?= LANG_URL . '/checkout' ?>"><?= lang('checkout_top_header') ?></a> |
                                                    <a href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart_only') ?></a>
                                                </div>
                                            </td>
                                            <td>
                                                <ul class="shop-dropdown">
                                                    <li class="dropdown text-center">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> 
                                                            <div><span class="sumOfItems"><?= is_numeric($cartItems) && (int)$cartItems == 0 ? 0 : $sumOfItems ?></span> <?= lang('items') ?></div>
                                                            <img src="<?= base_url('template/imgs/shopping-cart-icon-515.png') ?>" alt="">
                                                            <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                                                            <?= $load::getCartItems($cartItems) ?>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>


<script>   
   AOS.init(); 
</script>
<script>


    var input = document.getElementById("search_in_title");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("myBtn").click();
  }
});
</script>
<script>
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
</script>
<script>

function openNav() {
    document.getElementById("mySidenav").style.width = "80%";
    //document.getElementById("flipkart-navbar").style.width = "100%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    document.body.style.overflow = "hidden";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
    document.body.style.overflow = "auto";

}</script>
<script>
    // For the thumbnail demo! :]

var count = 1
setTimeout(demo, 500)
setTimeout(demo, 700)
setTimeout(demo, 900)
setTimeout(reset, 2000)

setTimeout(demo, 2500)
setTimeout(demo, 2750)
setTimeout(demo, 3050)


var mousein = false
function demo() {
   if(mousein) return
   document.getElementById('demo' + count++)
      .classList.toggle('hover')
   
}

function demo2() {
   if(mousein) return
   document.getElementById('demo2')
      .classList.toggle('hover')
}

function reset() {
   count = 1
   var hovers = document.querySelectorAll('.hover')
   for(var i = 0; i < hovers.length; i++ ) {
      hovers[i].classList.remove('hover')
   }
}

document.addEventListener('mouseover', function() {
   mousein = true
   reset()
})
</script>