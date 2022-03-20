<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('due')?>">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <a href="<?=base_url('due')?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('due/processMonthly')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input type="date" name="process_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Member</label>
                        <select name="member_id" class="form-control select2 w-100" required>
                            <option value="all">All Member</option>
                           <?php foreach($member->result() as $key){ ?>
                            <option value="<?=$key->username?>"><?=$key->name?> (<?=$key->username?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                         <button type="submit" class="btn btn-outline-success mt-1 mb-1">Process</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
