<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data <?= $menu; ?>
            <a class="btn btn-primary btn-sm float-end" href="/laporan_yang_dibutuhkan/create">
                <i class="fas fa-solid fa-plus"></i>
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <!-- jika ada flash data -->
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <table id="datatablesSimple" class="data-profil">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanah Dan Bangunan</th>
                        <th>Kendaraan Bermotor</th>
                        <th>Peralatan Dan Mesin</th>
                        <th>Meubellair</th>
                        <th>Persediaan</th>
                        <th>Aset Lainnya</th>
                        <th>Laboratorium</th>
                        <th>Data Hibah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['tanah_dan_bangunan']; ?></td>
                            <td><?= $data['kendaraan_bermotor']; ?></td>
                            <td><?= $data['peralatan_dan_mesin']; ?></td>
                            <td><?= $data['meubellair']; ?></td>
                            <td><?= $data['persediaan']; ?></td>
                            <td><?= $data['aset_lainnya']; ?></td>
                            <td><?= $data['laboratorium']; ?></td>
                            <td><?= $data['data_hibah']; ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/laporan_yang_dibutuhkan/edit/<?= $data['id']; ?>">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="/laporan_yang_dibutuhkan/<?= $data['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('apakah anda yakin ingin dihapus?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>