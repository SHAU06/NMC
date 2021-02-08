<!-- Code for alert messages -->

<!-- Code Error alert -->
<div class="container">
<?php if($this->session->flashdata('error')):?>
 <div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh snap!</strong> <a href="#" class="alert-link"><?= $this->session->flashdata('error')?></a> 
</div>
<?php endif;
 $this->session->unset_userdata('error'); ?>
 </div>


<!-- Code for success alert -->
 <div class="container">
<?php if($this->session->flashdata('success')):?>
 <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Congratulations!</strong> <a href="#" class="alert-link"><?= $this->session->flashdata('success')?></a> 
</div>
<?php endif;
 $this->session->unset_userdata('success'); ?>
 </div>