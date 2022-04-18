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

        <link rel="stylesheet" href="<?= base_url('assets/bootstrap-select-1.12.1/bootstrap-select.min.css') ?>" />
        <link href="<?= base_url('assets/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('cssloader/theme.css') ?>" rel="stylesheet" />

        <style>
        html,
body {
    height: 100%;
}

.carousel,
.item,
.active {
    height: 100%;
}

.carousel-inner {
  height: 100%;
  background: #000;
}

.carousel-caption{padding-bottom:80px;}

h2{font-size: 60px;}
p{padding:10px}

/* Background images are set within the HTML using inline CSS, not here */

.fill {
    width: 100%;
    height: 100%;
    background-position: center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    opacity:0.6;
}




/**
 * Button
 */
.btn-transparent {
  background: transparent;
  color: #fff;
  border: 2px solid #fff;
}
.btn-transparent:hover {
  background-color: #fff;
}

.btn-rounded {
  border-radius: 70px;
}

.btn-large {
  padding: 11px 45px;
  font-size: 18px;
}

/**
 * Change animation duration
 */
.animated {
  -webkit-animation-duration: 1.5s;
  animation-duration: 1.5s;
}

@-webkit-keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100px, 0, 0);
    transform: translate3d(100px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    -webkit-transform: translate3d(100px, 0, 0);
    transform: translate3d(100px, 0, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

.fadeInRight {
  -webkit-animation-name: fadeInRight;
  animation-name: fadeInRight;
}



        
        </style>
        </head>



        
  
  <!-- Full Page Image Background Carousel Header -->
  <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.marchettidesign.net/demo/optimized-bootstrap/code.jpg');"></div>
                <div class="carousel-caption">
                     <h2 class="animated fadeInLeft">Caption Animation</h2>
                     <p class="animated fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                     <p class="animated fadeInUp"><a href="#" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.marchettidesign.net/demo/optimized-bootstrap/conference.jpg');"></div>
                <div class="carousel-caption">
                     <h2 class="animated fadeInDown">Caption Animation</h2>
                     <p class="animated fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                     <p class="animated fadeInUp"><a href="#" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://www.marchettidesign.net/demo/optimized-bootstrap/campus.jpg');"></div>
                <div class="carousel-caption">
                     <h2 class="animated fadeInRight">Caption Animation</h2>
                     <p class="animated fadeInRight">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                     <p class="animated fadeInRight"><a href="#" class="btn btn-transparent btn-rounded btn-large">Learn More</a></p>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </div>
