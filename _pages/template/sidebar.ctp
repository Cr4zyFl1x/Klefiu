<!-- // SIDEBAR // -->
                <div id="klefiu" class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <div class="logo-img">
                                <img src="<?= $app->utils()->getPanelURL() . '_assets/vendor/lavalite/img/brand-white.svg'; ?>" class="header-brand-img" alt="Klefiu">
                            </div>
                            <span class="text-behance">&nbsp;</span>
                            <span class="text"><?= \Klefiu\App\SQL::getSetting('panel_navigationTitle'); ?></span>
                        </a>
                        <!-- <button type="button" onclick="" id="sidenav-toggle" class="nav-toggle"><i data-toggle="expanded" id="sidenav-toggle-icon" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button> -->
                    </div>

                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">

                                <!-- // USER // -->
                                <div class="nav-lavel"><?= 'Hi ' .$user->getUsername() . '!'; ?></div>
                                <!-- // DASHBOARD // -->
                                <div class="nav-item">
                                    <a href="<?= $app->utils()->getPanelURL() . 'app'; ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>

                                <!-- // FILES // -->
                                <div class="nav-item has-sub">
                                    <a href="#nav/files"><i class="ik ik-hard-drive"></i><span>Files</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/files'; ?>" class="menu-item">File Browser</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/file/upload'; ?>" class="menu-item">Upload File</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/files/statistics'; ?>" class="menu-item">Statistics</a>
                                    </div>
                                </div>

                                <!-- // SUPPORT // -->
                                <div class="nav-item has-sub">
                                    <a href="#nav/support"><i class="ik ik-message-square"></i><span>Support</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tickets'; ?>" class="menu-item">Tickets</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tickets/create'; ?>" class="menu-item">Create new ticket</a>
                                    </div>
                                </div>

                                <!-- // Account // -->
                                <div class="nav-item has-sub">
                                    <a href="#nav/support"><i class="ik ik-user"></i><span>Account</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account'; ?>" class="menu-item">Profile</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/preferences'; ?>" class="menu-item">Preferences</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/password'; ?>" class="menu-item">Password</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/sessions'; ?>" class="menu-item">Sessions</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/login-history'; ?>" class="menu-item">Login history</a>
                                    </div>
                                </div>



                                <!-- // ADMIN // -->
                                <div class="nav-lavel">Panel administration</div>
                                <div class="nav-item ">
                                    <a href="#nav/settings"><i class="ik ik-bar-chart-2"></i><span>Statistics</span></a>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/settings"><i class="ik ik-settings"></i><span>Settings</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/panel'; ?>" class="menu-item">Panel settings</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/mail'; ?>" class="menu-item">Mail settings</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/license'; ?>" class="menu-item">License settings</a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/accounts"><i class="ik ik-users"></i><span>Accounts</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/users'; ?>" class="menu-item">Userlist</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/users/create'; ?>" class="menu-item">Create new User</a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/support"><i class="ik ik-message-square"></i><span>Support</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/support/tickets'; ?>" class="menu-item">Tickets</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/support/open-ticket'; ?>" class="menu-item">Open new Ticket</a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/tools"><i class="ik ik-terminal"></i><span>Tools</span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tools/mail'; ?>" class="menu-item">Send mail</a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tools/file-templates'; ?>" class="menu-item">File templates</a>
                                    </div>
                                </div>


                                <!-- // LOGOUT // -->
                                <div class="nav-lavel">Logout</div>
                                <div class="nav-item">
                                    <a href="<?= $app->utils()->getPanelURL() . 'app/logout'; ?>"><i class="ik ik-power"></i><span>Logout</span></a>
                                </div>


                                <!--
                                <div class="nav-lavel">Other</div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Menu Levels</span></a>
                                    <div class="submenu-content">
                                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.1</a>
                                        <div class="nav-item has-sub">
                                            <a href="javascript:void(0)" class="menu-item">Menu Level 2.2</a>
                                            <div class="submenu-content">
                                                <a href="javascript:void(0)" class="menu-item">Menu Level 3.1</a>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.3</a>
                                    </div>
                                </div>
                                <div class="nav-item">
                                    <a href="javascript:void(0)" class="disabled"><i class="ik ik-slash"></i><span>Disabled Menu</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="javascript:void(0)"><i class="ik ik-award"></i><span>Sample Page</span></a>
                                </div>
                                -->
                            </nav>
                        </div>
                    </div>
                </div>