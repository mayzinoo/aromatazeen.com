<style>
    .single-product-details input{
        border:none !important;
    }
    #demo,#colordemo{
        color:#32c4d1;
    }
    #slides{
  position: relative;
  height: 130px;
  padding: 0px;
  margin: 0px;
  list-style-type: none;
  /*width:100px;*/
}

.slide{
  position: absolute;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 1;

  -webkit-transition: opacity 1s;
  -moz-transition: opacity 1s;
  -o-transition: opacity 1s;
  transition: opacity 1s;
}

.showing{
  opacity: 1;
  z-index: 2;
}



/*
non-essential styles:
just for appearance; change whatever you want
*/

.slide{
  font-size: 12px;
  /*padding: 40px;*/
  box-sizing: border-box;
  /*background: #333;*/
  color: #fff;
}

/*.slide:nth-of-type(1){*/
/*  background: red;*/
/*}*/
/*.slide:nth-of-type(2){*/
/*  background: orange;*/
/*}*/
/*.slide:nth-of-type(3){*/
/*  background: green;*/
/*}*/
/*.slide:nth-of-type(4){*/
/*  background: blue;*/
/*}*/
/*.slide:nth-of-type(5){*/
/*  background: purple;*/
/*}*/
</style>
<section class="content">
			<!-- ABOUT-AREA START -->
			<div class="product-detail-area margin-70">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="single-product-view">
								<!-- Nav tabs -->
								<div class="large-product-tab-menu">
									<div role="tablist" class="product-details-menu product-details-carousel navigation-center">
									<?php 
            		                
            		                foreach($morephotos->result() as $row): ?>
										<div role="presentation" class="active">
											<a href="#img-1" role="tab" data-toggle="tab">
												<img src="img/product/morephotos/<?php echo $row->photo; ?>" alt="" />
											</a>
										</div>
									<?php 
            		                    endforeach;
            		                ?>
									</div>
								</div>
								<div class="view-large-photo">						
									<!-- Tab panes -->
									<div class="simpleLens-container tab-content">
										<div role="tabpanel" class="tab-pane active" id="img-1">
											<div class="simpleLens-big-image-container">
												<a class="simpleLens-lens-image" data-lens-image="./img/product/coverimg/<?php echo $productdetail->cover_photo ; ?>" href="#">
													<img src="img/product/coverimg/<?php echo $productdetail->cover_photo ; ?>" alt="" class="simpleLens-big-image"/>
												</a>
											</div>
										</div>
										
									</div>						
								</div>	
							</div>
						</div>
						<div class="col-md-7">
						    
							<div class="single-product-details listview">
								<div class="product-content">
									<h2 class="product-name">
										<b><?php echo $productdetail->brand_name ; ?></b>
									</h2>
									<h3 class="product-title"><?php echo $productdetail->product_name ; ?></h3>
									<div class="price-box">										
										<span class="new-price">£ <?php echo $productdetail->price ; ?></span>
									</div>
							<?=form_open_multipart('Main/Shoppingbag/'.$this->uri->segment(3));?>
							<input type="hidden" name="nologinip" value="<?php echo $ip_address; ?>">
									<div class="size">
										<span class="choose-title"><span><b>Size : <input type="text" id="demo"></b></span><br/>
										<!--<input type="text" value="<script>document.getElementById('demo').value</script>">-->
										<?php 
            					            $size = explode(']', $productdetail->available_size);
            
            					            for($i=1;$i<count($size);$i++)
            					            {
            					              $item = explode(']', $size[$i-1]);
            					                ?> 
            									<input type="radio" class="myRadio" id="type<?php echo $i; ?>" name="size" value="<?php echo $item[0]; ?>" required>
            									<label><?php echo $item[0]; ?></label>
            								<?php } ?>
										</span>
									
									</div>
						 
									<div class="color-choose">
										<span class="choose-title"><b>Color : <input type="text" id="colordemo"></b><br/>
										<?php 
            					            $color = explode(']', $productdetail->color);
            
            					            for($i=1;$i<count($color);$i++)
            					            {
            					              $item = explode(']', $color[$i-1]);
            					                ?> 
            									<input type="radio" class="mycolorRadio" id="type<?php echo $i; ?>" name="color" value="<?php echo $item[0]; ?>" required>
            									<label><?php echo $item[0]; ?></label>
            
            								<?php } ?>
										</span>
											
									</div>
									
									<div class="pro-actions">
								    <?php if(!empty($addtocart->num_rows())){ ?>
								     <button type="submit" class="action-btn action-btn-1 wishlist-btn"><i class="pe-7s-cart"></i> Added to Cart</button>
										<!--<a class="action-btn action-btn-1" style="cursor:pointer;" ><i class="pe-7s-cart"></i>Added to Cart</a>-->
								    <?php }else{ ?>	
								        <button type="submit" class="action-btn action-btn-1 wishlist-btn"><i class="pe-7s-cart"></i> Add to Cart</button>
										<!--<a class="action-btn action-btn-1" href="Main/Shoppingbag/<?php echo $this->uri->segment(3);?>"><i class="pe-7s-cart"></i>Add to Cart</a>-->
									<?php } ?>
							<?=form_close()?>			
									<?php if(!empty($checkwishlist->num_rows())){ ?>
										<a class="action-btn action-btn-1 wishlist-btn" id="wishlist-btn" data-toggle="tooltip" data-original-title="Add to Wishlist"><i class="pe-7s-like"></i>Added to Wishlist</a>	
								    <?php }else{ ?>
								        <a href="Main/addtowishlist/<?php echo $this->uri->segment(3);?>" class="action-btn action-btn-1 wishlist-btn" id="wishlist-btn" data-toggle="tooltip" data-original-title="Add to Wishlist"><i class="pe-7s-like"></i>Add to Wishlist</a>	
								   <?php } ?>
									</div>
								</div>
								<div class="product-description-tab">
									<!-- Nav tabs -->
									<ul role="tablist">
										<li role="presentation" class="active"><a href="#stylewith" role="tab" data-toggle="tab">Styled With</a></li>
										<li role="presentation" ><a href="#description" role="tab" data-toggle="tab">Description</a></li>										
										<li role="presentation"><a href="#shipping" role="tab" data-toggle="tab">Shipping</a></li>
										<li role="presentation"><a href="#return" role="tab" data-toggle="tab">Returns</a></li>
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
    										<div role="tabpanel" class="tab-pane active" id="stylewith">
            										    <div class="row toppadding_lg">
            						                        <div class="active-blog-post navigation-top ">
                						                      <?php 
                                                    		  foreach($stylephotos->result() as $row): ?>
                						                            <div class="col-lg-12 col-md-12">
                                            								<div class="blog-post-inner">
                                            									<div class="post-thumbnaill tx-center">
                                            										<a href="Main/productdetail/<?php echo $row->id; ?>">
                                            											<img src="./img/product/coverimg/<?php echo $row->cover_photo ; ?>" style="width:200px;height:auto">
                                            										</a>
                                            									</div>
                                            									<div class="blog-brief">
                                            										<div class="styled">
                                                                                        <h2 class="product-name">
                                                                                            <a href="Main/productdetail/<?php echo $row->id; ?>"><?php echo $row->brand_name; ?></a>
                                                                                        </h2>
                                                                                        <h2 class="product-name">
                                                                                            <a href="Main/productdetail/<?php echo $row->id; ?>"><?php echo $row->product_name; ?></a>
                                                                                        </h2>
                                                                                        
                                                                                        <div class="price-box">
                                                                                            <span class="new-price">£ <?php echo $row->price; ?></span>
                                                                                        </div>
                                                                                    </div>
                                            									</div>
                                            								</div>
                                            							</div><!--first row-->
                                            						<?php 
                                        		                    endforeach;
                                        		                        ?>
                						                        </div>
            						                    </div>
    						                  </div><!--end tabpanel-->
											
									
										<div role="tabpanel" class="tab-pane" id="description">
											<div class="reviews-list">
												<!-- Single-Review Start -->
												<div class="single-reviews fix">
													<div class="reviews-details">
														<?php echo htmlspecialchars_decode($productdetail->description); ?>
														
													</div>
													
												</div>
												<!-- Single-Review End -->
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="shipping">
											<div class="additional-info">
												<p><?php echo $shipdata->text; ?></p>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane" id="return">
											<div class="custom-info">
												<p>Lorem Ispum is simpy dummy text of the printing and typesetting. Lorm Ispum has been the industry's text ever since.
												Lorem Ispum is simpy dummy text of the printing and typesetting. Lorm Ispum has been the industry's text ever since.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>		
					</div>
					
					<div class="row toppadding_lg">
					    <div class="featured-products-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="area-title title-top-border">
                                            <h2>You May Also Like</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="active-product-carousel navigation-top">
                                        <!-- Single-Product Start -->
                                          <?php 
                                           $category=$productdetail->category_name;
                                           $productid=$this->uri->segment(3);
                    		                $sql ="SELECT * FROM products WHERE category_name='$category' AND id!=$productid ORDER BY id DESC";
                                            $query = $this->db->query($sql);
                                            if ($query->num_rows() > 0) {
                                              foreach ($query->result() as $frow) {?>
                    		                        
                                                    <div class="col-md-12">
                                                          <div class="single-product">
                                                            <div class="hover14 columnproduct-img">
                                                            <figure>
                                                                <a class="pro-image" href="Main/productdetail/<?php echo $frow->id; ?>">
                                                                    <img class="primary-image coverimg" src="img/product/coverimg/<?php echo $frow->cover_photo; ?>" alt="#">
                                                                    
                                                                </a>
                                                            </figure>   
                                                            </div>
                                                            <div class="product-content">
                                                                <h2 class="product-name">
                                                                    <a href="Main/productdetail/<?php echo $frow->id; ?>"><?php echo $frow->brand_name; ?></a>
                                                                </h2>
                                                                <h2 class="product-name">
                                                                    <a href="Main/productdetail/<?php echo $frow->id; ?>"><?php echo $frow->product_name; ?></a>
                                                                </h2>
                                                                
                                                                <div class="price-box">
                                                                    <span class="new-price">£ <?php echo $frow->price; ?></span>
                                                                </div>
                                                            </div>
                                                        </div><!--end single product-->
                                                      </div>
                                            
                                            <?php }
                                            
                                            }?>
                                          
                                            
                                        </div>
                                        </div>
                                        
                                        <!-- Single-Product End -->
                                    </div>
                                </div><!--end featured products-->
					</div>
				</div>
			</div>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    var radio = document.querySelectorAll(".myRadio");
    var demo = document.getElementById("demo");
  
function checkBox(e){
	demo.value = e.target.value;
	psize=demo.value;
        $.ajax({
                type: "POST",
                url : '<?=site_url('Main/Shoppingbag/')?>',
                data: {size: psize}, 
                success : function(e)
                {
                 
                }
            });
}
radio.forEach(check => {
	check.addEventListener("click", checkBox);
});
 
</script>

<script>
    var radio = document.querySelectorAll(".mycolorRadio");
var colordemo = document.getElementById("colordemo");
  
function checkBox(e){
	colordemo.value = e.target.value;
}
radio.forEach(check => {
	check.addEventListener("click", checkBox);
});
</script>
<script>
    var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide(){
  slides[currentSlide].className = 'slide';
  currentSlide = (currentSlide+1)%slides.length;
  slides[currentSlide].className = 'slide showing';
}
</script>
