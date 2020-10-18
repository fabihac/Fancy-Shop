<?php
	include('header.php');
	include 'admin/category_controller.php';
	include 'admin/product_controller.php';
	include 'admin/cart_controller.php';

?>
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3>Cart Details</h3>
			</div>		

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><a href="#">category</a></li>
					<li><span>Cart</span></li>
				</ul>					
			</div>	
		</div>
	</div>
</div>

<!-- Cart Page -->
<div class="cart_page_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="cart_table_area table-responsive">
					<table class="table cart_prdct_table text-center">
						<thead>
							<tr>
								<th class="cpt_img">image</th>
								<th class="cpt_pn">product name</th>
								<th class="cpt_p">price</th>
								<th class="cpt_r">remove</th>
							</tr>
						</thead>
						<tbody>
							<?php $result = get_user_carts();
								$total_price=0;
								while($row = mysqli_fetch_array($result)){?>
								
							<tr>
								<td class="cp_img"><img src="admin/<?php echo $row['product_image'] ?>" alt="" /></td>
								<td><p class="cp_title"><?php echo $row['product_name'];?></p></td>
								<td><p class="cp_price"><?php echo $row['price'];?></p></td>
								<td><a href="javascript:;" onclick="delete_cart(<?php echo $row['product_id'] ?>)" class="btn btn-default cp_remove"><i class="fa fa-trash"></i></a></td>
							</tr>
							
							<?php
														
								$total_price += $row['price'];
							} ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8 col-xs-12 cart-actions cart-button-cuppon">
				
			</div>
			
			<div class="col-md-4 col-xs-12 cart-checkout-process text-right">
				<div class="wrap">
					<h4><span>Grand total</span><span>$<?php echo $total_price;?></span></h4>
					<a href="checkout.php" class="btn border-btn">process to checkout</a>
				</div>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	
	function delete_cart(product_id) {
		if(product_id) {
            $.ajax({
			    'type': 'post',
				'url': "admin/cart_controller.php",
				'data': {'action':'delete_cart', 'product_id':product_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Cart Deleted Successfully");
						window.location.replace("cart.php");
					}
                }
            });
        }
        
    }
	
	
	
	
</script>
<?php include('footer.php');?>

		