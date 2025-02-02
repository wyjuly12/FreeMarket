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
        <div class="header-left">
            <img  class="header-logo" src="{{ asset('/logo/logo.svg') }}" alt="">
        </div>
        @if (Auth::check())
        <div class="header-center">
            <form action="/" method="get">
                <input class="header-input" type="text" name="keyword" id="search" value="{{ request('keyword') }}" placeholder="なにをお探しですか？" oninput="inputSearch()" >
                <button type="submit" id="button" hidden></button>
            </form>
        </div>
        <div class="header-right">
            <div class="header-menu">
                <div class="header-link">
                    <a href="/mypage">マイページ</a>
                </div>
                <div class="header-link">
                    <form class="header-form" action="/logout" method="post">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form> 
                </div>
                <div class="header-button">
                    <button class="header-button" type="button"><a href="/sell">出品</a></button>
                </div> 
            </div>
        </div>
        @endif
    </header>

    <script>
    function inputSearch(){

        const search = document.getElementById("search");
        const button = document.getElementById("button");

        search.addEventListener("change", function(event) {
            if (button) {
                button.click();
            }
        }, false);
    }
    </script>

    <main>

        @yield('content')
    </main>

</body>
</html>