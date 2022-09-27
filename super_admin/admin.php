<?php
session_start();

if (!isset($_SESSION["login"])) {

    header("Location: ../index.php");
    exit;
} elseif ($_SESSION["role"] == "admin") {
    header("Location: ../admin/index.php");
    exit;
};


require '../function.php';
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
        <link href="../css/styles.css" rel="stylesheet" />
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

                                        <!-- Menu Kategori -->
                                        <a class="nav-link" href="kategori.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                                         Kategori 
                                        </a>

                                        <!-- Menu Kategori -->
                                        <a class="nav-link" href="satuan.php">
                                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                          Satuan
                                        </a>
                                        
                                        <!-- Menu Manajemen User -->
                                        <a class="nav-link" href="admin.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                            Management User
                                        </a>

                                        <!-- Menu Logout -->
                                        <a class="nav-link" href="../logout.php">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                            </svg>
                                            &nbsp; Logout 
                                        </a>
                        </div>
                    </div>
                </nav>
            </div> 

            <!-- Right Content Area -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SARANA & PRASARANA SMANILA</li>
                        </ol>                        
                        <!-- column Tambah admin -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahadmin">Tambah admin</button>
                                
                                
                                <!-- The Modal Popup Tambah Kategori-->
                                <div class="modal fade" id="tambahadmin">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Admin</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    <input type="text" name="email" placeholder="Email" class="form-control" require>
                                                    <br>
                                                    <input type="password" name="password" placeholder="Email" class="form-control" require>   
                                                    <br>
                                                    <select name = "role" class="form-control" id="role" require>
                                                            <option value = '' selected disabled hidden> Pilih Role </option>
                                                            <option value="super"> Super </option>
                                                            <option value="admin"> Admin </option>
                                                    </select>        
                                                        <br>                                         
                                                    <button type="submit" class="btn btn-primary" name="tambahadmin">Submit</button>
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
                                        <th>email</th>
                                        <th>password</th>
                                        <th>role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <?php
                                        $ambildata = mysqli_query($conn,
                                        "SELECT * FROM login"); 
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambildata)){ 
                                            $id = $data['id'];
                                            $email = $data['email'];
                                            $password = $data['PASSWORD'];
                                            $role = $data['role'];
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$email;?></td>
                                        <td><?=$password;?></td>
                                        <td><?=$role;?></td>
                                        
                                        <td>                                            
                                            <!-- Button Aksi Hapus -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$id;?>">
                                                Hapus
                                            </button>
                                                                                   
                                            <!-- Button Aksi edit -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$id;?>">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                
                                <!-- Delete Modal -->
                                <div class="modal fade" id="delete<?=$id;?>">
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
                                                    Apakah anda yakin ingin menghapus <bold> <?=$email;?> </bold> ? 
                                                    <input type="hidden" name="id" value="<?=$id;?>"><br><br>
                                                    <button type="submit" class="btn btn-danger" name="deleteadmin">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit<?=$id;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Admin</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                                <input type="email" name="email" value="<?=$email;?>" class="form-control" require >
                                                <br>
                                                <input type="password" name="password" placeholder="Password" value="<?=$password;?>"class="form-control" require>                                                
                                                <br>
                                                <select name = "role" class="form-control" id="role" >
                                                    <option value=''> Pilih Role </option>
                                                    <option value="super"> Super </option>
                                                    <option value="admin"> Admin </option>
                                                </select>
                                                <input type="hidden" name="id" value="<?=$id;?>">
                                                <br>
                                                <button type="submit" class="btn btn-primary" name="updateadmin">Submit</button>
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
                            <br>                            
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"> 
                                Copyright &copy; Your Website 2022
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
