<!-- Gallery Page start -->

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Nashik Tourism &mdash; Gallery</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('/assets/images/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?= base_url('/assets/images/plane.png')?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/default-skin/default-skin.min.css'>
  <link rel="stylesheet" href="<?= base_url('/assets/css/gallery.css')?>">
  <style>
    .header {
      text-align: center;
      padding: 32px;
      margin: auto;
    }
  </style>
</head>
<body style="padding: 15px;">
  <div class="header">
    <h2>GALLERY</h2>
    <p style="font-size: 18px; "><i class="fa fa-quote-left" aria-hidden="true"></i> Nashik is just not a city it's a blessings of Nature..!! <i class="fa fa-quote-right" aria-hidden="true"></i></p>
  </div>
  <div class="container-fluid">
<!-- partial:index.partial.html -->
<div class="gallery" itemscope="" itemtype="http://schema.org/ImageGallery">

<?php for($i=0; $i<count($data); $i++):?>
    <?php if($data[$i]->active==1):?>
  <figure class="<?=$data[$i]->class_name?>" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
    <a href="<?= base_url('assets/images/') . $data[$i]->img ?>" itemprop="contentUrl" data-size="1200x1000">
      <img class="lazyload lazypreload fadein" data-src="<?= base_url('assets/images/') . $data[$i]->img ?>" itemprop="thumbnail" alt="Image description"/>
    </a>
    <figcaption class="gallery-caption" itemprop="caption description"><?=$data[$i]->name?></figcaption>
  </figure>
    <?php endif;?>
  <?php endfor;?>  
</div>

<!-- Root element of PhotoSwipe. Must have class pswp.-->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  
<!--        Background of PhotoSwipe.
  It's a separate element as animating opacity is faster than rgba().     -->
  <div class="pswp__bg"></div>
  <!-- Slides wrapper with overflow:hidden.-->
  <div class="pswp__scroll-wrap">
    <!--
    Container that holds slides.
    PhotoSwipe keeps only 3 of them in the DOM to save memory.
    Don't modify these 3 pswp__item elements, data is added later on.
    -->
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <!-- Controls are self-explanatory. Order can be changed.-->
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <button class="pswp__button pswp__button--share" title="Share"></button>
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR-->
        <!-- element will get class pswp__preloader--active when preloader is running-->
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.0.2/lazysizes.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.2/photoswipe-ui-default.js'></script>
<script  src="<?= base_url('/assets/js/gallery.js')?>"></script>
</div>
</body>

</html>
<!-- Gallery page end -->