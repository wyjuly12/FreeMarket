<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeMarket</title>
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
    @yield('css')
</head>



<body>
    <header class="common-header">
        <div class="header-logo">
            <img src="{{ asset('/logo/logo.svg') }}" alt="">
        </div>
        <div class="header-group">
            @if (Auth::check())
            <div class="header-input">
                <input class="header-input" type="text" name="search" id="" placeholder="なにをお探しですか？">
            </div>
            <div class="header-menu">
                <ul class="header-nav">
                    <li class="header-link">
                        <a href="/mypage">マイページ</a>
                    </li>
                    <li class="header-link">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form> 
                    </li>
                    <li class="header-link">
                        <a href="#"><button type="button">出品</button></a>
                    </li>
                </ul>
            </div>
            @endif            
        </div>
    </header>
    <main>
        @yield('content')
    </main>

</body>
</html>