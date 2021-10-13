<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Update Discount Item on Home Page</h5>
        </div>
        <div class="card-body">
            
            <div class="row product-adding">
            <div class="col-xl-5">
                <div class="add-product">
                    <div class="row">
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <?=form_open_multipart('Admin/update_discountitem/')?>
                <form class="needs-validation add-product-form" novalidate="">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Cover Photo(670*670) :</label>
                            <div class="col-xl-8 col-sm-7">
                                <?php if(!empty($discountitem->viewphoto)){ ?>
                                    <img src="./img/homeslideshow/<?php echo $discountitem->viewphoto; ?>" class="slidephoto">
                                    <input type="hidden" name="discountphoto" value="<?php echo $discountitem->viewphoto; ?>">
                                    <input class="form-control" name="discountphoto" type="file" >
                                <?php }else{ ?>
                                    <input class="form-control" name="discountphoto" type="file">
                                <?php }?>
                                 
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Discount Amount :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <input type="text" class="form-control" name="dis-amt" value="<?php echo $discountitem->discount_amt; ?>">
                                
                            </div>                            
                        </div>
                        
                        
                    </div>
                    <div class="offset-xl-3 offset-sm-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <?=form_close()?>
            </div>
            </div>
            
            
        </div
    </div>
</div>