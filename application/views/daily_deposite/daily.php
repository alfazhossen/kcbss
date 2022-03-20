<!-- Page content -->
<div class="container-fluid pt-8">
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
        </ol>
        <div class="btn-group mb-0">
            <a href="<?=base_url('dailyDeposite/add')?>" class="btn btn-primary btn-sm">Add</a>
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
                        <table id="datatable" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">#</th>
                                    <th class="wd-15p">Date</th>
                                    <th class="wd-15p">Member ID</th>
                                    <!--<th class="wd-20p">Member Name</th>-->
                                    <th class="wd-15p">Amount</th>
                                    <!-- <th class="wd-10p">Total Deposite</th> -->
                                    <th width=5%>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
		$(document).ready(function(e) {
			var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
			$('#datatable').DataTable({
				"pageLength": 10,
				"serverSide": true,
				"order": [
					[0, "asc"]
				],
				"ajax": {
					url: base_url + 'dailyDeposite/showEmployees',
					type: 'POST'
				},
			}); // End of DataTable
		}); // End D
	</script>