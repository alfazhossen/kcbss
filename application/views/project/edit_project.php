<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('project')?>">Project</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <a href="<?=base_url('project')?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('project/editProcess')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input type="hidden" name="project_id" value="<?=$row->project_id?>">
                        <input class="form-control" placeholder="dd/mm/yyyy" type="date" name="date" required value="<?=date("d/m/y", strtotime($row->date))?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project</label>
                        <input class="form-control" placeholder="Project Name" type="text" name="project" required value="<?=$row->project?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project Amount</label>
                        <input class="form-control" type="number" name="amount" required value="<?=$row->amount?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Details</label>
                        <input class="form-control" placeholder="Details" type="text" name="note" required value="<?=$row->note?>">
                    </div>
                         <button type="submit" class="btn btn-outline-success mt-1 mb-1">Save</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
