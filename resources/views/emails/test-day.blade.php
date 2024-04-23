<!DOCTYPE html>
<html lang="en-US">
        
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <p>
            こんにちは。日本地域マイスターです。

        </p>
        <p>あなたは今日 {{$test->get_test_date()}}に試験が予約されています。</p>
        <p>
            試験名: {{$test->name}}
        </p>
        <p>
            試験日時："{{$test->get_begin_time()}}~{{$test->get_end_time()}}"
        </p>
        <p>
            がんばってください、 
            
            {{ config('app.name')}}
        </p>

        
    </body>

</html>