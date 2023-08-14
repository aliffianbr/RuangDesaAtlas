<?php

session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Ruang Desa Atlas</a></p>
        </div>

        <div class="right-links">

            <a href='home.php'>Aktivitas</a>
            <a href='warga.php'>Data Warga</a>

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }

            echo "<a href ='edit.php?=$res_id'>Ubah Profil</a>";

            ?>

            <a href="php/logout.php"> <button class="btn">Keluar</button></a>

        </div>
    </div>


    <div class="containerdata">
        <div class="card">
            <div class="card-header bg-dark bg-gradient text-white">
                DATA WARGA
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary bg-primary bg-gradient mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data Warga
                </button>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>#</th>
                    </tr>


                    <?php

                    // persiapan menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($con, "SELECT * FROM datawarga ORDER BY id_warga DESC");
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nik'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td>
                                <a href="#" class="btn bg-warning bg-gradient text-white" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">UBAH</a>
                                <a href="#" class="btn bg-danger bg-gradient text-white" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">HAPUS</a>
                            </td>
                        </tr>


                        <!-- Awal Modal Ubah -->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Data Warga</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_warga" value="<?= $data['id_warga'] ?>">

                                        <div class="modal-body">


                                            <div class="mb-3">
                                                <label class="form-label">NIK</label>
                                                <input type="number" class="form-control" name="dnik" value="<?= $data['nik'] ?>" placeholder="Masukan NIK">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">NAMA</label>
                                                <input type="text" class="form-control" name="dnama" value="<?= $data['nama'] ?>" placeholder="Masukan Nama">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">ALAMAT</label>
                                                <input type="text" class="form-control" name="dalamat" value="<?= $data['alamat'] ?>" placeholder="Masukan Alamat">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary bg-warning bg-gradient" name="dataubahwarga">UBAH</button>
                                            <button type="button" class="btn btn-secondary bg-primary bg-gradient" data-bs-dismiss="modal">KEMBALI</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Ubah -->



                        <!-- Awal Modal Hapus -->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_warga" value="<?= $data['id_warga'] ?>">

                                        <div class="modal-body">

                                            <h5 class="text-center"> Anda yakin menghapus Data ini?<br>
                                                <span class="text-danger">NIK <?= $data['nik'] ?> NAMA <?= $data['nama'] ?></span>

                                            </h5>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary bg-danger bg-gradient" name="dhapus">HAPUS</button>
                                            <button type="button" class="btn btn-secondary bg-primary bg-gradient" data-bs-dismiss="modal">KEMBALI</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Hapus -->

                    <?php endwhile;  ?>
                </table>



                <!-- Awal Modal Tambah -->
                <div class="modal fade modal" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Warga</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="aksi_crud.php">
                                <div class="modal-body">


                                    <div class="mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="number" class="form-control" name="dnik" placeholder="Masukan NIK">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="dnama" placeholder="Masukan Nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="dalamat" placeholder="Masukan Alamat">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary bg-primary bg-gradient" name="dtambah">Tambahkan</button>
                                    <button type="button" class="btn btn-secondary bg-danger bg-gradient" data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah -->

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>