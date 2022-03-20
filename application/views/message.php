<?php if ($this->session->has_userdata('success')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
        <span class="alert-inner--text"><strong>Success!</strong> <?= $this->session->flashdata('success'); ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i>
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php } ?>