<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Transaction List</h5>
        </div>
        <div class="card-body">
        	<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
	        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
	        <table class="jsgrid-table">
	            <tbody>
	                <tr class="jsgrid-header-row">
	                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 30px;">#</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Order ID</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Transaction ID</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Date</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Payment Method</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Delivery Status</th>
	                    <th class="jsgrid-header-cell jsgrid-header-sortable">Amount</th>
	                    
	                    
	                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
	                        Action
	                    </th>
	                </tr>
	                <?php 
	                $i=1;
	                foreach($transactionlist->result() as $row): ?>
	                <tr class="jsgrid-row">
	                    <td class="jsgrid-cell"><?php echo $i; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->order_id; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->transaction_id; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->date; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->payment_method; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->delivery_status; ?></td>
	                    <td class="jsgrid-cell"><?php echo $row->amount; ?></td>
	                    
	                    
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
