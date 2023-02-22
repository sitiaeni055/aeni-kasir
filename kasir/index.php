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
				<li class="item" id="">
					<a href="home.php?halaman=produk" class="menu-btn">
						<i class="fa-solid  fa-store"></i><span>Transaksi</span>
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
					case 'menu-add':
						include "menu_add.php";
						break;
					case 'menu':
						include "menu.php";
						break;	
					default:
						echo "<center><h3>Maaf halaman tidak ditemukan</h3></center>";
						break;
				}
			}else{
				include "home.php";
			}
			?>
		</div>

