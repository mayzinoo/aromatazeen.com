<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>List Coupons</h5>
        </div>
        <div class="card-body">
        	<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
	        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
	        <table class="jsgrid-table">
	            <tbody>
	                <tr class="jsgrid-header-row">
	                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 30px;">#</th>
	                    
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Title</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Code</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Discount</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Status</th>	                    
	                    
	                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
	                        Action
	                    </th>
	                </tr>
	                <?php 
	                $i=1;
	                foreach($couponslist->result() as $row): ?>
	                <tr class="jsgrid-row">
	                    <td class="jsgrid-cell"><?php echo $i; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->title; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->code; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->discount; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->status; ?></td>
	                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
	                    <input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete">
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
