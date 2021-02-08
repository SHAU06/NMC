<!-- View all content page -->
  <div class="container">
    <h4 class="widget-title display-3 text-center">All Places</h4>
    <div class="row justify-content-center text-center" style="font-family: verdana;" >
      <?php foreach($data as $row): ?>
      <div class="card mx-4" style="width: 19.5rem;">
        <img class="card-img-top" style="width: 100%; object-fit: cover;
            height: 180px;" src="<?= base_url('assets/images/').$row->img?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?= $row->name ?></< /h5>
            <p class="text-muted"><?= substr($row->des,0,91);?>.</p>
            <small><a href="<?= base_url('MainC/Places/'.$row->name)?>" clas
                s="lb-author responsive">View</a></small>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <ul class="pagination pagination-info justify-content-center text-center my-4">
      <?= $this->pagination->create_links() ?>
    </ul>
  </div>