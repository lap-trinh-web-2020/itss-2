<html>
    <header>
        <title>エラーページ</title>
    </header>

    <body>
        <h1>{{ $code }}: {{ $message }}</h1>
        <a href="{{URL::to('/')}}">ホームページに戻る</a>
    </body>
</html>
