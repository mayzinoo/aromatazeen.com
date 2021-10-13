<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Shipping Fee</h5>
        </div>
        <div class="card-body">
            <div class="btn-popup pull-right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Update Shipping Fee</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Update Shipping Fee</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <?=form_open_multipart('Admin/update_shippingdelivery/')?> 
                            <form class="needs-validation">
                                <div class="modal-body">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Shipping Fee :</label>
                                                <textarea class="form-control" id="" name="ship-text" ></textarea>
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
                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">Shipping Fee</th>
                    
                   
                </tr>
                <?php 
                $i=1;
                foreach($shippingfee->result() as $row): ?>
                <tr class="jsgrid-row">
                    <td class="jsgrid-cell"><?php echo $i; ?></td>
                    <td class="jsgrid-cell"><?php echo $row->fee; ?></td>
                    
                    
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