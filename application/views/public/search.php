
<!-- Search page -->
<div class="widget-item m-5 pt-5 responsive">
    <p class="color-black-opacity-5" style="font-size: 30px;"><?= $result['msg'] ?></p>
    <div class="latest-blog row responsive">

        <?php foreach($result['data'] as $row): ?>
        <div class="lb-item  clickable py-2 px-4" id="other-raised" style="width:350px" >
        
        <div class="lb-thumb set-bg responsive" style="background-image: url('<?= base_url('assets/images/'.$row->img)?>')"></div>          
            <div class="lb-content">
                <div class="lb-content-title autoHeight">  <?= $row->name ?></div>
        <?php $a="Ipsum dolor sit amet, consectetur adipisc ing consecips" ?>               
                <a href="<?= base_url('MainC/Places/'.$row->name)?>" class="lb-author responsive">By Admin</a>
            </div>            
        </div>       
        <?php endforeach; ?>
    </div><br>
    <ul class="pagination pagination-info ">
    <?= $this->pagination->create_links() ?>
</ul>
</div>







