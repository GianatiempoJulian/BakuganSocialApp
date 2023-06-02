<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
    <title>Bakugan</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <img src="" alt="🟢">
                </li>
                <li>
                    <a href="{{ url('profile') }}">👤</a>
                </li>
                <li>
                    <a href="{{ url('collection') }}">🔒</a>
                </li>
                <li>
                    <a href="{{ url('bakugan-list') }}">📃</a>
                </li>
                <li>
                    <a href="">❌</a>
                </li>
            </ul> 
        </nav>
    </header>
    <main>
        @yield('main-content')
    </main>
    <footer>
       Lorem, ipsum.
    </footer>
</body>
</html>