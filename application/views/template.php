<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Start your development with a Dashboard for Bootstrap 4." name="description">
    <meta content="Spruko" name="author">

    <!-- Title -->
    <title><?=$title?></title>

    <!-- Favicon -->
    <link href="<?= base_url() ?>/assets/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Ansta CSS -->
    <link href="<?= base_url() ?>/assets/css/dashboard.css" rel="stylesheet" type="text/css">
    <!-- Data table css -->
    <link href="<?= base_url() ?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" rel="stylesheet" />
    <!-- Custom scroll bar css-->
    <link href="<?= base_url() ?>/assets/plugins/customscroll/jquery.mCustomScrollbar.css" rel="stylesheet" />
    <!-- form Uploads -->
    <link href="<?= base_url() ?>/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
    <!-- Sidemenu Css -->
    <link href="<?= base_url() ?>/assets/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">
    <!--Select2 css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/select2/select2.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

</head>

<body class="app sidebar-mini rtl">
    <div id="global-loader"></div>
    <div class="page">
        <div class="page-main">
            <!-- Sidebar menu-->
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            <aside class="app-sidebar ">
                <div class="sidebar-img">
                    <a class="navbar-brand" href="<?=base_url()?>"><img alt="..." class="navbar-brand-img main-logo"
                            src="<?= base_url() ?>/assets/img/brand/logo-dark.png"> <img alt="..."
                            class="navbar-brand-img logo" src="<?= base_url() ?>/assets/img/brand/logo.png"></a>
                    <ul class="side-menu">
                        <?php if($this->login->user_login()->level == 1){ ?>
                        <li class="slide">
                            <a class="side-menu__item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>"
                                href="<?=base_url()?>"><i class="side-menu__icon fe fe-home"></i><span
                                    class="side-menu__label">Dashboard</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('user')?>"><i
                                    class="side-menu__icon fe fe-users"></i><span
                                    class="side-menu__label">Members</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('member')?>"><i
                                    class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Print
                                    Members</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('resignation/list')?>"><i
                                    class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Resign
                                    Members</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?= base_url('due') ?>"><i
                                    class="side-menu__icon fe fe-book-open"></i><span
                                    class="side-menu__label">Due</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-grid"></i><span
                                    class="side-menu__label">Deposite</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="<?=base_url('dailyDeposite')?>" class="slide-item">Daily Deposite</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('monthlyDeposite')?>" class="slide-item">Office Cost
                                        Deposite</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('emergency')?>" class="slide-item">Emergency Deposite</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?= base_url('monthWise') ?>"><i
                                    class="side-menu__icon fe fe-calendar"></i><span class="side-menu__label">Month
                                    Wise</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-edit"></i><span
                                    class="side-menu__label">Expense</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="<?=base_url('category')?>" class="slide-item">Expense Categories</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('expense')?>" class="slide-item">Expense</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-git-merge"></i><span
                                    class="side-menu__label">Investment</span><i
                                    class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="<?=base_url('project')?>" class="slide-item">Project</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('profit')?>" class="slide-item">Profit</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('loss')?>" class="slide-item">Loss</a>
                                </li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('resignation/list')?>"><i
                                    class="side-menu__icon fe fe-alert-triangle"></i><span
                                    class="side-menu__label">Request Resign</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('resignation/resignMember')?>"><i
                                    class="side-menu__icon fe fe-user-x"></i><span class="side-menu__label">Resign
                                    Member</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('report')?>"><i
                                    class="side-menu__icon fe fe-file-text"></i><span
                                    class="side-menu__label">Report</span></a>
                        </li>
                        <?php }elseif($this->login->user_login()->level == 3){ ?>
                        <li class="slide">
                            <a class="side-menu__item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>"
                                href="<?=base_url()?>"><i class="side-menu__icon fe fe-home"></i><span
                                    class="side-menu__label">Dashboard</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?= base_url('due') ?>"><i
                                    class="side-menu__icon fe fe-book-open"></i><span
                                    class="side-menu__label">Due</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('member')?>"><i
                                    class="side-menu__icon fe fe-folder"></i><span class="side-menu__label">Print
                                    Members</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i
                                    class="side-menu__icon fe fe-grid"></i><span
                                    class="side-menu__label">Deposite</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a href="<?=base_url('dailyDeposite')?>" class="slide-item">Daily Deposite</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('monthlyDeposite')?>" class="slide-item">Office Cost
                                        Deposite</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('emergency')?>" class="slide-item">Emergency Deposite</a>
                                </li>
                            </ul>
                        </li>

                        <?php }else{ ?>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('userdash')?>"><i
                                    class="side-menu__icon fa fa-home"></i><span
                                    class="side-menu__label">Dashboard</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('statement')?>"><i
                                    class="side-menu__icon fe fe-file-text"></i><span
                                    class="side-menu__label">Statment</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" href="<?=base_url('resignation')?>"><i
                                    class="side-menu__icon fe fe-alert-triangle"></i><span
                                    class="side-menu__label">Resign</span></a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </aside>
            <!-- Sidebar menu-->

            <!-- app-content-->
            <div class="app-content ">
                <div class="side-app">
                    <div class="main-content">
                        <div class="p-2 d-block d-sm-none navbar-sm-search">
                            <!-- Form -->
                            <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div><input class="form-control" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Top navbar -->
                        <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main">
                            <div class="container-fluid">
                                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar"
                                    href="#"></a>

                                <!-- Brand -->
                                <a class="navbar-brand pt-0 d-md-none" href="index-2.html">
                                    <img src="assets/img/brand/logo-light.png" class="navbar-brand-img" alt="...">
                                </a>
                                <!-- Form -->
                                <form class="navbar-search navbar-search-dark form-inline mr-3  ml-lg-auto">

                                </form>
                                <!-- User -->
                                <ul class="navbar-nav align-items-center ">
                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0"
                                            data-toggle="dropdown" href="#" role="button">
                                            <div class="media align-items-center">
                                                <span class="avatar avatar-sm rounded-circle"><img
                                                        alt="Image placeholder"
                                                        src="<?= base_url() ?>/assets/images/user/<?=$this->login->user_login()->user_image?>"></span>
                                                <div class="media-body ml-2 d-none d-lg-block">
                                                    <span class="mb-0 "><?=$this->login->user_login()->name?></span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                            <div class=" dropdown-header noti-title">
                                                <h6 class="text-overflow m-0">Welcome!
                                                    <?=$this->login->user_login()->name?></h6>
                                            </div>
                                            <a class="dropdown-item"
                                                href="<?=base_url('user/profile/'.$this->login->user_login()->user_id)?>"><i
                                                    class="ni ni-single-02"></i> <span>My profile</span></a>
                                            <!-- <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                                            <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                                            <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i> <span>Support</span></a> -->
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                href="<?= base_url('auth/logout') ?>"><i class="ni ni-user-run"></i>
                                                <span>Logout</span></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Top navbar-->
                        <script src="<?= base_url() ?>/assets/plugins/jquery/dist/jquery.min.js"></script>

                        <?= $contents ?>

                        <!-- Footer -->
                        <footer class="footer">
                            <div class="row align-items-center justify-content-xl-between">
                                <div class="col-xl-6">
                                    <div class="copyright text-center text-xl-left text-muted">
                                        <p class="text-sm font-weight-500">Copyright 2021 © All Rights Reserved.</p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="float-right text-sm font-weight-500"><a href="">Kawaranbazar Chandpur
                                            Babsaiye Somazkollan Somity</a></p>
                                </div>
                            </div>
                        </footer>
                        <!-- Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- app-content -->
    </div>
    </div>
    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Ansta Scripts -->

    <!-- Core -->

    <script src="<?= base_url() ?>/assets/js/popper.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Optional JS -->
    <script src="<?= base_url() ?>/assets/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/chart.js/dist/Chart.extension.js"></script>

    <!-- Data tables -->
    <script src="<?= base_url() ?>/assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <!-- Date Picker-->
    <script src="<?= base_url() ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Fullside-menu Js-->
    <script src="<?= base_url() ?>/assets/plugins/toggle-sidebar/js/sidemenu.js"></script>

    <!--Select2 js-->
    <script src="<?= base_url() ?>/assets/plugins/select2/select2.full.js"></script>
    <!-- file uploads js -->
    <script src="<?= base_url() ?>/assets/plugins/fileuploads/js/dropify.min.js"></script>
    <!-- Custom scroll bar Js-->
    <script src="<?= base_url() ?>/assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Ansta JS -->
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>/assets/js/select2.js"></script>
    <script>
    $(function(e) {
        $('#example').DataTable();
        $('#example1').DataTable();
    });
    $('.datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });
    $('.dropify').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove': 'Remove',
            'error': 'Ooops, something wrong appended.'
        },
        error: {
            'fileSize': 'The file size is too big (2M max).'
        }
    });
    </script>
</body>

</html>