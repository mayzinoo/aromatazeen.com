<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Home Page Banner Slideshow</h5>
        </div>
        <div class="card-body">
            <div class="row product-adding">
            <div class="col-xl-5">
                <div class="add-product">
                    
                </div>
            </div>
            <div class="col-xl-7">
                <?=form_open_multipart('Admin/update_slideshow/')?>
                <form class="needs-validation add-product-form" novalidate="">
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input type="text" name="title" class="form-control" value="<?php echo $slideshowdata->title; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Body Text :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <textarea class="form-control" name="bodytext"><?php echo $slideshowdata->body_text; ?>
                                </textarea>
                            </div>                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Remark :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <input type="text" name="remark" class="form-control" value="<?php echo $slideshowdata->remark; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Cover Photo(1920*830) :</label>
                            <div class="col-xl-8 col-sm-7">
                                
                                <?php if(!empty($slideshowdata->slide_photo)){ ?>
                                    <img src="/img/homeslideshow/<?php echo $slideshowdata->slide_photo; ?>" class="slidephoto">
                                    <input type="hidden" value="<?php echo $slideshowdata->slide_photo; ?>" name="coverphoto">
                                    <input class="form-control" name="coverphoto" type="file" >
                                <?php }else{ ?>
                                    <input class="form-control" name="coverphoto" type="file">
                                <?php } ?>
                                 
                            </div>
                        </div>
                        <div class="offset-xl-3 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        
                    </div>
                </form>
                <?=form_close()?>
            </div>
            </div>
        </div><!--end of first row-->
        
    </div>
</div>