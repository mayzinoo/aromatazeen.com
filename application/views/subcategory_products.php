<section class="content">
	<div class="container">
		<div class="row padding_md">
			<div class="col-md-12">
	 			<h3 class="title-3"><?=$this->uri->segment(3)?></h3>
	 		</div>
			<div class="col-md-3">			
				<h4 class="sett-title">Category</h4>
				<ul class="acct-detail toppadding_sm">
				    <?php
                        $i=1;
                        foreach($subcategory->result() as $row):
                      ?>
					<li><a href="Main/subcategory_products/<?=$this->uri->segment(3)?>/<?=$row->id?>"><?php echo $row->sub_category; ?></a></li>
					<?php endforeach; ?>  
				</ul>
			</div>
			<div class="col-md-9">
				<h4 class="sett-title"><?=$subcat->sub_category?></h4>
				<div class="row product-list">
					<div class="toppadding_md">
					   <?php
                        $i=1;
                        foreach($subcategoryproduct->result() as $row):
                      ?>
						<div class="col-md-4 hover-img bottompadding_md">
						<a href="Main/productdetail/<?php echo $row->id; ?>" class="column" id = "zoomOut">
							<figure>
								<img class="clothing-image coverimg" src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#">
							</figure>
								<p><?php echo $row->brand_name; ?><br/>
								   <span style="text-transform:none !Important"><?php echo $row->product_name; ?></span> <br/>
								GBP £ <?php echo $row->price; ?><br/>
							
						</a>
						</div>
						<?php endforeach; ?>      
						
					</div>
					
				</div>
			</div>
		 	
		 	
		</div>
	</div>
</section>