<?php
require_once '_handler/mySQLCheck.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <?php require_once '_include/head.inc.php'; ?>

        <?php if (isset($_GET['connect']))  { ?>
            <script type="text/javascript">history.pushState(null, "", "setup.php?path=/setup/sql");</script>
        <?php } ?>

    </head>

    <body class="bg-light">

        <!-- // CONTENT // -->
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" height="50" width="50" src="<?php echo $setup['logoPath']; ?>" alt="Logo">
                <h2>MySQL connection</h2>
                <p class="lead">Please fill in your database connection details below.</p>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 order-md-1">

                    <?php
                    if ($run && !$error) {
                        echo "<div class=\"alert alert-success\" role=\"alert\">Database connection to '".$form['db_name']."'@'".$form['db_host']."' was successful.</div>";
                    } else if ($run && $error) {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">ERROR: ".$connCheck->connect_error."</div>";
                    }
                    ?>


                    <h4 class="mb-3">Connection details</h4>
                    <form class="needs-validation" novalidate method="post" action="setup.php?path=/setup/sql&connect">
                        <div class="row" onclick="reloadFormSQL()">
                            <div class="col">
                                <label for="db_host">Database host</label>
                                <input type="text" class="form-control" id="db_host" name="db_host" placeholder="127.0.0.1" value="<?php echo $form['db_host']; ?>" required>
                                <div class="invalid-feedback">
                                    Valid host is required.
                                </div>
                            </div>
                        </div>

                        <div class="row py-1" onclick="reloadFormSQL()">
                            <div class="col">
                                <label for="db_user">Database user</label>
                                <input type="text" class="form-control" id="db_user" name="db_user" placeholder="ucms_app" value="<?php echo $form['db_user']; ?>" required>
                                <div class="invalid-feedback">
                                    Valid username is required.
                                </div>
                            </div>
                            <div class="col">
                                <label for="db_pass">Database user password</label>
                                <input type="password" class="form-control" id="db_pass" name="db_pass" placeholder="" value="" required>
                                <div class="invalid-feedback">
                                    Valid user password is required.
                                </div>
                            </div>
                        </div>

                        <div class="row py-1" onclick="reloadFormSQL()">
                            <div class="col-md-8">
                                <label for="db_name">Database name</label>
                                <input type="text" class="form-control" id="db_name" name="db_name" placeholder="ucms_app" value="<?php echo $form['db_name']; ?>" required>
                                <div class="invalid-feedback">
                                    Valid database name is required.
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="db_port">Database host port</label>
                                <input type="number" class="form-control" id="db_port" name="db_port" placeholder="3306" value="<?php echo $form['db_port']; ?>" required>
                                <div class="invalid-feedback">
                                    Valid port is required.
                                </div>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <div class="row py-1">
                            <div class="col-md-12">
                                <button type="submit" id="checkDB" class="btn btn-secondary float-left">Check database</button>
                                <button type="button" id="initDB" <?php if (!(($run && !$error) || isset($conn))) { echo "disabled='disabled'"; } ?> class="btn btn-primary float-right" data-toggle="modal" data-target="#sqlModal">Initialize database</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal fade" id="sqlModal" tabindex="-1" role="dialog" aria-labelledby="sqlModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sqlModalTitle">Initialize database?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    This will delete all entries in the database!
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="button" id="initDBStart" class="btn btn-primary" onclick="window.location.href='setup.php?path=/setup/sql&updatePath=/setup/sql/init'; formLoad('initDBStart');">Continue</button>
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
