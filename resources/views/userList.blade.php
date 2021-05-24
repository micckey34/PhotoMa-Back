<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhotoMa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/userList.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <header>
        <h1>PhotoMa</h1>
        <p>お気に入りの美容師を見つけよう！</p>
    </header>
    <main>
        <h2>美容師一覧</h2>
        <div class="user_list">
            @foreach($users as $user)
            <div class="user">
                <div class="img">
                    <img src="{{ $user -> profile_image_path }}" alt="">
                </div>
                <div class="info">
                    <h3 class="name">{{ $user -> name }}</h3>
                    <p>{{ $user -> salon }}</p>
                </div>
            </div>
            @endforeach
        </div>
      </main>
        <div class="back">
            <a href="{{ route('welcome') }}" class="btn">戻る</a>
        </div>
</body>

</html>
