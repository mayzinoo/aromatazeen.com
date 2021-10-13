<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Sub Category</h5>
        </div>
        <div class="card-body">
            <div class="row product-adding">
            <div class="col-xl-5">
                <div class="add-product">
                    
                </div>
            </div>
            <div class="col-xl-7">
                <?=form_open_multipart('Admin/update_subcategory/')?>
                <form class="needs-validation add-product-form" novalidate="">
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                
                                <input list="browsers" name="categoryname" class="form-control" value="<?=$subcategory->category_name?>">
                                <datalist id="browsers">
                                    <?php 
                                        foreach($categorylist as $row)
                                    { 
                                      echo '
                                      <option value="'.$row->category_name.'">'.$row->category_name.'</option>
                                      ';
                                    }
                                    ?>
                                </datalist> 
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub Category :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <input type="text" name="subcategory" class="form-control" value="<?php echo $subcategory->sub_category; ?>">
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