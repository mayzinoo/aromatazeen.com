<div class="cart-area margin-70">
	<div class="container">
	    <div class="col-md-12">
	        <?php 
	        $userid=$this->session->userdata('id');
	        $query =$this->db->query("SELECT * FROM orders WHERE user_id=$userid")->row();
	        $itemm = explode(']', $query->product);
            
             ?>
	 		<h3 class="title-3">My Orders</h3>
	 		</div>
	 	
        			<div class="row">
        				<div class="col-md-12">
        					<div class="table-responsive">
        						<table class="table table-bordered">
        							<thead class="cart-table-head">
        								<tr>
        									<td class="text-center"> Product Name</td>
        									<td class="text-center"> Brand Name</td>
        									<td class="text-center">Image</td>
        									<td class="text-center"> Quantity</td>
        									<td class="text-center"> Price</td>
        								</tr>
        							</thead>
        							 <?php
                                        foreach($myorders->result() as $row):
                                      ?>  
        							<tbody>
        							    <?php
                                            $item = explode(']', $row->product);
                                
                                            for($i=1;$i<count($item);$i++)
                                            {
                                              $orderproduct = explode('#', $item[$i-1]);
                                              
                                              $userid=$this->session->userdata('id');
                                              $sql =$this->db->query("SELECT *,products.price as pprice FROM products LEFT JOIN orders ON products.id=$orderproduct[0] WHERE orders.user_id=$userid")->row();
                                            
                                                 ?>
        								<tr>
        									<td class="text-center"><?php echo $sql->product_name; ?></td>
        									<td class="text-center"><?php echo $sql->brand_name; ?></td>
        									<td class="text-center"><img src="img/product/coverimg/<?php echo $sql->cover_photo; ?>" class="listimg"></td>
        									<td class="text-center"><?php echo $orderproduct[1]; ?></td>
        									<td class="text-center">£ <?php echo $orderproduct[2]; ?></td>
        								</tr>
        								<?php } ?>
        							</tbody>
        							<?php endforeach; ?> 
        						
        						</table>
        					</div>
        				</div>
        			</div>
        		

    </div>
</div>
