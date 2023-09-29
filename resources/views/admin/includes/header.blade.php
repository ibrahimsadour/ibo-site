<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('admin.dashboard')}}">
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{asset('assets/admin/images/logo/logo.png')}}">
                        <h3 class="brand-text">Ibrahim Sadour</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" >
                        <b style="background-color: #ffffff; box-shadow: 0 0 14px 0 rgb(0 0 0 / 46%);
                            border-radius: 6px;
                            padding: 5px" class="warning">
                            @php 
                                if(get_default_lang() === 'ar'){ echo 'العربية';}
                                elseif(get_default_lang() === 'en'){ echo 'English';}
                                elseif(get_default_lang() === 'nl'){ echo 'Netherland';}  
                            @endphp <i class="la la-globe"></i> </b></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{route('admin.update.app.config','en')}}" ><b class=''>English</b> </a>
                            <a class="dropdown-item" href="{{route('admin.update.app.config','ar')}}" ><b class=''>العربية</b></a>
                            <a class="dropdown-item" href="{{route('admin.update.app.config','nl')}}" ><b class=''>Netherland</b></a>
                        </div>
                      </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            
                        <span class="mr-1">مرحبا
                        <span
                            class="user-name text-bold-700">   {{ Auth::user()->name }}</span>
                        </span>
                            <span class="avatar avatar-online">

                        <img  style="height: 35px;" src="{{asset('assets/admin/images/logo/logo.png')}}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href=""><i
                                    class="ft-user"></i>  ملفي الشخصي </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="ft-power"></i>تسجيل خروج</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
