<!-- Destination Page -->
<div class="site-section" style="font-family: verdana;">
    <h2 class="font-weight-light text-black text-center" style="font-family: verdana;">Places For Worship!!!</h2><br><br><br>
    <div class="container">
        <div class="row align-items-stretch">
            <?php for ($i=0; $i < count($sec1) ; $i++): ?>
                <?php if($sec1[$i]->active==1) :?>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <a href="<?= base_url('MainC/Places/'.$sec1[$i]->name) ?>" class="unit-1 text-center">
                        <div class="">
                        <img src="<?= base_url('assets/images/') . $sec1[$i]->img ?>"  alt="Image" class="img-fluid "></div>
                        <div class="unit-1-text">
                        </div>
                    </a>
                </div>
            <?php endif?>
            <?php endfor; ?>

            <?php for ($i=0; $i < count($sec1) ; $i++): ?>
                <?php if($sec1[$i]->active==1) :?>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="unit-4 d-flex">
                        <div><br>
                            <h3><?= $sec1[$i]->name ?></h3>
                            <p style="text-align: justify;"><?= $sec1[$i]->des ?></p>
                            <p><a href="<?= base_url('MainC/Places/'.$sec1[$i]->name) ?>" class="btn m-auto">Learn More</a></p>
                        </div>
                    </div>
                </div>
            <?php endif?>
            <?php endfor; ?>
        </div>
        <div class="col text-center"><br><br>
            <a href="<?= base_url('MainC/All/Tourist') ?>" style="color:black;" class="btn btn-outline-default btn-round btn-white btn-lg">View All Places</a>
        </div>
      </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="font-weight-light text-black">Exploring Nashik!!!</h2>
                <p class="color-black-opacity-5">Choose Your Next Destination</p>
            </div>
        </div>
        <div class="row">
            
        <?php for ($i=0; $i < count($sec2) ; $i++): ?>
                <?php if($sec2[$i]->active==1) :?>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <a href="<?= base_url('MainC/Places/'.$sec2[$i]->name) ?>" class="unit-1 text-center">
                        <img src="<?= base_url('assets/images/') . $sec2[$i]->img ?>" alt="Image" class="img-fluid">
                        <div class="unit-1-text">

                            <h3 class="unit-1-heading"><?= $sec2[$i]->name ?></h3>
                        </div>
                    </a>
                </div>
                    <?php endif?>
                    <?php endfor; ?>
        </div><br>
        <div class="col text-center">
           <a href="<?= base_url('MainC/All/Tourist') ?>" style="color:black;" class="btn btn-outline-default btn-round btn-white btn-lg">View All Places</a>
        </div>
    </div>
</div>

            <?php for ($i=0; $i < count($sec3) ; $i++): ?>
            <?php if($sec3[$i]->active==1) :?>
<div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(<?= base_url('assets/images/') . $sec3[0]->img ?>); background-attachment: fixed;">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
                <a target="_blank" href="https://www.youtube.com/embed/569lQejCuFQ?start=0&autoplay=1"><i class="fa fa-play-circle" style="color: #ffff; font-size: 70px; "></i></a>
                <h2 class="text-white font-weight-light mb-5 h1" style="font-size: 5vw;"><?= $sec3[0]->des ?> </h2>
            </div>
        </div>
    </div>
</div>
<?php endif?>
<?php endfor; ?>


<div class="site-section">
    <div class="container text-justify">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="font-weight-light text-black">Your Planning!!</h2>
                <p class="color-black-opacity-5">You can plan your trip like...</p>
            </div>
        </div>
        <div class="row align-items-stretch">

        <?php for ($i=0; $i < count($sec4) ; $i++): ?>
        <?php if($sec4[$i]->active==1) :?>

                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <div class="unit-4 d-flex">
                        <div>
                            <h3> <b><?= $sec4[$i]->name ?></b></h3>
                            <p style="font-size: 17px;"><?= $sec4[$i]->des ?></p>
                            </br>
                        </div>
                    </div>
                </div>
           <?php endif?>
           <?php endfor; ?>

        </div>
    </div>
</div>
<div class="container">
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 style="font-family: verdana;">Museums!!</h2>
                <h4>A museum is an institution that cares for (conserves) a collection of artifacts and other objects of artistic, cultural, historical, or scientific importance....!!!</h4>
            </div>
            <div class="section section-examples">
                <div class="row">
                <?php for ($i=0; $i < count($sec5) ; $i++): ?>
                <?php if($sec5[$i]->active==1) :?>
                        <div class="col-md-4 ml-auto mr-auto ">
                            <a href="<?= base_url('MainC/Places/'.$sec5[$i]->name) ?>" style="text-transform: uppercase;" class="unit-1 text-center">
                                <img src="<?= base_url('assets/images/') . $sec5[$i]->img ?>" alt="Image" class="img-fluid">
                           </a>
                            <h3 style="font-size: 16px; text-transform: uppercase;"><b><?= $sec5[$i]->name ?></b></h3>
                        </div>
                        
                        <?php endif?>
                        <?php endfor; ?>

                </div>
            </div>
        </div>
        <div class="col text-center">
           <a href="<?= base_url('MainC/All/Tourist') ?>" style="color:black;" class="btn btn-outline-default btn-round btn-white btn-lg" target="_self">View All Places</a>
        </div>
    </div>
</div>

<!--  carousel  -->
<div class="site-section">
    <div class="container text-justify">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="font-weight-light text-black">Mountains!!</h2>
                <h4>A mountain is a large landform that rises above the surrounding land in a limited area, usually in the form of a peak.A mountain is generally steeper than a hill. Mountains are formed through tectonic forces or volcanism. These forces can locally raise the surface of the earth....!!!</h4>
            </div>
        </div>
        <div class="section" id="carousel">
            <div class="container responsive">
                <div class="row">
                    <div class="col-md-12 mr-auto ml-auto">
                        <!-- Carousel Card -->
                        <div class="card card-raised card-carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100 h-100" style="height:fit-content" src="<?= base_url('assets/images/') . $sec6[0]->img ?>" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>
                                                <a href="<?=base_url('MainC/Places/').$sec6[0]->name?>" style="color: #fff;"><i class="material-icons fa fa-map-marker">&nbsp;&nbsp;</i><?= $sec6[0]->name ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                    <?php for ($i=1; $i < count($sec6) ; $i++): ?>
                                        <?php if($sec6[$i]->active==1) :?>

                                        <div class="carousel-item">
                                            <img class="d-block w-100 h-100" style="height:fit-content" src="<?= base_url('assets/images/') . $sec6[$i]->img ?>" alt="Second slide">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h4>
                                                    <a href="<?=base_url('MainC/Places/').$sec6[$i]->name?>" style="color: #fff;"><i class="material-icons fa fa-map-marker">&nbsp;&nbsp;</i><?= $sec6[$i]->name ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                        <?php endif?>
                                        <?php endfor; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="material-icons fa fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="material-icons fa fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Carousel Card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--         end carousel -->
<div class="section">
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto ">
                <h2 style="font-family: verdana;">Waterfalls!!</h2>
                <h4>A waterfall is an area where water flows over a vertical drop or a series of steep drops in the course of a stream or river. Waterfalls also occur where meltwater drops over the edge of a tabular iceberg or ice shelf....!!!</h4>
            </div>
            <div class="section sextion-examples container">
                <div class="team pt-3">
                    <div class="row">
                                    <?php for ($i=0; $i < count($sec7) ; $i++): ?>
                                        <?php if($sec7[$i]->active==1) :?>

                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="team-player">
                                    <div class="card card-plain px-3"> 
                                    <a href="<?= base_url('MainC/Places/'.$sec7[$i]->name) ?>" class="unit-1 text-center">
                                        <img src="<?= base_url('assets/images/') . $sec7[$i]->img ?>" alt="img-responsive" class="img-resized img-responsive"></a>
                                        <h4 class="card-title" style="font-family: verdana; font-size: 15px;"><?= $sec7[$i]->name ?>
                                            <br>
                                        </h4>
                                        
                                        <div class="card-body">
                                            <p class="card-description text-justify"><?= $sec7[$i]->des ?></p>
                                            <p><a href="<?= base_url('MainC/Places/'.$sec7[$i]->name) ?>" class="btn m-auto">Learn More</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
           <a href="<?= base_url('MainC/All/Tourist') ?>" style="color:black;" class="btn btn-outline-default btn-round btn-white btn-lg">View All Places</a>
        </div>
    </div>
</div>