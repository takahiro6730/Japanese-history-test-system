<!DOCTYPE html>
<html>
<head>
<title>test_site</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('css/main_style.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div class="m-container">
	<!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>test</h1>
            <div class="main-agileinfo">
                
                <div class="agileits-top">
                    <a href="{{route('welcome_page')}}" class="cross-home">&cross;</a>
                    <form method="POST" action="{{ route('login') }}">
                                                
                        @csrf
                        <input id="email" type="email" class="text email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="password" type="password" class="text" name="password" placeholder="パスワード" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>利用規約に同意します</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" value="試験開始">
                        <!-- if time is wrong -->
                        <p>試験開始まで<span> 10</span>分残りました。</p>
                        <p>お待ちください。</p>
                    </form>

                        @if (Route::has('password.request'))
                            
                                <a class="small" href="{{ route('password.request') }}">
                                    {{ __('パスワードをお忘れですか?') }}
                                </a>

                        @endif
                        
                </div>
            </div>
        </div>
	<!-- //main -->
    </div>
</body>
</html>
