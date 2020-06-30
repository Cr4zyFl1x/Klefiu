<?php
require_once '_include/modules/forgot_password.module';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $lng['forgot_password']['title'] . ' | ' . $app->utils()->getSetting('panel_title'); ?></title>
        <?php require_once '_pages/template/head.ctp'; ?>

        <?php if ($_GET['handler']) { ?><script type="text/javascript">history.pushState(null, "", "<?php echo $app->utils()->getPanelURL() ."forgot-password"; ?>");</script><?php } ?>

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
                                <a href="<?php echo $app->utils()->getPanelURL(); ?>"><img src="<?php echo $app->utils()->getPanelURL() . '_assets/klefiu/img/brand-cubic.png'; ?>" height="75px" alt=""></a>
                            </div>
                            <h3><?php echo $lng['forgot_password']['title']; ?></h3>
                            <?php
                            if (!$statusMsg) {
                                echo '<p>' . $lng['forgot_password']['welcome'] . '</p>';
                            } else {
                                echo '<div id="statusMSG">' . $form['status'] . "</div>";
                            }
                            ?>

                            <form method="post" action="<?php echo $app->utils()->getPanelURL() . 'forgot-password?handler=forgot-password'; ?>">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="<?php echo $lng['forgot_password']['email']; ?>" name="email" autocapitalize="off" autocomplete="off" required="">
                                    <i class="ik ik-mail"></i>
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme"><?php echo $lng['panel']['send']; ?></button>
                                </div>
                            </form>
                            <div class="register">
                                <p><a href="<?php echo $app->utils()->getPanelURL() . 'login'; ?>"><?php echo $lng['forgot_password']['backtologin']; ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once '_pages/template/scripts.ctp'; ?>

    </body>
</html>