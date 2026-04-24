<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Kendaraan</h6>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus fa-sm"></i> Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Mobil</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Mobil</th>
                            <th>No Polisi</th>
                            <th>Merek Mobil</th>
                            <th>Tipe Mobil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kendaraan as $k) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $k['id_mobil']; ?></td>
                            <td><?= $k['id_pelanggan']; ?></td>
                            <td><?= $k['nama_mobil']; ?></td>
                            <td><?= $k['no_polisi']; ?></td>
                            <td><?= $k['merek_mobil']; ?></td>
                            <td><?= $k['tipe_mobil']; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-edit" 
                                    data-id="<?= $k['id_mobil']; ?>"
                                    data-pelanggan="<?= $k['id_pelanggan']; ?>"
                                    data-nama="<?= $k['nama_mobil']; ?>"
                                    data-polisi="<?= $k['no_polisi']; ?>"
                                    data-merek="<?= $k['merek_mobil']; ?>"
                                    data-tipe="<?= $k['tipe_mobil']; ?>"
                                    data-toggle="modal" data-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('admin/kendaraan/delete/' . $k['id_mobil']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kendaraan/save') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="id_pelanggan" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php foreach ($pelanggan as $p) : ?>
                                <option value="<?= $p['id_pelanggan']; ?>"><?= $p['nama_pelanggan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Mobil</label>
                        <input type="text" name="nama_mobil" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" name="no_polisi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Merek Mobil</label>
                        <input type="text" name="merek_mobil" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tipe Mobil</label>
                        <input type="text" name="tipe_mobil" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kendaraan/update') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_mobil" id="edit-id">
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="id_pelanggan" id="edit-pelanggan" class="form-control" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php foreach ($pelanggan as $p) : ?>
                                <option value="<?= $p['id_pelanggan']; ?>"><?= $p['nama_pelanggan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Mobil</label>
                        <input type="text" name="nama_mobil" id="edit-nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Polisi</label>
                        <input type="text" name="no_polisi" id="edit-polisi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Merek Mobil</label>
                        <input type="text" name="merek_mobil" id="edit-merek" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tipe Mobil</label>
                        <input type="text" name="tipe_mobil" id="edit-tipe" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<!-- Page level plugins -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        // Use event delegation for buttons inside DataTables
        $('#dataTable').on('click', '.btn-edit', function() {
            const id = $(this).data('id');
            const pelanggan = $(this).data('pelanggan');
            const nama = $(this).data('nama');
            const polisi = $(this).data('polisi');
            const merek = $(this).data('merek');
            const tipe = $(this).data('tipe');

            $('#edit-id').val(id);
            $('#edit-pelanggan').val(pelanggan);
            $('#edit-nama').val(nama);
            $('#edit-polisi').val(polisi);
            $('#edit-merek').val(merek);
            $('#edit-tipe').val(tipe);
        });
    });
</script>
