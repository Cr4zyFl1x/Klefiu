<?php
require_once '_include/modules/reset_password.module';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title><?php echo $lng['reset_password']['title'] . ' | ' . $app->utils()->getSetting('panel_title'); ?></title>
        <?php require_once '_pages/template/head.ctp'; ?>

        <?php if ($_GET['handler'] || $_GET['action']) { ?><script type="text/javascript">history.pushState(null, "", "<?php echo $app->utils()->getPanelURL() ."forgot-password/" . $app->siteManager->r()[1]; ?>");</script><?php } ?>

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
                            <h3><?php echo $lng['reset_password']['title']; ?></h3>
                            <?php
                            if (!$statusMsg) {
                                echo '<p>' . $lng['reset_password']['welcome'] . '</p>';
                            } else {
                                echo '<div id="statusMSG">' . $form['status'] . "</div>";
                            }
                            ?>

                            <form method="post" action="<?php echo $app->utils()->getPanelURL() . 'forgot-password/'.$app->siteManager->r()[1].'?handler=reset-password'; if (!empty($_GET['next'])) echo "&next=". urlencode($_GET['next']); ?>">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="<?php echo $lng['reset_password']['newpassword']; ?>" name="newPassword" autocapitalize="off" autocomplete="off" required="" value="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="<?php echo $lng['reset_password']['repeatnewpassword']; ?>" name="newPassword2" autocomplete="off" autocapitalize="off" required="" value="">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group hidden" hidden>
                                    <input type="hidden" class="form-control" name="resetToken" value="<?=$app->siteManager->r()[1]; ?>" />
                                </div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme"><?php echo $lng['panel']['send']; ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once '_pages/template/scripts.ctp'; ?>

    </body>
</html>