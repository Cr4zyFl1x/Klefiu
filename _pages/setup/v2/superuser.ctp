<?php
require_once '_handler/accountSaver.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <?php require_once '_include/head.inc.php'; ?>

        <?php if (isset($_GET['check']))  { ?>
            <script type="text/javascript">history.pushState(null, "", "setup.php?path=/setup/superuser");</script>
        <?php } ?>

    </head>

    <body class="bg-light" onload="onLoad()">

        <!-- // CONTENT // -->
        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="<?php echo $setupConfig['logoPath']; ?>" alt="Logo">
                <h2>Administrative user creation</h2>
                <p class="lead">Please fill in personal user details below.</p>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 order-md-1">

                    <?php
                    if ($error) {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">".$form['status']."</div>";
                    } ?>


                    <h4 class="mb-3">Personal details</h4>
                    <form class="needs-validation" novalidate method="post" action="setup.php?path=/setup/superuser&check" onchange="modalUpdateData()" onsubmit="formLoad('savePersonalData', 'Try again', 5000); $('#accountModal').modal('hide');">

                        <div class="row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $form['email']; ?>" placeholder="mymail@example.com" required />
                            </div>
                            <div class="col-md-6">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="maxmus" value="<?php echo $form['username']; ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-3">
                                <label for="salutation">Salutation</label>
                                <select name="salutation" id="salutation" class="form-control" required />
                                    <option value="m" selected>Mr.</option>
                                    <option value="f">Ms. / Mrs.</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="prename">Prename</label>
                                <input type="text" class="form-control" id="prename" name="prename" placeholder="Max" value="<?php echo $form['prename']; ?>" required />
                            </div>
                            <div class="col-md">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Mustermann" value="<?php echo $form['lastname']; ?>" required />
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-6">
                                <label for="street">Street</label>
                                <input type="text" name="street" id="street" class="form-control" placeholder="Crossy Road" value="<?php echo $form['street']; ?>" required />
                            </div>
                            <div class="col-md-3">
                                <label for="houseNumber">House number</label>
                                <input type="number" name="houseNumber" id="houseNumber" class="form-control" placeholder="152" value="<?php echo $form['houseNumber']; ?>" required />
                            </div>
                            <div class="col-md-3">
                                <label for="zipCode">Zip code</label>
                                <input type="number" name="zipCode" id="zipCode" class="form-control" placeholder="48265" value="<?php echo $form['zipCode']; ?>" required />
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-4">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Munich" value="<?php echo $form['city']; ?>" required />
                            </div>
                            <div class="col-md-8">
                                <label for="country">State / Country</label>
                                <input type="text" name="country" id="country" class="form-control" placeholder="Germany" value="<?php echo $form['country']; ?>" required />
                            </div>
                        </div>

                        <div class="row py-1">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="" value="" required />
                            </div>
                            <div class="col-md-6">
                                <label for="password2">Repeat password</label>
                                <input type="password" name="password2" id="password2" class="form-control" placeholder="" value="" required />
                            </div>
                        </div>

                        <hr class="mb-4">
                        <div class="row py-1">
                            <div class="col-md-12">
                                <button type="button" id="savePersonalData" class="btn btn-primary float-right" data-toggle="modal" data-target="#accountModal">Create account</button>
                            </div>
                        </div>

                        <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="accountModalTitle">Create account</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are these account details right?<br><br>
                                        <b>E-Mail: </b><span id="mod_email" class="font-italic">n/A</span><br>
                                        <b>Username: </b><span id="mod_username" class="font-italic">n/A</span><br>
                                        <b>Password: </b><span id="mod_password" class="font-italic">****</span><br><br>
                                        <b>Address:</b><br>
                                        <span id="mod_address1">n/A</span><br>
                                        <span id="mod_address2">n/A</span><br>
                                        <span id="mod_address3">n/A</span><br>
                                        <span id="mod_address4">n/A</span><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-primary">Yes, create account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <!-- // FOOTER // -->
            <?php require_once '_include/footer.inc.php'; ?>


        </div>

        <!-- // SCRIPTS // -->
        <?php require_once '_include/scripts.inc.php'; ?>
    
    
        <script>
            function modalUpdateData() {
                document.getElementById('mod_email').innerHTML = document.getElementById('email').value;
                document.getElementById('mod_username').innerHTML = document.getElementById('username').value;
                document.getElementById('mod_address1').innerHTML = document.getElementById('prename').value + " " + document.getElementById('lastname').value;
                document.getElementById('mod_address2').innerHTML = document.getElementById('street').value + " " + document.getElementById('houseNumber').value;
                document.getElementById('mod_address3').innerHTML = document.getElementById('zipCode').value + " " + document.getElementById('city').value;
                document.getElementById('mod_address4').innerHTML = document.getElementById('country').value;
            }
            function onLoad() {
                document.getElementById('salutation').value = "<?php echo $form['salutation']; ?>";
            }
        </script>


    </body>
</html>
