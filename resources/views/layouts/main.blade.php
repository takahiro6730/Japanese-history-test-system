<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Yu Gothic' rel='stylesheet'>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <header>

        <a class="top_logo" href="{{route('welcome_page')}}">
            <img src="{{asset('img/menu/top_logo.png')}}" alt="top_logo-image">
        </a>

        <div class="menubar">
            <a href="{{route('guide.about_site')}}" class="menu-links">日本地域マイスター<br>検定について</a>
            {{-- @if(Auth::check())
            <a href="{{route('search.area')}}" class="menu-links">
            @else --}}
            <a href="#" style="display: none;">
            {{-- @endif --}}
            試験エリア一覧</a>
            <a href="{{route('guide.method')}}" class="menu-links">試験内容と受験方法</a>
            <a href="{{route('guide.site_policy')}}" class="menu-links">サイトポリシー</a>
            <a href="{{route('guide.privacy')}}" class="menu-links">プライバシーポリシー</a>
        </div>

        <div class="top_btns">

        @if(Auth::check())
            <a class="squre-btns logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{asset('img/menu/ico_logout.png')}}" alt="logout-icon"></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{route('my_page')}}" class="squre-btns mypage">
                <img src="{{asset('img/menu/ico_mypage.png')}}" alt="mypage-icon">
            </a>
        @else
            <a href="{{route('_login')}}" class="squre-btns login">
                <img src="{{asset('img/menu/ico_login.png')}}" alt="login-icon">
            </a>
            <a href="{{route('_verifyMailSend')}}" class="squre-btns register">
                <img src="{{asset('img/menu/ico_register.png')}}" alt="register-icon">
            </a>
        @endif
        
        @if(Auth::check())
            @if(Auth::user()->user_role == 1)

                <a href="{{route('admin.dashboard')}}" class="squre-btns to_admin-page">
                    <img src="{{asset('img/menu/ico_admin.png')}}" alt="admin-icon">
                </a>

            @else
            <a href="{{route('guide.question')}}" class="squre-btns question">
                <img src="{{asset('img/menu/ico_question.png')}}" alt="question-icon">
            </a>
            @endif
        @else
            <a href="{{route('guide.question')}}" class="squre-btns question">
                <img src="{{asset('img/menu/ico_question.png')}}" alt="question-icon">
            </a>

        @endif
            <div class="hamburger">
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>

                    <ul id="menu">
                        <div class="menu-list">
                        @if(Auth::check())
                            <div class="menu_items customer">
                                <a href="{{route('my_page')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px;"></i>マイページ</a>
                            </div>
                        @endif
                            <div class="menu_items">
                                <a href="{{route('guide.question')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px"></i>お問合せ</a></div>
                            <div class="menu_items">
                                <a href="{{route('guide.method')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px"></i>試験内容と受験方法</a></div>
                            <div class="menu_items">
                                <a href="{{route('guide.notice')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px"></i>サイトからのお知らせ</a></div>
                            <div class="menu_items">
                                <a href="{{route('guide.about_site')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px"></i>日本地域マイスター<br>検定について</a></div>
                            <div class="menu_items">
                                <a href="{{route('guide.site_policy')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px"></i>サイトポリシー</a></div>
                            <div class="menu_items">
                                <a href="{{ route('guide.privacy')}}"><i class="fa fa-location-arrow" aria-hidden="true" style="padding-right:20px"></i>プライバシーポリシー</a></div>
                        </div>
                        <div class="menu_items-setting">
                             @if(Auth::check())

                                <a class="button logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                    
                                @else
                                    
                                <a href="{{route('_verifyMailSend')}}" class="button register">会員登録</a>
                                <a href="{{route('_login')}}" class="button login"> ログイン</a>
                
                            @endif

                        </div>
                    </ul>
                </div>
                <p>メニュー</p>
            </div>
        </div>
    </header>

    <a id="back-to-top"><p>TOP</p> </a>

    @yield('main-content')

    <footer>
        <a class="footer_logo">
            <img src="{{asset('img/menu/top_logo.png')}}" alt="">
        </a>
        <div class="footer_detail">
            <ul><a href="{{route('guide.question')}}" class="footer_links footer_question"><i class="fa fa-location-arrow" style="padding-right:10px"  aria-hidden="true" style="font-size:20px;"></i>お問合せ</a></ul>
            <ul><a href="{{route('guide.notice')}}" class="footer_links footer_site" ><i class="fa fa-location-arrow" style="padding-right:10px" aria-hidden="true" style="font-size:20px;"></i>サイトからのお知らせ</a></ul>
            <ul><a href="{{route('guide.about_site')}}" class="footer_links"><i class="fa fa-location-arrow" style="padding-right:10px" aria-hidden="true" style="font-size:20px; text-align:center"></i>日本地域マイスター<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 検定について</a>
                <li><a href="{{route('guide.site_policy')}}" class="footer_links"><i class="fa fa-location-arrow" style="padding-right:10px"  aria-hidden="true" style="font-size:20px;"></i>サイトポリシー</a></li>
                <li><a href="{{route('guide.privacy')}}" class="footer_links"><i class="fa fa-location-arrow" style="padding-right:10px"  aria-hidden="true" style="font-size:20px;"></i>プライバシーポリシー</a></li></ul>
        </div>
        <div class="copylight">
            <p>©<script>document.write(new Date().getFullYear())</script> 総合検定研究所</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('js/top_scroll_tool.js')}}"></script>
    <script src="{{asset('js/toastr.js')}}"></script>
    <script src="{{asset('js/toastr_sr.js')}}"></script>
    @if(session()->has('message'))
    <script>
        toastr.success("{{ session()->get('message') }}");
    </script>
    @endif
    @if(session()->has('waringmessage'))
    <script>
        toastr.warning("{{ session()->get('waringmessage') }}");
    </script>
    @endif
</body>
</html>