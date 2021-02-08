<!-- View more page -->
<section class="section single-blog-page text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog-content">
					<h2 class="display-5 pb-3 info-title responsive" style="font-size:2rem;"><?= $data[0]->name ?></h2>
					<div class="responsive">
						<div class="blog-thumb set-bg"
							style="background-image: url(<?= base_url('assets/images/').$data[0]->img ?>" width="100%"
							class="responsive" alt="">
						</div>
					</div>
					<p class="text-justify responsive"> <?= $data[0]->des ?> </p>
				</div>

			</div> <!-- sidebar -->
			<div class="col-lg-4 col-md-7 pt-3 ml-auto mr-auto pt-lg-3 d-none d-lg-block">
				<div class="mt-5 w-100">
					<iframe src="https://www.google.com/maps/d/embed?mid=1f5HjAtiHG-tvu9ctnXuZ4HTd63hxo0fl" width="100%"
						height="87%" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</div>


			<div class="widget-item">
				<h3 class="font-weight-light text-black text-center">Suggestions for you.</h3>
				<div class="latest-blog my-4">
					<?php for($i=0 ;$i<$len;$i++): ?>
					<?php if($tabledata[$i]->name != $data[0]->name ):?>
					<div class="lb-item  clickable py-1 px-1" id="other-raised">
						<div class="lb-thumb set-bg responsive"
							style="background-image: url(<?= base_url('assets/images/').$tabledata[$i]->img?>"></div>
						<div class="lb-content my-4">
							<div class="lb-content-title responsive text-dark"><?= $tabledata[$i]->name?></div>
							<!-- <p></p> -->
							<small><a href="<?= base_url('MainC/Places/'.$tabledata[$i]->name) ?>" style="color: blue;" clas
								s="lb-author responsive">View More</a></small>
						</div>
					</div>
					<?php endif;?>
					<?php endfor; ?>
				</div>
			</div>
		</div>
</section>