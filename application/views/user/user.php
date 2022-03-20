<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
            <a href="<?=base_url('user/add')?>" class="btn btn-primary btn-sm">Add</a>
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
                                    <th class="wd-10p">#</th>
                                    <th class="wd-10p">MID</th>
                                    <th class="wd-10p">Picture</th>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-20p">Phone</th>
                                    <th class="wd-20p">NID </th>
                                    <th class="wd-25p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1; foreach($row->result() as $key) {
                                    if($key->level ==2 && $key->deleted == 0){ ?>
                                <tr>
                                    <td width='2%'><?=$no++?></td>
                                    <td width='3%'><?=$key->username?></td>
                                    <td width ="5%">
                                        <?php if($key->user_image!=''){?>
                                            <img class="avatar avatar-md img-circle" src="<?= base_url() ?>/assets/images/user/<?=$key->user_image?>">
                                        <?php } else{ ?>
                                            <img class="avatar avatar-md img-circle" src="<?= base_url() ?>/assets/images/user/01.png">
                                        <?php }  ?>
                                    </td>
                                    <td><?=$key->name?></td>
                                    <td width="5%"><?=$key->phone?></td>
                                    <td width="8%"><?=$key->nid?></td>
                                    
                                    <td width='5%'>
                                        <a href="<?=base_url('user/print/'.$key->user_id)?>" class="btn btn-sm btn-warning" target=”_blank”><i class="fas fa-print"></i></a>
                                        <a href="<?=base_url('user/view/'.$key->user_id)?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="<?=base_url('user/edit/'.$key->user_id)?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?=base_url('user/delete/'.$key->user_id)?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>