<style>
    .paymentmethod{
text-align:center;
}
.paymentmethod .success{
font-size:24px;
}
.paymentmethod p{
line-height:12px;
}
.info-txt p{
    font-size:12px;
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
	 	       
                    <h1 class="success">Your Order complete! <a href="Main/usercheckout"><b>Choose Payment Method!</b></a></h1>
                    
                <div class="toppadding_sm info-txt">
                    <h4 style="color:#0ab960"><b>Payment Information</b></h4>
                    <p><b>Name : </b> <?php echo $billingdata->full_name; ?></p>
                    <p><b>Email : </b> <?php echo $billingdata->payer_email; ?></p>
                    <p><b>Phone : </b> <?php echo $billingdata->phone; ?></p>
                    <p><b>Address : </b> <?php echo $billingdata->address1; ?></p>
                    <p><b>Order Notes : </b> <?php echo $billingdata->ordernote; ?></p>
                    <p><b>Payment Method:</b> 'Cash On Delivery'</p>
                </div>    
                <div class="toppadding_sm info-txt">
                    <h4 style="color:#0ab960"><b>Product Information</b></h4>
                     <?php
                    $item = explode(']', $billingdata->product);
        
                    for($i=1;$i<count($item);$i++)
                    {
                      $usercheck = explode('#', $item[$i-1]);
                      
                      $userid=$this->session->userdata('id');
                      $sql =$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN user_billingdata ON products.id=$usercheck[0] WHERE user_billingdata.user_id=$userid")->row();
                         ?>
                         
                        <p><b>Name:</b> <?php echo $sql->product_name; ?></p>
                        <p><b>Color:<?php echo $usercheck[3]; ?></b> </p>
                        <p><b>Size:<?php echo $usercheck[4]; ?></b> </p>
                        <p><b>Price:</b> <?php echo $usercheck[2]; ?></p>
                        <p><b>Quantity:</b> <?php echo $usercheck[1]; ?></p>
                    <?php } ?>
                        <p><b>Total Amount:</b><uppercase><?php echo $billingdata->amount.' '.$billingdata->paid_amount_currency; ?></uppercase> </p>
                   
                    
                </div>
                    
                    
                    
        </div>
	 	    </div>
	 	</div>
	</div>
</div>