<!DOCTYPE html>
<html>
<head>
<title>試験場入場</title>
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
            <h1>試験場入場<h2>
            <p style="text-align:center; color:red;">メールで送信した試験番号とパスワードを入力してください。</p>
            <div class="main-agileinfo">
                
                <div class="agileits-top">
                    <a href="{{route('my_page')}}" class="cross-home">&cross;</a>
                    <form method="POST" action="{{ route('test.login') }}">
                        <!-- ==if time is right -->
                        @csrf
                        <input type="hidden" name="allowed_test_id" value="{{$id}}">
                        <input id="test_pass_id" type="text" class="" name="test_pass_id" placeholder="テストID" value="{{ old('test_pass_id') }}" required autocomplete="test_pass_id">

                        <input id="test_pass_pwd" type="password" class="" name="test_pass_pwd" placeholder="パスワード" required autocomplete="current-test_pass_pwd">

                        <input type="submit" value="試験開始">
                    </form>
                </div>
            </div>
        </div>
	<!-- //main -->
    </div>
</body>
</html>
