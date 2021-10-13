<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Add About Chairman</h5>
        </div>
        <div class="card-body">
            <div class="row product-adding">
            <div class="col-xl-5">
                
            </div>
            <div class="col-xl-7">
                <?=form_open_multipart('Admin/insert_aboutchairman/')?>
                <form class="needs-validation add-product-form" novalidate="">
                    <div class="form">
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Name :</label>
                            <div class="col-xl-8 col-sm-7">
                                <input type="text" name="name" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Position :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <input type="text" name="position" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">About :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <textarea class="form-control" name="about"></textarea>
                            </div>                            
                        </div>
                      
                        <div class="offset-xl-3 offset-sm-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        
                    </div>
                </form>
                <?=form_close()?>
                <div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;margin-top:30px">
                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                <table class="jsgrid-table">
                    <tbody>
                        <tr class="jsgrid-header-row">
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 10px;">#</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Name</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Position</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">About</th>
                            
                            <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                                Action
                            </th>
                        </tr>
                        <?php 
                        $i=1;
                        foreach($chairman->result() as $row): ?>
                        <tr class="jsgrid-row">
                            <td class="jsgrid-cell" style="vertical-align: top;"><?php echo $i; ?></td>
                            <td class="jsgrid-cell" style="vertical-align: top;"><?php echo $row->name; ?></td>
                            <td class="jsgrid-cell" style="vertical-align: top;"><?php echo $row->position; ?></td>
                            <td class="jsgrid-cell" style="text-align: justify;"><?php echo $row->about; ?></td>
                            
                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
                            <a href="Admin/update_aboutchairman/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                            <a href="Admin/delete_aboutchairman/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
                            </td>
                        </tr>
                            <?php 
                            $i++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
                </div>
                </div><!--second row-->
            </div>
            </div>
        </div><!--end of first row-->
        
    </div>
</div>