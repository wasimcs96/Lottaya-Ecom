<section class="bg-white border-top mt-auto" style="background-color: #FFFAF6 !important;">
    <div class="container text-center" style="padding-top: 30px;">
       

        <hr style="height: 1px !important;border: none;background-color: #B57F2F;">
        <div class="row container" style="margin: 0;">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-4">
                <img src="{{ static_asset('leftpart.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-2">
                <img src="{{ static_asset('midpart.png') }}" class="img-fluid" alt="">

            </div>
            <div class="col-lg-4">
                <img src="{{ static_asset('rightpart.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-1">
            </div>

        </div>
        <!-- <img  src="{{ static_asset('Group 133.png') }}" class="img-fluid"style="max-width: 100%;height: auto;" alt="tag"> -->
        <hr style="height: 1px !important;border: none;background-color: #B57F2F;">
        <div class="row container" style="margin: 0;">
            <!-- <div class="col-lg-9">
                <img src="{{ static_asset('Group 105.png') }}" class="img-fluid" alt="tag" style="float: left;">
            </div> -->
            <!-- <div class="col-lg-3">
                <label for="" style="color: #676767;font-weight: 600;font-style: italic;font-size: 24px;">Follow
                    Us</label>
                <br>
                <ul class="list-inline my-3 my-md-0 social colored text-center">
                    @if ( get_setting('facebook_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"
                            style="background-color: transparent;border: 2px solid #3C5A9A;width: 42px;height: 42px;"><img
                                src="{{ static_asset('facebook.png') }}" width="10px" style="vertical-align: middle;"
                                alt=""></a>
                    </li>
                    @endif
                    @if ( get_setting('twitter_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"
                            style="background-color: transparent;border: 2px solid #03A9F4;width: 42px;height: 42px;"><img
                                src="{{ static_asset('twitter.png') }}" width="20px" style="vertical-align: middle;"
                                alt=""></a>
                    </li>
                    @endif
                    @if ( get_setting('instagram_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"
                            style="background-color: transparent;border: 2px solid #C63577;width: 42px;height: 42px;"><i
                                class="fa fa-instagram" id="insta" aria-hidden="true"
                                style="vertical-align: sub;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('youtube_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube"
                            style="background-color: transparent;border: 2px solid red;width: 42px;height: 42px;"><img
                                src="{{ static_asset('youtube.png') }}" width="28px" style="vertical-align: middle;"
                                alt=""></a>
                    </li>
                    @endif
                    @if ( get_setting('linkedin_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"
                            style="background-color: transparent;border: 2px solid #007EBB;width: 42px;height: 42px;"><img
                                src="{{ static_asset('LinkedIn.png') }}" width="21px" style="vertical-align: middle;"
                                alt=""></a>
                    </li>
                    @endif
                </ul>
            </div> -->
            <!-- <hr style="height: 1px !important;border: none;background-color: #B57F2F;width: 100%;margin-top: 58px;"> -->

        </div>

    </div>
</section>

<section class="bg-dark py-5 text-light" style="background-color: #FFFAF6 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center text-md-left">
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="d-block">
                        @if(get_setting('footer_logo') != null)
                        <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ uploaded_asset(get_setting('footer_logo')) }}" alt="{{ env('APP_NAME') }}"
                            height="44">
                        @else
                        <img class="lazyload" src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                            data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}"
                            height="44">
                        @endif
                    </a>
                    <div class="my-3" style="color: #898b92;line-height: 0.7;font-style: italic;">
                        @php
                        echo get_setting('about_us_description');
                        @endphp
                    </div>
                    <div class="d-inline-block d-md-block">
                        <!-- <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}">
                            @csrf
                            <div class="form-group mb-0">
                                <input type="email" class="form-control" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ translate('Subscribe') }}
                            </button>
                        </form> -->
                        <!-- <h6 style="color: #898b92 ;font-style: italic;"> Contact Us</h6> -->
                        <!-- <p style="color: #898b92 ;font-style: italic;">7 Temasek Boulevard, <br>#12-07 Suntec Tower <br> one, Singapore 038987</p> -->
                        <!-- <h6 style="color:#898b92 ;font-style: italic;">About Us</h6> -->
                        <!-- <p style="color: #898b92 ;font-style: italic;">+6582688211</p> -->
                        <!-- <h6 style="color:#898b92 ;font-style: italic;">Careers</h6> -->
                        <!-- <p style="color: #898b92 ;font-style: italic;">Hello@lotayaa.com</p> -->
                        <!-- <h6 style="color:#898b92 ;font-style: italic;">Lotayaa Stories</h6> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-2 ml-xl-auto col-md-4 mr-0" style="font-style: italic;">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-16 fw-600 border-gray-900 pb-2 mb-4" style="color: #B57F2F;font-style: italic;">
                        {{ translate('About') }}
                    </h4>
                    <ul class="list-unstyled fw-600" style="color: black;">
                    <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                                href="{{url('/about-us')}}">
                                {{ translate('About Us') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                                href="{{url('/lotayaacare')}}">
                                {{ translate('lotayaa care') }}
                            </a>
                        </li>


                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                                href="{{url('/partnerwithus')}}">
                                Partner with us
                            </a>
                        </li>

                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                                href="{{url('/Affiliateprograms')}}">
                                Affiliate Programs
                            </a>
                        </li>
                     </ul>
                </div>
            </div>

            <div class="col-md-4 col-lg-2" style="font-style: italic;">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-16 fw-600 border-gray-900 pb-2 mb-4" style="color: #B57F2F;font-style: italic;">
                        {{ translate('Help') }}
                    </h4>
                    <ul class="list-unstyled fw-600" style="color: black;">
                        <!-- @if (Auth::check())
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('logout') }}">
                                {{ translate('Payments') }}
                            </a>
                        </li>
                        @else
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('user.login') }}">
                                {{ translate('Payments ') }}
                            </a>
                        </li>
                        @endif
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                                href="{{ route('purchase_history.index') }}">
                                {{ translate('Shipping ') }}
                            </a>
                        </li> -->
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                        
                                href="{{ url('/CancellationReturns') }}">
                                {{ translate('Cancellation & Returns') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ url('/faq') }}">
                                {{ translate('FAQ') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ url('/blog') }}">
                                {{ translate('Blog') }}
                            </a>
                        </li>
                       <!--  <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('orders.track') }}">
                                {{ translate('Report Infringment') }}
                            </a>
                        </li>
                        @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null &&
                        \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-light"
                                href="{{ route('affiliate.apply') }}">{{ translate('Be an affiliate partner')}}</a>
                        </li>
                        @endif -->
                    </ul>
                </div>
                <!-- @if (get_setting('vendor_system_activation') == 1)
                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            {{ translate('Be a Seller') }}
                        </h4>
                        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm shadow-md">
                            {{ translate('Apply Now') }}
                        </a>
                    </div>
                @endif -->
            </div>
            <div class="col-lg-2 col-md-4" style="font-style: italic;">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-16 fw-600 border-gray-900 pb-2 mb-4" style="color: #B57F2F;font-style: italic;">
                        {{ get_setting('widget_one') }}
                    </h4>
                    <ul class="list-unstyled fw-600" style="color: black;">

                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                        
                                href="{{ url('/privacypolicy') }}">
                                Privacy Policy 
                            </a>
                        </li>
                    <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                        
                                href="{{ url('/returnpolicy') }}">
                                Delivery & Returns
                            </a>
                        </li>
                    </ul>
                     <!-- <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('terms') }}">
                    <i class="la la-file-text la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Terms & conditions') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('returnpolicy') }}">
                    <i class="la la-mail-reply la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Return Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left text-center p-4 d-block" href="{{ route('supportpolicy') }}">
                    <i class="la la-support la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Support Policy') }}</h4>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a class="text-reset border-left border-right text-center p-4 d-block" href="{{ route('privacypolicy') }}">
                    <i class="las la-exclamation-circle la-3x text-primary mb-2"></i>
                    <h4 class="h6">{{ translate('Privacy Policy') }}</h4>
                </a>
            </div>
        </div> -->
                </div>
            </div>

            <div class="col-md-4 col-lg-2" style="font-style: italic;">
                <div class="text-center text-md-left mt-4">
                    <h4 class="fs-16 fw-600 border-gray-900 pb-2 mb-4" style="color: #B57F2F;font-style: italic;">
                        {{ translate('Social') }}
                    </h4>
                    <ul class="list-unstyled fw-600" style="color: black;">
                        @if (Auth::check())
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('logout') }}">
                                {{ translate('Facebook') }}
                            </a>
                        </li>
                        @else
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('user.login') }}">
                                {{ translate('Facebook') }}
                            </a>
                        </li>
                        @endif
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset"
                                href="{{ route('purchase_history.index') }}">
                                {{ translate('Twitter') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('wishlists.index') }}">
                                {{ translate('Instagram') }}
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-reset" href="{{ route('orders.track') }}">
                                {{ translate('Linkedin') }}
                            </a>
                        </li>
                        @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null &&
                        \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
                        <li class="mb-2">
                            <a class="opacity-50 hov-opacity-100 text-light"
                                href="{{ route('affiliate.apply') }}">{{ translate('Be an affiliate partner')}}</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- @if (get_setting('vendor_system_activation') == 1)
                    <div class="text-center text-md-left mt-4">
                        <h4 class="fs-13 text-uppercase fw-600 border-bottom border-gray-900 pb-2 mb-4">
                            {{ translate('Be a Seller') }}
                        </h4>
                        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm shadow-md">
                            {{ translate('Apply Now') }}
                        </a>
                    </div>
                @endif -->
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="pt-3 pb-7 pb-xl-3 bg-black text-light" style="
    background-color: #FFFAF6 !important;
">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center">
                <label for="" style="color: #676767;font-weight: 600;font-style: italic;font-size: 15px;">CONNECT WITH
                    US</label>
                <ul class="list-inline my-3 my-md-0 social colored">
                    @if ( get_setting('facebook_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('facebook_link') }}" target="_blank" class="facebook"
                            style="background-color: #B57F2F;"><i class="lab la-facebook-f"
                                style="background-color: transparent;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('twitter_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('twitter_link') }}" target="_blank" class="twitter"
                            style="background-color: #B57F2F;"><i class="lab la-twitter"
                                style="background-color: transparent;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('instagram_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('instagram_link') }}" target="_blank" class="instagram"
                            style="background-color: #B57F2F;"><i class="lab la-instagram"
                                style="background-color: transparent;"></i></a>
                    </li>
                    @endif
                    @if ( get_setting('youtube_link') != null )
                    <!-- <li class="list-inline-item">
                        <a href="{{ get_setting('youtube_link') }}" target="_blank" class="youtube" style="background-color: #B57F2F;"><i class="lab la-youtube" style="background-color: transparent;"></i></a>
                        </li> -->
                    @endif
                    @if ( get_setting('linkedin_link') != null )
                    <li class="list-inline-item">
                        <a href="{{ get_setting('linkedin_link') }}" target="_blank" class="linkedin"
                            style="background-color: #B57F2F;"><i class="lab la-linkedin-in"
                                style="background-color: transparent;"></i></a>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="text-center text-md-left">
                    @php
                    echo get_setting('frontend_copyright_text');
                    @endphp
                </div>
            </div>

            <div class="col-lg-3">
                <div class="text-center text-md-right">
                    <ul class="list-inline mb-0">
                        @if ( get_setting('payment_method_images') != null )
                        @foreach (explode(',', get_setting('payment_method_images')) as $key => $value)
                        <li class="list-inline-item">
                            <img src="{{ uploaded_asset($value) }}" height="30">
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top">
    <div class="d-flex justify-content-around align-items-center">
        <a href="{{ route('home') }}"
            class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['home'],'bg-soft-primary')}}">
            <i class="las la-home la-2x"></i>
        </a>
        <a href="{{ route('categories.all') }}"
            class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['categories.all'],'bg-soft-primary')}}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-list-ul la-2x"></i>
            </span>
        </a>
        <a href="{{ route('cart') }}"
            class="text-reset flex-grow-1 text-center py-3 border-right {{ areActiveRoutes(['cart'],'bg-soft-primary')}}">
            <span class="d-inline-block position-relative px-2">
                <i class="las la-shopping-cart la-2x"></i>
                @if(Session::has('cart'))
                <span class="badge badge-circle badge-primary position-absolute absolute-top-right"
                    id="cart_items_sidenav">{{ count(Session::get('cart'))}}</span>
                @else
                <span class="badge badge-circle badge-primary position-absolute absolute-top-right"
                    id="cart_items_sidenav">0</span>
                @endif
            </span>
        </a>
        @if (Auth::check())
        @if(isAdmin())
        <a href="{{ route('admin.dashboard') }}" class="text-reset flex-grow-1 text-center py-2">
            <span class="avatar avatar-sm d-block mx-auto">
                @if(Auth::user()->photo != null)
                <img src="{{ custom_asset(Auth::user()->avatar_original)}}">
                @else
                <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                @endif
            </span>
        </a>
        @else
        <a href="javascript:void(0)" class="text-reset flex-grow-1 text-center py-2 mobile-side-nav-thumb"
            data-toggle="class-toggle" data-target=".aiz-mobile-side-nav">
            <span class="avatar avatar-sm d-block mx-auto">
                @if(Auth::user()->photo != null)
                <img src="{{ custom_asset(Auth::user()->avatar_original)}}">
                @else
                <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                @endif
            </span>
        </a>
        @endif
        @else
        <a href="{{ route('user.login') }}" class="text-reset flex-grow-1 text-center py-2">
            <span class="avatar avatar-sm d-block mx-auto">
                <img src="{{ static_asset('assets/img/avatar-place.png') }}">
            </span>
        </a>
        @endif
    </div>
</div>
@if (Auth::check() && !isAdmin())
<div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
    <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav"
        data-same=".mobile-side-nav-thumb"></div>
    <div class="collapse-sidebar bg-white">
        @include('frontend.inc.user_side_nav')
    </div>
</div>
@endif