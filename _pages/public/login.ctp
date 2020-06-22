<?php
// Class definitions
use Klefiu\App\SQL;
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $lng['login']['title'] . ' | ' . SQL::getSetting('panel_title'); ?></title>
        <?php require_once '_pages/template/head.ctp'; ?>

    </head>

     <body>

        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php require_once '_pages/template/loader.ctp'; ?>


        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('<?php echo $app->utils()->getPanelURL() . '_assets/vendor/lavalite/img/auth/login-bg.jpg'; ?>')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="<?php echo $app->utils()->getPanelURL(); ?>"><img src="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/lavalite/img/brand.svg'; ?>" alt=""></a>
                            </div>
                            <h3><?php echo $lng['login']['heading']; ?></h3>
                            <p><?php echo $lng['login']['welcome']; ?></p>
                            <form action="#!">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="<?php echo $lng['login']['username']; ?>" required="" value="">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="<?php echo $lng['login']['password']; ?>" required="" value="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;<?php echo $lng['login']['rememberme']; ?></span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html"><?php echo $lng['login']['forgotpass']; ?></a>
                                    </div>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme"><?php echo $lng['login']['login']; ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- // SCRIPTS // -->
        <?php require_once '_pages/template/scripts.ctp'; ?>

    </body>
</html>
