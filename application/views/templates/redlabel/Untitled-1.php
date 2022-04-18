?>
    <div id="home-slider" class="carousel slide" data-ride="carousel" >
       
        <div class="carousel-inner" role="listbox" >
            <?php
            $i = 0;
            foreach ($sliderProducts as $article) {
                ?>

                        <?php 
                             $avi=strtolower(trim($article['title']));
                            if (strpos($avi,"dudhai") !==false ||  strpos($avi,"दुधाई")!==false ){
                                        

                              ?>  
                            <div class="item <?= $i == 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url('attachments/shop_images/' . $article['image']) ?>');width:100%;height:30%; " onclick="location.href='<?=base_url()?>Home/Showsubscription';">
            
                                                           
                                  <?php  } else { ?>
                                   
                             <div class="item <?= $i == 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url('attachments/shop_images/' . $article['image']) ?>');width:100%;height:30%; " onclick="location.href='<?= LANG_URL . '/' . $article['url'] ?>';">         
                             

                                  <?php }?>
                    <div class="container" style=" background: rgba(255, 255, 240, 0.1);backdrop-filter: blur(4px);" >
                        <div class="row" >
                            <div class="col-sm-6 text-primary" >
                                <h3>
                                    <?php $avi=strtolower(trim($article['title']));
                                     if (strpos($avi,"dudhai") !==false ||  strpos($avi,"दुधाई")!==false ){
                                        

                              ?>  <a href="<?=base_url()?>Home/Showsubscription" >
                                <?= character_limiter($article['title'], 100) ?>
                                </a>
                                  <?php  } else { ?>
                                      <a href="<?= LANG_URL . '/' . $article['url'] ?>">
                                      &nbsp&nbsp<?= character_limiter($article['title'], 100) ?>
                                      </a>

                                  <?php }?>
                                    
                                </h3>
                                <?php if(strlen(strip_tags($article['basic_description']))>250){

                                    ?>

                                        <div class="description">
                                    
                                        &nbsp&nbsp<?= character_limiter(strip_tags($article['basic_description']), 250) ?>
                                 </div>
                                <?php } else { ?>

                                    <div class="description">
                                    
                                   <?= $article['basic_description']?>
                                </div>

                                    
                             <?php   }  ?>

                          
                                    

                      
                            </div>
                           
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
       
        <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#home-slider" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    
<?php }} ?>
