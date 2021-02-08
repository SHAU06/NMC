<!-- Foodstuff page -->

<div class="section">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 ml-2 mr-2" style="text-align: center;">
            <h2 class="font-weight-light text-black">Foods!!!</h2>
            <h5 class="description">Nashik has a personality of its own, due to its mythological, historical, social and
                cultural importance. The city is situated on the banks of the Godavari River, making it one of the
                holiest places for Hindus all over the world. Nashik has a rich historical past, as the mythology has it
                that Lord Rama.</h5>
        </div>
    </div>
    <!-- Food Stuff Section 1 -->
    <div class="container">
    <div class="bg-white">
        <div class="col-md-12 bg-light w-100">
            <div class="m-auto">
                <div class="row padding">
                <?php for ($i = 0; $i < count($sec1); $i++) : ?>
                <?php if($sec1[$i]->active==1) :?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="text-center">
                                    <img src="<?= base_url('/assets/images/') . $sec1[$i]->img;  ?>" id="FoodSec1" class="card-img-top" alt="...">
                                    <div class="card-body ">
                                        <h5 class="card-title display-4 title text-dark" style="font-size: 25px;"><?= $sec1[$i]->name ?></h5>

                              <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php endfor ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
    <!--  carousel  -->
    <div class="section mt-3" id="carousel">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12 mr-auto ml-auto">
                    <!-- Carousel Card -->
                    <div class="card card-raised card-carousel">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                            <?php for ($i = 0; $i < count($sec2); $i++) : ?>
                                <?php if($sec2[$i]->active==1) :?>
                                    <div class="carousel-item <?php if ($i == 0) {
                                                                    echo "active";
                                                                } ?>">
                                        <img class="d-block w-100 h-100" style="height:10rem" src="<?= base_url('assets/images/') . $sec2[$i]->img ?>" alt="Food Slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>
                                                <a style="color: #fff;"><?= $sec2[$i]->des ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endif;?>
                                <?php endfor ?>
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
    <!--end carousel -->
    <!-- Food Stuff Section 2 -->
    
    
    <!-- Food Stuff Section 3 -->
    <div class="container">
    <div class="features my-2">
        <div class="row">
            <div class="m-auto">
                <h2 class="font-weight-light text-black text-center title">Nashik's Trendiest Food!!! </h2>
            </div>
            <div class="container-fluid mx-auto">
                <div class="row padding">
                <?php for ($i = 0; $i < count($sec3); $i++) : ?>
                        <?php if($sec3[$i]->active==1) :?>
                        <div class="col-sm-6">
                            <div class="card">
                                <img class="card-img-top " style="height:18rem;" src="<?= base_url('/assets/images/') . $sec3[$i]->img;  ?>" style="height:100%" alt="Card image cap">
                                <div class="card-body">
                                    <div class="card-header card-header-success">
                                        <h3 class="card-title"><?= $sec3[$i]->name ?></h3>
                                        
                                    </div>
                                    <h4 class="card-title"><?= $sec3[$i]->title ?> - </h4>
                                    <?= $sec3[$i]->des ?>
                                </div>
                                <div class="card-footer">
                                    <a href="<?=base_url('/MainC/Places/').$sec3[$i]->name?>" class="text-muted">Know More</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endfor ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End  Food Stuff Section 2 -->
    <br>
</div>


    <!-- Food Stuff Section 4 -->
    <div class="container" style="font-family: verdana;">
    <div class=" text-center m-0 ">
        <h2 class="font-weight-light text-black text-center title">Great Misal Points!!!</h2>
        <div class="team">
            <div class="row">
                <?php for ($i = 0; $i < count($sec4); $i++) : ?>
                    <?php if($sec4[$i]->active==1) :?>
                    <div class="col-md-4">
                        <div class="team-player">
                            <div class="card card-plain px-2" style="background= #6b5250;">
                            <a href="<?= base_url('MainC/Places/'.$sec4[$i]->name) ?>" class="unit-1 text-center">
                                <img src="<?= base_url('assets/images/') . $sec4[$i]->img ?>" alt="Thumbnail Image" class=" card-img img-circle img-resized "></a>
                                <h4 class="card-title" style="text-transform: uppercase; font-family: verdana;"><?= $sec4[$i]->name ?></h4>
                                <div class="card-body">
                                    <p class="card-description text-justify " style="font-family: verdana; text-align: justify;"><?= $sec4[$i]->des ?></p>
                                    <p><a href="<?=base_url('MainC/Places/').$sec4[$i]->name?>" class="btn m-auto">Learn More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
                <?php endfor ?>
            </div>
        </div>
        <div class="col text-center"><br><br>
      <a href="<?= base_url('MainC/All/Food') ?>"  style="color:black;" class="btn btn-outline-default btn-round btn-white btn-lg">View All Dishes</a>
    </div>
    </div>
   
    </div>
</div>