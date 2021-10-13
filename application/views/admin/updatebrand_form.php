<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Brand</h5>
        </div>
        <div class="card-body">
            <div class="row product-adding">
            <div class="col-xl-5">
                <div class="add-product">
                    
                </div>
            </div>
            <div class="col-xl-7">
                        <?=form_open_multipart('Admin/update_brand/')?> 
                            <form class="needs-validation">
                                <div class="modal-body">
                                <input class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="id" type="hidden">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Brand Name :</label>
                                                <input class="form-control" value="<?php echo $branddata->brand_name;?>" name="brandname" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Brand Image :</label>
                                                <?php if(!empty($branddata->brand_photo)){ ?>
                                                    <img src="/img/product/brandphotos/<?php echo $branddata->brand_photo; ?>" class="slidephoto">
                                                    <input type="hidden" value="<?php echo $branddata->brand_photo; ?>" name="brandphoto">
                                                    <input class="form-control" name="brandphoto" type="file" >
                                                <?php }else{ ?>
                                                    <input class="form-control" name="brandphoto" type="file">
                                                <?php } ?>
                                            </div>
                                            
                                            
                                        </div>
                                   
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit" value="submit">Save</button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                            <?=form_close()?>
                            
            </div>
            </div>
        </div><!--end of first row-->
        
    </div>
</div>