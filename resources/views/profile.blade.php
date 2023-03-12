<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/profile.css">
    <title>Профиль</title>
</head>
<body>
    <div class="conteiner">
        @if (Auth::check())
        <div class="header">
            <p>{{ Auth::user()['email'] }}</p>
            <a class="button" href="/logout">
                <button>Exit</button>
            </a>
        </div>
        @else
        <div class="header">
            <a class="button" href="/">
                <button>signin</button>
            </a>
        </div>
        @endif
        <div class="content">
            <p>Профиль - {{ $user->email }}</p>
            <form action="{{ route('comment') }}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="status" class="form-control" rows="7" cols="80" placeholder="Введите текст комментария"></textarea>
                </div>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</body>
</html>