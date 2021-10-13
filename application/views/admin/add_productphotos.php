<div class="row">
    <div class="col-md-6">
        <?=form_open_multipart('Admin/insert_productphotos/')?>
            <form method='post' enctype='multipart/form-data'>
                                <div class="form-group row">
                                        <h5><b>Products Gallery</b></h5>
                                </div>
                            <div class="form-group row">
                                    <label class="col-xl-3 col-sm-4 mb-0">Product Name :</label>
                                    <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                        <div class="input-group">
                                            <?=form_dropdown("productid",$productlist,'',"class='form-control digits'")?>
                                        </div>
                                    </fieldset>
                                </div>
                            <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4 mb-0">More Product Photos :</label>
                                        <fieldset class="col-xl-9 col-xl-8 col-sm-7">                                
                                                <input class="form-control" name="morephotos" type="file">
                                        </fieldset>
                                </div>
                            <div class="form-group row">
                                <div class="offset-xl-3 offset-sm-4">
                                         <button type="submit" class="btn btn-primary">Add</button>
                                    
                                </div>
                            </div>
             </form>
              <?=form_close()?>
    </div>
   <!--<div class="col-md-6">-->
   <!--         <?=form_open_multipart('Admin/insert_stylewithphotos/')?>-->
   <!--             <form method='post' enctype='multipart/form-data'>-->
   <!--                                 <div class="form-group row">-->
   <!--                                         <h5><b>Stylewith Photos </b></h5>-->
   <!--                                 </div>-->
   <!--                             <div class="form-group row">-->
   <!--                                     <label class="col-xl-3 col-sm-4 mb-0">Product Name :</label>-->
   <!--                                     <fieldset class="col-xl-9 col-xl-8 col-sm-7">-->
   <!--                                         <div class="input-group">-->
   <!--                                             <?=form_dropdown("pid",$productlist,'',"class='form-control digits'")?>-->
   <!--                                         </div>-->
   <!--                                     </fieldset>-->
   <!--                                 </div>-->
   <!--                             <div class="form-group row">-->
   <!--                                         <label class="col-xl-3 col-sm-4 mb-0">More Product Photos :</label>-->
   <!--                                         <fieldset class="col-xl-9 col-xl-8 col-sm-7">                                -->
   <!--                                                 <input class="form-control" name="stylephoto" type="file">-->
   <!--                                         </fieldset>-->
   <!--                                 </div>-->
   <!--                             <div class="form-group row">-->
   <!--                                 <div class="offset-xl-3 offset-sm-4">-->
   <!--                                          <button type="submit" class="btn btn-primary">Add</button>-->
   <!--                                 </div>-->
   <!--                             </div>-->
   <!--              </form>-->
   <!--               <?=form_close()?>-->
   <!-- </div>-->
</div>

  
  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Product Photos List</h5>
        </div>
        <div class="card-body">
        		<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
		        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
		        <table class="jsgrid-table">
		            <tbody>
		                <tr class="jsgrid-header-row">
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Product Name</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Cover Photo</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Photo Gallery</th>
		                    <!--<th class="jsgrid-header-cell jsgrid-header-sortable" >Style With Photos</th>-->
		                    
		                </tr>
		                <?php 
		                foreach($productphotolist->result() as $row): ?>
		                <tr class="jsgrid-row">
		                    <td class="jsgrid-cell"><?php echo $row->pname; ?></td>
		                    <td class="jsgrid-cell"><img id="blah" src="./img/product/coverimg/<?php echo $row->pcover; ?>" style="width:100px;height:auto;padding-bottom:10px;" /></td>
		                    <td class="jsgrid-cell"><a href="Admin/view_morephotos/<?php echo $row->product_id; ?>">( <?php echo $row->pno; ?> ) Photos</a></td>
		                   <!--<?php if($row->product_id==$stylewithphoto->styledwith_pid){ ?>-->
		                   <!--    <td class="jsgrid-cell"><a href="Admin/view_stylewithphotos/<?php echo $row->product_id; ?>">( <?php echo $stylewithphoto->stylepid; ?> ) Photos</a></td>-->
		                   <!--<?php }else{ ?>-->
		                   <!--    <td class="jsgrid-cell"><a href="Admin/view_stylewithphotos">No Photos</a></td>-->
		                   <!--<?php } ?>-->
		                    
		                    
		                    
		                </tr>
		                    <?php 
		                   
		                    endforeach;
		                ?>
		            </tbody>
		        </table>
		        </div>
		        </div>
        </div>
    </div>
</div>