<?php

session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

    // panggil koneksi database
    include "php/config.php";

    // Uji jika tombol tambah Aktivitas di klik
    if(isset($_POST['bsimpan'])){

        // persiapan Aktivitas baru 
        $simpan = mysqli_query($con, "INSERT INTO twarga (tanggal, uraian, ditulis, kelurahan, kecamatan)
                                        VALUES ('$_POST[ttanggal]',
                                                '$_POST[turaian]',
                                                '$_POST[tditulis]',
                                                '$_POST[tkelurahan]',
                                                '$_POST[tkecamatan]') ");
        // Jika simpan Aktivitas suksess
        if($simpan){
            echo "<script>
                    alert('Berhasil Menambahkan Aktivitas!');
                    document.location='home.php';        
                </script>";
        }else{
        echo "<script>
                    alert('Gagal Ditambahkan!');
                    document.location='home.php';        
                </script>";
        }

    }


    // panggil koneksi database
    include "php/config.php";

    // Uji jika tombol tambah Data Warga di klik
    if(isset($_POST['dtambah'])){

        // persiapan Data Warga baru 
        $simpan = mysqli_query($con, "INSERT INTO datawarga (nik, nama, alamat)
                                        VALUES ('$_POST[dnik]',
                                                '$_POST[dnama]',
                                                '$_POST[dalamat]') ");
        // Jika simpan Data Warga suksess
        if($simpan){
            echo "<script>
                    alert('Berhasil Menambahkan Data!');
                    document.location='warga.php';        
                </script>";
        }else{
        echo "<script>
                    alert('Gagal Ditambahkan!');
                    document.location='warga.php';        
                </script>";
        }

    }
    
    
    // Uji jika tombol Ubah Aktivitas di klik
    if(isset($_POST['bubah'])){

        // persiapan Ubah Aktivitas
        $ubah = mysqli_query($con, "UPDATE twarga SET 
                                                        tanggal = '$_POST[ttanggal]',
                                                        uraian = '$_POST[turaian]',
                                                        ditulis = '$_POST[tditulis]',
                                                        kelurahan = '$_POST[tkelurahan]',
                                                        kecamatan = '$_POST[tkecamatan]' 
                                                        WHERE id_warga = '$_POST[id_warga]'
                                                        ");


        // Jika simpan Aktivitas suksess
        if($ubah){
            echo "<script>
                    alert('Aktivitas berhasil diubah!');
                    document.location='home.php';        
                </script>";
        }else{
        echo "<script>
                    alert('Gagal Ubah Aktivitas!');
                    document.location='home.php';        
                </script>";
        }

    }
    
   
    // Uji jika tombol Ubah Data Warga di klik
    if(isset($_POST['dataubahwarga'])){

        // persiapan Ubah data Warga
        $ubah = mysqli_query($con, "UPDATE datawarga SET 
                                                        nik = '$_POST[dnik]',
                                                        nama = '$_POST[dnama]',
                                                        alamat = '$_POST[dalamat]'
                                                        WHERE id_warga = '$_POST[id_warga]'
                                                        ");


        // Jika simpan data Warga suksess
        if($ubah){
            echo "<script>
                    alert('Berhasil Mengubah Data!');
                    document.location='warga.php';        
                </script>";
        }else{
        echo "<script>
                    alert('Ubah data GAGAL!');
                    document.location='warga.php';        
                </script>";
        }

    }


// Uji jika tombol Hapus Aktivitas di klik
if (isset($_POST['bhapus'])) {

    // persiapan Hapus Aktivitas
    $hapus = mysqli_query($con, "DELETE FROM twarga WHERE id_warga = '$_POST[id_warga]' ");


    // Jika Hapus Aktivitas suksess
    if ($hapus) {
        echo "<script>
                    alert('Behasil Hapus Aktivitas!');
                    document.location='home.php';        
                </script>";
    } else {
        echo "<script>
                    alert('GAGAL hapus!');
                    document.location='home.php';        
                </script>";
    }
}


// Uji jika tombol Hapus Data Warga di klik
if (isset($_POST['dhapus'])) {

    // persiapan Hapus data Warga
    $hapus = mysqli_query($con, "DELETE FROM datawarga WHERE id_warga = '$_POST[id_warga]' ");


    // Jika Hapus Data Warga suksess
    if ($hapus) {
        echo "<script>
                    alert('Berhasil Hapus Data!');
                    document.location='warga.php';        
                </script>";
    } else {
        echo "<script>
                    alert('GAGAL Hapus!');
                    document.location='warga.php';        
                </script>";
    }
}
 
?>