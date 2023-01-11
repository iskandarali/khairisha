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
                            <h4 class="card-title">Edit Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="user_name">Nama : </label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Nama " value="<?= $user->users_name ?>">
                                    <?= form_error('user_name', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class=" form-group">
                                    <label for="email">Email : </label>
                                    <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email " value="<?= $user->users_email ?>">
                                    <?= form_error('user_email', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class=" form-group">
                                    <label for="user_role">Peranan Pengguna : </label>
                                    <select class="form-control" id="user_role" name="user_role">
                                        <option value="">-- Sila Pilih --</option>
                                        <option value="admin" <?php if ($user->users_role == 'admin') : ?>selected<?php endif; ?>>Admin</option>
                                        <option value="user" <?php if ($user->users_role == 'user') : ?>selected<?php endif; ?>>User</option>
                                    </select>
                                    <?= form_error('user_role', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password " value="">
                                    <?= form_error('user_password', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <div class=" form-group">
                                    <label for="user_status">Status : </label>
                                    <select class="form-control" id="user_status" name="user_status">
                                        <option value="1" <?php if ($user->users_status == '1') : ?>selected<?php endif; ?>>Aktif</option>
                                        <option value="2" <?php if ($user->users_status == '2') : ?>selected<?php endif; ?>>Tidak Aktif</option>
                                    </select>
                                    <?= form_error('user_status', '<span class="text-danger font-weight-bold">', '</span>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Kemas Kini</button>
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