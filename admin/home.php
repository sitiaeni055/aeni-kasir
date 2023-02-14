<?php 
	session_start();
	include "../koneksi.php";
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
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
					<a href="home.php?halaman=list-produk" class="menu-btn"><i class='bx bxs-grid' ></i><span>Dashboard</span> </a>

				</li>
				<li class="item" id="">
					<a href="home.php?halaman=input-pelanggan" class="menu-btn">
						<i class="fa-solid  fa-store"></i><span>Input Pelanggan</span>
					</a>
				</li>
				<li class="item" id="">
					<a href="home.php?halaman=list-pelanggan" class="menu-btn">
						<i class='bx bx-receipt' ></i><span>List Pelanggan</span>
					</a>
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						<i class='bx bx-receipt' ></i><span>Laporan</span>
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
					case 'tambah_produk':
						include "produk_add_form.php";
						break;
					case 'list-produk':
						include "product_list.php";
						break;
					case 'delete':
						include "produk_delete.php";
						break;
					case 'edit':
						include "produk_edit_form.php";
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
					default:
						echo "<center><h3>Maaf halaman tidak ditemukan</h3></center>";
						break;
				}
			}else{
				include "product_list.php";
			}
			?>
		</div>

