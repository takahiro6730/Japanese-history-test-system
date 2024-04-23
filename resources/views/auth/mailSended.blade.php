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
                    <p>メールアドレスに確認メールを送信しました。</p>
                    <p>送信した確認メールで新規登録を進めてください。</p>
                    <div class="btn-href">
                        <a href="{{route('_verifyMailSend')}}"> メール再送信</a>
                    </div>
                </div>
            </div>
        </div>
	<!-- //main -->
    </div>
</body>
<style>
    .agileits-top p{
        font-weight: 500;
        font-size: 1rem;
    }
    a{
        font-weight: 700;
        font-size: 1rem;
        color: #13ae6a;
    }
    .btn-href{
        margin-top: 2rem;
        margin-bottom: 1rem;
        padding: 1rem 0;
        width: 100%;
        background: white;
        text-align: center;
    }
</style>
</html>
