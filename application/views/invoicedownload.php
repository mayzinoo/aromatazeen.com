<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Print Invoice</title>
	<link real="stylesheet" href="https://aromatazeen.com/assets/css/vendors/bootstrap.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css">
	<style type="text/css">
	@charset "utf-8";
	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
	body{
			background-color: #fff;
			margin: 0 auto;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}
		#container{
		/*margin: 10px;*/
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		}
		#body{
		/*margin: 0 15px 0 15px;*/
		}
		
		.padding_md{
			padding-top:30px;
			padding-bottom:30px;
		}
		.padding_sm{
			padding-top:10px;
			padding-bottom:10px;
		}
		.toppadding_md{
			padding-top:50px;
		}
		.toppadding_sm{
			padding-top:10px;
		}
		.bottompadding_md{
            padding-bottom:30px !important;
        }
		.invoiceform-box{
            /*border:1px solid #ccc;*/
        }
        .invoiceform{
            padding:30px 50px !important;
        }
        .invoiceform table th{
            text-align:left !important;
        }
        .invoiceform table tr td h5{
            font-size:12px !important;
        }
        .invoiceform h1{
            font-weight:normal !important;
        }
        .right-info{
            float: right;
        }
        .left-info{
            float:left;
        }
        .tx-capital{
            text-transform:uppercase !important;
        }
        .cmylogo{
            text-align:center !important;
        }
        .invinfo{
            /*margin-top:25px;*/
        }
        .invinfo .table,
        .right-info .table{
            width:38% !important;
        }
        .invinfo .table tr{
           border-top:none !important;
        }
        .invinfo .table > :not(caption) > * > *{
           border-top:none !important;
        }
        .invinfo p{
            font-weight:700;
            font-size:14px;
        }
        .top{
            border-bottom:1px solid #ccc;
        }
        .invoicefooter{
            border-top: 1px solid #efefef;
        }
        .dspt h5{
            margin-left:160px;
        }
	</style>
</head>
<body>
<div id="container">
	<div id="body">
        	<div class="col-sm-12 padding_sm">
        	        <div class="invoiceform-box">
                        <!--<div class="invoicebg"></div>-->
                            <div class="row invoiceform">
                                <div class="row top padding_sm bottompadding_md" style="border-bottom:1px solid #ccc;">
                                        <div class="col-sm-6">
                                            <p class="left-info" style="float:left;"><b><span class="tx-capital" style="text-transform:uppercase !important;">Billed From</span></b><br/>
                                                    <?php echo $admininfo->cmyname; ?><br/>
                                                    <?php echo $admininfo->email; ?><br/>
                                                    <?php echo $admininfo->address; ?><br/>
                                                    
                                              </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="cmylogo" style="text-align:center !important;">
                                                <img src="https://aromatazeen.com/img/product/logo/<?echo $admininfo->cmylogo;?>" style="width:210px;height:auto;float: right;">
                                            </div>
                                        </div>
                                </div>
                                <!--------------------------------------->
                                <div class="row padding_sm">
                                         <div class="col-sm-6">
                                             <p class="left-info"><b><span class="tx-capital" style="text-transform:uppercase !important;">Billed To</span></b><br/>
                                                    <?php echo $order->full_name; ?><br/>
                                                    <?php echo $order->address1; ?><br/>
                                                    <?php echo $order->city; ?><br/>
                                                    <?php echo $order->phone; ?><br/>
                                                    <?php echo $order->payer_email; ?><br/>
                                              </p>
                                         </div>
                                        <div class="col-sm-6 invinfo">
                                            
                                            
                                             <table class="table" style="float:right">
                                                    <tr style="line-height:10px;border-top: none !important;">
                                                        <td style="border-top: none !important;"><strong>Invoice Number: </strong></td>
                                                        <td style="border-top: none !important;text-align:right">#<?php echo $order->id; ?></td>
                                                    </tr>
                                                    <tr style="line-height:10px;border-top: none !important;">
                                                        <td style="border-top: none !important;"><strong>Invoice Date: </strong></td>
                                                        <td style="border-top: none !important;text-align:right"><?php echo date('Y-m-d'); ?></td>
                                                    </tr>
                                                    <tr class="bg-grey" style="line-height:10px;background: #efefef !important;">
                                                        <td style="border-top: none !important;"><strong>Amount Due: </strong></td>
                                                        <td style="border-top: none !important;text-align:right">£ <?php echo $order->amount; ?></strong></td>
                                                    </tr>
                                             </table>
                                        </div>
                                </div>
                             <div class="row">
                              <table class="table">
                                                <thead style="background:#efefef;height:30px;">
                                                <tr style="text-align:center;border-bottom:none !important">
                                                    <th style="border-bottom: none !important;">Product Description</th>
                                                    <th style="border-bottom: none !important;">Quantity</th>
                                                    <th style="border-bottom: none !important;text-align:right !important">Price</th>
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
                                                        <td style="border-bottom-width:none !important;height:100px;">
                                                           
                                                            <div style="float: left;margin: 0 20px 0 20px;">
                                                                <img src="https://aromatazeen.com/img/product/coverimg/<?=$sql->cover_photo?>" style="width:65px;height:auto;float: left;">
                                                            </div>
                                                            <div class="dspt">
                                                                <h5><?=$sql->product_name?></h5>
                                                                <h5>Color: <?=$usercheck[3]?></h5>
                                                                <h5>Size: <?=$usercheck[4]?></h5>
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
                              
                              <div class="col-sm-6">
                                  <div class="right-info" style="float: right;">
                                      <table class="table">
                                          <tr style="border-top: none !important;">
                                                <td colspan="2" style="border-top: none !important;text-align:right"><strong>Shipping Fee </strong></td>
                                                <td class="text-right custom-td" style="border-top: none !important;text-align:right"><strong>£ <?php echo number_format($shipfee->fee,2); ?></strong></td>
                                            </tr>
                                            <tr class="bg-grey" style="background: #efefef !important;">
                                                <td colspan="2" style="border-top: none !important;text-align:right"><strong>TOTAL </strong></td>
                                                <td class="text-right custom-td" style="border-top: none !important;text-align:right"><strong>£ <?php echo $order->amount; ?></strong></td>
                                            </tr>
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div class="row" >
                                  <p style="word-wrap:break-word;font-size:12px; opacity:0.6">
                                      <b>Notes / Memo</b><br>
                                      <span style="opacity:0.6"><?php echo $order->ordernote; ?></span>
                                  </p>
                              </div>
                          <div class="invoicefooter padding_md">
                              <div class="cmylogo" style="text-align:center !important;">
                                        <img src="https://aromatazeen.com/img/v1.png" style="width:120px;height:auto;">
                                    </div>
                          </div>
                          </div><!--end invoice-->
                        </div>
                    </div>
        	</div>
	</div></div>
</body>
</html>