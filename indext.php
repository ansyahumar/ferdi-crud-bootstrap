<?php
// Panggil koneksi database
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD - PHP & MySQL Bootstrap 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="mt-3">
      <h3 class="text-center">CRUD - PHP & MySQL </h3>
      <h3 class="text-center">Ferdiansyah Umar</h3>
    </div>

    <div class="card mt-3">
      <div class="card-header bg-primary text-white header-text">
        Data Mahasiswa
      </div>
      <div class="card-body" style="display: flex; justify-content: center;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
          Tambah Data
        </button>

        <table class="table table-bordered table strip table-hover mx-auto">
          <tr>
            <th>No.</th>
            <th>Nim.</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Aksi</th>
          </tr>

          <?php
          // Persiapan menampilkan data
          $no = 1;
          $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
          while ($data = mysqli_fetch_array($tampil)) :
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nim'] ?></td>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['alamat'] ?></td>
              <td><?= $data['prodi'] ?></td>
              <td>
                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
              </td>
            </tr>

<!--awal Modal ubah -->
<div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form data mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">

      <div class="modal-body">
       
        
        <div class="mb-3">
          <label class="form-label">NIM</label>
          <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>" placeholder="Masukan NIM anda">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukan NamaLengkap anda">
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
           <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat'] ?></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Prodi</label>
          <select class="form-select" name="tprodi">
            <option value="<?= $data['prodi'] ?>"><?= $data['prodi'] ?></option>
            <option value="D3 - Management Informatika">D3 - Management Informatika</option>
            <option value="s1 - Sistem Informasi">s1 - Sistem Informasi</option>
            <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bubah">ubah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--akhir Modal ubah -->

<!--awal Modal hapus -->
<div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="aksi_crud.php">
        <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">

      <div class="modal-body">
       
          <h5 class="text-center"> apakah anda yakin akan menghapus data ini? <br>
          <span class="text-danger"><?=$data['nim']?> - <?=$data['nama'] ?></span>
        </h5>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bhapus">iya</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">tidak</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--akhir Modal hapus -->

        <?php endwhile; ?>
      </table>

<!--awal Modal -->
<div class="modal fade" id="modaltambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form data mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="aksi_crud.php">
      <div class="modal-body">
       
        
        <div class="mb-3">
          <label class="form-label">NIM</label>
          <input type="text" class="form-control" name="tnim" placeholder="Masukan NIM anda">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" name="tnama" placeholder="Masukan NamaLengkap anda">
        </div>

        <div class="mb-3">
          <label class="form-label">Alamat</label>
           <textarea class="form-control" name="talamat" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Prodi</label>
          <select class="form-select" name="tprodi">
            <option></option>
            <option value="D3 - Management Informatika">D3 - Management Informatika</option>
            <option value="s1 - Sistem Informasi">s1 - Sistem Informasi</option>
            <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--akhir Modal -->
</div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>