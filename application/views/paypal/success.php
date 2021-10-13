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
    width:70px;
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
</style>
<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	 			<h3 class="title-3">ORDER COMPLETE</h3>
	 	</div>
	 	<div class="col-md-12 toppadding_md">
	 	    <div class="col-md-offset-3 col-md-7 paymentmethod">
	 	            <div class="suc"><img src="./img/success.png" /></div>
                    <h1 class="success">Congratulation! Your Orders are successful.</h1>
                    
                <div class="toppadding_sm info-txt">
                <div class="row">
                    <h4 style="color:#0ab960"><b>Payment Information</b></h4>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h5><b>Your Shipping Info</b></h5>
                        <p><b>Name : </b> <?php echo $userdata->first_name.' '.$userdata->last_name; ?></p>
                        <p><b>Email : </b> <?php echo $userdata->email; ?></p>
                        <p><b>Phone : </b> <?php echo $userdata->phone; ?></p>
                        <p><b>Address : </b> <?php echo $userdata->address; ?></p>
                        <p><b>City : </b> <?php echo $userdata->city; ?></p>
                        <p><b>Postcode : </b> <?php echo $userdata->postcode; ?></p>
                        <p><b>Payment Method:</b> 'Paypal'</p>
                    
                        
                       
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <h5><b>Your Info</b></h5>
                        <p><b>Name : </b> <?php echo $userdata->first_name.' '.$userdata->last_name; ?></p>
                        <p><b>Email : </b> <?php echo $userdata->email; ?></p>
                        <p><b>Phone : </b> <?php echo $userdata->phone; ?></p>
                        <p><b>Address : </b> <?php echo $userdata->address; ?></p>
                        <p><b>City : </b> <?php echo $userdata->city; ?></p>
                        <p><b>Postcode : </b> <?php echo $userdata->postcode; ?></p>
                    </div>
                </div>     
                </div>    
                <div class="toppadding_sm info-txt">
                <h4 style="color:#0ab960"><b>Product Information</b></h4>
                     <?php
                            $item = explode(']', $cashorderdata->product);
                
                            for($i=1;$i<count($item);$i++)
                            {
                              $usercheck = explode('#', $item[$i-1]);
                              
                              $userid=$this->session->userdata('id');
                              $sql =$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN orders ON products.id=$usercheck[0] WHERE orders.user_id=$userid")->row();
                                 ?>
                    <div class="row">
                        
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <h5><b>Your Purchased Items</b></h5>
                                
                                    <p><b>Name:</b> <?php echo $sql->product_name; ?></p>
                                    <p><b>Color:</b> <?php echo $usercheck[3]; ?> </p>
                                    <p><b>Size:</b> <?php echo $usercheck[4]; ?> </p>
                                    <p><b>Price:</b> <?php echo $usercheck[2]; ?></p>
                                    <p><b>Quantity:</b> <?php echo $usercheck[1]; ?></p>
                       
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <img src="./img/product/coverimg/<?php echo $sql->cover_photo; ?>" style="width:75px;height:auto;margin-top:40px">  
                        </div>
                     </div>
                <?php } ?>
                         <h5><b>Total Amount : </b><span style="color:#32c4d1"><span style="text-transform:uppercase"><?php echo $cashorderdata->amount.' '.$cashorderdata->paid_amount_currency; ?></span> </span></h5>
                      
                </div>
                    
                    
                    
        </div>
	 	    </div>
	 	</div>
	</div>
</div>