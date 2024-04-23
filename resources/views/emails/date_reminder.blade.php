<!DOCTYPE html>
<html lang="en-US">
        
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <p>
            ここで登録を進めてください。
        </p>

        
        <a href="{{ $actionUrl }}" class="button">{{$actionText}}</a>
        
        <p>アカウントを作成していない場合は、それ以上のアクションは必要ありません。</p>

        <p>
            よろしくお願いします、 <br>
            
            {{ config('app.name')}}
        </p>

        <p>
            <hr>
            <span class="break-all">
            <strong>リンクをクリックできない場合は、以下の URL をコピーして Web ブラウザに貼り付けてください。</strong><br/>
            <em>{{$actionUrl}}</em>
        </p>

        
    </body>

</html>