<!DOCTYPE html>
<html lang="en-US">
        
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <p>
            {{$user_name}}様の試験結果をお知らせします。
        </p>
        <p>
            試験名：{{$test_name}}
        </p>
        <p>
            試験日時：{{$test_period}}
        </p>
        <p>
            結果：{{$pass_state}}
        </p>
        <p>
            試験点数：{{$score}}
        </p>

        
        

        <p>
            よろしくお願いします、 
            
            {{ config('app.name')}}
        </p>

        
    </body>

</html>