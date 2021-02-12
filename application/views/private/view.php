 <!--    View Page - Start -->
 <?php if (!$C): ?>
 <div class="col-md-12">
   <div class="card">
     <div class="card-header ">
       <div class="card-title ">
         <h4> <span class="text-capitalize"><?=$k?> </span> Table
           <?php if (!in_array(strtolower($k), $read_only)): ?>
           <a role="button" class="btn btn-sm btn-success btn-round float-right"
             href="<?=base_url('UserC/loadChange/') . $k?>">
             <small class="">Change</small>
           </a>
           <?php endif?>
         </h4>
       </div>
     </div>
     <div class="card-body">
       <div class="table-responsive">
         <table class="table table-striped " id="sortable">
           <thead class=" text-primary">
             <tr>
               <th>
                 Id
               </th>
               <?php if ($this->db->field_exists("name", $k)): ?> <th>
                 Name
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("des", $k)): ?>
               <th>
                 Des
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("des1", $k)): ?>
               <th>
                 Des1
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("des2", $k)): ?>
               <th>
                 Des2
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("des3", $k)): ?>
               <th>
                 Des3
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("map_url", $k)): ?>
               <th>
                 Map Url
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("link", $k)): ?>
               <th>
                 link
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("email", $k)): ?>
               <th>
                 E-Mail
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("msg", $k)): ?>
               <th>
                 Message
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("img", $k)): ?>
               <th style="width:fit-content;">
                 Img
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("icon", $k)): ?>
               <th style="width:fit-content;">
                 Icon
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("category", $k)): ?>
               <th style="width:fit-content;">
                 Category
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists('username', $k)): ?>
               <th>
                 Username
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists('time', $k)): ?>
               <th>
                 Time
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists('action', $k)): ?>
               <th>
                 Action
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists('description', $k)): ?>
               <th>
                 Description
               </th>
               <?php endif?>
             </tr>
           </thead>
           <tbody>
             <?php $count = 0;foreach ($UserData as $d): ?>
             <!-- if k is users and verifed then show -->
             <!-- and if k is not users then show -->
             <?php if ($k !== "users" || $d->verified): ;?>

             <?php if ($this->db->field_exists('active', $k)): ?>
             <?php if ($d->active): $count++?>
             <tr id="orderby_<?=$d->id?>">
               <td scope="row" width="5%"> <?=$count?></td>

               <?php if ($this->db->field_exists("name", $k)): ?>
               <td width="10%"> <?=$d->name?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des", $k)): ?>
               <td width="50%"> <?=$d->des?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des1", $k)): ?>
               <td width="25%"> <?=$d->des1?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des2", $k)): ?>
               <td width="25%"> <?=$d->des2?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des3", $k)): ?>
               <td width="25%"> <?=$d->des3?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("map_url", $k)): ?>
               <td width="25%"> <?=$d->map_url?> </td>
               <?php endif?>


               <?php if ($this->db->field_exists("link", $k)): ?>
               <td width="10%"> <?=$d->link?> </td>
               <?php endif?>
               <?php if ($this->db->field_exists("email", $k)): ?>
               <td width="10%"> <?=$d->email?> </td>
               <?php endif?>
               <?php if ($this->db->field_exists("msg", $k)): ?>
               <td width="10%"> <?=$d->msg?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists('username', $k)): ?>
               <td width="10%"> <?=$d->username?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("img", $k)): ?>
               <td width="30%"> <img src="<?=base_url('/assets/images/') . $d->img?>" style="width:250px">
               </td>
               <?php endif?>

               <?php if ($this->db->field_exists("icon", $k)): ?>
               <td width="10%"> <?=$d->icon?>"</td>
               <?php endif?>

               <?php if ($this->db->field_exists("category", $k)): ?>
               <td width="10%"> <?=$d->category?> </td>
               <?php endif?>




               <?php if ($this->db->field_exists("id", $k) && !in_array($k, $read_only)): ?>
               <td class="flex" width="20%">
                 <button class="btn btn-info btn-round m-2" onclick="ConfirmUpdate(<?=$d->id?>)">Edit</button>
               </td>
               <?php endif?>
             </tr>
             <?php endif?>
             <?php else: ?>
             <?php $count++;?>
             <tr id="orderby_<?=$d->id?>">
               <td scope="row" width="5%"> <?=$count?></td>

               <?php if ($this->db->field_exists("name", $k)): ?>
               <td width="10%"> <?=$d->name?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des", $k)): ?>
               <td width="50%"> <?=$d->des?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des1", $k)): ?>
               <td width="25%"> <?=$d->des1?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des2", $k)): ?>
               <td width="25%"> <?=$d->des2?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("des3", $k)): ?>
               <td width="25%"> <?=$d->des3?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("email", $k)): ?>
               <td width="10%"> <?=$d->email?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("msg", $k)): ?>
               <td width="10%"> <?=$d->msg?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists('username', $k)): ?>
               <td width="10%"> <?=$d->username?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists('icon', $k)): ?>
               <td width="10%"> <?=$d->icon?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists("img", $k)): ?>
               <td width="30%"> <img src="<?=base_url('/assets/images/') . $d->img?>" style="width:250px">
               </td>
               <?php endif?>

               <?php if ($this->db->field_exists('time', $k)): ?>
               <td>
                 <!-- <?=var_dump($d->time)?> -->
                 <?=date_format(date_create($d->time), "D, jS M Y, h:i:s");?>
               </td>
               <?php endif?>

               <?php if ($this->db->field_exists('action', $k)): ?>
               <td>
                 <?=$d->action?>
               </td>
               <?php endif?>

               <?php if ($this->db->field_exists('description', $k)): ?>
               <td>
                 <?=$d->description?>
               </td>
               <?php endif?>

               <?php if ($k == 'Contact' && $k == 'Feedback'): ?>
               <td class="flex" width="10%"><a href="mailto:<?=$d->email?>"
                   class="btn btn-success btn-round m-2">Reply</a></a></td>
               <?php endif;?>
               <?php if ($k != 'Contact' && $k != 'Feedback'): ?>
               <?php if ($this->db->field_exists("id", $k) && !in_array($k, $read_only)): ?>
               <td class="flex" width="20%"><button class="btn btn-info btn-round m-2"
                   onclick="ConfirmUpdate(<?=$d->id?>)">Edit</a></button></td>

               <?php endif;?>
               <?php endif;?>
             </tr>
             <?php endif?>
             <?php endif?>
             <?php endforeach?>
           </tbody>
         </table>
       </div>
     </div>
   </div>
 </div>
 <div>
 </div>

 <!--  View Page - End -->
 <?php else: ?>


 <!--  Change Page - Start -->
 <div class="col-md-12">
   <div class="card ">
     <div class="card-header ">
       <div class="card-title ">


         <?php echo form_open('UserC/FinalChange/' . $k, array('id' => 'form_change')); ?>
         <div class="text-center">
           <h2> <span class="text-capitalize"><?=$k?> </span> Table
           </h2>
         </div>
       </div>
       <div class="bg-light d-block ">
         <button type="submit" class="btn btn-md btn-primary float-right " name="submit">Confirm
           Changes</button>
         <a role="button" class="btn btn-md btn-success float-right" href="<?=base_url('UserC/loadAdd/') . $k?>">
           Add context
         </a>
         <a role="button" class="btn btn-md btn-secondary float-left" href="<?=base_url('UserC/rollBack/') . $k?>">
           Back
         </a>
       </div>

     </div>

     <?php if ($this->db->field_exists("status", $k)): ?>


     <div class="form-check" style="margin: auto 40px;
        padding-top: 20px;">
       <label class="form-check-label">
         <input class="form-check-input" type="checkbox" name="status" value="" <?=($status) ? 'checked' : ''?>>
         To activate pop-window please this checkbox.
         <span class="form-check-sign">
           <span class="check"></span>
         </span>
       </label>
     </div>

     <?php endif;?>


     <div class="container col-7" id="error" style="display: none;">
       <div class="alert alert-warning alert-with-icon">
         <button type="button" aria-hidden="true" class="close">
           <i class="nc-icon nc-simple-remove"></i>
         </button>
         <span data-notify="icon" class="nc-icon nc-bell-55"></span>
         <span id="message">This is a notification with close button and icon.</span>
       </div>
     </div>
     <div class="card-body mt-1 w-100">
       <div class="table-responsive">
         <table class="table " id="change">
           <thead class=" text-primary">
             <tr>
               <?php if ($this->db->field_exists("active", $k)): ?> <th>
               <th>
                 Status
               </th>
               <?php endif?>
               <th>
                 Id
               </th>
               <?php if ($this->db->field_exists("name", $k)): ?> <th>
                 Name
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists('username', $k)): ?>
               <th>
                 Username
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("email", $k)): ?>
               <th>
                 E-Mail
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("msg", $k)): ?>
               <th>
                 Message
               </th>
               <?php endif?>
               <?php if ($this->db->field_exists("img", $k)): ?>
               <th style="width:fit-content;">
                 Img
               </th>
               <?php endif?>

             </tr>
           </thead>
           <tbody>
             <?php $count = 0;foreach ($data as $d): $count++;?>

             <tr>
               <?php if ($this->db->field_exists("active", $k)): ?>
               <th>
               <td scope="row" class="text-center">
                 <?php if ($d->active): ?>
                 <input type="checkbox" name="check_list[]" value="<?=$d->id?>" style="text-align:center;" checked>
                 <?php else: ?>
                 <input type="checkbox" name="check_list[]" value="<?=$d->id?>" style="text-align:center;">
                 <?php endif?>
               </td>
               <?php endif?>

               <input type="hidden" name="id" value="<?=$d->id?>">
               <td scope="row"> <?=$count?> </td>


               <?php if ($this->db->field_exists("name", $k)): ?>
               <td width="15%"> <?=$d->name?> </td>
               <?php endif?>

               <?php if ($this->db->field_exists('username', $k)): ?>
               <td width="10%"> <?=$d->username?> </td>
               <?php endif?>
               <?php if ($this->db->field_exists("email", $k)): ?>
               <td width="20%"> <?=$d->email?> </td>
               <td width="20%"> <?=($d->verified) ? ("<span class='badge badge-pill badge-success'>Verified</span>
                          ") : (' ')?> </td>

               <?php endif?>
               <?php if ($this->db->field_exists("msg", $k)): ?>
               <td width="30%"> <?=$d->msg?> </td>
               <?php endif?>
               <?php if ($this->db->field_exists("img", $k)): ?>
               <td> <img src="<?=base_url('/assets/images/') . $d->img?>" style="width:150px; height:70px">
               </td>
               <?php endif?>
               <?php if ($this->db->field_exists("id", $k)): ?>
               <td class="flex">
                 <button type="button" class="del btn btn-danger btn-md ">Delete
               </td>
               <?php endif?>
             </tr>
             <?php endforeach?>
           </tbody>
         </table>
         </from>
       </div>
     </div>
   </div>
 </div>

 <div>
 </div>
 <?php endif;?>
 <!-- Change page --End -->