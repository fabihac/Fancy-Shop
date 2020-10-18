
<aside class="main-sidebar hidden-print " >
        <section class="sidebar" id="sidebar-scroll">
            <div class="user-panel">
			<?php 
				$conn = mysqli_connect("localhost", "root", "", "fancyshop");
				$result = mysqli_query($conn, "SELECT first_name, last_name ,image FROM admin where admin_id = ".$_SESSION["logged_admin"]);
				while($row = mysqli_fetch_array($result))
				{
					$admin = $row['first_name']." ".$row['last_name'];
					$image = $row['image'];
				}
			?>
                <div class="f-left image"><img src="<?php echo $image ?>" alt="User Image" class="img-circle"></div>
                <div class="f-left info">
					
                    <p><?php echo $admin; ?></p>
                    <p class="designation">UX Designer <i class="icofont icofont-caret-down m-l-5"></i></p>
                </div>
            </div>
            <!-- sidebar profile Menu-->
            
            <ul class="sidebar-menu">
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="index.php">
                        <i class="icon-speedometer"></i><span> Dashboard</span><i class="icon-arrow-down"></i>
                    </a>
                </li>
              
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>Product Category</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="form_category.php"><i class="icon-arrow-right"></i> Category Add</a></li>
                        <li><a class="waves-effect waves-dark" href="view_category_list.php"><i class="icon-arrow-right"></i> Categories</a></li>
                    </ul>
                </li>
				
				<li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-briefcase"></i><span>Products</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="form_product.php"><i class="icon-arrow-right"></i> Product Add</a></li>
                        <li><a class="waves-effect waves-dark" href="view_product_list.php"><i class="icon-arrow-right"></i> Products</a></li>
                    </ul>
                </li>
				
				<li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-user"></i><span>Admins</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="form_admin.php"><i class="icon-arrow-right"></i> Admin Add</a></li>
                        <li><a class="waves-effect waves-dark" href="view_admin_list.php"><i class="icon-arrow-right"></i> Admins</a></li>
                    </ul>
                </li>
				
				<li class="treeview"></a>
                    <a class="waves-effect waves-dark" href="view_cart_list.php">
                        <i class="icon-speedometer"></i><span> Cart List</span><i class="icon-arrow-down"></i>
                    </a>
                </li>
				
				<li class="treeview"></a>
                    <a class="waves-effect waves-dark" href="view_order_list.php">
                        <i class="icon-speedometer"></i><span> Order List</span><i class="icon-arrow-down"></i>
                    </a>
                </li>
				

                
            </ul>
        </section>
    </aside>