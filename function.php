<?php
$conn = mysqli_connect("localhost","root","","inventaris_smanila"); 



// ------------------- Aset Lancar -------------------------------


// tambah barang  ( master )

if(isset($_POST['tambahbarang'])){
    $kodebarang = $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $kategori = $_POST['kategori'];
    $jenis_aset = "1";
    
    $tambahbarang = mysqli_query($conn,"INSERT INTO barang VALUES ('$kodebarang', '$namabarang', '$jumlah', '$satuan','$kategori', '$jenis_aset')");
    
    if($tambahbarang){ 
        header('location:aset_lancar\master\master.php.php'); 
        echo 'Succes';
    } else{ 
        echo 'gagal';
        header('location:aset_lancar\master\master.php.php'); 
    }
}

// Update barang  ( master )
if(isset($_POST['update'])){ 
    $kodebarang = $_POST['kodebarang']; 
    $namabarang = $_POST['namabarang']; 
    $jumlah = $_POST['jumlah'];
    $kategori = $_POST['kategori'];
    $satuan = $_POST['satuan'];
    $jenis_aset = "1";

    $update = mysqli_query($conn,"
                UPDATE barang set 
                    nama_barang ='$namabarang', 
                    stok        ='$jumlah', 
                    kd_kategori    = '$kategori', 
                    kd_satuan      = '$satuan',
                    kd_aset     = '$jenis_aset'
                    WHERE kd_barang ='$kodebarang'"); 
                    
    if($update){ 
        header('location:master.php'); 
    } else{ 
        echo 'gagal';
        header('location:master.php'); 
    }
}


// Delete barang  ( master )
if(isset($_POST['delete'])){ 
    $kodebarang = $_POST['kodebarang']; 

    $hapus =mysqli_query($conn, "DELETE FROM barang where kd_barang='$kodebarang'"); 
    if($update){ 
        header('location:master.php'); 
    } else{ 
        echo 'gagal';
        header('location:master.php'); 

    }
} 

// Barang Masuk ===========================

// Tambah Barang Masuk  ( Barang Masuk )

if(isset($_POST['masuk_lancar'])){ 
    $tanggalmasuk = $_POST['timestamp'];
    $kdbarang = $_POST['barang']; 
    $jumlahmasuk = $_POST['jumlah_masuk'];

    $tambahbarangmasuk = mysqli_query($conn,"insert into pemasukan (tanggal_masuk, kd_barang, jumlah_masuk) values ('$tanggalmasuk', '$kdbarang', '$jumlahmasuk')");
    
    // Update Jumlah Stok Saat Barang Masuk
    $barang = mysqli_query($conn,"SELECT * FROM barang where kd_barang = $kdbarang");
    $barang_data=mysqli_fetch_array($barang);
    $stok = $barang_data['stok'] + $jumlahmasuk;

    $updatejumlahstok = mysqli_query($conn,"
    UPDATE barang set 
        stok        ='$stok'
        WHERE kd_barang ='$kdbarang'");

    // Redirect After Submit
    if($tambahbarangmasuk){ 
        header('location:masuk_lancar.php'); 
        echo 'Succes';
    } else{ 
        echo 'gagal';
        header('location:masuk_lancar.php'); 
    }
}

// update barang  ( Barang Masuk )
if(isset($_POST['update_masuk'])){ 
    $idmasuk = $_POST['id_masuk']; 
    $tanggalmasuk = $_POST['tanggal_masuk'];
    $kdbarang_masuk = $_POST['barang_masuk']; 
    $jumlahmasuk = $_POST['jumlah_masuk'];

    
    // Update Jumlah Stok di Tabel Barang Saat Edit Barang Masuk
    // Ambil data stok Sebelumnya 
    $barang = mysqli_query($conn,"SELECT * FROM barang where kd_barang = $kdbarang_masuk");
    $barang_data = mysqli_fetch_array($barang);
    $stok = $barang_data['stok'];
    
    // Ambil Data Barang Masuk Sebelumnya 
    $pemasukan = mysqli_query($conn,"SELECT * FROM pemasukan where id_masuk = $idmasuk");
    $pemasukan_data = mysqli_fetch_array($pemasukan);
    $jumlah_masuk_sebelumnya = $pemasukan_data['jumlah_masuk'];
    
    if($jumlah_masuk_sebelumnya > $jumlahmasuk){
        $stok_akhir = $stok - ($jumlah_masuk_sebelumnya - $jumlahmasuk);
        
        $updatejumlahstok = mysqli_query($conn,"
        UPDATE barang set 
        stok        ='$stok_akhir'
        WHERE kd_barang ='$kdbarang_masuk'"); 
    } else {
        $stok_akhir = $stok + ($jumlahmasuk - $jumlah_masuk_sebelumnya);
        
        $updatejumlahstok = mysqli_query($conn,"
        UPDATE barang set 
        stok        ='$stok_akhir'
        WHERE kd_barang ='$kdbarang_masuk'"); 
    };
    // Update Tabel Barang Masuk Saat Edit Barang Masuk
    $update = mysqli_query($conn,"
                UPDATE pemasukan set 
                    tanggal_masuk   = '$tanggalmasuk',
                    kd_barang       = '$kdbarang_masuk',
                    jumlah_masuk    = '$jumlahmasuk'
                    WHERE id_masuk  ='$idmasuk'"); 
    
    // Redirect After Submit
    if($update){ 
        header('location:masuk_lancar.php'); 
    } else{ 
        echo 'gagal';
        header('location:masuk_lancar.php'); 
    }
}

// hapus barang  ( Barang Masuk )
if(isset($_POST['delete_masuk'])){ 
    $idmasuk = $_POST['id_masuk']; 
    
    // Update Stok di Tabel Barang 
    
    // Ambili data di tabel pemasukan 
    $pemasukan = mysqli_query($conn,"SELECT * FROM pemasukan where id_masuk = $idmasuk");
    $pemasukan_data = mysqli_fetch_array($pemasukan);
    $jumlah_masuk_sebelumnya = $pemasukan_data['jumlah_masuk'];
    $kdbarang_masuk = $pemasukan_data['kd_barang'];
    
    // Ambil data di tabel barang //
    $barang = mysqli_query($conn,"SELECT * FROM barang where kd_barang = $kdbarang_masuk");
    $barang_data=mysqli_fetch_array($barang);  

    // Kalkulasi Perhitungan 
    $stok = $barang_data['stok'] - $jumlah_masuk_sebelumnya;

    $updatejumlahstok = mysqli_query($conn,"
        UPDATE barang set 
        stok        ='$stok'
        WHERE kd_barang ='$kdbarang_masuk'"); 

    // Delete data di tabel pemasukan 
    $hapus =mysqli_query($conn, "DELETE FROM pemasukan where id_masuk = '$idmasuk'"); 

    // Redirect After Submit
    if($update){ 
        header('location:masuk_lancar.php'); 
    } else{ 
        echo 'gagal';
        header('location:masuk_lancar.php'); 
    };

} 


// Barang Keluar ===========================


//  Input Barang Keluar
if(isset($_POST['keluar_lancar'])){ 
    $tanggalkeluar = $_POST['tanggal_keluar']; 
    $kdbarangkeluar = $_POST['barang_keluar']; 
    $jumlahkeluar = $_POST['jumlah_keluar'];
    $keterangan = $_POST['keterangan_keluar'];
    $penerima = $_POST['penerima'];


    // Ambil Data Barang
    $barang = mysqli_query($conn,"SELECT * FROM barang where kd_barang = $kdbarangkeluar");
    $barang_data=mysqli_fetch_array($barang);
    $stok = $barang_data['stok'];
    if ($stok < $jumlahkeluar) {
        echo '
            <script>
                alert("Stok Barang yang anda pilih tidak cukup")
                window.location.href="keluar_lancar.php";  
            </script>
        ';
    } else {
        $stok_akhir = $stok - $jumlahkeluar;
        $updatejumlahstok = mysqli_query($conn,"
        UPDATE barang set 
        stok        ='$stok_akhir'
        WHERE kd_barang ='$kdbarangkeluar'"); 

        // Tambah Data Barang Keluar 
        $tambahbarangkeluar = mysqli_query($conn,"
            INSERT INTO 
                pengeluaran (tanggal_keluar, kd_barang, jumlah_keluar, keterangan, penerima) 
            VALUES 
                ('$tanggalkeluar', '$kdbarangkeluar', '$jumlahkeluar', '$keterangan', '$penerima')");
                
                if($tambahbarangkeluar){ 
                    header('location:keluar_lancar.php'); 
                    echo 'Succes';
                } else{ 
                    echo 'gagal';
                    header('location:keluar_lancar.php'); 
                }
    }                        
    
}
//  Edit Barang Keluar
// if(isset($_POST['update_keluar'])){ 
//     $idkeluar = $_POST['id_keluar']; 
//     $tanggalkeluar = $_POST['tanggal_keluar'];
//     $kdbarangkeluar = $_POST['barang_keluar']; 
//     $jumlahkeluar = $_POST['jumlah_keluar'];
//     $keterangan = $_POST['keterangan'];
//     $penerima = $_POST['penerima'];

//     // Update Jumlah Stok di Tabel Barang Saat Edit Barang keluar
//     // Ambil data stok Sebelumnya 
//     $barang = mysqli_query($conn,"SELECT * FROM barang where kd_barang = $kdbarangkeluar");
//     $barang_data = mysqli_fetch_array($barang);
//     $stok = $barang_data['stok'];
    
//     // Ambil Data Barang keluar Sebelumnya 
//     $pengeluaran = mysqli_query($conn,"SELECT * FROM pengeluaran where id_keluar = $idkeluar");
//     $pengeluaran_data = mysqli_fetch_array($pengeluaran);
//     $jumlah_keluar_sebelumnya = $pengeluaran_data['jumlah_keluar'];
    
//     if($jumlah_keluar_sebelumnya > $jumlahkeluar){
//         $stok_akhir = $stok + ($jumlah_keluar_sebelumnya - $jumlahkeluar);
        
//         $updatejumlahstok = mysqli_query($conn,"
//         UPDATE barang set 
//         stok        ='$stok_akhir'
//         WHERE kd_barang ='$kdbarangkeluar'"); 

//     } else {
//         echo '
//         <script>
//             alert("Stok Barang yang anda pilih tidak cukup")
//             window.location.href="keluar_lancar.php";  
//         </script>
//     ';
//     };

//     $update = mysqli_query($conn,"
//                 UPDATE pengeluaran set 
//                     tanggal_keluar   = '$tanggalkeluar',
//                     kd_barang       = '$kdbarangkeluar',
//                     jumlah_keluar    = '$jumlahkeluar',
//                     keterangan = '$keterangan',
//                     penerima = '$penerima'
//                     WHERE id_keluar  ='$idkeluar'"); 
    
                    
//     if($update){ 
//         header('location:keluar_lancar.php'); 
//     } else{ 
//         echo 'gagal';
//         header('location:keluar_lancar.php'); 
//     }
// }

//  Delete Barang Keluar    
if(isset($_POST['delete_keluar'])){ 
    $idkeluar   = $_POST['id_keluar']; 

    
    // Ambil Data Barang keluar Sebelumnya 
    $pengeluaran = mysqli_query($conn,"SELECT * FROM pengeluaran where id_keluar = $idkeluar");
    $pengeluaran_data = mysqli_fetch_array($pengeluaran);
    $jumlah_keluar_sebelumnya = $pengeluaran_data['jumlah_keluar'];
    $kdbarangkeluar =  $pengeluaran_data['kd_barang'];

    //  Ambil data stok Sebelumnya 
    $barang = mysqli_query($conn,"SELECT * FROM barang where kd_barang = $kdbarangkeluar");
    $barang_data = mysqli_fetch_array($barang);
    $stok = $barang_data['stok'] + $jumlah_keluar_sebelumnya;
    $updatejumlahstok = mysqli_query($conn,"
        UPDATE barang set 
        stok        ='$stok'
        WHERE kd_barang ='$kdbarangkeluar'");

    $hapus =mysqli_query($conn, "DELETE FROM pengeluaran where id_keluar = '$idkeluar'"); 

    if($hapus){ 
        header('location:keluar_lancar.php'); 
    } else{ 
        echo 'gagal';
        header('location:keluar_lancar.php'); 

    }
}    


// ------------------- Kategori -------------------------------

// Tambah Kategori
if(isset($_POST['tambahkategori'])){
    $kdkategori = $_POST['kd_kategori'];
    $kategori = $_POST['kategori'];

    $tambahkategori = mysqli_query($conn,"insert into kategori (kategori) values ('$kategori')");
    
    if($tambahkategori){ 
        header('location:kategori.php'); 
        echo 'Succes';
    } else{ 
        echo 'gagal';
        header('location:kategori.php'); 
    }
}

// Hapus Kategori

if(isset($_POST['delete_kategori'])){ 
    $kdkategori   = $_POST['kode_kategori']; 
    $hapus_kategori =mysqli_query($conn, "DELETE FROM kategori where kd_kategori = '$kdkategori'"); 

    if($hapus_kategori){ 
        header('location:kategori.php'); 
    } else{ 
        echo 'gagal';
        header('location:kategori.php'); 

    }
}   

// ---------------------|| Kelola Admin [ Management User ] ||---------------------------------

    // Tambah admin

    // if(isset($_POST['tambahadmin'])){ 
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $adminbaru = mysqli_query($conn,"insert into login (email, password) values ('$email','$password')"); 

    //     if($adminbaru){
    //         header('location:admin.php'); 

    //     }else{

        
    //     header('location:admin.php'); 

    // }
    // }

// update admin 

//     if(isset($_POST['updateadmin'])){ 
//         $emailbaru = $_POST['emailbaru'];
//         $passwordbaru = $_POST['passwordbaru'];
//         $id = $_POST['id'];

//         $adminupdate = mysqli_query($conn,"update login set email='$emailbaru', password='$passwordbaru' where id='$id'"); 
           
//         if($adminupdate){
//             header('location:admin.php'); 

//         } else {
//              header('location:admin.php'); 

//     }

// }


// hapus admin 

//  if(isset($_POST['deleteadmin'])){ 
//     $id = $_POST['id'];

//     $admindelete = mysqli_query($conn,"delete from login where id='$id'"); 
       
//     if($admindelete){
//         header('location:admin.php'); 

//     } else {
//          header('location:admin.php'); 

// }
//  }


// ---------------------|| Kelola Login ||---------------------------------

if(isset($_POST['login'])){ 
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$email' and password='$password'"); 

    $hitung = mysqli_num_rows($cekdatabase); 

    if($hitung>0){ 
       $_SESSION['log'] = 'True'; 
       header('location:index.php'); 
       
    } else {
        
        header('location:login.php'); 
    };
};

    if(!isset($_SESSION['log'])){

    } else { 
        header('location:login.php'); 
    }


?>