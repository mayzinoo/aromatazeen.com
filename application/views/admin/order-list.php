<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Orders List</h5>
        </div>
        <div class="card-body">
        	<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
	        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
	            <table class="jsgrid-table">
                        <thead>
                        <tr class="jsgrid-header-row">
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Order ID</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Payer Email</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Total Amount</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Payment Method</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable"style="text-align:left !important"  scope="col">Order Date</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col" style="width:225px;">Order Note</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col" style="">Order Status</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col" style="">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
		                foreach($orderlist->result() as $row): ?>
                        
                        <tr class="jsgrid-row">
                            <td class="jsgrid-cell"><b><a href="Admin/orders_detail/<?php echo $row->id; ?>">#<?php echo $row->id; ?></a></b></td>
                            <td class="jsgrid-cell"><?php echo $row->payer_email; ?></td>
                            <td class="jsgrid-cell">£ <?php echo $row->amount; ?></td>
                            
                            <?php if($row->payment_method=='cash'){ ?>
                                        <td class="font-secondary jsgrid-cell"><?php echo $row->payment_method; ?></td>
                            <?php }else if($row->payment_method=='credit'){ ?>
                                        <td class="font-secondary jsgrid-cell" style="color:#ff8084 !important"><?php echo $row->payment_method; ?></td>
                            <?php }else{ ?>
                                        <td class="font-secondary jsgrid-cell" style="color:#2790C3 !important"><?php echo $row->payment_method; ?></td>
                            <?php } ?>
                                
                            
                            <td class="jsgrid-cell"><?php echo $row->order_date; ?></td>
                            <td class="jsgrid-cell" style="word-break: break-all;"><?php echo $row->ordernote; ?></td>
                            <td class="jsgrid-cell" style="word-break: break-all;">
                                <?php if($row->order_status=='delivered'){ ?>
                                    <span class="badge badge-success">Delivered</span>
                                <?php }else if($row->order_status=='received'){ ?>
                                    <span class="badge badge-secondary">Received</span>
                                <?php }else if($row->order_status=='shipped'){ ?>
                                    <span class="badge badge-primary">Shipped</span>
                                <?php }else if($row->order_status=='cancelled'){ ?>
                                    <span class="badge badge-danger">Cancelled</span>
                                <?php }else{ ?>
                                    <span class="badge badge-warning">Processing</span>
                                <?php } ?>
                            </td>
                            <td class="jsgrid-cell">
                            <a href="Admin/update_orderstatus/<?php echo $row->id; ?>" >
                                <input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                            </td>
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
