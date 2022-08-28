<?php
require '../function.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
?>
    <html>
        <head>
            <title>Export Laporan </title>
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
                    <h2>Laporan Pengeluaran Barang </h2>
                    <h4>(Inventory)</h4>
                    
                    <div class="row">
                        <div class="col">
                            <form method="POST" class="form-inline">
                                <label><strong>From Date</strong></label>
                                <input type = "date" name="tgl_mulai" class="form-control ml-3 mr-3">
                                <label><strong>To Date</strong></label>
                                <input type = "date" name="tgl_selesai" class="form-control ml-3">
                                <button type="submit" name="filter" class="btn btn-info ml-3">Filter</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="data-tables datatable-dark">                            
                        <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Keterangan</th>
                                            <th>Penerima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($_POST['filter'])){
                                        $tgl_mulai = $_POST['tgl_mulai'];
                                        $tgl_selesai = $_POST['tgl_selesai'];
                                        
                                        if ($tgl_mulai != null || $tgl_selesai != null){
                                        $ambildata = mysqli_query($conn,
                                            "SELECT 
                                            pengeluaran.id_keluar AS id_keluar,
                                            pengeluaran.tanggal_keluar AS tanggal_keluar,
                                            barang.nama_barang AS nama_barang,
                                            pengeluaran.jumlah_keluar AS jumlah_keluar,
                                            pengeluaran.keterangan AS keterangan,
                                            pengeluaran.penerima AS penerima
                                        FROM 
                                            pengeluaran, barang
                                        WHERE 
                                        pengeluaran.`kd_barang` = barang.`kd_barang` 
                                        AND tanggal_keluar BETWEEN '$tgl_mulai' AND DATE_ADD('$tgl_selesai', interval 1 day)
                                            ");
                                        } else {
                                            $ambildata = mysqli_query($conn,
                                            "SELECT 
                                            pengeluaran.id_keluar AS id_keluar,
                                            pengeluaran.tanggal_keluar AS tanggal_keluar,
                                            barang.nama_barang AS nama_barang,
                                            pengeluaran.jumlah_keluar AS jumlah_keluar,
                                            pengeluaran.keterangan AS keterangan,
                                            pengeluaran.penerima AS penerima
                                        FROM 
                                            pengeluaran, barang
                                        WHERE 
                                        pengeluaran.`kd_barang` = barang.`kd_barang`
                                            "); 
                                        }
                                    } else {
                                        $ambildata = mysqli_query($conn,
                                            "SELECT 
                                            pengeluaran.id_keluar AS id_keluar,
                                            pengeluaran.tanggal_keluar AS tanggal_keluar,
                                            barang.nama_barang AS nama_barang,
                                            pengeluaran.jumlah_keluar AS jumlah_keluar,
                                            pengeluaran.keterangan AS keterangan,
                                            pengeluaran.penerima AS penerima
                                        FROM 
                                            pengeluaran, barang
                                        WHERE 
                                        pengeluaran.`kd_barang` = barang.`kd_barang`
                                            "); 
                                    };
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambildata)){ 
                                        $tanggalkeluar = $data['tanggal_keluar']; 
                                        $namabarang = $data ['nama_barang']; 
                                        $jumlahkeluar = $data['jumlah_keluar'];
                                        $keterangan = $data['keterangan']; 
                                        $penerima = $data['penerima']; 
                                        ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?php echo $tanggalkeluar;?></td>
                                            <td><?php echo$namabarang;?></td>
                                            <td><?php echo$jumlahkeluar;?></td>
                                            <td><?php echo$keterangan;?></td>
                                            <td><?php echo$penerima;?></td>
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