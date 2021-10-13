<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Add New Home Page Banner Slideshow</h5>
        </div>
        <div class="card-body">
            <div class="row product-adding">
            <div class="col-xl-5">
                <div class="add-product">
                    <h5 style="color:red"><b>Slider 1 </b></h5>
                </div>
            </div>
            <div class="col-xl-7">
                <?=form_open_multipart('Admin/insert_slideshow/')?>
                <form class="needs-validation add-product-form" novalidate="">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input type="text" name="title" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Body Text :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <textarea class="form-control" name="bodytext"></textarea>
                            </div>                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Remark :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <input type="text" name="remark" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Cover Photo(1920*830) :</label>
                            <div class="col-xl-8 col-sm-7">
                                
                                    <input class="form-control" name="coverphoto" type="file">
                               
                                 
                            </div>
                        </div>
                        <div class="offset-xl-3 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                    </div>
                </form>
                <?=form_close()?>
            </div>
            </div>
        </div><!--end of first row-->
        
    </div>
</div>