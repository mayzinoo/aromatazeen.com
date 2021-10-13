<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 padding_lg act-sett">
				<h3>WELCOME, <b><?php echo $userdata->email; ?></b> <span style="color:#337ab7; font-weight:bold">NOT  <?php echo $userdata->email; ?> ?</span> <a href="Main/logout">Signout</a></h3>
				<p>Please check your details if any changes, please correct and continue after.</p>
				<a href="Main/Myshoppingbag" class="custom-submit continue-chkout">Continue with Checkout</a>
			</div>
		</div>
		<div class="row acct-sett-title">
			<div class="col-md-3 ">
			<h3 class="sett-title">My Account</h3>
			</div>
			<div class="col-md-9">
			<h3 class="detail-title">Account Details</h3>
			</div>			
		</div>
		<div class="row toppadding_md">
			<div class="col-md-3 ">
				<h5><b>Account Details</b></h5>
					<ul class="acct-detail">
						<li><a href="Main/user_shipaddress">Shipping Address</a></li>
						<li><a href="Main/orderhistory">Order History</a></li>
						<li><a href="Main/mywishlist">Wish List</a></li>
						<li><a href="Main/Myshoppingbag">Items on Hold</a></li>
					
					</ul>
			</div><!--  -->
			<div class="col-md-4 ">
					<h5><b>PASSWORD</b></h5>
					<?=form_open('Main/update_password/')?> 
						<form action="#">
						<input type="hidden" name="id" id="id" value="<?=$userdata->id?>">
								<input type="password" class="sett-custom-form" name="currentpwd" value="<?php echo $userdata->password; ?>" readonly/>
								<input type="password" class="sett-custom-form" name="newpwd" placeholder="Create New Password" required/>
								<input type="password" class="sett-custom-form" name="newpwd" placeholder="Confirm New Password" required/>

								<input type="submit" class="custom-form custom-submit no-margin" value="Save Changes" />
						</form>
						<?=form_close()?>
			</div><!--  -->
			<div class="col-md-5 ">
				

				<h5><b>Update Your Data</b></h5>
				<?=form_open('Main/update_userdata/')?> 
				<form action="#">
    				<input type="hidden" name="id" id="id" value="<?=$userdata->id?>">
    				    <?php echo form_error('email'); ?>
    				    <div class="row">
    				        <div class="col-md-6">
    				            <label>Email</label>
    				            <input type="email" class="sett-custom-form" name="email" value="<?=$userdata->email?>"/>
    				        </div>
    				        <div class="col-md-6">
    				            <label>Phone</label>
    				            <input type="text" class="sett-custom-form" name="phone" value="<?=$userdata->phone?>" placeholder="Phone Number"/>
    				        </div>
    				    </div>
    					<div class="row">
    				        <div class="col-md-6">
    				            <label>First Name</label>
    				            <input type="text" class="sett-custom-form" name="firstname" value="<?=$userdata->first_name?>" placeholder="FirstName"/>
    				        </div>
    				        <div class="col-md-6">
    				            <label>Last Name</label>
    				            <input type="text" class="sett-custom-form" name="lastname" value="<?=$userdata->last_name?>" placeholder="LastName"/>
    				        </div>
    				    </div>
    				    <div class="row">
    				        <div class="col-md-6">
    				            <label>Company Name</label>
    				            <input type="text" class="sett-custom-form" name="cmyname" value="<?=$userdata->cmyname?>" placeholder="Company Name"/>
    				        </div>
    				        <div class="col-md-6">
    				            <label>Country/Region</label>
    				            <input type="text" class="sett-custom-form" name="country" value="<?=$userdata->country?>" placeholder="Country/Region" />
    				        </div>
    				    </div>
    				    <div class="row">
        				    <div class="col-md-12">
        				        <label>Address</label>
        				        <textarea class="sett-custom-form" name="address" placeholder="Address"/><?=$userdata->address?></textarea>
        				    </div>
    				    </div>
					    <div class="row">
    				        <div class="col-md-6">
    				            <label>Town/City</label>
    				            <input type="text" class="sett-custom-form" name="city" value="<?=$userdata->city?>" placeholder="Town/City"/>
    				        </div>
    				        <div class="col-md-6">
    				            <label>State/Country</label>
    				            <input type="text" class="sett-custom-form" name="state" value="<?=$userdata->state?>" placeholder="State/Country" />
    				        </div>
    				    </div>
    				    <div class="row">
    				        <div class="col-md-12">
    				            <label>Postcode</label>
    				            <input type="text" class="sett-custom-form" name="postcode" value="<?=$userdata->postcode?>" placeholder="Postcode"/>
    				        </div>
    				    </div>

					<input type="submit" class="custom-form custom-submit no-margin" value="Save Changes" />
				</form>
				<?=form_close()?>
			</div><!--  -->
		</div>
	</div>
</section>