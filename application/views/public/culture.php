<!-- Culture page -->
<div class="section text-center">
    <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
        <h2 class="font-weight-light text-black text-center">Our Nashik!!!</h2>
            <!-- <h2 class="title">Our Nashik !!!</h2> -->
            <h4 class="description">A city where one gets intoxicated by spirituality and wine, where one is mesmerized by the green pastures and the mountains and where history meets mythology, is Nashik! </h4>
        </div>
    </div>
    <div class="about py-6" id="about">
		<div class="container">

    <?php for($i=0; $i < count($sec1); $i++): ?>
        <?php if ($sec1[$i]->active == 1): ?>
				<h2 class="font-weight-light text-black text-center"><?=$sec1[$i]->name?>!!!</h2>
					<p class="iner mt-4" style="font-size: 17px;" ><?= $sec1[$i]->des1 ?></p>
					<p class="iner mt-4" style="font-size: 17px;"><?= $sec1[$i]->des2 ?></p>
					<br>
                <img src="<?= base_url('assets/images/').$sec1[$i]->img ?>" class="responsive" alt="">
				<p class="iner mt-4" style="font-size: 17px;"><?= $sec1[$i]->des3 ?></p>
			</div>
		</div>
    <?php endif?>
        <?php endfor?>


<div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-md-3 text-center">
              <h2 class="font-weight-light text-black text-center">Our Events!!!</h2>
            <h4 class="color-black-opacity-5">The Events of Nashik City</h4>
          </div>
        </div>
        <div class="section">
        <div class="container">
        <div class="row mb-3 align-items-stretch">

        <?php for( $i=0; $i < count($sec2); $i++ ): ?>
            <?php if($sec2[$i]->active==1): ?>

          <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
            <div class="h-entry">
              <img src="<?= base_url('assets/images/').$sec2[$i]->img ?>" alt="Image" style="width:100%; " class="img-fluid">
              <br>
              <h3 class="mb-3"><?= $sec2[$i]->name ?></h3>
             
              <p style="text-align: justify; font-size: 15px;"><?= $sec2[$i]->des?></p>
              <p><a href="<?= base_url('MainC/Places/'.$sec2[$i]->name) ?>" class="btn m-auto">Learn More</a></p>
            </div> 
          </div>

          <?php endif?>
          <?php endfor?>

                
        </div>
        <div class="col text-center">
           <a href="<?= base_url('MainC/All/Cultural') ?>" style="color:black;" class="btn btn-outline-default btn-round btn-white btn-lg">View Our Culture</a>
        </div>
      </div>
      </div>
  </div>
</div>
    <div class="section responsive" id="carousel">
<section class="welcome py-5">
	<div class="container py-3">
  <h2 class="font-weight-light text-black text-center">Our Speciality</h2> 

  <h4 class="color-black-opacity-5">Exploring the city of diversity....</h4>
<!--  carousel  -->
  <div class="col-md-14 mr-auto ml-auto">
                <!-- Carousel Card -->
                <div class="card card-raised card-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
                        data-interval="3000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner" id="carino1">
                    <div class="carousel-item active"><br><br>
                        <div class="row welcome-grids">
			                    <div class="col-lg-6">
				                    <h2 class="mb-3"><?= $sec3[0]->name?></h2>
				                    <h3><?= $sec3[0]->des1?></h3> 
				                    <p class="my-4"  style="font-size: 125%;margin-left: 18px; text-align:justify; margin-right: 18px;" ><?= $sec3[0]->des ?></p>
				                    <!-- <a href="">Read More</a> -->
			                    </div>
			                    <div class="col-lg-6 mt-lg-0 mt-5 welcome-grid3 d-none d-lg-block" >
				                    <div class="position mx-2 my-2 ">
                            <img src="<?= base_url('assets/images/').$sec3[0]->img ?>" alt="" class="img-fluid">
				                    </div>
			                    </div>
                        </div>                               
                    </div>
                    <?php for ($i=1; $i < count($sec3) ; $i++): ?>
                      <?php if($sec3[$i]->active==1) :?>
                    <div class="carousel-item"> 
                            <div class="row welcome-grids">
			                    <div class="col-lg-6">
				                    <h2 class="mb-3"><?= $sec3[$i]->name?></h2>
				                    <h3><?= $sec3[$i]->des1 ?></h3>
				                    <p class="my-4" style="font-size: 125%;margin-left: 18px; text-align:justify;margin-right: 18px;"><?= $sec3[$i]->des?></p>
				                    <!-- <a href="">Read More</a> -->
			                    </div>
			                    <div class="col-lg-6 mt-lg-0 mt-5 welcome-grid3 d-none d-lg-block">
				                    <div class="position mx-2 my-2">
					                  <img src="<?= base_url('assets/images/').$sec3[$i]->img?>" alt="" class="img-fluid" />
				                    </div>
			                    </div>
                        </div>        
                            </div>
                      <?php endif; ?>
                            <?php endfor ?>
</div>
<!-- </section> -->
</div>
</div>
</div>
</div>
</section>
</div>
<!-- </div> -->
</div>
<!--end carousel -->


