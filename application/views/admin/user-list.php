<style>
    .userlist th.jsgrid-header-cell{
        text-align:inherit !important;
    }
</style>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>User Details</h5>
        </div>
        <div class="card-body">
        	<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
	        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
	        <table class="jsgrid-table">
		            <tbody>
		                <tr class="jsgrid-header-row userlist">
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 30px;">#</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">First Name</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">Last Name</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">Email</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">Phone</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">Country</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">City</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable">Address</th>
		                </tr>
		                <?php 
		                $i=1;
		                foreach($userlist->result() as $row): ?>
		                <tr class="jsgrid-row">
		                    <td class="jsgrid-cell"><?php echo $i; ?></td>
		                    
		                    <td class="jsgrid-cell"><?php echo $row->first_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->last_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->email; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->phone; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->country; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->city; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->address; ?></td>
		                    
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