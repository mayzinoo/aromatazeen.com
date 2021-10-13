
	<section class="content">
			<!-- LOGIN-AREA START -->
			<div class="lognin-area">
				<div class="container">
					<div class="row">
						<!-- Registered-Customers Start -->
						<div class="col-md-6">
						<?=form_open('Main/userlogin/')?> 
							<form action="#">
								<div class="registered-customers margin-65">
									<h2 class="title-3">SIGN IN TO MY ACCOUNT</h2>
									<div class="registered">
										<p>If you have an account with us, Please log in.</p>
										<div class="row">
											<div class="col-md-12">
												<input type="text" class="custom-form" name="email" placeholder="Email Address" />
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<input type="password" name="password" class="custom-form" placeholder="Password" />
											</div>
										</div>
										<p><label class="forgot"><a href="Main/forgotpassword">Forgot our password?</a></label></p>
										<div class="row">
											<div class="col-sm-12">
												<input type="submit" class="custom-form custom-submit-2" value="login" />
											</div>
										</div>
									</div>
								</div>
							</form>
							<?=form_close()?>
						</div>
						<!-- Registered-Customers End -->
						<div class="col-md-6">
						<?=form_open('Main/insert_user/')?> 
							<form action="#">
								<div class="new-customers margin-65">
									<h2 class="title-3">Create An Account</h2>
									<div class="row">
									 	<div class="col-md-12 bottompadding_md">
									 		<p>Creating an account enables you to:</p>
										<ul class="list-u">
											<li>Check out faster</li>
											<li>Keep track of your orders</li>
											<li>Add favorite items to your wish list</li>
										</ul>
									 	</div>
										<div class="col-sm-6">
											<input type="text" class="custom-form" name="firstname" placeholder="First Name *" required/>
										</div>
										<div class="col-sm-6">
											<input type="text" class="custom-form" name="lastname" placeholder="Last Name *" required/>
										</div>
										</div>										
									</div>					
									<div class="row">
									    <div class="col-sm-6">
											<input class="custom-form" type="text" placeholder="Company Name" name="cmyname" />
										</div>
										<div class="col-sm-6">
											<input class="custom-form" type="text" placeholder="Country/ Region *" name="country" required/>
										</div>
									
									</div>
								    
									<div class="row">
										<div class="col-sm-12">
											<textarea class="custom-form" type="text" placeholder="Address *" name="address" required/></textarea>
										</div>
									</div>
									<div class="row">
									    <div class="col-sm-6">
											<input class="custom-form" type="text" placeholder="Town/City *" name="city" required/>
										</div>
										<div class="col-sm-6">
											<input class="custom-form" type="text" placeholder="State/Country *" name="state" required/>
										</div>
									</div>
									<div class="row">
									    <div class="col-sm-6">
										    <input class="custom-form" type="text" placeholder="Postcode/Zip *" name="postcode" required/>
										</div>
										<div class="col-sm-6">
											<input class="custom-form" type="text" placeholder="Phone *" name="phone" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<input class="custom-form" type="email" placeholder="Email *" name="email" required/>
										</div>
									</div>
									<div class="row">
									    <div class="col-sm-6">
										    <input class="custom-form" name="password" type="password" placeholder="Password *" required/>
										</div>
										<div class="col-sm-6">
											<input class="custom-form" name="password" type="password" placeholder="Confirm Password *" required/>
										</div>
									</div>
								
									<div class="row">
										<div class="col-sm-12">
											<input type="submit" class="custom-form custom-submit no-margin" value="register" />
										</div>
										
									</div>
								</div>
							</form>
							<?=form_close()?>
						</div>
					</div>
				</div>
			</div>
	</section>
