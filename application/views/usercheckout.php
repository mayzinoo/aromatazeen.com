<style>
    .paypal{
        padding: 16px 79px;
        height: 73px;
        width: 259px;
        text-align: center;
        display: initial;
        line-height: 59px;
        border-radius: 5px;
        /*border: 1px solid #000;*/
        background:#FEC539;
    }
    .paypal img{
        width:90px;
        /*margin-right: 20px;*/
    }
    .cashondeli tr td{
        border:0px !important;
    }
    .notaccess{
        background:#fff;
        padding:100px 20px;
        text-align:center;
    }
</style>
<?php 
    $id=$this->session->userdata("id");
    $sql =$this->db->query("SELECT * from users WHERE id='$id'")->row();
    $billdata =$this->db->query("SELECT * from user_billingdata WHERE user_id='$id' order by id desc Limit 1")->row();
    
    $cashonly =$this->db->query("SELECT status from payment_ways WHERE payment_name='Cash On Delivery'")->row();
    $creditonly =$this->db->query("SELECT status from payment_ways WHERE payment_name='Pay with a Credit/Debit Card'")->row();
    $paypalonly =$this->db->query("SELECT status from payment_ways WHERE payment_name='Pay With Paypal'")->row();
?>
<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	 			<h3 class="title-3">Select A Payment Method</h3>
	 	</div>
	 	
	 	<div class="col-md-12 toppadding_md">
	 	<div class="row">
	 	    <div class="col-md-7 paymentmethod">
	 	        <div class="row">
	 	                    <!--paycredit-->
	 	         <?php if($cashonly->status=='1'){ ?>
	 	                    <div class="checkout-bg">
        	 	                    <div class="row">
                					    <input type="radio" class="paymethod" name="r1" id="e1" checked="checked" onchange="show3()"/>Cash On Delivery
                					</div>
                					<div id="sh3">
                					    <div class="row padding_md">
             				                      
             				                   <?=form_open_multipart('Main/deliverycashout/')?>
                                				<form method="post" action="" id="form1">
                                				<input type="hidden" name="userid" value="<?=$this->session->userdata("id")?>">
                                               <input type="hidden" name="pitem" value="<?=$usercheckout->item?>">
                                               <input type="hidden" name="ptotal" value="<?=$usercheckout->total?>">
                                               <input type="hidden" name="ordernote" value="<?=$billdata->ordernote?>">
                                               <input type="hidden" name="fullname" value="<?=$sql->first_name.''.$sql->last_name?>">
                                               <input type="hidden" name="email" value="<?=$sql->email?>">
                                               <?php if(!empty($billdata)){ ?>
                                                    <input type="hidden" name="address" value="<?=$billdata->address1?>">
                                                    <input type="hidden" name="city" value="<?=$billdata->city?>">
                                                    <input type="hidden" name="phone" value="<?=$billdata->phone?>">
                                                    <input type="hidden" name="postcode" value="<?=$billdata->postcode?>">
                                               <?php }else{ ?>
                                                    <input type="hidden" name="address" value="<?=$sql->address?>">
                                                    <input type="hidden" name="city" value="<?=$sql->city?>">
                                                    <input type="hidden" name="phone" value="<?=$sql->phone?>">
                                                    <input type="hidden" name="postcode" value="<?=$sql->postcode?>">
                                               <?php } ?>
                                               <div class="row">
                                    				<div class="col-md-12 ">
                                    				<div class="notaccess">
                                    				    <p>We are Not accepting payments via cards at the moment.</p>
                                    				</div>
                                    				</div>
                                    			</div>
                                              <div class="row">
                                    				<div class="col-md-12">
                                						<input type="submit" class="custom-form custom-submit no-margin" value="SAVE AND CONTINUE" />
                                					</div>
                            				  </div>
                                					    
                                			    </form>
                                		        <?=form_close()?> 
                					    </div>
                					   
                					    <!--<div class="row padding_sm">-->
                					    <!--    <input type="checkbox" name="shipaddress" class="" value="shipaddress">-->
                					    <!--    <label>Ship to a different address? </label>-->
                					    <!--</div>-->
                					    
                					</div>
                			</div><!--end cod-->
	 	         <?php }else{ ?>
	 	         
	 	         <?php } ?>
	 	             
        	
        	    <?php if($creditonly->status=='1'){ ?>
	 	                    <div class="checkout-bg">
                					<div class="row">
                					    <input type="radio" class="paymethod" name="r1" onchange="show2()"/>Pay with a Credit/Debit Card
                					</div>
                					<div id="sh2" style="display:none;">
                					
                					<form action="" method="POST" id="paymentFrm">
                                           <input type="hidden" name="userid" value="<?=$this->session->userdata("id")?>">
                                           <input type="hidden" name="pitem" value="<?=$usercheckout->item?>">
                                           <input type="hidden" name="ptotal" value="<?=$usercheckout->total?>">
                                        
                    				    <div class="row toppadding_md">
                    					<div class="col-md-12">
                    						<input type="text" class="custom-form" name="cardno" placeholder="card number" />
                    						<div id="card_number" class="field custom-form" tyte="text" name="cardno"></div>
                    					</div>
                    				    </div>
                    				    
                        	 	        <div class="row">
                    					    <div class="col-md-6">
                    					        <input type='date' name="expmonth" id='txtDate' class="custom-form"/>
                    					        <div id="card_expiry" class="field custom-form" typte="text" name="expdate"></div>
                    					    </div>
                    					    
                    					    <div class="col-md-6">
                    					        <div id="card_cvc" class="field custom-form" typte="text" name="securitycode"></div>
                    					    </div>
                        				</div>
                        				<div class="row">
                        					<div class="col-md-12">
                        						<input type="text" class="custom-form" name="fullname" placeholder="Full Name on Credit/Debit Card" autofocus="" />
                        					</div>
                        				</div>
                        				<div class="row">
                        					<div class="col-md-12">
                        						<input type="email" name="email" id="email" class="field custom-form" placeholder="Enter email" >
                        					</div>
                        				</div>
                        				
                        				<div class="row">
                        					<div class="col-md-12">
                        						<input type="text" class="custom-form" name="address1" placeholder="Card Address:line1" />
                        					</div>
                        				</div>
                        				<div class="row">
                        					<div class="col-md-12">
                        						<input type="text" class="custom-form" name="address2" placeholder="Card Address:line2 (optional)" />
                        					</div>
                        				</div>
                        				<div class="row">
                        					<div class="col-md-12">
                        						<input type="text" class="custom-form" name="city" placeholder="town/city" required="" />
                        					</div>
                        				</div>
                        			    <div class="row">
                        					<div class="col-md-12">
                        						<input type="text" class="custom-form" name="creditphone" placeholder="phone" required="" />
                        					</div>
                        				</div>
                        				<div class="row">
                        					<div class="col-md-12">
                        						<input type="text" class="custom-form" name="postcode" placeholder="postcode(optional)" required="" />
                        					</div>
                        				</div>
                        				
                        			
                        				<div class="row">
                            				<div class="col-md-12">
                        						<input type="submit" class="custom-form custom-submit no-margin" id="payBtn" value="SAVE AND CONTINUE" />
                        					</div>
                    					</div>
                    				</form>
                    			
                				    </div><!--pay with credit -->
                				
                			</div><!--end credit -->
	 	         <?php }else{ ?>
	 	         
	 	         <?php } ?>
        			
        			
        		<?php if($paypalonly->status=='1'){ ?>
        	 	          <div class="checkout-bg">
                					<div class="row">
                					     <input type="radio" class="paymethod" name="r1" onchange="show(this.value)"/>Pay With Paypal
                					</div>
                					<div id="sh1" style="display:none;">
                                        <p>You will be redirected to PayPal.com. After confirming your payment with PayPal.com, you will be redirected back to <a href="https://aromatazeen.com" target="_blank"><b>AROMATAZEEN.COM</b></a> to submit your order.</p>
                                        
                                        <div class="row">
                            				<div class="col-md-12">
                            				 
                        						<div class="paypal"><a href="Main/buy/2"><img src="img/paypal.png" style=""></a></div>
                        						<input type="">
                        						<button type="submit" class="btn btn-primary"><img src="img/paypal.png" style="width:100px;"> Checkout </button>
                        					
                        					</div>
                    					</div>
                                    </div>
                                    
                            </div><!--end paypal -->
	 	         <?php }else{ ?>
	 	         
	 	         <?php } ?>		
        		    
                  
				</div><!--end title -->
	 	    </div><!--left side-->
	 	    
	 	    
	 	     <div class="col-md-5 ordersummary">
	 	     <div class="checkoutaddress">
	 	        <div class="col-md-12">
	 	            <h5><center>ORDER SUMMARY</center></h5>
	 	        </div>
	 	             <?php
                    $item = explode(']', $usercheckout->item);
        
                    for($i=1;$i<count($item);$i++)
                    {
                      $usercheck = explode('#', $item[$i-1]);
                      
                      $userid=$this->session->userdata('id');
                   
                      $nouserip=$this->session->userdata("nouserip");
                      $sql =$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN user_checkout ON products.id=$usercheck[0] WHERE user_checkout.user_id='$userid' OR user_checkout.nologin_user='$nouserip'")->row();
                    
                         ?>
                    <div class="col-md-12 checkoutproduct">
        	 	            <div class="col-md-4">
        	 	                <img src="./img/product/coverimg/<?=$sql->cover_photo?>">
        	 	            </div>
	 	            
	 	                    <div class="col-md-8">
	 	                        <h5><b><?=$sql->brand_name?></b></h5>
	 	                        <h5><?=$sql->product_name?></h5>
	 	                        <p>Color: <?=$usercheck[3]?><br/>
	 	                        <p>Size: <?=$usercheck[4]?><br/>
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
											<td class="text-right">£ <?php echo $usercheckout->price; ?></td>
										</tr>
										<tr>
											<td class="text-left">Shipping Fee</td>
											<td class="text-right">£ <?php echo $usercheckout->shipping_fee; ?></td>
										</tr>
									
										
									</tbody>
									<tfoot>
									    <tr>
										    <td></td>
										    <td></td>
										</tr>
										<tr>
											<td class="text-leftd"><strong>TOTAL </strong></td>
											<td class="text-right custom-td"><strong>£ <?php echo $usercheckout->total; ?></strong></td>
										</tr>
									</tfoot>
								</table>
	 	            </div>
	 	           <div class="col-md-12 billingdata">
	 	                <h5><b><u>Billing Address</u></b></h5>
	 	                <p>
	 	                    <?php echo $userdata->address; ?><br/>
	 	                    <?php echo $userdata->city; ?><br/>
	 	                    <?php echo $userdata->phone; ?>
	 	                </p>
	 	           </div>
	 	           <div class="col-md-12 shippingdata">
	 	                <h5><b><u>Delivery Address</u></b></h5>
	 	                <?php if(!empty($billdata)){ ?>
	 	                <p>
	 	                    <?php echo $billdata->address1; ?><br/>
	 	                    <?php echo $billdata->city; ?><br/>
	 	                    <?php echo $billdata->phone; ?>
	 	                </p>
	 	                <?php }else{ ?>
	 	                   <p> <?php echo $userdata->address; ?><br/>
	 	                    <?php echo $userdata->city; ?><br/>
	 	                    <?php echo $userdata->phone; ?></p>
	 	                <?php } ?>
	 	           </div>
	 	    </div>
	 	    </div>
	 	</div>
	 	</div>
	 </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
   function show(str){
                document.getElementById('sh1').style.display = 'block';
                document.getElementById('sh2').style.display = 'none';
                document.getElementById('sh3').style.display = 'none';
            }
            function show2(sign){
                document.getElementById('sh2').style.display = 'block';
                document.getElementById('sh1').style.display = 'none';
                 document.getElementById('sh3').style.display = 'none';
            }
            function show3(str){
                document.getElementById('sh3').style.display = 'block';
                document.getElementById('sh1').style.display = 'none';
                document.getElementById('sh2').style.display = 'none';
            }

</script>

<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
}
</script>
