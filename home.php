<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>

<?php
    include "bot.php";
?>

<input type="checkbox" id="nav-toggle" />
		<div class="sidebar">
			<div class="sidebar-brand">
			    	<h2><i class="fas fa-cake-candles"></i><span>Desert Box</span></h2>
			</div>
			<div class="sidebar-menu" id="body">
				<li class="item">
					<a href="index" class="menu-btn"><i class='bx bxs-grid' ></i><span>Dashboard</span> </a>
				</li>
				<li class="item" id="orders">
					<a href="#orders" class="menu-btn">
						<i class="fa-solid  fa-store"></i><span>Product</span>
					</a>
				</li>
				<li class="item" id="testimoni">
					<a href="#testimoni" class="menu-btn">
						<i class="fa-solid fa-eye"></i><span>Customers</span>
					</a>
				</li>
				<li class="item" id="product">
					<a href="#product" class="menu-btn">
						<i class='bx bx-receipt' ></i><span>Orders</span>
					</a>
					
				</li>
				<li class="item" id="settings">
					<a href="proses_logout.php" class="menu-btn">
						<i class='bx bx-cog'></i><span>Logout</span>
					</a>
					
				</li>
			</div>
		</div>
		