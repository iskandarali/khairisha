<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> <?= $position->position_name ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> code betul -->
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/position/1') ?>">Kembali</a></li>
                        <!-- <li class="breadcrumb-item"><a href="<?= base_url('admin/department') ?>">Kembali</a></li> -->
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
                    <?= $this->session->flashdata('message') ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapse" role="button" aria-expanded="false" aria-controls="collapse">
                                    Tambah Waran
                                </a>
                            </h4>
                        </div>
                        <div class="collapse" id="collapse">
                            <div class="card-body">
                                <form method="POST" action="?action=add&id=0">
                                    <div class="form-group">
                                        <label>Gred :</label>
                                        <select class="form-group form-control" aria-label="Default select example" name="gred">
                                            <option selected disabled>--Sila Pilih--</option>
                                            <?php foreach ($list_gred as $gred) : ?>
                                                <option value="<?= $gred->gred_id ?>"><?= $gred->gred_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bilangan Jawatan :</label>
                                        <input type="number" class="form-control" value="" min="1" max="999" name="bil_waran" id="a" onkeyup="check_waran()">
                                    </div>
                                    <div class="form-group">
                                        <label>Bilangan Pengisian :</label>
                                        <input type="number" class="form-control" value="" min="0" max="999" name="bil_isi" id="b" onkeyup="check_waran()">
                                        <span id="b_error" class="text-danger font-weight-bold"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Bilangan Kekosongan :</label>
                                        <input type="number" class="form-control" value="" name="bil_kosong1" id="c" hidden>
                                        <input type="number" class="form-control" value="0" name="bil_kosong2" id="d" readonly>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" id="submit_check_waran">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Senarai Waran <?= $position->position_name ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-border" id="table_default1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gred</th>
                                            <th>Bilangan Jawatan</th>
                                            <th>Bilangan Pengisian</th>
                                            <th>Bilangan Kekosongan</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($list_job as $job) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $job->gred_name ?></td>
                                                <td><?= $job->position_num_work ?></td>
                                                <td><?= $job->position_num_vacant ?></td>
                                                <td><?= $job->position_num_work - $job->position_num_vacant ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a class="btn btn-warning" href="<?= base_url('admin/position/' . $department->department_id . '/view/' . $position->position_id . '/?action=edit&id=' . $job->job_id) ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?= $job->job_id ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    <div class="modal fade" id="modal-delete<?= $job->job_id ?>">
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
                                                                    <a href="<?= base_url('admin/position/' . $department->department_id . '/view/' . $position->position_id . '/?action=delete&id=' . $job->job_id) ?>" class="btn btn-danger">Pasti</a>
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
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>