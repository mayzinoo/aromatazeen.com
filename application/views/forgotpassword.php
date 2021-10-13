<section class="content">
	<div class="container">
		<div class="row padding_lg">
		<?=form_open_multipart('Main/user_resetpassword/')?>
			<div class="col-md-12">			
                    
  				<p><span style="color:#CD232C;font-weight:bold;font-size:16px;">Please enter your email address below and we will send you a link to reset your password. </span></p>
  				<div class="padding_sm">
                <label>Your Email <span style="color:#CD232C;">*</span></label>
                <input type="email" name="email" class="custom-form" required>
                                        
                </div>                
            </div><!--  -->
            <div class="col-md-3">
            	<input type="submit" class="sett-custom-form custom-submit-2" value="Send Link" />
            </div>
        <?=form_close()?> 
        </div>
    </div>
</section>