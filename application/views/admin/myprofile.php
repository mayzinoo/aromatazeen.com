<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Admin Profile</h5>
        </div>
        <div class="card tab2-card">
        <div class="card-body">
        	<ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Profile</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="info-top-tab" data-bs-toggle="tab" href="#top-admindata" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="info" class="me-2"></i>Information</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="settings" class="me-2"></i>Change Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                        <h5 class="f-w-600">Profile</h5>
                                        <div class="table-responsive profile-table">
                                            <table class="table table-borderless">
                                                <tbody>
                                                <tr>
                                                    <td>Company Name:</td>
                                                    <td><?php echo $admindata->cmyname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>First Name:</td>
                                                    <td><?php echo $admindata->first_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Last Name:</td>
                                                    <td><?php echo $admindata->last_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email:</td>
                                                    <td><?php echo $admindata->email; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Mobile Number:</td>
                                                    <td><?php echo $admindata->phone; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>Address:</td>
                                                    <td><?php echo $admindata->address; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                   <!--first tab-->
                                    <div class="tab-pane fade show" id="top-admindata" role="tabpanel" aria-labelledby="info-top-tab">
                                    <?=form_open_multipart('Admin/change_data/')?>
			                         <form class="form-horizontal auth-form">
			                             <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>Company Name</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                            <input name="cmyname" type="text" class="form-control" value="<?php echo $admindata->cmyname; ?>">
			                                        	</div>
			                                    	</div>
			                                    </div>
                                            <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>First Name</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                            <input name="firstname" type="text" class="form-control" value="<?php echo $admindata->first_name; ?>">
			                                        	</div>
			                                    	</div>
			                                    </div>    
		                                        <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>Last Name</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                            <input name="lastname" type="text" class="form-control" value="<?php echo $admindata->last_name; ?>">
			                                        	</div>
			                                    	</div>
			                                    </div> 
			                                    <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>Email</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                            <input name="email" type="email" class="form-control" value="<?php echo $admindata->email; ?>">
			                                        	</div>
			                                    	</div>
			                                    </div>   
                                       
			                                    <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>Mobile Number</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                            <input name="phone" type="text" class="form-control" value="<?php echo $admindata->phone; ?>">
			                                        	</div>
			                                    	</div>
			                                    </div>
                                               
			                                    <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>Address</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                            <input name="location" type="text" class="form-control" value="<?php echo $admindata->address; ?>">
			                                        	</div>
			                                    	</div>
			                                    </div>
			                                     <div class="row">
			                                    	<div class="col-md-2">
			                                    		<div class="form-group">	
			                                    			<label>Company Logo</label>
			                                    		</div>
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-group">	            	
			                                                <?php if(!empty($admindata->cmylogo)){ ?>
                                                                <img src="./img/product/logo/<?php echo $admindata->cmylogo; ?>" style="width:150px;height:auto;">
                                                                <input type="hidden" name="cmylogo" value="<?php echo $admindata->cmylogo; ?>">
                                                                <input class="form-control" name="cmylogo" type="file">
                                                            <?php }else{ ?>
                                                                <input class="form-control" name="cmylogo" type="file">
                                                            <?php } ?>
			                                        	</div>
			                                    	</div>
			                                    </div>
			                                    <div class="row">
			                                    	<div class="col-md-2">
			                                    		
			                                    	</div>
			                                    	<div class="col-md-5">
			                                    		<div class="form-button">
				                                            <button class="btn btn-primary" type="submit">Update Info</button>
				                                        </div>
			                                    	</div>
			                                    </div>
			                            </form>
			                            <?=form_close()?>
                                    </div>
                                    <!--end second tab-->
                                   
                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                        <div class="account-setting">
                                            <h5 class="f-w-600">Change Setting</h5>
                                            <div class="row">                                                
                                                <?=form_open_multipart('Admin/change_password/')?>
			                                    <form class="form-horizontal auth-form">
			                                    
        			                                    <div class="row">
        			                                    	<div class="col-md-2">
        			                                    		<div class="form-group">	
        			                                    			<label>Password</label>
        			                                    		</div>
        			                                    	</div>
        			                                    	<div class="col-md-5">
        			                                    		<div class="form-group">	            	
        			                                            <input name="password" type="password" class="form-control" value="<?php echo $admindata->password; ?>">
        			                                        	</div>
        			                                    	</div>
        			                                    </div>  
        		                                        
        			                                    <div class="row">
        			                                    	<div class="col-md-2">
        			                                    		
        			                                    	</div>
        			                                    	<div class="col-md-5">
        			                                    		<div class="form-button">
        				                                            <button class="btn btn-primary" type="submit">Update Password</button>
        				                                        </div>
        			                                    	</div>
        			                                    </div>
			                                    </form>
			                                    <?=form_close()?>
                                            </div><!-- end row -->
                                        </div>
                                       
                                    </div>
                                    <!--end third tab-->
                                </div>
            </div>
        </div>
    </div>
</div>