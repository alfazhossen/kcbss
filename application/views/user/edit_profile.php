<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?= base_url('user/profile') ?>">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
        <a href="<?= base_url('user') ?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?= $title ?></h2>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart()?>
                        <div class="form-group">
                            <label class="form-label">Member ID</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                            <input class="form-control <?= form_error('username') ? 'is-invalid state-invalid' : null ?>" placeholder="Member ID" type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" readonly>
                            <div class="invalid-feedback"><?= form_error('username') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input class="form-control <?= form_error('name') ? 'is-invalid state-invalid' : null ?>" placeholder="Full Name" type="text" name="name" value="<?= $this->input->post('username') ?? $row->name ?>">
                            <div class="invalid-feedback"><?= form_error('name') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input class="form-control <?= form_error('address') ? 'is-invalid state-invalid' : null ?>" placeholder="Address" type="text" name="address" value="<?= $this->input->post('username') ?? $row->address ?>">
                            <div class="invalid-feedback"><?= form_error('address') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">NID</label>
                            <input class="form-control <?= form_error('nid') ? 'is-invalid state-invalid' : null ?>" placeholder="NID" type="text" name="nid" value="<?= $this->input->post('username') ?? $row->nid ?>">
                            <div class="invalid-feedback"><?= form_error('nid') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input class="form-control <?= form_error('email') ? 'is-invalid state-invalid' : null ?>" placeholder="Email" type="email" name="email" value="<?= $this->input->post('username') ?? $row->email ?>">
                            <div class="invalid-feedback"><?= form_error('email') ?></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input class="form-control <?= form_error('phone') ? 'is-invalid state-invalid' : null ?>" placeholder="Phone" type="text" name="phone" value="<?= $this->input->post('username') ?? $row->phone ?>">
                            <div class="invalid-feedback"><?= form_error('phone') ?></div>
                        </div>
                        <button type="submit" class="btn btn-outline-success mt-1 mb-1">Save</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow">
                <div class="card-header ">
                    <h2 class="mb-0 ">Member Image</h2>
                </div>
                <div class="card-body text-center">
                    <img class="avatar avatar-xxl brround" src="<?= base_url() ?>/assets/images/user/<?= $row->user_image ?>" alt="avatra-img">
                    <h4 class="h4 mb-0 mt-3 font-600"><?= $row->username ?></h4>
                    <p class="card-text text-sm"><?= $row->name ?></p>
                </div>
            </div>
        </div>
    </div>