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
                        <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Member ID</th>
                                    <th class="wd-15p">Member Name</th>
                                    <th class="wd-15p">Daily Deposit</th>
                                    <th class="wd-15p">Emergency Deposit</th>
                                    <th class="wd-15p">Office Cost</th>
                                    <th class="wd-15p">Total</th>
                                    <th class="wd-15p">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?=$row->create_user?></td>
                                    <td><?=$member_name = $this->db->select('name')->where('username',$row->create_user)->get('user')->row()->name?>
                                    </td>
                                    <td><?=$member_daily_deposit = $this->db->select_sum('amount')->where('member_id',$row->create_user)->get('daily')->row()->amount?>
                                    </td>
                                    <td><?=$member_emergency_deposit = $this->db->select_sum('amount')->where('memberIdEmg',$row->create_user)->get('emergency')->row()->amount?>
                                    </td>
                                    <td><?=$member_office_cost_deposit = $this->db->select_sum('amount')->where('member_id',$row->create_user)->get('monthly')->row()->amount?>
                                    </td>
                                    <td><?=$member_office_cost_deposit + $member_daily_deposit + $member_emergency_deposit?>
                                    </td>
                                    <td width='5%'>
                                        <a href="<?=base_url('resignation/approve/'.$row->resign_id)?>"
                                            class="btn btn-sm btn-info" title="Approve"><i
                                                class="fas fa-check-circle"></i></a>
                                        <a href="<?=base_url('resignation/delete/'.$row->resign_id)?>"
                                            class="btn btn-sm btn-danger" title="Cancel"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>