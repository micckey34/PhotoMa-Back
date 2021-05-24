<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhotoMa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/welcome.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <header>
        <h1>PhotoMa</h1>
        <p>〜 お気に入りの美容師を見つけよう！ 〜</p>
    </header>
    <main>
        <h2>美容師一覧</h2>
        <div class="list user_list">
            @foreach($users as $user)
            <a href="">
                <div class="user">
                    <img src="{{ $user->profile_image_path }}" alt="" width="80" height="80">
                    <div class="info">
                        <h4>{{ $user->name }}</h4>
                        <p>{{ $user->salon }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <a href="{{ route('userList') }}" class="link">
            <p>全ての美容師を見る</p>
            <img src="image/arrow.png" alt="" width="80">
        </a>
        <h2>フォルダ一覧</h2>
        <div class="list folder_list">
            @foreach($folders as $folder)
            <a href="">
                <div class="folder">
                    <p>{{ $folder->folder_name }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <a href="{{ route('folderList') }}" class="link">
            <p>全てのフォルダを見る</p>
            <img src="image/arrow.png" alt="" width="80">
        </a>
    </main>
</body>

</html>
