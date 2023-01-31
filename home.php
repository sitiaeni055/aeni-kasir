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
			    <h2><span>Oresto</span></h2>
			</div>
			<div class="sidebar-menu" id="">
				<li class="item">
					<a href="" class="menu-btn"><span>Dashboard</span> </a>
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						</i><span>Masakan</span>
					</a>
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						<span>Kategori Masakan<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						</i><span>Meja</span>
					</a>	
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						</i><span>Laporan</span>
					</a>	
				</li>
				<li class="item" id="">
					<a href="" class="menu-btn">
						</i><span>Transaksi</span>
					</a>	
				</li>
				<li class="item" id="">
					<a href="proses_logout.php" class="menu-btn">
						<span>Logout</span>
					</a>
				</li>
			</div>
		</div>
		<div class="maint-content">
			<header>
				<h2>
					<label for="nav-toggle">
						<span class="las la-bars"></span>
					</label>	    
				</h2>
			</header>
			<h3 class="a">Daftar Menu</h3>
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb b">
				<li class="breadcrumb-item"><a href="#">Kategori Masakan</a></li>
				<li class="breadcrumb-item active" aria-current="page">Masakan</li>
			</ol>
			</nav>
			<div class="card">
				
			</div>
		</div>
		