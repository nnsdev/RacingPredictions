<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Le Mans Bets</title>
    <link href="/css/app.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/dashboard">Le Mans Bets</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (Request::path() == 'dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                {{--<li class="nav-item {{ (Request::path() == 'leaderboard') ? 'active' : '' }}">
                    <a href="/leaderboard" class="nav-link">Leaderboard</a>
                </li>--}}
                <li class="nav-item">
                    <a href="/logout" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
        </nav>
        @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>