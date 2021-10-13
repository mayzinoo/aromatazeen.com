<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Your Brands</h5>
        </div>
        <div class="card-body">
            <div class="btn-popup pull-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Brands</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Your Brand</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <?=form_open_multipart('Admin/add_brand/')?> 
                            <form class="needs-validation">
                                <div class="modal-body">
                                
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Brand Name :</label>
                                                <input class="form-control" id="validationCustom01" name="brandname" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Brand Image :</label>
                                                <input class="form-control" type="file" name="brandphoto" multiple="">
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
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Brand Name</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Brand Logo</th>
                    
                    
                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                        Action
                    </th>
                </tr>
                <?php 
                $i=1;
                foreach($brands->result() as $row): ?>
                <tr class="jsgrid-row">
                    <td class="jsgrid-cell"><?php echo $i; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->brand_name; ?></td>
                    <td class="jsgrid-cell"> <img src="/img/product/brandphotos/<?php echo $row->brand_photo; ?>" class="slidephoto"></td>
                    
                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center">
                    <a href="Admin/updatebrand_form/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                    <a href="Admin/"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
                    </td>
                </tr>
                    <?php 
                    $i++;
                    endforeach;
                ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
    </div>
</div>