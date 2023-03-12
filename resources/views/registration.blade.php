<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/main.css" type="text/css">
</head>
<body>
    <!-- Регистрация -->
    <form action="{{ route('post-reg') }}" method="post">
        @csrf
        <label >Почта</label>
        <input type="text" name="email" placeholder="Введите адрес своей почты">
        @error('email')
        <div class="msg">{{ $message }}</div>
        @enderror
        <label>Пароль</label>
        <input type="passwors" name="password" placeholder="Введите свой пароль">
        @error('passwors')
        <div class="msg">{{ $message }}</div>
        @enderror
        <button type="submit">Зарегестрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь!!!</a>
        </p>
    </form>
</body>
</html>