<!doctype html>
<html>
    <head>
    <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="verify-v1" content="c0gJEUjhZtTLyJThpFnbiEtTb2E4tgboTNPBZA9fOqI=" />
<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
<meta name="description" content="Aroma Tazeen is unique company in fashions which is famous for great quality and excelence in fashions" />
<meta name="keywords" content="Aroma Tazeen, shopping in the UK, best shopping website in UK, best shopping website" />
<meta name="google-site-verification" content="vadFqzWB_1LiHebPhOpD4O7Hfd0kdg5hMLJpmmIO440" />
        <title>Home || Aroma Tazeen</title>
        <meta name="description" content="">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
     
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
        
        <!-- all css here -->
        <!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- jquery-ui.min css -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- nivo slider css -->
        <link rel="stylesheet" href="lib/css/nivo-slider.css" />
        <!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- Simple Lence css --> 
        <link rel="stylesheet" href="css/jquery.simpleLens.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- fontello css -->
        <link rel="stylesheet" href="css/fontello.css">
        <!-- latofonts css -->
        <link rel="stylesheet" href="css/latofonts.css">
        <!-- style css -->
        <link rel="stylesheet" href="css/style.css">
        
       
         <!-- style css -->
        <!--<link rel="stylesheet" href="css/myslider.css">-->
        <!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
      
    </head>
      
    <body>
        <!-- HEADER-AREA START -->
    
        <header class="header-area">
            <!-- Header Start -->
            <div class="header">
                <!--<div class="container">-->
                    <div class="col-md-12 col-xs-12 col-xs-12 tx-center">
                        <!-- MainMenu Start -->
                        <div class="row">
                            <div class="logo">
                                <a href="Main/"><img src="img/<?php echo $cmylogo->cmylogo; ?>" alt="Aroma Tazeen"></a>
                            </div>
                        </div>
                        <!--<div class="col-md-5 col-sm-12 col-xs-12">-->
                            
                        <!--</div>-->
                    </div>
                        <!-- MainMenu End -->
                        
                   
                    <!--main menu-->
                    <div class="col-md-12 col-xs-12 col-xs-12">
                    <div class="row">
                    <div class="col-md-6 col-xs-12 col-xs-12">
                        <div class="mainmenu">
                                <nav>
                                    <ul>                                       
                                      <?php 
                		                $i=1;
                		                foreach($menulist->result() as $roww): ?>  
                                        <li><a href="Main/category_products/<?php echo $roww->category_name; ?>"><?php echo $roww->category_name; ?></a>
                                            <div class="megamenu">
                                                <div class="mega-top">
                                                    <span>  
                                                    <a href="Main/category_products/<?php echo $roww->category_name; ?>">All <?php echo $roww->category_name; ?></a>
                                                    <?php 
                                                       $category=$roww->category_name;
                                		                $sql ="SELECT * FROM sub_category WHERE category_name='$category'";
                                                        $query = $this->db->query($sql);
                                                        if ($query->num_rows() > 0) {
                                                          foreach ($query->result() as $row) {?>
                                		                        
                                                                <a href="Main/subcategory_products/<?php echo $roww->category_name; ?>/<?php echo $row->id; ?>"><?php echo $row->sub_category; ?></a>
                                                        
                                                        <?php }
                                                        
                                                        }?>
                                                    </span>
                                                    <span>
                                                        <a class="mega-menu-title" >Featured Brands</a>
                                                        <?php 
                                                           $category=$roww->category_name;
                                                         
                                                          
                                    		                $sql ="SELECT products.*,brands.id as bid FROM products LEFT JOIN brands ON brands.brand_name=products.brand_name WHERE products.category_name='$category' GROUP BY products.brand_name";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                              foreach ($query->result() as $brow) {?>
                                    		                        
                                                                    <a href="Main/brand_items/<?php echo $brow->category_name; ?>/<?php echo $brow->bid; ?>"><?php echo $brow->brand_name; ?></a>
                                                            
                                                            <?php }
                                                            
                                                            }?>
                                                       
                                                        
                                                    </span>
                                                    
                                                </div>
                                                <div class="mega-bottom">
                                                    <?php 
                                                           $category=$roww->category_name;
                                    		                $sql ="SELECT cover_photo FROM products WHERE category_name='$category'order by id desc limit 2";
                                                            $query = $this->db->query($sql);
                                                            if ($query->num_rows() > 0) {
                                                              foreach ($query->result() as $crow) {?>
                                    		                        
                                                                    <a href="Main/category_products/<?php echo $roww->category_name; ?>"><img src="img/product/coverimg/<?php echo $crow->cover_photo; ?>" alt="#"></a>
                                                            
                                                            <?php }
                                                            
                                                            }?>
                                                    <!--<a href="#"><img src="img/megamenu/menu-photo1.jpg" alt="#"></a>-->
                                                    <!--<a href="#"><img src="img/megamenu/menu-photo2.jpg" alt="#"></a>-->
                                                </div>
                                            </div>
                                        </li>
                                        <?php 
            		                    $i++;
            		                    endforeach;?>
                                      
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                    </div><!--left menu-->
                    <div class="col-md-6 col-xs-12 col-xs-12">
                        <div class="right-mainmenu">
                                     <ul class="top-menu">
                                         <!--search-->
                                         <li class="header-search">
                                             
                                                <?=form_open('Main/search_items/')?>
                                                    
                                                        <input class="top-search" type="text" name="itemname" placeholder="Search Here...">
                                                        <button type="submit" value="submit" name="submit"><i class="pe-7s-search"></i>SEARCH</button>
                                                    
                                                <?=form_close()?>
                                           
                                         </li>
                                         <!--currency-->
                                         <li><a href="" style="cursor:none;"><span><i class="fa fa-gbp"></i></span> CURRENCY</a></li>
                                         
                                         
                                         <!--wish list-->
                                         <?php if($this->session->userdata("email") && $this->session->userdata("password") || !empty($userwishlist))
                                        {?>
                                            <li><a href="Main/mywishlist"><span><i class="fa 3x fa-star"></i></span>WISHLIST(<?php echo $userwishlist->num_rows(); ?>)</a></li>
                                        <?php 
                                        }
                                        else{
                                        ?>
                                           <li><a href="Main/mywishlist"><span><i class="fa 3x fa-star"></i></span>WISHLIST(0)</a></li>
                                        <?php 
                                        }
                                        ?>
                                        
                                        <!--sign in-->
                                        <?php if(!empty($this->session->userdata("id")))
                                        {?>
                                        
                                            <li><a href="Main/myaccount"><span><i class="fa 3x fa-user"></i></span>My Account</a>
                                                <ul class="top-submenu">
                                                    <li><a href="Main/orderhistory">Order History</a></li>
                                                    <!--<li><a href="Main/myorder">Special Orders</a></li>-->
                                                    <li><a href="Main/myaccount">My Account</a></li>
                                                    <li><a href="Main/mywishlist">My Wishlist</a></li>
                                                    <li><a href="Main/logout">Logout</a></li>
                                                </ul>
                                            </li>
                                        <?php 
                                        }
                                        else{
                                        ?>
                                        <li><a href="Main/login"><span><i class="fa 3x fa-user"></i></span>SIGN IN</a></li>
                                        <?php } ?>
                                        
                                        <!--my bag-->
                                         <?php if(!empty($this->session->userdata("id")))
                                            {?>
                                            <li><a href="Main/Myshoppingbag"><span><i class="fa 3x fa-shopping-cart"></i></span>MY BAG (<?php echo $userbag->num_rows(); ?>)</a></li>
                                            <?php }else{ ?>
                                            <li><a href="Main/Myshoppingbag"><span><i class="fa 3x fa-shopping-cart"></i></span>MY BAG (<?php echo $nouserbag->num_rows(); ?>)</a></li>
                                            <?php } ?>
                                    </ul>
                               
                               
                            </div>
                    </div>
                    </div>    
                    </div>
                    <!--end main menu-->
                   <!--</div><!--end container-->
                    <!-- Message-Total Start -->
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="second-header-top mymsg">
                                    <h5 style="text-transform:uppercase"><b><?php echo $homemsg->message; ?></b></h5>
                                </div>
                        </div>
                    </div>
                    <!-- Cart-Total End -->
                
            </div>
            <!-- Header END -->
        </header>
   
        <!-- HEADER-AREA END -->
        <!-- MOBILE-MENU-AREA START -->
      