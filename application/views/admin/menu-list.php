<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Menu Lists</h5>
        </div>
        <div class="card-body">
            <div class="btn-popup pull-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Menu</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Menu </h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <?=form_open('Admin/insert_remark/')?> 
                            <form class="needs-validation">
                                <div class="modal-body">
                                
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Menu Name :</label>
                                                <input class="form-control" id="validationCustom01" name="remark" type="text">
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
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Name</th>
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 100px;">Created Date</th>
                    
                    
                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                        Action
                    </th>
                </tr>
                <?php 
                $i=1;
                foreach($menulist->result() as $row): ?>
                <tr class="jsgrid-row">
                    <td class="jsgrid-cell"><?php echo $i; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->remark_name; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->remark_name; ?></td>
                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                    <a href="Admin/updateremark_form/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                    <a href="Admin/delete_remark/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
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
        
    </div>
    </div>
</div>