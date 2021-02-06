<!doctype html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <script src="file:///E:/jquery.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">
    <title>{{ get_setting('website_name').' | '.get_setting('site_motto') }}</title>

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- aiz core css -->
    <link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    @if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    * {
        margin: 0;
        padding: 0;
        user-select: none;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }


    #navbar:after {
        content: '';
        clear: both;
        display: table;
    }

    #navbar ul {
        float: right;
        margin-right: 40px;
        list-style: none;
        position: relative;
    }

    #navbar ul li {
        float: ;
        display: inline-block;
        background: #1b1b1b;
        margin: 0 5px;
    }

    #navbar ul li a {
        color: white;
        line-height: 70px;
        text-decoration: none;
        font-size: 18px;
        padding: 8px 15px;
    }

    #navbar ul li a:hover {
        color: cyan;
        border-radius: 5px;
        box-shadow: 0 0 5px #33ffff,
            0 0 10px #66ffff;
    }

    #navbar ul ul li a:hover {
        box-shadow: none;
    }

    #navbar ul ul {
        position: absolute;
        top: 90px;
        border-top: 3px solid cyan;
        opacity: 0;
        visibility: hidden;
        transition: top .3s;
    }

    #navbar ul ul ul {
        border-top: none;
    }

    #navbar ul li:hover>ul {
        top: 70px;
        opacity: 1;
        visibility: visible;
    }

    #navbar ul ul li {
        position: relative;
        margin: 0px;
        width: 350px;
        float: none;
        display: list-item;
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    }

    #navbar ul ul li a {
        line-height: 50px;
    }

    #navbar ul ul ul li {
        position: relative;
        top: -60px;
        left: 150px;
    }

    .show1,
    .icon,
    input {
        display: none;
    }

    @media all and (max-width: 968px) {
        #navbar ul {
            margin-right: 0px;
            float: left;

            .show1+a,
            ul {
                display: none;
            }

            #navbar ul li,
            #navbar ul ul li {
                display: block;
                width: 100%;
            }

            #navbar ul li a:hover {
                box-shadow: none;
            }

            .show1 {
                display: block;
                color: white;
                font-size: 18px;
                padding: 0 20px;
                line-height: 70px;
                cursor: pointer;
            }

            .show1:hover {
                color: cyan;
            }

            .icon {
                display: block;
                color: white;
                position: absolute;
                top: 0;
                right: 40px;
                line-height: 70px;
                cursor: pointer;
                font-size: 25px;
            }

            #navbar ul ul {
                top: 70px;
                border-top: 0px;
                float: none;
                position: static;
                display: none;
                opacity: 1;
                visibility: visible;
            }

            #navbar ul ul a {
                padding-left: 40px;
            }

            #navbar ul ul ul a {
                padding-left: 80px;
            }

            #navbar ul ul ul li {
                position: static;
            }

            [id^=btn]:checked+ul {
                display: block;
            }

            #navbar ul ul li {
                border-bottom: 0px;
            }

            span.cancel:before {
                content: '\f00d';
            }
        }

        .content {
            z-index: -1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        header {
            font-size: 35px;
            font-weight: 600;
            padding: 10px 0;
        }

        p {
            font-size: 30px;
            font-weight: 500;
        }
    </style>

    <script>
    var AIZ = AIZ || {};
    </script>

</head>

<body class="">

    <div class="aiz-main-wrapper">
        @include('backend.inc.admin_sidenav')
        <div class="aiz-content-wrapper">
            @include('backend.inc.admin_nav')
            <div class="aiz-main-content">
                <div class="px-15px px-lg-25px">
                    @yield('content')
                </div>
                <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
                    <p class="mb-0">&copy; {{ get_setting('site_name') }} v{{ get_setting('current_version') }}</p>
                </div>
            </div><!-- .aiz-main-content -->
        </div><!-- .aiz-content-wrapper -->
    </div><!-- .aiz-main-wrapper -->

    @yield('modal')


    <script>
    $('.icon').click(function() {
        $('span').toggleClass("cancel");
    });
    </script>
    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>

    @yield('script')

    <script type="text/javascript">
    @foreach(session('flash_notification', collect())->toArray() as $message)
    AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
    @endforeach


    if ($('#lang-change').length > 0) {
        $('#lang-change .dropdown-menu a').each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var locale = $this.data('flag');
                $.post('{{ route('language.change') }}', {
                        _token: '{{ csrf_token() }}',
                        locale: locale
                    },
                    function(data) {
                        location.reload();
                    });

            });
        });
    }

    function menuSearch() {
        var filter, item;
        filter = $("#menu-search").val().toUpperCase();
        items = $("#main-menu").find("a");
        items = items.filter(function(i, item) {
            if ($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item)
                .attr('href') !== '#') {
                return item;
            }
        });

        if (filter !== '') {
            $("#main-menu").addClass('d-none');
            $("#search-menu").html('')
            if (items.length > 0) {
                for (i = 0; i < items.length; i++) {
                    const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
                    const link = $(items[i]).attr('href');
                    $("#search-menu").append(
                        `<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`
                        );
                }
            } else {
                $("#search-menu").html(
                    `<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">{{ translate('Nothing Found') }}</span></li>`
                    );
            }
        } else {
            $("#main-menu").removeClass('d-none');
            $("#search-menu").html('')
        }
    }
    </script>

</body>

</html>