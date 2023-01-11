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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">Kembali</a></li>
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
                            <h4 class="card-title">Daftar Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="user_name">Nama : </label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nama " value="<?= set_value('user_name') ?>">
                                    <?= form_error('user_name', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email " value="<?= set_value('user_email') ?>">
                                    <?= form_error('user_email', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="role">Peranan Pengguna : </label>
                                    <select class="form-control" name="user_role">
                                        <option value="">-- Sila Pilih --</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    <?= form_error('user_role', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password " value="<?= set_value('user_password') ?>">
                                    <?= form_error('user_password', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="user_status">Status : </label>
                                    <select class="form-control" id="user_status" name="user_status">
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak Aktif</option>
                                    </select>
                                    <?= form_error('user_status', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
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