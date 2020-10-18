<style>
.clearfix { overflow: hidden; width: 100%; clear: both; }

.navbar-nav>.user-menu>.dropdown-menu>li.user-header {
    height: auto;
}
[class^='col-md-'] {
    padding-right: 10px;
    padding-left: 10px;
}
.row {
    margin-right: -10px;
    margin-left: -10px;
}
.btn-action {
    background: #F4F4F4;
    color: #001F3F;
    padding: 3px 6px;
    margin-right: 3px;
    border: 1px solid #adadad;
}
.button-block [class^='col-md-'] {
    padding-right: 5px;
    padding-left: 0px;
}
.button-block [class^='col-md-']:first-child {
    padding-left: 5px;
}
.button-block .row {
    margin-bottom: 5px;
}
.button-block .row:last-child {
    margin-bottom: 0;
}

.product-list [class^="col-md-"] {
    padding: 0;
}
.product-list .product {
    position: relative;
    padding-top: 100%;
    padding-top: calc(100% - 7px);
    margin: 2.5px;
    border: 1px solid #00a65a;
    overflow: hidden;
}
.product-list .product img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
}
.product-list .product .title {
    color: #fff;
    background: rgba(0,0,0,0.4);
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    line-height: 1.2em;
    padding: 5px;
    text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    text-align: center;
}
.product-list .show-large-image {
    position: absolute;
    right: 10px;
    top: 10px;
    color: #001F3F;
    line-height: .8em;
    z-index: 2;
}
#ProductContainer .box-body {
    overflow: auto;
}
.slimScrollDiv {
    overflow: visible !important;
}

.floating-panel {
    position: absolute;
    z-index: 10;
    top: 50px;
    padding: 10px;
    bottom: 0;
    background: rgba(0,0,0,0.4);
    z-index: 150;
    display: none;
}

.category-container {
    padding: 0 2.5px;
}
.category-container [class^="col-md-"] {
    padding-right: 2.5px;
    padding-left: 2.5px;
    padding-bottom: 5px;
}
#AddProductContainer {
    display: none;
    position: absolute;
    background: #fff;
    z-index: 10;
    overflow: hidden;
    left: 0;
    right: 0;
}

.price-code {
    background: #ff0000;
    color: #fff;
    font-weight: bold;
    padding: 3px 5px;
}

.alert {
    padding: 5px 10px;
}
</style>

<script type="text/javascript" src="<?php echo base_url();?>assets_new/plugins/slimScroll/jquery.slimscroll.min.js"></script>



<div class="content-wrapper">
	<section class="content">
		
		<div class="col-md-12 floating-panel">
			<div class="no-padding col-md-7">
				<div class="box box-default">
					<div class="box-header">
						<h3 class="box-title">ALL CATEGORIES</h3>
					</div>
					<div class="category-container box-body">
						<?php 
						if($categories){
							foreach($categories as $category){ ?>
							<div class="col-md-3">
								<a href="javascript:;" onclick="filterByCategory(<?php echo $category['id']; ?>)" class="btn btn-default btn-flat btn-block"><?php echo $category['name']; ?></a>
							</div>
							<?php 
							}
						}
						?>
					</div>
					<div class="box-footer no-border"></div>
				</div>
			</div>
		</div>
		<div class="col-md-8" style="padding-right:0">

			<div id="ProductContainer" class="box box-solid">

				<div class="box-header" style="padding-bottom:0">
					<div class="col-md-3" style="padding-left:0">
						<a href="javascript:;" onclick="showCategoryPanel()" class="btn btn-success btn-flat btn-block">BROWSE CATEGORIES</a>
					</div>
					<div class="col-md-2" style="display:none;padding-left:0">
						<a href="javascript:;" onclick="clear_filter()" class="btn btn-default btn-flat btn-block">CLEAR FILTER</a>
					</div>
					<div class="input-group col-md-9">
						<span class="input-group-addon"><i class="fa fa-search"></i></span>
						<input type="text" id="searchProduct" class="form-control" placeholder="Product Search">
					</div>
				</div>

				<div class="box-body">

					<div id="AllProductsList" class="product-list">

						<?php 
						foreach($products as $product){ ?>
						<div class="col-md-2 product-item" data-category="<?php echo $product['category_id']; ?>">
						<?php if($product['image']){ ?>
							<a href="<?php echo base_url("/assets_new/img/product/".$product['image']); ?>" class="show-large-image"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" onclick="load_barcode('<?php echo $product['barcode_product']; ?>')">
								<div class="product">
									<img src="<?php echo base_url("/assets_new/img/product/".$product['image']); ?>" alt=""/>
									<div class="title">
										<?php
                                            echo $product['name'];
                                        ?> <br/>
                                        <?php
                                            $stock_info = $this->db->query("select SUM(stock.stock_in) AS stock_in,
                                                                            SUM(stock.stock_out) AS stock_out,
                                                                            SUM(stock.stock_return) stock_return
                                                                            from stock where stock.id_stock_product = {$product['id']}")->row();
                                            $balance = ($stock_info->stock_in + $stock_info->stock_return)-$stock_info->stock_out;
                                            echo "Stock-(".$balance.")";
                                        ?>
									</div>
								</div>
							</a>
							
						<?php }else{ ?>
							<a href="<?php echo base_url("/assets_new/img/product/noimage.jpg"); ?>" class="show-large-image"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" onclick="load_barcode('<?php echo $product['barcode_product']; ?>')">
								<div class="product">
									<img src="<?php echo base_url("/assets_new/img/product/noimage.jpg"); ?>" alt=""/>
									<div class="title">
										<?php
                                            echo $product['name'];
                                        ?> <br/>
                                        <?php
                                            $stock_info = $this->db->query("select SUM(stock.stock_in) AS stock_in,
                                                                                SUM(stock.stock_out) AS stock_out,
                                                                                SUM(stock.stock_return) stock_return
                                                                                from stock where stock.id_stock_product = {$product['id']}")->row();
                                            $balance = ($stock_info->stock_in + $stock_info->stock_return)-$stock_info->stock_out;
                                            echo "Stock-(".$balance.")";
										?>
									</div>
								</div>
							</a>
						<?php } ?>
						</div>
						<?php 
							}
						?>

						<div class="clearfix"></div>
					</div>

				</div>

			</div>

		</div>
		
		<div class="col-md-4" id="CartContainer">

			<div class="box box-default">

				<div class="box-header">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
						<input id="Barcode" type="text" class="form-control" placeholder="Barcode">
					</div>

					<div id="AddProductContainer">
					</div>
				</div>

				<div class="box-body no-padding">

					<div id="CartItems" class="product-lists"></div>
					<div id="CartEditItems" class="product-lists"></div>
					

				</div>

				<div class="box-footer button-block" style="padding-top:0">
					<table class="table no-margin no-border" id="SummaryTable" style="display:none">
						<tr class="text-red">
							<th colspan="2">Total</th>
							<th></th>
							<th class="text-right" style="width:70px"><span id="TotalQuantity"></span></th>
							<th class="text-right" style="width:60px"><span id="TotalPrice"></span></th>
							<th></th>
						</tr>
					</table>
					<div class="row">
						<div class="col-md-9">
							<a href="javascript:;" onclick="cart_complete_sell()" class="show-ajax-url btn bg-maroon btn-flat btn-block" id="sale_button">SALE</a>
						</div>
						<div class="col-md-3">
							<a href="javascript:;" onclick="clear_cart()" class="btn btn-default btn-flat btn-block">CLEAR ALL</a>
						</div>
					</div>
					
					<!--<div class="row">
						<div class="col-md-6">
							<a href="javascript:;" onclick="cart_add_to_stock()" class="btn btn-success btn-flat btn-block">Add to Stock</a>
						</div>
						<div class="col-md-6">
							<a href="javascript:;" onclick="cart_add_to_waste()" class="btn btn-success btn-flat btn-block">Add to Waste</a>
						</div>
					</div>-->
				</div>

			</div><!-- /.box -->

		</div>
				
				
			
			
	</section><!-- /.content -->
</div>
			
<script type="text/javascript">
	$(document).ready(function(){
		//load_temp_stock_list();
		$('#ProductContainer .box-body').height( $(window).height() - $('header').height() - $('#ProductContainer .box-header').height() - 70 );

		$('.product-list').slimScroll({
			'height': 'auto',
			'alwaysVisible': true,
			'distance': '-6px',
			'size': '5px'
		});
		$('.category-container').slimScroll({
			'height': '500px',
			'alwaysVisible': true,
			'distance': '1px',
			'size': '5px'
		});

		$('.floating-panel').on('click', function(){
			$(this).toggle('fade');
		});
		
		
        $('#Barcode').on('keydown', function(e){
            if(e.keyCode == 13) {
                add_product_to_cart();
            }
        });

        load_cart();

        $(window).resize(function(){
            reloadCartScroll();
        });	
	});
	
	
	
	jQuery.expr[':'].contains = function(a, i, m) {
		return jQuery(a).text().toUpperCase()
						.indexOf(m[3].toUpperCase()) >= 0;
	};
		
	$('#searchProduct').on('keyup', function(e){
		var text = $(this).val();
		if(text!=''){
			$('#AllProductsList .product-item').hide();
			$('#AllProductsList .product-item .title:contains("'+text+'")').closest('.product-item').show();
		}
		else{
			clear_filter();
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
	
	function clear_filter() {
        $('#AllProductsList').find('.product-item').show();
        $('#ProductContainer .box-header .col-md-7').removeClass('col-md-7').addClass('col-md-9');
        $('#ProductContainer .box-header .col-md-2').hide();
    }
	
	function reloadCartScroll() {
        var height = $(window).height() - $('header').height() - $('#CartContainer .box-header').height() - $('#CartContainer .box-footer').height() -74;
		//alert(height);
        $('#CartItems').slimScroll({
            'height': height,
            'alwaysVisible': true,
            'distance': '1px',
            'size': '5px'
        });
    }
	
	function showCategoryPanel() {
		$('.floating-panel').toggle('fade');
	}
	
	function load_barcode(code) {
        $('#Barcode').val(code);
        add_product_to_cart();
    }

    function add_product_to_cart() {
        var barcode = $('#Barcode').val();
		//alert(barcode);
		$('#Barcode').val('');
        if(barcode) {
            $.ajax({
			    'type': 'post',
				'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
				'data': {'action':'add_product_to_cart', 'barcode':barcode},
                'dataType': 'json',
                'success': function(response){
                    if(response.status) {
                        $('#AddProductContainer').html(response.html).slideDown('fast').find('input[name=quantity_product]').select();
                    }
                }
            });
        }
    }
	
	function hop_to_product_price(e) {
		
        if (e.keyCode == 13) {
            var a = $(e.target).closest('form').find('input[name=price_product]').select();
        }
    }
	
    function add_product_to_cart_confirm(e) {
        if (e.keyCode == 13) {
            $.ajax({
                'type': 'post',
                'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
                'data': $(e.target).closest('form').serialize() + '&action=add_product_to_cart_confirm',
                'dataType': 'json',
                'success': function(response){
                    if(response.status) {
                        $('#AddProductContainer').html('');
                        load_cart();
                    } else {

                    }
                }
            });
        }
    }
	
	function load_cart() {
        $.ajax({
            'type': 'post',
            'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
            'data': {'action':'cart_table_list'}, 
            'dataType': 'json',
            'success': function(response){
				
                if(response.status) {
                    $('#SummaryTable').show();
					//alert(response.total_quantity);
                    $('#CartItems').html(response.html);
                    $('#TotalQuantity').html(response.total_quantity);
                    $('#TotalPrice').html(response.total_price);
                    reloadCartScroll();
                } else {
                    $('#SummaryTable').hide();
                    $('#CartItems').html('');
                    reloadCartScroll();
                }
                setTimeout('reloadCartScroll', 1000);
            }
        });
    }
	
	function clear_cart() {

        if(confirm('Are you sure want to remove all items from cart?')) {
            $.ajax({
                'type': 'post',
				'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
				'data': {'action':'clear_cart'},
                'dataType': 'json',
                'success': function(response){
                    if(response.status) {
                        load_cart();
						window.location.reload();
                    } else { }
                }
            });
        }
    }
	
	function remove_cart_item(id) {
        if(id) {
            if(confirm('Are you sure want to delete this item from cart?')) {
                $.ajax({
                    'type': 'post',
					'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
					'data': {'action':'remove_cart_item', 'id_cart':id},
                    'dataType': 'json',
                    'success': function(response){
                        if(response.status) {
                            load_cart();
                        }
                    }
                })
            }
        }
    }
	
	function edit_cart_item(id) {
        $.ajax({
			'type': 'post',
			'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
			'data': {'action':'edit_cart_item', 'id_cart':id},
			'dataType': 'json',
			'success': function(response){
				if(response.status) {
					 $('#CartItems').html('');
                     $('#CartItems').html(response.edit_html);
					 $('#sale_button').removeAttr('disabled');
				}
			}
		})
    }
	
	function cart_add_to_stock() {
        if(confirm('Are you sure want to add these items to stock?')) {
            $.ajax({
                'type': 'post',
				'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
				'data': {'action':'cart_add_to_stock'},
                'dataType': 'json',
                'success': function(response){
                    if(response.status) {
                        load_cart();
                    }
                }
            })
        }
    }
	
	
	function cart_complete_sell() {
        
		$.ajax({
			'type': 'post',
			'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
			'data': {'action':'cart_complete_sell'},
			'dataType': 'json',
			'success': function(response){
				if(response.status) {
					//load_cart();
					$('#CartItems').append(response.html1);
					$('#sale_button').attr("disabled","disabled");
				}
			}
		})
       
		
    }
	
	

	
	function cart_add_to_waste() {
		if(confirm('Are you sure want to add these items to waste?')) {
            $.ajax({
                'type': 'post',
				'url': '<?php echo base_url("index.php/stock/pos/httpjson"); ?>',
				'data': {'action':'cart_add_to_waste'},
                'dataType': 'json',
                'success': function(response){
                    if(response.status) {
                        load_cart();
                    }
                }
            })
        }
    }
	
	function open_new_tab(url) {
		//alert(Niloy);
        var win = window.open(url, '_blank');
        if(win){
            win.focus();
        }else{
            //alert('Please allow popups for this site');
        }
    }
	
	
</script>
		
