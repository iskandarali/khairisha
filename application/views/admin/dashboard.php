<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Utama</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> <?= $count['user'] ?> </h3>
                            <p>Jumlah Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('admin/user/') ?>" class="small-box-footer"> <i class="fas fa-arrow-circle-righ"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $count['department'] ?></h3>
                            <p>Bahagian / Agensi / JKN</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-city"></i>
                        </div>
                        <a href="department" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $count['gred'] ?></h3>
                            <p>Senarai Gred</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fas fa-graduation-cap"></i>
                        </div>
                        <a href="<?= base_url('admin/gred') ?>" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> <?= $count['job_num_work'] ?> / <?= $count['job_num_vacant'] ?></h3>
                            <p>Waran Perjawatan / Pengisian</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-righ"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div hidden class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= rand(0, 100000000) ?></h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div hidden class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table_default1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Bahagian</th>
                                        <th>Gred</th>
                                        <th>Bilangan Jawatan</th>
                                        <th>Bilangan Pengisian</th>
                                        <th>Bilangan Kekosongan</th>
                                    </tr>
                                </thead>
                                <tbody>
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