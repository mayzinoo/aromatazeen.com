<!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2019 © Multikart All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/icons/feather-icon/feather.min.js"></script>
<script src="assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="assets/js/sidebar-menu.js"></script>

<!--chartist js-->
<script src="assets/js/chart/chartist/chartist.js"></script>

<!--chartjs js-->
<script src="assets/js/chart/chartjs/chart.min.js"></script>

<!-- lazyload js-->
<script src="assets/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="assets/js/prism/prism.min.js"></script>
<script src="assets/js/clipboard/clipboard.min.js"></script>
<script src="assets/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="assets/js/counter/jquery.waypoints.min.js"></script>
<script src="assets/js/counter/jquery.counterup.min.js"></script>
<script src="assets/js/counter/counter-custom.js"></script>

<!--peity chart js-->
<script src="assets/js/chart/peity-chart/peity.jquery.js"></script>

<!--sparkline chart js-->
<script src="assets/js/chart/sparkline/sparkline.js"></script>

<!-- touchspin js-->
<script src="assets/js/touchspin/vendors.min.js"></script>
<script src="assets/js/touchspin/touchspin.js"></script>
<script src="assets/js/touchspin/input-groups.min.js"></script>
<!-- ckeditor js-->
<script src="assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="assets/js/editor/ckeditor/styles.js"></script>
<script src="assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="assets/js/editor/ckeditor/ckeditor.custom.js"></script>

<!--Datepicker jquery-->
<script src="assets/js/datepicker/datepicker.js"></script>
<script src="assets/js/datepicker/datepicker.en.js"></script>
<script src="assets/js/datepicker/datepicker.custom.js"></script>

<!--Customizer admin-->
<script src="assets/js/admin-customizer.js"></script>

<!--dashboard custom js-->
<script src="assets/js/dashboard/default.js"></script>

<!--right sidebar js-->
<script src="assets/js/chat-menu.js"></script>

<!--height equal js-->
<script src="assets/js/height-equal.js"></script>

<!-- lazyload js-->
<script src="assets/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="assets/js/admin-script.js"></script>

<!-- custom js -->
<script src="assets/js/myjs.js"></script>

</body>
</html>
<script>
    $( document ).ready(function() {
    
    // $("#html-show").hide();
        $(".customtype").hide();
       $(".clothingsize").hide();
       $(".shoesize").hide();
       $('.homeslider').hide();
    });
    function getproductsize(category)
    {
        // alert("sdff");
        data="category="+category;
        if(category=='Bags' || category=='Accessories'){
             $('.clothingsize').hide();
             $('.shoesize').hide();
             $('.customtype').show();
        }else if(category=='Clothing'){
            
            $('.customtype').hide();
            $('.shoesize').hide();
            $('.clothingsize').show();
        }else{
            $('.customtype').hide();
             $('.clothingsize').hide();
            $('.shoesize').show();
        }
             $.ajax({
                type: "POST",
                url : '<?=base_url()?>'+"Admin/get_subcategory/",
                data : data,

                success : function(e)
                {
                    // alert e;
                 $("#searchresult").html(e);
                }
            });
        }
        function gethomeslider(remark)
        {
            data="remark="+remark;
            if(remark=='5'){
                 $('.homeslider').show();
            }else{
                
                $('.homeslider').hide();
            }
        }
</script>
