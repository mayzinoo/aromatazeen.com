<?php include ('sidebar.php') ?>
        
        <div class="page-body">
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Dashboard
                                    <small>Aroma Tazeen Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <!--<li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>-->
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 xl-30">
                        <div class="card o-hidden  widget-cards">
                            <div class="bg-secondary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Orders</span>
                                        <h3 class="mb-0"><span class="counter"><?php echo $orderlist->num_rows(); ?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-30">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-primary card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">All Products</span>
                                        <h3 class="mb-0"><span class="counter"><?php echo $allproducts->num_rows(); ?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 xl-30">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-danger card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0">Brands</span>
                                        <h3 class="mb-0"><span class="counter"><?php echo $allbrands->num_rows(); ?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
                
                <div class="row">
                    
                    <?php 
		          foreach($menu->result() as $row): ?>
                    <div class="col-xl-3 col-md-3 xl-30">
                        <div class="card o-hidden widget-cards">
                            <div class="bg-warning card-body">
                                <div class="media static-top-widget row">
                                    <div class="icons-widgets col-4">
                                        <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                                    </div>
                                    <div class="media-body col-8"><span class="m-0"><?php echo $row->catname; ?></span>
                                        <h3 class="mb-0"><span class="counter"><?php echo $row->total; ?></span><small> This Month</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                   endforeach;
                    ?>
                    
                    <div class="col-xl-6 xl-100">
                        <div class="card">
                            <div class="card-header">
                                <h5>Latest Orders</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="basicScenario" class="product-physical table-responsive jsgrid" style="position: relative; height: auto; width: 100%;">
                                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                    <table class="jsgrid-table">
                                        <thead>
                                        <tr class="jsgrid-header-row">
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Order ID</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Payer Email</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Total Amount</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col">Payment Method</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable"style="text-align:left !important"  scope="col">Order Date</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col" style="width:225px;">Order Note</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col" style="">Order Status</th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="text-align:left !important" scope="col" style="">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                		                foreach($orders->result() as $row): ?>
                                        
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell"><b><a href="Admin/orders_detail/<?php echo $row->id; ?>">#<?php echo $row->id; ?></a></b></td>
                                            <td class="jsgrid-cell"><?php echo $row->payer_email; ?></td>
                                            <td class="jsgrid-cell">£ <?php echo $row->amount; ?></td>
                                            
                                            <?php if($row->payment_method=='cash'){ ?>
                                                        <td class="font-secondary jsgrid-cell"><?php echo $row->payment_method; ?></td>
                                            <?php }else if($row->payment_method=='credit'){ ?>
                                                        <td class="font-secondary jsgrid-cell" style="color:#ff8084 !important"><?php echo $row->payment_method; ?></td>
                                            <?php }else{ ?>
                                                        <td class="font-secondary jsgrid-cell" style="color:#2790C3 !important"><?php echo $row->payment_method; ?></td>
                                            <?php } ?>
                                                
                                            
                                            <td class="jsgrid-cell"><?php echo $row->order_date; ?></td>
                                            <td class="jsgrid-cell" style="word-break: break-all;"><?php echo $row->ordernote; ?></td>
                                            <td class="jsgrid-cell" style="word-break: break-all;">
                                                <?php if($row->order_status=='delivered'){ ?>
                                                    <span class="badge badge-success">Delivered</span>
                                                <?php }else if($row->order_status=='received'){ ?>
                                                    <span class="badge badge-secondary">Received</span>
                                                <?php }else if($row->order_status=='shipped'){ ?>
                                                    <span class="badge badge-primary">Shipped</span>
                                                <?php }else if($row->order_status=='cancelled'){ ?>
                                                    <span class="badge badge-danger">Cancelled</span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-warning">Processing</span>
                                                <?php } ?>
                                            </td>
                                            <td class="jsgrid-cell">
                                            <a href="Admin/update_orderstatus/<?php echo $row->id; ?>" >
                                                <input class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></a>
                                            </td>
                                        </tr>
                                        
                                        <?php 
                                        endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <a href="Admin/orderlist" class="btn btn-primary" style="margin-top:10px;">View All Orders</a>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    <pre class=" language-html"><code class=" language-html" id="example-head1">
&lt;div class="user-status table-responsive latest-order-table"&gt;
    &lt;table class="table table-bordernone"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;Order ID&lt;/th&gt;
                &lt;th scope="col"&gt;Order Total&lt;/th&gt;
                &lt;th scope="col"&gt;Payment Method&lt;/th&gt;
                &lt;th scope="col"&gt;Status&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td&gt;1&lt;/td&gt;
                &lt;td class="digits"&gt;$120.00&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Bank Transfers&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;2&lt;/td&gt;
                &lt;td class="digits"&gt;$90.00&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Ewallets&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;3&lt;/td&gt;
                &lt;td class="digits"&gt;$240.00&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Cash&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;4&lt;/td&gt;
                &lt;td class="digits"&gt;$120.00&lt;/td&gt;
                &lt;td class="font-primary"&gt;Direct Deposit&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;5&lt;/td&gt;
                &lt;td class="digits"&gt;$50.00&lt;/td&gt;
                &lt;td class="font-primary"&gt;Bank Transfers&lt;/td&gt;
                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 xl-100">
                        <div class="card height-equal">
                            <div class="card-header">
                                <h5>Goods return</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-status table-responsive products-table">
                                    <table class="table table-bordernone mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">Details</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Simply dummy text of the printing</td>
                                            <td class="digits">1</td>
                                            <td class="font-primary">Pending</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        <tr>
                                            <td>Long established</td>
                                            <td class="digits">5</td>
                                            <td class="font-secondary">Cancle</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        <tr>
                                            <td>sometimes by accident</td>
                                            <td class="digits">10</td>
                                            <td class="font-secondary">Cancle</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        <tr>
                                            <td>Classical Latin literature</td>
                                            <td class="digits">9</td>
                                            <td class="font-primary">Return</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        <tr>
                                            <td>keep the site on the Internet</td>
                                            <td class="digits">8</td>
                                            <td class="font-primary">Pending</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        <tr>
                                            <td>Molestiae consequatur</td>
                                            <td class="digits">3</td>
                                            <td class="font-secondary">Cancle</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        <tr>
                                            <td>Pain can procure</td>
                                            <td class="digits">8</td>
                                            <td class="font-primary">Return</td>
                                            <td class="digits">$6523</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                                    <pre class=" language-html"><code class=" language-html" id="example-head4">
&lt;div class="user-status table-responsive products-table"&gt;
    &lt;table class="table table-bordernone mb-0"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;Details&lt;/th&gt;
                &lt;th scope="col"&gt;Quantity&lt;/th&gt;
                &lt;th scope="col"&gt;Status&lt;/th&gt;
                &lt;th scope="col"&gt;Price&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;td&gt;Simply dummy text of the printing&lt;/td&gt;
                &lt;td class="digits"&gt;1&lt;/td&gt;
                &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Long established&lt;/td&gt;
                &lt;td class="digits"&gt;5&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;sometimes by accident&lt;/td&gt;
                &lt;td class="digits"&gt;10&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Classical Latin literature&lt;/td&gt;
                &lt;td class="digits"&gt;9&lt;/td&gt;
                &lt;td class="font-primary"&gt;Return&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;keep the site on the Internet&lt;/td&gt;
                &lt;td class="digits"&gt;8&lt;/td&gt;
                &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Molestiae consequatur&lt;/td&gt;
                &lt;td class="digits"&gt;3&lt;/td&gt;
                &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;td&gt;Pain can procure&lt;/td&gt;
                &lt;td class="digits"&gt;8&lt;/td&gt;
                &lt;td class="font-primary"&gt;Return&lt;/td&gt;
                &lt;td class="digits"&gt;$6523&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;
                                    </code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
            </div>
            <!-- Container-fluid Ends-->

        </div>
<?php include ('footer.php') ?>        