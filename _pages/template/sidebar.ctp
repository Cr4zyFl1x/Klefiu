<!-- // SIDEBAR // -->
                <div id="klefiu" class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="<?=$app->utils()->getPanelURL() . 'app'; ?>">
                            <div class="logo-img">
                                <img src="<?= $app->utils()->getPanelURL() . '_assets/klefiu/img/brand-cubic-white.png'; ?>" height="45px" class="header-brand-img" alt="Klefiu">
                            </div>
                            <span class="text-behance">&nbsp;</span>
                            <span class="text"><?= $app->utils()->getSetting('panel_navigationTitle'); ?></span>
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
                                    <a href="<?= $app->utils()->getPanelURL() . 'app'; ?>"><i class="ik ik-bar-chart-2"></i><span><?= $lng['nav']['dashboard']; ?></span></a>
                                </div>

                                <!-- // FILES // -->
                                <div class="nav-item has-sub">
                                    <a href="#nav/files"><i class="ik ik-hard-drive"></i><span><?= $lng['nav']['files']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/files'; ?>" class="menu-item"><?= $lng['nav']['file_browser']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/file/upload'; ?>" class="menu-item"><?= $lng['nav']['upload_file']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/files/statistics'; ?>" class="menu-item"><?= $lng['nav']['statistics']; ?></a>
                                    </div>
                                </div>

                                <!-- // SUPPORT // -->
                                <div class="nav-item has-sub">
                                    <a href="#nav/support"><i class="ik ik-message-square"></i><span><?= $lng['nav']['support']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tickets'; ?>" class="menu-item"><?= $lng['nav']['tickets']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tickets/create'; ?>" class="menu-item"><?= $lng['nav']['create_ticket']; ?></a>
                                    </div>
                                </div>

                                <!-- // Account // -->
                                <div class="nav-item has-sub">
                                    <a href="#nav/account"><i class="ik ik-user"></i><span><?= $lng['nav']['account']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account'; ?>" class="menu-item"><?= $lng['nav']['profile']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/profile-picture'; ?>" class="menu-item"><?= $lng['nav']['profile_picture']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/password'; ?>" class="menu-item"><?= $lng['nav']['password']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/preferences'; ?>" class="menu-item"><?= $lng['nav']['preferences']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/sessions'; ?>" class="menu-item"><?= $lng['nav']['sessions']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/account/login-history'; ?>" class="menu-item"><?= $lng['nav']['login_history']; ?></a>
                                    </div>
                                </div>



                                <!-- // ADMIN // -->
                                <div class="nav-lavel">Panel administration</div>
                                <div class="nav-item ">
                                    <a href="#nav/settings"><i class="ik ik-bar-chart-2"></i><span><?= $lng['nav']['statistics']; ?></span></a>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/settings"><i class="ik ik-settings"></i><span><?= $lng['nav']['settings']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/panel'; ?>" class="menu-item"><?= $lng['nav']['panel_settings']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/mail'; ?>" class="menu-item"><?= $lng['nav']['mail_settings']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/security'; ?>" class="menu-item"><?= $lng['nav']['security_settings']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/license'; ?>" class="menu-item"><?= $lng['nav']['license_settings']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/settings/other'; ?>" class="menu-item"><?= $lng['nav']['other_settings']; ?></a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/accounts"><i class="ik ik-users"></i><span><?= $lng['nav']['accounts']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/accounts'; ?>" class="menu-item"><?= $lng['nav']['userlist']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/accounts/create'; ?>" class="menu-item"><?= $lng['nav']['create_user']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/accounts/groups'; ?>" class="menu-item"><?= $lng['nav']['usergroups']; ?></a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/support"><i class="ik ik-message-circle"></i><span><?= $lng['nav']['support']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/support/tickets'; ?>" class="menu-item"><?= $lng['nav']['tickets']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/support/open-ticket'; ?>" class="menu-item"><?= $lng['nav']['create_ticket']; ?></a>
                                    </div>
                                </div>

                                <div class="nav-item has-sub">
                                    <a href="#nav/tools"><i class="ik ik-terminal"></i><span><?= $lng['nav']['tools']; ?></span></a>
                                    <div class="submenu-content">
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tools/mail'; ?>" class="menu-item"><?= $lng['nav']['send_mail']; ?></a>
                                        <a href="<?= $app->utils()->getPanelURL() . 'app/tools/file-templates'; ?>" class="menu-item"><?= $lng['nav']['file_templates']; ?></a>
                                    </div>
                                </div>


                                <!-- // LOGOUT // -->
                                <div class="nav-lavel"><?= $lng['nav']['logout']; ?></div>
                                <div class="nav-item">
                                    <a href="<?= $app->utils()->getPanelURL() . 'app/logout'; ?>"><i class="ik ik-power"></i><span><?= $lng['nav']['logout']; ?></span></a>
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