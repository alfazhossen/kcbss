<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
           
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
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Subject</th>
                                    <th class="wd-15p">Member ID</th>
                                    <th class="wd-15p">Member Name</th>
                                    <th class="wd-15p">Date & Time</th>
                                    <th class="wd-15p">Details</th>
                                    <th class="wd-25p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 1;
                                foreach($row as $key) { ?>
                                <tr>
                                    <td><?=$n++?></td>
                                    <td><?=$key->subject?></td>
                                    <td><?=$key->create_user?></td>
                                    <td><?=$this->db->select('name')->where('username',$key->create_user)->get('user')->row()->name?></td>
                                    <td><?=$key->create_date?></td>
                                    <td><?=$key->details?></td>
                                    <td width='5%'>
                                        <a href="<?=base_url('resignation/view/'.$key->resign_id)?>" class="btn btn-sm btn-success" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="<?=base_url('resignation/edit/'.$key->resign_id)?>" class="btn btn-sm btn-info" title="Approve"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?=base_url('resignation/delete/'.$key->resign_id)?>" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
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