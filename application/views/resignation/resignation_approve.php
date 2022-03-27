<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url('resignation')?>">Resignation</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <a href="<?=base_url('resignation')?>" class="tn btn-primary btn-sm"><i class="fas fa-reply mr-2"></i>Back</a>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><?=$title?></h2>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('resignation/approveProcess')?>" method="post">
                        <div class="form-group">
                            <label class="form-label">Member Name</label>
                            <input type="hidden" name="resign_id" value="<?=$row->resign_id?>">
                            <input type="hidden" name="create_user" value="<?=$row->create_user?>">
                            <input type="hidden" name="emg_deposit"
                                value="<?=$member_emergency_deposit = $this->db->select_sum('amount')->where('memberIdEmg',$row->create_user)->get('emergency')->row()->amount?>">
                            <input type="hidden" name="office_cost"
                                value="<?=$member_office_cost_deposit = $this->db->select_sum('amount')->where('member_id',$row->create_user)->get('monthly')->row()->amount?>">
                            <input class="form-control" placeholder="resignation Name" type="text" name="name" required
                                value="<?=$row->name?>-(<?=$row->username?>)" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Daily Deposite</label>
                            <input class="form-control" type="text" name="daily" required
                                value="<?=$member_daily_deposit = $this->db->select_sum('amount')->where('member_id',$row->create_user)->get('daily')->row()->amount?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Return Amount</label>
                            <input class="form-control" placeholder="Return Amount" type="number" name="return_amount"
                                required>
                        </div>
                        <button type="submit" class="btn btn-outline-success mt-1 mb-1">Approve & Delete Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>