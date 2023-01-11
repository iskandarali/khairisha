<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> <?= $position ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="department">Kembali</a></li>
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
                            <a class="btn btn-primary" href="<?= base_url('admin/position/' . $department->department_id . '/add') ?>">Tambah</a>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <table id="table_default1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No.</th>
                                        <th><?= $position ?></th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($list_position as $position) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $position->position_name ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/position/' . $position->position_department_id  . '/view/' . $position->position_id) ?>" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('admin/position/'  . $position->position_department_id  . '/edit/' . $position->position_id) ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- <a href="<?= base_url('admin/position/'  . $position->position_department_id  . '/delete/' . $position->position_id) ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a> -->
                                                 <!-- modal delete -->
                                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $position->position_id ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <div class="modal fade" id="modal-delete<?= $position->position_id ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus <?= $position->position_name ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Adakah anda pasti untuk menghapuskannya ?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                                                <a href="<?= base_url('admin/position/'  . $position->position_department_id  . '/delete/' . $position->position_id) ?>" class="btn btn-danger">Pasti</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
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