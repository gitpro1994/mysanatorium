<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('backend/images/users/').'/'.Auth::user()->image}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">{{ Auth::user()->email }}</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="active">
                        <i class="fa fa-home"></i>
                        <span> Əsas səhifə </span>
                    </a>
                </li>
                <li>
                    <a href="#countries" data-bs-toggle="collapse">
                        <i class="fa fa-globe"></i>
                        <span> Məkanlar </span>
                    </a>
                    <div class="collapse" id="countries">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.countries') }}"> Ölkələr </a>
                            </li>
                            <li>
                                <a href="{{route('admin.cities')}}"> Şəhərlər </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('admin.companies')}}" class="active">
                        <i class="fa fa-industry"></i>
                        <span> Şirkətlər </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.transfer-companies')}}" class="active">
                        <i class="fa fa-taxi"></i>
                        <span> Transfer şirkətləri</span>
                    </a>

                </li>

                <li>
                    <a href="{{route('admin.sanatoriums')}}" class="active">
                        <i class="fa fa-tree"></i>
                        <span> Sanatoriyalar </span>
                    </a>
                </li>
                <li>
                    <a href="#properties" data-bs-toggle="collapse">
                        <i class="fa fa-list"></i>
                        <span> Sanatoriya xüsusiyyətləri </span>
                    </a>
                    <div class="collapse" id="properties">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.treatment-directions')}}"> Müalicə istiqamətləri </a>
                            </li>
                            <li>
                                <a href="{{route('admin.room-conditions')}}"> Otaq şəraiti </a>
                            </li>
                            <li>
                                <a href="{{route('admin.room-kinds')}}"> Otaq növləri </a>
                            </li>
                            <li>
                                <a href="{{route('admin.medical-base')}}"> Müalicə növləri </a>
                            </li>
                            <li>
                                <a href="{{route('admin.sanatorium-features')}}"> Sanatoriya özəllikləri </a>
                            </li>
                            <li>
                                <a href="{{route('admin.treatment-rooms')}}"> Müalicə kabinetləri </a>
                            </li>
                            <li>
                                <a href="{{route('admin.food-types')}}"> Yemək </a>
                            </li>
                            <li>
                                <a href="{{route('admin.treatment-package')}}"> Müalicə paketləri </a>
                            </li>
                            <li>
                                <a href="{{route('admin.view-from-rooms')}}"> Otaq yeri </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('admin.discounts')}}" class="active">
                        <i class="fa fa-percent"></i>
                        <span> Endirimlər </span>
                    </a>
                </li>
                <li>
                    <a href="apps-calendar.html" class="active">
                        <i class="fa fa-comments"></i>
                        <span class="badge bg-danger rounded-pill float-end">4</span>
                        <span> Kommentlər </span>
                    </a>
                </li>
                <li>
                    <a href="apps-calendar.html" class="active">
                        <i class="fa fa-users"></i>
                        <span> Komanda </span>
                    </a>
                </li>
                <li>
                    <a href="apps-calendar.html" class="active">
                        <i class="fa fa-calendar"></i>
                        <span> Kalendar </span>
                    </a>
                </li>
                <li>
                    <a href="apps-calendar.html" class="active">
                        <i class="fa fa-paper-plane"></i>
                        <span> Bloq </span>
                    </a>
                </li>
                <li>
                    <a href="#settings" data-bs-toggle="collapse">
                        <i class="fa fa-cog"></i>
                        <span> Sayt tənzimləmələri </span>
                    </a>
                    <div class="collapse" id="settings">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index.html">Şirkət məlumatları</a>
                            </li>
                            <li>
                                <a href="index.html">Sayt tənzimləmələri</a>
                            </li>
                            <li>
                                <a href="index.html">Adminlər</a>
                            </li>
                            <li>
                                <a href="{{route('admin.currencies')}}">Valyuta</a>
                            </li>
                            <li>
                                <a href="{{route('admin.credit-cards')}}">Kredit kartları</a>
                            </li>
                            <li>
                                <a href="dashboard-3.html">Dil</a>
                            </li>
                            <li>
                                <a href="dashboard-4.html">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>