<?php
require_once '_handler/mySQLInit.php';
?>

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
                <h2>MySQL database initialization</h2>
            </div>
            <div class="py-2 text-left">
                <?php if ($error[0]) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">One or more operations failed!</div>";
                } else {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Database initialized successfully!</div>";
                }?>
                <p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Operation</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><i class="fas fa-database"></i> Clearing database</td>
                        <td><?php if ($error[1]) { echo "<span class='text-danger'>FAILED!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-database"></i> Creating Tables</td>
                        <td><?php if ($error[2]) { echo "<span class='text-danger'>FAILED!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-database"></i> Writing data</td>
                        <td><?php if ($error[3]) { echo "<span class='text-danger'>FAILED!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                    </tr>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary btn-lg float-right" id="next" <?php if ($error[0]) { echo "disabled='disabled'"; } ?> onclick="window.location.href='setup.php?path=/setup/sql/init/result&updatePath=/setup/configuration'; formLoad('next');">Next step</button>
                    <button class="btn btn-secondary btn-lg float-left" id="reload" <?php if (!$error[0]) { echo "disabled='disabled'"; } ?> onclick="window.location.reload(); formLoad('reload');">Refresh</button>
                </div>
            </div>

            <!-- // FOOTER // -->
            <?php require_once '_include/footer.inc.php'; ?>


        </div>

        <!-- // SCRIPTS // -->
        <?php require_once '_include/scripts.inc.php'; ?>


    </body>
</html>
