<!doctype html>
<html lang="en">
    <head>
        <?php require_once '_include/head.inc.php'; ?>

    </head>

    <body class="bg-light">

        <!-- // CONTENT // -->
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" height="50" width="50" src="<?php echo $setup['logoPath']; ?>" alt="Logo">
                <h2>Welcome!</h2>
                <p class="lead">Thankyou for choosing UCMS!<br>This setup wizard helps you to install the panel on to your webserver. The panel modules can be configured later in the panel settings.</p>
                <hr>
                <p class="lead">
                    The wizard will guide you through the following steps:<br><br>
                    <b>1.</b> Welcome!<br>
                    <b>2.</b> System check (PHP-Version, PHP-Extensions, OS, etc.)<br>
                    <b>3.</b> Database connection<br>
                    <b>4.</b> Database initialization<br>
                    <b>5.</b> Configuration of basic settings (Domain, SSL, Mail, usw.)<br>
                    <b>6.</b> Administrative user creation<br>
                    <b>7.</b> License key activation<br>
                    <b>8.</b> Setup completion<br>
                </p>
                <hr>
                <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#welcomeModal" href="setup.php?path=/setup&updatePath=/setup/requirements">Start setup</a>

                <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="welcomeModalTitle">Begin setup?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary" id="start" onclick="window.location.href='setup.php?path=/setup&updatePath=/setup/requirements'; formLoad('start');">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- // FOOTER // -->
            <?php require_once '_include/footer.inc.php'; ?>


        </div>

        <!-- // SCRIPTS // -->
        <?php require_once '_include/scripts.inc.php'; ?>


    </body>
</html>
