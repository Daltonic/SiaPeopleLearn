
    <div class="row mt-2">
        <div class="col-12 col-sm-8 offset-sm-2 ">
            <div class="card p-5">
                <h4 class="card-title">Settings</h4>
                    
                    <form class="form-horizontal form-material" action="<?=BURL ?>settings/action" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Name" class="form-control form-control-line" name="site_name" value="<?= $g->site_name?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Site Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="site_description"><?= $g->site_description?></textarea> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Author</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Author" class="form-control form-control-line" name="site_author" value="<?= $g->site_author?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Site Keywords</label>
                            <div class="col-md-12">
                                <textarea class="form-control form-control-line" name="site_keywords"><?= $g->site_keywords?></textarea> 
                            </div>
                        </div>
                        
                        <?php $dir= scandir("themes");?>
                        
                       
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Choose Admin Theme</label>
                            <div class="col-md-12">
                                <select  class="form-control form-control-line" name="admin_theme" >
                                    <option><?= $g->admin_theme?></option>
                                    <?php 
                                        foreach ($dir as $value) {
                                            if($value!="." && $value!=".."){
                                            	if(substr($value,(strlen($value) - 6))=="_admin"){
                                                	echo "<option>".$value."</option>";
                                            	}
                                            }
                                        } 
                                    ?>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Choose Landing Theme</label>
                            <div class="col-md-12">
                                <select  class="form-control form-control-line" name="landing_theme" >
                                    <option><?= $g->landing_theme?></option>
                                    <?php 
                                        foreach ($dir as $value) {
                                            if($value!="." && $value!=".."){
                                                if(substr($value,(strlen($value) - 8))=="_landing"){
                                                	echo "<option>".$value."</option>";
                                            	}
                                            }
                                        } 
                                    ?>
                                    
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site url</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site url" class="form-control form-control-line" name="site_url" value="<?= $g->site_url?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site physical Address</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Address" class="form-control form-control-line" name="site_address" value="<?= $g->site_address?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Phone Number</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Phone Number" class="form-control form-control-line" name="site_phone_number" value="<?= $g->site_phone_number?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Email</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Email" class="form-control form-control-line" name="site_email" value="<?= $g->site_email?>">
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="example-email" class="col-md-12">Promo Fee (per day)</label>
                            <div class="col-md-12">
                                <input type="number" placeholder="Promo Fee" class="form-control form-control-line" name="promo_fee" value="<?= $g->promo_fee?>">
                            </div>
                        </div>
                        <div class="form-group">
                        

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Currency</label>
                            <div class="col-md-12">
                                <select  class="form-control form-control-line" name="currency" >
                                    <option><?= $g->site_currency?></option>
                                    <option value="NGN">Naira</option>
                                    <option value="USD">US Dollar</option>
                                    <option value="GHC">Ghana Cedis</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Show only approved property?</label>
                            <div class="col-md-12">
                                <select  class="form-control form-control-line" name="approve_property" >
                                    <option><?= $g->approve_property?></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Facebook</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Facebook" class="form-control form-control-line" name="site_facebook" value="<?= $g->site_facebook?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Twitter</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Twitter" class="form-control form-control-line" name="site_twitter" value="<?= $g->site_twitter?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Instagram</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Instagram" class="form-control form-control-line" name="site_instagram" value="<?= $g->site_instagram?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Youtude</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Youtube" class="form-control form-control-line" name="site_youtube" value="<?= $g->site_youtube?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Linkedin</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site linkedin" class="form-control form-control-line" name="site_linkedin" value="<?= $g->site_linkedin?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Site Whatsapp</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Site Whatsapp" class="form-control form-control-line" name="site_whatsapp" value="<?= $g->site_whatsapp?>">
                            </div>
                        </div>


                      


                        <div class="form-group ">
                        	<label for="example-email" class="col-md-12">Site Favicon</label>
                            <center>
                               <?php if( file_exists("./assets/".$this->setting->site_favicon)==1):?>
                                       <img src="<?=BURL?>assets/<?=$this->setting->site_favicon?>" height="100">
                               <?php endif; ?>
                            </center>
                             <div class="col-md-12">
	                            <div class="form-group">
								  <input type="file" class="form-control" id="favicon" name="favicon">
								</div>
							</div>
                        </div><br>

                        <div class="form-group ">
                        	<label for="example-email" class="col-md-12">Site Screenshot</label>
                            <center>
                               <?php if( $this->setting->site_screenshot!="" && file_exists("./assets/".$this->setting->site_screenshot)):?>
                                       <img src="<?=BURL?>assets/<?=$this->setting->site_screenshot?>" height="100">
                               <?php endif; ?>
                            </center>
                            <div class="col-md-12">
	                            <div class="form-group">
								  <input type="file" class="form-control" id="screenshot" name="screenshot">
								</div>
							</div>
                        </div><br>

                        <div class="form-group ">
                        	<label for="example-email" class="col-md-12">Site Logo</label>
                            <center>
                               <?php if(file_exists("./assets/".$this->setting->site_logo)==1):?>
                                       <img src="<?=BURL?>assets/<?=$this->setting->site_logo?>" height="100">
                               <?php endif; ?>
                            </center>
                            
                            
                            <div class="col-md-12">
	                            <div class="form-group">
								  <input type="file" class="form-control" id="logo" name="logo">
								</div>
							</div>
                        </div><br>
                       
                        
                        <div class="form-group ">
                        	<label for="example-email" class="col-md-12">About Image</label>
                            <center>
                               <?php if(file_exists("./assets/".$this->setting->about_image)==1):?>
                                       <img src="<?=BURL?>assets/<?=$this->setting->about_image?>" height="100">
                               <?php endif; ?>
                            </center>

                            <div class="col-md-12">
	                            <div class="form-group">
								  <input type="file" class="form-control" id="about_image" name="about_image">
								</div>
							</div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-primary btn-block" type="submit" name="<?= $this->token; ?>">Update</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>          
    </div>
       