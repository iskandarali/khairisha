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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/position/1/view/1') ?>">Kembali</a></li>
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
                                Senarai Waran <?= $position->position_name ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label>Gred :</label>
                                    <select class="form-group form-control" aria-label="Default select example" name="gred">
                                        <option selected disabled>--Sila Pilih--</option>
                                        <?php foreach ($list_gred as $gred) : ?>
                                            <option value="<?= $gred->gred_id ?>" <?php if ($gred->gred_id == $detail->gred_id) : ?> selected <?php endif; ?>><?= $gred->gred_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bilangan Jawatan :</label>
                                    <input type="number" class="form-control" value="<?= $detail->position_num_work ?>" min="1" max="999" name="bil_waran" id="a" onkeyup="check_waran()">
                                </div>
                                <div class="form-group">
                                    <label>Bilangan Pengisian :</label>
                                    <input type="number" class="form-control" value="<?= $detail->position_num_vacant ?>" min="0" max="999" name="bil_isi" id="b" onkeyup="check_waran()">
                                    <span id="b_error" class="text-danger font-weight-bold"></span>
                                </div>
                                <div class="form-group">
                                    <label>Bilangan Kekosongan :</label>
                                    <input type="number" class="form-control" value="" name="bil_kosong1" id="c" hidden>
                                    <input type="number" class="form-control" value="<?= $detail->position_num_work - $detail->position_num_vacant ?>" name="bil_kosong2" id="d" readonly>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" id="submit_check_waran">Kemas Kini</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>