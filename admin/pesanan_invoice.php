<style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<?php $id = $_GET["id"] ?>
<?php  $sql = "SELECT pesanan_details.id, pesanan_details.pesanan_id, pesanan_details.jumlah, menus.nama_menu, menus.harga FROM pesanan_details INNER JOIN menus ON pesanan_details.menu_id = menus.id WHERE pesanan_details.pesanan_id='$id'" ?>
<?php $result = $conn->query($sql);?>
<div class="container p-4 my-4">
    <div class="row">
	<fieldset id="print">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="ms-auto">Order # 12345</h3>
    		</div>
    		<hr>
			<?php $sqlpesanan = "SELECT * FROM pesanans WHERE id='$id'" ?>
			<?php $resultpesanan = $conn->query($sqlpesanan);?>
			<?php $pemesan = $resultpesanan->fetch_assoc() ?>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Pesanan Atas Nama :</strong><br>
    					<?php echo $pemesan["nama_pelanggan"] ?><br>
    					<?php echo $pemesan["tanggal"] ?><br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="card p-4">
    			<div class="card-heading">
    				<h3 class="card-title"><strong>Detail Pesanan</strong></h3>
    			</div>
    			<div class="card-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Menu</strong></td>
        							<td class="text-right"><strong>Harga</strong></td>
        							<td class="text-center"><strong>Jumlah</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    						<?php while($menu = $result->fetch_assoc()) : ?>
    							<tr>
    								<td><?php echo $menu['nama_menu']?></td>
    								<td class="text-right">Rp. <?php echo $menu['harga']?></td>
    								<td class="text-center"><?php echo $menu['jumlah']?></td>
    								<td class="text-right"><?php echo $menu['harga']*$menu['jumlah']?></td>
    							</tr>
								<?php endwhile ?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right"><strong><?php echo $pemesan["total"] ?></strong></td>
    							</tr>
    							
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
		</fieldset>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript">
    function printDiv (el) {
    var a= document.body.innerHTML;
    var b= document.getElementById(el).innerHTML;

    document.body.innerHTML=b;
    window.print();
    dokument.body.innerHTML=a;
    }
</script>