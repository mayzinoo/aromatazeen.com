<style>
    .paymentmethod{
/*text-align:center;*/
}
.paymentmethod .success{
font-size:24px;
text-align:center;
}
.paymentmethod img{
    text-align:center;
    width:200px;
    height:auto;
}
.suc{
    text-align:center;
}
.paymentmethod p{
line-height:12px;
}
.info-txt p{
    font-size:12px;
    word-wrap: break-word;
}
.paymentmethod{
    border-radius:20px;
}
.tx-center{
    text-align:center !important;
}
</style>
<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	 			<h3 class="title-3">ORDER COMPLETE</h3>
	 	</div>
	 	<div class="col-md-12 toppadding_md">
	 	    <div class="col-md-offset-3 col-md-7 paymentmethod">
	 	              <div class="suc"><img src="./img/<?php echo $cmylogo->cmylogo; ?>" /></div>
                    <h1 class="success">Congratulation! Your Orders are successful.</h1>
                    <p class="tx-center" style="color:#0ab960">An email has been sent with details of your order</p>
                <div class="toppadding_md info-txt">
                <div class="row">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <h4 style="color:#0ab960"><b>Payment Information</b></h4>
                        <h5><b>Your Info</b></h5>
                        <p><b>Name : </b> <?php echo $userdata->first_name.' '.$cashorderdata->last_name; ?></p>
                        <p><b>Email : </b> <?php echo $userdata->email; ?></p>
                        <p><b>Phone : </b> <?php echo $userdata->phone; ?></p>
                        <p><b>Address : </b> <?php echo $userdata->address; ?></p>
                        <p><b>City : </b> <?php echo $userdata->city; ?></p>
                        <p><b>Postcode : </b> <?php echo $userdata->postcode; ?></p>
                        
                        <h5 class="toppadding_sm"><b>Your Shipping Info</b></h5>
                        <p><b>Name : </b> <?php echo $cashorderdata->full_name; ?></p>
                        <p><b>Email : </b> <?php echo $cashorderdata->payer_email; ?></p>
                        <p><b>Phone : </b> <?php echo $cashorderdata->phone; ?></p>
                        <p><b>Address : </b> <?php echo $cashorderdata->address1; ?></p>
                        <p><b>City : </b> <?php echo $cashorderdata->city; ?></p>
                        <p><b>Postcode : </b> <?php echo $cashorderdata->postcode; ?></p>
                        <p><b>Order Notes : </b> <?php echo $cashorderdata->ordernote; ?></p>
                        <p><b>Payment Method:</b> 'Cash On Delivery'</p>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12 info-txt product-info">
                        <h4 style="color:#0ab960"><b>Product Information</b></h4>
                         
                        
                            <h5><b>Your Purchased Items</b></h5>
                            <?php
                                $item = explode(']', $cashorderdata->product);
                    
                                for($i=1;$i<count($item);$i++)
                                {
                                  $usercheck = explode('#', $item[$i-1]);
                                  
                                  $userid=$this->session->userdata('id');
                                  $sql =$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN orders ON products.id=$usercheck[0] WHERE orders.user_id=$userid")->row();
                                     ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
                                
                                    
                                        <p><b>Name:</b> <?php echo $sql->product_name; ?></p>
                                        <p><b>Color:</b>  <?php echo $usercheck[3]; ?></p>
                                        <p><b>Size:</b> <?php echo $usercheck[4]; ?> </p>
                                        <p><b>Price:</b> <?php echo $usercheck[2]; ?></p>
                                        <p><b>Quantity:</b> <?php echo $usercheck[1]; ?></p>
                           
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
                                <img src="./img/product/coverimg/<?php echo $sql->cover_photo; ?>" style="width:75px;height:auto;margin-top:40px">  
                            </div>
                         
                    <?php } ?>
                            <h5 class="toppadding_sm"><b>Total Amount : </b><span style="color:#32c4d1"><span style="text-transform:uppercase"><?php echo $cashorderdata->amount.' '.$cashorderdata->paid_amount_currency; ?></span> </span></h5>
                    </div>
                </div>
                
                <!--end update-->
               
                    
                    
                    
        </div>
	 	    </div>
	 	</div>
	</div>
</div>