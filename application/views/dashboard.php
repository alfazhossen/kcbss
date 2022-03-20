					<!-- Page content -->
					<div class="container-fluid pt-8">
						<div class="page-header mt-0 shadow p-3">
							<ol class="breadcrumb mb-sm-0">
								<li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= $title ?></a></li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Empty Page</li> -->
							</ol>
							<div class="btn-group mb-0">
								<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="<?= base_url('user/add') ?>"><i class="fas fa-user-plus mr-2"></i>Add Member</a>
									<a class="dropdown-item" href="<?= base_url('dailyDeposite/add') ?>"><i class="fas fa-credit-card mr-2"></i>Add Daily Deposite</a>
									<a class="dropdown-item" href="<?= base_url('monthlyDeposite/add') ?>"><i class="fas fa-chalkboard-teacher mr-2"></i>Add Monthly Deposite</a>
									<a class="dropdown-item" href="<?= base_url('expense/add') ?>"><i class="fas fa-calculator mr-2"></i>Add Expense</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url('user') ?>"><i class="fas fa-users mr-2"></i> All Member</a>
									<a class="dropdown-item" href="<?= base_url('dailyDeposite') ?>"><i class="fe fe-grid mr-2"></i> All Daily Deposite</a>
									<a class="dropdown-item" href="<?= base_url('monthlyDeposite') ?>"><i class="fas fa-wallet mr-2"></i> All Monthly Deposite</a>
									<a class="dropdown-item" href="<?= base_url('expense') ?>"><i class="fas fa-file-alt mr-2"></i> All Expense</a>
								</div>
							</div>
						</div>
						<div class="card shadow overflow-hidden">
							<div class="">
								<div class="row">
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-chart-line mr-2"></i>
												Today Deposite
											</p>
											<h2 class="text-primary text-xxl"><?=$todayDailyDeposite?></h2>
											<a href="<?=base_url('dashboard/todayDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-users mr-2"></i>
												Monthly Deposite
											</p>
											<h2 class="text-yellow text-xxl"><?=$monthlyDailyDeposite?></h2>
											<a href="<?=base_url('dashboard/monthlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-cart-arrow-down mr-2"></i>
												Yearly Deposite
											</p>
											<h2 class="text-warning text-xxl"><?=$yearlyDailyDeposite?></h2>
											<a href="<?=base_url('dashboard/yearlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-signal mr-2"></i>
												Total Deposite
											</p>
											<h2 class="text-danger text-xxl"><?=$allDailyDeposite?></h2>
											<a href="<?=base_url('dailyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow overflow-hidden">
							<div class="">
								<div class="row">
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-chart-line mr-2"></i>
												Today Office Cost Deposite
											</p>
											<h2 class="text-primary text-xxl"><?=$todayMonthlyDeposite?></h2>
											<a href="<?=base_url('dashboard/todayCost')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-users mr-2"></i>
												Monthly Office Cost Deposite
											</p>
											<h2 class="text-yellow text-xxl"><?=$monthlyMonthlyDeposite?></h2>
											<a href="<?=base_url('dashboard/monthlyCost')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-cart-arrow-down mr-2"></i>
												Yearly Office Cost Deposite
											</p>
											<h2 class="text-warning text-xxl"><?=$yearlyMonthlyDeposite?></h2>
											<a href="<?=base_url('dashboard/yearlyCost')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-signal mr-2"></i>
												Total Office Cost Deposite
											</p>
											<h2 class="text-danger text-xxl"><?=$allMonthlyDeposite?></h2>
											<a href="<?=base_url('monthlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow overflow-hidden">
							<div class="">
								<div class="row">
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-chart-line mr-2"></i>
												Today Expense
											</p>
											<h2 class="text-primary text-xxl"><?=$todayExpense?></h2>
											<a href="<?=base_url('dashboard/todayExpense')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-users mr-2"></i>
												Monthly Expense
											</p>
											<h2 class="text-yellow text-xxl"><?=$monthlyExpense?></h2>
											<a href="<?=base_url('dashboard/monthlyExpense')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-cart-arrow-down mr-2"></i>
												Yearly Expense
											</p>
											<h2 class="text-warning text-xxl"><?=$yearlyExpense?></h2>
											<a href="<?=base_url('dashboard/yearlyExpense')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-signal mr-2"></i>
												Total Expense
											</p>
											<h2 class="text-danger text-xxl"><?=$allExpense?></h2>
											<a href="<?=base_url('expense')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>
										</div>
									</div>
								</div>
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
        </div>
<div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $titleDaily ?></h2>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($daily as $key) { ?>
                                    <tr>
                                        <td width='2%'><?= $no++ ?></td>
                                        <td><?= $key->process_date ?></td>
                                        <td><?= $key->memberId ?></td>
                                        <td><?= $key->member ?></td>
                                        <td><?= $key->last_pay_date ?></td>
                                        <td><?= $key->total_due ?></td>
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
                                        <td><?= $key->last_pay_date ?></td>
                                        <td><?= $key->total_due ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>