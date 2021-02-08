<!-- Start > How to reach page -->
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h3 class="title text-center">How to Reach Nashik</h3>
            </div>
        </div>
        <div class="container">
                <div class="col-md-9 ml-auto mr-auto">
                    <?php for ($i=0; $i < count($sec1) ; $i++): ?>
                    <?php if($sec1[$i]->active==1): ?>
                        <h3 style="color: black;"><?= $sec1[$i]->name ?></h3>
                        <p class="text-justify"><?= $sec1[$i]->des ?></p>
                        <hr>
                    <?php endif; ?>
                    <?php endfor; ?>
                </div>

            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <h3 class="title text-center">Transportation with in Nashik</h3>
                        </div>
                    </div><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 ml-auto mr-auto">
                                <?php for ($i=0; $i < count($sec2) ; $i++): ?>
                                <?php if($sec2[$i]->active==1): ?>
                                <h3 style="color: black;"><?= $sec2[$i]->name ?></h3>
                                    <p class="text-justify"><?= $sec2[$i]->des ?></p>
                                <hr>
                                <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h3 class="title text-center">Find your Destination after Reached to Nashik</h3>
                    <div class="section text-center">
                        <div class="container " id="other-container">
                            <div class="col-md-9 ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-9 ml-auto mr-auto ">
                                        <h4><b>1.TRAMBAKESHWAR, NASHIK : </b> </h4>
                                        <h5>Nashik Road <i class="fa fa-long-arrow-right"> </i> CBS <i
                                                class="fa fa-long-arrow-right"></i> Trambakeshwar Bus</h5>
                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;OR</h5>
                                        <h5>CBS <i class="fa fa-long-arrow-right"> </i> Trambakeshwar Bus</h5>
                                        <hr>
                                        <h4><b>2.PANCHVATI, NASHIK : </b> </h4>
                                        <h5>Nashik Road <i class="fa fa-long-arrow-right"> </i> Panchavati Bus </h5>
                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;OR</h5>
                                        <h5>CBS <i class="fa fa-long-arrow-right"> </i> Panchavati Bus</h5>
                                        <hr>
                                        <h4><b>3.SAPTASHRUNGI GADH, VANI : </b> </h4>
                                        <h5>Nashik Road <i class="fa fa-long-arrow-right"> </i> CBS <i
                                                class="fa fa-long-arrow-right"></i> Saptashrungi Gad, Vani Bus </h5>
                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;OR</h5>
                                        <h5>CBS <i class="fa fa-long-arrow-right"> </i> Saptashrungi Gad, Vani Bus </h5>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End > How to reach page -->