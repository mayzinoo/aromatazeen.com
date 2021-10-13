<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Product List</h5>
        </div>
        <div class="card-body">
        		<div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
		        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
		        <table class="jsgrid-table">
		            
		                <tr class="jsgrid-header-row">
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 30px;">#</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Cover Photo</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Title</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Price (£)</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Category Name</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Brand Name</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Size</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Color</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 60px;">Qty</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Remark</th>
		                    <th class="jsgrid-header-cell jsgrid-header-sortable" >Active on Home</th>

		                    
		                    <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
		                        Action
		                    </th>
		                </tr>
		                <tbody>
		                <?php 
		                $i=1;
		                foreach($productlist->result() as $row): ?>
		                <tr class="jsgrid-row">
		                    <td class="jsgrid-cell"><?php echo $i; ?></td>
		                    <td class="jsgrid-cell"><img id="blah" src="./img/product/coverimg/<?php echo $row->cover_photo; ?>" style="width:100px;height:auto;padding-bottom:10px;" /></td>
		                    <td class="jsgrid-cell"><?php echo $row->product_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo number_format($row->price); ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->category_name; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->brand_name; ?></td>
		                    <td class="jsgrid-cell">
		                        
		                        <?php 
					            $size = explode(']', $row->available_size);

					            for($i=1;$i<count($size);$i++)
					            {
					              $item = explode(']', $size[$i-1]);
					                ?> 
									<?=$item[0]?> <?=$item[1]?>, 

								<?php } ?>
		                        </td>
		                    <td class="jsgrid-cell">
		                        
		                        <?php 
					            $color = explode(']', $row->color);

					            for($i=1;$i<count($color);$i++)
					            {
					              $item = explode(']', $color[$i-1]);
					                ?> 
									<?=$item[0]?> <?=$item[1]?>, 

								<?php } ?>
		                        </td>
		                    <td class="jsgrid-cell"><?php echo $row->available_qty; ?></td>
		                    <td class="jsgrid-cell"><?php echo $row->remarkname; ?></td>
                            <td class="jsgrid-cell"><?php echo $row->add_home; ?></td>
		                    
		                    <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center" style="width: 50px;">
		                    <a href="Admin/edit_product_form/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
		                    <a href="Admin/delete_product/<?php echo $row->id; ?>"><input class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></a>
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