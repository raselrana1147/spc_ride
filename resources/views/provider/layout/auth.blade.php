<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('constants.site_title', 'Tranxit') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"/>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="full-page-bg" style="background-image: url({{ asset('asset/assets/images/login-bg.jpg') }});">
        <div class="log-overlay"></div>
            <div class="full-page-bg-inner">
                <div class="row no-margin">
                   <!--  <div class="col-md-6 log-left">
                        
                    </div> -->
                    <div class="col-md-8 col-md-offset-2 log-right">
                        <div class="login-content text-center">
                           <!--  <span class="login-logo"><img src="{{ config('constants.site_logo', asset('logo-black.png')) }}"></span> -->
                            <h2  style="color: #fff;">{{config('constants.site_title','Tranxit')}} needs partners like you.</h2>
                            <p  style="color: #fff;">Drive with {{config('constants.site_title','Tranxit')}} and earn great money as an independent contractor. Get paid weekly just for helping our community of riders get rides around town. Be your own boss and get paid in fares for driving on your own schedule.</p>
                        </div>
                        <div class="login-box-outer">
                            <div class="login-box row no-margin">
                                @yield('content')
                            </div>
                            <div class="log-copy"><p class="no-margin">{{ config('constants.site_copyright', '&copy; '.date('Y').' Appoets') }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/scripts.js') }}"></script>

   <!--  <script type="text/javascript">

    window.__lc = window.__lc || {};

    window.__lc.license = 11766669;

    (function() {

    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';

    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);

   })();

</script> -->

    @yield('scripts')
   
</body>
</html>
