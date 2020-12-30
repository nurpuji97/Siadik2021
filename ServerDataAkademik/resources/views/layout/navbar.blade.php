<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="index.html"><img src="{{ asset('assets/img/logo-dark.png') }}" alt="Klorofil Logo" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>{{ __('messages.language') }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i> </a>
                    {{-- <ul class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><i class="lnr lnr-user"></i> <span>{{ $properties['native'] }}</span></a></li>
                        @endforeach
                    </ul> --}}
                    <ul class="dropdown-menu">
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('id') }}"><img src="{{ asset('icon/078-indonesia.png') }}" alt="" style="width:18px;height:18px;"> <span>Bahasa Indonesia</span></a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('jv-Java') }}"><img src="{{ asset('icon/078-indonesia.png') }}" alt="" style="width:18px;height:18px;"> <span>Bahasa Jawa</span></a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img src="{{ asset('icon/153-united-states-of-america.png') }}" alt="" style="width:18px;height:18px;"> <span>English</span></a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img src="{{ asset('icon/059-saudi-arabia.png') }}" alt="" style="width:18px;height:18px;"> <span>عرب</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src=
                        "@if(auth()->user()->role == 'siswa')
                            {{ auth()->user()->siswa->getAvatar() }}
                        @else
                            {{ auth()->user()->siswa->getAvatar() }}
                        @endif"
                        class="img-circle" alt="Avatar"> <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                        <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li> --}}
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>{{ __('messages.logout') }}</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>