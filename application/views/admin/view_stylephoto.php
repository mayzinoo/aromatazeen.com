<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Photo Gallery of( <?php echo $productname->pname; ?> )</h5>
        </div>
        <div class="card-body">
        		<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
		        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
		        <table class="jsgrid-table">
		            <tbody>
		                <tr class="jsgrid-header-row">
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >#</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Photo Gallery</th>
		                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
		                        Action
		                    </th>
		                </tr>
		                <?php 
		                $i=1;
		                foreach($styphoto->result() as $row): ?>
		                <tr class="jsgrid-row">
		                    <td class="jsgrid-cell"><?php echo $i; ?></td>
		                    <td class="jsgrid-cell"><img id="blah" src="./img/product/stylephotos/<?php echo $row->photo; ?>" style="width:100px;height:auto;padding-bottom:10px;" /></td>
		                    
		                    <td class="jsgrid-cell"><a href="Admin/delete_styphotos/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
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