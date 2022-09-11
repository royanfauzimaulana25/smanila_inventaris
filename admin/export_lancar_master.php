<?php
session_start();
if (!isset($_SESSION["login"])) {

    header("Location: ../index.php");
    exit;
} elseif ($_SESSION["role"] == "super") {
    header("Location: ../super_admin/index.php");
    exit;
};

require '../function.php';
?>
    <html>
        <head>
            <title>Export Laporan Master Barang</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        </head>

        <body>
        <div class="container">
                    <br>
                    <h2>Laporan Stok Barang </h2>
                    <h4>(Inventory)</h4>
                    
                    
                    <div class="data-tables datatable-dark">                            
                        <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
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
                                            barang.kd_satuan = satuan.kd_satuan
                                            "); 
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambildata)){ 
                                        $kodebarang = $data['kd_barang'];
                                        $namabarang = $data ['nama_barang']; 
                                        $kategori = $data['kategori']; 
                                        $stok = $data['stok'];
                                        $satuan = $data['satuan']; 
                                        ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$kodebarang;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$kategori;?></td>
                                            <td><?=$stok;?></td>
                                            <td><?=$satuan;?></td>
                                        </tr>
                                        <?php
                                    };
                                    ?>
                                        </tr>
                                    </tbody>
                                </table>
                                
                        </div>
        </div>
            
        <script>
        $(document).ready(function() {
            $('#mauexport').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            } );
        } );
        </script>
        

    </body>
    <script>
            if (window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
                }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    </html>