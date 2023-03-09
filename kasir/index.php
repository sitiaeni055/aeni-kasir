<?php 
	session_start();
	if ($_SESSION['role']=="") {
		header("location:../login.php?pesan=gagal");
	}
	include "../koneksi.php";
	
	include "../bot.php";
?>
<link rel="stylesheet" href="../style.css">
<input type="checkbox" id="nav-toggle" />
		<div class="sidebar">
			<div class="sidebar-brand">
			    	<h2><span>Oresto</span></h2>
			</div>
			<div class="sidebar-menu">
				
				<li class="item" id="transaksi">
					<a href="#transaksi" class="menu-btn">
						<i class="fa-solid  fa-store"></i><span>Transaksi<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
					<div class="sub-menu">
						<a href="?kasir=pesanan"><i class="las la-apple-alt"  style="font-size: 25px;"></i><span>Daftar Transaksi</span></a>
						<a href="index.php"><i class='bx bx-cake' style="font-size: 25px;"></i><span>Add Transaksi</span></a>
					</div>
				</li>
				<li class="item" id="">
					<a href="?kasir=laporan" class="menu-btn">
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
			if (isset($_GET['kasir'])){
				$page = $_GET['kasir'];

				switch ($page) {
					case 'menu-add':
						include "menu_add.php";
						break;
					case 'menu':
						include "menu.php";
						break;	
					case 'pesanan':
						include "pesanan.php";
						break;
					case 'laporan':
						include "laporan.php";
						break;
					case 'pesanan-invoice':
						include "pesanan_invoice.php";
						break;
					case 'pesanan-delete':
						include "pesanan_delete.php";
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

