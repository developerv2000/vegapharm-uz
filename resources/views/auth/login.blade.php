<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ env('APP_NAME') }} - Войти</title>

  <meta name="robots" content="none" />
  <meta name="googlebot" content="noindex, nofollow" />
  <meta name="yandex" content="none">

  <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">

  <style>
    *,
    ::before,
    ::after {
      box-sizing: border-box
    }

    body {
      display: flex;
      min-height: 100vh;
      align-items: center;
      justify-content: center;
      padding: 12px;
      margin: 0;
      font-family: "Roboto", sans-serif;
      font-size: 14px;
      background-color: #F3F4F6;
    }

    .form {
      max-width: 100%;
      overflow: hidden;
      background-color: white;
      border: none;
      border-radius: 6px;
      -webkit-box-shadow: 0 1px 20px 0 #455a6414;
      box-shadow: 0 1px 20px 0 #455a6414;
    }

    .form-header {
      padding: 14px 28px;
      background-color: #0190CC;
      font-size: 14px;
      font-weight: 400;
      color: white;
      text-transform: uppercase;
    }

    .form-body {
      padding: 28px 28px 0;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 20px;
    }

    .label {
      width: max-content;
      color: grey;
      cursor: pointer;
    }

    .input {
      width: 400px;
      max-width: 100%;
      padding: 10px;
      border: 1px solid #c3c3c3;
      border-radius: 6px;
    }

    .input--error {
      border-color: #c82333;
    }

    .error-message {
      margin-top: 0;
      text-align: center;
      color: #c82333;
    }

    .form-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 28px 28px;
    }

    .submit {
      display: flex;
      padding: 18px 24px;
      font-family: "Roboto", sans-serif;
      font-size: 12px;
      line-height: 0;
      color: white;
      text-transform: uppercase;
      cursor: pointer;
      background-color: #F02137;
      border: none;
      border-radius: 6px;
      transition: 0.3s
    }

    .submit:hover {
      box-shadow: 0 0 12px #F02137;
    }

    .home-link {
      font-size: 12px;
      color: grey;
      text-decoration: none;
    }

    .home-link:hover {
      text-decoration: underline;
    }

    .home-link span {
      margin-right: 8px;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <form class="form" action="{{ route('login') }}" method="POST">
    <div class="form-header">Вход</div>

    <div class="form-body">
      @csrf

      @if($errors->any())
        <p class="error-message">Неверный логин или пароль!</p>
      @endif

      <div class="form-group">
        <label class="label" for="email">Электронная почта</label>
        <input class="input {{ $errors->any() ? 'input--error' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required autofocus />
      </div>

      <div class="form-group">
        <label class="label" for="password">Пароль</label>
        <input class="input {{ $errors->any() ? 'input--error' : '' }}" type="password" name="password" id="password" required />
      </div>

      <div class="form-group">
        <label class="label" for="remember">
          <input id="remember" type="checkbox" name="remember" checked>
          <span>Запомнить меня</span>
        </label>
      </div>
    </div>

    <div class="form-footer">
      <a class="home-link" href="{{ route('home') }}"><span>&lt;—</span>Вернуться на главную</a>
      <button class="submit">Войти</button>
    </div>
  </form>
</body>
</html>
