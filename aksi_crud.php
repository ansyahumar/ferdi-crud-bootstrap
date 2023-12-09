<?php

//panggil koneksi database
include "koneksi.php";

//Uji jika tombol simpan di klik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
                                       VALUES  ('$_POST[tnim]',
                                                '$_POST[tnama]',
                                                '$_POST[talamat]',
                                                '$_POST[tprodi]') ");
    //jika simpan sukses
     if($simpan){
        echo "<script>
                alert('Simpan data Sukses!');
                document.location='indext.php';
              </script>";
    } else {
        echo "<script>
              alert('Simpan data gagal!');
              document.location='indext.php';
             </script>"; 
    }
}


//Uji jika tombol ubah di klik
if (isset($_POST['bubah'])) {

    //persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET 
                                                nim = '$_POST[tnim]',
                                                nama = '$_POST[tnama]',
                                                alamat = '$_POST[talamat]',
                                                prodi = '$_POST[tprodi]'
                                            WHERE id_mhs = '$_POST[id_mhs]'
                                                ");


    //jika ubah sukses
     if($ubah){
        echo "<script>
                alert('ubah data Sukses!');
                document.location='indext.php';
              </script>";
    } else {
        echo "<script>
              alert('ubah data gagal!');
              document.location='indext.php';
             </script>"; 
    }
}


//Uji jika tombol hapus di klik
if (isset($_POST['bhapus'])) {

    //persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]' ");


    //jika hapus sukses
     if($hapus){
        echo "<script>
                alert('Hapus data Sukses!');
                document.location='indext.php';
              </script>";
    } else {
        echo "<script>
              alert('Hapus data gagal!');
              document.location='indext.php';
             </script>"; 
    }
}
