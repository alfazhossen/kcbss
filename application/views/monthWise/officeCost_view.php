<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('monthWise')?>"><?=$title?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
            <a href="<?=base_url('monthWise')?>" class="btn btn-primary btn-sm">Back</a>
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
                        <table id="monthWise" class="table table-striped table-bordered w-100 text-nowrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Date</th>
                                    <th class="wd-15p">Member ID</th>
                                    <th class="wd-20p">Member Name</th>
                                    <th class="wd-15p">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($row as $key) {?>
                                <tr>
                                    <td width='2%'><?=$no++?></td>
                                    <td><?=date("M-Y", strtotime($key->date))?></td>
                                    <td><?=$key->member_id?></td>
                                    <td><?=$key->name?></td>
                                    <td><?=$key->amount?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>
                                        <h2 class="text-right">Pay amount</h2>
                                    </td>
                                    <td>
                                        <h2><?=$total?></h2>
                                    </td>
                                    <td>
                                        <h2 class="text-right">Due amount</h2>
                                    </td>
                                    <td>
                                        <h2><?=1200-$total?></h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function(e) {
        $('#monthWise').DataTable({
            dom: 'Bfrtip',
            "paging": false,
            buttons: [{
                    extend: 'copyHtml5',
                    footer: true,
                },
                {
                    extend: 'excelHtml5',
                    footer: true
                },
                {
                    extend: 'csvHtml5',
                    footer: true
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    messageTop: '<?=$year!='
						'?$year:null?> Total Amount <?=$total!='
						'?$total:null?>'
                }
            ]
        });
    });
    </script>