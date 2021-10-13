<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Update Product</h5>
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
                <?=form_open_multipart('Admin/update_products/')?>
                <form class="needs-validation add-product-form" novalidate="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Title :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input class="form-control" name="productname" type="text" value="<?php echo $productdata->product_name; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="" class="col-xl-3 col-sm-4 mb-0">Styled with Item :</label>
                            <div class="col-xl-8 col-sm-7">
                               
                                <input list="pidbrowsers" name="productid" class="form-control" value="<?=$productdata->styledwith_pid?>">
                                    <datalist id="pidbrowsers">
                                        <?php 
                                            foreach($productlist as $row)
                                        { 
                                          echo '
                                          <option value="'.$row->id.'">'.$row->product_name.'</option>
                                          ';
                                        }
                                        ?>
                                    </datalist> 
                            </div>                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Category Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <input list="catbrowsers" name="categoryname" class="form-control" onclick="getproductsize(this.value)" value="<?=$productdata->category_name?>">
                                    <datalist id="catbrowsers">
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
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Sub Category Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                <select name="subcategory" class="form-control" id="searchresult">
                                  <option><?=$productdata->subcatname?></option>
                                </select>
                            </div>                            
                        </div>
                        <div class="form-group row clothingsize">
                            <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                            <div class="col-xl-8 col-sm-7">
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
                        <div class="form-group row customtype">
                            <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Select Size :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input type="text" name="size[]" class="form-control">
                            </div>
                        </div><!--custom size-->
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
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Brand Name :</label>
                            <div class="col-xl-8 col-sm-7">
                               
                                <input list="bbrowsers" name="brandname" class="form-control" value="<?=$productdata->brand_name?>">
                                    <datalist id="bbrowsers">
                                        <?php 
                                            foreach($brandlist as $row)
                                        { 
                                          echo '
                                          <option value="'.$row->brand_name.'">'.$row->brand_name.'</option>
                                          ';
                                        }
                                        ?>
                                    </datalist> 
                            </div>
                            
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price (£) :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input class="form-control" name="price" type="text" value="<?=$productdata->price?>">
                            </div>
                            
                        </div>
                        
                        <div class="form-group mb-3 row">
                            <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Color :</label>
                            <div class="col-xl-8 col-sm-7">
                                
                              
                               
                                <?php 
                               foreach($productcolor->result() as $row){ 
                                                $color = explode(']', $productdata->color);
                                                $pcolor = [];
                                                foreach($color as $pcolor) {  ?>
                                                
                                            <?php    } $p=isset($pcolor); ?>
                                             <?php echo $p; if($row->product_color==$pcolor){ ?>
                                                <input type="checkbox" name="addhome" value="<?=$row->product_color?>" checked> <?=$row->product_color?>
                                               <?php }else{ ?>
                                                <input type="checkbox" name="addhome" value="<?=$row->product_color?>" > <?=$row->product_color?>
                                               <?php } ?>
                                                  
                                <?php 
                                }
                                 ?>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form">
                        
                        <div class="form-group row">
                            <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                            <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">
                                <div class="input-group">
                                    <input class="touchspin" name="qty" type="text" value="<?=$productdata->available_qty?>">
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-sm-4">Description :</label>
                            <div class="col-xl-8 col-sm-7 description-sm">
                                <textarea id="editor1" name="description" cols="10" rows="4"><?=$productdata->description?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-xl-3 col-sm-4 mb-0">Cover Photo :</label>
                            <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7">  
                            <?php if(!empty($productdata->cover_photo)){ ?>
                                <img src="./img/product/coverimg/<?php echo $productdata->cover_photo; ?>" class="slidephoto">
                                <input type="hidden" name="coverphoto" value="<?php echo $productdata->cover_photo; ?>">
                                <input class="form-control" name="coverphoto" type="file">
                            <?php }else{ ?>
                                <input class="form-control" name="coverphoto" type="file">
                            <?php } ?>
                                    
                            </fieldset>
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Remark :</label>
                        <div class="col-xl-8 col-sm-7">
                            
                            <input list="rebrowsers" name="remark" class="form-control" value="<?=$productdata->remark?>">
                                <datalist id="rebrowsers">
                                    <?php 
                                        foreach($remarklist as $row)
                                    { 
                                      echo '
                                      <option value="'.$row->id.'">'.$row->remark_name.'</option>
                                      ';
                                    }
                                    ?>
                                </datalist>
                        </div>
                    </div>
                    <!--<div class="form-group mb-3 row">-->
                    <!--    <label for="validationCustomUsername" class="col-xl-3 col-sm-4 mb-0">Home Page :</label>-->
                    <!--    <div class="col-xl-8 col-sm-7">-->
                    <!--        <input type="radio" name="addhome"  <?php if ($productdata->add_home == "yes") echo "checked"; ?> value="yes" > Yes-->
                    <!--        <input type="radio" name="addhome"  <?php if ($productdata->add_home == "no") echo "checked"; ?> value="no" > No-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="offset-xl-3 offset-sm-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                    </div>
                </form>
                <?=form_close()?>
            </div>
        </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    
    function getproductsize(category)
    {
        data="category="+category;
        if(category=='Bags' || category=='Accessories'){
             $('.selectsize').hide();
             $('.customtype').show();
        }else{
            $('.selectsize').show();
            $('.customtype').hide();
             $.ajax({
                type: "POST",
                url : '<?=base_url()?>'+"Admin/get_productsize/",
                data : data,

                success : function(e)
                {
                 $("#searchresult").html(e);
                }
            });
        }
       
    }
</script>
