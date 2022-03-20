<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?= base_url('project') ?>">Project</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
        <div class="btn-group mb-0">
        </div>
    </div>
    <div class="sortable">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title"><?= $row->project ?></h3>
                        <p class="card-text">
                            <i class="fas fa-address-card"></i>
                            <span><?= $row->amount ?></span>
                        </p>
                        <p class="card-text">
                            <span><?= $row->note ?></span>
                        </p>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Total Profit</h3>
                        <p class="card-text">
                            <i class="fas fa-briefcase"></i>
                            <span><?= $profitTotal = $this->db->select_sum('amount')->from('profit')->where('projectId', $row->project_id)->get()->row()->amount ?> TK.</span>
                        </p>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Total Loss</h3>
                        <p class="card-text">
                            <i class="fas fa-box-open"></i>
                            <span><?= $lossTotal = $this->db->select_sum('amount')->from('loss')->where('projectId', $row->project_id)->get()->row()->amount ?> TK.</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title text-center">Profit History</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $profitHistory = $this->db->from('profit')->where('projectId', $row->project_id)->order_by('profit_id', 'DESC')->get()->result();
                                    foreach ($profitHistory as $key) { ?>
                                        <tr>
                                            <td width='2%'><?= $no++ ?></td>
                                            <td><?= date("d-M-Y", strtotime($key->date)) ?></td>
                                            <td><?= $key->amount ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title text-center">Loss History</h4>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered w-100 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $lossHistory = $this->db->from('loss')->where('projectId', $row->project_id)->order_by('loss_id', 'DESC')->get()->result();
                                    foreach ($lossHistory as $key) { ?>
                                        <tr>
                                            <td width='2%'><?= $no++ ?></td>
                                            <td><?= date("M-Y", strtotime($key->date)) ?></td>
                                            <td><?= $key->amount ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>