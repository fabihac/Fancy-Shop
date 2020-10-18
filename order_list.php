<?php
	include('header.php');
	include 'admin/category_controller.php';
	include 'admin/product_controller.php';
	include 'admin/order_controller.php';

?>
<!-- Page item Area -->
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3>Order List</h3>
			</div>		

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><a href="#">category</a></li>
					<li><span>Order List</span></li>
				</ul>					
			</div>	
		</div>
	</div>
</div>

<!-- Wishlist Page -->
<div class="wishlist-page">
	<div class="container">
		<div class="table-responsive">
			<table class="table cart-table cart_prdct_table text-center">
				<thead>
					<tr>
						
						<th class="cpt_img">image</th>
						<th class="cpt_pn">product name</th>
						<th class="cpt_p">price</th>
						<th class="cpt_r">remove</th>
					</tr>
				</thead>
				<tbody>
					<?php $result = get_user_orders();
						while($row = mysqli_fetch_array($result)){?>
					<tr>
						
						<td class="cp_img"><img src="admin/<?php echo $row['product_image'] ?>" alt="" /></td>
						<td><p class="cp_title"><?php echo $row['product_name'];?></p></td>
						<td><p class="cp_price"><?php echo $row['price'];?></p></td>
						<td><a href="javascript:;" onclick="delete_order(<?php echo $row['product_id'] ?>)" class="btn btn-default cp_remove"><i class="fa fa-trash"></i></a></td>
					</tr>
						<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	function delete_order(product_id) {
		if(product_id) {
            $.ajax({
			    'type': 'post',
				'url': "admin/order_controller.php",
				'data': {'action':'delete_order', 'product_id':product_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Order Deleted Successfully");
						window.location.replace("cart.php");
					}
                }
            });
        }
        
    }
	
	
	
	
</script>
<?php include('footer.php');?>

		