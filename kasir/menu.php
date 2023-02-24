<div class="row mt-4 pt-4">
    <div class="col-md-8">
        <div class="card border-0 card-h-100">
            <div class="card-header border-0 d-flex justify-content-between">                 
                
                <h4 class="d-inline">
                    Recent orders
                </h3>
                <div class="dropdown">
                    <a href="" class="dropdown-toggle no-arrow text-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </a>
                    <div class="dropdown-menu">
                        <a href="javascript: void(0);" class="dropdown-item">
                            Export report
                        </a>
                        <a href="javascript: void(0);" class="dropdown-item">
                            Share
                        </a>
                        <a href="javascript: void(0);" class="dropdown-item">
                            Action
                        </a>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class=" h-50 table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Produk</td>
                            <td>Kategori</td>
                            <td>Harga</td>
                            <td>Stok</td>
                            <td>Gambar</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM menus
                    INNER JOIN kategoris
                    ON menus.kategori_id = kategoris.id ";
                    $result = $conn->query($sql);
                    $no = 1;
                    while ($row=$result->fetch_assoc()){
                        
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row["nama_menu"]?></td>
                            <td><?php echo $row["nama"]?></td>
                            <td><?php echo $row["harga"]?></td>
                            <td><?php echo $row["stock"]?></td>
                            <td><img width="70" src="../image/<?php echo $row["gambar"]?>" alt=""></td>
                            <td>
                                <a href="home.php?id=<?php echo $row['id']?>&halaman=delete"><button type="submit" class="btn btn-danger">Delete</button></a>
                                <a href="menu_edit_form.php?id=<?php echo $row['id']?>"><button type="submit" class="btn btn-primary">Edit</button></a>
                            
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                                            
            </div>
        </div>
    </div>
</div>



