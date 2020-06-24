<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ThemeKit - Admin Template</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#EF4153">

        <link rel="icon" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/lavalite/img/brand.svg'; ?>" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/bootstrap/dist/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/fontawesome-free/css/all.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/icon-kit/dist/css/iconkit.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/ionicons/dist/css/ionicons.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/jvectormap/jquery-jvectormap.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/weather-icons/css/weather-icons.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/c3/c3.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/owl.carousel/dist/assets/owl.carousel.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/owl.carousel/dist/assets/owl.theme.default.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/lavalite/css/theme.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $app->utils()->getPanelURL() . '_assets/klefiu/css/main.css'; ?>">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/jquery/js/jquery-3.3.1.min.js'; ?>"><\/script>')</script>
        <script src="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/popper.js/dist/umd/popper.min.js'; ?>"></script>
        <script src="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $app->utils()->getPanelURL() . '_assets/vendor/modernizr/js/modernizr-2.8.3.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $app->utils()->getPanelURL() . '_assets/klefiu/js/main.js'; ?>"></script>

        <style>
            #loader {
                transition: all .3s ease-in-out;
                opacity: 1;
                visibility: visible;
                position: fixed;
                height: 100vh;
                width: 100%;
                background: #fff;
                z-index: 90000
            }

            #loader.fadeOut {
                opacity: 0;
                visibility: hidden
            }

            .spinner {
                width: 40px;
                height: 40px;
                position: absolute;
                top: calc(50% - 20px);
                left: calc(50% - 20px);
                background-color: #333;
                border-radius: 100%;
                -webkit-animation: sk-scaleout 1s infinite ease-in-out;
                animation: sk-scaleout 1s infinite ease-in-out
            }

            @-webkit-keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0)
                }
                100% {
                    -webkit-transform: scale(1);
                    opacity: 0
                }
            }

            @keyframes sk-scaleout {
                0% {
                    -webkit-transform: scale(0);
                    transform: scale(0)
                }
                100% {
                    -webkit-transform: scale(1);
                    transform: scale(1);
                    opacity: 0
                }
            }
        </style>