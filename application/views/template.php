<?php include ('header.php') ?>
        <!-- MOBILE-MENU-AREA END -->
        <!-- SLIDER-AREA START -->
        <section class="slider-area">
        
            <div class="bend niceties preview-2">
            
                <div id="ensign-nivoslider" class="slides"> 
                <?php
                $i=1;
    				foreach($allslideshow->result() as $row):
    			?>
                    <img src="img/homeslideshow/<?php echo $row->home_slider; ?>" alt="" title="#slider-direction-<?php echo $i; ?>"  />
                <?php 
                $i++;
                endforeach; ?>
                </div>
                <!-- direction 1 -->
                <?php
                $i=1;
    				foreach($allslideshow->result() as $row):
    			?>
                <div id="slider-direction-<?php echo $i; ?>" class="slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lft s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <div class="layer-1">
                                <div class="custom-slider">
                                    <h3 class="btitle1" style="text-transform:uppercase;"><?php echo $row->brand_name; ?></h2>
                                    <h2 class="title1"><?php echo $row->product_name; ?></h2>
                                    <a href="Main/productdetail/<?php echo $row->id; ?>" target="_blank" class="shop-now">Shop Now</a>
                                    
                                </div>
                                <!--<a href="#">Shop Now</a>-->
                            </div>
                        </div>
                    </div>  
                </div>
                <?php 
                $i++;
                endforeach; ?>
               
            </div>
            
        </section>
        <!-- SLIDER-AREA END -->
        <section class="content">
            <!-- CATEGORY-PRODUCT-AREA START -->
            <div class="category-product-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="single-category border-hover">
                            <a href="Main/category_products/Clothing"><img src="img/product/coverimg/<?php echo $clothing->cover_photo; ?>" alt=""></a>
                            <h2>Clothings</h2>
                            <span><a class="shop-now" href="Main/category_products/Clothing">Shop Now</a></span>
                        </div>
                        <div class="single-category border-hover">
                            <a href="Main/category_products/Bags"><img src="img/product/coverimg/<?php echo $bags->cover_photo; ?>" alt=""></a>
                            <h2>Bags</h2>
                            <span><a class="shop-now" href="Main/category_products/Bags">Shop Now</a></span>
                        </div>
                        <div class="single-category border-hover">
                            <a href="Main/category_products/Shoes"><img src="img/product/coverimg/<?php echo $shoes->cover_photo; ?>" alt=""></a>
                            <h2>Shoes</h2>
                            <span><a class="shop-now" href="Main/category_products/Shoes">Shop Now</a></span>
                        </div>
                        <div class="single-category border-hover">
                            <a href="Main/category_products/"><img src="img/product/coverimg/<?php echo $newarrival->cover_photo; ?>" alt=""></a>
                            <h2>New Arrivals</h2>
                            <span><a class="shop-now" href="Main/category_products/Clothing">Shop Now</a></span>
                        </div> 
                        <div class="single-category border-hover">
                            <a href="Main/category_products/Accessories"><img src="img/product/coverimg/<?php echo $accessories->cover_photo; ?>" alt=""></a>
                            <h2>Accessories</h2>
                            <span><a class="shop-now" href="Main/category_products/Accessories">Shop Now</a></span>
                        </div>                    
                    </div>
                </div>
            </div>
            <!-- CATEGORY-PRODUCT-AREA END -->
            <!-- FASHION-COLLECTION-AREA START -->
            <div class="fashion-collection-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="fashion-collection">
                                <div class="fashion-photo">
                                    <img src="img/homeslideshow/<?php echo $lastestfashion->viewphoto; ?>" alt="#">
                                </div>
                                <div class="fashion-details">
                                    <h2>
                                        <span class="color-whitee">Best</span> Sellers 
                                        
                                    </h2>
                                    <p><?php echo $lastestfashion->content_text; ?></p>
                                    <a href="Main/newcollection" >View ITEMS<span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FASHION-COLLECTION-AREA END -->
            <!-- NEW-ARRIVAL-AREA START -->
            <div class="new-arrival-area">
                <div class="containerr">
                    <div class="area-title new-title-top-border">
                                <h2 style="text-align:center"><a href="Main/newproducts" target="_blank">New Arrival</a></h2>
                            </div>
                    
                    <div class="new-arrival">
                        <div class="roww">
                           
                            <div class="col-md-12 col-sm-12 nopadding">
                                <div class="">
                                 
                                   <div class="sin-items">
                                        <div class="col-sm-12 col-md-12 toppadding_md">
                                            <?php
                                                foreach($newproducts->result() as $row):
                                              ?>  
                                            <div class="col-md-3 col-sm-12 col-xs-12 bottompadding_md nopadding">
                                                <div class="hover14 column product-img">
                                                                <a class="pro-image newarrival" href="Main/productdetail/<?php echo $row->id; ?>">
                                                                    <figure>
                                                                        <img class="primary-image coverimgg" src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#">
                                                                    </figure>
                                                                    <div class="pdetail" style="text-align:center">
                                                                        <p><?php echo $row->brand_name; ?><br/>
                                                                            <?php echo $row->product_name; ?><br/>
                                            								£ <?php echo $row->price; ?><br/>
                                            							</p>
                                    							    </div>
                                                                </a>
                                                </div>
                                            </div>
                                            <?php endforeach; ?> 
                                           
                                        </div><!--end row
                                     </div><!--end sin item-->
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- NEW-ARRIVAL-AREA END -->
            
            <!-- PRODUCT-BANNER-AREA START -->
            <div class="product-banner-area">
                <div class="container">
                    <div class="row toppadding_lg">
                        <div class="col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                            <div class="product-banner">
                                <a class="banner-photo" href="Main/discount_products" target="_blank"><img src="img/product/coverimg/<?php echo $discountproduct->cover_photo; ?>" alt="#" /></a>
                                <div class="banner-brief">
                                    <h2>Discount Items</h2>
                                    <a href="Main/discount_products" target="_blank" class="shop-now1 shop-now">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="product-banner banner-2">
                                <a class="banner-photo" href="Main/mostviewed_products" target="_blank"><img src="img/product/coverimg/<?php echo $mostviewproduct->cover_photo; ?>" alt="#" /></a>
                                <div class="banner-brief">
                                    <h2>Most Viewed Items</h2>
                                    
                                    <a href="Main/mostviewed_products" class="shop-now" target="_blank">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT-BANNER-AREA END -->
            <!-- FEATURED-PRODUCTS-AREA START -->
            <div class="featured-products-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="area-title title-top-border">
                                <h2>Featured Products</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="active-product-carousel navigation-top">
                            <!-- Single-Product Start -->
                            
                              <?php
                                foreach($allproducts->result() as $row):
                              ?>  
                              <div class="col-md-12">
                                  <div class="single-product">
                                    <div class="hover14 column product-img">
                                        <figure><a class="pro-image" href="Main/productdetail/<?php echo $row->id; ?>">
                                            <img class="primary-image coverimg" src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#">
                                        </figure>    
                                        </a>
                                        <!--<div class="pro-actions">-->
                                        <!--    <a class="action-btn action-btn-1" href="Main/productdetail/<?php echo $row->id; ?>"><i class="pe-7s-cart"></i><span>Add to Cart</span></a>-->
                                        <!--    <a class="action-btn" href="Main/productdetail/<?php echo $row->id; ?>" data-toggle="tooltip" data-original-title="Add to Wishlist"><i class="pe-7s-like"></i></a>-->
                                            
                                        <!--</div>-->
                                    </div>
                                    <div class="product-content" style="text-align:center">
                                        <h2 style="text-transform:uppercase;font-size:16px"><uppercase></uppercase><?php echo $row->brand_name; ?></h2>
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
              
            <!-- FEATURED-PRODUCTS-AREA END -->
            <!-- TESTIMONIALS-AREA START -->
            <div class="testimonials-area">
                <div class="testimonials">
                    <div class="container">
                        <div class="row">
                            <div class="active-testimonial-carousel navigation-bottom">
                            <?php
                                foreach($chairman->result() as $row):
                              ?>  
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-testimonial">
                                        <h2><?php echo $row->name; ?></h2>
                                        <h3><?php echo $row->position; ?></h3>
                                        <p><?php echo $row->about; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?> 
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-testimonial">
                                        <h2>Robert Miller</h2>
                                        <h3>Chairman</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TESTIMONIALS-AREA END -->            
            <!-- BRANDS-LOGO-AREA START -->
            <div class="brands-logo-area">
                <div class="container">
                    <div class="row brandlogo-title">
                    <h2>Our Brands</h2>
                        <div class="active-brands-logo">
                            <!-- Single-Brand-Logo Start -->
                            <?php
                                foreach($brand->result() as $row):
                              ?>  
                            <div class="col-md-12">
                                <div class="single-brand-logo">
                                    <img src="img/product/brandphotos/<?php echo $row->brand_photo; ?>" alt="" />
                                </div>
                            </div>
                            <?php endforeach; ?> 
                            <!-- Single-Brand-Logo End -->
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- BRANDS-LOGO-AREA END -->
        </section>
        <!-- FOOTER-AREA START -->
<?php include ('footer.php') ?>