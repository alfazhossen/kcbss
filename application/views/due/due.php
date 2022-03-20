<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
        <div class="btn-group mb-0">
            <a href="<?= base_url('due/add') ?>" class="btn btn-primary btn-sm mr-3">Daily Deposite Due Process</a>
            <a href="<?= base_url('due/addMonthly') ?>" class="btn btn-success btn-sm">Office cost Due Process</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card pull-up shadow bg-gradient-primary">
                <div class="card-content">
                    <div class="card-body">
                        <img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-white">Total Daily Deposite Due</h4>
                                <h2 class="text-white mb-0">Tk. <?=$totalDailyDue?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-shopping-cart text-white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card pull-up shadow bg-gradient-warning">
                <div class="card-content">
                    <div class="card-body">
                        <img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-white">Total Office Cost Deposite Due</h4>
                                <h2 class="text-white mb-0">Tk. <?=$totalMonthlyDue?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-bar-chart text-white font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="card pull-up shadow bg-gradient-danger">
                <div class="card-content">
                    <div class="card-body">
                        <img src="assets/img/circle.svg" class="card-img-absolute" alt="circle-image">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-white">Total Due</h4>
                                <h2 class="text-white mb-0">Tk. <?=$totalMonthlyDue + $totalDailyDue?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-mail success font-large-2 text-white float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $title ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $this->view('message'); ?>
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-20p">Process Date</th>
                                    <th class="wd-20p">Member ID</th>
                                    <th class="wd-20p">Member</th>
                                    <th class="wd-20p">Last Pay Date</th>
                                    <th class="wd-20p">Total Dye</th>
                                    <!--<th class="wd-25p">Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row as $key) { ?>
                                    <tr>
                                        <td width='2%'><?= $no++ ?></td>
                                        <td><?= $key->process_date ?></td>
                                        <td><?= $key->memberId ?></td>
                                        <td><?= $key->member ?></td>
                                        <td><?= $key->last_pay_date ?></td>
                                        <td><?= $key->total_due ?></td>
                                        <!--<td width='5%'>-->
                                        <!--    <a href="<?= base_url('due/view/' . $key->due_id) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>-->
                                        <!--    <a href="<?= base_url('due/edit/' . $key->due_id) ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>-->
                                        <!--    <a href="<?= base_url('due/delete/' . $key->due_id) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>-->
                                        <!--</td>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $titleMonthly ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php $this->view('message'); ?>
                        <table id="example1" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-20p">Process Date</th>
                                    <th class="wd-20p">Member ID</th>
                                    <th class="wd-20p">Member</th>
                                    <th class="wd-20p">Last Pay Date</th>
                                    <th class="wd-20p">Total Dye</th>
                                    <!--<th class="wd-25p">Action</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($monthly as $key) { ?>
                                    <tr>
                                        <td width='2%'><?= $no++ ?></td>
                                        <td><?= $key->process_date ?></td>
                                        <td><?= $key->memberId ?></td>
                                        <td><?= $key->member ?></td>
                                        <td><?= date("F, Y", strtotime($key->last_pay_date)) ?></td>
                                        <td><?= $key->total_due ?></td>
                                        <!--<td width='5%'>-->
                                        <!--    <a href="<?= base_url('due/view/' . $key->due_monthly_id) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>-->
                                        <!--    <a href="<?= base_url('due/edit/' . $key->due_monthly_id) ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>-->
                                        <!--    <a href="<?= base_url('due/delete/' . $key->due_monthly_id) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>-->
                                        <!--</td>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>