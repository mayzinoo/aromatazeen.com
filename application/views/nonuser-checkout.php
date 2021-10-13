<style>
    .selectt{
        display:none;
    }
    .answer { display:none }
</style>
<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	 			<h3 class="title-3">CHECKOUT</h3>
	 	</div>
	 	<div class="col-md-12 toppadding_md">
	 	    <?php if(!empty($this->session->userdata("id"))){ ?>
	 	        <p>Welcome <?php echo $this->session->userdata("id"); ?> ! If you want to change the following billing data, please go <a href="Main/myaccount" style="text-decoration:underline !important;">Account Setting</a></p>
	 	    <?php }else{ ?>
	 	        <p>Returning customer? <a href="Main/login"><b>Click here to login</b></a></p>
	 	    <?php } ?>
	 	    
	 	    <div class="col-md-7 paymentmethod">
	 	        <!--<div class="row">-->
	 	                    <!--paycredit-->
	 	                   
        					    <div class="row padding_sm">
            					<h4 class="padding_sm"><b>BILLING DETAILS</b></h4> 
            				    <?=form_open('Main/update_userbillingdata/')?> 
            				    
							    <form action="#">
							        <?php if(!empty($this->session->userdata("id"))){ ?>
            				                <div class="col-md-6">
        					                    <label>First name *</label>
                                				<input type="text" class="custom-form" name="firstname" value="<?php echo $userdata->first_name; ?>" readonly/>
                                    		</div>
                                    		<div class="col-md-6">
                                    		        <label>Last name *</label>
                                    				<input type="text" class="custom-form" name="lastname" value="<?php echo $userdata->last_name; ?>" readonly/>
                                    		</div>
                                        	<div class="col-md-12">
                                        	            <label>Company Name (optional)</label>
                                        	            <input class="custom-form" type="text" name="cmyname" value="<?php echo $userdata->cmyname; ?>" readonly/>
                                        	</div>
                                        	<div class="col-md-12">
                                        	            <label>Country / Region *</label>
                                        	            <input class="custom-form" type="text" name="country" value="<?php echo $userdata->country; ?>" readonly/>
                                        	</div>
                                        	<div class="col-md-12">
                                        	            <label>Address *</label>
                                        	            <textarea class="custom-form" type="text" name="address"  readonly/><?php echo $userdata->address; ?></textarea>
                                        	</div>
                                        	<div class="col-md-12">
                                        	            <label>Postcode / ZIP *</label>
                                        	            <input class="custom-form" type="text" name="postcode" value="<?php echo $userdata->postcode; ?>" readonly/>
                                        	</div>
                                        	<div class="col-md-12">
                                        	            <label>Town / City *</label>
                                        	            <input class="custom-form" type="text" name="city" value="<?php echo $userdata->city; ?>" readonly/>
                                        	</div>
                                        	<div class="col-md-12">
                                        	            <label>Phone *</label>
                                        	            <input class="custom-form" type="text" name="phone" value="<?php echo $userdata->phone; ?>" readonly/>
                                        	</div>
                                        	<div class="col-md-12">
                                        	            <label>Email address *</label>
                                        	            <input class="custom-form" type="email" name="email" value="<?php echo $userdata->email; ?>" readonly/>
                                        	</div>
                				    <?php }else{ ?>
                        	 	               <div class="col-md-6">
        					                    <label>First name *</label>
                                				<input type="text" class="custom-form" name="firstname" required/>
                                        		</div>
                                        		<div class="col-md-6">
                                        		        <label>Last name *</label>
                                        				<input type="text" class="custom-form" name="lastname" required/>
                                        		</div>
                                            	<div class="col-md-12">
                                            	            <label>Company Name (optional)</label>
                                            	            <input class="custom-form" type="text" name="cmyname"/>
                                            	</div>
                                            	<div class="col-md-12">
                                            	            <label>Country / Region *</label>
                                            	            <input class="custom-form" type="text" name="country" required/>
                                            	</div>
                                            	<div class="col-md-12">
                                            	            <label>Address *</label>
                                            	            <textarea class="custom-form" type="text" name="address" required/></textarea>
                                            	</div>
                                            	<div class="col-md-12">
                                            	            <label>Postcode / ZIP *</label>
                                            	            <input class="custom-form" type="text" name="postcode" required/>
                                            	</div>
                                            	<div class="col-md-12">
                                            	            <label>Town / City *</label>
                                            	            <input class="custom-form" type="text" name="city" required/>
                                            	</div>
                                            	<div class="col-md-12">
                                            	            <label>Phone *</label>
                                            	            <input class="custom-form" type="text" name="phone" required/>
                                            	</div>
                                            	<div class="col-md-12">
                                            	            <label>Email address *</label>
                                            	            <input class="custom-form" type="email" name="email" required/>
                                            	</div>
                                            	<div class="col-md-12 padding_sm">
                        					        <input type="checkbox" name="createacct" id="coupon_question" class="" value="newacct" required>
                        					        <label>Create an account? </label>
                        					    </div>

                                                <div class="col-md-12 padding_sm answer">
                                                    <label>Password *</label>
                                                    <input type="password" name="password" id="coupon_field" />
                                                </div>
                                            	<div class="col-md-12 padding_sm">
                        					        <input type="checkbox" name="shipaddress" class="" value="shipaddress">
                        					        <label>Ship to a different address? </label>
                        					    </div>
                        					<!--new ship address-->
                        					    <div class="col-md-12 shipaddress selectt">
                                                          <div class="col-md-6">
                            					                    <label>First name *</label>
                                                    				<input type="text" class="custom-form" name="newfirstname" />
                                                    		</div>
                                                    		<div class="col-md-6">
                                                    		        <label>Last name *</label>
                                                    				<input type="text" class="custom-form" name="newlastname" />
                                                    		</div>
                                                    		<div class="col-md-6">
                                                    		        <label>Email *</label>
                                                    				<input type="email" class="custom-form" name="newemail" />
                                                    		</div>
                                                        	<div class="col-md-12">
                                                        	            <label>Company Name (optional)</label>
                                                        	            <input class="custom-form" type="text" name="newcmyname" />
                                                        	</div>
                                                        	<div class="col-md-12">
                                                        	            <label>Country / Region *</label>
                                                        	            <input class="custom-form" type="text" name="newcountry" />
                                                        	</div>
                                                        	<div class="col-md-12">
                                                        	            <label>Address *</label>
                                                        	            <textarea class="custom-form" type="text" name="newaddress" /></textarea>
                                                        	</div>
                                                        	<div class="col-md-12">
                                                        	            <label>Postcode / ZIP *</label>
                                                        	            <input class="custom-form" type="text" name="newpostcode" />
                                                        	</div>
                                                        	<div class="col-md-12">
                                                        	            <label>Town / City *</label>
                                                        	            <input class="custom-form" type="text" name="newcity" />
                                                        	</div>
                                                        	
                                                        	
                                                        	
                                                </div>
                                            <!--end new ship address-->
                        	 	    <?php } ?>
        					           
                                    	<div class="col-md-12">
                                    	            <label>Order notes (optional)</label>
                                    	            <textarea class="custom-form" type="text" name="ordernote" row="6" /></textarea>
                                    	</div>
                                    	
                                		<div class="col-md-12">
                    						<input type="submit" class="custom-form custom-submit no-margin" value="PLACE ORDER" />
                    					</div>
                    			</form>
							    <?=form_close()?>
        					    </div>
        					   
                            <!--end paypal-->
				<!--</div><!--end title-->
	 	    </div><!--left side-->
	 	    
	 	    
	 	     <div class="col-md-5 ordersummary">
	 	        <div class="col-md-12">
	 	            <h5><center>ORDER SUMMARY</center></h5>
	 	        </div>
	 	             <?php
                    $item = explode(']', $checkout->item);
        
                    for($i=1;$i<count($item);$i++)
                    {
                      $usercheck = explode('#', $item[$i-1]);
                      $nouserip=$this->session->userdata("nouserip");
            $sql=$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN user_checkout ON products.id=$usercheck[0] WHERE nologin_user='$nouserip'")->row();
                    ?>
                    <div class="col-md-12 checkoutproduct">
        	 	            <div class="col-md-4">
        	 	                <img src="./img/product/coverimg/<?=$sql->cover_photo?>">
        	 	            </div>
	 	            
	 	                    <div class="col-md-8">
	 	                        <h5><b><?=$sql->brand_name?></b></h5>
	 	                        <h5><?=$sql->product_name?></h5>
	 	                        <p>Color: <?=$usercheck[3]?></p>
	 	                        <p>Size: <?=$usercheck[4]?></p>
	 	                        <p>Quantity: <?=$usercheck[1]?><br/>
	 	                        <p>Price: £ <?=$sql->pprice?><br/>
	 	                    </div>
	 	            </div>
	 	            <?php } ?>
	 	            <div class="col-md-12 checkoutpaid">
	 	                <table class="table">
									<tbody>
										<tr>
											<td class="text-left">Sub Total</td>
											<td class="text-right">£ <?php echo $checkout->price; ?></td>
										</tr>
										<tr>
											<td class="text-left">Shipping Fee</td>
											<td class="text-right">£ <?php echo $checkout->shipping_fee; ?></td>
										</tr>
										<tr>
											<td class="text-left">Discount off</td>
											<td class="text-right">£ 0.00</td>
										</tr>
										
									</tbody>
									<tfoot>
									    <tr>
										    <td></td>
										    <td></td>
										</tr>
										<tr>
											<td class="text-leftd"><strong>TOTAL </strong></td>
											<td class="text-right custom-td"><strong>£ <?php echo $checkout->total; ?></strong></td>
										</tr>
									</tfoot>
								</table>
	 	            </div>
	 	        
	 	    </div>
	 	</div>
	 </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(function() {
  $("#coupon_question").on("click",function() {
    $(".answer").toggle(this.checked);
  });
});
</script>
