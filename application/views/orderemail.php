
<html>
<head>
    <meta charset="utf-8" />
    <title>User Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" href="https://aromatazeen.com/css/bootstrap.min.css">
</head>
<style>
   
    .table tr td{
        border:1px solid #000 !important;
    }
    .col-md-12 {
    width: 100%;
    }
    .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
        float: left;
    }
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
<body>
<div>
    <p style="font-size:14px;"><b><?php echo $order->full_name;?>, thanks for your order!</b></p>
    <p>It's all gone through and we'll be in touch as soon as your items have shipped.</p>
    <p>Order Details:<br/>
    Order Number: #<?php echo $order->id; ?></p>
    <br/>

    <p>Delivered By: </p>
    <table style="border:1px solid #000;border-collapse:collapse;padding:10px">
        <thead style="background:#ccc;height:30px;">
        <tr style="border:1px solid #000;text-align:center">
            <th style="border:1px solid #000;">Product Description</th>
            <th style="border:1px solid #000;width:10px;">Quantity</th>
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
                    <div style="width:100%;float: left;position: relative;min-height: 1px;padding-left: 5px;padding-right: 5px;">
                            <div style="float: left;margin: 0 5px 0 5px;">
                                <img src="https://aromatazeen.com/img/product/coverimg/<?=$sql->cover_photo?>" style="width:100px;height:auto;float: left;margin: 0 5px 0 5px;">
                            </div>
                            <div style="margin-left:-10px;">
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
                        <p>
                            Please carefully check your delivery address details. If something shown above isn't right, please let us know as soon as you can and our customer service team will be happy to help.
                        </p>
                    </td>
                </tr>
            </tfoot>
        </tbody>
    </table>
    <p>Keep this email for your reference and we will let you know when your order is on its way.</p>
   
      
       <p>If you paid using a Gift Card please keep it safe. Refunds will automatically go back on to this Gift Card.
If you need any more information, don't hesitate to give our friendly customer service team a call on(Phone Number) Monday-Sunday 8am-6pm, drop us an email to cs@aromatazeen.com.</p>
    
<p>For any further information, please refer to the website for Help, Terms and Conditions and the Privacy Policy. </p>
<h5 style="font-weight:bold;">From Aroma Tazeen</h5>
</div>
</body>
</html>