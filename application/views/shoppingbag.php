<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	        <?php if(!empty($this->session->userdata('id'))){ ?>
	            <h3 class="title-3">My Shopping Bag (<?php echo $userbag->num_rows(); ?>)</h3>
	        <?php }else{ ?>
	            <h3 class="title-3">My Shopping Bag (<?php echo $nouserbag->num_rows(); ?>)</h3>
	        <?php } ?>
	 			
	 		</div>
	 	<?=form_open_multipart('Main/update_shoppingbag/')?>
        <form action="#">
        			<div class="row">
        				<div class="col-md-12">
        					<div class="table-responsive">
        						<table class="table table-bordered">
        							<thead class="cart-table-head">
        								<tr>
        									<td class="text-center" style="width:40%"> Items</td>
        									<td class="text-center"> Price</td>
        									<td class="text-center" style="width:1%"> Quantity</td>
        									<td class="text-center" style="width:10%"> Total Price</td>
        									<td class="text-center"> Remove</td>
        								</tr>
        							</thead>
        							<?php if(!empty($this->session->userdata('id'))){ ?>
        							                <?php
                                                        foreach($userbaglist->result() as $row):
                                                      ?>  
                        							<tbody>
                        							   <input type="hidden" name="userid" value="<?php echo $this->session->userdata("id"); ?>"> 
                        							   <input type="hidden" name="productid[]" value="<?php echo $row->product_id; ?>"> 
                        							   <input type="hidden" name="coverimg[]" value="<?php echo $row->cover_photo; ?>"> 
                        							   <input type="hidden" name="color[]" value="<?php echo $row->color; ?>">
                        							   <input type="hidden" name="size[]" value="<?php echo $row->size; ?>">
                        							   <input type="hidden" name="pname[]" value="<?php echo $row->product_name; ?>"> 
                        								<tr>
                        									<td class="text-left shopping-cart-breif">
                        										<a href="#"><img src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#" class="listimg"/></a>
                        										<h5><a href="#" class="text-uppercase"><?php echo $row->product_name; ?></a></h5>
                        										<p>Color:<?php echo $row->color; ?>
                        										   
                        										</p>
                        										<p>Size: <?php echo $row->size; ?>
                        										</p>
                        									</td>
                        									<td class="text-center">
                        										<div class="custom-cart">
                        										£ <input class="text-btn" name="price[]" placeholder="" value="<?php echo $row->price; ?>">
                        										</div>
                        									</td> 
                        									<td class="text-center">
                												<div class="cart-plus-minuss">
                													<!--<select onchange="onChangeCheckbox()" id="qty">-->
                													    <input class="form-control" name="qty[]" placeholder="" value="1" onkeyup="calculate_discount(event)">
                													<!--</select>-->
                											    </div>
                        									</td>
                        									<td class="text-center">
                        									    <div class="custom-cart">
                        										<input class="total text-btn" name="receive[]" value="<?php echo $row->price; ?>" placeholder="" readonly><?php echo set_value('receive'); ?></input>
                        										</div>
                        									</td>
                        									<td class="text-center remove">
                        										<a href="Main/shoppingitem_delete/<?php echo $row->id; ?>"><i class="pe-7s-close" onclick="return confirm('Are you sure to delete?')" title="Delete"></i></a>
                        									</td>
                        								</tr>
                        							</tbody>
                        							<?php endforeach; ?> 
        							<?php }else{ ?>
        							            <?php
                                                    foreach($nouserbaglist->result() as $row):
                                                  ?>  
                    							<tbody>
                    							    
                    							   <input type="hidden" name="userid" value="<?php echo $this->session->userdata("id"); ?>"> 
                    							   <input type="hidden" name="productid[]" value="<?php echo $row->product_id; ?>"> 
                    							   <input type="hidden" name="coverimg[]" value="<?php echo $row->cover_photo; ?>"> 
                    							   <input type="hidden" name="color[]" value="<?php echo $row->color; ?>">
                        						   <input type="hidden" name="size[]" value="<?php echo $row->size; ?>">
                    							   <input type="hidden" name="pname[]" value="<?php echo $row->product_name; ?>"> 
                    								<tr>
                    									<td class="text-left shopping-cart-breif">
                    										<a href="#"><img src="img/product/coverimg/<?php echo $row->cover_photo; ?>" alt="#" class="listimg"/></a>
                    										<h5><a href="#" class="text-uppercase"><?php echo $row->product_name; ?></a></h5>
                    										<p>Color:<?php echo $row->color; ?>
                    										   
                    										</p>
                    										<p>Size: <?php echo $row->size; ?>
                    										</p>
                    									</td>
                    									<td class="text-center">
                    										<div class="custom-cart">
                    										£ <input class="text-btn" name="price[]" placeholder="" value="<?php echo $row->price; ?>">
                    										</div>
                    									</td> 
                    									<td class="text-center">
            												<div class="cart-plus-minuss">
            													<!--<select onchange="onChangeCheckbox()" id="qty">-->
            													    <input class="form-control" name="qty[]" placeholder="" value="1" onkeyup="calculate_discount(event)">
            													<!--</select>-->
            											    </div>
                    									</td>
                    									<td class="text-center">
                    									    <div class="custom-cart">
                    										<input class="total text-btn" name="receive[]" value="<?php echo $row->price; ?>" placeholder="" readonly><?php echo set_value('receive'); ?></input>
                    										</div>
                    									</td>
                    									<td class="text-center remove">
                    										<a href="Main/shoppingitem_delete/<?php echo $row->id; ?>"><i class="pe-7s-close" onclick="return confirm('Are you sure to delete?')" title="Delete"></i></a>
                    									</td>
                    								</tr>
                    							</tbody>
                    							<?php endforeach; ?> 
        						<?php } ?>
        							 
        						
        						</table>
        					</div>
        				</div>
        			</div>
        			<div class="shipping-discount-details">
        				<div class="row">
        					<div class="col-sm-4 col-sm-12">
        					
        					</div>
        					<div class="col-sm-4 col-sm-12">
        						
        					</div>
        					<div class="col-sm-4 col-sm-12">
        						<label class="shop-custom-form shop-custom-submit active-submit">Payment Details</label>
        						<div class="order">
        							<table class="table">
        								<tbody>
        									<tr>
        										<td class="text-left">Sub Total</td>
        										<td class="text-right">
        										    <input type="text" name="alltotal" id="nettotal" value="" class="text-btn form-control" style="text-align:right !Important;" readonly>
        										</td>
        									</tr>
        									<tr>
        										<td class="text-left">Shipping</td>
        										<td class="text-right">
        										    <input type="text" name="shipfee" id="shipfee" value="<?php echo $shipfee->fee; ?>" class="text-btn form-control" style="text-align:right !Important;" readonly>
        										</td>
        									</tr>
        								</tbody>
        								<tfoot>
        									<tr>
        										<td class="custom-td"><strong>Total = </strong></td>
        										<td class="text-right custom-td" style="width:30%"><strong>
        										    <input type="text" name="finalsum" id="finalsum" value="£ 0" class="text-btn form-control" style="text-align:right !Important;" readonly></input>
        										</strong></td>
        									</tr>
        								</tfoot>
        							</table>
        						</div>
        						<input type="submit" style="width:100%;" class="custom-submit-2" value="Procced To Checkout" />
        					</div>
        				</div>
        			</div>
        </form>
        <?=form_close()?> 
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>

function calculate_discount(event)
{
	var target=$(event.target);
	var parent=target.parent().parent().parent();
	var price=parent.find("input[name='price[]']").val();
	var qty=parent.find("input[name='qty[]']").val();

	parent.find("input[name='receive[]']").val(parseFloat(price)*parseFloat(qty));
	calculateSum();
}
function removerform(event)
{
	var target = $(event.target);
	target.parent().parent().remove();
	calculateSum();
	
}

function calculateSum() {
        var sum = 0;
        var fin=0;
        $(".total").each(function() {

            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });

        $("#nettotal").val(sum);
        var allto=document.getElementById('nettotal').value;
        var shipfee=document.getElementById('shipfee').value;
        
        var fin =Number(allto)+Number(shipfee);
        
        $("#finalsum").val(fin);
    }

</script>