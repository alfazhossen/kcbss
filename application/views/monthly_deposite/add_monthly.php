<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('monthlyDeposite')?>">Monthly Deposite</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <a href="<?=base_url('monthlyDeposite')?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <?php $this->view('message'); ?>
                    <form action="<?=base_url('monthlyDeposite/addProcess')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Member</label>
                        <select name="member_id" class="form-control select2 w-100" required>
                            <option>Select Member</option>
                           <?php foreach($member->result() as $key){ ?>
                            <option value="<?=$key->username?>"><?=$key->name?> (<?=$key->username?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Fixt Amount</label>
                        <select class="form-control" name="fixt_amount" required>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Total Deposite Amount</label>
                        <input class="form-control" type="number" name="amount" required>
                    </div>
                         <button type="submit" class="btn btn-outline-success mt-1 mb-1">Save</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
