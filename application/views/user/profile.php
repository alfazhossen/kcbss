<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
        <div class="btn-group mb-0">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-profile  overflow-hidden">
                <div class="card-body text-center cover-image" data-image-src="<?= base_url() ?>/assets/img/profile-bg.jpg">
                    <div class=" card-profile">
                        <div class="row justify-content-center">
                            <div class="">
                                <div class="">
                                    <a href="#">
                                        <img src="<?= base_url() ?>/assets/images/user/<?= $row_update->user_image ?>" class="rounded-circle" alt="profile">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3 text-white"><?= $row_update->name ?></h3>
                    <p class="mb-4 text-white"><?= $row_update->level == 1 ? 'Administrator' : 'Member' ?></p>
                    <a href="<?=base_url('user/update_profile/'.$this->login->user_login()->user_id)?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit profile</a>
                </div>
                <div class="card-body">
                    <div class="nav-wrapper p-0">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-lock mr-2"></i>Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active show mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fas fa-home mr-2"></i>About Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="far fa-images mr-2"></i>Change Picture</a>
                            </li>
                        </ul>
                        <?php $this->view('message'); ?>
                    </div>
                </div>
            </div>
            <div class="card shadow ">
                <div class="card-body pb-0">
                    <div class="tab-content" id="myTabContent">
                        <div aria-labelledby="tabs-icons-text-2-tab" class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="mb-0">Change Password</h2>
                                        </div>
                                        <div class="card-body">
                                            <form class="row" action="<?= base_url('user/update_password') ?>" method="post">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="old_password" placeholder="Enter Your Present Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="new_password" placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" name="con_password" placeholder="Confirm New Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Change Password">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                            <div class="row">
                                <h2>User Information</h2>
                                <div class="table-responsive border mb-5">
                                    <table class="table row table-borderless w-100 m-0 ">
                                        <tbody class="col-lg-6 p-0">
                                            <tr>
                                                <td><strong>Full Name :</strong> <?= $row_update->name ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone :</strong> <?= $row_update->phone ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>NID :</strong> <?= $row_update->nid ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Member ID :</strong> <?= $row_update->username ?></td>
                                            </tr>
                                        </tbody>
                                        <tbody class="col-lg-6 p-0">
                                            <tr>
                                                <td><strong>Addres :</strong> <?= $row_update->address ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Role :</strong> <?= $row_update->level == 1 ? 'Administrator' : 'Member' ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Create Date :</strong> <?= date("d-F-Y", strtotime($row_update->create_date)) ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email :</strong> <?= $row_update->email ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                            <div class="row profile ng-scope">
                                <div class="col-md-12">
                                    <div class="card">
                                        <form class="mt ng-pristine ng-valid" action="<?=base_url('user/update_photo')?>" method="post" enctype="multipart/form-data">
                                            <div class="col-md-6">
                                                <div class="form-group text-center my-3">
                                                    <label class="form-label">Change Photo</label>
                                                    <input type="file" class="dropify" data-max-file-size="1M" name="user_image">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group text-center">
                                                    <input type="submit" class="btn btn-primary" value="Change Photo">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>