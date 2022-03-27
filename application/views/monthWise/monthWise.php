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
					<form action="<?= base_url('monthWise/process') ?>" method="post">
						<div class="form-group m-0">
							<div class="row gutters-xs">
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<?php $current = date('m');
									 $month = [
										'1'=>'January',
										'2'=>'February',
										'3'=>'March',
										'4'=>'April',
										'5'=>'May',
										'6'=>'June',
										'7'=>'July',
										'8'=>'August',
										'9'=>'September',
										'10'=>'October',
										'11'=>'November',
										'12'=>'December'
										];?>
									<select class="form-control" name="month" id="month">
										<?php foreach($month as $m => $month){ ?>
										<option value="<?=$m?>" <?=$m==$current?"selected":null?>><?=$month?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<?php $currentYear = date('Y');
									 $year= [
										'2018', '2019','2020','2021','2022'
										];?>
									<select class="form-control" name="year" id="year">
										<?php foreach($year as $year){ ?>
										<option value="<?=$year?>" <?=$year==$currentYear?"selected":null?>><?=$year?>
										</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="memberId" class="form-control select2 w-100" required>
										<!-- <option value="all">All Member</option> -->
										<option>Select Member</option>
										<?php foreach ($user as $key) {
											if ($key->level == 2 && $key->deleted == 0) {
										?>
										<option value="<?= $key->username ?>"><?= $key->name ?> (<?= $key->username ?>)
										</option>
										<?php }
										} ?>
									</select>
								</div>
								<div class="col-md-1 col-lg-1 col-sm-12 mt-1">
									<input type="submit" class="btn btn-primary btn-pill mt-1 mb-1"
										value="<?= $title ?>">
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
					<h2 class="mb-0"><?= $title1 ?></h2>
				</div>
				<div class="card-body">
					<form action="<?= base_url('monthWise/officeCost') ?>" method="post">
						<div class="form-group m-0">
							<div class="row gutters-xs">
								<div class="col-md-2 col-lg-2 col-sm-12 mt-2">
									<?php $currentYear = date('Y');
									 $year= [
										'2018', '2019','2020','2021','2022'
										];
										?>
									<select class="form-control" name="year" id="year">
										<?php foreach($year as $year){ ?>
										<option value="<?=$year?>" <?=$year==$currentYear?"selected":null?>><?=$year?>
										</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-md-3 col-lg-3 col-sm-12 mt-2">
									<select name="memberId" class="form-control select2 w-100" required>
										<!-- <option value="all">All Member</option> -->
										<option>Select Member</option>
										<?php foreach ($user as $key) {
											if ($key->level == 2 && $key->deleted == 0) {
										?>
										<option value="<?= $key->username ?>"><?= $key->name ?> (<?= $key->username ?>)
										</option>
										<?php }
										} ?>
									</select>
								</div>
								<div class="col-md-1 col-lg-1 col-sm-12 mt-1">
									<input type="submit" class="btn btn-primary btn-pill mt-1 mb-1"
										value="<?= $title1 ?>">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
