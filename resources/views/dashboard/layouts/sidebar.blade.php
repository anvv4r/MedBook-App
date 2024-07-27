<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{url('/')}}">
                <div class="logo-img">
                    <span class="text">MedBook</span>
                </div>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded"
                    class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        @if(auth()->check() && auth()->user()->role?->name === 'admin')
                            <a href="/admin/dashboard"><i class="ik ik-bar-chart-2"></i>
                                <span>Admin Dashboard</span>
                            </a>
                        @elseif(auth()->check() && auth()->user()->role?->name === 'doctor')
                            <a href="/doctor/dashboard"><i class="ik ik-bar-chart-2"></i>
                                <span>Practitioner Dashboard</span>
                            </a>
                        @elseif(auth()->check() && auth()->user()->role?->name === 'patient')
                            <a href="/patient/dashboard"><i class="ik ik-bar-chart-2"></i>
                                <span>Patient Dashboard</span>
                            </a>
                        @endif
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>User Profile</span> <span
                                class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            @if(auth()->check() && auth()->user()->role?->name === 'admin')
                                <a href="/admin/user-profile" class="menu-item">View</a>
                            @elseif(auth()->check() && auth()->user()->role?->name === 'doctor')
                                <a href="/doctor/user-profile" class="menu-item">View</a>
                            @elseif(auth()->check() && auth()->user()->role?->name === 'patient')
                                <a href="/patient/user-profile" class="menu-item">View</a>
                            @endif
                        </div>
                    </div>

                    @if(auth()->check() && auth()->user()->role?->name === 'admin')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Practitioner</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('doctor.create')}}" class="menu-item">Create</a>
                                <a href="{{route('doctor.index')}}" class="menu-item">View</a>


                            </div>
                        </div>
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Specialisation</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('specialty.create')}}" class="menu-item">Create</a>
                                <a href="{{route('specialty.index')}}" class="menu-item">View</a>

                            </div>
                        </div>
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient List</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('patient.patient-list')}}" class="menu-item">View</a>

                            </div>
                        </div>

                    @endif

                    @if(auth()->check() && auth()->user()->role?->name === 'doctor')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Time Slot</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('time.create')}}" class="menu-item">Create</a>
                                <a href="{{route('time.index')}}" class="menu-item">View</a>
                            </div>
                        </div>
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient Appointment</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('patient.booking-list')}}" class="menu-item">View</a>
                            </div>
                        </div>
                    @endif

                    @if(auth()->check() && auth()->user()->role?->name === 'patient')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>My Booking</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('my-booking')}}" class="menu-item">View</a>
                            </div>
                        </div>

                    @endif

                    <div class="nav-lavel">Support</div>
                    <div class="nav-item">
                        <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Documentation</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit
                                Issue</span></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>