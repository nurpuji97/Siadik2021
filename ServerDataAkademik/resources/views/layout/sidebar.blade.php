<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/index" class="active"><i class="lnr lnr-home"></i> <span>{{ __('messages.Dashboard') }}</span></a></li>
                {{-- <li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li> --}}
                @if(auth()->user()->role == 'admin')
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>{{ __('messages.DataMaster') }}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="/siswa" class="">{{ __('messages.Siswa') }}</a></li>
                            <li><a href="#" class="">Login</a></li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'siswa')
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Data Master(siswa)</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="#" class="">Profile</a></li>
                            <li><a href="#" class="">Login</a></li>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>