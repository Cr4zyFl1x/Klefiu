<?php
if (!extension_loaded('pdo') || !extension_loaded('pdo_mysql') || !extension_loaded('curl') || !extension_loaded('json') || !extension_loaded('apcu') || !extension_loaded('mysqli') || !extension_loaded('geoip') || !extension_loaded('bcmath') || (phpversion() < 7.3) || PHP_OS !== 'Linux') {
    $error = true;
}
if (!is_writable('_storage/') || !is_writable('_include/config/mySQL.php'))
    $error = true;
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
                <h2>System check</h2>
            </div>
            <div class="py-2 text-left">
                <?php if ($error) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">One or more components are not compatible!</div>";
                } else {
                    echo "<div class=\"alert alert-success\" role=\"alert\">System checked successfully! All components are compatible!</div>";
                }?>
                <p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Help</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-pdo</td>
                                <td><?php if (!extension_loaded('pdo')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/pdo.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-pdo_mysql</td>
                                <td><?php if (!extension_loaded('pdo_mysql')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/pdo.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-curl</td>
                                <td><?php if (!extension_loaded('curl')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/curl.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-json</td>
                                <td><?php if (!extension_loaded('json')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/json.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-apcu</td>
                                <td><?php if (!extension_loaded('apcu')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/apcu.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-mysqli</td>
                                <td><?php if (!extension_loaded('mysqli')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/mysqli.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-geoip</td>
                                <td><?php if (!extension_loaded('geoip')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/geoip.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Extension</td>
                                <td>php-bcmath</td>
                                <td><?php if (!extension_loaded('bcmath')) { echo "<span class='text-danger'>Not installed!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/math.installation.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-php"></i> PHP-Version</td>
                                <td>PHP Version</td>
                                <td><?php if (phpversion() < 7.3) { echo "<span class='text-danger'>".phpversion()." < 7.3"."</span>"; } else { echo "<span class='text-success'>".phpversion()."</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.php.net/manual/en/install.php" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fab fa-linux"></i> OS-Type</td>
                                <td>PHP_OS</td>
                                <td><?php if (PHP_OS !== 'Linux') { echo "<span class='text-danger'>".PHP_OS."</span>"; } else { echo "<span class='text-success'>".PHP_OS."</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://www.kernel.org/" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-folder"></i> Folder</td>
                                <td>_storage/</td>
                                <td><?php if (!is_writable('_storage/')) { echo "<span class='text-danger'>Not writable!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://wiki.debian.org/Permissions" target="_blank">Help page</a></span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-folder"></i> Folder</td>
                                <td>_include/config/mySQL.php</td>
                                <td><?php if (!is_writable('_include/config/mySQL.php')) { echo "<span class='text-danger'>Not writable!</span>"; } else { echo "<span class='text-success'>OK</span>"; } ?></td>
                                <td><span class="text-info"><a href="https://wiki.debian.org/Permissions" target="_blank">Help page</a></span></td>
                            </tr>
                        </tbody>
                    </table>
                </p>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary btn-lg float-right" <?php if ($error) { echo "disabled='disabled'"; } ?> onclick="window.location.href='setup.php?path=/setup/requirements&updatePath=/setup/sql'; formLoad('next');" id="next">Next step</button>
                    <button class="btn btn-secondary btn-lg float-left" <?php if (!$error) { echo "disabled='disabled'"; } ?> onclick="window.location.reload(); formLoad('reload');" id="reload">Refresh</button>
                </div>
            </div>

            <!-- // FOOTER // -->
            <?php require_once '_include/footer.inc.php'; ?>


        </div>

        <!-- // SCRIPTS // -->
        <?php require_once '_include/scripts.inc.php'; ?>


    </body>
</html>
