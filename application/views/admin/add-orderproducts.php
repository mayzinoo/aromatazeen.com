<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Add More Orders Here!</h5>
        </div>
        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?=form_dropdown("pname",$pname,"","class='form-control' onclick=productsearch(this.value)")?>
                                </div>
                                <!--<div class="col-md-2">-->
                                <!--    <button type="submit" class="btn btn-primary right">Choose</button>-->
                                <!--</div>-->
                            </div> 
            <div class="row toppadding_md">
                <div class="col-md-3">
                    <img src="img/product/coverimg/<?php echo $productdetail->cover_photo ; ?>" alt="" class="simpleLens-big-image"/ style="width:225px;height:auto">
                </div>
                <div class="col-md-3">
                    <h4 class="product-name">
						<b><?php echo $productdetail->brand_name ; ?></b>
					</h4>
					<h4 class="product-name">
						<?php echo $productdetail->product_name ; ?>
					</h4>
					<div class="price-box">										
						<span class="new-price">£ <?php echo $productdetail->price ; ?></span>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
 function productsearch(pid)
    {
        data="pid="+pid;
        $.ajax({
                type: "POST",
                url : '<?=base_url()?>'+"Admin/search_product/",
                data : data,

                success : function(e)
                {
                 $("#searchresult").html(e);
                }
            });
    }
</script>