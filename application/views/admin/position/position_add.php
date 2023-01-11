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
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title">Form</h4>
                        </div> -->
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="position_name">Nama Jabatan : <?= $position ?></label>
                                    <input type="text" class="form-control" id="position_name" name="position_name" placeholder="Nama Jabatan <?= $position ?>">
                                    <?= form_error('position_name', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status : </label>
                                    <select class="form-control" id="position_status" name="position_status">
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak Aktif</option>
                                    </select>
                                    <?= form_error('position_status', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>