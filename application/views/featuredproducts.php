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
                                foreach($featuredproducts->result() as $row):
                              ?>  
                              <div class="col-md-12">
                                  <div class="single-product">
                                    <div class="product-img">
                                        <a class="pro-image" href="Main/productdetail/<?php echo $row->id; ?>">
                                            <img class="primary-image coverimg" src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#">
                                            
                                        </a>
                                        <div class="pro-actions">
                                            <a class="action-btn action-btn-1" href="Main/productdetail/<?php echo $row->id; ?>"><i class="pe-7s-cart"></i><span>Add to Cart</span></a>
                                            <a class="action-btn" href="wishlist.html" data-toggle="tooltip" data-original-title="Add to Wishlist"><i class="pe-7s-like"></i></a>
                                            
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name">
                                            <a href="Main/productdetail/<?php echo $row->id; ?>"><?php echo $row->product_name; ?></a>
                                        </h2>
                                        
                                        <div class="price-box">
                                            <span class="new-price">£ <?php echo $row->price; ?></span>
                                        </div>
                                    </div>
                                </div><!--end single product-->
                                
                              </div>
                                
                                <?php endforeach; ?> 
                               
                            
                            <!-- Single-Product End -->
                            
                            </div>
                            
                            </div>
                            <!-- Single-Product End -->
                        </div>
                    </div><!--end featured products-->