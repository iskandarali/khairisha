<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary" href="<?= base_url('admin/gred/add') ?>">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <table id="table_default1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Gred</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_gred as $gred) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $gred->gred_name ?></td>
                                            <td class="text-center">
                                                <!-- <a href="<?= base_url('admin/position/' . $gred->gred_id) ?>" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a> 
                                                <a href="<?= base_url('admin/department/edit/' . $gred->gred_id) ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a> -->
                                                <!-- <a href="<?= base_url('admin/department/delete/' . $gred->gred_id) ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a> -->
                                                <!-- modal delete -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $gred->gred_id ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    <div class="modal fade" id="modal-delete<?= $gred->gred_id ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Hapus Gred</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Adakah anda pasti untuk menghapuskan Gred ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                                    <!-- <a href="<?= base_url('admin/gred/' . $gred->gred_id) ?>" class="btn btn-danger">Padam</a> -->
                                                                    <a href="<?= base_url('admin/gred/delete/' . $gred->gred_id) ?>" class="btn btn-danger">Pasti</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>