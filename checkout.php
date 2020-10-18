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
				<h3>Checkout</h3>
			</div>		

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><a href="#">category</a></li>
					<li><span>Checkout</span></li>
				</ul>					
			</div>	
		</div>
	</div>
</div>
		
		

<!-- Checkout Page -->
<section class="checkout_page">
	<div class="container">
	<form class="checkout_form" id="checkout_form" name="checkout_form" enctype="multipart/form-data" action="" method="post">
		<div class="row">
			
			<div class="col-md-6">
				<div class="title">
					<h3>Billing Details</h3>
				</div>
				
					<div class="form-row">
						<div class="form-group col-md-6">
							<input name="first_name" id="first_name" placeholder="First name" class="form-control" type="text">
						</div>
						
						 <div class="form-group col-md-6">								
							<input name="last_name" id="last_name" placeholder="Last name" class="form-control" type="text">
						</div>
					</div>
					
					<div class="form-group">      
						  <input name="company_name" id="company_name" placeholder="Company name" class="form-control" type="text">                         
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<input name="email" id="email" placeholder="Email address" class="form-control" type="email">
						</div>
				   

						<div class="form-group col-md-6">
							<input name="phone" id="phone" placeholder="Phone number" class="form-control" type="text">
						</div>
					</div>
						
					<div class="form-group">
						<label for="address">Address:</label>    
						<textarea rows="3" name="street" id="address" placeholder="Street address. Apartment, suite, unit etc. (optional)" class="form-control"></textarea>
					</div>

					
				
			</div>
			
			
			<div class="col-md-6">
				<div class="title">
					<h3>your order</h3>
				</div>
				
				<div class="your-order-table table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="product-name">Product Name</th>
								<th class="product-total">Price</th>
							</tr>
						</thead>
						<tbody>
						<?php $result = get_user_carts();
							$total_price=0;
							while($row = mysqli_fetch_array($result)){?>
							<tr>
								<td class="product-name"><?php echo $row['product_name'];?></td>
								<td class="product-total"><span>$<?php echo $row['price'];?></span></td>
							</tr>
							<?php
														
								$total_price += $row['price'];
							} ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Total</th>
								<td><span class="amount">$<?php echo $total_price;?></span></td>
							</tr>
						</tfoot>
					</table>
				</div>
				
				<div class="payment_method">           
					<ul>
						<li>
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="customRadio1">Direct Bank Transfer</label>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed lobortis sem. Quisque at 
								sapien ut odio</p>
							</div>						
				
						</li>
						
						<li>
							<div class="custom-control custom-radio">
								<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
								<label class="custom-control-label" for="customRadio2">PayPal</label>
							</div>	
						</li>
					</ul>     
				</div>
				
				<div class="qc-button">
					<button type="button" id="checkout_btn" class="btn border-btn" tabindex="0">Place Order</button>
				</div>
			</div>
			
			</form>
			
		</div>
	</div>
</section>

<script>
    $('#checkout_btn').click(function(event){

        event.preventDefault();
        var formData = new FormData($('#checkout_form')[0]);
        formData.append("action","checkout");
        //validation
        if($.trim($('#first_name').val()) == ""){
            alert("First name is required");
        }
        else if($.trim($('#last_name').val()) == ""){
            alert("Last name is required");
        }
		else if($.trim($('#email').val()) == ""){
            alert("Email is required");
        }
		else if($.trim($('#phone').val()) == ""){
            alert("Phone is required");
        }
		else if($.trim($('#address').val()) == ""){
            alert("Address is required");
        }
        else{
            //	$('#save_document').attr('disabled','disabled');
            $('#checkout_form').ajaxSubmit({
                'type': 'post',
				'url': "admin/order_controller.php",
				'data': {'action':'checkout'},
                'dataType': 'json',
                success:function(data){
                    if($.trim(data) == 1){
                        alert("Order Placed Successfully");
						window.location.replace("order_list.php");
                    }
					else{
                        alert("Order Place failed");
                    }
                }
            });
        }
    })
</script>

<?php include('footer.php');?>


		