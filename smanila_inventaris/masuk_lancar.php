<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aset Lancar - Barang Masuk</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <!-- Header -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
                <!-- Navbar Brand-->
                <a class="navbar-brand ps-3" href="index.php">SARPRAS SMANILA </a>
                <!-- Sidebar Toggle-->
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar Search-->
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    </li>
                </ul>
        </nav>
        <div id="layoutSidenav">
            <!-- Left Content Area -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- Sidebar Menu -->
                            <div class="sb-sidenav-menu-heading">MENU</div>
                                        <!-- Menu Dashboard -->
                                        <a class="nav-link" href="index.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                            Dashboard
                                        </a>

                                        <!-- Menu Aset Lancar -->
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                            Aset Lancar 
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                            <!-- Sub Menu Aset Lancar -->
                                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link" href="master.php">Data Master</a>
                                                    <a class="nav-link" href="masuk_lancar.php">Barang Masuk</a>
                                                    <a class="nav-link" href="keluar_lancar.php">Barang Keluar</a>
                                                    <a class="nav-link" href="kategori.php"> Kategori</a>
                                                    <a class="nav-link" href="satuan.php"> Satuan</a>
                                                </nav>
                                            </div>

                                        <!-- Menu Aset Tetap -->
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                            Aset Tetap
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                            <!-- Sub Menu Aset Tetap -->
                                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                                        Data Master   
                                                    </a>
                                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                        Barang Masuk 
                                                    </a>
                                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                        Peminjaman
                                                    </a>
                                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                                        Barang Rusak 
                                                    </a>
                                                    <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                        <nav class="sb-sidenav-menu-nested nav"></nav>
                                                    </div> -->
                                                </nav>
                                            </div>
                                        </a>
                                        
                                        
                                        <!-- Menu Manajemen User -->
                                        <a class="nav-link" href="admin.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                             Management User
                                        </a>

                                        <!-- Menu Logout -->
                                        <a class="nav-link" href="logout.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                            </svg>
                                            &nbsp;  Logout 
                                        </a>
                        </div>
                    </div>
                </nav>
            </div> 
                
            <!-- Right Content Area -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Aset Lancar - Barang Masuk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SARPRAS SMANILA </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body"></div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    Input Barang
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambahkan barang</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">                            
                                                <div class="modal-body">
                                                    <input type="date" name="timestamp" placeholder="Tanggal" class="form-control" required> 
                                                    <br>
                                                    <select name="barang" class="form-control"> 
                                                        <option value=''> Pilih Barang </option>
                                                            <?php
                                                                $ambildata = mysqli_query($conn, "select * from barang "); 
                                                                while($fetcharray = mysqli_fetch_array($ambildata)){ 
                                                                    $kodebarang = $fetcharray['kd_barang'];
                                                                    $namabarang = $fetcharray['nama_barang']; 

                                                            ?>
                                                        <option value="<?=$kodebarang;?>"><?=$namabarang;?></option>
                                                            <?php 
                                                                } 
                                                            ?>
                                                    </select>
                                                    <br>
                                                    <input type="text" name="jumlah_masuk" placeholder="Jumlah Barang Masuk" class="form-control" required>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="masuk_lancar">Submit</button>                            
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Content -->
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ambildata = mysqli_query($conn,
                                                "SELECT 
                                                pemasukan.id_masuk as id_masuk,
                                                pemasukan.tanggal_masuk as tanggal_masuk,
                                                barang.nama_barang as nama_barang,
                                                pemasukan.jumlah_masuk as jumlah_masuk
                                                FROM pemasukan
                                                INNER JOIN barang 
                                                    ON
                                                    pemasukan.kd_barang = barang.kd_barang;
                                                "); 
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambildata)){ 
                                                $idmasuk = $data['id_masuk'];
                                                $tanggal = $data['tanggal_masuk']; 
                                                $namabarang = $data ['nama_barang']; 
                                                $jumlahmasuk = $data['jumlah_masuk']; 
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$jumlahmasuk;?></td>
                                            <td>
                                                <!-- Button Aksi Edit -->
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_masuk<?=$idmasuk;?>">
                                                    Edit
                                                </button>
                                                <!-- Button Aksi Hapus -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_masuk<?=$idmasuk;?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit_masuk<?=$idmasuk;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Barang Masuk</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <!-- Input Tanggal Masuk -->
                                                                <input type="date" name="tanggal_masuk" placeholder="Tanggal" class="form-control" required> 
                                                                <br>

                                                                <!-- Input Barang Masuk -->                           
                                                                <select name="barang_masuk" class="form-control"> 
                                                                    <option value=''> Pilih Barang </option>
                                                                    <?php
                                                                        $barang = mysqli_query($conn,"SELECT * FROM barang");
                                                                        while($barang_data=mysqli_fetch_array($barang)){ 
                                                                            echo '<option value="' .$barang_data['kd_barang']. '"> '.$barang_data['nama_barang'].' </option>';
                                                                        } 
                                                                    ?>
                                                                </select>
                                                                <br>
                                                                <!-- Input Jumlah Masuk -->
                                                                <input type="text" name="jumlah_masuk" placeholder="Jumlah" class="form-control" >
                                                                <br>
                                                                <!-- Input Id Masuk -->
                                                                <input type="hidden" name="id_masuk" value="<?=$idmasuk;?>">
                                                                <!-- Submit Edit Masuk -->
                                                                <button type="submit" class="btn btn-primary" name="update_masuk">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                <!-- unknown div here -->

                                            <!--Delete Modal -->
                                            <div class="modal fade" id="delete_masuk<?=$idmasuk;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Delete Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data Pemasukan ?</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Delete Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus <?=$namabarang;?> ? 
                                                                <input type="hidden" name="id_masuk" value="<?=$idmasuk;?>"><br><br>                                                        
                                                                <button type="submit" class="btn btn-danger" name="delete_masuk">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            };
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2022 SMA YP UNILA Bandar Lampung </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                    &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>