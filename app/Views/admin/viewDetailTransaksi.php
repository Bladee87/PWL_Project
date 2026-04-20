<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Detail Transaksi</h6>
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
                            <th>ID Detail Transaksi</th>
                            <th>ID Transaksi</th>
                            <th>Barang/Jasa</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail_transaksi as $dt) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $dt['id_detail_transaksi']; ?></td>
                            <td><?= $dt['id_transaksi']; ?></td>
                            <td><?= $dt['barang_jasa']; ?></td>
                            <td><?= number_format($dt['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-edit" 
                                    data-id="<?= $dt['id_detail_transaksi']; ?>"
                                    data-transaksi="<?= $dt['id_transaksi']; ?>"
                                    data-barang="<?= $dt['barang_jasa']; ?>"
                                    data-harga="<?= $dt['harga']; ?>"
                                    data-toggle="modal" data-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('admin/detail-transaksi/delete/' . $dt['id_detail_transaksi']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/detail-transaksi/save') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Transaksi</label>
                        <select name="id_transaksi" class="form-control" required>
                            <option value="">-- Pilih Transaksi --</option>
                            <?php foreach ($transaksi as $t) : ?>
                                <option value="<?= $t['id_transaksi']; ?>"><?= $t['id_transaksi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Barang/Jasa</label>
                        <input type="text" name="barang_jasa" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Detail Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/detail-transaksi/update') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_detail_transaksi" id="edit-id">
                    <div class="form-group">
                        <label>ID Transaksi</label>
                        <select name="id_transaksi" id="edit-transaksi" class="form-control" required>
                            <option value="">-- Pilih Transaksi --</option>
                            <?php foreach ($transaksi as $t) : ?>
                                <option value="<?= $t['id_transaksi']; ?>"><?= $t['id_transaksi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Barang/Jasa</label>
                        <input type="text" name="barang_jasa" id="edit-barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" id="edit-harga" class="form-control" required>
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

        // Menggunakan event delegation agar tetap berfungsi setelah pagination/search DataTables
        $('#dataTable').on('click', '.btn-edit', function() {
            const id = $(this).data('id');
            const transaksi = $(this).data('transaksi');
            const barang = $(this).data('barang');
            const harga = $(this).data('harga');

            $('#edit-id').val(id);
            $('#edit-transaksi').val(transaksi);
            $('#edit-barang').val(barang);
            $('#edit-harga').val(harga);
        });
    });
</script>
