<aside class="page-sidebar">
    <div class="left-arrow disabled" id="left-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-arrow-left">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg></div>
    <div class="main-sidebar" id="main-sidebar">
        <ul class="sidebar-menu" id="simple-bar" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                            <div class="simplebar-content" style="padding: 0px;">
                                @auth
                                <li class="sidebar-list border-bottom-primary"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link"
                                        href="/dashboard">
                                        <i class="fa-solid fa-file-alt fs-5"></i>
                                        <h6>Documents</h6>
                                    </a>
                                </li>
                                <li class="sidebar-list border-bottom-primary"><i class="fa-solid fa-thumbtack"></i><a class="sidebar-link"
                                        href="/document-status">
                                        <i class="fa-solid fa-chart-line fs-5"></i>
                                        <h6>Status</h6>
                                    </a>
                                </li>
                                <li class="sidebar-list border-bottom-primary">
                                    <i class="fa-solid fa-thumbtack"></i>
                                    <a href="{{ route('logout') }}" class="sidebar-link"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-to-bracket fs-5"></i>
                                        <h6>Logout</h6>
                                    </a>
                                </li>

                                <!-- Hidden Logout Form -->
                                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                    @csrf
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: auto; height: 48px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                <div class="simplebar-scrollbar"
                    style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
            </div>
        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="feather feather-arrow-right">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </svg></div>
</aside>