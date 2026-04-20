<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
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
                            <th>ID Transaksi</th>
                            <th>ID Mobil</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Total KM</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $t) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $t['id_transaksi']; ?></td>
                            <td><?= $t['id_mobil']; ?></td>
                            <td><?= $t['tanggal_masuk']; ?></td>
                            <td><?= $t['tanggal_keluar']; ?></td>
                            <td><?= number_format($t['total_km'], 0, ',', '.'); ?></td>
                            <td><?= number_format($t['total_harga'], 0, ',', '.'); ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-edit" 
                                    data-id="<?= $t['id_transaksi']; ?>"
                                    data-mobil="<?= $t['id_mobil']; ?>"
                                    data-masuk="<?= $t['tanggal_masuk']; ?>"
                                    data-keluar="<?= $t['tanggal_keluar']; ?>"
                                    data-km="<?= $t['total_km']; ?>"
                                    data-harga="<?= $t['total_harga']; ?>"
                                    data-toggle="modal" data-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('admin/transaksi/delete/' . $t['id_transaksi']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/transaksi/save') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kendaraan</label>
                        <select name="id_mobil" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            <?php foreach ($kendaraan as $k) : ?>
                                <option value="<?= $k['id_mobil']; ?>"><?= $k['nama_mobil']; ?> (<?= $k['no_polisi']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" name="tanggal_keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Total KM</label>
                        <input type="number" name="total_km" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" name="total_harga" class="form-control" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/transaksi/update') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" id="edit-id">
                    <div class="form-group">
                        <label>Kendaraan</label>
                        <select name="id_mobil" id="edit-mobil" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            <?php foreach ($kendaraan as $k) : ?>
                                <option value="<?= $k['id_mobil']; ?>"><?= $k['nama_mobil']; ?> (<?= $k['no_polisi']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="edit-masuk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" name="tanggal_keluar" id="edit-keluar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Total KM</label>
                        <input type="number" name="total_km" id="edit-km" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" name="total_harga" id="edit-harga" class="form-control" required>
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
            const mobil = $(this).data('mobil');
            const masuk = $(this).data('masuk');
            const keluar = $(this).data('keluar');
            const km = $(this).data('km');
            const harga = $(this).data('harga');

            $('#edit-id').val(id);
            $('#edit-mobil').val(mobil);
            $('#edit-masuk').val(masuk).change();
            $('#edit-keluar').val(keluar).change();
            $('#edit-km').val(km);
            $('#edit-harga').val(harga);
        });
    });
</script>
