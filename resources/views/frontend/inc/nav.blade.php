<!-- Top Bar -->
<div class="top-navbar bg-white border-bottom border-soft-secondary z-1035"
    style="color: #A57F2B;background-color: #FFFAF6 !important;font-style: italic;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col">
                <ul class="list-inline d-flex justify-content-between justify-content-lg-start mb-0">
                    @if(get_setting('show_language_switcher') == 'on')
                    <!-- <li class="list-inline-item dropdown mr-3" id="lang-change">
                        @php
                        if(Session::has('locale')){
                        $locale = Session::get('locale', Config::get('app.locale'));
                        }
                        else{
                        $locale = 'en';
                        }
                        @endphp
                        <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2" data-toggle="dropdown"
                            data-display="static">
                            <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ static_asset('assets/img/flags/'.$locale.'.png') }}" class="mr-2 lazyload"
                                alt="{{ \App\Language::where('code', $locale)->first()->name }}" height="11">
                            <span class="opacity-60" style="
    opacity: unset !important;
">{{ \App\Language::where('code', $locale)->first()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            @foreach (\App\Language::all() as $key => $language)
                            <li>
                                <a href="javascript:void(0)" data-flag="{{ $language->code }}"
                                    class="dropdown-item @if($locale == $language) active @endif">
                                    <img src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                        data-src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}"
                                        class="mr-1 lazyload" alt="{{ $language->name }}" height="11">
                                    <span class="language">{{ $language->name }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li> -->
                    <div id="google_translate_element"></div>
                    @endif

                    @if(get_setting('show_currency_switcher') == 'on')
                    <li class="list-inline-item dropdown" id="currency-change">
                        @php
                        if(Session::has('currency_code')){
                        $currency_code = Session::get('currency_code');
                        }
                        else{
                        $currency_code = \App\Currency::findOrFail(\App\BusinessSetting::where('type',
                        'system_default_currency')->first()->value)->code;
                        }
                        @endphp
                        <a href="javascript:void(0)" class="dropdown-toggle text-reset py-2 opacity-60" style="
    opacity: unset !important;
" data-toggle="dropdown" data-display="static">
                            {{ \App\Currency::where('code', $currency_code)->first()->name }}
                            {{ (\App\Currency::where('code', $currency_code)->first()->symbol) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                            @foreach (\App\Currency::where('status', 1)->get() as $key => $currency)
                            <li>
                                <a class="dropdown-item @if($currency_code == $currency->code) active @endif"
                                    href="javascript:void(0)"
                                    data-currency="{{ $currency->code }}">{{ $currency->name }}
                                    ({{ $currency->symbol }})</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>

            <div class="col-5 text-right d-none d-lg-block">
                <ul class="list-inline mb-0">
                    @auth
                    @if(isAdmin())
                    <li class="list-inline-item mr-3">
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
                    </li>
                    @else
                    <li class="list-inline-item mr-3">
                        <a href="{{ route('dashboard') }}"
                            class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
                    </li>
                    @endif
                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}"
                            class="text-reset py-2 d-inline-block opacity-60">{{ translate('Logout')}}</a>
                    </li>
                    @else
                    <li class="list-inline-item mr-3 col-lg-2 text-center"
                        style="padding: 0;border: solid;border-width: 1px;vertical-align: middle;top: 6px;">
                        <a href="{{ route('user.login') }}" class="text-reset py-2 d-inline-block opacity-60"
                            style="padding-top: 0 !important;padding-bottom: 0 !important; opacity: unset !important;">{{ translate('Sign In')}}</a>
                    </li>
                    <li class="list-inline-item col-lg-2 text-center"
                        style="padding: 0;border: solid;border-width: 1px;vertical-align: middle;top: 6px;">
                        <a href="{{ route('user.registration') }}" class="text-reset py-2 d-inline-block opacity-60"
                            style="padding-top: 0 !important;padding-bottom: 0 !important; opacity: unset !important;">{{ translate('Sign Up')}}</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Top Bar -->
<header class="@if(get_setting('header_stikcy') == 'on') sticky-top @endif z-1020 bg-white border-bottom shadow-sm"
    style="color: #A57F2B;background-color: #FFFAF6 !important;font-style: italic;">
    <div class="position-relative logo-bar-area">
        <div class="container">
            <div class="d-flex align-items-center">

                <div class="col-auto col-xl-3 pl-0 pr-3 d-flex align-items-center">
                    <a class="d-block py-20px mr-3 ml-0" href="{{ route('home') }}">
                        @php
                        $header_logo = get_setting('header_logo');
                        @endphp
                        @if($header_logo != null)
                        <img src="{{ uploaded_asset($header_logo) }}" alt="{{ env('APP_NAME') }}"
                            class="mw-100 h-30px h-md-40px" height="40">
                        @else
                        <img src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                            class="mw-100 h-30px h-md-40px" height="40">
                        @endif
                    </a>

                    <!-- @if(Route::currentRouteName() != 'home')
                    <div class="d-none d-xl-block align-self-stretch category-menu-icon-box ml-auto mr-0">
                        <div class="h-100 d-flex align-items-center" id="category-menu-icon">
                            <div
                                class="dropdown-toggle navbar-light bg-light h-40px w-50px pl-2 rounded border c-pointer">
                                <span class="navbar-toggler-icon"></span>
                            </div>
                        </div>
                    </div>
                    @endif -->
                </div>
                <div class="d-lg-none ml-auto mr-0">
                    <a class="p-2 d-block text-reset" href="javascript:void(0);" data-toggle="class-toggle"
                        data-target=".front-header-search">
                        <i class="las la-search la-flip-horizontal la-2x"></i>
                    </a>
                </div>

                <div class="flex-grow-1 front-header-search d-flex align-items-center bg-white">
                    <div class="position-relative flex-grow-1">
                        <form action="{{ route('search') }}" method="GET" class="stop-propagation">
                            <div class="d-flex position-relative align-items-center">
                                <div class="d-lg-none" data-toggle="class-toggle" data-target=".front-header-search">
                                    <button class="btn px-2" type="button"><i
                                            class="la la-2x la-long-arrow-left"></i></button>
                                </div>
                                <div class="input-group">
                                    <i class="la la-search la-flip-horizontal fs-18"
                                        style="border-bottom-style: solid;padding-top: 2vh;background-color: #FFFAF6;"></i>
                                    <input type="text" class="border-0 border-lg form-control" id="search" name="q"
                                        placeholder="{{translate('What are you looking for...')}}" autocomplete="off"
                                        style="border: none !important;border-bottom-style: solid !important;  font-style: italic;  border-color: #A57F2B !important;border-radius: unset;background-color: #FFFAF6; height: auto;">
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>

                                    <!-- <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div> -->
                                    <!-- <div class="input-group-append d-none d-lg-block">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="la la-search la-flip-horizontal fs-18"></i>
                                        </button>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                        <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100"
                            style="min-height: 200px">
                            <div class="search-preloader absolute-top-center">
                                <div class="dot-loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="search-nothing d-none p-3 text-center fs-16">

                            </div>
                            <div id="search-content" class="text-left">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-none d-lg-none ml-3 mr-0">
                    <div class="nav-search-box">
                        <a href="#" class="nav-box-link">
                            <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                        </a>
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="compare">
                        @include('frontend.partials.compare')
                    </div>
                </div>

                <div class="d-none d-lg-block ml-3 mr-0">
                    <div class="" id="wishlist">
                        @include('frontend.partials.wishlist')
                    </div>
                </div>

                <div class="d-none d-lg-block  align-self-stretch ml-3 mr-0" data-hover="dropdown">
                    <div class="nav-cart-box dropdown h-100" id="cart_items">
                        @include('frontend.partials.cart')
                    </div>
                </div>

            </div>
        </div>
        <!-- @if(Route::currentRouteName() != 'home') -->
        <div class="hover-category-menu position-absolute w-100 top-100 left-0 right-0 d-none z-3"
            id="hover-category-menu">
            <div class="container">
                <div class="row gutters-10 position-relative">
                    <div class="col-lg-3 position-static">
                        @include('frontend.partials.category_menu')
                    </div>
                </div>
            </div>
        </div>
        <!-- @endif -->
       
    </div>
    <nav>
        <div class="text-center hide-on-mobile" id="navbar" style="display: flex;flex-wrap: wrap; justify-content: center;">
                <a href="" style="color: #676767;">HOME</a>
                <label for="">&nbsp&nbsp|&nbsp&nbsp</label>
                <!-- <a href="" style="color: #676767;"> SUSTAINABLE SHOP</a> -->
                <div class="d-xl-block align-self-stretch category-menu-icon-box mr-0">
                        <div class="d-flex align-items-center" id="category-menu-icon">
                            <div
                                class="dropdown-toggle">
                                <span class="" style="color: #676767;"> SUSTAINABLE SHOP </span>
                            </div>
                        </div>
                </div>
                <label for="">&nbsp&nbsp|&nbsp&nbsp</label>
                <a href="" style="color: #676767;"> CONTACT US</a>
        </div>
        <div class="text-center hide-on-desktop" id="navbar" style="display: flex;flex-wrap: wrap; justify-content: center;">
        <a href="" style="color: #676767;">HOME</a>
                <label for="">&nbsp&nbsp|&nbsp&nbsp</label>
                <a href="" style="color: #676767;"> SUSTAINABLE SHOP</a>
                <label for="">&nbsp&nbsp|&nbsp&nbsp</label>
                <a href="" style="color: #676767;"> CONTACT US</a>
    </div>
            <!-- <label for="">&nbsp&nbsp|&nbsp&nbsp</label>
        <a href="" style="color: #676767;">NEW&nbspARRIVALS</a>

             <ul>
        <li><a href="#">HOME</a></li>
        <li>
          <a href="#">SUSTAINABLE SHOP</a>
          <input type="checkbox" id="btn-1">
          <ul>
            <li>
              <label for="btn-3" class="show1">Sustainable Beauty & Health </label>
              <a href="#">Sustainable Beauty & Health <span class=""></span></a>
              <input type="checkbox" id="btn-3">
              <ul>
                <li><a href="#">Soap</a></li>
                <li><a href="#">Skin Care</a></li>
                <li><a href="#">Body Care</a></li>
              </ul>
            </li>
            <li>
              <label for="btn-3" class="show1">Sustainable Personal & Home Use </label>
              <a href="#">Sustainable Personal & Home Use <span class=""></span></a>
              <input type="checkbox" id="btn-3">
              <ul>
                <li><a href="#">Bamboo</a></li>
                <li><a href="#">Copper</a></li>
                <li><a href="#">Stainless Steel</a></li>
                <li><a href="#">Coconut Wood</a></li>
              </ul>
            </li>
            <li>
              <label for="btn-3" class="show1">Sustainable Fashion </label>
              <a href="#">Sustainable Fashion <span class=""></span></a>
              <input type="checkbox" id="btn-3">
              <ul>
                <li><a href="#"> Men & Women </a></li>
                <li><a href="#"> Apparels </a></li>
                <li><a href="#">Accessories </a></li>
                <li><a href="#">Shoes </a></li>
                <li><a href="#">Men & Women</a></li>
              </ul>
            </li>
            <li>
              <label for="btn-3" class="show1">Sustainable Bags </label>
              <a href="#">Sustainable Bags <span class=""></span></a>
              <input type="checkbox" id="btn-3">
              <ul>
                <li><a href="#"> Jute </a></li>
                <li><a href="#"> Cotton </a></li>
                <li><a href="#">Wayuu Mochila </a></li>
                <li><a href="#">Others </a></li>
              </ul>
            </li>
          </ul>
        <li><a href="#"> CONTACT US</a></li>
      </ul>
    </div>
    </nav> -->
</header>