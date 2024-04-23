<!DOCTYPE html>
<html lang="en-US">
        
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <p>
            試験申請が承認されました。
        </p>
        <p>
            試験日時：{{$period}}
        </p>
        <p>
            ID：{{$test_pass_id}}
        </p>
        <p>
            パスワード：{{$test_pass_pwd}}
        </p>

        
        

        <p>
            よろしくお願いします、 
            
            {{ config('app.name')}}
        </p>

        
    </body>

</html>