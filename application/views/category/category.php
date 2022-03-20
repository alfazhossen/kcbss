<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
            <a href="<?=base_url('category/add')?>" class="btn btn-primary btn-sm">Add</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php $this->view('message'); ?>
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-20p">Category</th>
                                    <th class="wd-20p">Total Expense</th>
                                    <th class="wd-25p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($row as $key) {?>
                                <tr>
                                    <td width='2%'><?=$no++?></td>
                                    <td><?=$key->category?></td>
                                    <td><?php echo $this->db->select_sum('amount')->from('expense')->where('categoryId', $key->category_id)->get()->row()->amount ?></td>
                                    <td width='5%'>
                                        <a href="<?=base_url('category/view/'.$key->category_id)?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="<?=base_url('category/edit/'.$key->category_id)?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?=base_url('category/delete/'.$key->category_id)?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>