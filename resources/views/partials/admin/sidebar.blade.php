        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Administrator</span>
            </a>


            <!-- Sidebar -->
            <div class="sidebar" style="position: relative;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @php
                            $image = $user->image == null || !file_exists(public_path('image/members/' . $user->image)) ? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' : asset('image/members/' . $user->image);
                            // nếu image không tồn tại giá tri hoac trong file public khong co ten hinh thi return ... neu ton tai thi return gia tri
                        @endphp
                        <img src="{{ $image }}" alt="" width="100">
                    </div>
                    <div class="info">
                        <a href="{{ route('admin.member.info', ['id' => $user->id]) }}"
                            class="d-block">{{ $user->email }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Member
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.member.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.member.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Member</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-hotel nav-icon"></i>
                                <p>
                                    Hotels
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.hotels.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.facilities.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Facilities</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-car nav-icon"></i>
                                <p>Services</p>
                                <i class="right fas fa-angle-left"></i>

                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.service.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.service.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Service</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                                <i class="fa-solid fa-list nav-icon"></i>
                                <p>
                                    Reservation
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.member.index') }}" class="nav-link">
                                <p>History Bookings</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.news.index') }}" class="nav-link">
                                <i class="fa-solid fa-newspaper nav-icon"></i>
                                <p>
                                    News
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Register Owner
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.owner.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Request</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.owner.history') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>History</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.location.index') }}" class="nav-link">
                                <i class="fa-solid fa-hotel nav-icon"></i>
                                <p>
                                    Locations
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-hotel nav-icon"></i>
                                <p>
                                    Policies
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.policy.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.policy.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Policies</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <div class="logout nav-item">
                            <a href="{{ route('admin.logout') }}" class="nav-link">
                                <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                                <p>Log Out</p>
                            </a>
                        </div>
                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>

            <!-- /.sidebar -->
        </aside>
