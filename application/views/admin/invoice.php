<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Invoice List</h5>
        </div>
        <div class="card-body">
        	<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
	        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
	        <table class="jsgrid-table">
	            <tbody>
	                <tr class="jsgrid-header-row">
	                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 30px;">#</th>
	                    
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Invoice No</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Client's Email</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Name</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Order Date</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Shipping</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Amount</th>	
	                    
	                    <!--<th class="jsgrid-header-cell jsgrid-header-sortable">Total Amount</th>                    -->
	                    
	                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
	                        Action
	                    </th>
	                </tr>
	                <?php 
	                $i=1;
	                foreach($invoicelist->result() as $row): ?>
	                <tr class="jsgrid-row">
	                    <td class="jsgrid-cell"><?php echo $i; ?></td>
	                    <td class="jsgrid-cell"><b><a href="Admin/invoice_form/<?php echo $row->id; ?>">#<?php echo $row->id; ?></a></b></td>
	                    <td class="jsgrid-cell"><?php echo $row->payer_email; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->full_name; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->order_date; ?></td>
	                    <td class="jsgrid-cell"><?php echo $shippingfee->fee; ?></td>
	                    <td class="jsgrid-cell">£ <?php echo $row->amount; ?></td>
	                    
	                    

	                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
	                    <a href="Admin/invoice_editform/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
	                    <a href="Admin/invoice_delete/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
	                    <a href="Admin/invoice_download/<?php echo $row->id; ?>" target="_blank"><i class="fa 2x fa-arrow-down"></i></a>
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
