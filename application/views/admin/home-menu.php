<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Home Menu List</h5>
        </div>
        <div class="card-body">
            <div class="btn-popup pull-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Category</button>
                <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#sortingmenu">Sorting</button>-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Physical Product</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <?=form_open('Admin/add_category/')?> 
                            <form class="needs-validation">
                                <div class="modal-body">
                                
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                <input class="form-control" id="validationCustom01" name="categoryname" type="text">
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
                </div><!--end-->
                <div class="modal fade" id="sortingmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Sorting Menu</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <?=form_open('Admin/edit_sortingmenu/')?> 
                            <form class="needs-validation">
                                <div class=" modal-body">
                                <?php 
                                
                                foreach($allmenu->result() as $row): ?>
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Sort by ID :</label>
                                                        <input class="form-control" name="id" type="text" value="<?php echo $row->id; ?>">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Menu Name :</label>
                                                        <input class="form-control" name="menu" type="text" value="<?php echo $row->category_name; ?>" readonly>
                                                    </div>
                                                </div>
                                        </div>
                                </div>           
                                <?php
                                    endforeach;
                                ?>   
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit" value="submit">Save</button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                            <?=form_close()?>
                        </div>
                    </div>
                </div><!--end-->
            </div>
        <div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
        <table class="jsgrid-table">
            <tbody>
                <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 5px;text-align:center !important">Sort by ID </th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Category Name</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 10px;text-align:left !important">Status</th>
                    
                    
                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                        Action
                    </th>
                </tr>
                <?php 
                $i=1;
                foreach($category->result() as $row): ?>
                <tr class="jsgrid-row">
                    <td class="jsgrid-cell" style="text-align:center"><?php echo $row->sort_id; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->category_name; ?></td>
                    <?php if($row->status=='1'){ ?>
                            <td class="jsgrid-cell">Active</td>
                    <?php }else{ ?>
                            <td class="jsgrid-cell">Non-Active</td>
                    <?php } ?>
                    
                    
                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                    <a href="Admin/update_category_form/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                    <a href="Admin/delete_category/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
                    </td>
                </tr>
                    <?php 
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
        </div>
        </div><!--firs row-->
        
       
        
       
       
        
        <div class="btn-popup pull-right" style="margin-top:20px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#subcategory">Sub Category</button>
                
            <div class="modal fade" id="subcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Sub Category</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <?=form_open('Admin/add_subcategory/')?> 
                            <form class="needs-validation">
                                <div class="modal-body">
                                
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                <?=form_dropdown("categoryname",$categorylist,"","class='form-control digits'")?>
                                            </div>
                                            
                                        </div>
                                        <div class="form">
                                            <div class="form-margin-top:30px;group">
                                                <label for="validationCustom01" class="mb-1">Sub Category :</label>
                                                <input class="form-control" id="validationCustom01" name="subcategory" type="text">
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
                </div>
        </div>
        
       
        <div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
             
        <table class="jsgrid-table">
            <tbody>
                <tr class="jsgrid-header-row">
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 10px;">#</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Category Name</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;text-align:left !important">Sub Category</th>
                    
                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                        Action
                    </th>
                </tr>
                <?php 
                $i=1;
                foreach($subcategory->result() as $row): ?>
                <tr class="jsgrid-row">
                    <td class="jsgrid-cell" style="text-align:center"><?php echo $i; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->category_name; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->sub_category; ?></td>
                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                    <a href="Admin/update_subcategory_form/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                    <a href="Admin/delete_subcategory/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
                    </td>
                </tr>
                    <?php 
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
        </div>
        </div><!--end third row-->
        
        
    </div>
    </div>
</div>