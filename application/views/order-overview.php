<style>
    .selectt{
        display:none;
    }
</style>
<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	 			<h3 class="title-3">ORDER OVERVIEW</h3>
	 	</div>
	 	<div class="col-md-12 toppadding_md">
    	 	<div class="row">
    	 	    <div class="col-md-7 ">
    	 	    <div class="row orderview">  	
    	 	         <table class="table">
    	 	             <thead>
    	 	                 <tr>
    	 	                     <th>Product</th>
    	 	                     <th>Product Detail</th>
    	 	                     <th>Price</th>
    	 	                 </tr>
    	 	             </thead>
    					<tbody>
    					    <?php
                            $item = explode(']', $checkout->item);
                
                                    for($i=1;$i<count($item);$i++)
                                    {
                                      $usercheck = explode('#', $item[$i-1]);
                                      $nouserip=$this->session->userdata("nouserip");
                            $sql=$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN user_checkout ON products.id=$usercheck[0] WHERE nologin_user='$nouserip'")->row();
                                    ?>
                						<tr>
                							<td>
                							    <img src="./img/product/coverimg/<?=$sql->cover_photo?>">
                							</td>
                							<td>
                							    <h5><b><?=$sql->brand_name?></b></h5>
                	 	                        <h5><?=$sql->product_name?></h5>
                	 	                        <p>Color: <?=$usercheck[3]?></p>
                	 	                        <p>Size: <?=$usercheck[4]?></p>
                	 	                        <p>Quantity: <?=$usercheck[1]?></p>
                	 	                        
                							</td>
                							<td>
                							    £ <?=$sql->pprice?>
                							</td>
                						</tr>
    						<?php } ?>
    					</tbody>
    								
    					</table>
    					
            		<div class="col-md-12 padding_sm">
                			
    	 	            <div class="row checkoutpaid">
    	 	                <table class="table">
    									<tbody>
    										<tr>
    											<td class="text-left">Item(s) Subtotal</td>
    											<td class="text-right">£ <?php echo $checkout->price; ?></td>
    										</tr>
    										<tr>
    											<td class="text-left">Shipping Fee</td>
    											<td class="text-right">£ <?php echo $checkout->shipping_fee; ?></td>
    										</tr>
    									
    										
    									</tbody>
    									<tfoot>
    									    <tr>
    										    <td></td>
    										    <td></td>
    										</tr>
    										<tr>
    											<td class="text-leftd"><strong>Amount Payable </strong></td>
    											<td class="text-right custom-td"><strong>£ <?php echo $checkout->total; ?></strong></td>
    										</tr>
    									</tfoot>
    								</table>
    	 	            </div>
            		</div>
            		</div>  <!--orderview-->
            		<div class="right-side next-step"> 
            		<a href="Main/usercheckout" class="btn btn-color" style="background:#32c4d1">Next</a> 
            		</div>	
    	 	    </div><!--left side-->
    	 	    
    	 	     <div class="col-md-5 ">
    	 	         <div class="orderaddress">
    	 	             <h5><b>Shipping Address</b></h5>
    	 	             <?php if(!empty($billdata)){ ?>
    	 	                <p>
    	 	                    <?php echo $billdata->address1; ?><br/>
    	 	                    <?php echo $billdata->city; ?><br/>
    	 	                    <?php echo $billdata->phone; ?>
    	 	                </p>
    	 	                <?php }else{ ?>
    	 	                <p>
    	 	                    <?php echo $userdata->address; ?><br/>
    	 	                    <?php echo $userdata->city; ?><br/>
    	 	                    <?php echo $userdata->phone; ?>
    	 	                 </p>
    	 	                <?php } ?>
    	 	         </div>
    	 	        <div class="orderaddress toppadding_sm">
    	 	             <h5><b>Billing Address</b></h5>
    	 	             <p>
	 	                    <?php echo $userdata->address; ?><br/>
	 	                    <?php echo $userdata->city; ?><br/>
	 	                    <?php echo $userdata->phone; ?>
	 	                </p>
    	 	         </div>
    	 	    </div>
    	 	</div> 
	 	</div>

	 </div>
</div>

