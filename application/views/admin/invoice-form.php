<div class="col-sm-12">
    
    <div class="card">
        
        <div class="card tab2-card">
        <div class="card-body">
        <div class="col-md-8">
            <div class="invoiceform-box">
                <!--<div class="invoicebg"></div>-->
                    <div class="row invoiceform">
                        <div class="row top padding_sm bottompadding_md">
                                <div class="col-md-6">
                                    <p class="left-info"><b><span class="tx-capital">Billed From</span></b><br/>
                                            <?php echo $admininfo->cmyname; ?><br/>
                                            <?php echo $admininfo->email; ?><br/>
                                            <?php echo $admininfo->address; ?><br/>
                                            
                                      </p>
                                </div>
                                <div class="col-md-6">
                                    <div class="cmylogo">
                                        <img src="../img/product/logo/<?echo $admininfo->cmylogo;?>" style="width:210px;height:auto;float: right;">
                                    </div>
                                </div>
                        </div>
                        <!--------------------------------------->
                        <div class="row padding_md">
                                 <div class="col-md-6">
                                     <p class="left-info"><b><span class="tx-capital">Billed To</span></b><br/>
                                            <?php echo $order->full_name; ?><br/>
                                            <?php echo $order->address1; ?><br/>
                                            <?php echo $order->city; ?><br/>
                                            <?php echo $order->phone; ?><br/>
                                            <?php echo $order->payer_email; ?><br/>
                                      </p>
                                 </div>
                                <div class="col-md-6 invinfo">
                                    
                                    
                                     <table class="table">
                                            <tr>
                                                <td style="border: none !important;"><strong>Invoice Number: </strong></td>
                                                <td style="border: none !important;text-align:right">#<?php echo $order->id; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Invoice Date: </strong></td>
                                                <td style="text-align:right"><?php echo date('Y-m-d'); ?></td>
                                            </tr>
                                            <tr class="bg-grey">
                                                <td><strong>Amount Due: </strong></td>
                                                <td style="text-align:right">£ <?php echo $order->amount; ?></strong></td>
                                            </tr>
                                     </table>
                                </div>
                        </div>
                     <div class="row padding_sm">
                      <table class="table">
                                        <thead style="background:#efefef;height:30px;">
                                        <tr style="text-align:center">
                                            <th>Product Description</th>
                                            <th>Quantity</th>
                                            <th style="text-align:right !important">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $item = explode(']', $order->product);
                                
                                        for($i=1;$i<count($item);$i++)
                                        {
                                          $usercheck = explode('#', $item[$i-1]);
                                          $sql =$this->db->query("SELECT * FROM products WHERE id=$usercheck[0]")->row();
                                          $shipfee=$this->db->query("Select fee from shipping_fee;")->row();
                                          ?>
                                            <tr>
                                                <td>
                                                    <div style="width:100%;float: left;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;">
                                                            <div style="float: left;margin: 0 20px 0 20px;">
                                                                <img src="https://aromatazeen.com/img/product/coverimg/<?=$sql->cover_photo?>" style="width:65px;height:auto;float: left;">
                                                            </div>
                                                            <div style="">
                                                                <h5><?=$sql->product_name?></h5>
                                                                <h5>Color: <?=$usercheck[3]?></h5>
                                                                <h5>Size: <?=$usercheck[4]?></h5>
                                                            </div>
                                                    </div>
                                                </td>
                                                <td><?=$usercheck[1]?></td>
                                                <td style="text-align:right">£ <?=number_format($sql->price,2)?></td>
                                            </tr>
                                        <?php } ?>
                                            
                                                
                                            
                                        </tbody>
                                    </table>   
                        </div>
                  <div class="row padding_sm">
                      
                      <div class="offset-md-6 col-md-6">
                          <div class="right-info">
                              <table class="table">
                                  <tr>
                                        <td colspan="2" style="border-bottom: none !important;text-align:right"><strong>Shipping Fee </strong></td>
                                        <td class="text-right custom-td" style="border-bottom: none !important;text-align:right"><strong>£ <?php echo number_format($shipfee->fee,2); ?></strong></td>
                                    </tr>
                                    <tr class="bg-grey">
                                        <td colspan="2" style="border-bottom: none !important;text-align:right"><strong>TOTAL </strong></td>
                                        <td class="text-right custom-td" style="border-bottom: none !important;text-align:right"><strong>£ <?php echo $order->amount; ?></strong></td>
                                    </tr>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <p style="word-wrap:break-word;font-size:12px; opacity:0.6">
                              <b>Notes / Memo</b><br>
                              <?php echo $order->ordernote; ?>
                          </p>
                      </div>
                  </div>
                  <div class="invoicefooter padding_md">
                      <div class="cmylogo">
                                <img src="../img/v1.png" style="width:120px;height:auto;">
                            </div>
                  </div>
                  </div><!--end invoice-->
                </div>
            
            </div>
            
            </div><!--card body-->
            </div>
        </div>
    </div>
</div>