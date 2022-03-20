<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('user')?>">Member</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <a href="<?=base_url('user')?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('user/add')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="form-label">Member ID</label>
                        <input class="form-control <?=form_error('username') ? 'is-invalid state-invalid' : null?>" placeholder="Member ID" type="text" name="username" value="<?=set_value('username')?>">
                        <div class="invalid-feedback"><?=form_error('username')?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input class="form-control <?=form_error('name') ? 'is-invalid state-invalid' : null?>" placeholder="Full Name" type="text" name="name" value="<?=set_value('name')?>">
                        <div class="invalid-feedback"><?=form_error('name')?></div>
                    </div>
                   <div class="form-group">
                        <label class="form-label">Address</label>
                        <input class="form-control <?=form_error('address') ? 'is-invalid state-invalid' : null?>" placeholder="Address" type="text" name="address" value="<?=set_value('address')?>">
                        <div class="invalid-feedback"><?=form_error('address')?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">NID</label>
                        <input class="form-control <?=form_error('nid') ? 'is-invalid state-invalid' : null?>" placeholder="NID" type="text" name="nid" value="<?=set_value('nid')?>">
                        <div class="invalid-feedback"><?=form_error('nid')?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input class="form-control <?=form_error('email') ? 'is-invalid state-invalid' : null?>" placeholder="Email" type="email" name="email" value="<?=set_value('email')?>">
                        <div class="invalid-feedback"><?=form_error('email')?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input class="form-control <?=form_error('phone') ? 'is-invalid state-invalid' : null?>" placeholder="Phone" type="text" name="phone" value="<?=set_value('phone')?>">
                        <div class="invalid-feedback"><?=form_error('phone')?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Photo</label>
                        <input type="file" class="dropify" data-max-file-size="1M" name="user_image">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input class="form-control <?=form_error('password') ? 'is-invalid state-invalid' : null?>" type="text" name="password" value="<?=set_value('password')?>">
                        <div class="invalid-feedback"><?=form_error('password')?></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confrim Password</label>
                        <input class="form-control <?=form_error('passconf') ? 'is-invalid state-invalid' : null?>" type="text" name="passconf" value="<?=set_value('passconf')?>">
                        <div class="invalid-feedback"><?=form_error('passconf')?></div>
                    </div> 
                         <button type="submit" class="btn btn-outline-success mt-1 mb-1">Save</button>
                        <button type="reset" class="btn btn-outline-danger mt-1 mb-1">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
