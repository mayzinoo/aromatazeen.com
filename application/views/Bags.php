<section class="content">
	<div class="container">
		<div class="row padding_md">
			<div class="col-md-12">
	 			<h3 class="title-3"><?php echo $this->uri->segment(3); ?></h3>
	 		</div>
			<div class="col-md-3">			
				<h4 class="sett-title">Category</h4>
				<ul class="acct-detail toppadding_sm">
				    <?php
                        $i=1;
                        foreach($subcategory->result() as $row):
                      ?>
					<li><a href=""><?php echo $row->sub_category; ?></a></li>
					<?php endforeach; ?>  
				</ul>
			</div>
			<div class="col-md-9">
				<h4 class="sett-title">Filter By</h4>
				<div class="row product-list">
					<div class="toppadding_md">
					   <?php
                        $i=1;
                        foreach($categoryproduct->result() as $row):
                      ?>
						<div class="col-md-4 hover-img">
						<a href="Main/productdetail/<?php echo $row->id; ?>" class="column" id = "zoomOut">
							<figure>
								<img class="clothing-image coverimg" src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#">
							</figure>
								<p><?php echo $row->product_name; ?><br/>
								£ <?php echo $row->price; ?><br/>
								<span class="item-type">New</span>
								</p>	 
							
						</a>
						</div>
						<?php endforeach; ?>      
						<!--<div class="col-md-4">-->
						<!--<a href="Main/" class="column" id = "zoomOut">-->
						<!--	<figure>-->
						<!--		<img class="clothing-image" src="img/product/featured/photo1.jpg" alt="#">-->
						<!--	</figure>-->
						<!--		<p>Isabel marant etoile<br/>-->
						<!--		Esthera Dress<br/>-->
						<!--		SG $638.75<br/>-->
						<!--		<span class="item-type">New</span>-->
						<!--		</p>-->
							
						<!--</a>-->
						<!--</div>-->
						<!--<div class="col-md-4">-->
						<!--<a href="Main/" class="column" id = "zoomOut">-->
						<!--	<figure>-->
						<!--		<img class="clothing-image" src="img/product/featured/photo1.jpg" alt="#">-->
						<!--	</figure>-->
						<!--		<p>Isabel marant etoile<br/>-->
						<!--		Esthera Dress<br/>-->
						<!--		SG $638.75<br/>-->
						<!--		<span class="item-type">New</span>-->
						<!--		</p>-->
						<!--</a>-->
						<!--</div>-->
					</div>
					<!--<div class="toppadding_md">-->
					<!--	<div class="col-md-4 ">-->
					<!--		<img class="clothing-image" src="img/product/featured/photo1.jpg" alt="#">-->
					<!--		<p>Isabel marant etoile<br/>-->
					<!--		Esthera Dress<br/>-->
					<!--		SG $638.75<br/>-->
					<!--		<span class="item-type">New</span>-->
					<!--		</p>	 -->
							
					<!--	</div>-->
					<!--	<div class="col-md-4">-->
					<!--		<img class="clothing-image" src="img/product/featured/photo1.jpg" alt="#">-->
					<!--		<p>Isabel marant etoile<br/>-->
					<!--		Esthera Dress<br/>-->
					<!--		SG $638.75<br/>-->
					<!--		<span class="item-type">New</span>-->
					<!--		</p>-->
					<!--	</div>-->
					<!--	<div class="col-md-4">-->
					<!--		<img class="clothing-image" src="img/product/featured/photo1.jpg" alt="#">-->
					<!--		<p>Isabel marant etoile<br/>-->
					<!--		Esthera Dress<br/>-->
					<!--		SG $638.75<br/>-->
					<!--		<span class="item-type">New</span>-->
					<!--		</p>-->
					<!--	</div>-->
					<!--</div>-->
				</div>
			</div>
		 	
		 	
		</div>
	</div>
</section>