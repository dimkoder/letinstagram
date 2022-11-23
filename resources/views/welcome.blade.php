<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1 style="text-align:center">{{ env('APP_NAME') }}</h1>
<form action="{{ route('register') }}" method="POST" style="">
    @csrf
    <table style="border:solid 1px gray; margin:auto" cellpadding="5px">
        <tr><td>Логин:</td><td><input type="text" name="username" placeholder="Логин"/></td></tr>
        <tr><td>Пароль:</td><td><input type="password" name="password" placeholder="Пароль"/></td></tr>
        <tr><td>Ваше имя:</td><td><input type="text" name="name" placeholder="Имя"></td></tr>
        <tr><td>Дата рождения:</td><td><input type="date" name="birthday" placeholder="Дата рождения"></td></tr>
        <tr><td></td><td><p><button type="submit">Регистрация</button></p></td></tr>
    </table>
</form>
</body>
</html>
