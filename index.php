<?php
require_once('init/index.php');
require_once('init/init.php');

$result = getPegawai();

require_once("head-admin.php");
?>

<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">Daftar Pegawai</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        </button>          
    </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Pegawai</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th> ID Pegawai </th>
                        <th> Nama </th>
                        <th> Tanggal lahir </th>
                        <th> Alamat </th>
                        <th> Foto </th>
                        <th> Aksi </th>
                    </thead>
                    <tbody>
                      <?php if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)):?>
                                <tr>
                                <td><?= $row['nomor']?></td>
                                <td><?= $row['nama']?></td>
                                <td><?= $row['tanggal_lahir']?></td>
                                <td><?= $row['alamat']?></td>
                                <td>
                                    <img src="upload/<?= $row['gambar'] ?>" alt="<?= $row['gambar'] ?>" class="gambar-table" width=100px; height="100px">
                                </td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'];?>"  class="btn btn-sm btn-primary">Edit</a>
                                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                </tr>
                        <?php endwhile;
                             }?>
                      </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<?php require_once("footer-admin.php") ?>
  