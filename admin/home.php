<?php 
	session_start();
	include "../koneksi.php";
	
	include "../bot.php";
?>
<link rel="stylesheet" href="../style.css">
<input type="checkbox" id="nav-toggle" />
		<div class="sidebar">
			<div class="sidebar-brand">
			    	<h2><span>Oresto</span></h2>
			</div>
			<div class="sidebar-menu" id="body">
				<li class="item">
					<a href="home.php?halaman=menu" class="menu-btn"><i class='bx bxs-grid' ></i><span>Daftar Transaksi</span> </a>

				</li>
				
				<li class="item" id="orders">
					<a href="#orders" class="menu-btn">
						<i class="fa-solid  fa-store"></i><span>Master Data<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
            
					<div class="sub-menu">
						<a href=""><i class="las la-apple-alt"  style="font-size: 25px;"></i><span>Menu</span></a>
						<a href=""><i class='bx bx-cake' style="font-size: 25px;"></i><span>Meja</span></a>
						<a href="home.php?halaman=waiter">
							<i class="las la-coffee"  style="font-size: 25px;"></i><span>Waiter</span>
						</a>
						<a href="">
						<i class='bx bx-user' style="font-size: 25px;"></i><span>User</span>
						</a>
					</div>
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						<i class='bx bx-receipt' ></i><span>Laporan</span>
					</a>
				</li>
				<li class="item" id="">
					<a href="home.php?halaman=produk" class="menu-btn">
						<i class="fa-solid  fa-store"></i><span>Transaksi</span>
					</a>
				</li>
				<li class="item" id="">
					<a href="../proses_logout.php" class="menu-btn">
						<i class='bx bx-cog'></i><span>Logout</span>
					</a>
				</li>
			</div>
		</div>
		<div class="maint-content p-4">
			<header>
				<h2>
					<label for="nav-toggle">
						<span class="las la-bars"></span>
					</label>
				</h2>
			</header>
			
			<?php
			if (isset($_GET['halaman'])){
				$page = $_GET['halaman'];

				switch ($page) {
					case 'menu-add':
						include "menu_add.php";
						break;
					case 'menu':
						include "menu.php";
						break;
					case 'delete':
						include "menu_delete.php";
						break;
					case 'menu-edit':
						include "menu_edit_form.php";
						break;		
					case 'input-pelanggan':
						include "input_pelanggan.php";
						break;		
					case 'list-pelanggan':
						include "list_pelanggan.php";
						break;		
					case 'produk':
						include "product.php";
						break;		
					case 'keranjang_belanja':
						include "keranjang_belanja.php";
						break;		
					case 'deletekeranjang':
						include "keranjang_delete.php";
						break;		
					case 'bayar':
						include "checkout.php";
						break;		
					case 'waiter':
						include "waiter.php";
						break;		
					case 'waiter-delete':
						include "waiter_delete.php";
						break;		
					case 'waiter-add':
						include "waiter_add.php";
						break;		
					case 'waiter-edit':
						include "waiter_edit.php";
						break;		
					default:
						echo "<center><h3>Maaf halaman tidak ditemukan</h3></center>";
						break;
				}
			}else{
				include "menu.php";
			}
			?>
		</div>

