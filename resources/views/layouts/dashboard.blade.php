<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{asset('css/button_hover_style.scss')}}">
    <link rel="stylesheet" href="{{asset('css/top_style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Yu Gothic' rel='stylesheet'>

</head>
<body>
    <header>
        <div class="header">
            <div class="top_logo">
                <img src="{{asset('img/top/mainvisual/header/top_logo.png')}}" alt="">
            </div>
            <div class="top_buttons pcbtn">
                <a class="button logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="top_link">
                <div class="customer_info">
                    <a href="#">お客様情報</a>  
                </div>
                <div class="faq">
                    <a href="#">お問合せ</a>
                </div>
                <div class="menu ">
                    <input id="toggle" type="checkbox">
                    <label for="toggle" class="hamburger">
                        <img src="{{asset('img/top/mainvisual/header/top_menu.png')}}" alt="">
                    </label>
                    <div class="nav">
                        <div class="nav-wrapper">
                            <nav>
                                <div class="wrapper-items">
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="">お問合せ</a></div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="">Q&A</a></div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="">サイトからのお知らせ</a></div>
                                    <div class="menu_items">
                                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                                        <a href="">このサイトについて</a></div>
                                    <div class="menu_items">
                                        <a href="">サイトポリシー</a></div>
                                    <div class="menu_items">
                                        <a href="">プライバシーポリシー</a></div>
                                    <div class="menu_items customer">
                                        <a href="">お客様情報</a>
                                    </div>
                                    <div class="top_buttons spbtn">
                                        <a class="button logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
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
                            <a href="" >お問合せ</a></div>
                        <div class="footer_items">
                            <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                            <a href="">サイトからのお知らせ</a></div>
                    </div>
                    <div class="footer_items">
                        <img src="{{asset('img/top/mainvisual/header/top_go_icon.png')}}" alt="">
                        <a href="">このサイトについて</a></div>
                    <div class="footer_items" style="padding-left: 50px;">
                        <a href="">サイトポリシー</a></div>
                    <div class="footer_items" >
                        <a href="" style="padding-left: 50px;">プライバシーポリシー</a></div>
                </div>
            </div>
            <div class="copylight">
                <p>©○○○○ All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/top_scroll_tool.js')}}"></script>

</body>
</html>