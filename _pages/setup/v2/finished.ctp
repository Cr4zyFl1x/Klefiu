<!doctype html>
<html lang="en">
    <head>
        <?php require_once '_include/head.inc.php'; ?>

    </head>

    <body class="bg-light">

        <!-- // CONTENT // -->
        <div class="container">
            <div class="h-100 row">
                <div class="col my-auto">
                    <div class="py-5 text-center">
                        <img class="d-block mx-auto mb-4" src="<?php echo $setupConfig['logoPath']; ?>" alt="Logo">
                        <h2>Setup finished!</h2>
                        <p class="lead">Setup completed! The panel is now ready to use!</p>
                        <br><br><br>
                        <a class="btn btn-primary btn-lg" href="setup.php?path=/setup/finished&setupFinished">Finish setup & Go to panel</a>
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
