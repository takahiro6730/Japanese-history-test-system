<!DOCTYPE html>
<html>
<head>
<title>新規登録</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->

<!-- //Custom Theme files -->
<link href="{{asset('css/main_style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- web font -->

<!-- //web font -->
</head>
<body>
    <div class="m-container">
        <!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>新規登録</h1>
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <a href="{{route('welcome_page')}}" class="cross-home">&cross;</a>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input id="name" type="text" class="text" name="name" placeholder="ユーザー名" value="{{ old('name') }}" required autocomplete="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="current_email" type="email" class="text email" name="email" placeholder="メールアドレス" value="{{ isset($email) ? $email : old('email') }}" readonly autocomplete="email">


                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="text" name="password" placeholder="パスワード" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="email" type="hidden" class="text email" name="email" placeholder="メールアドレス" value="{{ isset($email) ? $email : old('email') }}" required autocomplete="email">


                        <input id="password-confirm" type="password" class="text w3lpass" placeholder="パスワード確認" name="password_confirmation" required autocomplete="new-password">


                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>利用規約に同意します</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" value="登録">
                    </form>
                    <p><a href="{{route('_login')}}"> Login画面に。。。</a></p>
                </div>
            </div>
        </div>
	</div>
	<!-- //main -->
</body>
</html>
