<?php 
	session_start();
	include "../koneksi.php";
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
	?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form login</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.3/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <link rel="stylesheet" href="../style.css">
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
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
            <div class="row bg-danger" style="margin-top: 100px;">
                <div class="col-md-2 p-4" style="max-width: 500px;">
                <header>
				<h2>
					<label for="nav-toggle">
						<span class="las la-bars"></span>
					</label>	    
				</h2>
			</header>
                hhhhhhh
                </div>
            </div>
			
			
		</div>
		