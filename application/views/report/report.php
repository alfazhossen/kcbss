<!-- Page content -->
<div class="container-fluid pt-8">
	<div class="page-header mt-0 shadow p-3">
		<ol class="breadcrumb mb-sm-0">
			<li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0"><?= $title ?></h2>
				</div>
				<div class="card-body">
					<form action="<?= base_url('report/process') ?>" method="post">
						<div class="form-group m-0">
							<div class="row gutters-xs">
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<input type="date" name="from_date" class="form-control" required>
								</div>
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<input type="date" name="to_date" class="form-control" required>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="deposite" class="form-control" required>
										<option value="">Select Option</option>
										<option value="daily">Daily Deposit</option>
										<option value="monthly">Office Cost Deposit</option>
									</select>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="memberId" class="form-control select2 w-100" required>
										<option value="all">All Member</option>
										<?php foreach ($member as $key) {
											if ($key->level == 2 && $key->deleted == 0) {
										?>
												<option value="<?= $key->username ?>"><?= $key->name ?> (<?= $key->username ?>)</option>
										<?php }
										} ?>
									</select>
								</div>
								<div class="col-md-1 col-lg-1 col-sm-12 mt-2">
									<input type="submit" class="btn btn-primary btn-pill mt-1 mb-1" value="<?= $title ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0"><?= $titleProfit ?></h2>
				</div>
				<div class="card-body">
					<form action="<?= base_url('report/processProject') ?>" method="post">
						<div class="form-group m-0">
							<div class="row gutters-xs">
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<input type="date" name="from_date" class="form-control" required>
								</div>
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<input type="date" name="to_date" class="form-control" required>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="income" class="form-control" required>
										<option value="">Select Option</option>
										<option value="profit">Profit</option>
										<option value="loss">Loss</option>
									</select>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="projectId" class="form-control select2 w-100" required>
										<option value="all">All Project</option>
										<?php foreach ($project as $key) {
										?>
												<option value="<?= $key->project_id ?>"><?= $key->project ?></option>
										<?php 
										} ?>
									</select>
								</div>
								<div class="col-md-1 col-lg-1 col-sm-12 mt-2">
									<input type="submit" class="btn btn-primary btn-pill mt-1 mb-1" value="<?= $titleProfit ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12">
			<div class="card shadow">
				<div class="card-header">
					<h2 class="mb-0"><?= $titleExpense ?></h2>
				</div>
				<div class="card-body">
					<form action="<?= base_url('report/processExpense') ?>" method="post">
						<div class="form-group m-0">
							<div class="row gutters-xs">
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<input type="date" name="from_date" class="form-control" required>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<input type="date" name="to_date" class="form-control" required>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="categoryId" class="form-control select2 w-100" required>
										<option value="all">All Category</option>
										<?php foreach ($category as $key) {
										?>
												<option value="<?= $key->category_id ?>"><?= $key->category ?></option>
										<?php 
										} ?>
									</select>
								</div>
								<div class="col-md-1 col-lg-1 col-sm-12 mt-2">
									<input type="submit" class="btn btn-primary btn-pill mt-1 mb-1" value="<?= $titleExpense ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>