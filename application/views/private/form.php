
<!-- Forms Started...!! -->


<!--    Add Form  - Start -->
<?php if (!$up) : ?>
    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add <?= $k ?></h5>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('UserC/Add/' . $k); ?>
                <?php if ($this->db->field_exists("username", strtolower($k))) : ?>
                    <div class="row">
    <div class="col-md-6 pr-1">
        <div class="form-group">
            <label>UserName:</label>
            <input type="text" class="form-control" placeholder="Enter a Name" name="username" id="username">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pr-1">
        <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" placeholder="Enter a Email" name="email" id="Email">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pr-1">
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Enter a Password" name="password" id="password">
        </div>
    </div>
</div>
<?php endif ?>               
                
                <?php if ($this->db->field_exists("name", $k)) : ?>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" placeholder="Enter a Name" name="Name" id="Name">
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des", $k)) : ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripition:</label>
                                <textarea class="form-control textarea" name="Descripition" id="Descripition">Oh ... you want to add description related to your content....</textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des1", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Paragraph 1:</label>
                                <textarea class="form-control textarea" name="Descripition1" id="Descripition">Here you can add paragraph 1 for section.</textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des2", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Paragraph 2:</label>
                                <textarea class="form-control textarea" name="Descripition2" id="Descripition">Here you can add paragraph 2 for section.</textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des3", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Paragraph 3:</label>
                                <textarea class="form-control textarea" name="Descripition3" id="Descripition">Here you can add paragraph 3 for section.</textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("map_url", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                
                            <label>Map Url : </label>
            <textarea class="form-control textarea" name="map_url" id="map_url">Here you can add location url of place...</textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>


                <?php if ($this->db->field_exists('link', $k)) : ?>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>link:</label>
                                <input type="text" class="form-control" placeholder="Enter a link" name="link" id="link">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="outsidelink" value="">
                                    If links refer to another site pls check this.
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                    <?php if ($this->db->field_exists('target', $k)) : ?>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>Target:</label>
                                    <select class="form-control" placeholder="Enter a link" name="target" id="target">
                                        <option value="1">Same Page</option>
                                        <option value="2">New Page</option>
                                    </select>                                    
                                </div>
                            </div>
                        </div>
                    <?php endif ?>   

                
                    <?php if ($this->db->field_exists("img", $k)) : ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image :</label>
                                <input type="file" class="form-control form-control-file" placeholder="Image" name="userfile" id="Image"> <button class="btn btn-info">Upload </button>
                            </div>
<!--                             <img src="userfile" style="width:250px">
 -->                        </div>
                    <?php endif ?>

                    <?php if ($this->db->field_exists("main_category", $k)) : ?>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Select the category: </label>
                                    <select class="form-control form-control-sm" name="main_category">
                                    <option>Tourist</option>
                                    <option>Food</option>
                                    <option>Cultural</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Add Content</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<!--  Add from - End -->


 <!--  Edit From - Start -->
<?php else : ?>   
    <div class="col-md-8">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Edit <?= $k ?></h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('UserC/edit/' . $k . "/" . $UserData[0]->id); ?>
               
                <?php if ($this->db->field_exists('name', $k)) : ?>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" placeholder="Enter a Name" name="Name" id="Name" value="<?= $UserData[0]->name ?>">
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists('link', $k)) : ?>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>link:</label>
                                <input type="text" class="form-control" placeholder="Enter a link" name="link" id="link" value="<?= $UserData[0]->link ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="outsidelink" value="<?= $UserData[0]->outsidelink ?>">
                                    If links refer to another site pls check this.
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists('target', $k)) : ?>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Target:</label>
                                <select class="form-control" placeholder="Enter a link" name="target" id="target">
                                    <option value="1">Same Page</option>
                                    <option value="2">New Page</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists('des', $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripition:</label>
                                <textarea class="form-control textarea" name="Descripition" id="Descripition"><?= $UserData[0]->des ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des1", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Paragraph 1:</label>
                                <textarea class="form-control textarea" name="Descripition1" id="Descripition"><?= $UserData[0]->des1 ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des2", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Paragraph 2:</label>
                                <textarea class="form-control textarea" name="Descripition2" id="Descripition"><?= $UserData[0]->des2 ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("des3", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Paragraph 3:</label>
                                <textarea class="form-control textarea" name="Descripition3" id="Descripition"><?= $UserData[0]->des3 ?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists("map_url", $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Map Url : </label>
                                <textarea class="form-control textarea" name="map_url" id="map_url"><?= $UserData[0]->map_url?></textarea>
                            </div>
                        </div>
                    </div>
                <?php endif ?>


                <?php if ($this->db->field_exists('username', $k)) : ?>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>UserName:</label>
                                <input type="text" value="<?= $UserData[0]->username ?>" class="form-control" name="username" id="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    </div>

                
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $UserData[0]->email ?>">
                            </div>
                        </div>
                    </div>
                <?php endif ?>

                <?php if ($this->db->field_exists('img', $k)) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image:</label>
                                <input type="file" class="form-control form-control-file" placeholder="Image" name="userfile" id="Image"> <button class="btn btn-info">Upload </button>
<img src="<?= base_url('/assets/images/') . $UserData[0]->img ?>" style="width:250px">
                            </div>
                            
                        </div>
                    </div>

                    <?php if ($this->db->field_exists("main_category", $k)) : ?>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Select the category:</label>
                                    <select class="form-control form-control-sm" name="main_category" id="main_category">                                  
                                    <option>Tourist</option>
                                    <option>Food</option>
                                    <option>Cultural</option>
                                     </select>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endif ?>


                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round" onclick="ConfirmUpdate(<?= $UserData[0]->id ?>)">Update Content</button>
                            </div>
                        </div>


                        </form>
            </div>
        </div>
    </div>
<?php endif ?>
<!--  Edit from - End -->
