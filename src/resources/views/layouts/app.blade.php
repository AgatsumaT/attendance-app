<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <header>
        <div class="header__logo">
            Atte
        </div>
        @yield('link')
        <div class="header-nav">
            @if (Auth::check())
            <li class="header-nav__item">
                <a class="header-nav__link" href="/">ホーム</a>
            </li>
            <li class="header-nav__item">
                <a class="header-nav__link" href="/comfirm">日付一覧</a>
            </li>
            <li class="header-nav__item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="header-nav__button">ログアウト</button>
                </form>
            </li>
            @endif
        </div>
    </header>

    <main>
        <div class="content">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="footer__item">
            <small class="footer__text">
                Atte,inc.
            </small>
        </div>
    </footer>
</body>

</html>