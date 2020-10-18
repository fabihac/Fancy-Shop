<?php
	include('header.php');
	include 'admin/category_controller.php';
	include 'admin/product_controller.php';

?>
<div id="page_item_area">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 text-left">
				<h3>Products</h3>
			</div>		

			<div class="col-sm-6 text-right">
				<ul class="p_items">
					<li><a href="#">home</a></li>
					<li><a href="#">category</a></li>
					<li><span>Products</span></li>
				</ul>					
			</div>	
		</div>
	</div>
</div>	
<section id="product_area" class="section_padding">
	<div class="container">		
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section_title">						
					<h2>Our <span>Products</span></h2>
					<div class="divider"></div>							
				</div>
			</div>
		</div>
	
		<div class="text-center">
			<div class="product_item">
				<div class="row">
				<div id="AllProductsList" class="col-md-9 col-xs-12">
					<?php
						if($_GET){
						$product_type = $_GET['type'];
						
							
						$result = get_products_by_type($product_type);
						while($row = mysqli_fetch_array($result)){
							//if($row['product_tag'] == 1){
					?>
					<div class="col-lg-3 col-md-4 col-sm-6 mix product-item" data-category="<?php echo $row['category_id']; ?>">
						<div class="single_product title">
							<div class="product_image">
								<img src="admin/<?php echo $row['product_image'] ?>" alt=""/>
								<?php if($row['product_tag'] == 1){ ?>
								<div class="new_badge">Featured</div>
								<?php }else{ ?>
								<div class="new_badge">Best Seller</div>
								<?php } ?>
								<div class="box-content">
									<a href="javascript:;" onclick="add_to_cart(<?php echo $row['product_id'] ?>)"><i class="fa fa-cart-plus"></i></a>
								</div>										
							</div>

							<div class="product_btm_text">
								<h4><a href="product-details.php?product_id=<?php echo $row['product_id']?>"><?php echo $row['product_name'];?></a></h4>								
								<span class="price">$<?php echo $row['price'];?></span>
	
							</div>
						</div>
						
					</div> <!-- End Col -->	
					
					<?php	//}
						}
					}else{
						$result = get_all_products();
						while($row = mysqli_fetch_array($result)){ ?>
					<div class="col-lg-3 col-md-4 col-sm-6 mix product-item" data-category="<?php echo $row['category_id']; ?>">
						<div class="single_product title">
							<div class="product_image">
								<img src="admin/<?php echo $row['product_image'] ?>" alt=""/>
								<?php if($row['product_tag'] == 1){ ?>
								<div class="new_badge">Featured</div>
								<?php }else{ ?>
								<div class="new_badge">Best Seller</div>
								<?php } ?>
								<div class="box-content">
									<a href="javascript:;" onclick="add_to_cart(<?php echo $row['product_id'] ?>)"><i class="fa fa-cart-plus"></i></a>
								</div>										
							</div>

							<div class="product_btm_text">
								<h4><a href="product-details.php?product_id=<?php echo $row['product_id']?>"><?php echo $row['product_name'];?></a></h4>								
								<span class="price">$<?php echo $row['price'];?></span>
	
							</div>
						</div>
						
					</div> <!-- End Col -->	
					<?php }
						}
					?>
					</div>
					
					<div class="col-md-3 col-xs-12">							
						<div class="single_sidebar search_widget">
							<h3 class="sdbr_title">Search</h3>
							<div class="sdbr_inner">
								
									<input type="text" class="form-control search_input" id="searchProduct" placeholder="Search Here ...">
									
								
							</div>
						</div>
						
						<div class="single_sidebar category">
							<h3 class="sdbr_title">Categories</h3>
							<div class="sdbr_inner">
							<!-- treeview start -->
								<ul>
								<?php $result = get_all_categories();
									while($row = mysqli_fetch_array($result)){?>
									<li><a href="javascript:;" onclick="filterByCategory(<?php echo $row['category_id'] ?>)"><?php echo $row['category_name'] ?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						
						<div class="single_sidebar category">
							<h3 class="sdbr_title">Types</h3>
							<div class="sdbr_inner">
							<!-- treeview start -->
								<ul>
								
									<li><a href="products.php?type=1"> Men</a></li>
									<li><a href="products.php?type=2">Women</a></li>
									<li><a href="products.php?type=3">Kids</a></li>
									<li><a href="products.php?type=4">Accessories</a></li>
								</ul>
							</div>
						</div>

						
											
						
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	
	
	$('#searchProduct').on('keyup', function(e){
		
		var text = $(this).val();
		
		if(text!=''){
			$('#AllProductsList .product-item').hide();
			$('#AllProductsList .product-item .title:contains("'+text+'")').closest('.product-item').show();
		}else{
			
        $('#AllProductsList').find('.product-item').show();
		}
		
		
	});
	
	function filterByCategory(id) {
        $('#AllProductsList').find('.product-item').hide();
        $('#AllProductsList').find('.product-item[data-category='+id+']').show();
        //$('#clearFilter').show();

        $('#ProductContainer .box-header .col-md-9').removeClass('col-md-9').addClass('col-md-7');
        $('#ProductContainer .box-header .col-md-2').show();
        //showCategoryPanel();
    }
	
	function add_to_cart(product_id) {
		if(product_id) {
            $.ajax({
			    'type': 'post',
				'url': "admin/cart_controller.php",
				'data': {'action':'add_to_cart', 'product_id':product_id},
                'dataType': 'json',
                'success': function(data){
                    if($.trim(data) == 1){
						alert("Cart Added Successfully");
						window.location.replace("cart.php");
					}
					else{
						alert("Already Added");		
						window.location.replace("cart.php");
					}
                }
            });
        }
        
    }
	
	
	
	
</script>
		

<?php include('footer.php');?>
		
		