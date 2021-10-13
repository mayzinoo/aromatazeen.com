<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Add Product</h5>
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
                <?=form_open_multipart('Admin/insert_products/')?>
                <form class="needs-validation add-product-form" novalidate="" enctype="multipart/form-data">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input class="form-control" name="productname" type="text" >
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Styled with Item :</label>
                            <div class="col-xl-8 col-sm-7">
                                <?=form_dropdown("productid",$productlist,"","class='form-control digits'")?>
                            </div>                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                <?=form_dropdown("categoryname",$categorylist,"","class='form-control digits' onclick=getproductsize(this.value)")?>
                            </div>                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub Category Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                <select name="subcategory" class="form-control" id="searchresult">
                                  <option value="hidden">...Select...</option>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group row clothingsize">
                            <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                            <div class="col-xl-8 col-sm-7">
                                <!--<select name="size" class="form-control" id="searchresult">-->
                                <!--  <option value="hidden">...Select...</option>-->
                                <!--</select>-->
                            
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check1" value="S" name="size[]"> S
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check2" value="M" name="size[]"> M
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check3" value="L" name="size[]"> L
                                </label>
                               
                            </div>
                        </div><!--end sizeselect-->
                        <div class="form-group row shoesize">
                            <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                            <div class="col-xl-8 col-sm-7">
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check1" value="35" name="size[]"> 35
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check2" value="36" name="size[]"> 36
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check3" value="37" name="size[]"> 37
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check4" value="38" name="size[]"> 38
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check3" value="39" name="size[]"> 39
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="Check4" value="40" name="size[]"> 40
                                </label>
                            </div>
                        </div><!--end sizeselect-->
                        </div>
                        <div class="form-group row customtype">
                            <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input type="text" name="size[]" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Brand Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                <?=form_dropdown("brandname",$brandlist,"","class='form-control digits'")?>
                            </div>
                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price (£) :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input class="form-control" name="price" type="text" >
                            </div>
                            
                        </div>
                        
                        <div class="form-group mb-3 row">
                            <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Color :</label>
                            <div class="col-xl-8 col-sm-7">
                                <?php 
                                $i=1;
                                foreach($productcolor->result() as $row): ?>
                                <label class="checkbox-inline">
                                  <input type="checkbox" value="<?php echo $row->product_color; ?>" name="color[]"><?php echo $row->product_color; ?>
                                </label>
                                <?php 
                                $i++;
                                endforeach;
                                ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form">
                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                            <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                                <div class="input-group">
                                    <input class="touchspin" name="qty" type="text" value="1">
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-sm-4">Description :</label>
                            <div class="col-xl-8 col-sm-7 description-sm">
                                <textarea id="editor1" name="description" cols="10" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-xl-3 col-sm-4 mb-0">Cover Photo (600 * 800):</label>
                            <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">                                
                                    <input class="form-control" name="coverphoto" type="file">
                            </fieldset>
                    </div>
                    
                    <div class="form-group mb-3 row">
                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Remark :</label>
                        <div class="col-xl-8 col-sm-7">
                            <?=form_dropdown("remark",$remarklist,"","class='form-control digits' onclick=gethomeslider(this.value)")?>
                        </div>
                    </div>
                    <div class="form-group mb-3 row homeslider">
                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Home Slider (1920 * 830) :</label>
                        <div class="col-xl-8 col-sm-7">
                            <input class="form-control" name="homeslider" type="file">
                        </div>
                    </div>
                    <!--<div class="form-group mb-3 row">-->
                    <!--    <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Home Page :</label>-->
                    <!--    <div class="col-xl-8 col-sm-7">-->
                    <!--        <input type="radio" name="addhome" value="yes"> Yes-->
                    <!--        <input type="radio" name="addhome" value="no"> No-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="offset-xl-3 offset-sm-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                        
                    </div>
                </form>
                <?=form_close()?>
            </div>
        </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    
    // function getproductsize(category)
    // {
    //     alert("sdff");
    //     data="category="+category;
    //     if(category=='Bags' || category=='Accessories'){
    //          $('.clothingsize').hide();
    //          $('.shoesize').hide();
    //          $('.customtype').show();
    //     }else if(category=='Clothing'){
            
    //         $('.customtype').hide();
    //         $('.clothingsize').show();
    //     }else{
    //         $('.customtype').hide();
    //         $('.shoesize').show();
    //     }
    //         //  $.ajax({
    //         //     type: "POST",
    //         //     url : '<?=base_url()?>'+"Admin/get_productsize/",
    //         //     data : data,

    //         //     success : function(e)
    //         //     {
    //         //      $("#searchresult").html(e);
    //         //     }
    //         // });
    //     }
       
    // }
</script>
