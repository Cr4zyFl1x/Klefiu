<!-- // NAVBAR // -->
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>

                            <!-- // SEARCH // -->
                            <!-- div class="header-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                                </div>
                            </div -->

                            <!-- // APP FULLSCREEN // -->
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>


                        <div class="top-menu d-flex align-items-center">
                            <!-- <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span class="badge bg-success">3</span></button> -->

                            <!-- // NAVBAR MENU MODAL // -->
                            <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>


                            <!-- // NAVBAR USER DROPDOWN // -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?= $app->utils()->getPanelURL() . 'app/account/profile.png'; ?>" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?=$app->utils()->getPanelURL() . 'app/account'; ?>"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Preferences</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-lock dropdown-icon"></i> Password</a>
                                    <a class="dropdown-item" href="#"><i class="ik ik-book dropdown-icon"></i> Sessions</a>
                                    <a class="dropdown-item" href="<?=$app->utils()->getPanelURL() . 'app/logout'; ?>"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
