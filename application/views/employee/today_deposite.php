<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
            <!--<a href="<?=base_url('dailyDeposite/add')?>" class="btn btn-primary btn-sm">Add</a>-->
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
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Date</th>
                                    <th class="wd-15p">Member ID</th>
                                    <th class="wd-20p">Member Name</th>
                                    <th class="wd-15p">Amount</th>
                                    <!-- <th class="wd-10p">Total Deposite</th> -->
                                    <th class="wd-25p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($row as $key) {?>
                                <tr>
                                    <td width='2%'><?=$no++?></td>
                                    <td><?=date("d-M-Y", strtotime($key->date))?></td>
                                    <td><?=$key->member_id?></td>
                                    <td><?=$key->name?></td>
                                    <td><?=$key->amount?></td>
                                    <!-- <td><?php echo $this->db->select_sum('amount')->from('daily')->where('member_id', $key->member_id)->get()->row()->amount ?></td> -->
                                    <td width='5%'>
                                        <a href="<?=base_url('dailyDeposite/edit/'.$key->daily_id)?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?=base_url('dailyDeposite/delete/'.$key->daily_id)?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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