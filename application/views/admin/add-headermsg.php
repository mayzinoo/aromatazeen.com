<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Home Page Top Header Message</h5>
        </div>
        <div class="card-body">
            <div class="row product-adding">
           
            <div class="col-xl-7">
                <?=form_open_multipart('Admin/insert_headermsg/')?>
                <form class="needs-validation add-product-form" novalidate="">
                    <div class="form">
                       
                        <div class="form-group mb-3 row">
                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Header Message :</label>
                            <div class="col-xl-8 col-sm-7">
                                 <textarea class="form-control" name="message"></textarea>
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
           
            <div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;margin-top:30px;">
		        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
		        <table class="jsgrid-table">
		            <tbody>
		                <tr class="jsgrid-header-row">
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:10px;">#</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Remark</th>
		                    
		                   
		                </tr>
		                <?php 
		                $i=1;
		                foreach($homemsg->result() as $row): ?>
		                <tr class="jsgrid-row">
		                    <td class="jsgrid-cell"><?php echo $i; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->message; ?></td>
		                    
		                    
		                </tr>
		                    <?php 
		                    $i++;
		                    endforeach;
		                ?>
		            </tbody>
		        </table>
		        </div>
		        </div>
        </div><!--end of first row-->
        
    </div>
</div>