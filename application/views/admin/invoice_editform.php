<div class="row">
    <div class="col-md-12">
        <!--<h5><b>Edit Order Detail</b></h5>-->
    <div class="invoice-box">
        <div class="ordernum"><p><b>Invoice No : #<?php echo $this->uri->segment(3); ?></b></p> </div>
        <div class="row invoice">
                    <div class="col-md-6 orderdata">
                    <h5><b>Order Data</b></h5>
                        <?=form_open_multipart('Admin/update_orderdata/')?>
                        <input type="hidden" name="orderid" value="<?php echo $this->uri->segment(3); ?>">
                            <form method='post' enctype='multipart/form-data'>
                                            <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Client's Name :</label>
                                                    <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                        <div class="input-group">
                                                            <input type="text" name="name" class="form-control" value="<?php echo $orderdata->full_name; ?>">
                                                        </div>
                                                    </fieldset>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0"c>Email :</label>
                                                    <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                        <div class="input-group">
                                                            <input type="email" name="email" class="form-control" value="<?php echo $orderdata->payer_email; ?>">
                                                        </div>
                                                    </fieldset>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Payment Method :</label>
                                                    <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                        <div class="input-group">
                                                            <input type="text" name="paymethod" class="form-control" value="<?php echo $orderdata->payment_method; ?>">
                                                        </div>
                                                    </fieldset>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Order Date :</label>
                                                    <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                        <div class="input-group">
                                                            <input type="text" name="orderdate" class="form-control" value="<?php echo $orderdata->order_date; ?>">
                                                        </div>
                                                    </fieldset>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Order Note :</label>
                                                    <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                        <div class="input-group">
                                                            <textarea name="ordernote" class="form-control">
                                                                <?php echo $orderdata->ordernote; ?>
                                                            </textarea>
                                                        </div>
                                                    </fieldset>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <div class="offset-xl-3 offset-sm-4">
                                                         <button type="submit" class="btn btn-primary">Update</button>
                                                    
                                                </div>
                                            </div>
                             </form>
                              <?=form_close()?>
                    </div><!--end order data-->
                    <div class="col-md-6 shipinfo">
                        <h5><b>Delivery Info</b></h5>
                        <?=form_open_multipart('Admin/update_deliveryinfo/')?>
                        <input type="hidden" name="orderid" value="<?php echo $this->uri->segment(3); ?>">
                                <form method='post' enctype=''>
                                                <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Full Name :</label>
                                                        <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input type="text" name="deliname" class="form-control" value="<?php echo $orderdata->full_name; ?>">
                                                            </div>
                                                        </fieldset>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Address :</label>
                                                        <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input type="text" name="deliaddress" class="form-control" value="<?php echo $orderdata->address1; ?>">
                                                            </div>
                                                        </fieldset>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">City :</label>
                                                        <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input type="text" name="delicity" class="form-control" value="<?php echo $orderdata->city; ?>">
                                                            </div>
                                                        </fieldset>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-xl-3 col-sm-4 mb-0">Phone Number :</label>
                                                        <fieldset class="col-xl-9 col-xl-8 col-sm-7">
                                                            <div class="input-group">
                                                                <input type="text" name="deliphone" class="form-control" value="<?php echo $orderdata->phone; ?>">
                                                            </div>
                                                        </fieldset>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <div class="offset-xl-3 offset-sm-4">
                                                             <button type="submit" class="btn btn-primary">Update</button>
                                                        
                                                    </div>
                                                </div>
                                 </form>
                                  <?=form_close()?>    
                    </div><!--end shipping data-->
                    <div class="col-md-12 toppadding_md ">
                        <div class="row bottompadding_md">
                            <div class="col-md-3">
                            <h5><b>Product Information</b></h5>
                            </div>
                            <div class="col-md-9">
                                <h4 class="right" style="float:right;margin-top: -10px;" >
                                    <span class="text-right btn btn-warning" onclick="showHtmlDiv()"> Add New</span>
                                </h4>
                            </div>
                        </div>
                    <div id="html-show">
                        <?php $id=$this->uri->segment(3); ?>
                        <?=form_open_multipart('Admin/invoice_editform/'.$id)?>
                            <div class="row">
                                <div class="col-md-4">
                                    <?=form_dropdown("pname",$ppname,"","class='form-control' id='pselect'")?>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary right">Choose</button>
                                </div>
                        
                            </div> 
                        <?=form_close()?> 
                        <?php if(empty($this->session->userdata("pid"))){ ?>
                            
                        <?php }else{ ?>
                            <?=form_open_multipart('Admin/add_orderproducts/'.$id)?>
                                <input type="hidden" name="orderid" value="<?=$this->uri->segment(3)?>">
                                <input type="hidden" name="product[]" value="<?=$orderdata->product?>">
                                <input type="hidden" name="total" value="<?=$orderdata->amount?>">
                                 <input type="hidden" name="pid[]" value="<?=$productdetail->id?>">
                                 <input type="hidden" name="newqty[]" value="1">
                                 <input type="hidden" name="newprice[]" value="<?=$productdetail->price?>">
                                 <input type="hidden" name="pprice" value="<?=$productdetail->price?>">
                                <div class="row toppadding_md bottompadding_md">
                                    <div class="col-md-3">
                                        <img src="img/product/coverimg/<?php echo $productdetail->cover_photo ; ?>" alt="" class="simpleLens-big-image"/ style="width:150px;height:auto">
                                    </div><!--photo-->
                                    <div class="col-md-9">
                                        <h4 class="product-name">
                    						<b><?php echo $productdetail->brand_name ; ?></b>
                    					</h4><!--brand name-->
                    					<h4 class="product-name">
                    						<?php echo $productdetail->product_name ; ?>
                    					</h4><!--product name-->
                    				    <div class="price-box">										
    										<span class="new-price">£ <?php echo $productdetail->price ; ?></span>
    									</div>
                    					<div class="size padding_sm">
    										<span class="choose-title"><span><b>Size : <input type="text" id="demo" class="noborder"></b></span><br/>
    										<!--<input type="text" value="<script>document.getElementById('demo').value</script>">-->
    										<?php 
                					            $size = explode(']', $productdetail->available_size);
                
                					            for($i=1;$i<count($size);$i++)
                					            {
                					              $item = explode(']', $size[$i-1]);
                					                ?> 
                									<input type="radio" class="myRadio" id="type<?php echo $i; ?>" name="size[]" value="<?php echo $item[0]; ?>" required>
                									<label><?php echo $item[0]; ?></label>
                								<?php } ?>
    										</span>
    									
    									</div><!--size-->
    									<div class="color-choose padding_sm">
    										<span class="choose-title"><b>Color : <input type="text" id="colordemo" class="noborder"></b><br/>
    										<?php 
                					            $color = explode(']', $productdetail->color);
                
                					            for($i=1;$i<count($color);$i++)
                					            {
                					              $item = explode(']', $color[$i-1]);
                					                ?> 
                									<input type="radio" class="mycolorRadio" id="type<?php echo $i; ?>" name="color[]" value="<?php echo $item[0]; ?>" required>
                									<label><?php echo $item[0]; ?></label>
                
                								<?php } ?>
    										</span>
    											
    									 </div><!--color-->
    									 <!--<span class="choose-title"><span>-->
    									 <!--    <b>Quantity : <input type="text" name="newqty[]" value="1" onkeyup="newcalculate_price(event)"> </b>-->
    									 <!--    <b>Price : £ <input type="text" name="newprice[]" value="" ></b>-->
    									 <!--    <b>Total : <input type="text" name="newreceive[]" > </b>-->
    									 <!--</span><br/>-->
    									 <button type="submit" class="btn btn-success"><i class="pe-7s-cart"></i> Add</button>
                                    </div><!--col md 7-->
                                </div>
                                <?=form_close()?>  
                        <?php } ?>
                        
                                 
                    </div><!--end new product-->
                        
                        
                        <div id="basicScenario" class="toppadding_md product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
		                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
		                <?=form_open_multipart('Admin/add_allorderproducts/'.$id)?>  
		                <form class="needs-validation add-product-form" novalidate="">
		                <input type="hidden" name="orderid" value="<?=$this->uri->segment(3)?>">
                        <table class="jsgrid-table">
                           <tr class="jsgrid-header-row">
                                <tr style="border:1px solid #000;text-align:center">
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">#</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Product Name</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Photo</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Color</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Size</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Quantity</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Price(£)</th>
                                    <th class="jsgrid-header-cell jsgrid-header-sortable">Action</th>
                                </tr>
                           </tr>
        		            <tbody>
            		          <?php $item = explode(']', $orderdata->product);
                               
                                for($i=1;$i<count($item);$i++)
                                {
                                 
                                  $usercheck = explode('#', $item[$i-1]);
                                  $sql =$this->db->query("SELECT * FROM products WHERE id=$usercheck[0]")->row();
                                  ?>
                               
                                <tr class="jsgrid-row plist" id="master">
                                    <input type="hidden" name="ppid[]" value="<?=$usercheck[0]?>">
                                        <td class="jsgrid-cell no"><?php echo $i; ?></td>
                                        <td class="jsgrid-cell">
                                             <?=$sql->product_name?>
                                        </td>
                                          <td class="jsgrid-cell">
                                              <img src="https://aromatazeen.com/img/product/coverimg/<?=$sql->cover_photo?>" style="width:100px;height:auto;float: left;margin: 0 20px 0 30px;">
                                          </td>
                                          <td class="jsgrid-cell">
                                              
                                              <input list="pcolor" name="pcolor[]" id="pcolor[]" class="form-control tx-center" value="<?=$usercheck[3]?>">
        						                <datalist id="pcolor">
        						                    <?php
        						                        foreach($pcolor as $row)
        						                    {
        						                      echo '
        						                      <option value="'.$row->product_color.'">'.$row->product_color.'</option>
        						                      ';
        						                    }
        						                    ?>
        						                </datalist>
                                          </td>
                                          <td class="jsgrid-cell">
                                              
                                              <input type="text" name="size[]" class="form-control tx-center" value="<?=$usercheck[4]?>">
                                          </td>
                                          <td class="jsgrid-cell">
                                              <input type="hidden" name="pprice[]" id="pric" class="form-control Price tx-right" value="<?=$sql->price?>">
                                                <input type="text" name="pqty[]" id="pqty" class="form-control tx-center formbg-color" value="<?=$usercheck[1]?>" required>
                                          </td>
                                          <td class="jsgrid-cell">
                                              <input class="total form-control tx-right" id="nettotal" name="receive[]" value="<?=number_format($usercheck[2],'2')?>" placeholder="" readonly><?php echo set_value('receive'); ?>
                                              </input>
                                          </td>
                                          <td class="jsgrid-cell tx-center">
                                             
                                                  <input class="jsgrid-button jsgrid-delete-button" type="button" onclick="removerform(event)" title="Delete">
                                           
                                          </td>
                                          
                                </tr>    
                               
                                <?php 
                               
                                } ?>
                                    
                                <tr class="jsgrid-row plist">
                                    <td class="jsgrid-cell bg-grey jsgrid-header-sortable" colspan="6"><strong>Shipping Fee </strong></td>
                                    <td class="jsgrid-cell tx-right"><strong>
                                        <input type="text" name="shipfee" id="shipfee" class="form-control tx-right" value="<?php echo number_format($shippingfee->fee,'2'); ?>" readonly>
                                        
                                    </strong></td>
                                    <td class="jsgrid-cell tx-center"></td>
                                </tr>
                                <tr class="jsgrid-row plist">
                                    <td class="jsgrid-cell bg-grey jsgrid-header-sortable" colspan="6"><strong>Total </strong></td>
                                    <td class="jsgrid-cell tx-right">
                                        <strong>
                                            <input type="text" name="finalsum" id="finalsum" class="form-control tx-right" value="<?php echo $orderdata->amount; ?>" readonly>
                                        </strong>
                                    </td>
                                    <td class="jsgrid-cell tx-center"> </td>
                                </tr>     
        		            </tbody>
        		            
        		        </table>
        		        
        		          
        		        </div>
        		        <div style="float:right;padding-top:10px;padding-bottom:10px">
        		            <button type="submit" class="btn btn-success">Update</button>
        		        </div>
        		        </form>
        		        <?=form_close()?> 
        		        </div>
                    </div>
              </div><!--end invoice-->
              
    </div>
    </div><!--invoice box-->
   
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
         window.onkeyup=function() {
                    var price = document.getElementsByName("pprice[]");
                    var qty = document.getElementsByName("pqty[]");
                    var receive = document.getElementsByName("receive[]");
                    
                    var total = Array.prototype.reduce.call(price, function(total, price,index) {
                    var tt = parseFloat(price.value) * parseFloat(qty[index].value);
                    
                    receive[index].value = isNaN(tt) ? "0.00" : tt.toFixed(2);
                    
                    return isNaN(tt) ? total : total + tt;
                    }, 0)
                  
                    var shipfee=document.getElementById('shipfee').value;
                    var final=Number(shipfee)+Number(total);
                    document.getElementById("finalsum").value =  isNaN(total) ? "0.00" : final.toFixed(2);
        }
       
</script>

<script>
    function updateTotal() {
    var total = 0;//
    var list = document.getElementsByClassName("input");
    var values = [];
    for(var i = 0; i < list.length; ++i) {
        values.push(parseFloat(list[i].value));
    }
    total = values.reduce(function(previousValue, currentValue, index, array){
        return previousValue + currentValue;
    });
    document.getElementById("total").value = total;    
}
</script>
<script>
   
    function showHtmlDiv() {
     
  var htmlShow = document.getElementById("html-show");
  if (htmlShow.style.display === "none") {
    htmlShow.style.display = "block";
  } else {
    htmlShow.style.display = "none";
  }
}
</script>
<script>
    var radio = document.querySelectorAll(".myRadio");
    var demo = document.getElementById("demo");
      
    function checkBox(e){
    	demo.value = e.target.value;
    }
    radio.forEach(check => {
    	check.addEventListener("click", checkBox);
});
</script>
<script>
    var radio = document.querySelectorAll(".mycolorRadio");
var colordemo = document.getElementById("colordemo");
  
function checkBox(e){
	colordemo.value = e.target.value;
}
radio.forEach(check => {
	check.addEventListener("click", checkBox);
});
</script>

<script>
function newcalculate_price(event)
{
    
	var target=$(event.target);
	var parent=target.parent().parent().parent();
	var price=parent.find("input[name='newprice[]']").val();
	var qty=parent.find("input[name='newqty[]']").val();

	parent.find("input[name='newreceive[]']").val(parseFloat(price)*parseFloat(qty));

}
function calculate_price(event)
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
function removerproduct(event)
{
    var target = $(event.target);
    var cl=$(".plist").length;
    if(cl==1)
    {
    alert("You can not remove");
    }
    else{
    target.parent().remove();
    }
}

</script>
