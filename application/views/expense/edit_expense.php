<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('expense')?>">Expense</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <a href="<?=base_url('expense')?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('expense/editProcess')?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Date</label>
                        <input type="hidden" name="expense_id" value="<?=$row->expense_id?>">
                        <input class="form-control datepicker" placeholder="MM/DD/YYYY" type="text" name="date" required value="<?=date("d/m/y", strtotime($row->date))?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select name="categoryId" class="form-control select2 w-100" required>
                            <option>Select category</option>
                           <?php foreach($category->result() as $key){ ?>
                            <option value="<?=$key->category_id?>" <?=$key->category_id==$row->categoryId?'selected':false?>><?=$key->category?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Amount</label>
                        <input class="form-control" type="number" name="amount" value="<?=$row->amount?>" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Note</label>
                        <input class="form-control" type="text" name="note" value="<?=$row->note?>">
                    </div>
                         <button type="submit" class="btn btn-outline-success mt-1 mb-1">Save</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
