<nav class="page-sidebar" id="sidebar" style="height: 100%;
                                             position: fixed;
                                             overflow-x: hidden;
                                             ">
    
            <div id="sidebar-collapse" style="
                                              width: 500px;
                                              height: 750px;
                                              overflow-x: hidden;
                                              overflow-y: auto;
                                              ">
                
                <div class="admin-block d-flex">
                    <div>
                        <img src="{{asset("assets/img/admin-avatar.png")}}" width="45px"  />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">Admin</div>
                        <small>Administrator</small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="{{url("admin/home")}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url("admin/big-companies")}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Main Companies</span>
                        </a>
                    </li>
                    <!-- <li class="heading">FEATURES</li> -->
                    <li>
                        <a href="{{url("admin/blogs")}}"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Blogs</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="colors.html">Colors</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="panels.html">Panels</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="tabs.html">Tabs</a>
                            </li>
                            <li>
                                <a href="alerts_tooltips.html">Alerts &amp; Tooltips</a>
                            </li>
                            <li>
                                <a href="badges_progress.html">Badges &amp; Progress</a>
                            </li>
                            <li>
                                <a href="lists.html">List</a>
                            </li>
                            <li>
                                <a href="cards.html">Card</a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url("admin/services")}}"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Services</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="form_basic.html">Basic Forms</a>
                            </li>
                            <li>
                                <a href="form_advanced.html">Advanced Plugins</a>
                            </li>
                            <li>
                                <a href="form_masks.html">Form input masks</a>
                            </li>
                            <li>
                                <a href="form_validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="text_editors.html">Text Editors</a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url("admin/service-tabs")}}"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Service tabs</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;">Level 2</a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url("admin/companies")}}"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Companies</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="table_basic.html">Basic Tables</a>
                            </li>
                            <li>
                                <a href="datatables.html">Datatables</a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url("admin/jobs")}}"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Jobs</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="charts_flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="charts_morris.html">Morris Charts</a>
                            </li>
                            <li>
                                <a href="chartjs.html">Chart.js</a>
                            </li>
                            <li>
                                <a href="charts_sparkline.html">Sparkline Charts</a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url('admin/job-requests')}}"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Job requests<span class="badge badge-danger badge-circle m-b-5" style="margin-left: 13px;"
                            <?php
                                        $ddddd_ = \App\Models\JobRequest::where('seen', 0)->count();
                                         if($ddddd_ == '0')
                                        echo "hidden";
                            ?>
                            >
                            {{ \App\Models\JobRequest::where('seen', 0)->count()}}
                            </span></span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="maps_vector.html">Vector maps</a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url('admin/contact')}}"><i class="sidebar-item-icon fa fa-smile-o"></i>
                            <span class="nav-label">Contacts<span class="badge badge-danger badge-circle m-b-5" style="margin-left: 35px;" 
                            <?php
                                        $ddddd = \App\Models\Contact::where('seen', 0)->count();
                                         if($ddddd == '0')
                                        echo "hidden";
                            ?>
                            >
                            {{ \App\Models\Contact::where('seen', 0)->count()}}
                            </span></span>
                        </a>
                    </li>
                    <!-- <li class="heading">PAGES</li> -->
                    <li>
                        <a href="{{url('admin/project-categories')}}"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Projects categories</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;">Level 2</a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Level 3</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                    </li>
                    <li id="set_this">
                        <a href="{{url("admin/projects")}}"><i class="sidebar-item-icon fa fa-map"></i>
                            <span class="nav-label">Projects</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="mailbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="mail_view.html">Mail view</a>
                            </li>
                            <li>
                                <a href="mail_compose.html">Compose mail</a>
                            </li>
                        </ul> -->
                    </li>

                    {{-- <li>
                        <a href="{{url("project-images")}}"><i class="sidebar-item-icon fa fa-map"></i>
                            <span class="nav-label">Project Images</span>
                        </a>
                        
                    </li> --}}
                    
                    
                    <li>
                        <a href="{{url('admin/partners')}}"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Partners</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/testimonials')}}"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Testimonials</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="lockscreen.html">Lockscreen</a>
                            </li>
                            <li>
                                <a href="forgot_password.html">Forgot password</a>
                            </li>
                            <li>
                                <a href="error_404.html">404 error</a>
                            </li>
                            <li>
                                <a href="error_500.html">500 error</a>
                            </li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="{{url('admin/site-settings')}}"><i class="sidebar-item-icon fa fa-sitemap"></i>
                            <span class="nav-label">Site settings</span>
                            <!-- <i class="fa fa-angle-left arrow"></i> -->
                        </a>
                        <!-- <ul class="nav-2-level collapse">
                            <li>
                                <a href="invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                            <li>
                                <a href="lockscreen.html">Lockscreen</a>
                            </li>
                            <li>
                                <a href="forgot_password.html">Forgot password</a>
                            </li>
                            <li>
                                <a href="error_404.html">404 error</a>
                            </li>
                            <li>
                                <a href="error_500.html">500 error</a>
                            </li>
                        </ul> -->
                    </li>
                </ul>
            </div>
        </nav>


