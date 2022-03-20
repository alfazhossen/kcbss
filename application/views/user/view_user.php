<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
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
                        <div class="mb-3">
                            <img src="<?= base_url() ?>assets/images/user/<?= $row->user_image ?>" class="avatar avatar-lg img-circle">
                        </div>
                        <h3 class="card-title"><?= $row->name ?> (<?= $row->username ?>)</h3>
                        <p class="card-text">
                            <i class="fas fa-address-card"></i>
                            <span><?= $row->phone ?></span>
                        </p>
                        <p class="card-text">
                            <i class="fas fa-atom"></i>
                            <span><?= $row->address ?></span>
                        </p>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Daily Deposite</h3>
                        <p class="card-text">
                            <i class="fas fa-briefcase"></i>
                            <span><?= $daily = $this->db->select_sum('amount')->from('daily')->where('member_id', $row->username)->get()->row()->amount ?> TK.</span>
                        </p>
                    </div>
                </div>
                 <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Daily Deposite Due</h3>
                        <p class="card-text">
                            <i class="fas fa-briefcase"></i>
                            <?php 
                                  $last_date = $this->db->select('date')->from('daily')->where('member_id', $row->username)->order_by('daily_id','DESC')->limit(1)->get()->row()->date;
                                  $date_last = date('Y-m-d', strtotime($last_date));
                                  $date_today = date('Y-m-d');
                                  $datetime1 = new DateTime($date_last);
                                  $datetime2 = new DateTime($date_today);
                                  $interval = $datetime1->diff($datetime2);
                                  //$elapsed = $interval->format('%y y %m m %a d');
                                 
                                    // $date1 = new DateTime("2007-03-24");
                                    // $date2 = new DateTime("2009-06-26");
                                    // $interval = $date1->diff($date2);
                                    $elapsed = $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

                            ?>
                            <span><?=$interval->days*150?> TK.</span>
                        </p>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title">Office Cost Deposite</h3>
                        <p class="card-text">
                            <i class="fas fa-box-open"></i>
                            <span><?= $daily = $this->db->select_sum('amount')->from('monthly')->where('member_id', $row->username)->get()->row()->amount ?> TK.</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title text-center">Daily Deposite History</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Member ID</th>
                                        <th class="wd-20p">Member Name</th>
                                        <th class="wd-15p">Amount</th>
                                        <th class="wd-15p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $dailyDeposite = $this->db->from('daily')->where('member_id',$row->username)->order_by('daily_id','DESC')->join('user', 'user.username=daily.member_id')->get()->result();
                                    foreach ($dailyDeposite as $key) { ?>
                                        <tr>
                                            <td width='2%'><?= $no++ ?></td>
                                            <td><?= date("d-M-Y", strtotime($key->date)) ?></td>
                                            <td><?= $key->member_id ?></td>
                                            <td><?= $key->name ?></td>
                                            <td><?= $key->amount ?></td>
                                            <td width='2%'>
                                                <a href="<?=base_url('user/delete_daily/'.$key->daily_id.'/'.$row->user_id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title text-center">Office Cost Deposite History</h4>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered w-100 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Member ID</th>
                                        <th class="wd-20p">Member Name</th>
                                        <th class="wd-15p">Amount</th>
                                        <th class="wd-15p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $monthlyDeposite = $this->db->from('monthly')->where('member_id',$row->username)->order_by('monthly_id','DESC')->join('user', 'user.username=monthly.member_id')->get()->result();
                                    foreach ($monthlyDeposite as $key) { ?>
                                        <tr>
                                            <td width='2%'><?= $no++ ?></td>
                                            <td><?= date("M-Y", strtotime($key->date)) ?></td>
                                            <td><?= $key->member_id ?></td>
                                            <td><?= $key->name ?></td>
                                            <td><?= $key->amount ?></td>
                                            <td><a href="<?=base_url('user/delete_monthly/'.$key->monthly_id.'/'.$row->user_id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash-alt"></i></a></td>
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