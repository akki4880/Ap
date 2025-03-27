<header class="page-header row">
    <div class="logo-wrapper d-flex align-items-center col-auto"><a href="index.html" style="Width:38%;"><img
                class="light-logo img-fluid" src="{{ asset('Logo.png') }}" alt="logo"><img class="dark-logo img-fluid"
                src="{{ asset('Logo.png') }}" alt="logo"></a><a class="close-btn toggle-sidebar"
            href="javascript:void(0)">
            <svg class="svg-color">
                <use href="{{asset('assets/svg/iconly-sprite.svg#Category')}}"></use>
            </svg></a></div>
    <div class="page-main-header col" style="background: hsl(353.66deg 74.19% 57.45%);">
        <div class="header-left">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                placeholder="Search Admiro .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="form-group-header d-lg-block d-none">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative d-flex align-items-center">
                        <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Type to Search..." name="q" title=""><i
                            class="search-bg iconly-Search icli"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-right">
            <ul class="header-right">
                <!-- <li class="custom-dropdown">
                    <div class="translate_wrapper">
                        <div class="current_lang"><a class="lang" href="javascript:void(0)"><i
                                    class="flag-icon flag-icon-us"></i>
                                <h6 class="lang-txt f-w-700">ENG</h6>
                            </a></div>
                        <ul class="custom-menu profile-menu language-menu py-0 more_lang">
                            <li class="d-block"><a class="lang" href="#" data-value="English"><i
                                        class="flag-icon flag-icon-us"></i>
                                    <div class="lang-txt">English</div>
                                </a></li>
                            <li class="d-block"><a class="lang" href="#" data-value="fr"><i
                                        class="flag-icon flag-icon-fr"></i>
                                    <div class="lang-txt">Français</div>
                                </a></li>
                            <li class="d-block"><a class="lang" href="#" data-value="es"><i
                                        class="flag-icon flag-icon-es"></i>
                                    <div class="lang-txt">Español</div>
                                </a></li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="search d-lg-none d-flex">
                     <a href="javascript:void(0)">
                        <svg>
                            <use href="{{asset('assets/svg/iconly-sprite.svg#Search')}}"></use>
                        </svg>
                    </a>
                </li>
                <li> <a class="dark-mode" href="javascript:void(0)">
                    <svg>
                        <use href="{{asset('assets/svg/iconly-sprite.svg#moondark')}}"></use>
                    </svg></a>
                </li> -->
                <!-- <li class="custom-dropdown"><a href="javascript:void(0)">
                        <svg>
                            <use href="{{asset('assets/svg/iconly-sprite.svg#cart-icon')}}"></use>
                        </svg></a><span class="badge rounded-pill badge-primary">2</span>
                    <div class="custom-menu cart-dropdown py-0 overflow-hidden">
                        <h3 class="title dropdown-title">Cart</h3>
                        <ul class="pb-0">
                            <li>
                                <div class="d-flex"><img class="img-fluid b-r-5 me-3 img-60"
                                        src="{{asset('assets/images/dashboard-2/1.png')}}" alt="">
                                    <div class="flex-grow-1"><span class="f-w-600">Watch multicolor</span>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend">
                                                    <button class="btn quantity-left-minus" type="button"
                                                        data-type="minus" data-field="">-</button></span>
                                                <input class="form-control input-number" type="text" name="quantity"
                                                    value="1"><span class="input-group-prepend">
                                                    <button class="btn quantity-right-plus" type="button"
                                                        data-type="plus" data-field="">+</button></span>
                                            </div>
                                        </div>
                                        <h6 class="font-primary">$500</h6>
                                    </div>
                                    <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex"><img class="img-fluid b-r-5 me-3 img-60"
                                        src="../assets/images/dashboard-2/2.png" alt="">
                                    <div class="flex-grow-1"><span class="f-w-600">Airpods</span>
                                        <div class="qty-box">
                                            <div class="input-group"><span class="input-group-prepend">
                                                    <button class="btn quantity-left-minus" type="button"
                                                        data-type="minus" data-field="">-</button></span>
                                                <input class="form-control input-number" type="text" name="quantity"
                                                    value="1"><span class="input-group-prepend">
                                                    <button class="btn quantity-right-plus" type="button"
                                                        data-type="plus" data-field="">+</button></span>
                                            </div>
                                        </div>
                                        <h6 class="font-primary">$500.00</h6>
                                    </div>
                                    <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="total">
                                <h6 class="mb-0">Order Total : <span class="f-w-600">$1000.00</span></h6>
                            </li>
                            <li class="text-center"><a class="d-block mb-3 view-cart f-w-700 text-primary"
                                    href="cart.html">Go to your cart</a><a
                                    class="btn btn-primary view-checkout text-white" href="checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="custom-dropdown"><a href="javascript:void(0)">
                        <svg>
                            <use href="../assets/svg/iconly-sprite.svg#notification"></use>
                        </svg></a> @if($userNotificationCount > 0)<span class="badge rounded-pill badge-primary">
                        {{ $userNotificationCount  }}</span>@endif
                    <div class="custom-menu notification-dropdown py-0 overflow-hidden">
                        <h3 class="title bg-primary-light dropdown-title">Notification <span class="font-primary">View
                                all</span></h3>
                        <ul class="activity-timeline">
                            @php
                            $limitedNotifications = $userNotifications->reverse()->take(10);
                            @endphp
                            @forelse ($limitedNotifications as $notification)
                            @if ($notification->role == 'user')
                            <a href='/admin/show-user-documents/{{ $notification->family_member_id }}'>
                                <li class="d-flex align-items-start">
                                    <div class="activity-line"></div>
                                    <div class="activity-dot-primary"></div>
                                    <div class="flex-grow-1">
                                        <h5>{{ $notification->message }}</h5>
                                        <p class="mb-0">{{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </li>
                            </a>
                            @endif
                            @empty
                            <div class="p-4 text-sm text-gray-500">
                                No notifications.
                            </div>
                            @endforelse
                        </ul>
                    </div>
                </li>
                <li class="profile-nav custom-dropdown">
                    <div class="user-wrap">
                        <div class="user-content">
                            <h6>{{ Auth::guard('admin')->user()->name }}</h6>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>