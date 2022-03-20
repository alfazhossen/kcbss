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
					<form action="<?= base_url('statement/process') ?>" method="post">
						<div class="form-group m-0">
							<div class="row gutters-xs">
								<div class="col-md-3 col-lg-2 col-sm-12 mt-2">
									<input type="date" name="from_date" class="form-control" required>
									<input type="hidden" name="memberId" class="form-control" required value="<?=$this->login->user_login()->username?>">
								</div>
								<div class="col-md-3 col-lg-2 col-sm-12 mt-2">
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
									<input type="submit" class="btn btn-primary btn-pill mt-1 mb-1" value="Report">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>