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
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('project/addProcess')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input class="form-control" type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project</label>
                        <input class="form-control" placeholder="Project Name" type="text" name="project" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Project Amount</label>
                        <input class="form-control" type="number" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Note</label>
                        <input class="form-control" placeholder="Project Details" type="text" name="note" required>
                    </div>
                         <button type="submit" class="btn btn-outline-success mt-1 mb-1">Save</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
