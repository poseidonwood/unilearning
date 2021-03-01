<body>
    <div class="header-bg">
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
                        <a href="index.html" class="logo">
                            <span class="logo-light">                                
                                <img src="<?=base_url();?>assets/img/unileverlogowhite.png" width="50px" height="50px" alt="">E-learning
                            </span>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="menu-extras topbar-custom navbar p-0">
                        <ul class="list-inline d-none d-lg-block mb-0">
                            <li class="hide-phone app-search float-left">
                                <form role="search" class="app-search">
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" placeholder="Search..">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                        </ul>

                        <ul class="navbar-right ml-auto list-inline float-right mb-0">
                            <!-- language-->                                                        

                            <!-- full screen -->
                            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                                </a>
                            </li>

                            <!-- notification -->
                            <li class="dropdown notification-list list-inline-item">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                    <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                                    <!-- item-->
                                    <h6 class="dropdown-item-text">
                                            Notifications
                                        </h6>
                                    <div class="slimscroll notification-item-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                                            <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                                            <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span></p>
                                        </a>

                                    </div>
                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                            View all <i class="fi-arrow-right"></i>
                                        </a>
                                </div>
                            </li>

                            <li class="dropdown notification-list list-inline-item">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <?php $row = 1; if($row == '') { ?>
                                        <img src="<?php echo base_url('assets/img/user/'.$row->image);?>" width="100px" height="100px">
                                        <?php }else{ ?>
                                            <img src="<?php echo base_url('assets/img/user/defaultuser.png');?>" width="100px" height="100px">
                                        <?php } ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="detail_akun"><i class="mdi mdi-account-circle"></i> Profile</a>                                                                               
                                        <a class="dropdown-item" href="lockscreen"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="login/logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>
                                </div>
                            </li>

                            <li class="menu-item dropdown notification-list list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>

                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div>
                <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">

                    <div id="navigation">

                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="dashboard"><i class="icon-pencil-ruler"></i> Dashboard</a>                                
                            </li>  

                            <li class="has-submenu">
                                <a href="database_e_certificate"><i class="mdi mdi-file-document-box-outline"></i> Database E-Certificate</a>
                            </li>  

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-format-line-weight"></i> Daftar Training<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="daftar_training_admin">Daftar Training</a></li>                                               
                                            <li><a href="list_training">List Daftar Training</a></li>                                   
                                        </ul>
                                    </li>                                    
                                </ul>
                            </li>  

                             <li class="has-submenu">
                                <a href="#"><i class="fas fa-database"></i> Master <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="#">Skill</a>
                                        <ul class="submenu submenu-right">
                                            <li><a href="master_skill">Skill</a></li>
                                            <li><a href="master_skill_pillar">Skill Pillar</a></li>
                                            <li><a href="master_skill_category">Skill Category</a></li>
                                            <li><a href="master_skill_group">Skill Group</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="master_department">Department</a></li>                                            
                                    <li><a href="master_factory">Factory</a></li> 
                                    <li><a href="master_sio_type">SIO Type</a></li> 
                                </ul>
                            </li>                                                                                                                                                                                          

                            <li class="has-submenu">
                                <a href="user"><i class="fas fa-users"></i> User</a>
                            </li>                                                  


                        </ul>
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->

    </div>
    <!-- header-bg -->