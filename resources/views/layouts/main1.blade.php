<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>試験サイト</title>
    <link rel="stylesheet" href="{{asset('css/top_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">    
    <link href='https://fonts.googleapis.com/css?family=Yu Gothic' rel='stylesheet'>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <header>
        <div class="header">
            <a class="top_logo" href="{{route('welcome_page')}}">
                <img src="{{asset('img/top/mainvisual/header/top_logo.png')}}" alt="">
            </a>
            <div class="top_buttons pcbtn">
                
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
            <div class="top_link">
                @if(Auth::check())
                @if(Auth::user()->user_role == 1)
                    <div>
                        <a href="{{route('admin.dashboard')}}" class="admin_page">
                            <div class="to_admin">
                                <div class="header_icon_right">
                                    <img src="{{asset('img/top/mainvisual/header/admin_icon.png')}}" alt="">
                                </div>
                                <p>管理者</p>
                            </div>
                        </a>  
                    </div>
                @endif
                <div>
                    <a href="{{route('my_page')}}" class="my_page">
                        <div class="to_mine">
                            <div class="header_icon_right">
                                <img src="{{asset('img/top/mainvisual/header/user_icon.png')}}" alt="">
                            </div>
                            <p>マイページ</p>
                        </div>
                    </a>  
                </div>
                @endif
                <div>
                    <a href="{{route('guide.question')}}" class="question_page">
                        <div class="to_question">
                            <div class="header_icon_right">
                                <img src="{{asset('img/top/mainvisual/header/message_icon.png')}}" alt="">
                            </div>
                            <p>お問合せ</p>
                        </div>
                    </a>  
                </div>
                
                <div class="menu">
                    <input id="toggle" type="checkbox">
                    <label for="toggle" class="hamburger">
                        <img src="{{asset('img/top/mainvisual/header/top_menu.png')}}" alt="">
                    </label>
                    <div class="nav">
                        <div class="nav-wrapper">
                            <nav>
                                <div class="wrapper-items">
                                    <div class="menu_items customer">
                                        <img src="{{asset('img/top/mainvisual/header/sp_user_icon.png')}}" alt="">
                                        <a href="{{route('guide.privacy')}}">マイページ</a>
                                    </div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="{{route('guide.question')}}">お問合せ</a></div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="">Q&A</a></div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="{{route('guide.notice')}}">サイトからのお知らせ</a></div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="{{route('guide.about_site')}}">このサイトについて</a></div>
                                    <div class="menu_items">
                                        <a href="{{route('guide.site_policy')}}">サイトポリシー</a></div>
                                    <div class="menu_items">
                                        <a href="{{ route('logout') }}">プライバシーポリシー</a></div>
                                    <div class="top_buttons spbtn">

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
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menubar">
                <a href="{{route('guide.about_site')}}"><p>このサイトについて</p></a>
                <a href="{{route('search.area')}}"><p>試験エリア一覧</p></a>
                <a href="{{route('guide.method')}}"><p>試験内容と受験方法</p></a>
                <a href="{{route('guide.site_policy')}}"><p>サイトポリシー</p></a>
                <a href="{{route('guide.privacy')}}"><p>プライバシーポリシー</p></a>
            </div>
        </div>
    </header>
    @yield('main-content')
    <footer>
        <div class="footer">
            <div class="footer_logo">
                <a id="back">
                    <img class="footer_logo-img" src="{{asset('img/top/top_footer-logo.png')}}" alt="">
                </a>
            </div>
            <div class="footer-question">
                <div class="footer-btns">
                    <div class="inqury">
                        <div class="footer_items">
                            <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                            <a href="{{route('guide.question')}}" >お問合せ</a></div>
                        <div class="footer_items">
                            <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                            <a href="{{route('guide.notice')}}">サイトからのお知らせ</a></div>
                    </div>
                    <div class="footer_items">
                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                        <a href="{{route('guide.about_site')}}">このサイトについて</a></div>
                    <div class="footer_items" style="padding-left: 50px;">
                        <a href="{{route('guide.site_policy')}}">サイトポリシー</a></div>
                    <div class="footer_items" >
                        <a href="{{route('guide.privacy')}}" style="padding-left: 50px;">プライバシーポリシー</a></div>
                </div>
            </div>
            <div class="copylight">
                <p>© <script>document.write(new Date().getFullYear())</script> All Rights Reserved.</p>
            </div>
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
</body>
</html>