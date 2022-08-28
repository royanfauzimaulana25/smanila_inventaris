<?php
require '../function.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
?>
    <html>
        <head>
            <title>Export Laporan Pemasukan</title>
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
                    <h2>Laporan Pemasukan Barang </h2>
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
                                            <th>Tanggal Masuk</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Kategori</th>
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
                                            pemasukan.id_masuk AS id_masuk,
                                            pemasukan.tanggal_masuk AS tanggal_masuk,
                                            barang.nama_barang AS nama_barang,
                                            pemasukan.jumlah_masuk AS jumlah_masuk,
                                            kategori.`kategori` AS kategori
                                        FROM 
                                            pemasukan, barang, kategori
                                        WHERE 
                                        barang.`kd_barang` = pemasukan.`kd_barang` AND kategori.`kd_kategori` = barang.`kd_kategori` 
                                        AND tanggal_masuk BETWEEN '$tgl_mulai' AND DATE_ADD('$tgl_selesai', interval 1 day)
                                            ");
                                        } else {
                                            $ambildata = mysqli_query($conn,
                                            "SELECT 
                                            pemasukan.id_masuk AS id_masuk,
                                            pemasukan.tanggal_masuk AS tanggal_masuk,
                                            barang.nama_barang AS nama_barang,
                                            pemasukan.jumlah_masuk AS jumlah_masuk,
                                            kategori.`kategori` AS kategori
                                        FROM 
                                            pemasukan, barang, kategori
                                        WHERE 
                                        barang.`kd_barang` = pemasukan.`kd_barang` AND kategori.`kd_kategori` = barang.`kd_kategori`
                                            "); 
                                        }
                                    } else {
                                        $ambildata = mysqli_query($conn,
                                            "SELECT 
                                            pemasukan.id_masuk AS id_masuk,
                                            pemasukan.tanggal_masuk AS tanggal_masuk,
                                            barang.nama_barang AS nama_barang,
                                            pemasukan.jumlah_masuk AS jumlah_masuk,
                                            kategori.`kategori` AS kategori
                                        FROM 
                                            pemasukan, barang, kategori
                                        WHERE 
                                        barang.`kd_barang` = pemasukan.`kd_barang` AND kategori.`kd_kategori` = barang.`kd_kategori`
                                            "); 
                                    };
                                    $i = 1;
                                            while($data=mysqli_fetch_array($ambildata)){ 
                                                $idmasuk = $data['id_masuk'];
                                                $tanggal = $data['tanggal_masuk']; 
                                                $namabarang = $data ['nama_barang']; 
                                                $jumlahmasuk = $data['jumlah_masuk']; 
                                                $kategori = $data['kategori']; 
                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$jumlahmasuk;?></td>
                                            <td><?=$kategori;?></td>
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