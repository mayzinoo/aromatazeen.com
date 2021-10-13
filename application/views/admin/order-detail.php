<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Orders Detail</h5>
        </div>
        <div class="card tab2-card">
        <div class="card-body">
            <p>
            Order Number: #<?php echo $order->id; ?><br/>
            Name: <?php echo $order->full_name; ?><br/>
            Email: <?php echo $order->payer_email; ?><br/>
            Payment Method: <?php echo $order->payment_method; ?><br/>
            Order Date: <b><?php echo $order->order_date; ?></b><br/>
            Order Note: <b><span style="word-break: break-all;"><?php echo $order->ordernote; ?></span></b><br/>
            </p>
            
            
            <table style="border:1px solid #000;border-collapse:collapse;padding:10px;width:100%" class="table">
                <thead style="background:#ccc;height:30px;">
                <tr style="border:1px solid #000;text-align:center">
                    <th style="border:1px solid #000;">Product Description</th>
                    <th style="border:1px solid #000;">Quantity</th>
                    <th style="border:1px solid #000;">Price</th>
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
                        <td style="border:1px solid #000;">
                            <div style="width:100%;float: left;position: relative;min-height: 1px;padding-left: 15px;padding-right: 15px;">
                                    <div style="float: left;margin: 0 20px 0 20px;">
                                        <img src="https://aromatazeen.com/img/product/coverimg/<?=$sql->cover_photo?>" style="width:100px;height:auto;float: left;margin: 0 20px 0 30px;">
                                    </div>
                                    <div style="">
                                        <h5><?=$sql->product_name?></h5>
                                        <h5>Color: <?=$usercheck[3]?></h5>
                                        <h5>Size: <?=$usercheck[4]?></h5>
                                    </div>
                            </div>
                        </td>
                        <td style="border:1px solid #000;text-align:center"><?=$usercheck[1]?></td>
                        <td style="border:1px solid #000;text-align:center">£ <?=$sql->price?></td>
                    </tr>
                <?php } ?>
                    
                        <tr>
                            <td colspan="2" style="border:1px solid #000;text-align:center"><strong>Shipping Fee </strong></td>
                            <td class="text-right custom-td" style="border:1px solid #000;text-align:center"><strong>£ <?php echo $shipfee->fee; ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border:1px solid #000;text-align:center"><strong>TOTAL </strong></td>
                            <td class="text-right custom-td" style="border:1px solid #000;text-align:center"><strong>£ <?php echo $order->amount; ?></strong></td>
                        </tr>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="border:1px solid #000;height:30px;background:#ccc;">Delivery Address</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border:1px solid #000;">
                                <p>
                                    <?php echo $order->full_name; ?><br/>
                                    <?php echo $order->address1; ?><br/>
                                    <?php echo $order->city; ?><br/>
                                    <?php echo $order->phone; ?>
                                </p>
                                
                            </td>
                        </tr>
                    </tfoot>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>