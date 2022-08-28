<?php
    require 'function.php';
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
    }
    // require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Master </title>
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
                                        <!-- Menu Kategori -->
                                        <a class="nav-link" href="kategori.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                            </svg>
                                            &nbsp; Kategori & Satuan
                                        </a>
                                        
                                        <!-- Menu Manajemen User -->
                                        <a class="nav-link" href="admin.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                            &nbsp; Settings
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
<!-- ////////////////////////////// -->
            <!-- Right Content Area -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Master</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SARANA & PRASARANA SMANILA</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php
                                $cekdata = mysqli_query($conn, "select * from barang where stok < 1"); 

                                while($fetch=mysqli_fetch_array($cekdata)){ 
                                    $barang = $fetch['nama_barang']
                                ?>
                                <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Perhatian ! </strong> Barang <?=$barang;?> Habis 
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        
                        <!-- column Tambah Barang -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahbarang">
                                    Input Barang
                                </button>
                                <a href="export_lancar_master.php" class="btn btn-info" target="_blank">Export Laporan</a>
                                <!-- The Modal Popup Tambah Barang-->
                                <div class="modal fade" id="tambahbarang">
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
                                                    <input type="text" name="kodebarang" placeholder="Kode Barang" class="form-control" require>
                                                    <br>
                                                    <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" require>
                                                    <br>
                                                        <select name = "kategori" class="form-control" id="kategori" >
                                                        <option value=''> Pilih Kategori </option>
                                                        <?php
                                                            $kategori = mysqli_query($conn,"SELECT * FROM kategori");
                                                            while($kategori_data=mysqli_fetch_array($kategori)){ 
                                                                echo '<option value="' .$kategori_data['kd_kategori']. '"> '.$kategori_data['kategori'].' </option>';
                                                            }; 
                                                        ?>
                                                        </select>
                                                        <br>
                                                    <input type="number" name="jumlah" value = 0 disabled placeholder="Jumlah" class="form-control" require>
                                                    <br>
                                                    
                                                    <select name = "satuan" class="form-control" id="satuan" >
                                                    <option value=''> Pilih Satuan </option>
                                                    <?php
                                                        $satuan = mysqli_query($conn,"SELECT * FROM satuan");
                                                        while($satuan_data=mysqli_fetch_array($satuan)){ 
                                                            echo '<option value="' .$satuan_data['kd_satuan']. '"> '.$satuan_data['satuan'].' </option>';
                                                        };
                                                    ?>
                                                    </select>
                                                    <br>
                                                    <button type="submit" class="btn btn-primary" name="tambahbarang">Submit</button>
                                                </div>
                                            </form>                                                
                                        </div>
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
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Satuan</th>
                                        <!-- <th>Barang Masuk</th>
                                        <th>Barang Keluar</th> -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <?php
                                        $ambildata = mysqli_query($conn,
                                        "SELECT 
                                        barang.`kd_barang` as kd_barang,
                                        barang.`nama_barang` as nama_barang,
                                        kategori.kategori as kategori,
                                        barang.`stok` as stok,
                                        satuan.`satuan` as satuan 
                                    FROM 
                                        barang
                                    INNER JOIN 
                                        kategori 
                                    ON 
                                        barang.kd_kategori = kategori.kd_kategori
                                    INNER JOIN 
                                        satuan
                                    ON
                                        barang.kd_satuan = satuan.kd_satuan"); 
                                        $i = 1;
                                        
                                        while($data=mysqli_fetch_array($ambildata)){ 
                                            $kodebarang = $data['kd_barang'];
                                            $namabarang = $data ['nama_barang']; 
                                            $kategori = $data['kategori']; 
                                            $stok = $data['stok'];
                                            $satuan = $data['satuan']; 
                                            // $barangmasuk =$data['id_masuk'];
                                            // $barangkeluar =$data['id_keluar'];
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$kodebarang;?></td>
                                        <td><?=$namabarang;?></td>
                                        <td><?=$kategori;?></td>
                                        <td><?=$stok;?></td>
                                        <td><?=$satuan;?></td>
                                        <td>
                                            <!-- Button Aksi Edit -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$kodebarang;?>">
                                                Edit
                                            </button>
                                            <!-- Button Aksi Hapus -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$kodebarang;?>">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit<?=$kodebarang;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Barang</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" >
                                                <br>
                                                <input type="number" name="jumlah" value = 0 disabled placeholder="Jumlah" class="form-control" >
                                                <br>
                                                <select name = "kategori" class="form-control" id="kategori" >
                                                    <option value=''> Pilih Kategori </option>
                                                    <?php
                                                        $kategori = mysqli_query($conn,"SELECT * FROM kategori");
                                                        while($kategori_data=mysqli_fetch_array($kategori)){ 
                                                            echo '<option value="' .$kategori_data['kd_kategori']. '"> '.$kategori_data['kategori'].' </option>';
                                                        } 
                                                    ?>
                                                </select>
                                                <br>
                                                        <select name = "satuan" class="form-control" id="satuan" >
                                                        <option value=''> Pilih Satuan </option>
                                                        <?php
                                                            $satuan = mysqli_query($conn,"SELECT * FROM satuan");
                                                            while($satuan_data=mysqli_fetch_array($satuan)){ 
                                                                echo '<option value="' .$satuan_data['kd_satuan']. '"> '.$satuan_data['satuan'].' </option>';
                                                            } 
                                                        ?>
                                                        </select>
                                                <br>
                                                <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>">
                                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                        <!-- unknown div here -->

                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete<?=$kodebarang;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            
                                            <!-- Delete Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang ?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Delete Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus <?=$namabarang;?> ? 
                                                    <input type="hidden" name="kodebarang" value="<?=$kodebarang;?>"><br><br>
                                                    <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
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
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> 
                                Copyright &copy; 2022 SMA YP UNILA Bandar Lampung
                            </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
    <!-- </div></div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>