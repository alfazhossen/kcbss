					<!-- Page content -->
					<div class="container-fluid pt-8">
						<div class="page-header mt-0 shadow p-3">
							<ol class="breadcrumb mb-sm-0">
								<li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= $title ?></a></li>
								<!-- <li class="breadcrumb-item active" aria-current="page">Empty Page</li> -->
							</ol>
						</div>
						<div class="card shadow overflow-hidden">
							<div class="">
								<div class="row">
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-chart-line mr-2"></i>
												Today Daily Deposite
											</p>
											<h2 class="text-primary text-xxl"><?=$todayDailyDepositeUser?></h2>
											<!--<a href="<?=base_url('dailyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-users mr-2"></i>
												Monthly Daily Deposite
											</p>
											<h2 class="text-yellow text-xxl"><?=$monthlyDailyDepositeUser?></h2>
											<!--<a href="<?=base_url('dailyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-cart-arrow-down mr-2"></i>
												Yearly Daily Deposite
											</p>
											<h2 class="text-warning text-xxl"><?=$yearlyDailyDepositeUser?></h2>
											<!--<a href="<?=base_url('dailyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-signal mr-2"></i>
												Total Daily Deposite
											</p>
											<h2 class="text-danger text-xxl"><?=$allDailyDepositeUser?></h2>
											<!--<a href="<?=base_url('dailyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
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
												Today Monthly Deposite
											</p>
											<h2 class="text-primary text-xxl"><?=$todayMonthlyDeposite?></h2>
											<!--<a href="<?=base_url('monthlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-users mr-2"></i>
												Monthly Monthly Deposite
											</p>
											<h2 class="text-yellow text-xxl"><?=$monthlyMonthlyDeposite?></h2>
											<!--<a href="<?=base_url('monthlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-cart-arrow-down mr-2"></i>
												Yearly Monthly Deposite
											</p>
											<h2 class="text-warning text-xxl"><?=$yearlyMonthlyDeposite?></h2>
											<!--<a href="<?=base_url('monthlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 stats">
										<div class="text-center">
											<p class="text-light">
												<i class="fas fa-signal mr-2"></i>
												Total Monthly Deposite
											</p>
											<h2 class="text-danger text-xxl"><?=$allMonthlyDeposite?></h2>
											<!--<a href="<?=base_url('monthlyDeposite')?>" class="btn btn-outline-primary btn-pill btn-sm">View</a>-->
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
                                <h2 class="text-white mb-0">Tk. <?=$dailyTotalDue?></h2>
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
                                <h2 class="text-white mb-0">Tk. <?=$monthlyTotalDue?></h2>
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
                                <h2 class="text-white mb-0">Tk. <?=$dailyTotalDue + $monthlyTotalDue?></h2>
                            </div>
                            <div class="align-self-center">
                                <i class="fe fe-mail success font-large-2 text-white float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $titleDaily ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-20p">Process Date</th>
                                    <th class="wd-20p">Member ID</th>
                                    <th class="wd-20p">Last Pay Date</th>
                                    <th class="wd-20p">Total Dye</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($daily as $key) { ?>
                                    <tr>
                                        <td><?= date("d/m/Y", strtotime($key->process_date)) ?></td>
                                        <td><?= $key->memberId ?></td>
                                        <td><?= date("d/m/Y", strtotime($key->last_pay_date)) ?></td>
                                        <td><?= $key->total_due ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $titleMonthly ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-20p">Process Date</th>
                                    <th class="wd-20p">Member ID</th>
                                    <th class="wd-20p">Last Pay Date</th>
                                    <th class="wd-20p">Total Dye</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($monthly as $key) { ?>
                                    <tr>
                                        <td><?= date("d/m/Y", strtotime($key->process_date)) ?></td>
                                        <td><?= $key->memberId ?></td>
                                        <td><?= date("d/m/Y", strtotime($key->last_pay_date)) ?></td>
                                        <td><?= $key->total_due ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $titleDailyHistory ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-20p">Date</th>
                                    <th class="wd-20p">Member ID</th>
                                    <th class="wd-20p">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dailyHistory as $key) { ?>
                                    <tr>
                                        <td width='2%'><?= $no++ ?></td>
                                        <td><?= date("d/m/Y", strtotime($key->date)) ?></td>
                                        <td><?= $key->member_id ?></td>
                                        <td><?= $key->amount ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $titleMonthlyHistory ?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-20p">Date</th>
                                    <th class="wd-20p">Member ID</th>
                                    <th class="wd-20p">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($monthlyHistory as $key) { ?>
                                    <tr>
                                        <td width='2%'><?= $no++ ?></td>
                                        <td><?= date("m/Y", strtotime($key->date)) ?></td>
                                        <td><?= $key->member_id ?></td>
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
        		
						