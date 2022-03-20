<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('report')?>">Report</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
            <a href="<?=base_url('report')?>" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <?php $this->view('message'); ?>
                        <table id="example3" class="table table-striped table-bordered w-100 text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Member ID</th>
                                    <th class="wd-20p">Member Name</th>
                                    <th class="wd-15p">Deposit</th>
                                    <th class="wd-15p">Due Deposit</th>
                                    <th class="wd-15p">Office Cost</th>
                                    <th class="wd-15p">Due Office Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($row as $key) { if ($key->level==2){?>
                                <tr>
                                    <td width='2%'><?=$no++?></td>
                                    <td><?=$key->username?></td>
                                    <td><?=$key->name?></td>
                                    <td><?=$deposit = $this->db->select_sum('amount')->where('member_id',$key->username)->get('daily')->row()->amount?></td>
                                    <td><?=$dueDeposit = $this->db->select_sum('total_due')->where('memberId',$key->username)->get('duedaily')->row()->total_due?></td>
                                    <td><?=$officeCost = $this->db->select_sum('amount')->where('member_id',$key->username)->get('monthly')->row()->amount?></td>
                                    <td><?=$dueDeposit = $this->db->select_sum('total_due')->where('memberId',$key->username)->get('duemonthly')->row()->total_due?></td>
                                </tr>
                                <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?=$allDaily?></td>
                                    <td><?=$allDueDaily?></td>
                                    <td><?=$allMonthly?></td>
                                    <td><?=$allDueMonthly?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready( function () {
        $('#example3').DataTable( {
            dom: 'Bfrtip',
            "paging":   false,
            "ordering": false,
            buttons: [
                { extend: 'copyHtml5', footer: true},
                { extend: 'excelHtml5', footer: true},
                { extend: 'csvHtml5', footer: true},
                { extend: 'pdfHtml5', footer: true}
            ]
        } );
    } );   
    </script>