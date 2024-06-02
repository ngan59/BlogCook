

<ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        {{-- <li>
                            <a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            
                        </li> --}}
                                                    
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fa fa-cube fa-fw"></i> Dish<span class="fa arrow"></span></a>
                                                    <ul class="nav nav-second-level">
                                                        <li>
                                                            <a href="{{ route ('admin.dish.index')}}">List Dish</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route ('admin.dish.create')}}">Add Dish</a>
                                                        </li>
                                                    </ul>
                                                    <!-- /.nav-second-level -->
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route ('admin.category.index')}}">List Category</a>
                                </li>
                                <li>
                                    <a href="{{route ('admin.category.create')}}">Add Category</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route ('admin.user.index')}}">List User</a>
                                </li>
                                <li>
                                    <a href="{{ route ('admin.user.create')}}">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-sliders fa-fw"></i> Slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route ('admin.slide.index')}}">List Slide</a>
                                </li>
                                <li>
                                    <a href="{{ route ('admin.slide.create')}}">Add Slide</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        {{-- </li>
                        <li>
                        <a href="#"><i class="fa fa-comments fa-fw"></i> Comment<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">List Comment</a>
                                </li>
                                <li>
                                    <a href="#">Add Comment</a>
                                </li>
                            </ul> --}}
                            <!-- /.nav-second-level -->

                        </li>
                        <li>
                        <a href="#"><i class="fa fa-bug fa-fw"></i> Report<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">List Report</a>
                                </li>
                                <li>
                                    <a href="#">Add Report</a>
                                </li>
                            </ul>
                                   <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-play fa-fw"></i> Event Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route ('admin.categoryevent.index')}}">List Category Event</a>
                                </li>
                                <li>
                                    <a href="{{ route ('admin.categoryevent.create')}}">Add Category Event</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-play fa-fw"></i> Event<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route ('admin.event.index')}}">List Event</a>
                                </li>
                                <li>
                                    <a href="{{ route ('admin.event.create')}}">Add Event</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <li>
                            <a href="{{ route ('admin.contact.index')}}"><i class="fa fa-phone fa-fw"></i> Contact</a>
            
                            </li>
                    </ul>