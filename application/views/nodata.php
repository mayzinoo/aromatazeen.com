<section class="content">
	<div class="container">
		<div class="row padding_md">
			<div class="col-md-12">
	 			<h3 class="title-3">Featured Products</h3>
	 		</div>
			<div class="col-md-3">			
				<h4 class="sett-title">Category</h4>
				<ul class="acct-detail toppadding_sm">
				    <?php
                        $i=1;
                        foreach($subcategory->result() as $row):
                      ?>
					<li><a href="Main/subcategory_products/<?=$row->category_name?>/<?=$row->id?>"><?php echo $row->sub_category; ?></a></li>
					<?php endforeach; ?>  
				</ul>
			</div>
			<div class="col-md-9">
				<h4 class="sett-title"><?php echo $message; ?></h4>
				
			</div>
		 	
		 	
		</div>
	</div>
</section>