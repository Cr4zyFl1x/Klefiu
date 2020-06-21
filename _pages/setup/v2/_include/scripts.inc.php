<script src="_assets/vendor/bootstrap-setup/js/jQuery.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="_assets/vendor/bootstrap-setup/js/jquery-slim.min.js"><\/script>')</script>
        <script src="_assets/vendor/bootstrap-setup/js/popper.min.js"></script>
        <script src="_assets/vendor/bootstrap-setup/js/bootstrap.min.js"></script>
        <script src="_assets/vendor/bootstrap-setup/js/holder.min.js"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';

                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <script type="text/javascript">
            function reloadFormSQL() {
                document.getElementById('initDB').setAttribute('disabled', 'disabled');
            }
            function formLoad(id, returnName = null, resetTime = 5000) {
                document.getElementById(id).innerHTML = "Please wait...";
                document.getElementById(id).setAttribute('disabled', 'disabled');

                if (returnName !== null) {
                    setTimeout(function () {
                        document.getElementById(id).innerHTML = returnName;
                        document.getElementById(id).removeAttribute('disabled');
                    }, resetTime)
                }

            }
        </script>