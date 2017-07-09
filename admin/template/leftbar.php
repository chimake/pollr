<?php
$thecurrentPage = $_SERVER['REQUEST_URI'];

?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                     class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#"><?php echo $login_session; ?></a></h5>
            <ul class="list-inline">
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="plugin/logout.php" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>
                <li>
                    <a href="index.php" class="<?php if ($page=="home"){echo "active";}else{echo "waves-effect";}?>"><i class="zmdi zmdi-home"></i> <span> Home </span></a>
                </li>
                <li>
                    <a href="adminusers.php" class="<?php if ($page=="adminusers"){echo "active";}else{echo "";}?>"><i class="zmdi zmdi-accounts-outline"></i> <span> Admin Users </span></a>
                </li>
                <li>
                    <a href="pollrusers.php" class="<?php if ($page=="pollrusers"){echo "active";}else{echo "";}?>"><i class="zmdi zmdi-male-female"></i> <span> Pollr App Users </span></a>
                </li>
                <li>
                    <a href="cateAdd.php" class="<?php if ($page=="pollruscaters"){echo "active";}else{echo "";}?>"><i class="ti-notepad"></i> <span> Categories </span></a>
                </li>
                <li>
                    <a href="postHandler.php" class="<?php if ($page=="postHandler"){echo "active";}else{echo "";}?>"><i class="ti-pencil-alt"></i> <span> Posts </span></a>
                </li>
                <li>
                    <a href="voteHandler.php" class="<?php if ($page=="voteHanler"){echo "active";}else{echo "";}?>"><i class="dripicons-checkmark"></i> <span> Votes </span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class=""><span>All Html</span><span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li>

                            <a href="index.html" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="typography.html" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                                <span> Typography </span> </a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span
                                        class="label label-warning pull-right">7</span><span> Forms </span> </a>
                            <ul class="list-unstyled">
                                <li><a href="form-elements.html">General Elements</a></li>
                                <li><a href="form-advanced.html">Advanced Form</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-fileupload.html">Form Uploads</a></li>
                                <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                                <li><a href="form-xeditable.html">X-editable</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i>
                                <span> Tables </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Table</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-editable.html">Editable Table</a></li>
                                <li><a href="tables-tablesaw.html">Tablesaw Table</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-chart"></i><span> Charts </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="chart-flot.html">Flot Chart</a></li>
                                <li><a href="chart-morris.html">Morris Chart</a></li>
                                <li><a href="chart-chartist.html">Chartist Charts</a></li>
                                <li><a href="chart-chartjs.html">Chartjs Chart</a></li>
                                <li><a href="chart-other.html">Other Chart</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html" class="waves-effect"><i class="zmdi zmdi-calendar"></i><span> Calendar </span></a>
                        </li>

                        <li>
                            <a href="inbox.html" class="waves-effect"><i class="zmdi zmdi-email"></i><span
                                        class="label label-purple pull-right">New</span><span> Mail </span></a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span> Pages </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="page-starter.html">Starter Page</a></li>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-recoverpw.html">Recover Password</a></li>
                                <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                <li><a href="page-404.html">Error 404</a></li>
                                <li><a href="page-500.html">Error 500</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Extra Pages </span>
                                <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="extras-projects.html">Projects</a></li>
                                <li><a href="extras-tour.html">Tour</a></li>
                                <li><a href="extras-taskboard.html">Taskboard</a></li>
                                <li><a href="extras-taskdetail.html">Task Detail</a></li>
                                <li><a href="extras-profile.html">Profile</a></li>
                                <li><a href="extras-maps.html">Maps</a></li>
                                <li><a href="extras-contact.html">Contact list</a></li>
                                <li><a href="extras-pricing.html">Pricing</a></li>
                                <li><a href="extras-timeline.html">Timeline</a></li>
                                <li><a href="extras-invoice.html">Invoice</a></li>
                                <li><a href="extras-faq.html">FAQ</a></li>
                                <li><a href="extras-gallery.html">Gallery</a></li>
                                <li><a href="extras-email-template.html">Email template</a></li>
                                <li><a href="extras-maintenance.html">Maintenance</a></li>
                                <li><a href="extras-comingsoon.html">Coming soon</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>