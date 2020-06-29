<?php
$user = checkLogin();
?>
<html class="no-js" lang="en">
    <head>
        <?php require_once '_pages/template/head.ctp'; ?>

    </head>

    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="body-wrapper" class="wrapper">

            <?php require_once '_pages/template/navbar.ctp'; ?>


            <div class="page-wrap">

                <?php require_once '_pages/template/sidebar.ctp'; ?>


                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row clearfix">

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Disk usage</h6>
                                                <h2>1.25 GB</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-hard-drive"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total disk usage (<?= $app->auth()->getUser()->calculateDiskUsage() . '%'; ?>)</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="<?= $app->auth()->getUser()->calculateDiskUsage(); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $app->auth()->getUser()->calculateDiskUsage() . '%'; ?>;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Downloads</h6>
                                                <h2><?= $app->auth()->getUser()->getTotalDownloads(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-download"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Files downloaded this month</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Files</h6>
                                                <h2><?= $app->auth()->getUser()->getUploadedFiles(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-file"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total files uploaded</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Tickets</h6>
                                                <h2>0</h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-message-square"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Open support tickets</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row ">

                            <!-- // TOP DOWNLOADS // -->
                            <div class="col col-md-8">
                                <div class="card">
                                    <div class="row card-header">
                                            <div class="col-md-6 text-left">
                                                <h3>Top Downloads</h3>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="#"><i class="ik ik-inbox"></i></a>
                                                <span>&nbsp;</span>
                                                <a href="#"><i class="ik ik-plus"></i></a>
                                                <span>&nbsp;</span>
                                                <a href="#"><i class="ik ik-rotate-cw"></i></a>
                                            </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="advanced_table" class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th class="nosort" width="10">
                                                    <label class="custom-control custom-checkbox m-0">
                                                        <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </th>
                                                <th class="nosort">Avatar</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/2.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/3.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/4.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/5.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/2.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>San Francisco</td>
                                                <td>59</td>
                                                <td>2012/08/06</td>
                                                <td>$137,500</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/3.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Rhona Davidson</td>
                                                <td>Integration Specialist</td>
                                                <td>Tokyo</td>
                                                <td>55</td>
                                                <td>2010/10/14</td>
                                                <td>$327,900</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                        <span class="custom-control-label">&nbsp;</span>
                                                    </label>
                                                </td>
                                                <td><img src="img/users/4.jpg" class="table-user-thumb" alt=""></td>
                                                <td>Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>San Francisco</td>
                                                <td>39</td>
                                                <td>2009/09/15</td>
                                                <td>$205,500</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Upload file</h3>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>




                <?php require_once '_pages/template/footer.ctp'; ?>

            </div>
        </div>

        <?php require_once '_pages/template/modals.ctp'; ?>


        <?php require_once '_pages/template/scripts.ctp'; ?>

    </body>
</html>