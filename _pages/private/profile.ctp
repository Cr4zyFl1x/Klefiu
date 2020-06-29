<?php
$user = checkLogin();
require_once '_include/modules/profile_picture.module';
require_once '_include/modules/profile_update.module';
?>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $lng['profile']['title'] . ' | ' . $app->utils()->getSetting('panel_title'); ?></title>
        <?php require_once '_pages/template/head.ctp'; ?>

        <?php if ($_GET['handler']) { ?><script type="text/javascript">history.pushState(null, "", "<?php echo $app->utils()->getPanelURL() . substr($app->siteManager->r('path'), 1); ?>");</script><?php } ?>


        <style>

            .profile-picture-container {
                position: relative;
            }
            .pp-img {
                opacity: 1;
                transition: .5s ease;
                backface-visibility: hidden;
            }

            .pp-hover-action {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }

            .profile-picture-container:hover .pp-img {
                opacity: 0.3;
            }

            .profile-picture-container:hover .pp-hover-action {
                opacity: 1;
            }
        </style>

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
                        <div class="page-header">
                            <div class="row align-items-end">

                                <!-- // HEADING // -->
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-file-text bg-blue"></i>
                                        <div class="d-inline">
                                            <h5><?= $lng['profile']['title']; ?></h5>
                                            <span><?= $lng['profile']['description']; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- // BREADCRUMB // -->
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?= $app->utils()->getPanelURL() . 'app'; ?>"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#!"><?= $lng['profile']['account']; ?></a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <?= $lng['profile']['title']; ?>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="rounded-circle profile-picture-container">
                                                <img src="<?= $app->utils()->getPanelURL() . 'app/account/profile.png'; ?>" class="rounded-circle pp-img" width="150" height="150" />
                                                <div class="pp-hover-action">
                                                    <span style="font-size: 20px"><a onclick="editProfilePicture()" data-toggle="tooltip" data-placement="top" title="<?= $lng['profile']['updateprofilepic']; ?>" href="#profile-picture" aria-controls="pills-profile-picture"><i class="ik ik-edit-2"></i></a></span>
                                                </div>
                                            </div>
                                            <h4 class="card-title mt-10"><?php if (!empty($app->auth()->getUser()->getPrename()) && !empty($app->auth()->getUser()->getLastname())) { echo $app->auth()->getUser()->getPrename() . '&nbsp;' . $app->auth()->getUser()->getLastname(); } else { echo $app->auth()->getUser()->getUsername(); } ?></h4>
                                            <p class="card-subtitle">USER GROUP NAME</p>
                                            <div class="row text-center justify-content-md-center">
                                                <div class="col-4"><a href="#!" class="link" data-toggle="tooltip" data-placement="top" title="<?= $lng['profile']['uploadedfiles']; ?>"><i class="ik ik-file"></i> <span class="font-medium"><?= $app->auth()->getUser()->getUploadedFiles(); ?></span></a></div>
                                                <div class="col-4"><a href="#!" class="link" data-toggle="tooltip" data-placement="top" title="<?= $lng['profile']['totaldownloads']; ?>"><i class="ik ik-download"></i> <span class="font-medium"><?= $app->auth()->getUser()->getTotalDownloads(); ?></span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-0">
                                    <div class="card-body">
                                        <small class="text-muted d-block"><?= $lng['profile']['emailaddress']; ?></small>
                                        <h6><?= $app->auth()->getUser()->getEmail(); ?></h6>

                                        <small class="text-muted d-block pt-10"><?= $lng['profile']['joindate']; ?></small>
                                        <h6><?= $app->auth()->getUser()->getCreationDate($app->utils()->getSetting('panel_localeDateformat')); ?></h6>

                                        <?php if ($app->auth()->getUser()->getAddress()) { ?>

                                        <small class="text-muted d-block pt-10"><?= $lng['profile']['address']; ?></small>
                                        <h6><?=str_replace('\n', '<br />', $app->auth()->getUser()->getAddress()); ?></h6>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card">

                                    <!-- // TAB SELECTOR // -->
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="pills-overview" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account'; ?>')"><?= $lng['profile']['overview']; ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="details-tab" data-toggle="pill" href="#details" role="tab" aria-controls="pills-details" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/details'; ?>')"><?= $lng['profile']['details']; ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-picture-tab" data-toggle="pill" href="#profile-picture" role="tab" aria-controls="pills-profile-picture" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/profile-picture'; ?>')"><?= $lng['profile']['profile_picture']; ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="pills-password" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/password'; ?>')"><?= $lng['profile']['password']; ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="preferences-tab" data-toggle="pill" href="#preferences" role="tab" aria-controls="pills-preferences" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/preferences'; ?>')"><?= $lng['profile']['preferences']; ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="sessions-tab" data-toggle="pill" href="#sessions" role="tab" aria-controls="pills-sessions" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/sessions'; ?>')"><?= $lng['profile']['sessions']; ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="login-history-tab" data-toggle="pill" href="#login-history" role="tab" aria-controls="pills-login-history" aria-selected="false" onclick="history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/login-history'; ?>')"><?= $lng['profile']['login_history']; ?></a>
                                        </li>
                                    </ul>


                                    <!-- // TABS CONTENT // -->
                                    <div class="tab-content" id="pills-tabContent">

                                        <!-- // PROFILE SUMMARY // -->
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['login']['username']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getUsername(); ?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['forgot_password']['email']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getEmail(); ?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['profile']['usergroup']; ?></strong>
                                                        <br>
                                                        <p class="text-muted">USER GROUP NAME</p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['profile']['joindate']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getCreationDate($app->utils()->getSetting('panel_localeDateformat')); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['profile']['totaldiskspace']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getTotalBytes(); ?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['profile']['useddiskspace']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getUsedBytes(); ?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['profile']['uploadedfiles']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getUploadedFiles(); ?></p>
                                                    </div>
                                                    <div class="col-md-3 col-6"> <strong><?= $lng['profile']['totaldownloads']; ?></strong>
                                                        <br>
                                                        <p class="text-muted"><?= $app->auth()->getUser()->getTotalDownloads(); ?></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h6 class="mt-30"><?= $lng['dashboard']['diskusage']; ?>: <span class="pull-right"><?= $app->auth()->getUser()->calculateDiskUsage() . '%'; ?></span></h6>
                                                <div class="progress  progress-sm">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="<?= $app->auth()->getUser()->calculateDiskUsage(); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $app->auth()->getUser()->calculateDiskUsage() . '%'; ?>;"> <span class="sr-only"><?= $app->auth()->getUser()->calculateDiskUsage(); ?>% Used</span> </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- // PROFILE SETTINGS // -->
                                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                            <div class="card-body">
                                                <form class="form-horizontal" method="post" action="<?= $app->utils()->getPanelURL() . 'app/account/details?handler=profile-update' ?>" autocomplete="off" autocapitalize="off">

                                                    <?php if ($profilestatusMsg) {
                                                        echo $form['statusProfile'];
                                                        echo $form['statusMail'];
                                                    }?>


                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="salutation"><?= $lng['profile']['salutation']; ?><span class="text-red">*</span></label>
                                                                <select class="form-control" name="salutation" id="salutation">
                                                                    <option value="f"><?= $lng['profile']['mrs']; ?></option>
                                                                    <option value="m"><?= $lng['profile']['mr']; ?></option>
                                                                    <option value="d" selected><?= $lng['profile']['diversity']; ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="prename"><?= $lng['profile']['prename']; ?></label>
                                                            <input type="text" placeholder="Johnathan" class="form-control" name="prename" id="prename" value="<?= $app->auth()->getUser()->getPrename(); ?>">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="prename"><?= $lng['profile']['lastname']; ?></label>
                                                            <input type="text" placeholder="Doe" class="form-control" name="lastname" id="lastname" value="<?= $app->auth()->getUser()->getLastname(); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="username"><?= $lng['profile']['username']; ?></label>
                                                            <div class="input-group" id="username-group" onclick="showModal()">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text">@</label>
                                                                </span>
                                                                <input type="text" disabled class="form-control" id="username" name="username" value="<?= $app->auth()->getUser()->getUsername(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="email"><?= $lng['profile']['emailaddress']; ?><span class="text-red">*</span></label>
                                                                <input type="email" placeholder="jonathan@example.com" class="form-control" name="email" id="email" value="<?= $app->auth()->getUser()->getEmail(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label for="street"><?= $lng['profile']['street']; ?></label>
                                                                <input type="text" placeholder="Fith Ave" class="form-control" name="street" id="street" value="<?= $app->auth()->getUser()->getStreet(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="houseNumber"><?= $lng['profile']['housenumber']; ?></label>
                                                                <input type="number" placeholder="15" class="form-control" name="houseNumber" id="houseNumber" value="<?= $app->auth()->getUser()->getHouseNumber(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="zipCode"><?= $lng['profile']['zipcode']; ?></label>
                                                                <input type="number" placeholder="50667" class="form-control" name="zipCode" id="zipCode" value="<?= $app->auth()->getUser()->getZipCode(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="city"><?= $lng['profile']['city']; ?></label>
                                                                <input type="text" placeholder="Cologne" class="form-control" name="city" id="city" value="<?= $app->auth()->getUser()->getCity(); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="country"><?= $lng['profile']['country']; ?><span class="text-red">*</span></label>
                                                                <input type="text" placeholder="Germany" class="form-control" name="country" id="country" value="<?= $app->auth()->getUser()->getCountry(); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button class="btn btn-success" type="submit"><?= $lng['panel']['confirm']; ?></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- // PROFILE PICTURE // -->
                                        <div class="tab-pane fade" id="profile-picture" role="tabpanel" aria-labelledby="profile-picture-tab">
                                            <div class="card-body">
                                                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= $app->utils()->getPanelURL() . 'app/account/profile-picture?handler=profile-picture' ?>">

                                                    <?php if ($statusMsgPicture) {
                                                        echo $form['statusPicture'];
                                                    }?>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label><?= $lng['profile']['maximumfilesize']; ?></label>
                                                                <input type="file" name="profile_picture" accept=".jpg,.png,.jpeg,.bmp" class="file-upload-default" required>
                                                                <div class="input-group col-xs-12">
                                                                    <span onclick="document.getElementById('file-upload-browse-button').click()">
                                                                        <input type="text" class="form-control file-upload-info" disabled placeholder="<?= $lng['profile']['nofilepicked']; ?>">
                                                                    </span>
                                                                    <span class="input-group-append">
                                                                    <button class="file-upload-browse btn btn-primary" id="file-upload-browse-button" type="button"><?= $lng['profile']['uploadimage']; ?></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <button class="btn btn-success" type="submit"><?= $lng['profile']['updateprofilepic']; ?></button>
                                                            <?php if ($app->auth()->getUser()->profilePictureIsSet()) { ?><button class="btn btn-danger" type="button" onclick="window.location.href='<?= $app->utils()->getPanelURL() . 'app/account/profile-picture?handler=profile-picture-delete'; ?>'" ><?= $lng['profile']['deleteprofilepic']; ?></button><?php } ?>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                        <!-- // PASSWORD CHANGE // -->
                                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                            <div class="card-body">
                                                <form class="form-horizontal" method="post" action="<?= $app->utils()->getPanelURL() . 'app/account/password/?handler=password' ?>">

                                                    <div id="status">
                                                        <?php if ($statusMsg) {
                                                            echo $form['status'];
                                                        }?>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="password"><?= $lng['profile']['password']; ?></label>
                                                            <div class="input-group" id="password-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text"><span class="ik ik-lock"></span></label>
                                                                </span>
                                                                <input type="password" class="form-control" id="password" name="password" value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="newpassword"><?= $lng['profile']['newpassword']; ?></label>
                                                            <div class="input-group" id="newpassword-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text"><span class="ik ik-lock"></span></label>
                                                                </span>
                                                                <input type="password" class="form-control" id="newpassword" name="newpassword" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="repeatnewpassword"><?= $lng['profile']['repeatnewpassword']; ?></label>
                                                            <div class="input-group" id="repeatnewpassword-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text"><span class="ik ik-lock"></span></label>
                                                                </span>
                                                                <input type="password" class="form-control" id="repeatnewpassword" name="repeatnewpassword" value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md">
                                                            <button class="btn btn-success" type="submit"><?= $lng['panel']['confirm']; ?></button>
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



                <?php require_once '_pages/template/footer.ctp'; ?>

            </div>
        </div>

        <div class="modal fade" id="usernameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterLabel"><?= $lng['profile']['usernamechange']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <?= $lng['profile']['usernamechangeinfo']; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once '_pages/template/modals.ctp'; ?>


        <?php require_once '_pages/template/scripts.ctp'; ?>

        <script type="text/javascript">
            (function($) {
                'use strict';
                $(function() {
                    $('.file-upload-browse').on('click', function() {
                        var file = $(this).parent().parent().parent().find('.file-upload-default');
                        file.trigger('click');
                    });
                    $('.file-upload-default').on('change', function() {
                        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
                    });
                });
            })(jQuery);

            setTimeout(function () {
                $('#salutation').val('<?= $app->auth()->getUser()->getSalutationChar(); ?>');
            }, 1000)

            function showModal() {
                $('#usernameModal').modal('show');
            }
            
            function editProfilePicture() {
                $('#profile-picture-tab').tab('show');
                history.pushState(null, '', '<?= $app->utils()->getPanelURL() . 'app/account/profile-picture'; ?>');
                setTimeout(function () {
                    $('#file-upload-browse-button').click();
                }, 500);
            }

        </script>

        <?php if (in_array($app->siteManager->r()[2], ['overview', 'details', 'profile-picture', 'password', 'preferences', 'sessions', 'login-history'])) { ?>

        <script type="text/javascript">

            $('<?= '#' . $app->siteManager->r()[2] . '-tab'; ?>').tab('show');

        </script>
        <?php } ?>


    </body>
</html>