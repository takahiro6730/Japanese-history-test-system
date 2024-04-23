<!DOCTYPE html>
<html>
<head>
<title>パスワード確認</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{asset('css/main_style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->

<!-- //web font -->
</head>
<body>
    <div class="m-container">
	<!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>確認メール送信</h1>
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <a href="{{route('welcome_page')}}" class="cross-home">&cross;</a>
                    @if (session('status'))
                    <div class="" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('verifyMailSend') }}">
                        @csrf
                        <input id="email" type="email" class="text email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="submit" value="確認メール送信">
                    </form>
                    <p><a href="{{route('_login')}}"> Login画面に。。。</a></p>
                </div>
            </div>
        </div>
	<!-- //main -->
    </div>
</body>
</html>
