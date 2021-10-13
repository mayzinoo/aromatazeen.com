<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Home Page Slide Show Images</h5>
        </div>
        <div class="card-body">
        		<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
		        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
		        <table class="jsgrid-table">
		            <tbody>
		                <tr class="jsgrid-header-row">
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 30px;">#</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 35px;" >Slide Photo</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Title</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Category Name</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Brand Name</th>
                            <th class="jsgrid-header-cell jsgrid-header-sortable" >Price</th>
		                    
		                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
		                        Action
		                    </th>
		                </tr>
		                <?php 
		                $i=1;
		                foreach($slideshowdata->result() as $row): ?>
		                <tr class="jsgrid-row">
		                    <td class="jsgrid-cell"><?php echo $i; ?></td>
		                    <td class="jsgrid-cell"><img id="blah" src="./img/homeslideshow/<?php echo $row->home_slider; ?>" style="width:100px;height:auto;padding-bottom:10px;" /></td>
		                    <td class="jsgrid-cell"><?php echo $row->product_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->category_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->brand_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->price; ?></td>
		                    
		                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
		                    <a href="Admin/edit_product_form/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
		                    <a href="Admin/deleteslideshow/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
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