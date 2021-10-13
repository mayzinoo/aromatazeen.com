<section class="content">
	<div class="container toppadding_lg">
		
		<div class="row acct-sett-title">
			<div class="col-md-3 ">
			<h3 class="sett-title">My Account</h3>
			</div>
			<div class="col-md-9">
			<h3 class="detail-title">Shipping Address</h3>
			</div>			
		</div>
		<div class="row toppadding_md">
			<div class="col-md-3">
				<h5><b>Account Details</b></h5>
					<ul class="acct-detail">
						<li><a href="Main/user_shipaddress">Shipping Address</a></li>
						<li><a href="Main/orderhistory">Order History</a></li>
						<li><a href="Main/mywishlist">Wish List</a></li>
						<li><a href="Main/Myshoppingbag">Items on Hold</a></li>
					
					</ul>
			</div><!--  -->
		
			<div class="col-md-7">
				
				<?=form_open('Main/update_usershipdata/')?> 
				<form action="#">
    				<input type="hidden" name="id" value="<?=$shipdata->id?>">
    				    <?php echo form_error('email'); ?>
    				    <div class="row">
    				        <div class="col-md-12">
    				            <label>Full Name</label>
    				            <input type="text" class="sett-custom-form" name="fullname" value="<?=$shipdata->full_name?>" placeholder="Full Name"/>
    				        </div>
    				    </div>
    				    <div class="row">
    				        <div class="col-md-6">
    				            <label>Email</label>
    				            <input type="email" class="sett-custom-form" name="email" value="<?=$shipdata->payer_email?>"/>
    				        </div>
    				        <div class="col-md-6">
    				            <label>Phone</label>
    				            <input type="text" class="sett-custom-form" name="phone" value="<?=$shipdata->phone?>" placeholder="Phone Number"/>
    				        </div>
    				    </div>
    					
    				    <div class="row">
    				        <div class="col-md-6">
    				            <label>Town/City</label>
    				            <input type="text" class="sett-custom-form" name="city" value="<?=$shipdata->city?>" placeholder="Town/City"/>
    				        </div>
    				        <div class="col-md-6">
    				            <label>Country/Region</label>
    				            <input type="text" class="sett-custom-form" name="country" value="<?=$shipdata->country?>" placeholder="Country/Region" />
    				        </div>
    				    </div>
    				    <div class="row">
        				    <div class="col-md-12">
        				        <label>Address</label>
        				        <textarea class="sett-custom-form" name="address" placeholder="Address"/><?=$shipdata->address1?></textarea>
        				    </div>
    				    </div>
					   
    				    <div class="row">
    				        <div class="col-md-12">
    				            <label>Postcode</label>
    				            <input type="text" class="sett-custom-form" name="postcode" value="<?=$shipdata->postcode?>" placeholder="Postcode"/>
    				        </div>
    				    </div>

					<input type="submit" class="custom-form custom-submit no-margin" value="Save Changes" />
				</form>
				<?=form_close()?>
			</div><!--  -->
		</div>
	</div>
</section>