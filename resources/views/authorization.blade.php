<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>Авторизация</title>
    <link rel="stylesheet" href="/css/main.css"  type="text/css" >
</head>
<body>
    <!-- Авторизация -->
    <form action="{{ route('post-aut') }}" method="post">
        @csrf
        <label >Логин</label>
        <input type="text" name="email" placeholder="Введите свой email">
        @error('email')
        <div class="msg">{{ $message }}</div>
        @enderror
        <label>Пароль</label>
        <input type="passwors" name="password" placeholder="Введите свой пароль">
        @error('passwors')
        <div class="msg">{{ $message }}</div>
        @enderror
        <button type="submit" name="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/registration">зарегестрируйтесь!!!</a>
        </p>
    </form>
</body>
</html>