<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?= base_url('category') ?>">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
        <div class="btn-group mb-0">
        </div>
    </div>
    <div class="sortable">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title"><?= $row->category ?></h3>
                        <p class="card-text">
                            <i class="fas fa-address-card"></i>
                            <span><?= $expense_cat = $this->db->select_sum('amount')->from('expense')->where('categoryId', $row->category_id)->get()->row()->amount ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title text-center">Expense History</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">#</th>
                                        <th class="wd-15p">Date</th>
                                        <th class="wd-15p">Amount</th>
                                        <th class="wd-15p">Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $expenseHistory = $this->db->from('expense')->where('categoryId', $row->category_id)->order_by('expense_id', 'DESC')->get()->result();
                                    foreach ($expenseHistory as $key) { ?>
                                        <tr>
                                            <td width='2%'><?= $no++ ?></td>
                                            <td><?= date("d/m/Y", strtotime($key->date)) ?></td>
                                            <td><?= $key->amount ?></td>
                                            <td><?= $key->note ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>