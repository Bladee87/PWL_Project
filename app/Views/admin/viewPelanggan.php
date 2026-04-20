<!-- Custom styles for this page -->
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pelanggan</h6>
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
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat Pelanggan</th>
                            <th>No Telpon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pelanggan as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['id_pelanggan']; ?></td>
                            <td><?= $p['nama_pelanggan']; ?></td>
                            <td><?= $p['alamat_pelanggan']; ?></td>
                            <td><?= $p['no_telpon']; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-edit" 
                                    data-id="<?= $p['id_pelanggan']; ?>"
                                    data-nama="<?= $p['nama_pelanggan']; ?>"
                                    data-alamat="<?= $p['alamat_pelanggan']; ?>"
                                    data-telpon="<?= $p['no_telpon']; ?>"
                                    data-toggle="modal" data-target="#editModal">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('admin/pelanggan/delete/' . $p['id_pelanggan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pelanggan/save') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Pelanggan</label>
                        <textarea name="alamat_pelanggan" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telpon" class="form-control" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pelanggan/update') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_pelanggan" id="edit-id">
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" id="edit-nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Pelanggan</label>
                        <textarea name="alamat_pelanggan" id="edit-alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telpon</label>
                        <input type="text" name="no_telpon" id="edit-telpon" class="form-control" required>
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
            const nama = $(this).data('nama');
            const alamat = $(this).data('alamat');
            const telpon = $(this).data('telpon');

            $('#edit-id').val(id);
            $('#edit-nama').val(nama);
            $('#edit-alamat').val(alamat);
            $('#edit-telpon').val(telpon);
        });
    });
</script>
