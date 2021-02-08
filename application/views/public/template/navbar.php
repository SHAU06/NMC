<nav class="navbar navbar -transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100"
    id="sectionsNav">

    <div class="navbar-translate">
        <a class="navbar-brand" href="<?= base_url('MainC/')?>">
            <i class="fa fa-plane"> </i>
            NASHIK TOURISM </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            
        <?php foreach($Page['navbar'] as $nav): ?>
        <?php if($nav->active): ?>
        <li class="nav-item" style="letter-spacing: 1px; font-family: verdana;">
                <a class="nav-link" href="<?= base_url($nav->link)?>">
                <b> <?= $nav->name ?> </b>
            </a>
        </li>
        
        <?php endif ?>
        <?php endforeach ?>
        
        <!-- <li class="nav-item" style="letter-spacing: 1px; font-family: verdana;">
                <a class="nav-link" href="<?= base_url('WorkC/')?>">
                    <b> Login </b>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank"
                    data-original-title="Follow us on Twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank"
                    data-original-title="Like us on Facebook">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank"
                    data-original-title="Follow us on Instagram">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>